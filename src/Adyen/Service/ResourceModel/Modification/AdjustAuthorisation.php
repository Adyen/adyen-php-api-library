<?php

namespace Adyen\Service\ResourceModel\Modification;

class AdjustAuthorisation extends \Adyen\Service\AbstractResource
{
    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpoint').'/pal/servlet/Payment/'.$service->getClient()->getApiVersion().'/adjustAuthorisation';
        parent::__construct($service, $this->_endpoint);
    }

}