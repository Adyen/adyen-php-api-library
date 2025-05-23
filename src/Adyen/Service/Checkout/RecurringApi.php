<?php
/**
 * Adyen Checkout API
 *
 * The version of the OpenAPI document: 71
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service\Checkout;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\Checkout\ObjectSerializer;

class RecurringApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * RecurringApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://checkout-test.adyen.com/v71");
    }

    /**
    * Delete a token for stored payment details
    *
    * @param string $storedPaymentMethodId
    * @param array|null $requestOptions ['queryParams' => ['shopperReference'=> string, 'merchantAccount'=> string]]

    * @throws AdyenException
    */
    public function deleteTokenForStoredPaymentDetails(string $storedPaymentMethodId, ?array $requestOptions = null)
    {
        $endpoint = $this->baseURL . str_replace(['{storedPaymentMethodId}'], [$storedPaymentMethodId], "/storedPaymentMethods/{storedPaymentMethodId}");
        $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
    }

    /**
    * Get tokens for stored payment details
    *
    * @param array|null $requestOptions ['queryParams' => ['shopperReference'=> string, 'merchantAccount'=> string]]
    * @return \Adyen\Model\Checkout\ListStoredPaymentMethodsResponse
    * @throws AdyenException
    */
    public function getTokensForStoredPaymentDetails(?array $requestOptions = null): \Adyen\Model\Checkout\ListStoredPaymentMethodsResponse
    {
        $endpoint = $this->baseURL . "/storedPaymentMethods";
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\ListStoredPaymentMethodsResponse::class);
    }

    /**
    * Create a token to store payment details
    *
    * @param \Adyen\Model\Checkout\StoredPaymentMethodRequest $storedPaymentMethodRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Checkout\StoredPaymentMethodResource
    * @throws AdyenException
    */
    public function storedPaymentMethods(\Adyen\Model\Checkout\StoredPaymentMethodRequest $storedPaymentMethodRequest, ?array $requestOptions = null): \Adyen\Model\Checkout\StoredPaymentMethodResource
    {
        $endpoint = $this->baseURL . "/storedPaymentMethods";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $storedPaymentMethodRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\StoredPaymentMethodResource::class);
    }
}
