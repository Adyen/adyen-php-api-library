<?php

namespace Adyen\Service;

class PosPayment extends \Adyen\ApiKeyAuthenticatedService
{

    protected $_runTenderSync;
    protected $_runTenderAsync;
    protected $_txType;

    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->_runTenderSync = new \Adyen\Service\ResourceModel\Payment\TerminalCloudAPI($this, false);
        $this->_runTenderAsync = new \Adyen\Service\ResourceModel\Payment\TerminalCloudAPI($this, true);
    }

    public function runTenderSync($params)
    {
        $result = $this->_runTenderSync->request($params);
        return $result;
    }

    public function runTenderAsync($params)
    {
        $result = $this->_runTenderAsync->request($params);
        return $result;
    }

    public function getServiceId($request)
    {
        if (isset($request['SaleToPOIRequest']['MessageHeader']['ServiceID'])) {
            return $request['SaleToPOIRequest']['MessageHeader']['ServiceID'];
        }
        return null;
    }

}
