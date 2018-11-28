<?php

namespace Adyen\Service\ResourceModel\Account;

class CreateAccount extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * CreateAccount constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointAccount') . '/' . $service->getClient()->getApiAccountVersion() . '/createAccount';
        parent::__construct($service, $this->_endpoint);
    }
}