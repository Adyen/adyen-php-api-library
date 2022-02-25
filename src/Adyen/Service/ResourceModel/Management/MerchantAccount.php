<?php


namespace Adyen\Service\ResourceModel\Management;

class MerchantAccount extends \Adyen\Service\AbstractResource
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
        $url = $this->managementEndpoint . "/merchants";
        return $this->requestHttp($url, 'get');
    }

    /**
     * @param $merchantId
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function get($merchantId)
    {
        $url = $this->managementEndpoint . "/merchants/" . $merchantId;
        return $this->requestHttp($url, 'get');
    }
}
