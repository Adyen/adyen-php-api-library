<?php

namespace Adyen\Service\ResourceModel\Account;

class CloseAccount extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * CloseAccount constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointAccount') . '/' . $service->getClient()->getApiAccountVersion() . '/closeAccount';
        parent::__construct($service, $this->_endpoint);
    }
}