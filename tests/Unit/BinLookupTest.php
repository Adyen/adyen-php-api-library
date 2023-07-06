<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\BinLookup\CostEstimateRequest;
use Adyen\Model\BinLookup\CostEstimateResponse;
use Adyen\Model\BinLookup\ThreeDSAvailabilityRequest;

class BinLookupTest extends TestCaseMock
{
    public function testGet3DSAvailability()
    {
        // create Checkout client
        $client = $this->createMockClientUrl('tests/Resources/BinLookup/3ds-availability.json');

        // initialize service
        $service = new \Adyen\Service\BinLookupApi($client);

        $result = $service->get3dsAvailability(new ThreeDSAvailabilityRequest());
        $this->assertEquals(true, $result->getThreeDs1Supported());
    }

    public function testGetCostEstimate()
    {
        // create Checkout client
        $client = $this->createMockClientUrl('tests/Resources/BinLookup/getCostEstimate-success.json');

        // initialize service
        $service = new \Adyen\Service\BinLookupApi($client);

        $result = $service->getCostEstimate(new CostEstimateRequest());
        $this->assertEquals('Unsupported', $result->getResultCode());
    }
}
