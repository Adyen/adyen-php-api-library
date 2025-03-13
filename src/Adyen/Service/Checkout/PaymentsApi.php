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

class PaymentsApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * PaymentsApi constructor.
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
    * Get the brands and other details of a card
    *
    * @param \Adyen\Model\Checkout\CardDetailsRequest $cardDetailsRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Checkout\CardDetailsResponse
    * @throws AdyenException
    */
    public function cardDetails(\Adyen\Model\Checkout\CardDetailsRequest $cardDetailsRequest, ?array $requestOptions = null): \Adyen\Model\Checkout\CardDetailsResponse
    {
        $endpoint = $this->baseURL . "/cardDetails";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $cardDetailsRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\CardDetailsResponse::class);
    }

    /**
    * Get the result of a payment session
    *
    * @param string $sessionId
    * @param array|null $requestOptions ['queryParams' => ['sessionResult'=> string]]
    * @return \Adyen\Model\Checkout\SessionResultResponse
    * @throws AdyenException
    */
    public function getResultOfPaymentSession(string $sessionId, ?array $requestOptions = null): \Adyen\Model\Checkout\SessionResultResponse
    {
        $endpoint = $this->baseURL . str_replace(['{sessionId}'], [$sessionId], "/sessions/{sessionId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\SessionResultResponse::class);
    }

    /**
    * Get a list of available payment methods
    *
    * @param \Adyen\Model\Checkout\PaymentMethodsRequest $paymentMethodsRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Checkout\PaymentMethodsResponse
    * @throws AdyenException
    */
    public function paymentMethods(\Adyen\Model\Checkout\PaymentMethodsRequest $paymentMethodsRequest, ?array $requestOptions = null): \Adyen\Model\Checkout\PaymentMethodsResponse
    {
        $endpoint = $this->baseURL . "/paymentMethods";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $paymentMethodsRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\PaymentMethodsResponse::class);
    }

    /**
    * Start a transaction
    *
    * @param \Adyen\Model\Checkout\PaymentRequest $paymentRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Checkout\PaymentResponse
    * @throws AdyenException
    */
    public function payments(\Adyen\Model\Checkout\PaymentRequest $paymentRequest, ?array $requestOptions = null): \Adyen\Model\Checkout\PaymentResponse
    {
        $endpoint = $this->baseURL . "/payments";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $paymentRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\PaymentResponse::class);
    }

    /**
    * Submit details for a payment
    *
    * @param \Adyen\Model\Checkout\PaymentDetailsRequest $paymentDetailsRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Checkout\PaymentDetailsResponse
    * @throws AdyenException
    */
    public function paymentsDetails(\Adyen\Model\Checkout\PaymentDetailsRequest $paymentDetailsRequest, ?array $requestOptions = null): \Adyen\Model\Checkout\PaymentDetailsResponse
    {
        $endpoint = $this->baseURL . "/payments/details";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $paymentDetailsRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\PaymentDetailsResponse::class);
    }

    /**
    * Create a payment session
    *
    * @param \Adyen\Model\Checkout\CreateCheckoutSessionRequest $createCheckoutSessionRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Checkout\CreateCheckoutSessionResponse
    * @throws AdyenException
    */
    public function sessions(\Adyen\Model\Checkout\CreateCheckoutSessionRequest $createCheckoutSessionRequest, ?array $requestOptions = null): \Adyen\Model\Checkout\CreateCheckoutSessionResponse
    {
        $endpoint = $this->baseURL . "/sessions";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $createCheckoutSessionRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\CreateCheckoutSessionResponse::class);
    }
}
