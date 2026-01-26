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

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Service\Checkout;
use function PHPUnit\Framework\assertContains;
use function PHPUnit\Framework\assertEquals;

class CheckoutTest extends TestCaseMock
{
    const NO_CHECKOUT_KEY = "Please provide a valid Checkout API Key";
    const HOLDER_NAME = "John Smith";
    const RETURN_URL = "https://your-company.com/...";
    /**
     * @dataProvider successPaymentMethodsProvider
     */
    public function testPaymentMethodsSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Checkout($client);

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
     * @dataProvider failurePaymentMethodsMissingIdentifierOnLiveProvider
     */
    public function testPaymentMethodsFailureMissingIdentifierOnLive($jsonFile, $httpStatus, $expectedExceptionMessage)
    {
        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $client->setEnvironment(\Adyen\Environment::LIVE);

        $service = new Checkout($client);
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
        $service = new Checkout($client);

        $params = array('merchantAccount' => "YourMerchantAccount");

        $this->expectException(AdyenException::class);
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
     * @dataProvider successPaymentsProvider
     */
    public function testPaymentsSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient(__DIR__ . '/../../' . $jsonFile, $httpStatus);

        // initialize service
        $service = new Checkout($client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'paymentMethod' => array(
                'type' => "scheme",
                'number' => "4111111111111111",
                'expiryMonth' => "08",
                'expiryYear' => "2018",
                'holderName' => self::HOLDER_NAME,
                'cvc' => "737"
            ),
            'reference' => "Your order number",
            'returnUrl' => self::RETURN_URL,
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
     * @dataProvider failurePaymentsProvider
     */
    public function testPaymentsFailure($jsonFile, $httpStatus, $expectedExceptionMessage)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Checkout($client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'paymentMethod' => array(
                'type' => "scheme",
                'encryptedCardNumber' => 'test_4111111111111111',
                'encryptedExpiryMonth' => 'test_03',
                'encryptedExpiryYear' => 'test_2030',
                'encryptedSecurityCode' => 'test_737',
                'holderName' => self::HOLDER_NAME
            ),
            'returnUrl' => self::RETURN_URL
        );

        $params['reference'] = 'yourownreference';

        $this->expectException(AdyenException::class);
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
     * @dataProvider successPaymentsDetailsProvider
     */
    public function testPaymentsDetailsSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Checkout($client);

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
     * @dataProvider successPaymentSessionProvider
     */
    public function testPaymentSessionSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Checkout($client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'countryCode' => "NL",
            'reference' => "Your order number",
            'returnUrl' => self::RETURN_URL,
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
     * @dataProvider successPaymentsResultProvider
     */
    public function testPaymentsResultSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Checkout($client);

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
     * @dataProvider successPaymentsLinkProvider
     */
    public function testPaymentLinksSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new Checkout($client);

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

    public static function successPaymentsLinkProvider()
    {
        return array(
            array('tests/Resources/Checkout/payment-links-success.json', 200)
        );
    }

    public function testPaymentLinksExpired()
    {
        $client = $this->createMockClient('tests/Resources/Checkout/payment-links-expired.json', 200);

        $service = new Checkout($client);

        $params = array(
            'status' => "expired"
        );

        $result = $service->updatePaymentLinks('linkid', $params);

        $this->assertEquals('expired', $result['status']);
    }

    public function testPaymentLinksRetrieveSuccess()
    {
        $client = $this->createMockClient('tests/Resources/Checkout/payment-links-success.json', 200);

        $service = new Checkout($client);

        $result = $service->retrievePaymentLinks('linkId');

        $this->assertStringContainsString('payByLink.shtml', $result['url']);
    }

    public function testPaymentLinksInvalid()
    {
        $client = $this->createMockClient('tests/Resources/Checkout/payment-links-invalid.json', 422);

        $service = new Checkout($client);

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

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('Reference Missing');

        $service->paymentLinks($params);
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successDonationsProvider
     */
    public function testDonationsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new Checkout($client);

        $params = array(
            'amount' => array('currency' => "BRL", 'value' => 1250),
            'reference' => '12345',
            'merchantAccount' => "YourMerchantAccount",
            'paymentMethod' => array(
                'type' => "scheme",
                'encryptedCardNumber' => 'test_4111111111111111',
                'encryptedExpiryMonth' => 'test_03',
                'encryptedExpiryYear' => 'test_2030',
                'encryptedSecurityCode' => 'test_737',
                'holderName' => self::HOLDER_NAME
            ),
            'donationToken' => "YOUR_DONATION_TOKEN",
            'donationOriginalPspReference' => "991559660454807J",
            'donationAccount' => "CHARITY_ACCOUNT",
            'returnUrl' => self::RETURN_URL,
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'shopperInteraction' => "Ecommerce"
        );

        $result = $service->donations($params);
        $this->assertStringContainsString($result['additionalData']['merchantReference'], 'YOUR_DONATION_REFERENCE');
        $this->assertStringContainsString($result['pspReference'], '853589530367661E');
        $this->assertStringContainsString($result['response'], '[donation-received]');
    }

    public static function successDonationsProvider()
    {
        return array(
            array('tests/Resources/Checkout/donations-success.json', 200),
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

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successSessionsProvider
     */
    public function testSessionsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new Checkout($client);

        $params = array (
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'amount' =>
                array (
                    'value' => 100,
                    'currency' => 'EUR',
                ),
            'returnUrl' => 'https://your-company.com/checkout?shopperOrder=12xy..',
            'reference' => 'YOUR_PAYMENT_REFERENCE',
            'countryCode' => 'NL',
        );

        $result = $service->sessions($params);

        $this->assertNotNull($result['sessionData']);
    }

    public static function successSessionsProvider()
    {
        return array(
            array('tests/Resources/Checkout/sessions-success.json', 200),
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider invalidSessionsProvider
     */
    public function testSessionsInvalid($jsonFile, $httpStatus, $expectedExceptionMessage)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new Checkout($client);

        $params = array (
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'returnUrl' => 'https://your-company.com/checkout?shopperOrder=12xy..',
            'reference' => 'YOUR_PAYMENT_REFERENCE',
            'countryCode' => 'NL',
        );

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $service->sessions($params);
    }

    public static function invalidSessionsProvider()
    {
        return array(
            array('tests/Resources/Checkout/sessions-invalid.json', 422, 'Required field \'amount\' is null'),
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successCardDetailsProvider
     */
    public function testCardDetailsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new Checkout($client);
        $params = array (
            "merchantAccount" => "YOUR_MERCHANT_ACCOUNT",
            "cardNumber" => "411111",
        );

        $result = $service->cardDetails($params);

        $this->assertNotNull($result['brands']);
    }

    public static function successCardDetailsProvider()
    {
        return array(
            array('tests/Resources/Checkout/cardDetails-success.json', 200),
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successGetStoredPaymentMethodsProvider
     */
    public function testGetStoredPaymentMethodsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new Checkout($client);
        $queryParams = array (
            "merchantAccount" => "YOUR_MERCHANT_ACCOUNT",
            "shopperReference" => "411111",
        );

        $result = $service->getStoredPaymentMethods($queryParams);

        $this->assertNotNull($result['storedPaymentMethods']);
    }

    public static function successGetStoredPaymentMethodsProvider()
    {
        return array(
            array('tests/Resources/Checkout/getStoredPaymentMethods-success.json', 200),
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successDeleteStoredPaymentMethodsProvider
     */
    public function testDeleteStoredPaymentMethodsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new Checkout($client);
        $queryParams = array (
            "merchantAccount" => "YOUR_MERCHANT_ACCOUNT",
            "shopperReference" => "411111",
        );

        $result = $service->deleteStoredPaymentMethods("123", $queryParams);

        $this->assertNotNull($result['brand']);
    }

    public static function successDeleteStoredPaymentMethodsProvider()
    {
        return array(
            array('tests/Resources/Checkout/deleteStoredPaymentMethods-success.json', 200),
        );
    }

    public function testDoublePathParamSubstitution()
    {
        $client = $this->createMockClientUrl('tests/Resources/ModelBasedCheckout/sessions-success.json');
        $resource = new Checkout($client);
        $resource->captures(array('paymentPspReference' => 'pspRef1'));
        $resource->captures(array('paymentPspReference' => 'pspRef2'));
        assertEquals($this->requestUrl, 'https://checkout-test.adyen.com/v71/payments/pspRef2/captures');
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successForwardCardDetailsResponseProvider
     */
    public function testRecurringForward($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $service = new Checkout\RecurringApi($client);

        $paymentMethod = new \Adyen\Model\Checkout\CheckoutForwardRequestCard();
        $paymentMethod->setType("scheme");
        $paymentMethod->setNumber("4111111111111111");
        $paymentMethod->setExpiryMonth("08");
        $paymentMethod->setExpiryYear("2018");
        $paymentMethod->setHolderName(self::HOLDER_NAME);
        $paymentMethod->setCvc("737");

        $headers = [
            "Authorization" => "Basic {{credentials}}"
        ];

        $body = <<<JSON
        {
            "amount": {
                "value": 100,
                "currency": "USD"
            }
        }
        JSON;

        $outgoingForwardRequest = new \Adyen\Model\Checkout\CheckoutOutgoingForwardRequest();
        $outgoingForwardRequest->setBody($body);
        $outgoingForwardRequest->setHttpMethod("post");
        $outgoingForwardRequest->setUrlSuffix("/payments");
        $outgoingForwardRequest->setCredentials("YOUR_CREDENTIALS_FOR_THE_THIRD_PARTY");
        $outgoingForwardRequest->setHeaders($headers);

        $params = new \Adyen\Model\Checkout\CheckoutForwardRequest();
        $params->setPaymentMethod($paymentMethod);
        $params->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $params->setShopperReference("411111");
        $params->setBaseUrl("http://thirdparty.example.com");
        $params->setRequest($outgoingForwardRequest);

        $result = $service->forward($params);

        $this->assertEquals("1234567890", $result['pspReference']);
        $this->assertEquals("200", $result['response']['status']);
    }

    public static function successForwardCardDetailsResponseProvider()
    {
        return array(
            array('tests/Resources/Checkout/Recurring/forwardCardDetailsResponse-success.json', 200),
        );
    }
}
