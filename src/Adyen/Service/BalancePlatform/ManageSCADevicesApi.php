<?php
/**
 * Configuration API
 *
 * The version of the OpenAPI document: 2
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service\BalancePlatform;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\BalancePlatform\ObjectSerializer;

class ManageSCADevicesApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * ManageSCADevicesApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://balanceplatform-api-test.adyen.com/bcl/v2");
    }

    /**
    * Complete an association between an SCA device and a resource
    *
    * @param string $deviceId
    * @param \Adyen\Model\BalancePlatform\AssociationFinaliseRequest $associationFinaliseRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\AssociationFinaliseResponse
    * @throws AdyenException
    */
    public function completeAssociationBetweenScaDeviceAndResource(string $deviceId, \Adyen\Model\BalancePlatform\AssociationFinaliseRequest $associationFinaliseRequest, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\AssociationFinaliseResponse
    {
        $endpoint = $this->baseURL . str_replace(['{deviceId}'], [$deviceId], "/registeredDevices/{deviceId}/associations");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $associationFinaliseRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\AssociationFinaliseResponse::class);
    }

    /**
    * Complete the registration of an SCA device
    *
    * @param string $id
    * @param \Adyen\Model\BalancePlatform\RegisterSCARequest $registerSCARequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\RegisterSCAFinalResponse
    * @throws AdyenException
    */
    public function completeRegistrationOfScaDevice(string $id, \Adyen\Model\BalancePlatform\RegisterSCARequest $registerSCARequest, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\RegisterSCAFinalResponse
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/registeredDevices/{id}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $registerSCARequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\RegisterSCAFinalResponse::class);
    }

    /**
    * Delete a registration of an SCA device
    *
    * @param string $id
    * @param array|null $requestOptions ['queryParams' => ['paymentInstrumentId'=> string]]
    
    * @throws AdyenException
    */
    public function deleteRegistrationOfScaDevice(string $id, ?array $requestOptions = null)
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/registeredDevices/{id}");
        $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
        
    }

    /**
    * Initiate an association between an SCA device and a resource
    *
    * @param string $deviceId
    * @param \Adyen\Model\BalancePlatform\AssociationInitiateRequest $associationInitiateRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\AssociationInitiateResponse
    * @throws AdyenException
    */
    public function initiateAssociationBetweenScaDeviceAndResource(string $deviceId, \Adyen\Model\BalancePlatform\AssociationInitiateRequest $associationInitiateRequest, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\AssociationInitiateResponse
    {
        $endpoint = $this->baseURL . str_replace(['{deviceId}'], [$deviceId], "/registeredDevices/{deviceId}/associations");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $associationInitiateRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\AssociationInitiateResponse::class);
    }

    /**
    * Initiate the registration of an SCA device
    *
    * @param \Adyen\Model\BalancePlatform\RegisterSCARequest $registerSCARequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\RegisterSCAResponse
    * @throws AdyenException
    */
    public function initiateRegistrationOfScaDevice(\Adyen\Model\BalancePlatform\RegisterSCARequest $registerSCARequest, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\RegisterSCAResponse
    {
        $endpoint = $this->baseURL . "/registeredDevices";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $registerSCARequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\RegisterSCAResponse::class);
    }

    /**
    * Get a list of registered SCA devices
    *
    * @param array|null $requestOptions ['queryParams' => ['paymentInstrumentId'=> string, 'pageNumber'=> int, 'pageSize'=> int]]
    * @return \Adyen\Model\BalancePlatform\SearchRegisteredDevicesResponse
    * @throws AdyenException
    */
    public function listRegisteredScaDevices(?array $requestOptions = null): \Adyen\Model\BalancePlatform\SearchRegisteredDevicesResponse
    {
        $endpoint = $this->baseURL . "/registeredDevices";
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\SearchRegisteredDevicesResponse::class);
    }
}
