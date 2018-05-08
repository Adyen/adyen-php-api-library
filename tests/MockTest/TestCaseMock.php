<?php

namespace Adyen\MockTest;

class TestCaseMock extends \PHPUnit_Framework_TestCase
{

    protected function createCheckoutMockClient($jsonFile, $httpStatus)
    {
        date_default_timezone_set('Europe/Amsterdam');
        $json = null;
        if ($jsonFile != null) {
            $json = file_get_contents($jsonFile, true);
        }
        $curlClient = $this->getMockBuilder(\Adyen\HttpClient\CurlClient::class)
            ->setMethods(array('curlRequest'))
            ->getMock();
        $curlClient->method('curlRequest')
            ->willReturn(array($json, $httpStatus));

        $client = new \Adyen\Client();
        $client->setApplicationName("My Test Application");
        $client->setEnvironment(\Adyen\Environment::TEST);
        $client->setXApiKey("MockAPIKey");
        $client->setHttpClient($curlClient);
        return $client;
    }
}