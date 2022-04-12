<?php


namespace Adyen\Service\ResourceModel\Management;

class AllowedOrigins extends \Adyen\Service\AbstractResource
{
    /**
     * Allowed origins endpoint
     */
    const ALLOWED_ORIGINS = '/me/allowedOrigins';
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
        $url = $this->managementEndpoint . self::ALLOWED_ORIGIN_URL;
        return $this->requestHttp($url, 'get');
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function create($params)
    {
        $url = $this->managementEndpoint . self::ALLOWED_ORIGIN_URL;
        return $this->requestHttp($url, 'post', $params);
    }
}
