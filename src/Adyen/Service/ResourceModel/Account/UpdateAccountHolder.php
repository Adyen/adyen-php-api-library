<?php

namespace Adyen\Service\ResourceModel\Account;

class UpdateAccountHolder extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * UpdateAccountHolder constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointAccount') . '/' . $service->getClient()->getApiAccountVersion() . '/updateAccountHolder';
        parent::__construct($service, $this->_endpoint);
    }
}