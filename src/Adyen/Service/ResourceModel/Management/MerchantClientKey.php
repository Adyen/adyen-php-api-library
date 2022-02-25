<?php


namespace Adyen\Service\ResourceModel\Management;

class MerchantClientKey extends \Adyen\Service\AbstractResource
{
    /**
     * Include applicationInfo key in the request parameters
     *
     * @var bool
     */
    protected $allowApplicationInfo = false;

    /**
     * MerchantClientKey constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        parent::__construct($service, $this->endpoint);
    }

    /**
     * @param $params
     * @param $merchantId
     * @param $apiCredentialId
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function create($merchantId, $apiCredentialId, $params)
    {
        $url = $this->managementEndpoint . "/merchants/" . $merchantId . "/apiCredentials/"
            . $apiCredentialId . "/generateClientKey";
        return $this->requestHttp($url, 'post', $params);
    }
}
