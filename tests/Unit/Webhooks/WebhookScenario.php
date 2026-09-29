<?php
/**
 *                       ######
 *                       ######
 * ############    ####( ######  #####. ######  ############   ############
 * #############  #####( ######  #####. ######  #############  #############
 *        ######  #####( ######  #####. ######  #####  ######  #####  ######
 * ###### ######  #####( ######  #####. ######  #####  #####   #####  ######
 * ###### ######  #####( ######  #####. ######  #####          #####  ######
 * #############  #############  #############  #############  #####  ######
 *  ############   ############  #############   ############  #####  ######
 *                                      ######
 *                               #############
 *                               ############
 *
 * Adyen API Library for PHP
 *
 * Copyright (c) 2020 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Tests\Unit\Webhooks;

use PHPUnit\Framework\TestCase;

/**
 * Scenario builder for webhook handler tests.
 *
 * A scenario starts from a payload (a fixture through givenEvent() or a
 * raw string through givenPayload()), deserializes it through the handler
 * (whenCalling()), and then states its expectations:
 *
 *   $scenario->givenEvent($type, $fixture)
 *       ->whenCalling($typedGetter)
 *       ->expectModel($class)
 *       ->expectField('data.id', '...')
 *       ->expectUnknownFieldsAreIgnored()
 *       ->expectOtherTypedGettersReturnNull()
 *       ->expectMissingFieldYieldsNull('data.id');
 *
 * The resilience expectations re-deserialize mutated copies of the
 * payload and therefore must come after expectModel().
 */
class WebhookScenario
{
    private const FIXTURES_DIR = __DIR__ . '/../../Resources/Webhooks';

    private string $payload = '';
    private string $fixtureFile = '';
    private string $eventType = '';
    private string $typedGetter = '';
    private string $expectedClass = '';

    /**
     * @var array<string, mixed>
     */
    private array $fieldChecks = [];

    private ?object $webhook = null;

    public function __construct(
        private TestCase $test,
        private string $handlerClass
    ) {
    }

    /**
     * Starts a scenario from a webhook fixture, verifying that the
     * fixture carries the given event type.
     */
    public function givenEvent(string $eventType, string $fixtureFile): self
    {
        $payload = file_get_contents(self::FIXTURES_DIR . '/' . $fixtureFile);
        $this->test->assertIsString($payload, "Fixture not found: $fixtureFile");

        $decodedPayload = json_decode($payload, true);
        $this->test->assertIsArray($decodedPayload, "Fixture not found or invalid: $fixtureFile");
        $this->test->assertSame(
            $eventType,
            $decodedPayload['type'] ?? null,
            "Fixture '$fixtureFile' does not carry event type '$eventType'"
        );

        $this->eventType = $eventType;
        $this->fixtureFile = $fixtureFile;
        $this->payload = $payload;

        return $this;
    }

    /**
     * Starts a scenario from a raw payload string.
     */
    public function givenPayload(string $payload): self
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * Deserializes the payload through the given typed getter.
     */
    public function whenCalling(string $typedGetter): self
    {
        $this->typedGetter = $typedGetter;
        $this->webhook = $this->newHandler()->$typedGetter();

        return $this;
    }

    /**
     * Expects the typed getter and getGenericWebhook() to return the
     * expected model class and the payload to carry the expected event type.
     */
    public function expectModel(string $expectedClass): self
    {
        $this->expectedClass = $expectedClass;

        $this->test->assertInstanceOf($expectedClass, $this->webhook);
        $this->test->assertInstanceOf($expectedClass, $this->newHandler()->getGenericWebhook());
        $this->test->assertSame($this->eventType, $this->webhook->getType());

        return $this;
    }

    /**
     * Expects a value at a dotted field path, e.g. 'data.id'.
     *
     * @param mixed $expectedValue
     */
    public function expectField(string $path, mixed $expectedValue): self
    {
        $this->fieldChecks[$path] = $expectedValue;

        $this->test->assertSame(
            $expectedValue,
            $this->resolveFieldPath($this->webhook, $path),
            $this->context("Unexpected value at '$path'")
        );

        return $this;
    }

    /**
     * Expects getGenericWebhook() to return null (rejection payloads).
     */
    public function expectNoWebhook(): void
    {
        $this->test->assertNull($this->newHandler()->getGenericWebhook());
    }

    /**
     * Expects fields that the model does not know yet (e.g. introduced
     * by a newer webhook specification) not to break parsing.
     */
    public function expectUnknownFieldsAreIgnored(): self
    {
        $decodedPayload = json_decode($this->payload, true);
        $this->test->assertIsArray($decodedPayload, $this->context('Fixture not found or invalid'));

        $decodedPayload['brandNewTopLevelField'] = ['nested' => true];
        $decodedPayload['data']['totallyNewField'] = 42;

        $webhook = $this->newHandler(json_encode($decodedPayload))->getGenericWebhook();

        $this->test->assertInstanceOf(
            $this->expectedClass,
            $webhook,
            $this->context('Unknown fields must not break parsing')
        );
        $this->test->assertSame(
            $this->eventType,
            $webhook->getType(),
            $this->context('Unknown fields must not break parsing')
        );

        return $this;
    }

    /**
     * Expects only the matching typed getter to return the webhook;
     * every other typed getter must return null.
     */
    public function expectOtherTypedGettersReturnNull(): self
    {
        $handler = $this->newHandler();

        $this->test->assertTrue(
            method_exists($handler, $this->typedGetter),
            $this->context("Handler does not have typed getter '{$this->typedGetter}'")
        );

        foreach (get_class_methods($handler) as $method) {
            if (strncmp($method, 'get', 3) !== 0 || $method === 'getGenericWebhook') {
                continue;
            }

            if ($method === $this->typedGetter) {
                $this->test->assertInstanceOf(
                    $this->expectedClass,
                    $handler->$method(),
                    $this->context("Typed getter '$method' must return the webhook")
                );
            } else {
                $this->test->assertNull(
                    $handler->$method(),
                    $this->context("Typed getter '$method' must return null")
                );
            }
        }

        return $this;
    }

    /**
     * Expects the field at the given path to yield null from its getter
     * once removed from the payload, without breaking the rest of the
     * webhook: every field declared through expectField() except the
     * removed one must still hold its value.
     *
     * The path may pass through array elements (e.g.
     * 'data.balances.0.currency') but must not target an array element
     * itself (e.g. 'data.balances.0'): removing an element would leave
     * a gap in the JSON array.
     */
    public function expectMissingFieldYieldsNull(string $removedPath): self
    {
        $decodedPayload = json_decode($this->payload, true);
        $this->test->assertIsArray($decodedPayload, $this->context('Fixture not found or invalid'));

        $segments = explode('.', $removedPath);
        $leaf = end($segments);
        if (ctype_digit($leaf)) {
            $this->test->fail(
                $this->context(
                    "Removing '$removedPath' is not supported: removing an array"
                    . ' element would leave a gap in the JSON payload'
                )
            );
        }

        $target = &$decodedPayload;
        foreach (array_slice($segments, 0, -1) as $segment) {
            $target = &$target[$segment];
        }
        $this->test->assertArrayHasKey(
            $leaf,
            $target,
            $this->context("Path '$removedPath' not found in fixture")
        );
        unset($target[$leaf]);

        $webhook = $this->newHandler(json_encode($decodedPayload))->{$this->typedGetter}();

        $this->test->assertInstanceOf($this->expectedClass, $webhook);
        $this->test->assertSame($this->eventType, $webhook->getType());
        $this->test->assertNull(
            $this->resolveFieldPath($webhook, $removedPath),
            $this->context("Removed field '$removedPath' must resolve to null")
        );

        foreach ($this->fieldChecks as $path => $expectedValue) {
            if ($path === $removedPath) {
                continue;
            }

            $this->test->assertSame(
                $expectedValue,
                $this->resolveFieldPath($webhook, $path),
                $this->context("Unexpected value at '$path' after removing '$removedPath'")
            );
        }

        return $this;
    }

    /**
     * Instantiates the handler with the given payload, or the payload
     * of the scenario when no payload is given.
     */
    private function newHandler(?string $payload = null): object
    {
        $handlerClass = $this->handlerClass;

        return new $handlerClass($payload ?? $this->payload);
    }

    /**
     * Appends the fixture file to a failure message.
     */
    private function context(string $message): string
    {
        if ($this->fixtureFile === '') {
            return $message;
        }

        return $message . " (fixture '{$this->fixtureFile}')";
    }

    /**
     * Resolves a dotted field path against a webhook model, e.g.
     * 'data.authentication.acsTransId' resolves to
     * getData()->getAuthentication()->getAcsTransId(), while numeric segments
     * index into arrays, e.g. 'data.balances.0.currency'.
     *
     * @return mixed
     */
    private function resolveFieldPath(object $model, string $path)
    {
        $current = $model;
        foreach (explode('.', $path) as $segment) {
            if (ctype_digit($segment)) {
                $current = $current[(int) $segment];
                continue;
            }
            $getter = 'get' . ucfirst($segment);
            $current = $current->$getter();
        }

        return $current;
    }
}
