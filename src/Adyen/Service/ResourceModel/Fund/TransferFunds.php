<?php

namespace Adyen\Service\ResourceModel\Fund;

class TransferFunds extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * TransferFunds constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointFund') . '/' . $service->getClient()->getApiFundVersion() . '/transferFunds';
        parent::__construct($service, $this->_endpoint);
    }
}