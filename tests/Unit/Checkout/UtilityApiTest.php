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
use Adyen\Model\Checkout\Amount;
use Adyen\Model\Checkout\ApplePaySessionRequest;
use Adyen\Model\Checkout\PaypalUpdateOrderRequest;
use Adyen\Model\Checkout\UtilityRequest;
use Adyen\Model\Checkout\ValidateShopperIdRequest;
use Adyen\Service\Checkout\UtilityApi;
use Adyen\Tests\Unit\BaseTest;

class UtilityApiTest extends BaseTest
{
    /**
     * @dataProvider successOriginKeysProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testOriginKeysSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new UtilityApi($config, $client);

        $utilityRequest = new UtilityRequest();
        $utilityRequest->setOriginDomains(array(
            "https://www.your-domain1.com",
            "https://www.your-domain2.com",
            "https://www.your-domain3.com"
        ));

        $result = $service->originKeys($utilityRequest);

        $originKeys = $result->getOriginKeys();
        $this->assertCount(3, $originKeys);
        $this->assertEquals('pubkey_1', $originKeys['https://www.your-domain1.com']);
    }

    /**
     * @dataProvider successOriginKeysProvider
     * @throws \Adyen\Exception\AdyenException|AdyenException
     */
    public function testOriginKeysSuccessWithArray($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new UtilityApi($config, $client);

        $params = array(
            'originDomains' => array(
                "https://www.your-domain1.com",
                "https://www.your-domain2.com",
                "https://www.your-domain3.com"
            )
        );

        $result = $service->originKeys(new UtilityRequest($params));

        $this->assertEquals('pubkey_2', $result['originKeys']['https://www.your-domain2.com']);
    }

    /**
     * @dataProvider successOriginKeysProvider
     * @throws \Adyen\Exception\AdyenException|AdyenException
     */
    public function testOriginKeysSuccessArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new UtilityApi($config, $client);

        $utilityRequest = new UtilityRequest();
        $utilityRequest->setOriginDomains(array("https://www.your-domain1.com"));

        $result = $service->originKeys($utilityRequest);
        $resultArray = $result->toArray();

        $this->assertArrayHasKey('originKeys', $resultArray);
        $this->assertCount(3, $resultArray['originKeys']);
    }

    public static function successOriginKeysProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/originKeys-success.json', 200)
        );
    }

    /**
     * @dataProvider successGetApplePaySessionProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetApplePaySessionSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new UtilityApi($config, $client);

        $applePaySessionRequest = new ApplePaySessionRequest();
        $applePaySessionRequest->setDisplayName("YOUR_MERCHANT_NAME");
        $applePaySessionRequest->setDomainName("www.your-domain.com");
        $applePaySessionRequest->setMerchantIdentifier("YOUR_MERCHANT_IDENTIFIER");

        $result = $service->getApplePaySession($applePaySessionRequest);

        $this->assertNotNull($result->getData());
    }

    /**
     * @dataProvider successGetApplePaySessionProvider
     * @throws \Adyen\Exception\AdyenException|AdyenException
     */
    public function testGetApplePaySessionSuccessWithArray($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new UtilityApi($config, $client);

        $params = array(
            'displayName' => "YOUR_MERCHANT_NAME",
            'domainName' => "www.your-domain.com",
            'merchantIdentifier' => "YOUR_MERCHANT_IDENTIFIER"
        );

        $result = $service->getApplePaySession(new ApplePaySessionRequest($params));

        $this->assertNotNull($result['data']);
    }

    /**
     * @dataProvider successGetApplePaySessionProvider
     * @throws \Adyen\Exception\AdyenException|AdyenException
     */
    public function testGetApplePaySessionSuccessArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new UtilityApi($config, $client);

        $applePaySessionRequest = new ApplePaySessionRequest();
        $applePaySessionRequest->setDisplayName("YOUR_MERCHANT_NAME");
        $applePaySessionRequest->setDomainName("www.your-domain.com");
        $applePaySessionRequest->setMerchantIdentifier("YOUR_MERCHANT_IDENTIFIER");

        $result = $service->getApplePaySession($applePaySessionRequest);
        $resultArray = $result->toArray();

        $this->assertArrayHasKey('data', $resultArray);
    }

    public static function successGetApplePaySessionProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/applePaySession-success.json', 200)
        );
    }

    /**
     * @dataProvider successUpdatesOrderForPaypalExpressCheckoutProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testUpdatesOrderForPaypalExpressCheckoutSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new UtilityApi($config, $client);

        $amount = new Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(1000);

        $paypalUpdateOrderRequest = new PaypalUpdateOrderRequest();
        $paypalUpdateOrderRequest->setPspReference("9JAREMPBJF85QK74");
        $paypalUpdateOrderRequest->setPaymentData("payment_data_123");
        $paypalUpdateOrderRequest->setAmount($amount);

        $result = $service->updatesOrderForPaypalExpressCheckout($paypalUpdateOrderRequest);

        $this->assertEquals('success', $result->getStatus());
        $this->assertEquals('payment_data_123', $result->getPaymentData());
    }

    /**
     * @dataProvider successUpdatesOrderForPaypalExpressCheckoutProvider
     * @throws \Adyen\Exception\AdyenException|AdyenException
     */
    public function testUpdatesOrderForPaypalExpressCheckoutSuccessWithArray($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new UtilityApi($config, $client);

        $params = array(
            'pspReference' => "9JAREMPBJF85QK74",
            'paymentData' => "payment_data_123",
            'amount' => array(
                'currency' => "EUR",
                'value' => 1000
            )
        );

        $result = $service->updatesOrderForPaypalExpressCheckout(new PaypalUpdateOrderRequest($params));

        $this->assertEquals('success', $result['status']);
        $this->assertEquals('payment_data_123', $result['paymentData']);
    }

    /**
     * @dataProvider successUpdatesOrderForPaypalExpressCheckoutProvider
     * @throws \Adyen\Exception\AdyenException|AdyenException
     */
    public function testUpdatesOrderForPaypalExpressCheckoutSuccessArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new UtilityApi($config, $client);

        $paypalUpdateOrderRequest = new PaypalUpdateOrderRequest();
        $paypalUpdateOrderRequest->setPspReference("9JAREMPBJF85QK74");

        $result = $service->updatesOrderForPaypalExpressCheckout($paypalUpdateOrderRequest);
        $resultArray = $result->toArray();

        $this->assertEquals('success', $resultArray['status']);
        $this->assertEquals('payment_data_123', $resultArray['paymentData']);
    }

    public static function successUpdatesOrderForPaypalExpressCheckoutProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/paypalUpdateOrder-success.json', 200)
        );
    }

    /**
     * @dataProvider successValidateShopperIdProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testValidateShopperIdSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new UtilityApi($config, $client);

        $validateShopperIdRequest = new ValidateShopperIdRequest();
        $validateShopperIdRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $validateShopperIdRequest->setShopperReference("YOUR_SHOPPER_REFERENCE");

        $result = $service->validateShopperId($validateShopperIdRequest);

        $this->assertEquals('Shopper is known and trusted', $result->getReason());
    }

    /**
     * @dataProvider successValidateShopperIdProvider
     * @throws \Adyen\Exception\AdyenException|AdyenException
     */
    public function testValidateShopperIdSuccessWithArray($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new UtilityApi($config, $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'shopperReference' => "YOUR_SHOPPER_REFERENCE"
        );

        $result = $service->validateShopperId(new ValidateShopperIdRequest($params));

        $this->assertEquals('Shopper is known and trusted', $result['reason']);
    }

    /**
     * @dataProvider successValidateShopperIdProvider
     * @throws \Adyen\Exception\AdyenException|AdyenException
     */
    public function testValidateShopperIdSuccessArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new UtilityApi($config, $client);

        $validateShopperIdRequest = new ValidateShopperIdRequest();
        $validateShopperIdRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $result = $service->validateShopperId($validateShopperIdRequest);
        $resultArray = $result->toArray();

        $this->assertEquals('Shopper is known and trusted', $resultArray['reason']);
    }

    public static function successValidateShopperIdProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/validateShopperId-success.json', 200)
        );
    }
}
