<?php
/**
 *
 * Adyen API Library for PHP
 *
 * Copyright (c) 2020 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\ConnectionException;
use Adyen\Environment;
use Adyen\HttpClient\CurlClient;
use Adyen\Service;
use PHPUnit\Framework\TestCase;

class TestCaseMock extends TestCase
{
    protected $requestUrl;

    /**
     * @throws AdyenException
     */
    protected function createMockClient($jsonFile, $httpStatus, $errno = null, $environment = Environment::TEST): Client
    {
        $client = new Client();
        $client->setApplicationName("My Test Application");
        $client->setEnvironment($environment);
        $client->setXApiKey("MockAPIKey");

        $json = null;
        if ($jsonFile != null) {
            $json = file_get_contents($jsonFile, true);
        }
        $curlClient = $this->getMockBuilder(CurlClient::class)
            ->onlyMethods(array('curlRequest', 'curlError', 'requestJson'))
            ->getMock();
        $curlClient->method('curlRequest')
            ->willReturn(array($json, $httpStatus));
        $curlClient->method('curlError')
            ->willReturn(array($errno, null));
        $curlClient->method('requestJson')
            ->willReturnCallback(function (Service $service, $requestUrl, $params) use ($json, $client, $errno) {
                if (!is_null($json)) {
                    $result = json_decode($json, true);
                } else {
                    $result = null;
                }
                if (isset($result['errorCode'])) {
                    throw new AdyenException($result['message']);
                }
                if (isset($result['error'])) {
                    throw new AdyenException($result['error']['message']);
                }
                if (!$client->getConfig()->getXApiKey()) {
                    throw new AdyenException('Please provide a valid Checkout API Key');
                }
                if (isset($errno)) {
                    throw new ConnectionException('', $errno);
                }
                return $result;
            });

        $client->setHttpClient($curlClient);
        return $client;
    }

    /**
     * @throws AdyenException
     */
    protected function createMockClientUrl($jsonFile, $environment = Environment::TEST): Client
    {
        $client = new Client();
        $client->setApplicationName("My Test Application");
        $client->setEnvironment($environment);
        $client->setXApiKey("MockAPIKey");

        $json = null;
        if ($jsonFile != null) {
            $json = file_get_contents($jsonFile, true);
        }

        $curlClient = $this->getMockBuilder(CurlClient::class)
            ->onlyMethods(array('requestHttp'))
            ->getMock();
        $curlClient->method('requestHttp')
            ->willReturnCallback(function (Service $service, $requestUrl, $params) use ($json) {

                $this->requestUrl = $requestUrl;

                if (!is_null($json)) {
                    $result = json_decode($json, true);
                } else {
                    $result = null;
                }
                return $result;
            });

        $client->setHttpClient($curlClient);
        return $client;
    }

    // Method for testing the effective time it cost to run a method
    public function calculateRunTime($callback)
    {
        $startA = microtime(true);
        $callback();
        $endA = microtime(true);
        return $endA - $startA;
    }
}
