<?php

namespace Adyen\Tests\Unit;

use Adyen\Service\Management;

class ManagementTest extends TestCaseMock
{

    const LINKS = '_links';
    const DATA = 'data';
    const ITEMS_TOTAL = 'itemsTotal';
    const YOUR_MERCHANT_ACCOUNT = 'YOUR MERCHANT ACCOUNT';
    const SKIP_TEST_MESSAGE = '"Skipped the test. Configure your"';
    protected $management;


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
        $service = new Management($client);
        $response = $service->merchantAccount->list();

        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response[self::LINKS]);
        $this->assertNotEmpty($response[self::DATA]);
        $this->assertNotEmpty($response[self::ITEMS_TOTAL]);
        $this->assertTrue(count($response[self::DATA]) > 0);
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
        $service = new Management($client);
        $response = $service->merchantAccount->list(array("pageSize"=> 2));

        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response[self::LINKS]);
        $this->assertNotEmpty($response[self::DATA]);
        $this->assertNotEmpty($response[self::ITEMS_TOTAL]);
        $this->assertEquals(2, count($response[self::DATA]));
    }

    /**
     * @return array
     */
    public static function successMerchantAccountProviders(): array
    {
        return array(
            array('tests/Resources/Management/get-merchants-success.json', 200),
        );
    }

    /**
     * Get /merchants/{merchantId}
     *
     * @throws \Adyen\AdyenException
     * @dataProvider successMerchantAccountByIdProviders
     */
    public function testGetMerchantById($jsonFile, $httpStatus)
    {

        $merchantId ='TestMerchant1';
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        // initialize service
        $service = new Management($client);
        $response = $service->merchantAccount->get($merchantId);

        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['id']);
        $this->assertEquals("Active", $response['status']);
        $this->assertEquals($merchantId, $response['id']);
    }

    /**
     * @return array
     */
    public static function successMerchantAccountByIdProviders(): array
    {
        return array(
            array('tests/Resources/Management/get-merchant-by-id-success.json', 200),
        );
    }
    /**
     * Get /me
     *
     * @throws \Adyen\AdyenException
     * @dataProvider successMeGetProviders
     */
    public function testGetMe($jsonFile, $httpStatus)
    {

        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        // initialize service
        $service = new Management($client);
        $response = $service->me->retrieve();

        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['id']);
        $this->assertNotEmpty($response['username']);
        $this->assertNotEmpty($response['clientKey']);
        $this->assertNotEmpty($response['roles']);
        $this->assertTrue($response['active']);
        $this->assertNotEmpty($response['companyName']);
    }

    /**
     * @return array
     */
    public static function successMeGetProviders(): array
    {
        return array(
            array('tests/Resources/Management/get-me-success.json', 200),
        );
    }

    /**
     * Get /companies
     *
     * @throws \Adyen\AdyenException
     * @dataProvider successGetCompaniesProviders
     */
    public function testGetCompanies($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        // initialize service
        $this->management = new Management($client);

        $response = $this->management->companyAccount->list();
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response[self::LINKS]);
        $this->assertNotEmpty($response['data']);
        $this->assertNotEmpty($response[self::ITEMS_TOTAL]);
        $this->assertTrue($this->count($response['data']) > 0);
    }

    /**
     * @return array
     */
    public static function successGetCompaniesProviders() : array
    {
        return array(
            array('tests/Resources/Management/get-companies-success.json', 200),
        );
    }

    /**
     * Get /companies/{id}
     *
     * @throws \Adyen\AdyenException
     * @dataProvider successGetCompanyByIdProviders
     */
    public function testGetCompanyById($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        // initialize service
        $this->management = new Management($client);

        $companyId = 'YOUR_COMPANY_ACCOUNT';
        $response = $this->management->companyAccount->retrieve($companyId);
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['id']);
        $this->assertNotEmpty($response['name']);
        $this->assertNotEmpty($response['status']);
    }

    /**
     * @return array
     */
    public static function successGetCompanyByIdProviders() : array
    {
        return array(
            array('tests/Resources/Management/get-companies-companyId-success.json', 200),
        );
    }

    /**
     * Get /companies/{companyId}/webhooks
     *
     * @throws \Adyen\AdyenException
     * @dataProvider successGetWebhooksByIdProviders
     */
    public function testGetCompanyWebhooksById($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        // initialize service
        $this->management = new Management($client);

        $companyId = 'YOUR_COMPANY_ACCOUNT';
        $response = $this->management->companyWebhooks->retrieve($companyId);
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response[self::LINKS]);
        $this->assertNotEmpty($response['data']);
        $this->assertNotEmpty($response[self::ITEMS_TOTAL]);
        $this->assertNotEmpty($response['pagesTotal']);
        $this->assertTrue($this->count($response['data']) > 0);
    }

    /**
     * @return array
     */
    public static function successGetWebhooksByIdProviders() : array
    {
        return array(
            array('tests/Resources/Management/get-companies-companyId-web-hooks-success.json', 200),
        );
    }


    /**
     * Post /merchants/{merchantId}/webhooks/
     *
     * @throws \Adyen\AdyenException
     * @dataProvider successCreateMerchantsWebhooksProviders
     */
    public function testCreateMerchantWebhooks($jsonFile, $httpStatus)
    {
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
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        // initialize service
        $this->management = new Management($client);

        $response = $this->management->merchantWebhooks->create('MerchantAccountId', $params);
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['id']);
        $this->assertNotEmpty($response['type']);
        $this->assertTrue($response['active']);
        $this->assertNotEmpty($response['sslVersion']);
        $this->assertNotEmpty($response['additionalSettings']);
    }

    /**
     * @return array
     */
    public static function successCreateMerchantsWebhooksProviders() : array
    {
        return array(
            array('tests/Resources/Management/post-companies-webhook-success.json', 200),
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
        $this->management = new Management($client);
        $response = $this->management->merchantWebhooks->generateHmac(
            'merchantAccount',
            'webhookId'
        );
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response['hmacKey']);
    }

    /**
     * @return array
     */
    public static function successGenerateHmacProviders() : array
    {
        return array(
            array('tests/Resources/Management/post-merchants-webhooks-generateHmac-success.json', 200),
        );
    }


    /**
     * Get /me/allowedOrigins
     *
     * @throws \Adyen\AdyenException
     * @dataProvider successAllowedOriginsProvider
     */
    public function testListAllowedOrigins($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        // initialize service
        $this->management = new Management($client);
        $response = $this->management->allowedOrigins->list();

        $this->assertNotEmpty($response['data']);
        $this->assertNotEmpty($response['data'][0]['id']);
        $this->assertNotEmpty($response['data'][0]['domain']);
        $this->assertNotEmpty($response['data'][0]['_links']['self']['href']);
    }

    /**
     * @return array
     */
    public static function successAllowedOriginsProvider() : array
    {
        return array(
            array('tests/Resources/Management/get-allowed-origins-success.json', 200),
        );
    }


    /**
     * Post /me/allowedOrigins
     *
     * @throws \Adyen\AdyenException
     * @dataProvider successCreateAllowedOriginsProvider
     */
    public function testCreateAllowedOrigins($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        // initialize service
        $this->management = new Management($client);
        $params = array(
            "domain" => "https://test-website.com/"
        );

        $response = $this->management->allowedOrigins->create($params);

        $this->assertEquals($response['domain'], $params['domain']);
    }

    /**
     * @return array
     */
    public static function successCreateAllowedOriginsProvider() : array
    {
        return array(
            array('tests/Resources/Management/post-merchantIs-add-allowed-origin-success.json', 200),
        );
    }

    /**
     * Get /merchants/{id}/paymentMethodSettings
     * @throws \Adyen\AdyenException
     * @dataProvider successGetPaymentMethodSettingsProvider
     */
    public function testGetPaymentMethodSettings($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        // initialize service
        $this->management = new Management($client);
        $response = $this->management->merchantAccount->paymentMethodSettings('merchantAccount');

        $this->assertEquals($response['id'], "PM3227C223224K5FH84M8CBNH");
        $this->assertEquals($response['type'], "visa");
        $this->assertNotEmpty($response['currencies']);
    }

    /**
     * @return array
     */
    public static function successGetPaymentMethodSettingsProvider() : array
    {
        return array(
            array('tests/Resources/Management/get-payment-method-settings-success.json', 200),
        );
    }
}
