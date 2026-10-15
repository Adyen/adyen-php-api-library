<?php
/**
 * Adyen API Library for PHP
 *
 * Copyright (c) 2020 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Tests\Unit\Checkout;

use Adyen\Model\Checkout\CardDetails;
use Adyen\Model\Checkout\CardDonations;
use Adyen\Model\Checkout\CheckoutPaymentMethod;
use Adyen\Model\Checkout\CheckoutRedirectAction;
use Adyen\Model\Checkout\CheckoutThreeDS2Action;
use Adyen\Model\Checkout\DonationPaymentMethod;
use Adyen\Model\Checkout\ModelInterface;
use Adyen\Model\Checkout\ObjectSerializer as CheckoutObjectSerializer;
use Adyen\Model\Checkout\PaymentDetailsResponseAction;
use Adyen\Model\Checkout\PaymentResponse;
use Adyen\Model\Checkout\PaymentResponseAction;
use PHPUnit\Framework\TestCase;

/**
 * Checks concrete models, fallback handling, and JSON serialization for Checkout unions.
 */
class UnionTypeTest extends TestCase
{
    /**
     * Union fallback models retain the shared model contract.
     */
    public function testUnionFallbackModelsImplementModelInterface(): void
    {
        foreach ([
            PaymentResponseAction::class,
            PaymentDetailsResponseAction::class,
            CheckoutPaymentMethod::class,
            DonationPaymentMethod::class,
        ] as $model) {
            self::assertTrue(is_a($model, ModelInterface::class, true));
        }
    }

    /**
     * A received redirect exposes its URL directly and preserves the JSON.
     */
    public function testRedirectActionUsesConcreteModelAndPreservesJson(): void
    {
        $data = (object) ['action' => (object) ['type' => 'redirect', 'url' => 'https://example.com']];
        $response = CheckoutObjectSerializer::deserialize($data, PaymentResponse::class);
        $action = $response->getAction();

        self::assertInstanceOf(CheckoutRedirectAction::class, $action);
        self::assertSame('https://example.com', $action->getUrl());
        self::assertEquals($data, CheckoutObjectSerializer::sanitizeForSerialization($response));
        self::assertSame(
            '\Adyen\Model\Checkout\PaymentResponseAction',
            PaymentResponse::openAPITypes()['action']
        );
    }

    /**
     * Unknown and missing action types use the original union fallback model.
     */
    public function testUnknownAndMissingActionsUseFallbackModel(): void
    {
        foreach ([(object) ['type' => 'future-action'], (object) []] as $data) {
            $action = CheckoutObjectSerializer::deserialize($data, PaymentResponseAction::class);

            self::assertInstanceOf(PaymentResponseAction::class, $action);
            self::assertEquals($data, CheckoutObjectSerializer::sanitizeForSerialization($action));
        }
    }

    /**
     * Both response-action unions deserialize a 3DS action into the same concrete model.
     */
    public function testThreeDSActionDeserializesFromBothResponseUnionTypes(): void
    {
        $data = (object) ['type' => 'threeDS2'];

        foreach ([PaymentResponseAction::class, PaymentDetailsResponseAction::class] as $type) {
            $action = CheckoutObjectSerializer::deserialize($data, $type);

            self::assertInstanceOf(CheckoutThreeDS2Action::class, $action);
            self::assertSame('threeDS2', $action->getType());
            self::assertEquals($data, CheckoutObjectSerializer::sanitizeForSerialization($action));
        }
    }

    /**
     * A received card payment method exposes its card data directly and preserves the JSON.
     */
    public function testPaymentMethodUsesConcreteCardDetails(): void
    {
        $data = (object) ['type' => 'scheme', 'encryptedCardNumber' => 'test-card'];
        $method = CheckoutObjectSerializer::deserialize($data, CheckoutPaymentMethod::class);

        self::assertInstanceOf(CardDetails::class, $method);
        self::assertSame('test-card', $method->getEncryptedCardNumber());
        self::assertEquals($data, CheckoutObjectSerializer::sanitizeForSerialization($method));
    }

    /**
     * A received donation payment method uses its concrete model and preserves inherited card data.
     */
    public function testDonationPaymentMethodUsesConcreteCardDonations(): void
    {
        $data = (object) ['type' => 'scheme', 'encryptedCardNumber' => 'test-card'];
        $method = CheckoutObjectSerializer::deserialize($data, DonationPaymentMethod::class);

        self::assertInstanceOf(CardDonations::class, $method);
        self::assertSame('test-card', $method->getEncryptedCardNumber());
        self::assertEquals($data, CheckoutObjectSerializer::sanitizeForSerialization($method));
    }
}
