<?php

namespace Adyen\Service\ResourceModel\Payment;

class ConnectedTerminals extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * ConnectedTerminals constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointTerminalCloud') . '/connectedTerminals';
        parent::__construct($service, $this->endpoint);
    }
}
