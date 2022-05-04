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
     * @param array $queryParams
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function list(array $queryParams = [])
    {
        $url = $this->managementEndpoint . "/merchants";
        return $this->requestHttp($url, 'get', $queryParams);
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
