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

class TerminalSettingsTerminalLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * TerminalSettingsTerminalLevelApi constructor.
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
    * Get the terminal logo
    *
    * @param string $terminalId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\Logo
    * @throws AdyenException
    */
    public function getTerminalLogo(string $terminalId, ?array $requestOptions = null): \Adyen\Model\Management\Logo
    {
        $endpoint = $this->baseURL . str_replace(['{terminalId}'], [$terminalId], "/terminals/{terminalId}/terminalLogos");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\Logo::class);
    }

    /**
    * Get terminal settings
    *
    * @param string $terminalId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\TerminalSettings
    * @throws AdyenException
    */
    public function getTerminalSettings(string $terminalId, ?array $requestOptions = null): \Adyen\Model\Management\TerminalSettings
    {
        $endpoint = $this->baseURL . str_replace(['{terminalId}'], [$terminalId], "/terminals/{terminalId}/terminalSettings");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\TerminalSettings::class);
    }

    /**
    * Update the logo
    *
    * @param string $terminalId
    * @param \Adyen\Model\Management\Logo $logo
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\Logo
    * @throws AdyenException
    */
    public function updateLogo(string $terminalId, \Adyen\Model\Management\Logo $logo, ?array $requestOptions = null): \Adyen\Model\Management\Logo
    {
        $endpoint = $this->baseURL . str_replace(['{terminalId}'], [$terminalId], "/terminals/{terminalId}/terminalLogos");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $logo->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\Logo::class);
    }

    /**
    * Update terminal settings
    *
    * @param string $terminalId
    * @param \Adyen\Model\Management\TerminalSettings $terminalSettings
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\TerminalSettings
    * @throws AdyenException
    */
    public function updateTerminalSettings(string $terminalId, \Adyen\Model\Management\TerminalSettings $terminalSettings, ?array $requestOptions = null): \Adyen\Model\Management\TerminalSettings
    {
        $endpoint = $this->baseURL . str_replace(['{terminalId}'], [$terminalId], "/terminals/{terminalId}/terminalSettings");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $terminalSettings->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\TerminalSettings::class);
    }
}
