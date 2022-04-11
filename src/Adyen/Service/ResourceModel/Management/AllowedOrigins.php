<?php


namespace Adyen\Service\ResourceModel\Management;

class AllowedOrigins extends \Adyen\Service\AbstractResource
{
    /**
     * Include applicationInfo key in the request parameters
     *
     * @var bool
     */
    protected $allowApplicationInfo = false;

    /**
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function list()
    {
        $url = $this->managementEndpoint . "/me/allowedOrigins";
        return $this->requestHttp($url, 'get');
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function create($params)
    {
        $url = $this->managementEndpoint . "/me/allowedOrigins";
        return $this->requestHttp($url, 'post', $params);
    }
}
