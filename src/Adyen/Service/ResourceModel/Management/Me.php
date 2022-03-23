<?php


namespace Adyen\Service\ResourceModel\Management;

class Me extends \Adyen\Service\AbstractResource
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
    public function retrieve()
    {
        $url = $this->managementEndpoint . "/me";
        return $this->requestHttp($url, 'get');
    }
}
