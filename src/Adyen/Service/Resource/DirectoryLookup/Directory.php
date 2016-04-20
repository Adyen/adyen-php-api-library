<?php

//https://test.adyen.com/hpp/directory.shtml


namespace Adyen\Service\Resource\DirectoryLookup;

class Directory extends \Adyen\Service\Resource
{
    protected $_requiredFields = array(
        'paymentAmount',
        'currencyCode',
        'merchantReference',
        'skinCode',
        'merchantAccount',
        'sessionValidity',
        'shopperLocale',
        'merchantSig'
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointDirectorylookup');
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}