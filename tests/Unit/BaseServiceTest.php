<?php

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\BaseService;
use Adyen\Configuration;
use Adyen\Environment;
use Adyen\Tests\TestCase;

class BaseServiceTest extends TestCase
{

    /**
     * @covers \Adyen\BaseService::__construct
     * @throws AdyenException
     */
    public function testConstructor()
    {
        $config = new Configuration();
        $config->setAdyenApiKey("MockedKey");
        $config->setEnvironment(Environment::TEST);
        $service = new BaseService($config);
        $this->assertNotNull($service);
    }

    /**
     * @covers \Adyen\BaseService::__construct
     * @throws AdyenException
     */
    public function testConstructorWithArray()
    {
        $config = new Configuration([
            'adyenApiKey' => 'my-api-key',
            'environment' => Environment::TEST
        ]);
        $service = new BaseService($config);
        $this->assertNotNull($service);
    }

    /**
     * @covers \Adyen\BaseService::__construct
     */
    public function testConstructorMissingApiKey()
    {
        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('API Key is undefined');

        $config = new Configuration();
        new BaseService($config);
    }

    /**
     * @covers \Adyen\BaseService::__construct
     */
    public function testConstructorMissingEnvironment()
    {
        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('The Client does not have a correct environment, use test or live');

        $config = new Configuration();
        $config->setAdyenApiKey("MockedKey");
        new BaseService($config);
    }

    /**
     * @covers \Adyen\BaseService::__construct
     */
    public function testConstructorMissingLivePrefixForLiveEnvironment()
    {
        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('The live URL prefix is not defined');

        $config = new Configuration();
        $config->setAdyenApiKey("MockedKey");
        $config->setEnvironment(Environment::LIVE);
        new BaseService($config);
    }



    /**
     * @covers \Adyen\BaseService::createBaseUrl
     */
    public function testCreateBaseUrlTestEnvironment()
    {
        $config = new Configuration([
            'adyenApiKey' => 'my-api-key',
            'environment' => Environment::TEST
        ]);
        $service = new BaseService($config);
        $url = 'https://pal-test.adyen.com/pal/servlet/Payment/v64/authorise';
        $this->assertEquals($url, $service->createBaseUrl($url));
    }

    /**
     * @covers \Adyen\BaseService::createBaseUrl
     */
    public function testCreateBaseUrlLivePalEndpoint()
    {
        $config = new Configuration([
            'adyenApiKey' => 'my-api-key',
            'environment' => Environment::LIVE,
            'liveEndpointUrlPrefix' => 'my-prefix'
        ]);
        $service = new BaseService($config);
        $url = 'https://pal-test.adyen.com/pal/servlet/Payment/v64/authorise';
        $expected = 'https://my-prefix-pal-live.adyenpayments.com/pal/servlet/Payment/v64/authorise';
        $this->assertEquals($expected, $service->createBaseUrl($url));
    }

    /**
     * @covers \Adyen\BaseService::createBaseUrl
     */
    public function testCreateBaseUrlLiveCheckoutEndpoint()
    {
        $config = new Configuration([
            'adyenApiKey' => 'my-api-key',
            'environment' => Environment::LIVE,
            'liveEndpointUrlPrefix' => 'my-prefix'
        ]);
        $service = new BaseService($config);
        $url = 'https://checkout-test.adyen.com/v64/payments';
        $expected = 'https://my-prefix-checkout-live.adyenpayments.com/checkout/v64/payments';
        $this->assertEquals($expected, $service->createBaseUrl($url));
    }

    /**
     * @covers \Adyen\BaseService::createBaseUrl
     */
    public function testCreateBaseUrlLiveCheckoutPosSdkEndpoint()
    {
        $config = new Configuration([
            'adyenApiKey' => 'my-api-key',
            'environment' => Environment::LIVE,
            'liveEndpointUrlPrefix' => 'my-prefix'
        ]);
        $service = new BaseService($config);
        $url = 'https://checkout-test.adyen.com/possdk/v64/sessions';
        $expected = 'https://my-prefix-checkout-live.adyenpayments.com/possdk/v64/sessions';
        $this->assertEquals($expected, $service->createBaseUrl($url));
    }

    /**
     * @covers \Adyen\BaseService::createBaseUrl
     */
    public function testCreateBaseUrlLiveOtherEndpoint()
    {
        $config = new Configuration([
            'adyenApiKey' => 'my-api-key',
            'environment' => Environment::LIVE,
            'liveEndpointUrlPrefix' => 'my-prefix'
        ]);
        $service = new BaseService($config);
        $url = 'https://kyc-test.adyen.com/lem/v3/legalEntities';
        $expected = 'https://kyc-live.adyen.com/lem/v3/legalEntities';
        $this->assertEquals($expected, $service->createBaseUrl($url));
    }
}
