<?php

namespace Adyen\Service;

class PosPayment extends \Adyen\ApiKeyAuthenticatedService
{
    /**
     * @var ResourceModel\Payment\TerminalCloudAPI
     */
    protected $runTenderSync;

    /**
     * @var ResourceModel\Payment\TerminalCloudAPI
     */
    protected $runTenderAsync;

    /**
     * @var string
     */
    protected $txType;

    /**
     * @var ResourceModel\Payment\ConnectedTerminals
     */
    protected $connectedTerminals;

    /**
     * PosPayment constructor.
     *
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->runTenderSync = new \Adyen\Service\ResourceModel\Payment\TerminalCloudAPI($this, false);
        $this->runTenderAsync = new \Adyen\Service\ResourceModel\Payment\TerminalCloudAPI($this, true);
        $this->connectedTerminals = new \Adyen\Service\ResourceModel\Payment\ConnectedTerminals($this);
    }

    /**
     * @param string $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function runTenderSync($params)
    {
        $result = $this->runTenderSync->request($params);
        return $result;
    }

    /**
     * @param string $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function runTenderAsync($params)
    {
        $result = $this->runTenderAsync->request($params);
        return $result;
    }

    /**
     * @param array $request
     * @return mixed
     */
    public function getServiceId($request)
    {
        return isset($request['SaleToPOIRequest']['MessageHeader']['ServiceID'])
            ? $request['SaleToPOIRequest']['MessageHeader']['ServiceID']
            : null;
    }

    /**
     * @param array $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function getConnectedTerminals($params)
    {
        return $this->connectedTerminals->request($params);
    }
}
