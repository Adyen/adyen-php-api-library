<?php
/**
 * Legal Entity Management API
 *
 * The version of the OpenAPI document: 3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service\LegalEntityManagement;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\LegalEntityManagement\ObjectSerializer;

class HostedOnboardingApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * HostedOnboardingApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://kyc-test.adyen.com/lem/v3");
    }

    /**
    * Get a link to an Adyen-hosted onboarding page
    *
    * @param string $id
    * @param \Adyen\Model\LegalEntityManagement\OnboardingLinkInfo $onboardingLinkInfo
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\OnboardingLink
    * @throws AdyenException
    */
    public function getLinkToAdyenhostedOnboardingPage(string $id, \Adyen\Model\LegalEntityManagement\OnboardingLinkInfo $onboardingLinkInfo, ?array $requestOptions = null): \Adyen\Model\LegalEntityManagement\OnboardingLink
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/legalEntities/{id}/onboardingLinks");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $onboardingLinkInfo->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\OnboardingLink::class);
    }

    /**
    * Get an onboarding link theme
    *
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\OnboardingTheme
    * @throws AdyenException
    */
    public function getOnboardingLinkTheme(string $id, ?array $requestOptions = null): \Adyen\Model\LegalEntityManagement\OnboardingTheme
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/themes/{id}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\OnboardingTheme::class);
    }

    /**
    * Get a list of hosted onboarding page themes
    *
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\OnboardingThemes
    * @throws AdyenException
    */
    public function listHostedOnboardingPageThemes(?array $requestOptions = null): \Adyen\Model\LegalEntityManagement\OnboardingThemes
    {
        $endpoint = $this->baseURL . "/themes";
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\OnboardingThemes::class);
    }
}
