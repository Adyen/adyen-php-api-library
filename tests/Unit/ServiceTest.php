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

    public function testRequestHttp()
    {
        $client = new Client();
        $client->setEnvironment(Environment::TEST);
        $client->setXApiKey('test-api-key');
        $client->setApplicationName("MyTestApplication");

        $testHttpClient = new class extends \Adyen\HttpClient\CurlClient {
            public $headers;

            protected function curlSetopt($ch, $option, $value): bool
            {
                if ($option === CURLOPT_HTTPHEADER) {
                    $this->headers = $value;
                }
                return parent::curlSetopt($ch, $option, $value);
            }

            protected function curlRequest($ch): array
            {
                return ["{}", 200];
            }
        };

        $client->setHttpClient($testHttpClient);
        $service = new Service($client);
        $resource = new class($service) extends AbstractResource {
            public function __construct(Service $service)
            {
                parent::__construct($service, "endpoint", false);
            }
        };

        $resource->requestHttp("https://checkout-test.adyen.com/v71/paymentLinks/123", "get");

        $expectedUserAgent = "MyTestApplication" . " " . \Adyen\Client::USER_AGENT_SUFFIX . $client->getLibraryVersion();
        $expectedLibraryNameHeader = \Adyen\HttpClient\CurlClient::LIBRARY_NAME . $client->getLibraryName();
        $expectedLibraryVersionHeader = \Adyen\HttpClient\CurlClient::LIBRARY_VERSION . $client->getLibraryVersion();

        $userAgentFound = false;
        $libraryNameHeaderFound = false;
        $libraryVersionHeaderFound = false;

        foreach ($testHttpClient->headers as $header) {
            if (stripos($header, \Adyen\HttpClient\CurlClient::USER_AGENT) === 0) {
                $this->assertEquals(\Adyen\HttpClient\CurlClient::USER_AGENT . $expectedUserAgent, $header);
                $userAgentFound = true;
            } elseif (stripos($header, \Adyen\HttpClient\CurlClient::LIBRARY_NAME) === 0) {
                $this->assertEquals($expectedLibraryNameHeader, $header);
                $libraryNameHeaderFound = true;
            } elseif (stripos($header, \Adyen\HttpClient\CurlClient::LIBRARY_VERSION) === 0) {
                $this->assertEquals($expectedLibraryVersionHeader, $header);
                $libraryVersionHeaderFound = true;
            }
        }

        $this->assertTrue($userAgentFound, "User-Agent header not found.");
        $this->assertTrue($libraryNameHeaderFound, "Adyen-Library-Name header not found.");
        $this->assertTrue($libraryVersionHeaderFound, "Adyen-Library-Version header not found.");
    }

    public function testRequestHttpWithoutApplicationName()
    {
        $client = new Client();
        $client->setEnvironment(Environment::TEST);
        $client->setXApiKey('test-api-key');

        $testHttpClient = new class extends \Adyen\HttpClient\CurlClient {
            public $headers;

            protected function curlSetopt($ch, $option, $value): bool
            {
                if ($option === CURLOPT_HTTPHEADER) {
                    $this->headers = $value;
                }
                return parent::curlSetopt($ch, $option, $value);
            }

            protected function curlRequest($ch): array
            {
                return ["{}", 200];
            }
        };

        $client->setHttpClient($testHttpClient);
        $service = new Service($client);
        $resource = new class($service) extends AbstractResource {
            public function __construct(Service $service)
            {
                parent::__construct($service, "endpoint", false);
            }
        };

        $resource->requestHttp("https://checkout-test.adyen.com/v71/paymentLinks/123", "get");

        $expectedUserAgent = \Adyen\Client::USER_AGENT_SUFFIX . $client->getLibraryVersion();
        $expectedLibraryNameHeader = \Adyen\HttpClient\CurlClient::LIBRARY_NAME . $client->getLibraryName();
        $expectedLibraryVersionHeader = \Adyen\HttpClient\CurlClient::LIBRARY_VERSION . $client->getLibraryVersion();

        $userAgentFound = false;
        $libraryNameHeaderFound = false;
        $libraryVersionHeaderFound = false;

        foreach ($testHttpClient->headers as $header) {
            if (stripos($header, \Adyen\HttpClient\CurlClient::USER_AGENT) === 0) {
                $this->assertEquals(\Adyen\HttpClient\CurlClient::USER_AGENT . $expectedUserAgent, $header);
                $userAgentFound = true;
            } elseif (stripos($header, \Adyen\HttpClient\CurlClient::LIBRARY_NAME) === 0) {
                $this->assertEquals($expectedLibraryNameHeader, $header);
                $libraryNameHeaderFound = true;
            } elseif (stripos($header, \Adyen\HttpClient\CurlClient::LIBRARY_VERSION) === 0) {
                $this->assertEquals($expectedLibraryVersionHeader, $header);
                $libraryVersionHeaderFound = true;
            }
        }

        $this->assertTrue($userAgentFound, "User-Agent header not found.");
        $this->assertTrue($libraryNameHeaderFound, "Adyen-Library-Name header not found.");
        $this->assertTrue($libraryVersionHeaderFound, "Adyen-Library-Version header not found.");
    }
}
