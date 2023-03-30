<?php

namespace Adyen\Tests\Unit;

use Adyen\Client;
use Adyen\Config;
use Adyen\Environment;
use Adyen\HttpClient\ClientInterface;
use Adyen\Model\Management\Logo;
use Adyen\Service\Management;

class ModelBasedManagementTest extends TestCaseMock
{
    /**
     * Get /merchants
     * @throws \Adyen\AdyenException
     *
     * @dataProvider successMerchantAccountProviders
     *
     */
    public function testGetMerchants($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        // initialize service
        $service = new Management\AccountMerchantLevelApi($client);
        $response = $service->listMerchantAccounts();

        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response->getLinks());
        $this->assertNotEmpty($response->getData());
        $this->assertNotEmpty($response->getItemsTotal());
    }

    /**
     * Get /merchants with query parameters
     * @throws \Adyen\AdyenException
     * @dataProvider successMerchantAccountProviders
     */
    public function testGetMerchantsWithQueryParameters($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Management\AccountMerchantLevelApi($client);
        $response = $service->listMerchantAccounts(array("pageSize"=> 2));

        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response->getLinks());
        $this->assertNotEmpty($response->getData());
        $this->assertNotEmpty($response->getItemsTotal());
    }

    /**
     * @return array
     */
    public static function successMerchantAccountProviders(): array
    {
        return array(
            array('tests/Resources/ModelBasedManagement/get-merchants-success.json', 200),
        );
    }

    /**
     * Post /merchants/{merchantId}/webhooks/{webhookId}/generateHmac
     *
     * @throws \Adyen\AdyenException
     * @dataProvider successGenerateHmacProviders
     */
    public function testGenerateHmac($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        // initialize service
        $service = new Management\WebhooksMerchantLevelApi($client);
        $response = $service->generateHmacKey(
            'merchantAccount',
            'webhookId'
        );
        $this->assertNotEmpty(json_encode($response->jsonSerialize()));
        $this->assertEquals("AG4345BV33J78K17F4F963516FA42AC8813EWS3J8F41E902", $response->getHmacKey());
    }

    /**
     * @return array
     */
    public static function successGenerateHmacProviders() : array
    {
        return array(
            array('tests/Resources/ModelBasedManagement/post-merchants-webhooks-generateHmac-success.json', 200),
        );
    }

    /**
     * Patch /terminals/{terminalId}/terminalLogos
     *
     * @throws \Adyen\AdyenException
     * @dataProvider testUpdateTerminalLogosProviders
     */
    public function testUpdateTerminalLogos($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        // initialize service
        $service = new Management\TerminalSettingsTerminalLevelApi($client);
        $response = $service->updateLogo(
            'terminalId',
            new Logo()
        );
        $this->assertNotEmpty(json_encode($response->jsonSerialize()));
        $this->assertEquals("LOGO_INHERITED_FROM_HIGHER_LEVEL_BASE-64_ENCODED_STRING", $response->getData());
    }

    /**
     * @return array
     */
    public static function testUpdateTerminalLogosProviders() : array
    {
        return array(
            array('tests/Resources/ModelBasedManagement/terminal-logo.json', 200),
        );
    }
}
