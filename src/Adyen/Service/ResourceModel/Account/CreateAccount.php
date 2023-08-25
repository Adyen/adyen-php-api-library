<?php

namespace Adyen\Service\ResourceModel\Account;

class CreateAccount extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * CreateAccount constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointAccount') .
            '/' . $service->getClient()->getApiAccountVersion() . '/createAccount';
        parent::__construct($service, $this->endpoint);
    }
}
