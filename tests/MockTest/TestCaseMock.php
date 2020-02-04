<?php

namespace Adyen\MockTest;

class TestCaseMock extends \PHPUnit\Framework\TestCase
{
    protected function createMockClient($jsonFile, $httpStatus, $errno = null, $environment = \Adyen\Environment::TEST)
    {
        $json = null;
        if ($jsonFile != null) {
            $json = file_get_contents($jsonFile, true);
        }
        $curlClient = $this->getMockBuilder(get_class(new \Adyen\HttpClient\CurlClient))
            ->setMethods(array('curlRequest', 'curlError'))
            ->getMock();
        $curlClient->method('curlRequest')
            ->willReturn(array($json, $httpStatus));
        $curlClient->method('curlError')
            ->willReturn(array($errno, null));

        $client = new \Adyen\Client();
        $client->setApplicationName("My Test Application");
        $client->setEnvironment($environment);
        $client->setXApiKey("MockAPIKey");
        $client->setHttpClient($curlClient);
        return $client;
    }
}
