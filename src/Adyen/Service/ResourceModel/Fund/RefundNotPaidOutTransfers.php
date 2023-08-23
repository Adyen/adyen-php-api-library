<?php

namespace Adyen\Service\ResourceModel\Fund;

class RefundNotPaidOutTransfers extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * RefundNotPaidOutTransfers constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointFund') .
            '/' . $service->getClient()->getApiFundVersion() . '/refundNotPaidOutTransfers';
        parent::__construct($service, $this->endpoint);
    }
}
