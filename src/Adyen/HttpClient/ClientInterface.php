<?php

namespace Adyen\HttpClient;

interface ClientInterface
{
    const HTTP_METHOD_GET = 'get';
    const HTTP_METHOD_POST = 'post';
    const HTTP_METHOD_PATCH = 'patch';
    const HTTP_METHOD_DELETE = 'delete';

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

    /**
     * @param \Adyen\Service $service
     * @param $requestUrl
     * @param $params
     * @param $method
     * @return mixed
     */
    public function requestHttp(\Adyen\Service $service, $requestUrl, $params, $method, $requestOptions = null);
}
