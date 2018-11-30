<?php

namespace Adyen\Service\ResourceModel\Account;

class DeleteBankAccounts extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * DeleteBankAccounts constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointAccount') . '/' . $service->getClient()->getApiAccountVersion() . '/deleteBankAccounts';
        parent::__construct($service, $this->_endpoint);
    }
}