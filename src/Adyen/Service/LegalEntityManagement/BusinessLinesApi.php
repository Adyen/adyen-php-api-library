<?php
/**
 * Legal Entity Management API
 *
 * The version of the OpenAPI document: 3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service\LegalEntityManagement;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\LegalEntityManagement\ObjectSerializer;

class BusinessLinesApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * BusinessLinesApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://kyc-test.adyen.com/lem/v3");
    }

    /**
    * Delete a business line
    *
    * @param string $id
    * @param array|null $requestOptions

    * @throws AdyenException
    */
    public function deleteBusinessLine(string $id, array $requestOptions = null)
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/businessLines/{id}");
        $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
    }

    /**
    * Get a business line
    *
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\BusinessLine
    * @throws AdyenException
    */
    public function getBusinessLine(string $id, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\BusinessLine
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/businessLines/{id}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\BusinessLine::class);
    }

    /**
    * Update a business line
    *
    * @param string $id
    * @param \Adyen\Model\LegalEntityManagement\BusinessLineInfoUpdate $businessLineInfoUpdate
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\BusinessLine
    * @throws AdyenException
    */
    public function updateBusinessLine(string $id, \Adyen\Model\LegalEntityManagement\BusinessLineInfoUpdate $businessLineInfoUpdate, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\BusinessLine
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/businessLines/{id}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $businessLineInfoUpdate->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\BusinessLine::class);
    }

    /**
    * Create a business line
    *
    * @param \Adyen\Model\LegalEntityManagement\BusinessLineInfo $businessLineInfo
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\BusinessLine
    * @throws AdyenException
    */
    public function createBusinessLine(\Adyen\Model\LegalEntityManagement\BusinessLineInfo $businessLineInfo, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\BusinessLine
    {
        $endpoint = $this->baseURL . "/businessLines";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $businessLineInfo->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\BusinessLine::class);
    }
}
