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

use Adyen\Model\Checkout\CheckoutPaymentMethodInterface;
use Adyen\Model\Checkout\CheckoutRedirectAction;
use Adyen\Model\Checkout\CheckoutThreeDS2Action;
use Adyen\Model\Checkout\DonationPaymentMethodInterface;
use Adyen\Model\Checkout\ModelInterface;
use Adyen\Model\Checkout\ObjectSerializer as CheckoutObjectSerializer;
use Adyen\Model\Checkout\PaymentDetailsResponseActionInterface;
use Adyen\Model\Checkout\PaymentResponse;
use Adyen\Model\Checkout\PaymentResponseAction;
use Adyen\Model\Checkout\PaymentResponseActionInterface;
use PHPUnit\Framework\TestCase;

/**
 * Checks Checkout union membership, direct action access, and JSON serialization.
 */
class UnionTypeTest extends TestCase
{
    /**
     * Each Checkout union interface extends the shared model contract.
     */
    public function testUnionInterfacesExtendModelInterface(): void
    {
        foreach ([
            PaymentResponseActionInterface::class,
            PaymentDetailsResponseActionInterface::class,
            CheckoutPaymentMethodInterface::class,
            DonationPaymentMethodInterface::class,
        ] as $interface) {
            self::assertTrue(is_a($interface, ModelInterface::class, true));
        }
    }

    /**
     * A received redirect implements the payment-action interface, exposes its URL, and preserves the JSON.
     */
    public function testRedirectActionImplementsItsUnionInterface(): void
    {
        $data = (object) ['action' => (object) ['type' => 'redirect', 'url' => 'https://example.com']];
        $response = CheckoutObjectSerializer::deserialize($data, PaymentResponse::class);
        $action = $response->getAction();

        self::assertInstanceOf(CheckoutRedirectAction::class, $action);
        self::assertInstanceOf(PaymentResponseActionInterface::class, $action);
        self::assertSame('https://example.com', $action->getUrl());
        self::assertEquals($data, CheckoutObjectSerializer::sanitizeForSerialization($response));
        self::assertSame(
            '\Adyen\Model\Checkout\PaymentResponseAction',
            PaymentResponse::openAPITypes()['action']
        );
    }

    /**
     * Unknown and missing action types use a fallback model that implements the payment-action interface.
     */
    public function testFallbackActionsImplementTheirUnionInterface(): void
    {
        foreach ([(object) ['type' => 'future-action'], (object) []] as $data) {
            $action = CheckoutObjectSerializer::deserialize($data, PaymentResponseAction::class);

            self::assertInstanceOf(PaymentResponseAction::class, $action);
            self::assertInstanceOf(PaymentResponseActionInterface::class, $action);
            self::assertEquals($data, CheckoutObjectSerializer::sanitizeForSerialization($action));
        }
    }

    /**
     * A 3DS action implements both response-action interfaces.
     */
    public function testAnActionCanImplementMultipleUnionInterfaces(): void
    {
        $action = new CheckoutThreeDS2Action(['type' => 'threeDS2']);

        self::assertInstanceOf(PaymentResponseActionInterface::class, $action);
        self::assertInstanceOf(PaymentDetailsResponseActionInterface::class, $action);
    }

    /**
     * A received card payment method implements the payment-method interface and exposes its card data.
     */
    public function testPaymentMethodImplementsItsUnionInterface(): void
    {
        $method = CheckoutObjectSerializer::deserialize(
            (object) ['type' => 'scheme', 'encryptedCardNumber' => 'test-card'],
            '\Adyen\Model\Checkout\CheckoutPaymentMethod'
        );

        self::assertInstanceOf(CheckoutPaymentMethodInterface::class, $method);
        self::assertSame('test-card', $method->getEncryptedCardNumber());
    }
}
