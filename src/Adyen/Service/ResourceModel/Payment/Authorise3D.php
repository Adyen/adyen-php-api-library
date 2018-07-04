<?php

namespace Adyen\Service\ResourceModel\Payment;

class Authorise3D extends \Adyen\Service\AbstractResource
{
    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payment/' . $service->getClient()->getApiVersion() . '/authorise3d';
        parent::__construct($service, $this->_endpoint);
    }

}