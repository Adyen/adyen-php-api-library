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

    const HOLDER_NAME = "John Smith";
    const RETURN_URL = "https://your-company.com/...";

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
                'holderName' => self::HOLDER_NAME
            ),
            'reference' => "Your order number",
            'returnUrl' => self::RETURN_URL
        );
        $result = $service->payments($params);

        $this->assertEquals('Authorised', $result['resultCode']);
        $this->pspReference = $result['pspReference'];
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
                'holderName' => self::HOLDER_NAME
            ),
            'reference' => "Your order number",
            'returnUrl' => self::RETURN_URL
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
                'holderName' => self::HOLDER_NAME
            ),
            'reference' => "Your order number",
            'returnUrl' => self::RETURN_URL
        );
        $paymentResult = $service->payments($params);

        $donationsParams = array(
            'merchantAccount' => $this->merchantAccount,
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'paymentMethod' => array(
                'type' => "scheme",
                'encryptedCardNumber' => 'test_4111111111111111',
                'encryptedExpiryMonth' => 'test_03',
                'encryptedExpiryYear' => 'test_2030',
                'encryptedSecurityCode' => 'test_737',
                'holderName' => self::HOLDER_NAME
            ),
            'reference' => "Your order number",
            'donationToken' => $paymentResult['donationToken'],
            'donationOriginalPspReference' => $paymentResult['pspReference'],
            'donationAccount' => "AdyenGivingDemo",
            'returnUrl' => self::RETURN_URL,
            'shopperInteraction' => "Ecommerce"
        );
        $result = $service->donations($donationsParams);
        $this->assertEquals('Authorised', $result['payment']['resultCode']);
    }
  
    public function testSessions()
    {
        // create Checkout client
        $client = $this->createCheckoutAPIClient();

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            'amount' => array(
                'currency' => "EUR",
                'value' => 1000
            ),
            'countryCode' => 'NL',
            'merchantAccount' => $this->merchantAccount,
            'returnUrl' => self::RETURN_URL
        );
        $result = $service->sessions($params);

        // Sessions data received
        $this->assertNotEmpty($result['sessionData']);
        $this->assertNotEmpty($result['id']);

        // Payment params are the same as response data
        $keyIntersect = array_intersect_key($params, $result);
        $this->assertEquals($params, $keyIntersect);
    }

    public function testRefunds()
    {
        $this->testPaymentsSuccess();

        // create Checkout client
        $client = $this->createCheckoutAPIClient();

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            "paymentPspReference" => $this->pspReference,
            "amount" => [
                "currency" => "USD",
                "value" => 100
            ]
        );

        $result = $service->refunds($params);

        $this->assertEquals('received', $result['status']);
    }

    public function testReversals()
    {
        $this->testPaymentsSuccess();

        // create Checkout client
        $client = $this->createCheckoutAPIClient();

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            "paymentPspReference" => $this->pspReference,
            "merchantAccount" => $this->merchantAccount,
        );

        $result = $service->reversals($params);

        $this->assertEquals('received', $result['status']);
    }

    public function testCaptures()
    {
        $this->testPaymentsSuccess();

        // create Checkout client
        $client = $this->createCheckoutAPIClient();

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            'paymentPspReference' => $this->pspReference,
            'merchantAccount' => $this->merchantAccount,
            'amount' => [
                'currency' => "EUR",
                'value' => 1000
            ]
        );

        $result = $service->captures($params);

        $this->assertEquals('received', $result['status']);
    }

    public function testCancels()
    {
        $this->testPaymentsSuccess();

        // create Checkout client
        $client = $this->createCheckoutAPIClient();

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            'paymentPspReference' => $this->pspReference,
            'merchantAccount' => $this->merchantAccount,
        );

        $result = $service->cancels($params);

        $this->assertEquals('received', $result['status']);
    }
}
