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

namespace Adyen\Unit;

class CheckoutTest extends TestCaseMock
{
    const NO_CHECKOUT_KEY = "Please provide a valid Checkout API Key";

    /**
     * @param $jsonFile Json file location
     * @param $httpStatus expected http status code
     *
     * @dataProvider successPaymentMethodsProvider
     */
    public function testPaymentMethodsSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = array('merchantAccount' => "YourMerchantAccount");
        $result = $service->paymentMethods($params);

        $this->assertArrayHasKey('paymentMethods', $result);
    }

    public static function successPaymentMethodsProvider()
    {
        return array(
            array('tests/Resources/Checkout/payment-methods-success.json', 200)
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @param $expectedExceptionMessage
     * @throws \Adyen\AdyenException
     * @dataProvider failurePaymentMethodsMissingIdentifierOnLiveProvider
     */
    public function testPaymentMethodsFailureMissingIdentifierOnLive($jsonFile, $httpStatus, $expectedExceptionMessage)
    {
        $this->expectException('Adyen\AdyenException');
        $this->expectExceptionMessage($expectedExceptionMessage);
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $client->setEnvironment(\Adyen\Environment::LIVE);

        $service = new \Adyen\Service\Checkout($client);
        $params = array('merchantAccount' => "YourMerchantAccount");
        $service->paymentMethods($params);
    }

    public static function failurePaymentMethodsMissingIdentifierOnLiveProvider()
    {
        return array(
            array(
                'tests/Resources/Checkout/payment-methods-success.json',
                null,
                'Please provide your unique live url prefix on the ' .
                'setEnvironment() call on the Client or provide ' .
                'endpointCheckout in your config object.'
            )
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @param $expectedExceptionMessage
     * @dataProvider failurePaymentMethodsProvider
     */
    public function testPaymentMethodsFailure(
        $jsonFile,
        $httpStatus,
        $expectedExceptionMessage
    ) {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        if ($expectedExceptionMessage == self::NO_CHECKOUT_KEY) {
            $client->setXApiKey("");
        }
        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = array('merchantAccount' => "YourMerchantAccount");

        $this->expectException('Adyen\AdyenException');
        $this->expectExceptionMessage($expectedExceptionMessage);
        $service->paymentMethods($params);
    }

    public static function failurePaymentMethodsProvider()
    {
        return array(
            array('tests/Resources/Checkout/invalid-merchant-account.json', 403, "Invalid Merchant Account"),
            array('tests/Resources/Checkout/payment-methods-forbidden.json', null, "Forbidden"),
            array(null, null, self::NO_CHECKOUT_KEY)
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     *
     * @dataProvider successPaymentsProvider
     *
     */
    public function testPaymentsSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient(__DIR__ . '/../../' . $jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
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
            'returnUrl' => "https://your-company.com/...",
            'additionalData' => array(
                'executeThreeD' => true
            )
        );
        $result = $service->payments($params);

        $this->assertContains($result['resultCode'], array('Authorised', 'RedirectShopper'));
    }

    public static function successPaymentsProvider()
    {
        return array(
            array('tests/Resources/Checkout/payments-success.json', 200),
            array('tests/Resources/Checkout/payments-success-3D.json', 200)
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @param $expectedExceptionMessage
     * @dataProvider failurePaymentsProvider
     *
     */
    public function testPaymentsFailure($jsonFile, $httpStatus, $expectedExceptionMessage)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'paymentMethod' => array(
                'type' => "scheme",
                'number' => "4111111111111111",
                'expiryMonth' => "08",
                'expiryYear' => "2018",
                'holderName' => "John Smith",
                'cvc' => "737"
            ),
            'returnUrl' => "https://your-company.com/..."
        );

        $params['reference'] = 'yourownreference';

        $this->expectException('Adyen\AdyenException');
        $this->expectExceptionMessage($expectedExceptionMessage);
        $service->payments($params);
    }


    public static function failurePaymentsProvider()
    {
        return array(
            array('tests/Resources/Checkout/invalid-merchant-account.json', 403, "Invalid Merchant Account"),
            array('tests/Resources/Checkout/payments-forbidden.json', null, "Forbidden")
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     *
     * @dataProvider successPaymentsDetailsProvider
     *
     */
    public function testPaymentsDetailsSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'paymentData' => 'Ab02b4c0!BQABAgCJN1wRZuGJmq8dMncmypvknj9s7l5Tj...',
            'details' => array(
                'MD' => 'sdfsdfsdf...',
                'PaRes' => 'sdkfhskdjfsdf...'
            ),
        );

        $result = $service->paymentsDetails($params);

        $this->assertContains($result['resultCode'], array('Authorised'));
    }

    public static function successPaymentsDetailsProvider()
    {
        return array(
            array('tests/Resources/Checkout/payments-details-success.json', 200)
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     *
     * @dataProvider successPaymentSessionProvider
     *
     */
    public function testPaymentSessionSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'countryCode' => "NL",
            'reference' => "Your order number",
            'returnUrl' => "https://your-company.com/",
            "sdkVersion" => "1.3.0"
        );

        $result = $service->paymentSession($params);

        $this->assertArrayHasKey("paymentSession", $result);
    }

    public static function successPaymentSessionProvider()
    {
        return array(
            array('tests/Resources/Checkout/payment-session-success.json', 200)
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     *
     * @dataProvider successPaymentsResultProvider
     *
     */
    public function testPaymentsResultSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            'payload' => "YourPayload"
        );

        $result = $service->paymentsResult($params);

        $this->assertContains($result['resultCode'], array('Authorised'));
    }

    public static function successPaymentsResultProvider()
    {
        return array(
            array('tests/Resources/Checkout/payments-result-success.json', 200)
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successPaymentLinksProvider
     */
    public function testPaymentLinksSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'reference' => '12345',
            'amount' => array('currency' => "BRL", 'value' => 1250),
            'countryCode' => "BR",
            'shopperReference' => "YourUniqueShopperId",
            'shopperEmail' => "test@email.com",
            'shopperLocale' => "pt_BR",
            'billingAddress' => $this->getExampleAddressStruct(),
            'deliveryAddress' => $this->getExampleAddressStruct(),
        );

        $result = $service->paymentLinks($params);

        $this->assertStringContainsString('payByLink.shtml', $result['url']);
    }

    public static function successPaymentLinksProvider()
    {
        return array(
            array('tests/Resources/Checkout/payment-links-success.json', 200),
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider invalidPaymentLinksProvider
     */
    public function testPaymentLinksInvalid($jsonFile, $httpStatus, $expectedExceptionMessage)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'amount' => array('currency' => "BRL", 'value' => 1250),
            'countryCode' => "BR",
            'shopperReference' => "YourUniqueShopperId",
            'shopperEmail' => "test@email.com",
            'shopperLocale' => "pt_BR",
            'billingAddress' => $this->getExampleAddressStruct(),
            'deliveryAddress' => $this->getExampleAddressStruct(),
        );

        $this->expectException('Adyen\AdyenException');
        $this->expectExceptionMessage($expectedExceptionMessage);

        $service->paymentLinks($params);
    }

    public static function invalidPaymentLinksProvider()
    {
        return array(
            array('tests/Resources/Checkout/payment-links-invalid.json', 422, 'Reference Missing'),
        );
    }

    private function getExampleAddressStruct()
    {
        return array(
            'street' => "Roque Petroni Jr",
            'postalCode' => "59000060",
            'city' => "São Paulo",
            'houseNumberOrName' => "999",
            'country' => "BR",
            'stateOrProvince' => "SP",
        );
    }
}
