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
    private function createLiveClient(array &$requestUrls): Client
    {
        $client = new Client();
        $client->setRegion(Region::US);
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
    public function testUsesRegionForTerminalRequests(): void
    {
        $requestUrls = [];
        $client = $this->createLiveClient($requestUrls);
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

    public function testRejectsUnsupportedRegion(): void
    {
        $client = new Client();

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage(
            'TerminalAPI endpoint for in is not supported yet'
        );

        $client->setRegion(Region::IN);
    }
}
