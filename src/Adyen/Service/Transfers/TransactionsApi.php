<?php
/**
 * Transfers API
 *
 * The version of the OpenAPI document: 3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service\Transfers;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\Transfers\ObjectSerializer;

class TransactionsApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * TransactionsApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://balanceplatform-api-test.adyen.com/btl/v3");
    }

    /**
    * Get all transactions
    *
    * @param array|null $requestOptions ['queryParams' => ['balancePlatform'=> string, 'paymentInstrumentId'=> string, 'accountHolderId'=> string, 'balanceAccountId'=> string, 'cursor'=> string, 'createdSince'=> \DateTime, 'createdUntil'=> \DateTime, 'limit'=> int]]
    * @return \Adyen\Model\Transfers\TransactionSearchResponse
    * @throws AdyenException
    */
    public function getAllTransactions(array $requestOptions = null): \Adyen\Model\Transfers\TransactionSearchResponse
    {
        $endpoint = $this->baseURL . "/transactions";
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Transfers\TransactionSearchResponse::class);
    }

    /**
    * Get a transaction
    *
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\Transfers\Transaction
    * @throws AdyenException
    */
    public function getTransaction(string $id, array $requestOptions = null): \Adyen\Model\Transfers\Transaction
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/transactions/{id}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Transfers\Transaction::class);
    }
}
