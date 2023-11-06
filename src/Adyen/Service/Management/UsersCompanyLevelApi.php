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

class UsersCompanyLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * UsersCompanyLevelApi constructor.
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
    * Get a list of users
    *
    * @param string $companyId
    * @param array|null $requestOptions ['queryParams' => ['pageNumber'=> int, 'pageSize'=> int, 'username'=> string]]
    * @return \Adyen\Model\Management\ListCompanyUsersResponse
    * @throws AdyenException
    */
    public function listUsers(string $companyId, array $requestOptions = null): \Adyen\Model\Management\ListCompanyUsersResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}'], [$companyId], "/companies/{companyId}/users");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\ListCompanyUsersResponse::class);
    }

    /**
    * Get user details
    *
    * @param string $companyId
    * @param string $userId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\CompanyUser
    * @throws AdyenException
    */
    public function getUserDetails(string $companyId, string $userId, array $requestOptions = null): \Adyen\Model\Management\CompanyUser
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{userId}'], [$companyId, $userId], "/companies/{companyId}/users/{userId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\CompanyUser::class);
    }

    /**
    * Update user details
    *
    * @param string $companyId
    * @param string $userId
    * @param \Adyen\Model\Management\UpdateCompanyUserRequest $updateCompanyUserRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\CompanyUser
    * @throws AdyenException
    */
    public function updateUserDetails(string $companyId, string $userId, \Adyen\Model\Management\UpdateCompanyUserRequest $updateCompanyUserRequest, array $requestOptions = null): \Adyen\Model\Management\CompanyUser
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{userId}'], [$companyId, $userId], "/companies/{companyId}/users/{userId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $updateCompanyUserRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\CompanyUser::class);
    }

    /**
    * Create a new user
    *
    * @param string $companyId
    * @param \Adyen\Model\Management\CreateCompanyUserRequest $createCompanyUserRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\CreateCompanyUserResponse
    * @throws AdyenException
    */
    public function createNewUser(string $companyId, \Adyen\Model\Management\CreateCompanyUserRequest $createCompanyUserRequest, array $requestOptions = null): \Adyen\Model\Management\CreateCompanyUserResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}'], [$companyId], "/companies/{companyId}/users");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $createCompanyUserRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\CreateCompanyUserResponse::class);
    }
}
