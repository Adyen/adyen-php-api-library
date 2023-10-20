<?php
/**
 * Management API
 *
 * The version of the OpenAPI document: 3
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

class PayoutSettingsMerchantLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * PayoutSettingsMerchantLevelApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://management-test.adyen.com/v3");
    }

    /**
    * Delete a payout setting
    *
    * @param string $merchantId
    * @param string $payoutSettingsId
    * @param array|null $requestOptions
    
    * @throws AdyenException
    */
    public function deletePayoutSetting(string $merchantId, string $payoutSettingsId, array $requestOptions = null)
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{payoutSettingsId}'], [$merchantId, $payoutSettingsId], "/merchants/{merchantId}/payoutSettings/{payoutSettingsId}");
        $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
        
    }

    /**
    * Get a list of payout settings
    *
    * @param string $merchantId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\PayoutSettingsResponse
    * @throws AdyenException
    */
    public function listPayoutSettings(string $merchantId, array $requestOptions = null): \Adyen\Model\Management\PayoutSettingsResponse
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}'], [$merchantId], "/merchants/{merchantId}/payoutSettings");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\PayoutSettingsResponse::class);
    }

    /**
    * Get a payout setting
    *
    * @param string $merchantId
    * @param string $payoutSettingsId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\PayoutSettings
    * @throws AdyenException
    */
    public function getPayoutSetting(string $merchantId, string $payoutSettingsId, array $requestOptions = null): \Adyen\Model\Management\PayoutSettings
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{payoutSettingsId}'], [$merchantId, $payoutSettingsId], "/merchants/{merchantId}/payoutSettings/{payoutSettingsId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\PayoutSettings::class);
    }

    /**
    * Update a payout setting
    *
    * @param string $merchantId
    * @param string $payoutSettingsId
    * @param \Adyen\Model\Management\UpdatePayoutSettingsRequest $updatePayoutSettingsRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\PayoutSettings
    * @throws AdyenException
    */
    public function updatePayoutSetting(string $merchantId, string $payoutSettingsId, \Adyen\Model\Management\UpdatePayoutSettingsRequest $updatePayoutSettingsRequest, array $requestOptions = null): \Adyen\Model\Management\PayoutSettings
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{payoutSettingsId}'], [$merchantId, $payoutSettingsId], "/merchants/{merchantId}/payoutSettings/{payoutSettingsId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $updatePayoutSettingsRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\PayoutSettings::class);
    }

    /**
    * Add a payout setting
    *
    * @param string $merchantId
    * @param \Adyen\Model\Management\PayoutSettingsRequest $payoutSettingsRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\PayoutSettings
    * @throws AdyenException
    */
    public function addPayoutSetting(string $merchantId, \Adyen\Model\Management\PayoutSettingsRequest $payoutSettingsRequest, array $requestOptions = null): \Adyen\Model\Management\PayoutSettings
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}'], [$merchantId], "/merchants/{merchantId}/payoutSettings");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $payoutSettingsRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\PayoutSettings::class);
    }
}
