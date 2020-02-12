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

namespace Adyen;

use Adyen\Util\Uuid;

class CheckoutTest extends TestCase
{
    public function testPaymentMethods()
    {
        $client = $this->createCheckoutAPIClient();

        $service = new Service\Checkout($client);

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

        $service = new Service\Checkout($client);

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
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            'merchantAccount' => $this->merchantAccount,
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'paymentMethod' => array(
                'type' => "scheme",
                'number' => "4111111111111111",
                'expiryMonth' => "08",
                'expiryYear' => "2018",
                'holderName' => "John Smith",
                'cvc' => "737"
            ),
            'reference' => "Your order number",
            'returnUrl' => "https://your-company.com/..."
        );
        $result = $service->payments($params);

        $this->assertEquals($result['resultCode'], 'Authorised');
    }

    public function testPaymentsSuccessWithIdempotencyKey()
    {
        // create Checkout client
        $client = $this->createCheckoutAPIClient();

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            'merchantAccount' => $this->merchantAccount,
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'paymentMethod' => array(
                'type' => "scheme",
                'number' => "4111111111111111",
                'expiryMonth' => "08",
                'expiryYear' => "2018",
                'holderName' => "John Smith",
                'cvc' => "737"
            ),
            'reference' => "Your order number",
            'returnUrl' => "https://your-company.com/..."
        );

        // create idempotency-key

        $uuid = Uuid::generateV4();
        $requestOptions['idempotencyKey'] = $uuid;

        $result = $service->payments($params, $requestOptions);
        $pspReference = $result['pspReference'];

        $this->assertEquals($result['resultCode'], 'Authorised');


        // create the same request we expect the same pspreference response
        $secondResult = $service->payments($params, $requestOptions);
        $this->assertEquals($pspReference, $secondResult['pspReference']);
    }
}
