<?php
/**
 * Adyen Checkout API
 *
 * Adyen Checkout API provides a simple and flexible way to initiate and authorise online payments. You can use the same integration for payments made with cards (including 3D Secure), mobile wallets, and local payment methods (for example, iDEAL and Sofort).  This API reference provides information on available endpoints and how to interact with them. To learn more about the API, visit [online payments documentation](https://docs.adyen.com/online-payments).  ## Authentication Each request to Checkout API must be signed with an API key. For this, [get your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) from your Customer Area, and set this key to the `X-API-Key` header value, for example:  ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ``` ## Versioning Checkout API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://checkout-test.adyen.com/v70/payments ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account, for example: ``` https://{PREFIX}-checkout-live.adyenpayments.com/checkout/v70/payments ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.  When preparing to do live transactions with Checkout API, follow the [go-live checklist](https://docs.adyen.com/online-payments/go-live-checklist) to make sure you've got all the required configuration in place.  ## Release notes Have a look at the [release notes](https://docs.adyen.com/online-payments/release-notes?integration_type=api&version=70) to find out what changed in this version!
 *
 * The version of the OpenAPI document: 70
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
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

class ModificationsApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * ModificationsApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://checkout-test.adyen.com/v70");
    }

    /**
    * Cancel an authorised payment
    *
    * @param string $idempotencyKey
    * @param \Adyen\Model\Checkout\CreateStandalonePaymentCancelRequest $createStandalonePaymentCancelRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Checkout\StandalonePaymentCancelResource
    * @throws AdyenException
    */
    public function cancelAuthorisedPayment(\Adyen\Model\Checkout\CreateStandalonePaymentCancelRequest $createStandalonePaymentCancelRequest, array $requestOptions = null): \Adyen\Model\Checkout\StandalonePaymentCancelResource
    {
        $endpoint = $this->baseURL . "/cancels";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $createStandalonePaymentCancelRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\StandalonePaymentCancelResource::class);
    }

    /**
    * Update an authorised amount
    *
    * @param string $paymentPspReference
    * @param string $idempotencyKey
    * @param \Adyen\Model\Checkout\CreatePaymentAmountUpdateRequest $createPaymentAmountUpdateRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Checkout\PaymentAmountUpdateResource
    * @throws AdyenException
    */
    public function updateAuthorisedAmount(string $paymentPspReference, \Adyen\Model\Checkout\CreatePaymentAmountUpdateRequest $createPaymentAmountUpdateRequest, array $requestOptions = null): \Adyen\Model\Checkout\PaymentAmountUpdateResource
    {
        $endpoint = $this->baseURL . str_replace(['{paymentPspReference}'], [$paymentPspReference], "/payments/{paymentPspReference}/amountUpdates");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $createPaymentAmountUpdateRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\PaymentAmountUpdateResource::class);
    }

    /**
    * Cancel an authorised payment
    *
    * @param string $paymentPspReference
    * @param string $idempotencyKey
    * @param \Adyen\Model\Checkout\CreatePaymentCancelRequest $createPaymentCancelRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Checkout\PaymentCancelResource
    * @throws AdyenException
    */
    public function cancelAuthorisedPaymentByPspReference(string $paymentPspReference, \Adyen\Model\Checkout\CreatePaymentCancelRequest $createPaymentCancelRequest, array $requestOptions = null): \Adyen\Model\Checkout\PaymentCancelResource
    {
        $endpoint = $this->baseURL . str_replace(['{paymentPspReference}'], [$paymentPspReference], "/payments/{paymentPspReference}/cancels");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $createPaymentCancelRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\PaymentCancelResource::class);
    }

    /**
    * Capture an authorised payment
    *
    * @param string $paymentPspReference
    * @param string $idempotencyKey
    * @param \Adyen\Model\Checkout\CreatePaymentCaptureRequest $createPaymentCaptureRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Checkout\PaymentCaptureResource
    * @throws AdyenException
    */
    public function captureAuthorisedPayment(string $paymentPspReference, \Adyen\Model\Checkout\CreatePaymentCaptureRequest $createPaymentCaptureRequest, array $requestOptions = null): \Adyen\Model\Checkout\PaymentCaptureResource
    {
        $endpoint = $this->baseURL . str_replace(['{paymentPspReference}'], [$paymentPspReference], "/payments/{paymentPspReference}/captures");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $createPaymentCaptureRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\PaymentCaptureResource::class);
    }

    /**
    * Refund a captured payment
    *
    * @param string $paymentPspReference
    * @param string $idempotencyKey
    * @param \Adyen\Model\Checkout\CreatePaymentRefundRequest $createPaymentRefundRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Checkout\PaymentRefundResource
    * @throws AdyenException
    */
    public function refundCapturedPayment(string $paymentPspReference, \Adyen\Model\Checkout\CreatePaymentRefundRequest $createPaymentRefundRequest, array $requestOptions = null): \Adyen\Model\Checkout\PaymentRefundResource
    {
        $endpoint = $this->baseURL . str_replace(['{paymentPspReference}'], [$paymentPspReference], "/payments/{paymentPspReference}/refunds");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $createPaymentRefundRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\PaymentRefundResource::class);
    }

    /**
    * Refund or cancel a payment
    *
    * @param string $paymentPspReference
    * @param string $idempotencyKey
    * @param \Adyen\Model\Checkout\CreatePaymentReversalRequest $createPaymentReversalRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Checkout\PaymentReversalResource
    * @throws AdyenException
    */
    public function refundOrCancelPayment(string $paymentPspReference, \Adyen\Model\Checkout\CreatePaymentReversalRequest $createPaymentReversalRequest, array $requestOptions = null): \Adyen\Model\Checkout\PaymentReversalResource
    {
        $endpoint = $this->baseURL . str_replace(['{paymentPspReference}'], [$paymentPspReference], "/payments/{paymentPspReference}/reversals");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $createPaymentReversalRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Checkout\PaymentReversalResource::class);
    }
}