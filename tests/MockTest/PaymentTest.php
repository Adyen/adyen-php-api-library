<?php

namespace Adyen\MockTest;

use Monolog\Handler\StreamHandler;

class PaymentTest extends TestCaseMock
{
    /**
     * @param $jsonFile Json file location
     * @param $httpStatus expected http status code
     *
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseSuccess($jsonFile, $httpStatus)
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // Set Logger on level INFO and capture on memory
        $stream = fopen('php://memory','r+');
        $client->getLogger()->pushHandler(new StreamHandler($stream, \Monolog\Logger::INFO));

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

        $result = $service->authorise($params);

        // Rewind the stream and save the INFO logs in a variable
        rewind($stream);
        $infoLogs = stream_get_contents($stream);
        fclose($stream);

        $this->assertArrayHasKey('resultCode', $result);
        $this->assertEquals('Authorised', $result['resultCode']);
        $this->assertContains("JSON Request to Adyen:{\"card\":{\"number\"", $infoLogs);
        $this->assertNotContains("4111111111111111", $infoLogs);
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

        try {
            $result = $service->authorise($params);
            $this->fail();
        } catch (\Exception $e) {
            $this->assertEquals('Adyen\ConnectionException', get_class($e));
            $this->assertContains($expectedExceptionMessage, $e->getMessage());
            if ($httpStatus != null) {
                $this->assertEquals($httpStatus, $e->getCode());
            }
        }
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
            $this->assertEquals('Adyen\AdyenException', get_class($e));
            $this->assertContains($expectedExceptionMessage, $e->getMessage());
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