<?php
/**
 * Management API
 *
 * Configure and manage your Adyen company and merchant accounts, stores, and payment terminals. ## Authentication Each request to the Management API must be signed with an API key. [Generate your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) in the Customer Area and then set this key to the `X-API-Key` header value.  To access the live endpoints, you need to generate a new API key in your live Customer Area. ## Versioning  Management API handles versioning as part of the endpoint URL. For example, to send a request to version 1 of the `/companies/{companyId}/webhooks` endpoint, use:  ```text https://management-test.adyen.com/v1/companies/{companyId}/webhooks ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area. Use this API key to make requests to:  ```text https://management-live.adyen.com/v1 ```
 *
 * The version of the OpenAPI document: 1
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service\Management;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\Management\ObjectSerializer;

class AllowedOriginsCompanyLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * AllowedOriginsCompanyLevelApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://management-test.adyen.com/v1");
    }

    /**
    * Delete an allowed origin
    *
    * @param string $companyId
    * @param string $apiCredentialId
    * @param string $originId
    * @param array $requestOptions
    
    * @throws AdyenException
    */
    public function deleteAllowedOrigin(string $companyId, string $apiCredentialId, string $originId, array $requestOptions = null)
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{apiCredentialId}', '{originId}'], [$companyId, $apiCredentialId, $originId], "/companies/{companyId}/apiCredentials/{apiCredentialId}/allowedOrigins/{originId}");
        $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
        
    }

    /**
    * Get a list of allowed origins
    *
    * @param string $companyId
    * @param string $apiCredentialId
    * @param array $requestOptions
    * @return \Adyen\Model\Management\AllowedOriginsResponse
    * @throws AdyenException
    */
    public function listAllowedOrigins(string $companyId, string $apiCredentialId, array $requestOptions = null): \Adyen\Model\Management\AllowedOriginsResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{apiCredentialId}'], [$companyId, $apiCredentialId], "/companies/{companyId}/apiCredentials/{apiCredentialId}/allowedOrigins");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\AllowedOriginsResponse::class);
    }

    /**
    * Get an allowed origin
    *
    * @param string $companyId
    * @param string $apiCredentialId
    * @param string $originId
    * @param array $requestOptions
    * @return \Adyen\Model\Management\AllowedOrigin
    * @throws AdyenException
    */
    public function getAllowedOrigin(string $companyId, string $apiCredentialId, string $originId, array $requestOptions = null): \Adyen\Model\Management\AllowedOrigin
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{apiCredentialId}', '{originId}'], [$companyId, $apiCredentialId, $originId], "/companies/{companyId}/apiCredentials/{apiCredentialId}/allowedOrigins/{originId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\AllowedOrigin::class);
    }

    /**
    * Create an allowed origin
    *
    * @param string $companyId
    * @param string $apiCredentialId
    * @param \Adyen\Model\Management\AllowedOrigin $allowedOrigin
    * @param array $requestOptions
    * @return \Adyen\Model\Management\AllowedOriginsResponse
    * @throws AdyenException
    */
    public function createAllowedOrigin(string $companyId, string $apiCredentialId, \Adyen\Model\Management\AllowedOrigin $allowedOrigin, array $requestOptions = null): \Adyen\Model\Management\AllowedOriginsResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{apiCredentialId}'], [$companyId, $apiCredentialId], "/companies/{companyId}/apiCredentials/{apiCredentialId}/allowedOrigins");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $allowedOrigin->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\AllowedOriginsResponse::class);
    }
}
