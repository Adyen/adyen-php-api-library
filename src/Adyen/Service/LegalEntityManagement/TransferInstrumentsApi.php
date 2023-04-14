<?php
/**
 * Legal Entity Management API
 *
 * The version of the OpenAPI document: 3
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
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

class TransferInstrumentsApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * TransferInstrumentsApi constructor.
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
    * Delete a transfer instrument
    *
    * @param string $id
    * @param array|null $requestOptions

    * @throws AdyenException
    */
    public function deleteTransferInstrument(string $id, array $requestOptions = null)
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/transferInstruments/{id}");
        $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
    }

    /**
    * Get a transfer instrument
    *
    * @param string $id
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\TransferInstrument
    * @throws AdyenException
    */
    public function getTransferInstrument(string $id, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\TransferInstrument
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/transferInstruments/{id}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\TransferInstrument::class);
    }

    /**
    * Update a transfer instrument
    *
    * @param string $id
    * @param \Adyen\Model\LegalEntityManagement\TransferInstrumentInfo $transferInstrumentInfo
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\TransferInstrument
    * @throws AdyenException
    */
    public function updateTransferInstrument(string $id, \Adyen\Model\LegalEntityManagement\TransferInstrumentInfo $transferInstrumentInfo, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\TransferInstrument
    {
        $endpoint = $this->baseURL . str_replace(['{id}'], [$id], "/transferInstruments/{id}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $transferInstrumentInfo->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\TransferInstrument::class);
    }

    /**
    * Create a transfer instrument
    *
    * @param \Adyen\Model\LegalEntityManagement\TransferInstrumentInfo $transferInstrumentInfo
    * @param array|null $requestOptions
    * @return \Adyen\Model\LegalEntityManagement\TransferInstrument
    * @throws AdyenException
    */
    public function createTransferInstrument(\Adyen\Model\LegalEntityManagement\TransferInstrumentInfo $transferInstrumentInfo, array $requestOptions = null): \Adyen\Model\LegalEntityManagement\TransferInstrument
    {
        $endpoint = $this->baseURL . "/transferInstruments";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $transferInstrumentInfo->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\LegalEntityManagement\TransferInstrument::class);
    }
}