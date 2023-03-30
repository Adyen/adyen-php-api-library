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

class AccountStoreLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * AccountStoreLevelApi constructor.
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
    * Get a list of stores
    *
    * @param string $merchantId
    * @param int $pageNumber
    * @param int $pageSize
    * @param string $reference
    * @param array $requestOptions
    * @return \Adyen\Model\Management\ListStoresResponse
    * @throws AdyenException
    */
    public function listStoresByMerchantId(string $merchantId, array $requestOptions = null): \Adyen\Model\Management\ListStoresResponse
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}'], [$merchantId], "/merchants/{merchantId}/stores");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\ListStoresResponse::class);
    }

    /**
    * Get a store
    *
    * @param string $merchantId
    * @param string $storeId
    * @param array $requestOptions
    * @return \Adyen\Model\Management\Store
    * @throws AdyenException
    */
    public function getStore(string $merchantId, string $storeId, array $requestOptions = null): \Adyen\Model\Management\Store
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{storeId}'], [$merchantId, $storeId], "/merchants/{merchantId}/stores/{storeId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\Store::class);
    }

    /**
    * Get a list of stores
    *
    * @param int $pageNumber
    * @param int $pageSize
    * @param string $reference
    * @param string $merchantId
    * @param array $requestOptions
    * @return \Adyen\Model\Management\ListStoresResponse
    * @throws AdyenException
    */
    public function listStores(array $requestOptions = null): \Adyen\Model\Management\ListStoresResponse
    {
        $endpoint = $this->baseURL . "/stores";
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\ListStoresResponse::class);
    }

    /**
    * Get a store
    *
    * @param string $storeId
    * @param array $requestOptions
    * @return \Adyen\Model\Management\Store
    * @throws AdyenException
    */
    public function getStoreById(string $storeId, array $requestOptions = null): \Adyen\Model\Management\Store
    {
        $endpoint = $this->baseURL . str_replace(['{storeId}'], [$storeId], "/stores/{storeId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\Store::class);
    }

    /**
    * Update a store
    *
    * @param string $merchantId
    * @param string $storeId
    * @param \Adyen\Model\Management\UpdateStoreRequest $updateStoreRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Management\Store
    * @throws AdyenException
    */
    public function updateStore(string $merchantId, string $storeId, \Adyen\Model\Management\UpdateStoreRequest $updateStoreRequest, array $requestOptions = null): \Adyen\Model\Management\Store
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{storeId}'], [$merchantId, $storeId], "/merchants/{merchantId}/stores/{storeId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $updateStoreRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\Store::class);
    }

    /**
    * Update a store
    *
    * @param string $storeId
    * @param \Adyen\Model\Management\UpdateStoreRequest $updateStoreRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Management\Store
    * @throws AdyenException
    */
    public function updateStoreById(string $storeId, \Adyen\Model\Management\UpdateStoreRequest $updateStoreRequest, array $requestOptions = null): \Adyen\Model\Management\Store
    {
        $endpoint = $this->baseURL . str_replace(['{storeId}'], [$storeId], "/stores/{storeId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $updateStoreRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\Store::class);
    }

    /**
    * Create a store
    *
    * @param string $merchantId
    * @param \Adyen\Model\Management\StoreCreationRequest $storeCreationRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Management\Store
    * @throws AdyenException
    */
    public function createStoreByMerchantId(string $merchantId, \Adyen\Model\Management\StoreCreationRequest $storeCreationRequest, array $requestOptions = null): \Adyen\Model\Management\Store
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}'], [$merchantId], "/merchants/{merchantId}/stores");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $storeCreationRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\Store::class);
    }

    /**
    * Create a store
    *
    * @param \Adyen\Model\Management\StoreCreationWithMerchantCodeRequest $storeCreationWithMerchantCodeRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Management\Store
    * @throws AdyenException
    */
    public function createStore(\Adyen\Model\Management\StoreCreationWithMerchantCodeRequest $storeCreationWithMerchantCodeRequest, array $requestOptions = null): \Adyen\Model\Management\Store
    {
        $endpoint = $this->baseURL . "/stores";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $storeCreationWithMerchantCodeRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\Store::class);
    }
}
