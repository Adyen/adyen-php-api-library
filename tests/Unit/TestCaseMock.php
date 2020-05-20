<?php
/**
 *                       ######
 *                       ######
 * ############    ####( ######  #####. ######  ############   ############
 * #############  #####( ######  #####. ######  #############  #############
 *        ######  #####( ######  #####. ######  #####  ######  #####  ######
 * ###### ######  #####( ######  #####. ######  #####  #####   #####  ######
 * ###### ######  #####( ######  #####. ######  #####          #####  ######
 * #############  #############  #############  #############  #####  ######
 *  ############   ############  #############   ############  #####  ######
 *                                      ######
 *                               #############
 *                               ############
 *
 * Adyen API Library for PHP
 *
 * Copyright (c) 2020 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Unit;

use Adyen\AdyenException;
use Adyen\ConnectionException;

class TestCaseMock extends \PHPUnit\Framework\TestCase
{
    protected function createMockClient($jsonFile, $httpStatus, $errno = null, $environment = \Adyen\Environment::TEST)
    {
        $client = new \Adyen\Client();
        $client->setApplicationName("My Test Application");
        $client->setEnvironment($environment);
        $client->setXApiKey("MockAPIKey");

        $json = null;
        if ($jsonFile != null) {
            $json = file_get_contents($jsonFile, true);
        }
        $curlClient = $this->getMockBuilder(get_class(new \Adyen\HttpClient\CurlClient))
            ->onlyMethods(array('curlRequest', 'curlError', 'requestJson'))
            ->getMock();
        $curlClient->method('curlRequest')
            ->willReturn(array($json, $httpStatus));
        $curlClient->method('curlError')
            ->willReturn(array($errno, null));
        $curlClient->method('requestJson')
            ->willReturnCallback(function (\Adyen\Service $service, $requestUrl, $params) use ($json, $client, $errno) {
                $result = json_decode($json, true);
                if ($client->getLogger()) {
                    $client->getLogger()->info(json_encode($params));
                    $client->getLogger()->info($json);
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
                if (isset($errno) && $errno !== null) {
                    throw new ConnectionException('', $errno);
                }
                return $result;
            });

        $client->setHttpClient($curlClient);
        return $client;
    }
}
