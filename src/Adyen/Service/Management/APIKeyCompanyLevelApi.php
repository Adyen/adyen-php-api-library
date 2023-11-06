<?php
/**
 * Management API
 *
 * The version of the OpenAPI document: 1
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

class APIKeyCompanyLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * APIKeyCompanyLevelApi constructor.
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
    * Generate new API key
    *
    * @param string $companyId
    * @param string $apiCredentialId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\GenerateApiKeyResponse
    * @throws AdyenException
    */
    public function generateNewApiKey(string $companyId, string $apiCredentialId, array $requestOptions = null): \Adyen\Model\Management\GenerateApiKeyResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{apiCredentialId}'], [$companyId, $apiCredentialId], "/companies/{companyId}/apiCredentials/{apiCredentialId}/generateApiKey");
        $response = $this->requestHttp($endpoint, strtolower('POST'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\GenerateApiKeyResponse::class);
    }
}
