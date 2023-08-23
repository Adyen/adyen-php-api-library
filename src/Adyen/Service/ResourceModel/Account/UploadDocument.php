<?php

namespace Adyen\Service\ResourceModel\Account;

class UploadDocument extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * UploadDocument constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointAccount') .
            '/' . $service->getClient()->getApiAccountVersion() . '/uploadDocument';
        parent::__construct($service, $this->endpoint);
    }
}
