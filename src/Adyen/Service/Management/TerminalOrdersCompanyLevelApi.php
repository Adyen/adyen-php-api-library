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

class TerminalOrdersCompanyLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * TerminalOrdersCompanyLevelApi constructor.
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
    * Get a list of billing entities
    *
    * @param string $companyId
    * @param array|null $requestOptions ['queryParams' => ['name'=> string]]
    * @return \Adyen\Model\Management\BillingEntitiesResponse
    * @throws AdyenException
    */
    public function listBillingEntities(string $companyId, array $requestOptions = null): \Adyen\Model\Management\BillingEntitiesResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}'], [$companyId], "/companies/{companyId}/billingEntities");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\BillingEntitiesResponse::class);
    }

    /**
    * Get a list of shipping locations
    *
    * @param string $companyId
    * @param array|null $requestOptions ['queryParams' => ['name'=> string, 'offset'=> int, 'limit'=> int]]
    * @return \Adyen\Model\Management\ShippingLocationsResponse
    * @throws AdyenException
    */
    public function listShippingLocations(string $companyId, array $requestOptions = null): \Adyen\Model\Management\ShippingLocationsResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}'], [$companyId], "/companies/{companyId}/shippingLocations");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\ShippingLocationsResponse::class);
    }

    /**
    * Get a list of terminal models
    *
    * @param string $companyId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\TerminalModelsResponse
    * @throws AdyenException
    */
    public function listTerminalModels(string $companyId, array $requestOptions = null): \Adyen\Model\Management\TerminalModelsResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}'], [$companyId], "/companies/{companyId}/terminalModels");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\TerminalModelsResponse::class);
    }

    /**
    * Get a list of orders
    *
    * @param string $companyId
    * @param array|null $requestOptions ['queryParams' => ['customerOrderReference'=> string, 'status'=> string, 'offset'=> int, 'limit'=> int]]
    * @return \Adyen\Model\Management\TerminalOrdersResponse
    * @throws AdyenException
    */
    public function listOrders(string $companyId, array $requestOptions = null): \Adyen\Model\Management\TerminalOrdersResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}'], [$companyId], "/companies/{companyId}/terminalOrders");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\TerminalOrdersResponse::class);
    }

    /**
    * Get an order
    *
    * @param string $companyId
    * @param string $orderId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\TerminalOrder
    * @throws AdyenException
    */
    public function getOrder(string $companyId, string $orderId, array $requestOptions = null): \Adyen\Model\Management\TerminalOrder
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{orderId}'], [$companyId, $orderId], "/companies/{companyId}/terminalOrders/{orderId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\TerminalOrder::class);
    }

    /**
    * Get a list of terminal products
    *
    * @param string $companyId
    * @param array|null $requestOptions ['queryParams' => ['country'=> string, 'terminalModelId'=> string, 'offset'=> int, 'limit'=> int]]
    * @return \Adyen\Model\Management\TerminalProductsResponse
    * @throws AdyenException
    */
    public function listTerminalProducts(string $companyId, array $requestOptions = null): \Adyen\Model\Management\TerminalProductsResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}'], [$companyId], "/companies/{companyId}/terminalProducts");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\TerminalProductsResponse::class);
    }

    /**
    * Update an order
    *
    * @param string $companyId
    * @param string $orderId
    * @param \Adyen\Model\Management\TerminalOrderRequest $terminalOrderRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\TerminalOrder
    * @throws AdyenException
    */
    public function updateOrder(string $companyId, string $orderId, \Adyen\Model\Management\TerminalOrderRequest $terminalOrderRequest, array $requestOptions = null): \Adyen\Model\Management\TerminalOrder
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{orderId}'], [$companyId, $orderId], "/companies/{companyId}/terminalOrders/{orderId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $terminalOrderRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\TerminalOrder::class);
    }

    /**
    * Create a shipping location
    *
    * @param string $companyId
    * @param \Adyen\Model\Management\ShippingLocation $shippingLocation
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\ShippingLocation
    * @throws AdyenException
    */
    public function createShippingLocation(string $companyId, \Adyen\Model\Management\ShippingLocation $shippingLocation, array $requestOptions = null): \Adyen\Model\Management\ShippingLocation
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}'], [$companyId], "/companies/{companyId}/shippingLocations");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $shippingLocation->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\ShippingLocation::class);
    }

    /**
    * Create an order
    *
    * @param string $companyId
    * @param \Adyen\Model\Management\TerminalOrderRequest $terminalOrderRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\TerminalOrder
    * @throws AdyenException
    */
    public function createOrder(string $companyId, \Adyen\Model\Management\TerminalOrderRequest $terminalOrderRequest, array $requestOptions = null): \Adyen\Model\Management\TerminalOrder
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}'], [$companyId], "/companies/{companyId}/terminalOrders");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $terminalOrderRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\TerminalOrder::class);
    }

    /**
    * Cancel an order
    *
    * @param string $companyId
    * @param string $orderId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\TerminalOrder
    * @throws AdyenException
    */
    public function cancelOrder(string $companyId, string $orderId, array $requestOptions = null): \Adyen\Model\Management\TerminalOrder
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{orderId}'], [$companyId, $orderId], "/companies/{companyId}/terminalOrders/{orderId}/cancel");
        $response = $this->requestHttp($endpoint, strtolower('POST'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\TerminalOrder::class);
    }
}
