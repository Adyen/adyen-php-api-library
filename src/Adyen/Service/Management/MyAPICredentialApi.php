<?php
/**
 * Management API
 *
 * The version of the OpenAPI document: 1
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
        $this->baseURL = $this->createBaseUrl("https://management-test.adyen.com/v1");
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
}
