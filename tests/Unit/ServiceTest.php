<?php

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Environment;
use Adyen\Service;
use Adyen\Service\AbstractResource;
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

    public function testRequestHttpWithApplicationName()
    {
        $client = new Client();
        $client->setEnvironment(Environment::TEST);
        $client->setXApiKey('test-api-key');
        $client->setApplicationName("MyTestApp");

        $testHttpClient = new class extends \Adyen\HttpClient\CurlClient {
            public $userAgent;

            public function requestHttp(
                \Adyen\Service $service,
                $url,
                $params = null,
                $httpMethod = 'get',
                $requestOptions = []
            ): array {
                // This is a partial re-implementation of the header logic from CurlClient::requestHttp
                // to allow testing the User-Agent header construction.
                $client = $service->getClient();
                $config = $client->getConfig();
                $appName = $config->get('applicationName');
                $suffix = \Adyen\Client::USER_AGENT_SUFFIX . $client->getLibraryVersion();
                $this->userAgent = $appName ? ($appName . " " . $suffix) : $suffix;

                return [
                    'body' => '{}',
                    'statusCode' => 200,
                    'headers' => []
                ];
            }
        };

        $client->setHttpClient($testHttpClient);

        $service = new Service($client);
        $resource = new class($service) extends AbstractResource {
            public function __construct(Service $service)
            {
                // Endpoint is not used for requestHttp, but required by constructor
                parent::__construct($service, "endpoint", false);
            }
        };

        $resource->requestHttp("https://checkout-test.adyen.com/v71/paymentLinks/123", "get");

        $this->assertNotEmpty($testHttpClient->userAgent);
        // userAgent must include applicationName
        $this->assertEquals("MyTestApp adyen-php-api-library/" . Client::LIB_VERSION, $testHttpClient->userAgent);
        $this->assertStringContainsString("adyen-php-api-library", $testHttpClient->userAgent);
        $this->assertStringContainsString(\Adyen\Client::LIB_VERSION, $testHttpClient->userAgent);
    }

    public function testRequestHttpWithoutApplicationName()
    {
        $client = new Client();
        $client->setEnvironment(Environment::TEST);
        $client->setXApiKey('test-api-key');

        $testHttpClient = new class extends \Adyen\HttpClient\CurlClient {
            public $userAgent;

            public function requestHttp(
                \Adyen\Service $service,
                               $url,
                               $params = null,
                               $httpMethod = 'get',
                               $requestOptions = []
            ): array {
                // This is a partial re-implementation of the header logic from CurlClient::requestHttp
                // to allow testing the User-Agent header construction.
                $client = $service->getClient();
                $config = $client->getConfig();
                $appName = $config->get('applicationName');
                $suffix = \Adyen\Client::USER_AGENT_SUFFIX . $client->getLibraryVersion();
                $this->userAgent = $appName ? ($appName . " " . $suffix) : $suffix;

                return [
                    'body' => '{}',
                    'statusCode' => 200,
                    'headers' => []
                ];
            }
        };

        $client->setHttpClient($testHttpClient);

        $service = new Service($client);
        $resource = new class($service) extends AbstractResource {
            public function __construct(Service $service)
            {
                // Endpoint is not used for requestHttp, but required by constructor
                parent::__construct($service, "endpoint", false);
            }
        };

        $resource->requestHttp("https://checkout-test.adyen.com/v71/paymentLinks/123", "get");

        $this->assertNotEmpty($testHttpClient->userAgent);
        // userAgent does not include applicationName
        $this->assertEquals("adyen-php-api-library/" . Client::LIB_VERSION, $testHttpClient->userAgent);
        $this->assertStringContainsString("adyen-php-api-library", $testHttpClient->userAgent);
        $this->assertStringContainsString(\Adyen\Client::LIB_VERSION, $testHttpClient->userAgent);
    }
}
