<?php

namespace Adyen\Service;

class AbstractResource
{

    protected $_service;
    protected $_endpoint;

    public function __construct(\Adyen\Service $service, $endpoint)
    {
        $this->_service = $service;
        $this->_endpoint = $endpoint;
    }

    /**
     * Do the request to the Http Client
     *
     * @param $params
     * @return mixed
     */
    public function request($params)
    {
        // convert to PHP Array if type is inputType is json
        if($this->_service->getClient()->getConfig()->getInputType() == 'json')
        {
            $params = json_decode($params, true);
        }

        // check if merchantAccount is setup in client and request is missing merchantAccount then add it
        if(!isset($params['merchantAccount']) && $this->_service->getClient()->getConfig()->getMerchantAccount()) {
            $params['merchantAccount'] = $this->_service->getClient()->getConfig()->getMerchantAccount();
        }

        $curlClient = $this->_service->getClient()->getHttpClient();
        return $curlClient->requestJson($this->_service, $this->_endpoint, $params);
    }

    public function requestPost($params)
    {
        // check if paramenters has a value
        if(!$params) {
            $msg = 'The parameters in the request are empty';
            $this->_service->getClient()->getLogger()->error($msg);
            throw new \Adyen\AdyenException($msg);
        }

        $curlClient = $this->_service->getClient()->getHttpClient();
        return $curlClient->requestPost($this->_service, $this->_endpoint, $params);
    }

}