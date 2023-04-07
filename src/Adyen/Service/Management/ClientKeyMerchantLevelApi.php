<?php
/**
 * Management API
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

class ClientKeyMerchantLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * ClientKeyMerchantLevelApi constructor.
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
    * Generate new client key
    *
    * @param string $merchantId
    * @param string $apiCredentialId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\GenerateClientKeyResponse
    * @throws AdyenException
    */
    public function generateNewClientKey(string $merchantId, string $apiCredentialId, array $requestOptions = null): \Adyen\Model\Management\GenerateClientKeyResponse
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{apiCredentialId}'], [$merchantId, $apiCredentialId], "/merchants/{merchantId}/apiCredentials/{apiCredentialId}/generateClientKey");
        $response = $this->requestHttp($endpoint, strtolower('POST'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\GenerateClientKeyResponse::class);
    }
}
