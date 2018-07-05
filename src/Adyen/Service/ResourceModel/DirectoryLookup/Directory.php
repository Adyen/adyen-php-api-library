<?php

//https://test.adyen.com/hpp/directory.shtml


namespace Adyen\Service\ResourceModel\DirectoryLookup;

class Directory extends \Adyen\Service\AbstractResource
{
    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointDirectorylookup');
        parent::__construct($service, $this->_endpoint);
    }

}