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

class TermsOfServiceApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * TermsOfServiceApi constructor.
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
    * Accept Terms of Service
    *
    * @param string $id
    * @param string $termsofservicedocumentid
    * @param \Adyen\Model\LegalEntityManagement\AcceptTermsOfServiceRequest $acceptTermsOfServiceRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\AcceptTermsOfServiceResponse
    * @throws AdyenException
    */
    public function acceptTermsOfService(string $id, string $termsofservicedocumentid, \Adyen\Model\LegalEntityManagement\AcceptTermsOfServiceRequest $acceptTermsOfServiceRequest, ?array $requestOptions = null): \Adyen\Model\LegalEntityManagement\AcceptTermsOfServiceResponse
    {
        $endpoint = $this->baseURL . str_replace(['{id}', '{termsofservicedocumentid}'], [$id, $termsofservicedocumentid], "/legalEntities/{id}/termsOfService/{termsofservicedocumentid}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $acceptTermsOfServiceRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\AcceptTermsOfServiceResponse::class);
    }

    /**
    * Get accepted Terms of Service document
    *
    * @param string $id
    * @param string $termsofserviceacceptancereference
    * @param array|null $requestOptions ['queryParams' => ['termsOfServiceDocumentFormat'=> string]]
    * @return \Adyen\Model\LegalEntityManagement\GetAcceptedTermsOfServiceDocumentResponse
    * @throws AdyenException
    */
    public function getAcceptedTermsOfServiceDocument(string $id, string $termsofserviceacceptancereference, ?array $requestOptions = null): \Adyen\Model\LegalEntityManagement\GetAcceptedTermsOfServiceDocumentResponse
    {
        $endpoint = $this->baseURL . str_replace(['{id}', '{termsofserviceacceptancereference}'], [$id, $termsofserviceacceptancereference], "/legalEntities/{id}/acceptedTermsOfServiceDocument/{termsofserviceacceptancereference}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\GetAcceptedTermsOfServiceDocumentResponse::class);
    }

    /**
    * Get Terms of Service document
    *
    * @param string $id
    * @param \Adyen\Model\LegalEntityManagement\GetTermsOfServiceDocumentRequest $getTermsOfServiceDocumentRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\GetTermsOfServiceDocumentResponse
    * @throws AdyenException
    */
    public function getTermsOfServiceDocument(string $id, \Adyen\Model\LegalEntityManagement\GetTermsOfServiceDocumentRequest $getTermsOfServiceDocumentRequest, ?array $requestOptions = null): \Adyen\Model\LegalEntityManagement\GetTermsOfServiceDocumentResponse
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/legalEntities/{id}/termsOfService");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $getTermsOfServiceDocumentRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\GetTermsOfServiceDocumentResponse::class);
    }

    /**
    * Get Terms of Service information for a legal entity
    *
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\GetTermsOfServiceAcceptanceInfosResponse
    * @throws AdyenException
    */
    public function getTermsOfServiceInformationForLegalEntity(string $id, ?array $requestOptions = null): \Adyen\Model\LegalEntityManagement\GetTermsOfServiceAcceptanceInfosResponse
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/legalEntities/{id}/termsOfServiceAcceptanceInfos");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\GetTermsOfServiceAcceptanceInfosResponse::class);
    }

    /**
    * Get Terms of Service status
    *
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\CalculateTermsOfServiceStatusResponse
    * @throws AdyenException
    */
    public function getTermsOfServiceStatus(string $id, ?array $requestOptions = null): \Adyen\Model\LegalEntityManagement\CalculateTermsOfServiceStatusResponse
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/legalEntities/{id}/termsOfServiceStatus");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\CalculateTermsOfServiceStatusResponse::class);
    }
}
