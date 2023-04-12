<?php
/**
 * Adyen BinLookup API
 *
 * The version of the OpenAPI document: 54
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\BinLookup\ObjectSerializer;

class BinLookupApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * AdyenService constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);
        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://pal-test.adyen.com/pal/servlet/BinLookup/v54");
    }

    /**
    * Check if 3D Secure is available
    *
    * @param \Adyen\Model\BinLookup\ThreeDSAvailabilityRequest $threeDsAvailabilityRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\BinLookup\ThreeDSAvailabilityResponse
    * @throws AdyenException
    */
    public function get3dsAvailability(\Adyen\Model\BinLookup\ThreeDSAvailabilityRequest $threeDsAvailabilityRequest, array $requestOptions = null): \Adyen\Model\BinLookup\ThreeDSAvailabilityResponse
    {
        $endpoint = $this->baseURL . "/get3dsAvailability";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $threeDsAvailabilityRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BinLookup\ThreeDSAvailabilityResponse::class);
    }

    /**
    * Get a fees cost estimate
    *
    * @param \Adyen\Model\BinLookup\CostEstimateRequest $costEstimateRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\BinLookup\CostEstimateResponse
    * @throws AdyenException
    */
    public function getCostEstimate(\Adyen\Model\BinLookup\CostEstimateRequest $costEstimateRequest, array $requestOptions = null): \Adyen\Model\BinLookup\CostEstimateResponse
    {
        $endpoint = $this->baseURL . "/getCostEstimate";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $costEstimateRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BinLookup\CostEstimateResponse::class);
    }
}
