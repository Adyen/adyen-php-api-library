<?php

namespace Adyen\Service\ResourceModel\Account;

class GetAccountHolder extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * GetAccountHolder constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointAccount') .
            '/' . $service->getClient()->getApiAccountVersion() . '/getAccountHolder';
        parent::__construct($service, $this->endpoint);
    }
}
