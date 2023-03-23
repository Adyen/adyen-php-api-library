<?php

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Environment;
use Adyen\Service;
use http\Client;
use mysql_xdevapi\Exception;
use function PHPUnit\Framework\assertEquals;

class ServiceTest extends TestCaseMock
{
    public function testLiveURLPrefixPal()
    {
        $client = new \Adyen\Client();
        $client->setEnvironment(Environment::LIVE, "[prefix]");
        $service = new Service($client);
        $url = $service->createBaseUrl("https://pal-test.adyen.com/pal/servlet/Payment/[version]/[method]");
        self::assertEquals("https://[prefix]-pal-live.adyenpayments.com/pal/servlet/Payment/[version]/[method]", $url);
    }

    public function testLiveURLPrefixCheckout()
    {
        $client = new \Adyen\Client();
        $client->setEnvironment(Environment::LIVE, "[prefix]");
        $service = new Service($client);
        $url = $service->createBaseUrl("https://checkout-test.adyen.com/[version]/[method]");
        self::assertEquals("https://[prefix]-checkout-live.adyenpayments.com/checkout/[version]/[method]", $url);
    }

    public function testLiveEndpointWithoutRequiredPrefix()
    {
        $client = new \Adyen\Client();
        $client->setEnvironment(Environment::LIVE);
        $service = new Service($client);
        try {
            $url = $service->createBaseUrl("https://checkout-test.adyen.com/[version]/[method]");
        } catch(AdyenException $e) {
            assertEquals("Please add your checkout live URL prefix from CA under Developers > API URLs > Prefix",
                $e->getMessage());
        }
    }

    public function testLiveURLPrefixOther()
    {
        $client = new \Adyen\Client();
        $client->setEnvironment(Environment::LIVE);
        $service = new Service($client);
        $url = $service->createBaseUrl("https://kyc-test.adyen.com/lem/v3/legalEntities");
        self::assertEquals("https://kyc-live.adyen.com/lem/v3/legalEntities", $url);
    }
}