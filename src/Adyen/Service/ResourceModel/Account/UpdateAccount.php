<?php

namespace Adyen\Service\ResourceModel\Account;

class UpdateAccount extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * UpdateAccount constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointAccount') .
            '/' . $service->getClient()->getApiAccountVersion() . '/updateAccount';
        parent::__construct($service, $this->endpoint);
    }
}
