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

class MyAPICredentialApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * MyAPICredentialApi constructor.
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
    * Add allowed origin
    *
    * @param \Adyen\Model\Management\CreateAllowedOriginRequest $createAllowedOriginRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\AllowedOrigin
    * @throws AdyenException
    */
    public function addAllowedOrigin(\Adyen\Model\Management\CreateAllowedOriginRequest $createAllowedOriginRequest, array $requestOptions = null): \Adyen\Model\Management\AllowedOrigin
    {
        $endpoint = $this->baseURL . "/me/allowedOrigins";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $createAllowedOriginRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\AllowedOrigin::class);
    }

    /**
    * Generate a client key
    *
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\GenerateClientKeyResponse
    * @throws AdyenException
    */
    public function generateClientKey(array $requestOptions = null): \Adyen\Model\Management\GenerateClientKeyResponse
    {
        $endpoint = $this->baseURL . "/me/generateClientKey";
        $response = $this->requestHttp($endpoint, strtolower('POST'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\GenerateClientKeyResponse::class);
    }

    /**
    * Get allowed origin details
    *
    * @param string $originId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\AllowedOrigin
    * @throws AdyenException
    */
    public function getAllowedOriginDetails(string $originId, array $requestOptions = null): \Adyen\Model\Management\AllowedOrigin
    {
        $endpoint = $this->baseURL . str_replace(['{originId}'], [$originId], "/me/allowedOrigins/{originId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\AllowedOrigin::class);
    }

    /**
    * Get allowed origins
    *
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\AllowedOriginsResponse
    * @throws AdyenException
    */
    public function getAllowedOrigins(array $requestOptions = null): \Adyen\Model\Management\AllowedOriginsResponse
    {
        $endpoint = $this->baseURL . "/me/allowedOrigins";
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\AllowedOriginsResponse::class);
    }

    /**
    * Get API credential details
    *
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\MeApiCredential
    * @throws AdyenException
    */
    public function getApiCredentialDetails(array $requestOptions = null): \Adyen\Model\Management\MeApiCredential
    {
        $endpoint = $this->baseURL . "/me";
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\MeApiCredential::class);
    }

    /**
    * Remove allowed origin
    *
    * @param string $originId
    * @param array|null $requestOptions
    
    * @throws AdyenException
    */
    public function removeAllowedOrigin(string $originId, array $requestOptions = null)
    {
        $endpoint = $this->baseURL . str_replace(['{originId}'], [$originId], "/me/allowedOrigins/{originId}");
        $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
        
    }
}
