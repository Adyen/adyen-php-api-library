<?php

namespace Adyen\Service;

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
	 * @var bool
	 */
    protected $allowApplicationInfo;

	/**
	 * AbstractResource constructor.
	 *
	 * @param \Adyen\Service $service
	 * @param $endpoint
	 * @param bool $allowApplicationInfo
	 */
    public function __construct(\Adyen\Service $service, $endpoint, $allowApplicationInfo = false)
    {
        $this->_service = $service;
        $this->_endpoint = $endpoint;
        $this->allowApplicationInfo = $allowApplicationInfo;
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

        $params = $this->handleApplicationInfoInRequest($params);

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

		return $params;
	}

	/**
	 * If allowApplicationInfo is true then it adds applicationInfo to request
	 * otherwise removes from the request
	 *
	 * @param $params
	 * @return mixed
	 */
	private function handleApplicationInfoInRequest($params)
	{
		// Only add if allowed
		if ($this->allowApplicationInfo) {
			// add/overwrite applicationInfo adyenLibrary even if it's already set
			$params['applicationInfo']['adyenLibrary']['name'] = $this->_service->getClient()->getLibraryName();
			$params['applicationInfo']['adyenLibrary']['version'] = $this->_service->getClient()->getLibraryVersion();

			if ($adyenPaymentSource = $this->_service->getClient()->getConfig()->getAdyenPaymentSource()) {
				$params['applicationInfo']['adyenPaymentSource']['version'] = $adyenPaymentSource['version'];
				$params['applicationInfo']['adyenPaymentSource']['name'] = $adyenPaymentSource['name'];
			}

			if ($externalPlatform = $this->_service->getClient()->getConfig()->getExternalPlatform()) {
				$params['applicationInfo']['externalPlatform']['version'] = $externalPlatform['version'];
				$params['applicationInfo']['externalPlatform']['name'] = $externalPlatform['name'];

				if (!empty($externalPlatform['integrator'])) {
					$params['applicationInfo']['externalPlatform']['integrator'] = $externalPlatform['integrator'];
				}
			}

		} else {
			// remove if exists
			if (isset($params['applicationInfo'])) {
				unset($params['applicationInfo']);
			}
		}

		return $params;
	}
}
