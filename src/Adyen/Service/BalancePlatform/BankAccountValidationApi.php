<?php
/**
 * Configuration API
 *
 * The version of the OpenAPI document: 2
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service\BalancePlatform;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\BalancePlatform\ObjectSerializer;

class BankAccountValidationApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * BankAccountValidationApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://balanceplatform-api-test.adyen.com/bcl/v2");
    }

    /**
    * Validate a bank account
    *
    * @param \Adyen\Model\BalancePlatform\BankAccountIdentificationValidationRequest $bankAccountIdentificationValidationRequest
    * @param array|null $requestOptions

    * @throws AdyenException
    */
    public function validateBankAccountIdentification(\Adyen\Model\BalancePlatform\BankAccountIdentificationValidationRequest $bankAccountIdentificationValidationRequest, ?array $requestOptions = null)
    {
        $endpoint = $this->baseURL . "/validateBankAccountIdentification";
        $this->requestHttp($endpoint, strtolower('POST'), (array) $bankAccountIdentificationValidationRequest->jsonSerialize(), $requestOptions);
    }
}
