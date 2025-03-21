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

class BalanceAccountsApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * BalanceAccountsApi constructor.
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
    * Create a balance account
    *
    * @param \Adyen\Model\BalancePlatform\BalanceAccountInfo $balanceAccountInfo
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\BalanceAccount
    * @throws AdyenException
    */
    public function createBalanceAccount(\Adyen\Model\BalancePlatform\BalanceAccountInfo $balanceAccountInfo, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\BalanceAccount
    {
        $endpoint = $this->baseURL . "/balanceAccounts";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $balanceAccountInfo->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\BalanceAccount::class);
    }

    /**
    * Create a sweep
    *
    * @param string $balanceAccountId
    * @param \Adyen\Model\BalancePlatform\CreateSweepConfigurationV2 $createSweepConfigurationV2
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\SweepConfigurationV2
    * @throws AdyenException
    */
    public function createSweep(string $balanceAccountId, \Adyen\Model\BalancePlatform\CreateSweepConfigurationV2 $createSweepConfigurationV2, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\SweepConfigurationV2
    {
        $endpoint = $this->baseURL . str_replace(['{balanceAccountId}'], [$balanceAccountId], "/balanceAccounts/{balanceAccountId}/sweeps");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $createSweepConfigurationV2->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\SweepConfigurationV2::class);
    }

    /**
    * Delete a sweep
    *
    * @param string $balanceAccountId
    * @param string $sweepId
    * @param array|null $requestOptions
    
    * @throws AdyenException
    */
    public function deleteSweep(string $balanceAccountId, string $sweepId, ?array $requestOptions = null)
    {
        $endpoint = $this->baseURL . str_replace(['{balanceAccountId}', '{sweepId}'], [$balanceAccountId, $sweepId], "/balanceAccounts/{balanceAccountId}/sweeps/{sweepId}");
        $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
        
    }

    /**
    * Get all sweeps for a balance account
    *
    * @param string $balanceAccountId
    * @param array|null $requestOptions ['queryParams' => ['offset'=> int, 'limit'=> int]]
    * @return \Adyen\Model\BalancePlatform\BalanceSweepConfigurationsResponse
    * @throws AdyenException
    */
    public function getAllSweepsForBalanceAccount(string $balanceAccountId, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\BalanceSweepConfigurationsResponse
    {
        $endpoint = $this->baseURL . str_replace(['{balanceAccountId}'], [$balanceAccountId], "/balanceAccounts/{balanceAccountId}/sweeps");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\BalanceSweepConfigurationsResponse::class);
    }

    /**
    * Get all transaction rules for a balance account
    *
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\TransactionRulesResponse
    * @throws AdyenException
    */
    public function getAllTransactionRulesForBalanceAccount(string $id, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\TransactionRulesResponse
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/balanceAccounts/{id}/transactionRules");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\TransactionRulesResponse::class);
    }

    /**
    * Get a balance account
    *
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\BalanceAccount
    * @throws AdyenException
    */
    public function getBalanceAccount(string $id, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\BalanceAccount
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/balanceAccounts/{id}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\BalanceAccount::class);
    }

    /**
    * Get payment instruments linked to a balance account
    *
    * @param string $id
    * @param array|null $requestOptions ['queryParams' => ['offset'=> int, 'limit'=> int, 'status'=> string]]
    * @return \Adyen\Model\BalancePlatform\PaginatedPaymentInstrumentsResponse
    * @throws AdyenException
    */
    public function getPaymentInstrumentsLinkedToBalanceAccount(string $id, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\PaginatedPaymentInstrumentsResponse
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/balanceAccounts/{id}/paymentInstruments");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\PaginatedPaymentInstrumentsResponse::class);
    }

    /**
    * Get a sweep
    *
    * @param string $balanceAccountId
    * @param string $sweepId
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\SweepConfigurationV2
    * @throws AdyenException
    */
    public function getSweep(string $balanceAccountId, string $sweepId, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\SweepConfigurationV2
    {
        $endpoint = $this->baseURL . str_replace(['{balanceAccountId}', '{sweepId}'], [$balanceAccountId, $sweepId], "/balanceAccounts/{balanceAccountId}/sweeps/{sweepId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\SweepConfigurationV2::class);
    }

    /**
    * Update a balance account
    *
    * @param string $id
    * @param \Adyen\Model\BalancePlatform\BalanceAccountUpdateRequest $balanceAccountUpdateRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\BalanceAccount
    * @throws AdyenException
    */
    public function updateBalanceAccount(string $id, \Adyen\Model\BalancePlatform\BalanceAccountUpdateRequest $balanceAccountUpdateRequest, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\BalanceAccount
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/balanceAccounts/{id}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $balanceAccountUpdateRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\BalanceAccount::class);
    }

    /**
    * Update a sweep
    *
    * @param string $balanceAccountId
    * @param string $sweepId
    * @param \Adyen\Model\BalancePlatform\UpdateSweepConfigurationV2 $updateSweepConfigurationV2
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\SweepConfigurationV2
    * @throws AdyenException
    */
    public function updateSweep(string $balanceAccountId, string $sweepId, \Adyen\Model\BalancePlatform\UpdateSweepConfigurationV2 $updateSweepConfigurationV2, ?array $requestOptions = null): \Adyen\Model\BalancePlatform\SweepConfigurationV2
    {
        $endpoint = $this->baseURL . str_replace(['{balanceAccountId}', '{sweepId}'], [$balanceAccountId, $sweepId], "/balanceAccounts/{balanceAccountId}/sweeps/{sweepId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $updateSweepConfigurationV2->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\SweepConfigurationV2::class);
    }
}
