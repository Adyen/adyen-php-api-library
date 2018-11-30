<?php

namespace Adyen\Service\ResourceModel\Fund;

class AccountHolderTransactionList extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * AccountHolderTransactionList constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointFund') . '/' . $service->getClient()->getApiFundVersion() . '/accountHolderTransactionList';

        parent::__construct($service, $this->_endpoint);
    }
}