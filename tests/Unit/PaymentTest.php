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

use Monolog\Handler\TestHandler;
use Monolog\Logger;

class PaymentTest extends TestCaseMock
{
    /**
     * @param $jsonFile Json file location
     * @param $httpStatus expected http status code
     *
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseSuccessInTestEnvironment($jsonFile, $httpStatus)
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $handler = new TestHandler();

        $logger = new Logger('test', array($handler));

        // Stub Logger to prevent full card data being logged
        $client->setLogger($logger);

        // initialize service
        $service = new \Adyen\Service\Payment($client);

        $json = '{
              "card": {
                "number": "4111111111111111",
                "expiryMonth": "08",
                "expiryYear": "2018",
                "cvc": "737",
                "holderName": "John Smith"
              },
              "amount": {
                "value": 1500,
                "currency": "EUR"
              },
              "reference": "payment-test",
              "merchantAccount": "YourMerchantReference",
              "additionalData": {
                "card.encrypted.json" : "adyenjs...."
              }
            }';

        $params = json_decode($json, true);

        $result = $service->authorise($params);

        $this->assertArrayHasKey('resultCode', $result);
        $this->assertEquals('Authorised', $result['resultCode']);

        $this->assertTrue($handler->hasInfoThatContains('4111111111111111'));
        $this->assertTrue($handler->hasInfoThatContains('737'));
        $this->assertTrue($handler->hasInfoThatContains('adyenjs....'));
    }

    /**
     * @param $jsonFile Json file location
     * @param $httpStatus expected http status code
     *
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseSuccessInLiveEnvironment($jsonFile, $httpStatus)
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus, null, \Adyen\Environment::LIVE);

        $handler = new TestHandler();

        $logger = new Logger('test', array($handler));

        // Stub Logger to prevent full card data being logged
        $client->setLogger($logger);

        // initialize service
        $service = new \Adyen\Service\Payment($client);

        $json = '{
              "card": {
                "number": "4111111111111111",
                "expiryMonth": "08",
                "expiryYear": "2018",
                "cvc": "737",
                "holderName": "John Smith"
              },
              "amount": {
                "value": 1500,
                "currency": "EUR"
              },
              "reference": "payment-test",
              "merchantAccount": "YourMerchantReference",
              "additionalData": {
                "card.encrypted.json" : "adyenjs_0897248234342242524232...."
              }
            }';

        $params = json_decode($json, true);

        $result = $service->authorise($params);

        $this->assertArrayHasKey('resultCode', $result);
        $this->assertEquals('Authorised', $result['resultCode']);

        $this->assertFalse($handler->hasInfoThatContains('4111111111111111'));
        $this->assertFalse($handler->hasInfoThatContains('737'));
        $this->assertFalse($handler->hasInfoThatContains('adyenjs_0897248234342242524232...'));
    }

    public static function successAuthoriseProvider()
    {
        return array(
            array('tests/Resources/Payment/authorise-success.json', 200),
        );
    }


    /**
     * @param $jsonFile Json file location
     * @param $httpStatus expected http status code
     * @param $errno
     * @param $expectedExceptionMessage
     * @dataProvider connectionFailureAuthoriseProvider
     */
    public function testAuthoriseConnectionFailure($jsonFile, $httpStatus, $errno, $expectedExceptionMessage)
    {
        $this->expectException('Adyen\ConnectionException');
        $this->expectExceptionMessage($expectedExceptionMessage);
        $this->expectExceptionCode($errno);
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus, $errno);

        // initialize service
        $service = new \Adyen\Service\Payment($client);

        $json = '{
              "card": {
                "number": "4111111111111111",
                "expiryMonth": "08",
                "expiryYear": "2018",
                "cvc": "737",
                "holderName": "John Smith"
              },
              "amount": {
                "value": 1500,
                "currency": "EUR"
              },
              "reference": "payment-test",
              "merchantAccount": "YourMerchantReference"
            }';

        $params = json_decode($json, true);

        $service->authorise($params);
        $this->fail();
    }

    public static function connectionFailureAuthoriseProvider()
    {
        return array(
            array(null, null, CURLE_OK, "Probably your Web Service username and/or password is incorrect"),
            array(null, null, CURLE_OPERATION_TIMEOUTED, "Could not connect to Adyen"),
            array(null, null, CURLE_SSL_CACERT, "Could not verify Adyen's SSL certificate"),
            array(null, null, 12345, "Unexpected error communicating with Adyen.")
        );
    }

    /**
     * @param $jsonFile Json file location
     * @param $httpStatus expected http status code
     * @param $expectedExceptionMessage
     * @dataProvider resultFailureAuthoriseProvider
     */
    public function testAuthoriseResultFailure($jsonFile, $httpStatus, $expectedExceptionMessage)
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Payment($client);

        $json = '{
              "card": {
                "number": "4111111111111111",
                "expiryMonth": "08",
                "expiryYear": "2018",
                "cvc": "737",
                "holderName": "John Smith"
              },
              "amount": {
                "value": 1500,
                "currency": "EUR"
              },
              "reference": "payment-test",
              "merchantAccount": "YourMerchantReference"
            }';

        $params = json_decode($json, true);

        try {
            $result = $service->authorise($params);
            $this->fail();
        } catch (\Exception $e) {
            $this->assertInstanceOf('Adyen\AdyenException', $e);
            $this->assertStringContainsString($expectedExceptionMessage, $e->getMessage());
            if ($httpStatus != null) {
                $this->assertEquals($httpStatus, $e->getStatus());
            }
        }
    }

    public static function resultFailureAuthoriseProvider()
    {
        return array(
            array('tests/Resources/Payment/invalid-merchant-account.json', 403, "Invalid Merchant Account")
        );
    }
}
