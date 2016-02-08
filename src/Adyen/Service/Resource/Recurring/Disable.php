<?php

namespace Adyen\Service\Resource\Recurring;

class Disable extends \Adyen\Service\Resource
{
    protected $_requiredFields = array(
        'merchantAccount',
        'shopperReference'
    );

    public function __construct($service)
    {
        $endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Recurring/' . $service->getClient()->getApiVersion() . '/disable';
        parent::__construct($service, $endpoint, $this->_requiredFields);
    }

}