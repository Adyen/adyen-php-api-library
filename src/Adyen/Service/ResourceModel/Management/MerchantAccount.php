<?php


namespace Adyen\Service\ResourceModel\Management;

class MerchantAccount extends \Adyen\Service\AbstractResource
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

    public function __construct(\Adyen\Service $service)
    {
        parent::__construct($service, $this->endpoint);
    }

    /**
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function list()
    {
        $url = $this->managementEndpoint . "/merchants";
        return $this->requestHttp(null, $url, 'get');
    }

    /**
     * @param $merchantId
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function get($merchantId)
    {
        $url = $this->managementEndpoint . "/merchants/".$merchantId;
        return $this->requestHttp(null, $url, 'get');
    }
}
