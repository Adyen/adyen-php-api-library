<?php

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Environment;
use Adyen\Region;
use Adyen\Service;
use Adyen\Service\PosPayment;
use Adyen\HttpClient\CurlClient;

class TerminalApiRegionTest extends TestCaseMock
{

    /**
     * @throws AdyenException
     */
    private function createLiveClient(
        string $regionKey,
        array &$requestUrls
    ): Client {
        $client = new Client();
        $client->getConfig()->set($regionKey, Region::US);
        $client->setEnvironment(Environment::LIVE);
        $client->setXApiKey("MockKey");

        $httpClient = $this->getMockBuilder(CurlClient::class)
            ->onlyMethods(['requestJson'])
            ->getMock();

        $httpClient->method('requestJson')
            ->willReturnCallback(
                function (Service $service, $requestUrl, $params, $requestOptions = null) use (&$requestUrls) {
                    $requestUrls[] = $requestUrl;

                    return [];
                }
            );

        $client->setHttpClient($httpClient);

        return $client;
    }

    /**
     * @throws AdyenException
     */
    public function testUsesTerminalApiRegionForTerminalRequests(): void
    {
        $requestUrls = [];
        $client = $this->createLiveClient('terminalApiRegion', $requestUrls);
        $service = new PosPayment($client);
        $service->runTenderSync(['SaleToPOIRequest' => []]);
        $service->runTenderAsync(['SaleToPOIRequest' => []]);
        $service->getConnectedTerminals(['merchantAccount' => 'TestMerchant']);

        $this->assertSame(
            [
                'https://terminal-api-live-us.adyen.com/sync',
                'https://terminal-api-live-us.adyen.com/async',
                'https://terminal-api-live-us.adyen.com/connectedTerminals',
            ],
            $requestUrls
        );
    }

    /**
     * @throws AdyenException
     */
    public function testSupportsLegacyRegion(): void
    {
        $requestUrls = [];
        $client = $this->createLiveClient('region', $requestUrls);
        $service = new PosPayment($client);
        $service->runTenderSync(['SaleToPOIRequest' => []]);
        $service->runTenderAsync(['SaleToPOIRequest' => []]);
        $service->getConnectedTerminals(['merchantAccount' => 'TestMerchant']);

        $this->assertSame(
            [
                'https://terminal-api-live-us.adyen.com/sync',
                'https://terminal-api-live-us.adyen.com/async',
                'https://terminal-api-live-us.adyen.com/connectedTerminals',
            ],
            $requestUrls
        );
    }


    /**
     * @throws AdyenException
     */
    public function testSetsRegionBeforeEnvironment(): void
    {
        $client = new Client();
        $client->setTerminalApiRegion(Region::US);
        $client->setEnvironment(Environment::LIVE);
        $this->assertSame(
            'https://terminal-api-live-us.adyen.com',
            $client->getConfig()->get('endpointTerminalCloud')
        );
        $this->assertSame(
            'https://terminal-api-live-us.adyen.com',
            $client->getConfig()->get('terminalApiCloudEndpoint')
        );
    }

    /**
     * @throws AdyenException
     */
    public function testSetsRegionAfterEnvironment(): void
    {
        $client = new Client();
        $client->setEnvironment(Environment::LIVE);
        $client->setTerminalApiRegion(Region::US);
        $this->assertSame(
            'https://terminal-api-live-us.adyen.com',
            $client->getConfig()->get('endpointTerminalCloud')
        );
    }

    public function testRejectsUnsupportedRegion(): void
    {
        $client = new Client();

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage(
            'TerminalAPI endpoint for in is not supported yet'
        );

        $client->setTerminalApiRegion(Region::IN);
    }

    public function testRejectsUnknownRegion(): void
    {
        $client = new Client();

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage(
            'TerminalAPI endpoint for invalid-region is not supported yet'
        );

        $client->setTerminalApiRegion('invalid-region');
    }

    /**
     * @throws AdyenException
     */
    public function testIgnoresRegionInTest(): void
    {
        $client = new Client();
        $client->setTerminalApiRegion(Region::US);
        $client->setEnvironment(Environment::TEST);
        $this->assertSame(
            'https://terminal-api-test.adyen.com',
            $client->getConfig()->get('endpointTerminalCloud')
        );
    }

    /**
     * @throws AdyenException
     */
    public function testUsesDefaultTestEndpoint(): void
    {
        $client = new Client();
        $client->setEnvironment(Environment::TEST);
        $this->assertSame(
            'https://terminal-api-test.adyen.com',
            $client->getConfig()->get('endpointTerminalCloud')
        );
    }

    /**
     * @throws AdyenException
     */
    public function testUsesDefaultLiveEndpoint(): void
    {
        $client = new Client();
        $client->setEnvironment(Environment::LIVE);
        $this->assertSame(
            'https://terminal-api-live.adyen.com',
            $client->getConfig()->get('endpointTerminalCloud')
        );
    }

    /**
     * @throws AdyenException
     */
    public function testIgnoresLivePrefix(): void
    {
        $client = new Client();

        $client->setEnvironment(Environment::LIVE, 'testprefix');

        $this->assertSame(
            'https://testprefix-pal-live.adyenpayments.com',
            $client->getConfig()->get('endpoint')
        );

        $this->assertSame(
            'https://terminal-api-live.adyen.com',
            $client->getConfig()->get('endpointTerminalCloud')
        );
    }

    /**
     * @throws AdyenException
     */
    public function testPrefersTerminalApiRegion(): void
    {
        $client = new Client();
        $client->getConfig()->set('region', Region::AU);
        $client->getConfig()->set('terminalApiRegion', Region::US);
        $client->setEnvironment(Environment::LIVE);
        new PosPayment($client);
        $this->assertSame(
            'https://terminal-api-live-us.adyen.com',
            $client->getConfig()->get('endpointTerminalCloud')
        );
    }

    public function testRejectsUnknownLegacyRegion(): void
    {
        $client = new Client();

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage(
            'TerminalAPI endpoint for invalid-region is not supported yet'
        );

        $client->getConfig()->set('region', 'invalid-region');
        $client->setEnvironment(Environment::LIVE);
        new PosPayment($client);
    }
}
