<?php

namespace Adyen\HttpClient;

interface ClientInterface
{
    /**
     * @param string $method The HTTP method being used
     * @param string $absUrl The URL being requested, including domain and protocol
     * @param array $headers Headers to be used in the request (full strings, not KV pairs)
     * @param array $params KV pairs for parameters. Can be nested for arrays and hashes
     * @return array($rawBody, $httpStatusCode, $httpHeader)
     */


    /**
     * @param \Adyen\Service $service
     * @param $requestUrl
     * @param $params
     * @return mixed
     */
    public function requestJson(\Adyen\Service $service, $requestUrl, $params);
    public function requestPost(\Adyen\Service $service, $requestUrl, $params);
}