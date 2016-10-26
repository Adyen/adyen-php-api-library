<?php

namespace Adyen\Service;

class AbstractResource
{

    protected $_service;
    protected $_endpoint;
    protected $_requiredFields;

    public function __construct(\Adyen\Service $service, $endpoint, $requiredFields)
    {
        $this->_service = $service;
        $this->_endpoint = $endpoint;
        $this->_requiredFields = $requiredFields;
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

        // validate the request parameters
        $this->_validate($params);

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

        // validate the request parameters
        $this->_validate($params);

        $curlClient = $this->_service->getClient()->getHttpClient();
        return $curlClient->requestPost($this->_service, $this->_endpoint, $params);
    }

    /**
     * Validate if all required fields are in the params
     *
     * @param $params
     */
    protected function _validate($params)
    {
        $missingFields = array();
        $missingValues = array();

        if(is_array($this->_requiredFields)) {
            foreach($this->_requiredFields as $requiredField) {

                // if validation is two levels validate if parent and child is in the request
                if(strpos($requiredField, ".") !== FALSE) {
                    $results = explode('.', $requiredField);

                    // for validation only a depth for 2 levels is needed
                    $parent = $results[0];
                    $child = $results[1];

                    if(!isset($params[$parent])) {
                        // missing the parent param in request
                        $missingFields[] = $requiredField;
                        continue;
                    }
                    if(!isset($params[$parent][$child])) {
                        // missing the child param in request
                        $missingFields[] = $requiredField;
                        continue;
                    } else {
                        // check if value is set
                        if($params[$parent][$child] === "") {
                            $missingValues[] = $requiredField;
                        }
                    }

                    // the param is in the request so continue
                    continue;
                }

                if(!array_key_exists($requiredField, $params)) {
                    $missingFields[] = $requiredField;
                } else {
                    // check if value is set
                    if($params[$requiredField] === "") {
                        $missingValues[] = $requiredField;
                    }
                }
            }
        }

        if(!empty($missingFields)) {
            $msg = 'Missing the following fields: ' . implode($missingFields, ',');
            $this->_service->getClient()->getLogger()->error($msg);
            throw new \Adyen\AdyenException($msg);
        }

        if(!empty($missingValues)) {
            $msg = 'Missing the following values: ' . implode($missingValues, ',');
            $this->_service->getClient()->getLogger()->error($msg);
            throw new \Adyen\AdyenException($msg);
        }
    }
}