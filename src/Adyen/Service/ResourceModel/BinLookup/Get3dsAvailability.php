<?php

namespace Adyen\Service\ResourceModel\BinLookup;

class Get3dsAvailability extends \Adyen\Service\AbstractResource
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
    protected $allowApplicationInfo = true;

    /**
     * Authorise constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/BinLookup/get3dsAvailability';
        parent::__construct($service, $this->endpoint, $this->allowApplicationInfo);
    }
}

