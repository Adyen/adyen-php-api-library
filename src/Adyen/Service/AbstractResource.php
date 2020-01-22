<?php

namespace Adyen\Service;

use Adyen\AdyenException;
use Adyen\Service;

abstract class AbstractResource
{
    /**
     * @var Service
     */
    protected $service;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var bool
     */
    protected $allowApplicationInfo;

    /**
     * @var bool
     */
    protected $allowApplicationInfoPOS;

    /**
     * AbstractResource constructor.
     *
     * @param Service $service
     * @param string $endpoint
     * @param bool $allowApplicationInfo
     * @param bool $allowApplicationInfoPOS
     */
    public function __construct(
        Service $service,
        $endpoint,
        $allowApplicationInfo = false,
        $allowApplicationInfoPOS = false
    ) {
        $this->service = $service;
        $this->endpoint = $endpoint;
        $this->allowApplicationInfo = $allowApplicationInfo;
        $this->allowApplicationInfoPOS = $allowApplicationInfoPOS;
    }

    /**
     * Do the request to the Http Client
     *
     * @param $params
     * @param null $requestOptions
     * @return mixed
     * @throws AdyenException
     */
    public function request($params, $requestOptions = null)
    {
        // convert to PHP Array if type is inputType is json
        if ($this->service->getClient()->getConfig()->getInputType() == 'json') {
            $params = json_decode($params, true);
            if ($params === null && json_last_error() !== JSON_ERROR_NONE) {
                $msg = 'The parameters in the request expect valid JSON but JSON error code found: ' .
                    json_last_error();
                $this->service->getClient()->getLogger()->error($msg);
                throw new AdyenException($msg);
            }
        }

        if (!is_array($params)) {
            $msg = 'The parameter is not valid array';
            $this->service->getClient()->getLogger()->error($msg);
            throw new AdyenException($msg);
        }

        $params = $this->addDefaultParametersToRequest($params);

        if ($this->allowApplicationInfo) {
            $params = $this->handleApplicationInfoInRequest($params);
        } elseif ($this->allowApplicationInfoPOS) {
            $params = $this->handleApplicationInfoInRequestPOS($params);
        } else {
            // remove if exists
            if (isset($params['applicationInfo'])) {
                unset($params['applicationInfo']);
            }
        }

        $curlClient = $this->service->getClient()->getHttpClient();
        return $curlClient->requestJson($this->service, $this->endpoint, $params, $requestOptions);
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function requestPost($params)
    {
        // check if paramenters has a value
        if (!$params) {
            $msg = 'The parameters in the request are empty';
            $this->service->getClient()->getLogger()->error($msg);
            throw new AdyenException($msg);
        }

        $curlClient = $this->service->getClient()->getHttpClient();
        return $curlClient->requestPost($this->service, $this->endpoint, $params);
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
        if (!isset($params['merchantAccount']) && $this->service->getClient()->getConfig()->getMerchantAccount()) {
            $params['merchantAccount'] = $this->service->getClient()->getConfig()->getMerchantAccount();
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
        // add/overwrite applicationInfo adyenLibrary even if it's already set
        $params['applicationInfo']['adyenLibrary']['name'] = $this->service->getClient()->getLibraryName();
        $params['applicationInfo']['adyenLibrary']['version'] = $this->service->getClient()->getLibraryVersion();

        if ($adyenPaymentSource = $this->service->getClient()->getConfig()->getAdyenPaymentSource()) {
            $params['applicationInfo']['adyenPaymentSource']['version'] = $adyenPaymentSource['version'];
            $params['applicationInfo']['adyenPaymentSource']['name'] = $adyenPaymentSource['name'];
        }

        if ($externalPlatform = $this->service->getClient()->getConfig()->getExternalPlatform()) {
            $params['applicationInfo']['externalPlatform']['version'] = $externalPlatform['version'];
            $params['applicationInfo']['externalPlatform']['name'] = $externalPlatform['name'];

            if (!empty($externalPlatform['integrator'])) {
                $params['applicationInfo']['externalPlatform']['integrator'] = $externalPlatform['integrator'];
            }
        }

        if ($merchantApplication = $this->service->getClient()->getConfig()->getMerchantApplication()) {
            $params['applicationInfo']['merchantApplication']['version'] = $merchantApplication['version'];
            $params['applicationInfo']['merchantApplication']['name'] = $merchantApplication['name'];
        }


        return $params;
    }

    /**
     * If allowApplicationInfoPOS is true, this function does the following:
     * 1) Converts SaleToAcquirerData to array(from querystring or base64encoded)
     * 2) Adds ApplicationInfo to the array
     * 3) Base64 encodes SaleToAcquirerData
     *
     * @param $params
     * @return array|null
     */
    private function handleApplicationInfoInRequestPOS(array $params)
    {
        //If the POS request is not a payment request, do not add application info
        if (empty($params['SaleToPOIRequest']['PaymentRequest'])) {
            return $params;
        }

        // Initialize $saleToAcquirerData
        $saleToAcquirerData = array();

        if (!empty($params['SaleToPOIRequest']['PaymentRequest']['SaleData']['SaleToAcquirerData'])) {
            $saleToAcquirerData = $params['SaleToPOIRequest']['PaymentRequest']['SaleData']['SaleToAcquirerData'];

            //If SaleToAcquirerData is a querystring convert it to array
            parse_str($saleToAcquirerData, $queryString);
            $queryStringValues = array_values($queryString);

            //check if querystring is nonempty and contains a value
            if (!empty($queryString) && !empty($queryStringValues[0])) {
                $saleToAcquirerData = $queryString;
            } elseif ($this->isBase64Encoded($saleToAcquirerData)) {
                //If SaleToAcquirerData is a base64encoded string decode it and convert it to array
                $saleToAcquirerData = json_decode(base64_decode($saleToAcquirerData, true), true);
            }
        }

        //add Application Information
        $saleToAcquirerData = $this->handleApplicationInfoInRequest($saleToAcquirerData);
        $saleToAcquirerData = base64_encode(json_encode($saleToAcquirerData));
        $params['SaleToPOIRequest']['PaymentRequest']['SaleData']['SaleToAcquirerData'] = $saleToAcquirerData;

        return $params;
    }

    /**
     * @param $data
     * @return bool
     */
    private function isBase64Encoded($data)
    {
        if (preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $data) && !empty($data)) {
            return true;
        } else {
            return false;
        }
    }
}
