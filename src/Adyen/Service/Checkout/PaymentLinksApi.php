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

class PaymentLinksApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * PaymentLinksApi constructor.
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
    * Get a payment link
    *
    * @param string $linkId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Checkout\PaymentLinkResponse
    * @throws AdyenException
    */
    public function getPaymentLink(string $linkId, array $requestOptions = null): \Adyen\Model\Checkout\PaymentLinkResponse
    {
        $endpoint = $this->baseURL . str_replace(['{linkId}'], [$linkId], "/paymentLinks/{linkId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\PaymentLinkResponse::class);
    }

    /**
    * Create a payment link
    *
    * @param \Adyen\Model\Checkout\PaymentLinkRequest $paymentLinkRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Checkout\PaymentLinkResponse
    * @throws AdyenException
    */
    public function paymentLinks(\Adyen\Model\Checkout\PaymentLinkRequest $paymentLinkRequest, array $requestOptions = null): \Adyen\Model\Checkout\PaymentLinkResponse
    {
        $endpoint = $this->baseURL . "/paymentLinks";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $paymentLinkRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\PaymentLinkResponse::class);
    }

    /**
    * Update the status of a payment link
    *
    * @param string $linkId
    * @param \Adyen\Model\Checkout\UpdatePaymentLinkRequest $updatePaymentLinkRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Checkout\PaymentLinkResponse
    * @throws AdyenException
    */
    public function updatePaymentLink(string $linkId, \Adyen\Model\Checkout\UpdatePaymentLinkRequest $updatePaymentLinkRequest, array $requestOptions = null): \Adyen\Model\Checkout\PaymentLinkResponse
    {
        $endpoint = $this->baseURL . str_replace(['{linkId}'], [$linkId], "/paymentLinks/{linkId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $updatePaymentLinkRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\PaymentLinkResponse::class);
    }
}
