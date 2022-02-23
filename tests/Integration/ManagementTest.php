<?php


namespace Adyen\Tests\Integration;

use Adyen\Service\Management;
use Adyen\Service\ResourceModel\Management\MerchantAccount;
use Adyen\Tests\TestCase;

class ManagementTest extends TestCase
{
    /**
     * Get /merchants
     * @throws \Adyen\AdyenException
     */
    public function testGetMerchants()
    {
        $client = $this->createCheckoutAPIClient();

        $management = new Management($client);
        $response = $management->merchantAccount->list();
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['_links']);
        $this->assertNotEmpty($response['data']);
        $this->assertNotEmpty($response['itemsTotal']);
        $this->assertTrue($this->count($response['data']) > 0);
    }

    /**
     * Get /me
     *
     * @throws \Adyen\AdyenException
     */
    public function testGetMe()
    {
        $client = $this->createCheckoutAPIClient();

        $management = new Management($client);
        $response = $management->me->retrieve();
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['id']);
        $this->assertNotEmpty($response['username']);
        $this->assertNotEmpty($response['clientKey']);
        $this->assertNotEmpty($response['roles']);
        $this->assertTrue($response['active']);
        $this->assertNotEmpty($response['companyName']);
    }

    /**
     * Get /companies
     *
     * @throws \Adyen\AdyenException
     */
    public function testGetCompanies()
    {
        $client = $this->createCheckoutAPIClient();

        $management = new Management($client);
        $response = $management->companyAccount->list();
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['_links']);
        $this->assertNotEmpty($response['data']);
        $this->assertNotEmpty($response['itemsTotal']);
        $this->assertTrue($this->count($response['data']) > 0);
    }

    /**
     * Get /companies/{id}
     *
     * @throws \Adyen\AdyenException
     */
    public function testGetCompanyById()
    {
        $client = $this->createCheckoutAPIClient();

        $management = new Management($client);
        $companies = $management->companyAccount->list();
        $companyId = $companies["data"][0]["id"];
        $response = $management->companyAccount->retrieve($companyId);
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['id']);
        $this->assertNotEmpty($response['name']);
        $this->assertNotEmpty($response['status']);
    }

    /**
     * Get /companies/{companyId}/webhooks
     *
     * @throws \Adyen\AdyenException
     */
    public function testGetCompanyWebhooksById()
    {
        $client = $this->createCheckoutAPIClient();

        $management = new Management($client);
        $companies = $management->companyAccount->list();
        $companyId = $companies["data"][0]["id"];
        $response = $management->companyWebhooks->retrieve($companyId);
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['_links']);
        $this->assertNotEmpty($response['data']);
        $this->assertNotEmpty($response['itemsTotal']);
        $this->assertNotEmpty($response['pagesTotal']);
        $this->assertTrue($this->count($response['data']) > 0);
    }

    /**
     * @throws \Adyen\AdyenException
     */
    public function testCreateMerchantWebhooks()
    {
        if (empty($this->settings['merchantAccount']) || $this->settings['merchantAccount'] == 'YOUR MERCHANTACCOUNT') {
            $this->skipTest("Skipped the test. Configure your MerchantAccount in the config");
            return null;
        }
        $client = $this->createCheckoutAPIClient();
        $management = new Management($client);
        $params = array(
            "type" => "standard",
            "url" => "https://magento2-devx.ataberkylmz.com/",
            "username" => "myuser",
            "password" => "mypassword",
            "active" => "true",
            "sslVersion" => "TLSv1.2",
            "communicationFormat" => "soap",
            "acceptsExpiredCertificate" => "false",
            "acceptsSelfSignedCertificate" => "true",
            "acceptsUntrustedRootCertificate" => "true",
            "populateSoapActionHeader" => "false"
        );
        $response = $management->merchantWebhooks->create($params, $this->settings['merchantAccount']);
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['id']);
        $this->assertNotEmpty($response['type']);
        $this->assertTrue($response['active']);
    }

    /**
     * @throws \Adyen\AdyenException
     */
    public function testGenerateHmac()
    {
        if (empty($this->settings['merchantAccount']) || $this->settings['merchantAccount'] == 'YOUR MERCHANTACCOUNT') {
            $this->skipTest("Skipped the test. Configure your MerchantAccount in the config");
            return null;
        }
        $client = $this->createCheckoutAPIClient();
        $management = new Management($client);
        $params = array(
            "type" => "standard",
            "url" => "https://magento2-devx.ataberkylmz.com/",
            "username" => "myuser",
            "password" => "mypassword",
            "active" => "true",
            "sslVersion" => "TLSv1.2",
            "communicationFormat" => "soap",
            "acceptsExpiredCertificate" => "false",
            "acceptsSelfSignedCertificate" => "true",
            "acceptsUntrustedRootCertificate" => "true",
            "populateSoapActionHeader" => "false"
        );
        $createWebhooksResponse = $management->merchantWebhooks->create($params, $this->settings['merchantAccount']);
        $webhookId = $createWebhooksResponse['id'];
        $response = $management->merchantWebhooks->generateHmac(
            $params,
            $this->settings['merchantAccount'],
            $webhookId
        );
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['hmacKey']);
    }
}
