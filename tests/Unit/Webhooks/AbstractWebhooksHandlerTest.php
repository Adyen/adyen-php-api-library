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
 * Shared tests for the generated webhook handler classes.
 *
 * Every handler is generated from the same template, so the handler test
 * classes extend this base: it runs the rejection tests that every handler
 * must pass and the payload tests driven by each handler's own provider.
 * The webhook payloads live in tests/Resources/Webhooks.
 */
abstract class AbstractWebhooksHandlerTest extends TestCase
{
    private const FIXTURES_DIR = __DIR__ . '/../../Resources/Webhooks';

    /**
     * Fully qualified class name of the generated handler under test.
     */
    abstract protected static function handlerClass(): string;

    /**
     * One row per webhook model of this handler (at least one event type
     * per model): fixture file, typed getter, expected model class,
     * expected event type, and the field checks applied to the
     * deserialized webhook.
     *
     * @return array<string, array<mixed>>
     */
    abstract public static function validWebhookProvider(): array;

    public function testInvalidJsonReturnsNull(): void
    {
        $handlerClass = static::handlerClass();
        $handler = new $handlerClass('not a webhook');

        $this->assertNull($handler->getGenericWebhook());
    }

    public function testEmptyPayloadReturnsNull(): void
    {
        $handlerClass = static::handlerClass();
        $handler = new $handlerClass('{}');

        $this->assertNull($handler->getGenericWebhook());
    }

    public function testPayloadWithoutTypeReturnsNull(): void
    {
        $handlerClass = static::handlerClass();
        $handler = new $handlerClass('{"data": {"id": "some-id"}}');

        $this->assertNull($handler->getGenericWebhook());
    }

    public function testUnknownEventTypeReturnsNull(): void
    {
        $handlerClass = static::handlerClass();
        $handler = new $handlerClass('{"type": "some.unknown.event"}');

        $this->assertNull($handler->getGenericWebhook());
    }

    /**
     * @dataProvider validWebhookProvider
     *
     * @param array<string, mixed> $fieldChecks
     */
    public function testValidPayloadDeserializesToExpectedClass(
        string $fixtureFile,
        string $typedGetter,
        string $expectedClass,
        string $expectedEventType,
        array $fieldChecks
    ): void {
        $payload = file_get_contents(self::FIXTURES_DIR . '/' . $fixtureFile);
        $this->assertIsString($payload, "Fixture not found: $fixtureFile");

        $handlerClass = static::handlerClass();
        $handler = new $handlerClass($payload);

        $webhook = $handler->$typedGetter();
        $this->assertInstanceOf($expectedClass, $webhook);
        $this->assertInstanceOf($expectedClass, $handler->getGenericWebhook());
        $this->assertSame($expectedEventType, $webhook->getType());

        foreach ($fieldChecks as $path => $expectedValue) {
            $this->assertSame(
                $expectedValue,
                $this->resolveFieldPath($webhook, $path),
                "Unexpected value at '$path' for fixture '$fixtureFile'"
            );
        }
    }

    /**
     * Fields that the models do not know yet (e.g. introduced by a newer
     * webhook specification) must not break parsing: the webhook still
     * deserializes to the expected class and event type.
     *
     * @dataProvider validWebhookProvider
     */
    public function testUnknownFieldsDoNotBreakParsing(
        string $fixtureFile,
        string $typedGetter,
        string $expectedClass,
        string $expectedEventType
    ): void {
        $payload = json_decode(file_get_contents(self::FIXTURES_DIR . '/' . $fixtureFile), true);
        $this->assertIsArray($payload, "Fixture not found or invalid: $fixtureFile");

        $payload['brandNewTopLevelField'] = ['nested' => true];
        $payload['data']['totallyNewField'] = 42;

        $handlerClass = static::handlerClass();
        $handler = new $handlerClass(json_encode($payload));

        $webhook = $handler->getGenericWebhook();
        $this->assertInstanceOf($expectedClass, $webhook);
        $this->assertSame($expectedEventType, $webhook->getType());
    }

    /**
     * Only the typed getter that matches the payload's event type may
     * return a webhook; every other typed getter must return null instead
     * of a half-deserialized model.
     *
     * @dataProvider validWebhookProvider
     */
    public function testOnlyMatchingTypedGetterReturnsWebhook(
        string $fixtureFile,
        string $typedGetter,
        string $expectedClass
    ): void {
        $payload = file_get_contents(self::FIXTURES_DIR . '/' . $fixtureFile);
        $this->assertIsString($payload, "Fixture not found: $fixtureFile");

        $handlerClass = static::handlerClass();
        $handler = new $handlerClass($payload);

        $this->assertTrue(
            method_exists($handler, $typedGetter),
            "Handler does not have typed getter '$typedGetter' for fixture '$fixtureFile'"
        );

        foreach (get_class_methods($handler) as $method) {
            if (strncmp($method, 'get', 3) !== 0 || $method === 'getGenericWebhook') {
                continue;
            }

            if ($method === $typedGetter) {
                $this->assertInstanceOf(
                    $expectedClass,
                    $handler->$method(),
                    "Typed getter '$method' must return the webhook for fixture '$fixtureFile'"
                );
            } else {
                $this->assertNull(
                    $handler->$method(),
                    "Typed getter '$method' must return null for fixture '$fixtureFile'"
                );
            }
        }
    }

    /**
     * A field that is absent from the payload must yield null from its
     * getter, without breaking the rest of the deserialized webhook.
     * The first plain (non-numeric) field check of each row names the
     * field that is removed from the fixture.
     *
     * @dataProvider validWebhookProvider
     *
     * @param array<string, mixed> $fieldChecks
     */
    public function testMissingFieldYieldsNullFromGetter(
        string $fixtureFile,
        string $typedGetter,
        string $expectedClass,
        string $expectedEventType,
        array $fieldChecks
    ): void {
        $this->assertNotEmpty($fieldChecks, "Fixture '$fixtureFile' has no field checks");

        $removedPath = null;
        $remainingChecks = [];
        foreach ($fieldChecks as $path => $expectedValue) {
            if ($removedPath === null && !$this->pathHasNumericSegment($path)) {
                $removedPath = $path;
                continue;
            }
            $remainingChecks[$path] = $expectedValue;
        }
        $this->assertIsString(
            $removedPath,
            "Fixture '$fixtureFile' has no plain field path that could be removed"
        );

        $payload = json_decode(file_get_contents(self::FIXTURES_DIR . '/' . $fixtureFile), true);
        $this->assertIsArray($payload, "Fixture not found or invalid: $fixtureFile");

        $segments = explode('.', $removedPath);
        $target = &$payload;
        foreach (array_slice($segments, 0, -1) as $segment) {
            $target = &$target[$segment];
        }
        $leaf = end($segments);
        $this->assertArrayHasKey(
            $leaf,
            $target,
            "Path '$removedPath' not found in fixture '$fixtureFile'"
        );
        unset($target[$leaf]);

        $handlerClass = static::handlerClass();
        $handler = new $handlerClass(json_encode($payload));

        $webhook = $handler->$typedGetter();
        $this->assertInstanceOf($expectedClass, $webhook);
        $this->assertSame($expectedEventType, $webhook->getType());
        $this->assertNull(
            $this->resolveFieldPath($webhook, $removedPath),
            "Removed field '$removedPath' must resolve to null for fixture '$fixtureFile'"
        );

        foreach ($remainingChecks as $path => $expectedValue) {
            $this->assertSame(
                $expectedValue,
                $this->resolveFieldPath($webhook, $path),
                "Unexpected value at '$path' after removing '$removedPath'"
                . " from fixture '$fixtureFile'"
            );
        }
    }

    /**
     * Resolves a dotted field path against a webhook model, e.g.
     * 'data.authentication.acsTransId' resolves to
     * getData()->getAuthentication()->getAcsTransId(), while numeric segments
     * index into arrays, e.g. 'data.balances.0.currency'.
     *
     * @param string $path
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

    /**
     * Whether any segment of the dotted path is numeric, e.g.
     * 'data.balances.0.currency'.
     */
    private function pathHasNumericSegment(string $path): bool
    {
        foreach (explode('.', $path) as $segment) {
            if (ctype_digit($segment)) {
                return true;
            }
        }

        return false;
    }
}
