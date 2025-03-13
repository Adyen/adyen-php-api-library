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

class AccountHoldersApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * AccountHoldersApi constructor.
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
    * Create an account holder
    *
    * @param \Adyen\Model\BalancePlatform\AccountHolderInfo $accountHolderInfo
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\AccountHolder
    * @throws AdyenException
    */
    public function createAccountHolder(\Adyen\Model\BalancePlatform\AccountHolderInfo $accountHolderInfo, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\AccountHolder
    {
        $endpoint = $this->baseURL . "/accountHolders";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $accountHolderInfo->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\AccountHolder::class);
    }

    /**
    * Get an account holder
    *
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\AccountHolder
    * @throws AdyenException
    */
    public function getAccountHolder(string $id, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\AccountHolder
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/accountHolders/{id}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\AccountHolder::class);
    }

    /**
    * Get all balance accounts of an account holder
    *
    * @param string $id
    * @param array|null $requestOptions ['queryParams' => ['offset'=> int, 'limit'=> int]]
    * @return \Adyen\Model\BalancePlatform\PaginatedBalanceAccountsResponse
    * @throws AdyenException
    */
    public function getAllBalanceAccountsOfAccountHolder(string $id, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\PaginatedBalanceAccountsResponse
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/accountHolders/{id}/balanceAccounts");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\PaginatedBalanceAccountsResponse::class);
    }

    /**
    * Get all transaction rules for an account holder
    *
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\TransactionRulesResponse
    * @throws AdyenException
    */
    public function getAllTransactionRulesForAccountHolder(string $id, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\TransactionRulesResponse
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/accountHolders/{id}/transactionRules");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\TransactionRulesResponse::class);
    }

    /**
    * Get a tax form
    *
    * @param string $id
    * @param array|null $requestOptions ['queryParams' => ['formType'=> string, 'year'=> int]]
    * @return \Adyen\Model\BalancePlatform\GetTaxFormResponse
    * @throws AdyenException
    */
    public function getTaxForm(string $id, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\GetTaxFormResponse
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/accountHolders/{id}/taxForms");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\GetTaxFormResponse::class);
    }

    /**
    * Update an account holder
    *
    * @param string $id
    * @param \Adyen\Model\BalancePlatform\AccountHolderUpdateRequest $accountHolderUpdateRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\AccountHolder
    * @throws AdyenException
    */
    public function updateAccountHolder(string $id, \Adyen\Model\BalancePlatform\AccountHolderUpdateRequest $accountHolderUpdateRequest, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\AccountHolder
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/accountHolders/{id}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $accountHolderUpdateRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\AccountHolder::class);
    }
}
