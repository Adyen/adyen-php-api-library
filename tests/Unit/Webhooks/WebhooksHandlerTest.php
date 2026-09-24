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
 * Tests the contract shared by the generated webhook handler classes.
 *
 * Every handler is generated from the same template, so a single data-driven
 * test file covers them all: the handler table checks the failure behavior
 * that every handler must have, and the payload table checks happy-path
 * deserialization per event type. The webhook payloads live in
 * tests/Resources/Webhooks.
 *
 */
class WebhooksHandlerTest extends TestCase
{
    private const FIXTURES_DIR = __DIR__ . '/../../Resources/Webhooks';

    /**
     * @dataProvider webhookHandlerProvider
     */
    public function testInvalidJsonReturnsNull(string $handlerClass): void
    {
        $handler = new $handlerClass('not a webhook');

        $this->assertNull($handler->getGenericWebhook());
    }

    /**
     * @dataProvider webhookHandlerProvider
     */
    public function testEmptyPayloadReturnsNull(string $handlerClass): void
    {
        $handler = new $handlerClass('{}');

        $this->assertNull($handler->getGenericWebhook());
    }

    /**
     * @dataProvider webhookHandlerProvider
     */
    public function testPayloadWithoutTypeReturnsNull(string $handlerClass): void
    {
        $handler = new $handlerClass('{"data": {"id": "some-id"}}');

        $this->assertNull($handler->getGenericWebhook());
    }

    /**
     * @dataProvider webhookHandlerProvider
     */
    public function testUnknownEventTypeReturnsNull(string $handlerClass): void
    {
        $handler = new $handlerClass('{"type": "some.unknown.event"}');

        $this->assertNull($handler->getGenericWebhook());
    }

    /**
     * @dataProvider validWebhookProvider
     *
     * @param array<string, mixed> $fieldChecks
     */
    public function testValidPayloadDeserializesToExpectedClass(
        string $handlerClass,
        string $fixtureFile,
        string $typedGetter,
        string $expectedClass,
        string $expectedEventType,
        array $fieldChecks
    ): void {
        $payload = file_get_contents(self::FIXTURES_DIR . '/' . $fixtureFile);
        $this->assertIsString($payload, "Fixture not found: $fixtureFile");

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

    public function testWrongTypedGetterReturnsNull(): void
    {
        $payload = file_get_contents(
            self::FIXTURES_DIR . '/balanceplatform-authentication-created.json'
        );
        $this->assertIsString($payload);

        $handlerClass = 'Adyen\Model\AcsWebhooks\AcsWebhooksHandler';
        $handler = new $handlerClass($payload);

        $this->assertNull($handler->getRelayedAuthenticationRequest());
        $this->assertInstanceOf(
            'Adyen\Model\AcsWebhooks\AuthenticationNotificationRequest',
            $handler->getGenericWebhook()
        );
    }

    /**
     * Fields that the models do not know yet (e.g. introduced by a newer
     * webhook specification) must not break parsing: the webhook still
     * deserializes to the expected class and event type.
     *
     * @dataProvider validWebhookProvider
     */
    public function testUnknownFieldsDoNotBreakParsing(
        string $handlerClass,
        string $fixtureFile,
        string $typedGetter,
        string $expectedClass,
        string $expectedEventType
    ): void {
        $payload = json_decode(file_get_contents(self::FIXTURES_DIR . '/' . $fixtureFile), true);
        $this->assertIsArray($payload, "Fixture not found or invalid: $fixtureFile");

        $payload['brandNewTopLevelField'] = ['nested' => true];
        $payload['data']['totallyNewField'] = 42;

        $handler = new $handlerClass(json_encode($payload));

        $webhook = $handler->getGenericWebhook();
        $this->assertInstanceOf($expectedClass, $webhook);
        $this->assertSame($expectedEventType, $webhook->getType());
    }

    /**
     * An enum value the model does not know yet must not fail parsing: the
     * raw value is stored and returned as-is by the getter.
     */
    public function testUnknownEnumValueIsKeptAsIs(): void
    {
        $payload = json_encode([
            'type' => 'balancePlatform.transfer.created',
            'data' => [
                'id' => '2WT1N05XXY7P9XH9',
                'status' => 'brandNewEnumValue',
            ],
        ]);

        $handlerClass = 'Adyen\Model\TransferWebhooks\TransferWebhooksHandler';
        $handler = new $handlerClass($payload);

        $webhook = $handler->getTransferNotificationRequest();
        $this->assertInstanceOf(
            'Adyen\Model\TransferWebhooks\TransferNotificationRequest',
            $webhook
        );
        $this->assertSame('brandNewEnumValue', $webhook->getData()->getStatus());
    }

    /**
     * A field that is absent from the payload must yield null from its
     * getter, without breaking the rest of the deserialized webhook.
     */
    public function testMissingFieldYieldsNullFromGetter(): void
    {
        $payload = json_encode([
            'type' => 'balancePlatform.dispute.created',
            'data' => [
                'id' => 'DS00000000000000000001',
            ],
        ]);

        $handlerClass = 'Adyen\Model\DisputeWebhooks\DisputeWebhooksHandler';
        $handler = new $handlerClass($payload);

        $webhook = $handler->getDisputeNotificationRequest();
        $this->assertInstanceOf(
            'Adyen\Model\DisputeWebhooks\DisputeNotificationRequest',
            $webhook
        );
        $this->assertSame('DS00000000000000000001', $webhook->getData()->getId());
        $this->assertNull($webhook->getData()->getStatus());
    }

    /**
     * One row per generated webhook service: every generated handler must
     * reject unparseable payloads the same way.
     *
     * @return array<string, array<string>>
     */
    public static function webhookHandlerProvider(): array
    {
        return [
            'acs' => ['Adyen\Model\AcsWebhooks\AcsWebhooksHandler'],
            'dispute' => ['Adyen\Model\DisputeWebhooks\DisputeWebhooksHandler'],
            'management' => ['Adyen\Model\ManagementWebhooks\ManagementWebhooksHandler'],
            'tokenization' => ['Adyen\Model\TokenizationWebhooks\TokenizationWebhooksHandler'],
            'transfer' => ['Adyen\Model\TransferWebhooks\TransferWebhooksHandler'],
        ];
    }

    /**
     * One row per supported event type of the generated handlers: handler
     * class, fixture file, typed getter, expected model class, expected event
     * type, and the field checks applied to the deserialized webhook.
     *
     * @return array<string, array<mixed>>
     */
    public static function validWebhookProvider(): array
    {
        return [
            'acs: balancePlatform.authentication.created' => [
                'Adyen\Model\AcsWebhooks\AcsWebhooksHandler',
                'balanceplatform-authentication-created.json',
                'getAuthenticationNotificationRequest',
                'Adyen\Model\AcsWebhooks\AuthenticationNotificationRequest',
                'balancePlatform.authentication.created',
                [
                    'data.id' => '497f6eca-6276-4993-bfeb-53cbbbba6f08',
                    'data.authentication.acsTransId' => '6a4c1709-a42e-4c7f-96c7-1043adacfc97',
                ],
            ],
            'acs: balancePlatform.authentication.relayed' => [
                'Adyen\Model\AcsWebhooks\AcsWebhooksHandler',
                'balanceplatform-relayed-authentication-request.json',
                'getRelayedAuthenticationRequest',
                'Adyen\Model\AcsWebhooks\RelayedAuthenticationRequest',
                'balancePlatform.authentication.relayed',
                [
                    'id' => '1ea64f8e-d1e1-4b9d-a3a2-3953e385b2c8',
                    'paymentInstrumentId' => 'PI123ABCDEFGHIJKLMN45678',
                ],
            ],
            'dispute: balancePlatform.dispute.created' => [
                'Adyen\Model\DisputeWebhooks\DisputeWebhooksHandler',
                'dispute-created.json',
                'getDisputeNotificationRequest',
                'Adyen\Model\DisputeWebhooks\DisputeNotificationRequest',
                'balancePlatform.dispute.created',
                [
                    'data.id' => 'DS00000000000000000001',
                ],
            ],
            'management: paymentMethod.created' => [
                'Adyen\Model\ManagementWebhooks\ManagementWebhooksHandler',
                'management-webhook-payment-method-created.json',
                'getPaymentMethodCreatedNotificationRequest',
                'Adyen\Model\ManagementWebhooks\PaymentMethodCreatedNotificationRequest',
                'paymentMethod.created',
                [
                    'data.id' => 'PM1234567890000000',
                    'data.status' => 'success',
                ],
            ],
            'management: merchant.created' => [
                'Adyen\Model\ManagementWebhooks\ManagementWebhooksHandler',
                'management-webhook-merchant-created.json',
                'getMerchantCreatedNotificationRequest',
                'Adyen\Model\ManagementWebhooks\MerchantCreatedNotificationRequest',
                'merchant.created',
                [
                    'data.merchantId' => 'MC3224X22322535GH8D537TJR',
                    'data.companyId' => 'YOUR_COMPANY_ID',
                ],
            ],
            'management: merchant.updated' => [
                'Adyen\Model\ManagementWebhooks\ManagementWebhooksHandler',
                'management-webhook-merchant-updated.json',
                'getMerchantUpdatedNotificationRequest',
                'Adyen\Model\ManagementWebhooks\MerchantUpdatedNotificationRequest',
                'merchant.updated',
                [
                    'data.legalEntityId' => 'LE322KH223222F5GNNW694PZN',
                    'data.merchantId' => 'YOUR_MERCHANT_ID',
                ],
            ],
            'tokenization: recurring.token.created' => [
                'Adyen\Model\TokenizationWebhooks\TokenizationWebhooksHandler',
                'tokenization-webhook-recurring-token-created.json',
                'getTokenizationCreatedDetailsNotificationRequest',
                'Adyen\Model\TokenizationWebhooks\TokenizationCreatedDetailsNotificationRequest',
                'recurring.token.created',
                [
                    'eventId' => 'QBQQ9DLNRHHKGK38',
                    'data.storedPaymentMethodId' => 'M5N7TQ4TG5PFWR50',
                    'data.operation' => 'created',
                ],
            ],
            'tokenization: recurring.token.disabled' => [
                'Adyen\Model\TokenizationWebhooks\TokenizationWebhooksHandler',
                'tokenization-webhook-recurring-token-disabled.json',
                'getTokenizationDisabledDetailsNotificationRequest',
                'Adyen\Model\TokenizationWebhooks\TokenizationDisabledDetailsNotificationRequest',
                'recurring.token.disabled',
                [
                    'eventId' => 'QBQQ9DLNRHHKGK38',
                    'data.storedPaymentMethodId' => 'M5N7TQ4TG5PFWR50',
                ],
            ],
            'transfer: balancePlatform.transfer.created' => [
                'Adyen\Model\TransferWebhooks\TransferWebhooksHandler',
                'transfer-created.json',
                'getTransferNotificationRequest',
                'Adyen\Model\TransferWebhooks\TransferNotificationRequest',
                'balancePlatform.transfer.created',
                [
                    'data.id' => '2WT1N05XXY7P9XH9',
                    'data.status' => 'received',
                    'data.balances.0.currency' => 'EUR',
                    'data.balances.0.received' => 1000,
                    'data.events.0.id' => 'JDRF00000000000000000000000001',
                    'data.events.0.type' => 'accounting',
                ],
            ],
            'transfer: balancePlatform.transfer.updated' => [
                'Adyen\Model\TransferWebhooks\TransferWebhooksHandler',
                'transfer-updated.json',
                'getTransferNotificationRequest',
                'Adyen\Model\TransferWebhooks\TransferNotificationRequest',
                'balancePlatform.transfer.updated',
                [
                    'data.id' => '01234',
                    'data.status' => 'authorised',
                ],
            ],
        ];
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
}
