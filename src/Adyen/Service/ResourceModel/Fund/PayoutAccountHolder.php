<?php

namespace Adyen\Service\ResourceModel\Fund;

class PayoutAccountHolder extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * PayoutAccountHolder constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointFund') . '/' . $service->getClient()->getApiFundVersion() . '/payoutAccountHolder';

        parent::__construct($service, $this->_endpoint);
    }

}