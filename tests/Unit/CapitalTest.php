<?php

namespace Adyen\Tests\Unit;

class CapitalTest extends TestCaseMock
{
    public function testGetCapitalAccount()
    {
        // create Checkout client
        $client = $this->createMockClientUrl('tests/Resources/Capital/get-capital-account.json');

        // initialize service
        $service = new \Adyen\Service\CapitalApi($client);

        $result = $service->getCapitalAccount();
        $this->assertEquals(0, $result->getGrants()[0]->getAmount()->getValue());
    }
}
