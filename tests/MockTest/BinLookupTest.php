<?php

namespace Adyen\Tests\MockTest;

use Adyen\Unit\TestCaseMock;

class BinLookupTest extends TestCaseMock
{
    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successGetCostEstimateProvider
     * @throws \Adyen\AdyenException
     */
    public function testEstimateIsSuccessful($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\BinLookup($client);

        $params = array(
            "amount" => array(
                "value" => 1234,
                "currency" => "EUR"
            ),
            "assumptions" => array(
                "assumeLevel3Data" => true,
                "assume3DSecureAuthenticated" => true
            ),
            "cardNumber" => "4111111111111111",
            "merchantAccount" => "TestMerchant",
            "merchantDetails" => array(
                "countryCode" => "NL",
                "mcc" => "7411",
                "enrolledIn3DSecure" => true
            ),
            "shopperInteraction" => "Ecommerce"

        );

        $result = $service->getCostEstimate($params);

        $this->assertEquals($result['cardBin']['summary'], 1111);
    }

    /**
     * @return array
     */
    public static function successGetCostEstimateProvider()
    {
        return array(
            array('tests/Resources/BinLookup/getCostEstimate-success.json', 200),
        );
    }
}
