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
use Adyen\ConnectionException;
use Adyen\Service\Payment;

class PaymentTest extends TestCaseMock
{
    /**
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseSuccessInTestEnvironment($jsonFile, $httpStatus)
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Payment($client);

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
    }

    /**
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseSuccessInLiveEnvironment($jsonFile, $httpStatus)
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus, null, \Adyen\Environment::LIVE);

        // initialize service
        $service = new Payment($client);

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
    }

    public static function successAuthoriseProvider()
    {
        return array(
            array('tests/Resources/Payment/authorise-success.json', 200),
        );
    }

    /**
     * @dataProvider connectionFailureAuthoriseProvider
     */
    public function testAuthoriseConnectionFailure($jsonFile, $httpStatus, $errno)
    {
        $this->expectException(ConnectionException::class);
        $this->expectExceptionCode($errno);
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus, $errno);

        // initialize service
        $service = new Payment($client);

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
     * @dataProvider resultFailureAuthoriseProvider
     */
    public function testAuthoriseResultFailure($jsonFile, $httpStatus, $expectedExceptionMessage)
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Payment($client);

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

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $service->authorise($params);
    }

    public static function resultFailureAuthoriseProvider()
    {
        return array(
            array('tests/Resources/Payment/invalid-merchant-account.json', 403, "Invalid Merchant Account")
        );
    }
}
