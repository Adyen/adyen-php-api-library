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

namespace Adyen\Tests\Unit\Checkout;

use Adyen\AdyenException;
use Adyen\Service\Checkout\RecurringApi;
use Adyen\Tests\Unit\BaseTest;

class RecurringApiTest extends BaseTest
{

    const HOLDER_NAME = "John Smith";

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDeleteTokenForStoredPaymentDetailsWithHttpInfo()
    {
        $client = $this->createMockSerializerClient(null, 204);
        $config = $this->createConfiguration();
        $service = new RecurringApi($config, $client);

        list($result, $statusCode, $headers) = $service->deleteTokenForStoredPaymentDetailsWithHttpInfo(
            "storedPaymentMethodId",
            "shopperReference",
            "YourMerchantAccount"
        );

        $this->assertNull($result);
        $this->assertSame(204, $statusCode);
        $this->assertIsArray($headers);
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successGetStoredPaymentMethodsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetStoredPaymentMethodsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new RecurringApi($config, $client);

        $result = $service->getTokensForStoredPaymentDetails(
            shopperReference: "411111",
            merchantAccount: "YOUR_MERCHANT_ACCOUNT"
        );

        $storedPaymentMethods = $result->getStoredPaymentMethods();

        $this->assertCount(1, $storedPaymentMethods);
        $this->assertEquals('7219687191761347', $storedPaymentMethods[0]->getId());
        $this->assertEquals('visa', $storedPaymentMethods[0]->getBrand());
        $this->assertEquals('1111', $storedPaymentMethods[0]->getLastFour());
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successGetStoredPaymentMethodsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetStoredPaymentMethodsSuccessArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new RecurringApi($config, $client);

        $resultArray = $service->getTokensForStoredPaymentDetails(
            shopperReference: "411111",
            merchantAccount: "YOUR_MERCHANT_ACCOUNT"
        )->toArray();

        $this->assertEquals('YOUR_MERCHANT_ACCOUNT', $resultArray['merchantAccount']);
        $this->assertEquals(
            array(
                'brand' => 'visa',
                'expiryMonth' => '10',
                'expiryYear' => '30',
                'holderName' => 'John Smith',
                'id' => '7219687191761347',
                'lastFour' => '1111',
                'name' => 'VISA',
                'type' => 'scheme',
            ),
            $resultArray['storedPaymentMethods'][0]
        );
    }

    public static function successGetStoredPaymentMethodsProvider(): array
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
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDeleteStoredPaymentMethodsSuccess($jsonFile, $httpStatus)
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $config = $this->createConfiguration();

        $service = new RecurringApi($config, $client);

         $service->deleteTokenForStoredPaymentDetails(
             storedPaymentMethodId: "123",
             shopperReference: "411111",
             merchantAccount: "YOUR_MERCHANT_ACCOUNT"
         );

        $request = $container[0]['request'];
        $uri = (string) $request->getUri();

        $this->assertEquals('DELETE', $request->getMethod());
        $this->assertStringContainsString('/v72/storedPaymentMethods/123', $uri);
        $this->assertStringContainsString('shopperReference=411111', $uri);
        $this->assertStringContainsString('merchantAccount=YOUR_MERCHANT_ACCOUNT', $uri);
    }

    public static function successDeleteStoredPaymentMethodsProvider(): array
    {
        return array(
            array(null, 204),
        );
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testStoredPaymentMethods()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/storedPaymentMethods-success.json',
            201,
            $container
        );
        $service = new RecurringApi($this->createConfiguration(), $client);

        $storedPaymentMethodRequest = new \Adyen\Model\Checkout\StoredPaymentMethodRequest();
        $storedPaymentMethodRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $storedPaymentMethodRequest->setShopperReference("YOUR_SHOPPER_REFERENCE");
        $storedPaymentMethodRequest->setRecurringProcessingModel("CardOnFile");

        $result = $service->storedPaymentMethods($storedPaymentMethodRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/storedPaymentMethods',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\StoredPaymentMethodResource::class, $result);
        $this->assertEquals('KHQC5N7G84BLNK43', $result->getId());
        $this->assertEquals('1111', $result->getLastFour());
        $this->assertEquals('scheme', $result->getType());
        $this->assertEquals('YOUR_SHOPPER_REFERENCE', $result->getShopperReference());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testStoredPaymentMethodsWithArray()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/storedPaymentMethods-success.json', 201);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'shopperReference' => "YOUR_SHOPPER_REFERENCE",
            'recurringProcessingModel' => "CardOnFile",
        );

        $result = $service->storedPaymentMethods(new \Adyen\Model\Checkout\StoredPaymentMethodRequest($params));

        $this->assertEquals('KHQC5N7G84BLNK43', $result['id']);
        $this->assertEquals('scheme', $result['type']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testStoredPaymentMethodsArrayResponse()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/storedPaymentMethods-success.json', 201);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $storedPaymentMethodRequest = new \Adyen\Model\Checkout\StoredPaymentMethodRequest();
        $storedPaymentMethodRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $resultArray = $service->storedPaymentMethods($storedPaymentMethodRequest)->toArray();

        $this->assertEquals('KHQC5N7G84BLNK43', $resultArray['id']);
        $this->assertEquals('1111', $resultArray['lastFour']);
        $this->assertEquals('scheme', $resultArray['type']);
        $this->assertEquals('YOUR_SHOPPER_REFERENCE', $resultArray['shopperReference']);
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successForwardCardDetailsResponseProvider
     * @throws \Adyen\Exception\AdyenException
     */
    public function testRecurringForward($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new RecurringApi($config, $client);

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

        $checkoutForwardRequest = new \Adyen\Model\Checkout\CheckoutForwardRequest();
        $checkoutForwardRequest->setPaymentMethod($paymentMethod);
        $checkoutForwardRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $checkoutForwardRequest->setShopperReference("411111");
        $checkoutForwardRequest->setBaseUrl("http://thirdparty.example.com");
        $checkoutForwardRequest->setRequest($outgoingForwardRequest);

        $result = $service->forward($checkoutForwardRequest);

        $this->assertEquals("1234567890", $result->getPspReference());
        $this->assertSame(200, $result->getResponse()->getStatus());
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successForwardCardDetailsResponseProvider
     * @throws \Adyen\Exception\AdyenException
     * @throws AdyenException
     */
    public function testRecurringForwardWithArray($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new RecurringApi($config, $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'shopperReference' => "411111",
            'baseUrl' => "http://thirdparty.example.com",
            'paymentMethod' => array(
                'type' => "scheme",
                'number' => "4111111111111111",
                'expiryMonth' => "08",
                'expiryYear' => "2018",
                'holderName' => self::HOLDER_NAME,
                'cvc' => "737",
            ),
            'request' => array(
                'httpMethod' => "post",
                'urlSuffix' => "/payments",
                'credentials' => "YOUR_CREDENTIALS_FOR_THE_THIRD_PARTY",
                'headers' => array("Authorization" => "Basic {{credentials}}"),
                'body' => '{"amount":{"value":100,"currency":"USD"}}',
            ),
        );

        $result = $service->forward(new \Adyen\Model\Checkout\CheckoutForwardRequest($params));

        $this->assertEquals("1234567890", $result['pspReference']);
        $this->assertSame(200, $result['response']['status']);
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successForwardCardDetailsResponseProvider
     * @throws \Adyen\Exception\AdyenException
     * @throws AdyenException
     */
    public function testRecurringForwardArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new RecurringApi($config, $client);

        $checkoutForwardRequest = new \Adyen\Model\Checkout\CheckoutForwardRequest();
        $checkoutForwardRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $checkoutForwardRequest->setShopperReference("411111");
        $checkoutForwardRequest->setBaseUrl("http://thirdparty.example.com");

        $resultArray = $service->forward($checkoutForwardRequest)->toArray();

        $this->assertEquals('1234567890', $resultArray['pspReference']);
        $this->assertIsArray($resultArray['response']);
        $this->assertSame(200, $resultArray['response']['status']);
        $this->assertStringContainsString('tokenizeCreditCard', $resultArray['response']['body']);
    }

    public static function successForwardCardDetailsResponseProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/Recurring/forwardCardDetailsResponse-success.json', 200),
        );
    }
}
