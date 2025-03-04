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

class UtilityApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * UtilityApi constructor.
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
    * Get an Apple Pay session
    *
    * @param \Adyen\Model\Checkout\ApplePaySessionRequest $applePaySessionRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Checkout\ApplePaySessionResponse
    * @throws AdyenException
    */
    public function getApplePaySession(\Adyen\Model\Checkout\ApplePaySessionRequest $applePaySessionRequest, array $requestOptions = null): \Adyen\Model\Checkout\ApplePaySessionResponse
    {
        $endpoint = $this->baseURL . "/applePay/sessions";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $applePaySessionRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\ApplePaySessionResponse::class);
    }

    /**
    * Create originKey values for domains
    *
    * @deprecated since Adyen Checkout API v67. 
    * @param \Adyen\Model\Checkout\UtilityRequest $utilityRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Checkout\UtilityResponse
    * @throws AdyenException
    */
    public function originKeys(\Adyen\Model\Checkout\UtilityRequest $utilityRequest, array $requestOptions = null): \Adyen\Model\Checkout\UtilityResponse
    {
        $endpoint = $this->baseURL . "/originKeys";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $utilityRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\UtilityResponse::class);
    }

    /**
    * Updates the order for PayPal Express Checkout
    *
    * @param \Adyen\Model\Checkout\PaypalUpdateOrderRequest $paypalUpdateOrderRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Checkout\PaypalUpdateOrderResponse
    * @throws AdyenException
    */
    public function updatesOrderForPaypalExpressCheckout(\Adyen\Model\Checkout\PaypalUpdateOrderRequest $paypalUpdateOrderRequest, array $requestOptions = null): \Adyen\Model\Checkout\PaypalUpdateOrderResponse
    {
        $endpoint = $this->baseURL . "/paypal/updateOrder";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $paypalUpdateOrderRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\PaypalUpdateOrderResponse::class);
    }
}
