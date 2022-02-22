<?php


namespace Adyen\Service\ResourceModel\ManagementApi;

class MerchantsAccount extends \Adyen\Service\AbstractResource
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
     * ManagementApi constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointManagementApi') .
            '/' . $service->getClient()->getManagementApiVersion() . '/merchants';
        parent::__construct($service, $this->endpoint);
    }
}
