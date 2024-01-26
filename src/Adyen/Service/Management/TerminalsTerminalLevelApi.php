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

class TerminalsTerminalLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * TerminalsTerminalLevelApi constructor.
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
    * Get a list of terminals
    *
    * @param array|null $requestOptions ['queryParams' => ['searchQuery'=> string, 'otpQuery'=> string, 'countries'=> string, 'merchantIds'=> string, 'storeIds'=> string, 'brandModels'=> string, 'pageNumber'=> int, 'pageSize'=> int]]
    * @return \Adyen\Model\Management\ListTerminalsResponse
    * @throws AdyenException
    */
    public function listTerminals(array $requestOptions = null): \Adyen\Model\Management\ListTerminalsResponse
    {
        $endpoint = $this->baseURL . "/terminals";
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\ListTerminalsResponse::class);
    }

    /**
    * Reassign a terminal
    *
    * @param string $terminalId
    * @param \Adyen\Model\Management\TerminalReassignmentRequest $terminalReassignmentRequest
    * @param array|null $requestOptions

    * @throws AdyenException
    */
    public function reassignTerminal(string $terminalId, \Adyen\Model\Management\TerminalReassignmentRequest $terminalReassignmentRequest, array $requestOptions = null)
    {
        $endpoint = $this->baseURL . str_replace(['{terminalId}'], [$terminalId], "/terminals/{terminalId}/reassign");
        $this->requestHttp($endpoint, strtolower('POST'), (array) $terminalReassignmentRequest->jsonSerialize(), $requestOptions);
    }
}
