<?php


namespace Adyen\Service\ResourceModel\Management;

class StoreAccount extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

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
    public function list($service)
    {
        // $url = $this->managementEndpoint . "/stores";
        // return $this->requestHttp($url, 'get', $queryParams);
        $this->endpoint = $this->managementEndpoint . "/stores";
        parent::__construct($service, $this->endpoint, $this->allowApplicationInfo);
    }

    /**
     * @param $storeId
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function get($storeId)
    {
        $url = $this->managementEndpoint . "/stores/" . $storeId;
        return $this->requestHttp($url, 'get');
    }
}
