<?php
/**
 * Management API
 *
 * The version of the OpenAPI document: 3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
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

class SplitConfigurationMerchantLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * SplitConfigurationMerchantLevelApi constructor.
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
    * Create a rule
    *
    * @param string $merchantId
    * @param string $splitConfigurationId
    * @param \Adyen\Model\Management\SplitConfigurationRule $splitConfigurationRule
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\SplitConfiguration
    * @throws AdyenException
    */
    public function createRule(string $merchantId, string $splitConfigurationId, \Adyen\Model\Management\SplitConfigurationRule $splitConfigurationRule, ?array $requestOptions = null): \Adyen\Model\Management\SplitConfiguration
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{splitConfigurationId}'], [$merchantId, $splitConfigurationId], "/merchants/{merchantId}/splitConfigurations/{splitConfigurationId}");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $splitConfigurationRule->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\SplitConfiguration::class);
    }

    /**
    * Create a split configuration
    *
    * @param string $merchantId
    * @param \Adyen\Model\Management\SplitConfiguration $splitConfiguration
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\SplitConfiguration
    * @throws AdyenException
    */
    public function createSplitConfiguration(string $merchantId, \Adyen\Model\Management\SplitConfiguration $splitConfiguration, ?array $requestOptions = null): \Adyen\Model\Management\SplitConfiguration
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}'], [$merchantId], "/merchants/{merchantId}/splitConfigurations");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $splitConfiguration->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\SplitConfiguration::class);
    }

    /**
    * Delete a split configuration
    *
    * @param string $merchantId
    * @param string $splitConfigurationId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\SplitConfiguration
    * @throws AdyenException
    */
    public function deleteSplitConfiguration(string $merchantId, string $splitConfigurationId, ?array $requestOptions = null): \Adyen\Model\Management\SplitConfiguration
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{splitConfigurationId}'], [$merchantId, $splitConfigurationId], "/merchants/{merchantId}/splitConfigurations/{splitConfigurationId}");
        $response = $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\SplitConfiguration::class);
    }

    /**
    * Delete a split configuration rule
    *
    * @param string $merchantId
    * @param string $splitConfigurationId
    * @param string $ruleId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\SplitConfiguration
    * @throws AdyenException
    */
    public function deleteSplitConfigurationRule(string $merchantId, string $splitConfigurationId, string $ruleId, ?array $requestOptions = null): \Adyen\Model\Management\SplitConfiguration
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{splitConfigurationId}', '{ruleId}'], [$merchantId, $splitConfigurationId, $ruleId], "/merchants/{merchantId}/splitConfigurations/{splitConfigurationId}/rules/{ruleId}");
        $response = $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\SplitConfiguration::class);
    }

    /**
    * Get a split configuration
    *
    * @param string $merchantId
    * @param string $splitConfigurationId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\SplitConfiguration
    * @throws AdyenException
    */
    public function getSplitConfiguration(string $merchantId, string $splitConfigurationId, ?array $requestOptions = null): \Adyen\Model\Management\SplitConfiguration
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{splitConfigurationId}'], [$merchantId, $splitConfigurationId], "/merchants/{merchantId}/splitConfigurations/{splitConfigurationId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\SplitConfiguration::class);
    }

    /**
    * Get a list of split configurations
    *
    * @param string $merchantId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\SplitConfigurationList
    * @throws AdyenException
    */
    public function listSplitConfigurations(string $merchantId, ?array $requestOptions = null): \Adyen\Model\Management\SplitConfigurationList
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}'], [$merchantId], "/merchants/{merchantId}/splitConfigurations");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\SplitConfigurationList::class);
    }

    /**
    * Update split conditions
    *
    * @param string $merchantId
    * @param string $splitConfigurationId
    * @param string $ruleId
    * @param \Adyen\Model\Management\UpdateSplitConfigurationRuleRequest $updateSplitConfigurationRuleRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\SplitConfiguration
    * @throws AdyenException
    */
    public function updateSplitConditions(string $merchantId, string $splitConfigurationId, string $ruleId, \Adyen\Model\Management\UpdateSplitConfigurationRuleRequest $updateSplitConfigurationRuleRequest, ?array $requestOptions = null): \Adyen\Model\Management\SplitConfiguration
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{splitConfigurationId}', '{ruleId}'], [$merchantId, $splitConfigurationId, $ruleId], "/merchants/{merchantId}/splitConfigurations/{splitConfigurationId}/rules/{ruleId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $updateSplitConfigurationRuleRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\SplitConfiguration::class);
    }

    /**
    * Update split configuration description
    *
    * @param string $merchantId
    * @param string $splitConfigurationId
    * @param \Adyen\Model\Management\UpdateSplitConfigurationRequest $updateSplitConfigurationRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\SplitConfiguration
    * @throws AdyenException
    */
    public function updateSplitConfigurationDescription(string $merchantId, string $splitConfigurationId, \Adyen\Model\Management\UpdateSplitConfigurationRequest $updateSplitConfigurationRequest, ?array $requestOptions = null): \Adyen\Model\Management\SplitConfiguration
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{splitConfigurationId}'], [$merchantId, $splitConfigurationId], "/merchants/{merchantId}/splitConfigurations/{splitConfigurationId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $updateSplitConfigurationRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\SplitConfiguration::class);
    }

    /**
    * Update the split logic
    *
    * @param string $merchantId
    * @param string $splitConfigurationId
    * @param string $ruleId
    * @param string $splitLogicId
    * @param \Adyen\Model\Management\UpdateSplitConfigurationLogicRequest $updateSplitConfigurationLogicRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\SplitConfiguration
    * @throws AdyenException
    */
    public function updateSplitLogic(string $merchantId, string $splitConfigurationId, string $ruleId, string $splitLogicId, \Adyen\Model\Management\UpdateSplitConfigurationLogicRequest $updateSplitConfigurationLogicRequest, ?array $requestOptions = null): \Adyen\Model\Management\SplitConfiguration
    {
        $endpoint = $this->baseURL . str_replace(['{merchantId}', '{splitConfigurationId}', '{ruleId}', '{splitLogicId}'], [$merchantId, $splitConfigurationId, $ruleId, $splitLogicId], "/merchants/{merchantId}/splitConfigurations/{splitConfigurationId}/rules/{ruleId}/splitLogic/{splitLogicId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $updateSplitConfigurationLogicRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\SplitConfiguration::class);
    }
}
