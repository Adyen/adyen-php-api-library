<?php


namespace Adyen\Tests\Integration;

use Adyen\Service\Management;
use Adyen\Service\ResourceModel\Management\MerchantAccount;
use Adyen\Tests\TestCase;

class ManagementTest extends TestCase
{
    /**
     * @throws \Adyen\AdyenException
     */
    public function testGetMerchants()
    {
        $client = $this->createClient();

        $management = new Management($client);
        $merchantList = $management->merchantAccount->list();
        $this->assertNotEmpty($merchantList);
        $this->assertNotEmpty($merchantList['_links']);
        $this->assertNotEmpty($merchantList['data']);
        $this->assertNotEmpty($merchantList['itemsTotal']);
        $this->assertTrue($this->count($merchantList['data']) > 0);
    }
}
