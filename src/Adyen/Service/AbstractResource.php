<?php

namespace Adyen\Service;

use Adyen\AdyenException;

class AbstractResource
{
	/**
	 * @var \Adyen\Service
	 */
    protected $_service;

	/**
	 * @var string
	 */
    protected $_endpoint;

	/**
	 * @var array
	 */
    protected $paramsToFilter;

	/**
	 * AbstractResource constructor.
	 *
	 * @param \Adyen\Service $service
	 * @param $endpoint
	 * @param array $paramsToFilter
	 */
    public function __construct(\Adyen\Service $service, $endpoint, $paramsToFilter = array())
    {
        $this->_service = $service;
        $this->_endpoint = $endpoint;
        $this->paramsToFilter = $paramsToFilter;
    }

	/**
	 * Do the request to the Http Client
	 *
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
    public function request($params)
    {
        // convert to PHP Array if type is inputType is json
        if($this->_service->getClient()->getConfig()->getInputType() == 'json')
        {
            $params = json_decode($params, true);
            if ($params === null && json_last_error() !== JSON_ERROR_NONE) {
				$msg = 'The parameters in the request expect valid JSON but JSON error code found: ' . json_last_error();
				$this->_service->getClient()->getLogger()->error($msg);
				throw new \Adyen\AdyenException($msg);
			}
        }

		if (!is_array($params)) {
			$msg = 'The parameter is not valid array';
			$this->_service->getClient()->getLogger()->error($msg);
			throw new \Adyen\AdyenException($msg);
		}

        $params = $this->addDefaultParametersToRequest($params);

        $params = $this->filterParams($params);

        $curlClient = $this->_service->getClient()->getHttpClient();
        return $curlClient->requestJson($this->_service, $this->_endpoint, $params);
    }

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
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

	/**
	 * Fill expected but missing parameters with default data
	 *
	 * @param $params
	 * @return mixed
	 */
    private function addDefaultParametersToRequest($params)
	{
		// check if merchantAccount is setup in client and request is missing merchantAccount then add it
		if(!isset($params['merchantAccount']) && $this->_service->getClient()->getConfig()->getMerchantAccount()) {
			$params['merchantAccount'] = $this->_service->getClient()->getConfig()->getMerchantAccount();
		}

		// check if applicationInfo is set and has the adyenLibrary in it
		if (!isset($params['applicationInfo']['adyenLibrary'])) {
			$params['applicationInfo']['adyenLibrary']['name'] = $this->_service->getClient()->getLibraryName();
			$params['applicationInfo']['adyenLibrary']['version'] = $this->_service->getClient()->getLibraryVersion();
		}

		return $params;
	}

	/**
	 * All the parameters that can be found in the _paramsToFilter array will be filtered out for the specific endpoint
	 * You can add multilevel filtering by defining associative arrays in the property
	 * If left empty no filtering is going to take place so all the parameters will be sent unfiltered towards the API
	 *
	 * @param  array $params
	 * @return array $params
	 */
	private function filterParams($params)
	{
		if (empty($this->paramsToFilter)) {
			return $params;
		}

		return $this->iterateThroughArrayAndCheckParamsRecursive($params, $this->paramsToFilter);
	}

	/**
	 * Recursive helper for the filterParams function filtering out always the specific level's parameters
	 *
	 * @param $params
	 * @param $paramsToFilter
	 * @return array
	 */
	private function iterateThroughArrayAndCheckParamsRecursive($params, $paramsToFilter)
	{
		foreach ($paramsToFilter as $key => $value) {
			if (is_array($value)){
				if ($value) {
					if (isset($params[$key])) {
						$params[$key] = $this->iterateThroughArrayAndCheckParamsRecursive($params[$key], $value);
					}
				}
			} else {
				if (isset($params[$value])) {
					unset($params[$value]);
				}
			}
		}

		return $params;
	}
}
