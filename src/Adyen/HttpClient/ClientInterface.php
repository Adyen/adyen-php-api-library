<?php

namespace Adyen\HttpClient;

interface ClientInterface
{
    /**
     * @param \Adyen\Service $service
     * @param $requestUrl
     * @param $params
     * @return mixed
     */
    public function requestJson(\Adyen\Service $service, $requestUrl, $params);

    /**
     * @param \Adyen\Service $service
     * @param $requestUrl
     * @param $params
     * @return mixed
     */
    public function requestPost(\Adyen\Service $service, $requestUrl, $params);
}
