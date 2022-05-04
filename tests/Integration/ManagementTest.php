<?php


namespace Adyen\Tests\Integration;

use Adyen\AdyenException;
use Adyen\Service\Management;
use Adyen\Tests\TestCase;

class ManagementTest extends TestCase
{
    const LINKS = '_links';
    const DATA = 'data';
    const ITEMS_TOTAL = 'itemsTotal';
    const YOUR_MERCHANT_ACCOUNT = 'YOUR MERCHANT ACCOUNT';
    const SKIP_TEST_MESSAGE = '"Skipped the test. Configure your MerchantAccount in the config"';

    protected $management;

    /**
     * @throws \Adyen\AdyenException
     */
    public function setUp(): void
    {
        $client = $this->createCheckoutAPIClient();
        $this->management = new Management($client);
    }

    /**
     * Get /merchants
     * @throws \Adyen\AdyenException
     */
    public function testGetMerchants()
    {
        $response = $this->management->merchantAccount->list();
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response[self::LINKS]);
        $this->assertNotEmpty($response[self::DATA]);
        $this->assertNotEmpty($response[self::ITEMS_TOTAL]);
        $this->assertTrue(count($response[self::DATA]) > 0);
    }

    /**
     * Get /merchants with query parameters
     * @throws \Adyen\AdyenException
     */
    public function testGetMerchantsWithQueryParameters()
    {
        $response = $this->management->merchantAccount->list(array("pageSize"=> 2));
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response[self::LINKS]);
        $this->assertNotEmpty($response[self::DATA]);
        $this->assertNotEmpty($response[self::ITEMS_TOTAL]);
        $this->assertEquals(2, count($response[self::DATA]));
    }

    /**
     * Get /merchants/{merchantId}
     *
     * @throws \Adyen\AdyenException
     */
    public function testGetMerchantById()
    {
        if (empty($this->settings['merchantAccount']) ||
            $this->settings['merchantAccount'] == self::YOUR_MERCHANT_ACCOUNT) {
            $this->skipTest(self::SKIP_TEST_MESSAGE);
            return null;
        }
        $merchantId = $this->settings['merchantAccount'];

        $merchant = $this->management->merchantAccount->get($merchantId);
        $this->assertNotEmpty($merchant);
        $this->assertNotEmpty($merchant['id']);
        $this->assertEquals("Active", $merchant['status']);
        $this->assertEquals($merchantId, $merchant['id']);
    }

    /**
     * Get /me
     *
     * @throws \Adyen\AdyenException
     */
    public function testGetMe()
    {
        $response = $this->management->me->retrieve();
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
        $response = $this->management->companyAccount->list();
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response[self::LINKS]);
        $this->assertNotEmpty($response['data']);
        $this->assertNotEmpty($response[self::ITEMS_TOTAL]);
        $this->assertTrue($this->count($response['data']) > 0);
    }

    /**
     * Get /companies/{id}
     *
     * @throws \Adyen\AdyenException
     */
    public function testGetCompanyById()
    {
        $companies = $this->management->companyAccount->list();
        $companyId = $companies["data"][0]["id"];
        $response = $this->management->companyAccount->retrieve($companyId);
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
        $companies = $this->management->companyAccount->list();
        $companyId = $companies["data"][0]["id"];
        $response = $this->management->companyWebhooks->retrieve($companyId);
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response[self::LINKS]);
        $this->assertNotEmpty($response['data']);
        $this->assertNotEmpty($response[self::ITEMS_TOTAL]);
        $this->assertNotEmpty($response['pagesTotal']);
        $this->assertTrue($this->count($response['data']) > 0);
    }

    /**
     * Post /merchants/{merchantId}/webhooks/
     *
     * @throws \Adyen\AdyenException
     */
    public function testCreateMerchantWebhooks()
    {
        if (empty($this->settings['merchantAccount']) ||
            $this->settings['merchantAccount'] == self::YOUR_MERCHANT_ACCOUNT) {
            $this->skipTest(self::SKIP_TEST_MESSAGE);
            return null;
        }
        $params = array(
            "type" => "standard",
            "url" => "https://testwebsite.com/",
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
        $response = $this->management->merchantWebhooks->create($this->settings['merchantAccount'], $params);
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['id']);
        $this->assertNotEmpty($response['type']);
        $this->assertTrue($response['active']);
    }

    /**
     * Post /merchants/{merchantId}/webhooks/{webhookId}/generateHmac
     *
     * @throws \Adyen\AdyenException
     */
    public function testGenerateHmac()
    {
        if (empty($this->settings['merchantAccount']) ||
            $this->settings['merchantAccount'] == self::YOUR_MERCHANT_ACCOUNT) {
            $this->skipTest(self::SKIP_TEST_MESSAGE);
            return null;
        }
        $params = array(
            "type" => "standard",
            "url" => "https://testwebsite.com/",
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
        $createWebhooksResponse = $this->management->
        merchantWebhooks->create($this->settings['merchantAccount'], $params);
        $webhookId = $createWebhooksResponse['id'];
        $response = $this->management->merchantWebhooks->generateHmac(
            $this->settings['merchantAccount'],
            $webhookId
        );
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['hmacKey']);
    }


    /**
     * Get /me/allowedOrigins
     *
     * @throws \Adyen\AdyenException
     */
    public function testListAllowedOrigins()
    {
        $response = $this->management->allowedOrigins->list();
        if ($response['data']) {
            $this->assertNotEmpty($response['data']);
            $this->assertNotEmpty($response['data'][0]['id']);
            $this->assertNotEmpty($response['data'][0]['domain']);
            $this->assertNotEmpty($response['data'][0]['_links']['self']['href']);
        } else {
            $this->assertNotEmpty($response);
            $this->assertNotEmpty($response['id']);
            $this->assertNotEmpty($response['domain']);
            $this->assertNotEmpty($response['_links']['self']['href']);
        }
    }

    /**
     * Post /me/allowedOrigins
     *
     * @throws \Adyen\AdyenException
     */
    public function testCreateAllowedOrigins()
    {
        $params = array(
            "domain" => "https://test-website.com/"
        );
        try {
            $this->management->allowedOrigins->create($params);
        } catch (\Exception $e) {
            $this->validateException($e);
        }
    }

    /**
     * @param $e
     */
    private function validateException($e)
    {
        $ex = json_decode($e->getMessage(), true);
        $this->assertEquals(AdyenException::class, get_class($e));
        $this->assertEquals("Invalid allowed origin information provided.", $ex['title']);
        $this->assertEquals('422', $ex['status']);
    }
}
