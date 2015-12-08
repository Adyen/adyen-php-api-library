<?php

namespace Adyen\Service\Resource\Payment;

class Authorise extends \Adyen\Service\Resource
{
    protected $_requiredFields = array(
        'merchantAccount',
        'amount.value',
        'amount.currency',
        'reference'
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payment/' . $service->getClient()->getApiVersion() . '/authorise';
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}