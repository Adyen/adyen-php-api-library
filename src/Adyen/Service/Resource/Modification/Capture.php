<?php

namespace Adyen\Service\Resource\Modification;

class Capture extends \Adyen\Service\Resource
{
    protected $_requiredFields = array(
        'merchantAccount',
        'modificationAmount',
        'modificationAmount.value',
        'modificationAmount.currency',
        'originalReference'
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payment/' . $service->getClient()->getApiVersion() . '/capture';
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}