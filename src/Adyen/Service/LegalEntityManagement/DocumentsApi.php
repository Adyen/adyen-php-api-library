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

class DocumentsApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * DocumentsApi constructor.
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
    * Delete a document
    *
    * @param string $id
    * @param array|null $requestOptions
    
    * @throws AdyenException
    */
    public function deleteDocument(string $id, array $requestOptions = null)
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/documents/{id}");
        $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
        
    }

    /**
    * Get a document
    *
    * @param string $id
    * @param array|null $requestOptions ['queryParams' => ['skipContent'=> bool]]
    * @return \Adyen\Model\LegalEntityManagement\Document
    * @throws AdyenException
    */
    public function getDocument(string $id, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\Document
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/documents/{id}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\Document::class);
    }

    /**
    * Update a document
    *
    * @param string $id
    * @param \Adyen\Model\LegalEntityManagement\Document $document
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\Document
    * @throws AdyenException
    */
    public function updateDocument(string $id, \Adyen\Model\LegalEntityManagement\Document $document, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\Document
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/documents/{id}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $document->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\Document::class);
    }

    /**
    * Upload a document for verification checks
    *
    * @param \Adyen\Model\LegalEntityManagement\Document $document
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\Document
    * @throws AdyenException
    */
    public function uploadDocumentForVerificationChecks(\Adyen\Model\LegalEntityManagement\Document $document, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\Document
    {
        $endpoint = $this->baseURL . "/documents";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $document->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\Document::class);
    }
}
