<?php
/**
 * Management API
 *
 * The version of the OpenAPI document: 1
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

class WebhooksCompanyLevelApi extends Service
{
    /**
     * @var array|string|string[]
     */
    private $baseURL;

    /**
     * WebhooksCompanyLevelApi constructor.
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
    * Remove a webhook
    *
    * @param string $companyId
    * @param string $webhookId
    * @param array|null $requestOptions
    
    * @throws AdyenException
    */
    public function removeWebhook(string $companyId, string $webhookId, array $requestOptions = null)
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{webhookId}'], [$companyId, $webhookId], "/companies/{companyId}/webhooks/{webhookId}");
        $this->requestHttp($endpoint, strtolower('DELETE'), null, $requestOptions);
        
    }

    /**
    * List all webhooks
    *
    * @param string $companyId
    * @param array|null $requestOptions ['queryParams' => ['pageNumber'=> int, 'pageSize'=> int]]
    * @return \Adyen\Model\Management\ListWebhooksResponse
    * @throws AdyenException
    */
    public function listAllWebhooks(string $companyId, array $requestOptions = null): \Adyen\Model\Management\ListWebhooksResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}'], [$companyId], "/companies/{companyId}/webhooks");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\ListWebhooksResponse::class);
    }

    /**
    * Get a webhook
    *
    * @param string $companyId
    * @param string $webhookId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\Webhook
    * @throws AdyenException
    */
    public function getWebhook(string $companyId, string $webhookId, array $requestOptions = null): \Adyen\Model\Management\Webhook
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{webhookId}'], [$companyId, $webhookId], "/companies/{companyId}/webhooks/{webhookId}");
        $response = $this->requestHttp($endpoint, strtolower('GET'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\Webhook::class);
    }

    /**
    * Update a webhook
    *
    * @param string $companyId
    * @param string $webhookId
    * @param \Adyen\Model\Management\UpdateCompanyWebhookRequest $updateCompanyWebhookRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\Webhook
    * @throws AdyenException
    */
    public function updateWebhook(string $companyId, string $webhookId, \Adyen\Model\Management\UpdateCompanyWebhookRequest $updateCompanyWebhookRequest, array $requestOptions = null): \Adyen\Model\Management\Webhook
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{webhookId}'], [$companyId, $webhookId], "/companies/{companyId}/webhooks/{webhookId}");
        $response = $this->requestHttp($endpoint, strtolower('PATCH'), (array) $updateCompanyWebhookRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\Webhook::class);
    }

    /**
    * Set up a webhook
    *
    * @param string $companyId
    * @param \Adyen\Model\Management\CreateCompanyWebhookRequest $createCompanyWebhookRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\Webhook
    * @throws AdyenException
    */
    public function setUpWebhook(string $companyId, \Adyen\Model\Management\CreateCompanyWebhookRequest $createCompanyWebhookRequest, array $requestOptions = null): \Adyen\Model\Management\Webhook
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}'], [$companyId], "/companies/{companyId}/webhooks");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $createCompanyWebhookRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\Webhook::class);
    }

    /**
    * Generate an HMAC key
    *
    * @param string $companyId
    * @param string $webhookId
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\GenerateHmacKeyResponse
    * @throws AdyenException
    */
    public function generateHmacKey(string $companyId, string $webhookId, array $requestOptions = null): \Adyen\Model\Management\GenerateHmacKeyResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{webhookId}'], [$companyId, $webhookId], "/companies/{companyId}/webhooks/{webhookId}/generateHmac");
        $response = $this->requestHttp($endpoint, strtolower('POST'), null, $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\GenerateHmacKeyResponse::class);
    }

    /**
    * Test a webhook
    *
    * @param string $companyId
    * @param string $webhookId
    * @param \Adyen\Model\Management\TestCompanyWebhookRequest $testCompanyWebhookRequest
    * @param array|null $requestOptions
    * @return \Adyen\Model\Management\TestWebhookResponse
    * @throws AdyenException
    */
    public function testWebhook(string $companyId, string $webhookId, \Adyen\Model\Management\TestCompanyWebhookRequest $testCompanyWebhookRequest, array $requestOptions = null): \Adyen\Model\Management\TestWebhookResponse
    {
        $endpoint = $this->baseURL . str_replace(['{companyId}', '{webhookId}'], [$companyId, $webhookId], "/companies/{companyId}/webhooks/{webhookId}/test");
        $response = $this->requestHttp($endpoint, strtolower('POST'), (array) $testCompanyWebhookRequest->jsonSerialize(), $requestOptions);
        return ObjectSerializer::deserialize($response, \Adyen\Model\Management\TestWebhookResponse::class);
    }
}
