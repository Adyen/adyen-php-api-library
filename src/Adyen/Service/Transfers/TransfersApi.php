<?php
/**
 * Transfers API
 *
 * The version of the OpenAPI document: 3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service\Transfers;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\Transfers\ObjectSerializer;

class TransfersApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * TransfersApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://balanceplatform-api-test.adyen.com/btl/v3");
    }

    /**
    * Transfer funds
    *
    * @param \Adyen\Model\Transfers\TransferInfo $transferInfo
    * @param array|null $requestOptions
    * @return \Adyen\Model\Transfers\Transfer
    * @throws AdyenException
    */
    public function transferFunds(\Adyen\Model\Transfers\TransferInfo $transferInfo, array $requestOptions = null): \Adyen\Model\Transfers\Transfer
    {
        $endpoint = $this->baseURL . "/transfers";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $transferInfo->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Transfers\Transfer::class);
    }

    /**
    * Return a transfer
    *
    * @param string $transferId
    * @param \Adyen\Model\Transfers\ReturnTransferRequest $returnTransferRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Transfers\ReturnTransferResponse
    * @throws AdyenException
    */
    public function returnTransfer(string $transferId, \Adyen\Model\Transfers\ReturnTransferRequest $returnTransferRequest, array $requestOptions = null): \Adyen\Model\Transfers\ReturnTransferResponse
    {
        $endpoint = $this->baseURL . str_replace(['{transferId}'], [$transferId], "/transfers/{transferId}/returns");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $returnTransferRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Transfers\ReturnTransferResponse::class);
    }
}
