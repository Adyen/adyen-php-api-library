<?php

namespace Adyen\Service\ResourceModel\Account;

use Adyen\Service;

class CheckAccountHolder extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     *
     * @param Service $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointAccount') .
            '/' . $service->getClient()->getApiAccountVersion() . '/checkAccountHolder';
        parent::__construct($service, $this->endpoint);
    }
}
