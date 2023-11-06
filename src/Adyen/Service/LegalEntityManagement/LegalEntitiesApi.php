<?php
/**
 * Legal Entity Management API
 *
 * The version of the OpenAPI document: 3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
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

class LegalEntitiesApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * LegalEntitiesApi constructor.
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
    * Get a legal entity
    *
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\LegalEntity
    * @throws AdyenException
    */
    public function getLegalEntity(string $id, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\LegalEntity
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/legalEntities/{id}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\LegalEntity::class);
    }

    /**
    * Get all business lines under a legal entity
    *
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\BusinessLines
    * @throws AdyenException
    */
    public function getAllBusinessLinesUnderLegalEntity(string $id, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\BusinessLines
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/legalEntities/{id}/businessLines");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\BusinessLines::class);
    }

    /**
    * Update a legal entity
    *
    * @param string $id
    * @param \Adyen\Model\LegalEntityManagement\LegalEntityInfo $legalEntityInfo
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\LegalEntity
    * @throws AdyenException
    */
    public function updateLegalEntity(string $id, \Adyen\Model\LegalEntityManagement\LegalEntityInfo $legalEntityInfo, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\LegalEntity
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/legalEntities/{id}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $legalEntityInfo->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\LegalEntity::class);
    }

    /**
    * Create a legal entity
    *
    * @param \Adyen\Model\LegalEntityManagement\LegalEntityInfoRequiredType $legalEntityInfoRequiredType
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\LegalEntity
    * @throws AdyenException
    */
    public function createLegalEntity(\Adyen\Model\LegalEntityManagement\LegalEntityInfoRequiredType $legalEntityInfoRequiredType, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\LegalEntity
    {
        $endpoint = $this->baseURL . "/legalEntities";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $legalEntityInfoRequiredType->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\LegalEntity::class);
    }

    /**
    * Check a legal entity&#39;s verification errors
    *
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\VerificationErrors
    * @throws AdyenException
    */
    public function checkLegalEntitysVerificationErrors(string $id, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\VerificationErrors
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/legalEntities/{id}/checkVerificationErrors");
        $response = $this->requestHttp($endpoint, strtolower('POST'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\VerificationErrors::class);
    }
}
