<?php
/**
 * Legal Entity Management API
 *
 * The Legal Entity Management API enables you to manage legal entities that contain information required for verification.  ## Authentication To connect to the Legal Entity Management API, you must use the basic authentication credentials of your web service user. If you don't have one, contact the [Adyen Support Team](https://www.adyen.help/hc/en-us/requests/new). Use the web service user credentials to authenticate your request, for example:  ``` curl -U \"ws_123456@Scope.BalancePlatform_YourBalancePlatform\":\"YourWsPassword\" \\ -H \"Content-Type: application/json\" \\ ... ``` Note that when going live, you need to generate new web service user credentials to access the [live endpoints](https://docs.adyen.com/development-resources/live-endpoints).  ## Versioning The Legal Entity Management API supports versioning of its endpoints through a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://kyc-test.adyen.com/lem/v3/legalEntities ``` ## Going live When going live, your Adyen contact will provide your API credential for the live environment. You can then use the username and password to send requests to `https://kyc-live.adyen.com/lem/v3`.
 *
 * The version of the OpenAPI document: 3
 * Contact: developer-experience@adyen.com
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
    * @param array $requestOptions
    * @return object
    * @throws AdyenException
    */
    public function deleteDocument(string $id, array $requestOptions = null): void
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/documents/{id}");
        $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
    }

    /**
    * Get a document
    *
    * @param string $id
    * @param array $requestOptions
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
    * @param array $requestOptions
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
    * @param array $requestOptions
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
