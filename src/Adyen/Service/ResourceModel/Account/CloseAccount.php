<?php

namespace Adyen\Service\ResourceModel\Account;

class CloseAccount extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * CloseAccount constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointAccount') .
            '/' . $service->getClient()->getApiAccountVersion() . '/closeAccount';
        parent::__construct($service, $this->endpoint);
    }
}
