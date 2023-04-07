<?php
/**
 * Adyen Payout API
 *
 * The version of the OpenAPI document: 68
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service\Payout;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\Payout\ObjectSerializer;

class InitializationApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * InitializationApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://pal-test.adyen.com/pal/servlet/Payout/v68");
    }

    /**
    * Store payout details
    *
    * @param \Adyen\Model\Payout\StoreDetailRequest $storeDetailRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Payout\StoreDetailResponse
    * @throws AdyenException
    */
    public function storePayoutDetails(\Adyen\Model\Payout\StoreDetailRequest $storeDetailRequest, array $requestOptions = null): \Adyen\Model\Payout\StoreDetailResponse
    {
        $endpoint = $this->baseURL . "/storeDetail";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $storeDetailRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payout\StoreDetailResponse::class);
    }

    /**
    * Store details and submit a payout
    *
    * @param \Adyen\Model\Payout\StoreDetailAndSubmitRequest $storeDetailAndSubmitRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Payout\StoreDetailAndSubmitResponse
    * @throws AdyenException
    */
    public function storeDetailsAndSubmitPayout(\Adyen\Model\Payout\StoreDetailAndSubmitRequest $storeDetailAndSubmitRequest, array $requestOptions = null): \Adyen\Model\Payout\StoreDetailAndSubmitResponse
    {
        $endpoint = $this->baseURL . "/storeDetailAndSubmitThirdParty";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $storeDetailAndSubmitRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payout\StoreDetailAndSubmitResponse::class);
    }

    /**
    * Submit a payout
    *
    * @param \Adyen\Model\Payout\SubmitRequest $submitRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Payout\SubmitResponse
    * @throws AdyenException
    */
    public function submitPayout(\Adyen\Model\Payout\SubmitRequest $submitRequest, array $requestOptions = null): \Adyen\Model\Payout\SubmitResponse
    {
        $endpoint = $this->baseURL . "/submitThirdParty";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $submitRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Payout\SubmitResponse::class);
    }
}
