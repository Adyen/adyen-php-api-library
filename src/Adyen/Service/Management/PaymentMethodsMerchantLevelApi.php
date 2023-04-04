<?php
/**
 * Management API
 *
 * Configure and manage your Adyen company and merchant accounts, stores, and payment terminals. ## Authentication Each request to the Management API must be signed with an API key. [Generate your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) in the Customer Area and then set this key to the `X-API-Key` header value.  To access the live endpoints, you need to generate a new API key in your live Customer Area. ## Versioning  Management API handles versioning as part of the endpoint URL. For example, to send a request to version 1 of the `/companies/{companyId}/webhooks` endpoint, use:  ```text https://management-test.adyen.com/v1/companies/{companyId}/webhooks ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area. Use this API key to make requests to:  ```text https://management-live.adyen.com/v1 ```
 *
 * The version of the OpenAPI document: 1
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service\Management;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\Management\ObjectSerializer;

class PaymentMethodsMerchantLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * PaymentMethodsMerchantLevelApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://management-test.adyen.com/v1");
    }

    /**
    * Get all payment methods
    *
    * @param string $merchantId
    * @param array|null $requestOptions ['queryParams' => ['storeId'=> string, 'businessLineId'=> string, 'pageSize'=> int, 'pageNumber'=> int]]
    * @return \Adyen\Model\Management\PaymentMethodResponse
    * @throws AdyenException
    */
    public function getAllPaymentMethods(string $merchantId, array $requestOptions = null): \Adyen\Model\Management\PaymentMethodResponse
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}'], [$merchantId], "/merchants/{merchantId}/paymentMethodSettings");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\PaymentMethodResponse::class);
    }

    /**
    * Get payment method details
    *
    * @param string $merchantId
    * @param string $paymentMethodId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\PaymentMethod
    * @throws AdyenException
    */
    public function getPaymentMethodDetails(string $merchantId, string $paymentMethodId, array $requestOptions = null): \Adyen\Model\Management\PaymentMethod
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{paymentMethodId}'], [$merchantId, $paymentMethodId], "/merchants/{merchantId}/paymentMethodSettings/{paymentMethodId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\PaymentMethod::class);
    }

    /**
    * Get Apple Pay domains
    *
    * @param string $merchantId
    * @param string $paymentMethodId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\ApplePayInfo
    * @throws AdyenException
    */
    public function getApplePayDomains(string $merchantId, string $paymentMethodId, array $requestOptions = null): \Adyen\Model\Management\ApplePayInfo
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{paymentMethodId}'], [$merchantId, $paymentMethodId], "/merchants/{merchantId}/paymentMethodSettings/{paymentMethodId}/getApplePayDomains");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\ApplePayInfo::class);
    }

    /**
    * Update a payment method
    *
    * @param string $merchantId
    * @param string $paymentMethodId
    * @param \Adyen\Model\Management\UpdatePaymentMethodInfo $updatePaymentMethodInfo
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\PaymentMethod
    * @throws AdyenException
    */
    public function updatePaymentMethod(string $merchantId, string $paymentMethodId, \Adyen\Model\Management\UpdatePaymentMethodInfo $updatePaymentMethodInfo, array $requestOptions = null): \Adyen\Model\Management\PaymentMethod
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{paymentMethodId}'], [$merchantId, $paymentMethodId], "/merchants/{merchantId}/paymentMethodSettings/{paymentMethodId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $updatePaymentMethodInfo->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\PaymentMethod::class);
    }

    /**
    * Request a payment method
    *
    * @param string $merchantId
    * @param \Adyen\Model\Management\PaymentMethodSetupInfo $paymentMethodSetupInfo
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\PaymentMethod
    * @throws AdyenException
    */
    public function requestPaymentMethod(string $merchantId, \Adyen\Model\Management\PaymentMethodSetupInfo $paymentMethodSetupInfo, array $requestOptions = null): \Adyen\Model\Management\PaymentMethod
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}'], [$merchantId], "/merchants/{merchantId}/paymentMethodSettings");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $paymentMethodSetupInfo->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\PaymentMethod::class);
    }

    /**
    * Add an Apple Pay domain
    *
    * @param string $merchantId
    * @param string $paymentMethodId
    * @param \Adyen\Model\Management\ApplePayInfo $applePayInfo
    * @param array|null $requestOptions

    * @throws AdyenException
    */
    public function addApplePayDomain(string $merchantId, string $paymentMethodId, \Adyen\Model\Management\ApplePayInfo $applePayInfo, array $requestOptions = null)
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{paymentMethodId}'], [$merchantId, $paymentMethodId], "/merchants/{merchantId}/paymentMethodSettings/{paymentMethodId}/addApplePayDomains");
        $this->requestHttp($endpoint, strtolower('POST'), (array) $applePayInfo->jsonSerialize(), $requestOptions);
    }
}
