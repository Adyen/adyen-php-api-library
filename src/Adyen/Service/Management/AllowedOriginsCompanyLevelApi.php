<?php
/**
 * Management API
 *
 * The version of the OpenAPI document: 3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
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
        $this->baseURL = $this->createBaseUrl("https://management-test.adyen.com/v3");
    }

    /**
    * Create an allowed origin
    *
    * @param string $companyId
    * @param string $apiCredentialId
    * @param \Adyen\Model\Management\AllowedOrigin $allowedOrigin
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\AllowedOriginsResponse
    * @throws AdyenException
    */
    public function createAllowedOrigin(string $companyId, string $apiCredentialId, \Adyen\Model\Management\AllowedOrigin $allowedOrigin, array $requestOptions = null): \Adyen\Model\Management\AllowedOriginsResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{apiCredentialId}'], [$companyId, $apiCredentialId], "/companies/{companyId}/apiCredentials/{apiCredentialId}/allowedOrigins");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $allowedOrigin->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\AllowedOriginsResponse::class);
    }

    /**
    * Delete an allowed origin
    *
    * @param string $companyId
    * @param string $apiCredentialId
    * @param string $originId
    * @param array|null $requestOptions
    
    * @throws AdyenException
    */
    public function deleteAllowedOrigin(string $companyId, string $apiCredentialId, string $originId, array $requestOptions = null)
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{apiCredentialId}', '{originId}'], [$companyId, $apiCredentialId, $originId], "/companies/{companyId}/apiCredentials/{apiCredentialId}/allowedOrigins/{originId}");
        $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
        
    }

    /**
    * Get an allowed origin
    *
    * @param string $companyId
    * @param string $apiCredentialId
    * @param string $originId
    * @param array|null $requestOptions
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
    * Get a list of allowed origins
    *
    * @param string $companyId
    * @param string $apiCredentialId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\AllowedOriginsResponse
    * @throws AdyenException
    */
    public function listAllowedOrigins(string $companyId, string $apiCredentialId, array $requestOptions = null): \Adyen\Model\Management\AllowedOriginsResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{apiCredentialId}'], [$companyId, $apiCredentialId], "/companies/{companyId}/apiCredentials/{apiCredentialId}/allowedOrigins");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\AllowedOriginsResponse::class);
    }
}
