<?php

namespace Adyen\Tests\MockTest;

use Adyen\MockTest\TestCaseMock;

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

        $result = $service->getCostEstimate(array(
            'amount' => array(
                'value' => 4321,
                'currency' => 'EUR'
            )
        ));

        $this->assertEquals($result['amount']['value'], 1234);
        $this->assertEquals($result['amount']['currency'], 'EUR');
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
