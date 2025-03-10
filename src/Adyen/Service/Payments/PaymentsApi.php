<?php
/**
 * Adyen Payment API
 *
 * The version of the OpenAPI document: 68
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
        $this->baseURL = $this->createBaseUrl("https://pal-test.adyen.com/pal/servlet/Payment/v68");
    }

    /**
    * Create an authorisation
    *
    * @param \Adyen\Model\Payments\PaymentRequest $paymentRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Payments\PaymentResult
    * @throws AdyenException
    */
    public function authorise(\Adyen\Model\Payments\PaymentRequest $paymentRequest, ?array $requestOptions = null): \Adyen\Model\Payments\PaymentResult
    {
        $endpoint = $this->baseURL . "/authorise";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $paymentRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payments\PaymentResult::class);
    }

    /**
    * Complete a 3DS authorisation
    *
    * @param \Adyen\Model\Payments\PaymentRequest3d $paymentRequest3d
    * @param array|null $requestOptions
    * @return \Adyen\Model\Payments\PaymentResult
    * @throws AdyenException
    */
    public function authorise3d(\Adyen\Model\Payments\PaymentRequest3d $paymentRequest3d, ?array $requestOptions = null): \Adyen\Model\Payments\PaymentResult
    {
        $endpoint = $this->baseURL . "/authorise3d";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $paymentRequest3d->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payments\PaymentResult::class);
    }

    /**
    * Complete a 3DS2 authorisation
    *
    * @param \Adyen\Model\Payments\PaymentRequest3ds2 $paymentRequest3ds2
    * @param array|null $requestOptions
    * @return \Adyen\Model\Payments\PaymentResult
    * @throws AdyenException
    */
    public function authorise3ds2(\Adyen\Model\Payments\PaymentRequest3ds2 $paymentRequest3ds2, ?array $requestOptions = null): \Adyen\Model\Payments\PaymentResult
    {
        $endpoint = $this->baseURL . "/authorise3ds2";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $paymentRequest3ds2->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payments\PaymentResult::class);
    }

    /**
    * Get the 3DS authentication result
    *
    * @param \Adyen\Model\Payments\AuthenticationResultRequest $authenticationResultRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Payments\AuthenticationResultResponse
    * @throws AdyenException
    */
    public function getAuthenticationResult(\Adyen\Model\Payments\AuthenticationResultRequest $authenticationResultRequest, ?array $requestOptions = null): \Adyen\Model\Payments\AuthenticationResultResponse
    {
        $endpoint = $this->baseURL . "/getAuthenticationResult";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $authenticationResultRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payments\AuthenticationResultResponse::class);
    }

    /**
    * Get the 3DS2 authentication result
    *
    * @param \Adyen\Model\Payments\ThreeDS2ResultRequest $threeDS2ResultRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Payments\ThreeDS2ResultResponse
    * @throws AdyenException
    */
    public function retrieve3ds2Result(\Adyen\Model\Payments\ThreeDS2ResultRequest $threeDS2ResultRequest, ?array $requestOptions = null): \Adyen\Model\Payments\ThreeDS2ResultResponse
    {
        $endpoint = $this->baseURL . "/retrieve3ds2Result";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $threeDS2ResultRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payments\ThreeDS2ResultResponse::class);
    }
}
