<?php

namespace Adyen\Tests\Unit;

use Adyen\HttpClient\ClientInterface;

class UrlCheckClient implements ClientInterface
{
    public $url;
    public $idempotencyKey;

    public function requestJson(\Adyen\Service $service, $requestUrl, $params)
    {
        // TODO: Implement requestJson() method.
    }

    public function requestPost(\Adyen\Service $service, $requestUrl, $params)
    {
        // TODO: Implement requestPost() method.
    }

    public function requestHttp(\Adyen\Service $service, $requestUrl, $params, $method, $requestOptions = null)
    {
        // TODO: Implement requestHttp() method.
    }

    public function requestHttpRest(\Adyen\Service $service, string $requestUrl, $bodyParams, string $method, $idempotencyKey = null)
    {
        $this->url = $requestUrl;
        $this->idempotencyKey = $idempotencyKey;
        return array();
    }
}
