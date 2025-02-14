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

class GrantAccountsApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * GrantAccountsApi constructor.
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
    * Get a grant account
    *
    * @deprecated since Configuration API v2. "Use the `/grantAccounts/{id}` endpoint from the [Capital API](https://docs.adyen.com/api-explorer/capital/latest/get/grantAccounts/(id)) instead."
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\BalancePlatform\CapitalGrantAccount
    * @throws AdyenException
    */
    public function getGrantAccount(string $id, array $requestOptions = null): \Adyen\Model\BalancePlatform\CapitalGrantAccount
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/grantAccounts/{id}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\BalancePlatform\CapitalGrantAccount::class);
    }
}
