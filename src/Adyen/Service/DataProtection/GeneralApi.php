<?php
/**
 * Adyen Data Protection API
 *
 * The version of the OpenAPI document: 1
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Service\DataProtection;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Model\DataProtection\ObjectSerializer;

class GeneralApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * GeneralApi constructor.
     *
     * @param \Adyen\Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        // Create the baseUrl based on live/test and optional live-url-prefix
        $this->baseURL = $this->createBaseUrl("https://ca-test.adyen.com/ca/services/DataProtectionService/v1");
    }

    /**
    * Submit a Subject Erasure Request.
    *
    * @param \Adyen\Model\DataProtection\SubjectErasureByPspReferenceRequest $subjectErasureByPspReferenceRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\DataProtection\SubjectErasureResponse
    * @throws AdyenException
    */
    public function requestSubjectErasure(\Adyen\Model\DataProtection\SubjectErasureByPspReferenceRequest $subjectErasureByPspReferenceRequest, array $requestOptions = null): \Adyen\Model\DataProtection\SubjectErasureResponse
    {
        $endpoint = $this->baseURL . "/requestSubjectErasure";
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $subjectErasureByPspReferenceRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\DataProtection\SubjectErasureResponse::class);
    }
}
