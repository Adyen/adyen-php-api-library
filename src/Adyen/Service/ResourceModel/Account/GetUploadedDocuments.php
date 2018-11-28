<?php

namespace Adyen\Service\ResourceModel\Account;

class GetUploadedDocuments extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * GetUploadedDocuments constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointAccount') . '/' . $service->getClient()->getApiAccountVersion() . '/getUploadedDocuments';
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }
}