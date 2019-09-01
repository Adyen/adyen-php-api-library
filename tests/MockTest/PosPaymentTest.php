<?php

namespace Adyen\MockTest;

class PosPaymentTest extends TestCaseMock
{
    /**
    * @param $jsonFile Json file location
    * @param $httpStatus expected http status code
    * @dataProvider resultSuccessGetConnectedTerminals
    */
    public function testGetConnectedTerminalsSuccess($jsonFile, $httpStatus)
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\PosPayment($client);

        $json = '{
            "merchantAccount": "PME_POS"
        }';

        $params = json_decode($json, true);

        $result = $service->getConnectedTerminals($params);
        var_dump($result);

        $this->assertArrayHasKey('uniqueTerminalIds', $result);
    }

    public static function resultSuccessGetConnectedTerminals()
    {
        return array(
            array('tests/Resources/Payment/connected-terminals.json', 200)
        );
    }
}
