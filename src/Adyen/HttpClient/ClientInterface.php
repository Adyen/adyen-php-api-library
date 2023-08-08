<?php

namespace Adyen\HttpClient;

use Adyen\Service;

interface ClientInterface
{
    const HTTP_METHOD_GET = 'get';
    const HTTP_METHOD_POST = 'post';
    const HTTP_METHOD_PATCH = 'patch';
    const HTTP_METHOD_DELETE = 'delete';

    /**
     * @param Service $service
     * @param $requestUrl
     * @param $params
     * @return mixed
     */
    public function requestJson(Service $service, $requestUrl, $params);

    /**
     * @param Service $service
     * @param $requestUrl
     * @param $params
     * @return mixed
     */
    public function requestPost(Service $service, $requestUrl, $params);

    /**
     * @param Service $service
     * @param $requestUrl
     * @param $params
     * @param $method
     * @param null $requestOptions
     * @return mixed
     */
    public function requestHttp(Service $service, $requestUrl, $params, $method, $requestOptions = null);
}
