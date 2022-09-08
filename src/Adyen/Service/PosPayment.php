<?php

namespace Adyen\Service;

use Adyen\Client;
use Adyen\Region;

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
     * @var
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
        $region = $this->getClient()->getConfig('region');

        if (isset($region) && $this->getClient()->getConfig('environment') == \Adyen\Environment::LIVE) {
            switch ($region) {
                case Region::US:
                    $this->getClient()->getConfig()->set(
                        'endpointTerminalCloud',
                        Client::ENDPOINT_TERMINAL_CLOUD_US_LIVE
                    );
                    break;
                case Region::AU:
                    $this->getClient()->getConfig()->set(
                        'endpointTerminalCloud',
                        Client::ENDPOINT_TERMINAL_CLOUD_AU_LIVE
                    );
                    break;
                case Region::EU:
                default:
                    $this->getClient()->getConfig()->set(
                        'endpointTerminalCloud',
                        Client::ENDPOINT_TERMINAL_CLOUD_LIVE
                    );
            }
        }

        $this->runTenderSync = new \Adyen\Service\ResourceModel\Payment\TerminalCloudAPI($this, false);
        $this->runTenderAsync = new \Adyen\Service\ResourceModel\Payment\TerminalCloudAPI($this, true);
        $this->connectedTerminals = new \Adyen\Service\ResourceModel\Payment\ConnectedTerminals($this);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function runTenderSync($params)
    {
        $result = $this->runTenderSync->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function runTenderAsync($params)
    {
        $result = $this->runTenderAsync->request($params);
        return $result;
    }

    /**
     * @param $request
     * @return null
     */
    public function getServiceId($request)
    {
        if (isset($request['SaleToPOIRequest']['MessageHeader']['ServiceID'])) {
            return $request['SaleToPOIRequest']['MessageHeader']['ServiceID'];
        }
        return null;
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function getConnectedTerminals($params)
    {
        $result = $this->connectedTerminals->request($params);
        return $result;
    }
}
