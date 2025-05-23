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

class UsersMerchantLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * UsersMerchantLevelApi constructor.
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
    * Create a new user
    *
    * @param string $merchantId
    * @param \Adyen\Model\Management\CreateMerchantUserRequest $createMerchantUserRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\CreateUserResponse
    * @throws AdyenException
    */
    public function createNewUser(string $merchantId, \Adyen\Model\Management\CreateMerchantUserRequest $createMerchantUserRequest, ?array $requestOptions = null): \Adyen\Model\Management\CreateUserResponse
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}'], [$merchantId], "/merchants/{merchantId}/users");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $createMerchantUserRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\CreateUserResponse::class);
    }

    /**
    * Get user details
    *
    * @param string $merchantId
    * @param string $userId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\User
    * @throws AdyenException
    */
    public function getUserDetails(string $merchantId, string $userId, ?array $requestOptions = null): \Adyen\Model\Management\User
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{userId}'], [$merchantId, $userId], "/merchants/{merchantId}/users/{userId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\User::class);
    }

    /**
    * Get a list of users
    *
    * @param string $merchantId
    * @param array|null $requestOptions ['queryParams' => ['pageNumber'=> int, 'pageSize'=> int, 'username'=> string]]
    * @return \Adyen\Model\Management\ListMerchantUsersResponse
    * @throws AdyenException
    */
    public function listUsers(string $merchantId, ?array $requestOptions = null): \Adyen\Model\Management\ListMerchantUsersResponse
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}'], [$merchantId], "/merchants/{merchantId}/users");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\ListMerchantUsersResponse::class);
    }

    /**
    * Update a user
    *
    * @param string $merchantId
    * @param string $userId
    * @param \Adyen\Model\Management\UpdateMerchantUserRequest $updateMerchantUserRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\User
    * @throws AdyenException
    */
    public function updateUser(string $merchantId, string $userId, \Adyen\Model\Management\UpdateMerchantUserRequest $updateMerchantUserRequest, ?array $requestOptions = null): \Adyen\Model\Management\User
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{userId}'], [$merchantId, $userId], "/merchants/{merchantId}/users/{userId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $updateMerchantUserRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\User::class);
    }
}
