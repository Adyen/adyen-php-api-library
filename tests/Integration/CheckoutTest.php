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

namespace Adyen\Tests\Integration;

use Adyen\Service\Checkout;
use Adyen\Tests\TestCase;
use Adyen\Util\Uuid;

class CheckoutTest extends TestCase
{
    /**
     * Can hold the last pspReference for cancelling an order
     * @var string $pspReference
     */
    private $pspReference = null;

    /**
     * Can hold the last orderData for cancelling an order
     * @var string $orderData
     */
    private $orderData = null;

    public function testPaymentMethods()
    {
        $client = $this->createCheckoutAPIClient();

        $service = new Checkout($client);

        $params = array(
            'amount' => array(
                'currency' => "EUR",
                'value' => 1000
            ),
            'countryCode' => 'NL',
            'shopperLocale' => 'nl_NL',
            'merchantAccount' => $this->merchantAccount,
        );

        $result = $service->paymentMethods($params);

        $this->assertIsArray($result);

        // needs to have Ideal in result because country is netherlands
        $hasIdeal = false;
        foreach ($result['paymentMethods'] as $paymentMethod) {
            if ($paymentMethod['type'] == 'ideal') {
                $hasIdeal = true;
            }
        }

        $this->assertEquals(true, $hasIdeal);
    }

    public function testBlockedPaymentMethods()
    {
        $client = $this->createCheckoutAPIClient();

        $service = new Checkout($client);

        $params = array(
            'amount' => 1000,
            'countryCode' => 'NL',
            'shopperLocale' => 'nl_NL',
            'merchantAccount' => $this->merchantAccount,
            'blockedPaymentMethods' => array('ideal'),
        );

        $result = $service->paymentMethods($params);

        $this->assertIsArray($result);

        $hasIdeal = false;
        foreach ($result['paymentMethods'] as $paymentMethod) {
            if ($paymentMethod['type'] == 'ideal') {
                $hasIdeal = true;
            }
        }

        $this->assertFalse($hasIdeal);
    }

    public function testPaymentsSuccess()
    {
        // create Checkout client
        $client = $this->createCheckoutAPIClient();

        // initialize service
        $service = new Checkout($client);

        $params = array(
            'merchantAccount' => $this->merchantAccount,
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'paymentMethod' => array(
                'type' => "scheme",
                'encryptedCardNumber' => 'test_4111111111111111',
                'encryptedExpiryMonth' => 'test_03',
                'encryptedExpiryYear' => 'test_2030',
                'encryptedSecurityCode' => 'test_737',
                'holderName' => "John Smith"
            ),
            'reference' => "Your order number",
            'returnUrl' => "https://your-company.com/..."
        );
        $result = $service->payments($params);

        $this->assertEquals('Authorised', $result['resultCode']);
    }

    public function testPaymentsSuccessWithIdempotencyKey()
    {
        // create Checkout client
        $client = $this->createCheckoutAPIClient();

        // initialize service
        $service = new Checkout($client);

        $params = array(
            'merchantAccount' => $this->merchantAccount,
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'paymentMethod' => array(
                'type' => "scheme",
                'encryptedCardNumber' => 'test_4111111111111111',
                'encryptedExpiryMonth' => 'test_03',
                'encryptedExpiryYear' => 'test_2030',
                'encryptedSecurityCode' => 'test_737',
                'holderName' => "John Smith"
            ),
            'reference' => "Your order number",
            'returnUrl' => "https://your-company.com/..."
        );

        // create idempotency-key

        $uuid = Uuid::generateV4();
        $requestOptions['idempotencyKey'] = $uuid;

        $result = $service->payments($params, $requestOptions);

        $this->assertEquals('Authorised', $result['resultCode']);

        // create the same request we expect the same pspreference response
        $secondResult = $service->payments($params, $requestOptions);
        $this->assertEquals($result['pspReference'], $secondResult['pspReference']);
    }

    public function testPaymentMethodsBalance()
    {
        // create Checkout client
        $client = $this->createCheckoutAPIClient();

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = [
            'paymentMethod'   => [
                'type'       => 'vvvgiftcard',
                'number'     => '6064364240000000000',
                'cvc'        => '737373',
                'holderName' => 'balance EUR 100',
            ],
            'merchantAccount' => $this->merchantAccount,
            'reference'       => 'Your order number',
        ];
        $result = $service->paymentMethodsBalance($params);

        $this->assertEquals('Success', $result['resultCode']);
        $this->assertEquals(100, $result['balance']['value']);
    }

    public function testOrders()
    {
        // create Checkout client
        $client = $this->createCheckoutAPIClient();

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = [
            'amount'          => [
                'value'    => 2500,
                'currency' => 'EUR',
            ],
            'merchantAccount' => $this->merchantAccount,
            'reference'       => 'Your order number',
        ];
        $result = $service->orders($params);

        $this->assertEquals('Success', $result['resultCode']);
        $this->assertEquals(2500, $result['remainingAmount']['value']);
        $this->pspReference = $result['pspReference'];
        $this->orderData    = $result['orderData'];
    }

    public function testOrdersCancel()
    {
        // We need to create an order so we can test cancel
        if ($this->pspReference === null || $this->orderData === null) {
            $this->testOrders();
        }

        // create Checkout client
        $client = $this->createCheckoutAPIClient();

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = [
            'order'           => [
                'pspReference' => $this->pspReference,
                'orderData'    => $this->orderData,
            ],
            'merchantAccount' => $this->merchantAccount,
        ];
        $result = $service->ordersCancel($params);

        $this->assertEquals('Received', $result['resultCode']);
    }

    public function testDonationsSuccess()
    {
        // create Checkout client
        $client = $this->createCheckoutAPIClient();

        // initialize service
        $service = new Checkout($client);
        // the transaction from which the donation token is generated.
        $params = array(
            'merchantAccount' => $this->merchantAccount,
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'paymentMethod' => array(
                'type' => "scheme",
                'encryptedCardNumber' => 'test_4111111111111111',
                'encryptedExpiryMonth' => 'test_03',
                'encryptedExpiryYear' => 'test_2030',
                'encryptedSecurityCode' => 'test_737',
                'holderName' => "John Smith"
            ),
            'reference' => "Your order number",
            'returnUrl' => "https://your-company.com/..."
        );
        $paymentResult = $service->payments($params);

        $params = array(
            'merchantAccount' => $this->merchantAccount,
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'paymentMethod' => array(
                'type' => "scheme",
                'encryptedCardNumber' => 'test_4111111111111111',
                'encryptedExpiryMonth' => 'test_03',
                'encryptedExpiryYear' => 'test_2030',
                'encryptedSecurityCode' => 'test_737',
                'holderName' => "John Smith"
            ),
            'reference' => "Your order number",
            'donationToken' => $paymentResult['donationToken'],
            'donationOriginalPspReference' => $paymentResult['pspReference'],
            'donationAccount' => $this->merchantAccount,
            'returnUrl' => "https://your-company.com/...",
            'shopperInteraction' => "Ecommerce"
        );
        $result = $service->donations($params);

        $this->assertEquals('Authorised', $result['resultCode']);
    }
}
