<?php

namespace Adyen\Service\Resource\Payment;

class Authorise3D extends \Adyen\Service\Resource
{
    protected $_requiredFields = array(
        'merchantAccount',
        'browserInfo',
        'md',
        'paResponse'
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payment/v12/authorise3d';
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}