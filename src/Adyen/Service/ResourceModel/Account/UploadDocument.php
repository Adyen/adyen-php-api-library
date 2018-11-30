<?php

namespace Adyen\Service\ResourceModel\Account;

class UploadDocument extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * UploadDocument constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointAccount') . '/' . $service->getClient()->getApiAccountVersion() . '/uploadDocument';
        parent::__construct($service, $this->_endpoint);
    }
}