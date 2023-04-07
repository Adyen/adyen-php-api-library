<?php
/**
 * Management API
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

class TerminalActionsTerminalLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * TerminalActionsTerminalLevelApi constructor.
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
    * Create a terminal action
    *
    * @param \Adyen\Model\Management\ScheduleTerminalActionsRequest $scheduleTerminalActionsRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\ScheduleTerminalActionsResponse
    * @throws AdyenException
    */
    public function createTerminalAction(\Adyen\Model\Management\ScheduleTerminalActionsRequest $scheduleTerminalActionsRequest, array $requestOptions = null): \Adyen\Model\Management\ScheduleTerminalActionsResponse
    {
        $endpoint = $this->baseURL . "/terminals/scheduleActions";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $scheduleTerminalActionsRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\ScheduleTerminalActionsResponse::class);
    }
}