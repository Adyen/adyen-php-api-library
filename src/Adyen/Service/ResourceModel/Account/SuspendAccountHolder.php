<?php

namespace Adyen\Service\ResourceModel\Account;

class SuspendAccountHolder extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * SuspendAccountHolder constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointAccount') .
            '/' . $service->getClient()->getApiAccountVersion() . '/suspendAccountHolder';
        parent::__construct($service, $this->endpoint);
    }
}
