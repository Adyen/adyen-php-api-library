<?php

namespace Adyen\Service\ResourceModel\Account;

class DeleteShareholders extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * DeleteShareholders constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointAccount') . '/' . $service->getClient()->getApiAccountVersion() . '/deleteShareholders';
        parent::__construct($service, $this->_endpoint);
    }
}