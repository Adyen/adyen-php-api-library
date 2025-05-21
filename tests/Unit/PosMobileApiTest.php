<?php

namespace Adyen\Tests\Unit;

use Adyen\Service\PosMobileApi;
use Adyen\Model\PosMobile\CreateSessionRequest;
use Adyen\Environment;

class PosMobileApiTest extends TestCaseMock
{

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider posMobileApiProvider
     * @throws \Adyen\AdyenException
     */
    public function testCreateCommunicationSessionSuccess($jsonFile, $httpStatus): void
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus, $environment = Environment::LIVE);


        // initialize service
        $service = new PosMobileApi($client);

        $json = '{
            "merchantAccount": "YOUR_MERCHANT_ACCOUNT",
            "setupToken": "SETUP_TOKEN",
            "store": "YOUR_STORE_ID"
        }';

        //$params = json_decode($json, true);
        $params = new CreateSessionRequest(json_decode($json, true));

        $result = $service->createCommunicationSession($params);

        $this->assertEquals('APP_SESSION_ID', $result->getId());
    }

   
    public static function posMobileApiProvider()
    {
        return array(
            array('tests/Resources/PosMobileApp/create-auth-session.json', 200),
        );
    }
}
