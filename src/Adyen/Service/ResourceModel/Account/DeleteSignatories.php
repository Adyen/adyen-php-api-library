<?php

namespace Adyen\Service\ResourceModel\Account;

class DeleteSignatories extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * DeleteSignatories constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointAccount') .
            '/' . $service->getClient()->getApiAccountVersion() . '/deleteSignatories';
        parent::__construct($service, $this->endpoint);
    }
}
