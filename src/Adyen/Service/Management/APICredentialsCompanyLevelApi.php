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

class APICredentialsCompanyLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * APICredentialsCompanyLevelApi constructor.
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
    * Create an API credential.
    *
    * @param string $companyId
    * @param \Adyen\Model\Management\CreateCompanyApiCredentialRequest $createCompanyApiCredentialRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\CreateCompanyApiCredentialResponse
    * @throws AdyenException
    */
    public function createApiCredential(string $companyId, \Adyen\Model\Management\CreateCompanyApiCredentialRequest $createCompanyApiCredentialRequest, ?array $requestOptions = null): \Adyen\Model\Management\CreateCompanyApiCredentialResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}'], [$companyId], "/companies/{companyId}/apiCredentials");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $createCompanyApiCredentialRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\CreateCompanyApiCredentialResponse::class);
    }

    /**
    * Get an API credential
    *
    * @param string $companyId
    * @param string $apiCredentialId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\CompanyApiCredential
    * @throws AdyenException
    */
    public function getApiCredential(string $companyId, string $apiCredentialId, ?array $requestOptions = null): \Adyen\Model\Management\CompanyApiCredential
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{apiCredentialId}'], [$companyId, $apiCredentialId], "/companies/{companyId}/apiCredentials/{apiCredentialId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\CompanyApiCredential::class);
    }

    /**
    * Get a list of API credentials
    *
    * @param string $companyId
    * @param array|null $requestOptions ['queryParams' => ['pageNumber'=> int, 'pageSize'=> int]]
    * @return \Adyen\Model\Management\ListCompanyApiCredentialsResponse
    * @throws AdyenException
    */
    public function listApiCredentials(string $companyId, ?array $requestOptions = null): \Adyen\Model\Management\ListCompanyApiCredentialsResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}'], [$companyId], "/companies/{companyId}/apiCredentials");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\ListCompanyApiCredentialsResponse::class);
    }

    /**
    * Update an API credential.
    *
    * @param string $companyId
    * @param string $apiCredentialId
    * @param \Adyen\Model\Management\UpdateCompanyApiCredentialRequest $updateCompanyApiCredentialRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\CompanyApiCredential
    * @throws AdyenException
    */
    public function updateApiCredential(string $companyId, string $apiCredentialId, \Adyen\Model\Management\UpdateCompanyApiCredentialRequest $updateCompanyApiCredentialRequest, ?array $requestOptions = null): \Adyen\Model\Management\CompanyApiCredential
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{apiCredentialId}'], [$companyId, $apiCredentialId], "/companies/{companyId}/apiCredentials/{apiCredentialId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $updateCompanyApiCredentialRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\CompanyApiCredential::class);
    }
}
