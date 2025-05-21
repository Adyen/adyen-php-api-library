<?php

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Environment;
use Adyen\Service;
use function PHPUnit\Framework\assertEquals;

class ServiceTest extends TestCaseMock
{
    public function testLiveURLPrefixPal()
    {
        $client = new Client();
        $client->setEnvironment(Environment::LIVE, "[prefix]");
        $service = new Service($client);
        $url = $service->createBaseUrl("https://pal-test.adyen.com/pal/servlet/Payment/[version]/[method]");
        self::assertEquals(
            "https://[prefix]-pal-live.adyenpayments.com/pal/servlet/Payment/[version]/[method]",
            $url
        );
    }

    public function testLiveURLPrefixCheckout()
    {
        $client = new Client();
        $client->setEnvironment(Environment::LIVE, "[prefix]");
        $service = new Service($client);
        $url = $service->createBaseUrl("https://checkout-test.adyen.com/[version]/[method]");
        self::assertEquals(
            "https://[prefix]-checkout-live.adyenpayments.com/checkout/[version]/[method]",
            $url
        );
    }

    public function testLiveEndpointWithoutRequiredPrefix()
    {
        $client = new Client();
        $client->setEnvironment(Environment::LIVE);
        $service = new Service($client);
        try {
            $service->createBaseUrl("https://checkout-test.adyen.com/[version]/[method]");
        } catch (AdyenException $e) {
            assertEquals(
                "Please add your checkout live URL prefix from CA under Developers > API URLs > Prefix",
                $e->getMessage()
            );
        }
    }

    public function testLiveURLPrefixOther()
    {
        $client = new Client();
        $client->setEnvironment(Environment::LIVE);
        $service = new Service($client);
        $url = $service->createBaseUrl("https://kyc-test.adyen.com/lem/v3/legalEntities");
        self::assertEquals("https://kyc-live.adyen.com/lem/v3/legalEntities", $url);
    }

    // test PosMobileApi LIVE url with prefix
    public function testLiveURLPosSdkWithPrefix()
    {
        $client = new Client();
        $client->setEnvironment(Environment::LIVE, "myCompany");
        $service = new Service($client);
        $url = $service->createBaseUrl("https://checkout-test.adyen.com/checkout/possdk/v68");
        self::assertEquals(
            "https://myCompany-checkout-live.adyenpayments.com/checkout/possdk/v68",
            $url
        );
    }

    // test PosMobileApi TEST url without prefx
    public function testTestURLPosSdk()
    {
        $client = new Client();
        $client->setEnvironment(Environment::TEST);
        $service = new Service($client);
        $url = $service->createBaseUrl("https://checkout-test.adyen.com/checkout/possdk/v68");
        self::assertEquals(
            "https://checkout-test.adyen.com/checkout/possdk/v68",
            $url
        );
    }

    // test PosMobileApi TEST url with prefix
    public function testTestURLPosSdkWithPrefix()
    {
        $client = new Client();
        $client->setEnvironment(Environment::TEST, "myCompany");
        $service = new Service($client);
        $url = $service->createBaseUrl("https://checkout-test.adyen.com/checkout/possdk/v68");
        // check prefix is ignored on TEST
        self::assertEquals(
            "https://checkout-test.adyen.com/checkout/possdk/v68",
            $url
        );
    }
}
