<?php
/**
 * Adyen Payment API
 *
 * A set of API endpoints that allow you to initiate, settle, and modify payments on the Adyen payments platform. You can use the API to accept card payments (including One-Click and 3D Secure), bank transfers, ewallets, and many other payment methods.  To learn more about the API, visit [Classic integration](https://docs.adyen.com/classic-integration).  ## Authentication You need an [API credential](https://docs.adyen.com/development-resources/api-credentials) to authenticate to the API.  If using an API key, add an `X-API-Key` header with the API key as the value, for example:   ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ```  Alternatively, you can use the username and password to connect to the API using basic authentication, for example:  ``` curl -U \"ws@Company.YOUR_COMPANY_ACCOUNT\":\"YOUR_BASIC_AUTHENTICATION_PASSWORD\" \\ -H \"Content-Type: application/json\" \\ ... ```  ## Versioning Payments API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://pal-test.adyen.com/pal/servlet/Payment/v68/authorise ```  ## Going live  To authenticate to the live endpoints, you need an [API credential](https://docs.adyen.com/development-resources/api-credentials) from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account: ```  https://{PREFIX}-pal-live.adyenpayments.com/pal/servlet/Payment/v68/authorise ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.
 *
 * The version of the OpenAPI document: 68
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service\Payments;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\Payments\ObjectSerializer;

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
        $this->baseURL = $this->createBaseUrl("https://pal-test.adyen.com/pal/servlet/Payment/v68");
    }

    /**
    * Change the authorised amount
    *
    * @param \Adyen\Model\Payments\AdjustAuthorisationRequest $adjustAuthorisationRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Payments\ModificationResult
    * @throws AdyenException
    */
    public function adjustAuthorisation(\Adyen\Model\Payments\AdjustAuthorisationRequest $adjustAuthorisationRequest, array $requestOptions = null): \Adyen\Model\Payments\ModificationResult
    {
        $endpoint = $this->baseURL . "/adjustAuthorisation";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $adjustAuthorisationRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payments\ModificationResult::class);
    }

    /**
    * Cancel an authorisation
    *
    * @param \Adyen\Model\Payments\CancelRequest $cancelRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Payments\ModificationResult
    * @throws AdyenException
    */
    public function cancel(\Adyen\Model\Payments\CancelRequest $cancelRequest, array $requestOptions = null): \Adyen\Model\Payments\ModificationResult
    {
        $endpoint = $this->baseURL . "/cancel";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $cancelRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payments\ModificationResult::class);
    }

    /**
    * Cancel or refund a payment
    *
    * @param \Adyen\Model\Payments\CancelOrRefundRequest $cancelOrRefundRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Payments\ModificationResult
    * @throws AdyenException
    */
    public function cancelOrRefund(\Adyen\Model\Payments\CancelOrRefundRequest $cancelOrRefundRequest, array $requestOptions = null): \Adyen\Model\Payments\ModificationResult
    {
        $endpoint = $this->baseURL . "/cancelOrRefund";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $cancelOrRefundRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payments\ModificationResult::class);
    }

    /**
    * Capture an authorisation
    *
    * @param \Adyen\Model\Payments\CaptureRequest $captureRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Payments\ModificationResult
    * @throws AdyenException
    */
    public function capture(\Adyen\Model\Payments\CaptureRequest $captureRequest, array $requestOptions = null): \Adyen\Model\Payments\ModificationResult
    {
        $endpoint = $this->baseURL . "/capture";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $captureRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payments\ModificationResult::class);
    }

    /**
    * Create a donation
    *
    * @param \Adyen\Model\Payments\DonationRequest $donationRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Payments\ModificationResult
    * @throws AdyenException
    */
    public function donate(\Adyen\Model\Payments\DonationRequest $donationRequest, array $requestOptions = null): \Adyen\Model\Payments\ModificationResult
    {
        $endpoint = $this->baseURL . "/donate";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $donationRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payments\ModificationResult::class);
    }

    /**
    * Refund a captured payment
    *
    * @param \Adyen\Model\Payments\RefundRequest $refundRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Payments\ModificationResult
    * @throws AdyenException
    */
    public function refund(\Adyen\Model\Payments\RefundRequest $refundRequest, array $requestOptions = null): \Adyen\Model\Payments\ModificationResult
    {
        $endpoint = $this->baseURL . "/refund";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $refundRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payments\ModificationResult::class);
    }

    /**
    * Cancel an authorisation using your reference
    *
    * @param \Adyen\Model\Payments\TechnicalCancelRequest $technicalCancelRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Payments\ModificationResult
    * @throws AdyenException
    */
    public function technicalCancel(\Adyen\Model\Payments\TechnicalCancelRequest $technicalCancelRequest, array $requestOptions = null): \Adyen\Model\Payments\ModificationResult
    {
        $endpoint = $this->baseURL . "/technicalCancel";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $technicalCancelRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payments\ModificationResult::class);
    }

    /**
    * Cancel an in-person refund
    *
    * @param \Adyen\Model\Payments\VoidPendingRefundRequest $voidPendingRefundRequest
    * @param array $requestOptions
    * @return \Adyen\Model\Payments\ModificationResult
    * @throws AdyenException
    */
    public function voidPendingRefund(\Adyen\Model\Payments\VoidPendingRefundRequest $voidPendingRefundRequest, array $requestOptions = null): \Adyen\Model\Payments\ModificationResult
    {
        $endpoint = $this->baseURL . "/voidPendingRefund";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $voidPendingRefundRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payments\ModificationResult::class);
    }
}
