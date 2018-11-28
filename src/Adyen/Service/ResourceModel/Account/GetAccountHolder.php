<?php

namespace Adyen\Service\ResourceModel\Account;

class GetAccountHolder extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * GetAccountHolder constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointAccount') . '/' . $service->getClient()->getApiAccountVersion() . '/getAccountHolder';
        parent::__construct($service, $this->_endpoint);
    }
}