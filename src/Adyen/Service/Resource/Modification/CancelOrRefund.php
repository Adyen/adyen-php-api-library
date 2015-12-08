<?php

namespace Adyen\Service\Resource\Modification;

class CancelOrRefund extends \Adyen\Service\Resource
{
    protected $_requiredFields = array(
        'merchantAccount',
        'originalReference',
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payment/'. $service->getClient()->getApiVersion() . '/cancelOrRefund';
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}