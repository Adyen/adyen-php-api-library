<?php
/**
 * Transfers API
 *
 * The Transfers API provides endpoints that you can use to get information about all your transactions, move funds within your balance platform or send funds from your balance platform to a [transfer instrument](https://docs.adyen.com/api-explorer/#/legalentity/latest/post/transferInstruments).  ## Authentication Your Adyen contact will provide your API credential and an API key. To connect to the API, add an `X-API-Key` header with the API key as the value, for example:   ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ```  Alternatively, you can use the username and password to connect to the API using basic authentication. For example:  ``` curl -H \"Content-Type: application/json\" \\ -U \"ws@BalancePlatform.YOUR_BALANCE_PLATFORM\":\"YOUR_WS_PASSWORD\" \\ ... ``` ## Roles and permissions To use the Transfers API, you need an additional role for your API credential. Transfers must also be enabled for the source balance account. Your Adyen contact will set up the roles and permissions for you. ## Versioning The Transfers API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://balanceplatform-api-test.adyen.com/btl/v3/transfers ``` ## Going live When going live, your Adyen contact will provide your API credential for the live environment. You can then use the username and password to send requests to `https://balanceplatform-api-live.adyen.com/btl/v3`.
 *
 * The version of the OpenAPI document: 3
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
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
