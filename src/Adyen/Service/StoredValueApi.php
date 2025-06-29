<?php
/**
 * Adyen Stored Value API
 *
 * The version of the OpenAPI document: 46
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\StoredValue\ObjectSerializer;

class StoredValueApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * StoredValueApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://pal-test.adyen.com/pal/servlet/StoredValue/v46");
    }

    /**
    * Changes the status of the payment method.
    *
    * @param \Adyen\Model\StoredValue\StoredValueStatusChangeRequest $storedValueStatusChangeRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\StoredValue\StoredValueStatusChangeResponse
    * @throws AdyenException
    */
    public function changeStatus(\Adyen\Model\StoredValue\StoredValueStatusChangeRequest $storedValueStatusChangeRequest, ?array $requestOptions = null): \Adyen\Model\StoredValue\StoredValueStatusChangeResponse
    {
        $endpoint = $this->baseURL . "/changeStatus";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $storedValueStatusChangeRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\StoredValue\StoredValueStatusChangeResponse::class);
    }

    /**
    * Checks the balance.
    *
    * @param \Adyen\Model\StoredValue\StoredValueBalanceCheckRequest $storedValueBalanceCheckRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\StoredValue\StoredValueBalanceCheckResponse
    * @throws AdyenException
    */
    public function checkBalance(\Adyen\Model\StoredValue\StoredValueBalanceCheckRequest $storedValueBalanceCheckRequest, ?array $requestOptions = null): \Adyen\Model\StoredValue\StoredValueBalanceCheckResponse
    {
        $endpoint = $this->baseURL . "/checkBalance";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $storedValueBalanceCheckRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\StoredValue\StoredValueBalanceCheckResponse::class);
    }

    /**
    * Issues a new card.
    *
    * @param \Adyen\Model\StoredValue\StoredValueIssueRequest $storedValueIssueRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\StoredValue\StoredValueIssueResponse
    * @throws AdyenException
    */
    public function issue(\Adyen\Model\StoredValue\StoredValueIssueRequest $storedValueIssueRequest, ?array $requestOptions = null): \Adyen\Model\StoredValue\StoredValueIssueResponse
    {
        $endpoint = $this->baseURL . "/issue";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $storedValueIssueRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\StoredValue\StoredValueIssueResponse::class);
    }

    /**
    * Loads the payment method.
    *
    * @param \Adyen\Model\StoredValue\StoredValueLoadRequest $storedValueLoadRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\StoredValue\StoredValueLoadResponse
    * @throws AdyenException
    */
    public function load(\Adyen\Model\StoredValue\StoredValueLoadRequest $storedValueLoadRequest, ?array $requestOptions = null): \Adyen\Model\StoredValue\StoredValueLoadResponse
    {
        $endpoint = $this->baseURL . "/load";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $storedValueLoadRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\StoredValue\StoredValueLoadResponse::class);
    }

    /**
    * Merge the balance of two cards.
    *
    * @param \Adyen\Model\StoredValue\StoredValueBalanceMergeRequest $storedValueBalanceMergeRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\StoredValue\StoredValueBalanceMergeResponse
    * @throws AdyenException
    */
    public function mergeBalance(\Adyen\Model\StoredValue\StoredValueBalanceMergeRequest $storedValueBalanceMergeRequest, ?array $requestOptions = null): \Adyen\Model\StoredValue\StoredValueBalanceMergeResponse
    {
        $endpoint = $this->baseURL . "/mergeBalance";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $storedValueBalanceMergeRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\StoredValue\StoredValueBalanceMergeResponse::class);
    }

    /**
    * Voids a transaction.
    *
    * @param \Adyen\Model\StoredValue\StoredValueVoidRequest $storedValueVoidRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\StoredValue\StoredValueVoidResponse
    * @throws AdyenException
    */
    public function voidTransaction(\Adyen\Model\StoredValue\StoredValueVoidRequest $storedValueVoidRequest, ?array $requestOptions = null): \Adyen\Model\StoredValue\StoredValueVoidResponse
    {
        $endpoint = $this->baseURL . "/voidTransaction";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $storedValueVoidRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\StoredValue\StoredValueVoidResponse::class);
    }
}
