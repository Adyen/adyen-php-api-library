<?php

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\BaseService;
use Adyen\Configuration;
use Adyen\Environment;
use Adyen\Model\BinLookup\ThreeDSAvailabilityRequest;
use Adyen\Model\Checkout\ApplicationInfo;
use Adyen\Model\Checkout\CommonField;
use Adyen\Model\Checkout\PaymentCancelRequest;
use Adyen\Model\Checkout\PaymentRequest;
use Adyen\Service\BinLookup\BinLookupApi;
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
    public function testConstructorMissingAuthentication()
    {
        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('API Key or Basic Authentication credentials are undefined');

        $config = new Configuration();
        new BaseService($config);
    }

    public function testConstructorHavingPartialBasicAuth()
    {
        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('API Key or Basic Authentication credentials are undefined');

        $config = new Configuration();
        $config->setUsername("username");
        $config->setEnvironment(Environment::TEST);
        new BinLookupApi($config);
    }

    /**
     * @covers \Adyen\BaseService::__construct
     * @throws AdyenException
     */
    public function testConstructorHavingBasicAuth()
    {
        $config = new Configuration();

        $config->setUsername("username");
        $config->setPassword("password");
        $config->setEnvironment(Environment::TEST);
        $service = new BinLookupApi($config);

        $request = $service->get3dsAvailabilityRequest(
            new ThreeDSAvailabilityRequest()
        );

        $this->assertSame(
            'Basic ' . base64_encode('username:password'),
            $request->getHeaderLine('Authorization')
        );
        $this->assertSame('', $request->getHeaderLine('X-API-Key'));
    }

    /**
     * @covers \Adyen\BaseService::__construct
     */
    public function testConstructorHavingApiKey()
    {
        $config = new Configuration();
        $config->setAdyenApiKey("my-api-key");
        $config->setEnvironment(Environment::TEST);
        $service = new BinLookupApi($config);

        $request = $service->get3dsAvailabilityRequest(
            new ThreeDSAvailabilityRequest()
        );
        $this->assertSame(
            "my-api-key",
            $request->getHeaderLine('X-API-Key')
        );
        $this->assertSame('', $request->getHeaderLine('Authorization'));
    }

    /**
     * @covers \Adyen\BaseService::__construct
     */
    public function testConstructorHavingApiKeyAndBasicAuth()
    {
        $config = new Configuration();
        $config->setAdyenApiKey("my-api-key");
        $config->setUsername("username");
        $config->setPassword("password");
        $config->setEnvironment(Environment::TEST);
        $service = new BinLookupApi($config);

        $request = $service->get3dsAvailabilityRequest(
            new ThreeDSAvailabilityRequest()
        );
        $this->assertSame(
            "my-api-key",
            $request->getHeaderLine('X-API-Key')
        );
        $this->assertSame(
            'Basic ' . base64_encode('username:password'),
            $request->getHeaderLine('Authorization')
        );
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

    /**
     * @covers \Adyen\BaseService::injectApplicationInfo
     */
    public function testInjectApplicationInfoStampsAdyenLibrary()
    {
        $service = $this->createServiceProbe();

        $request = $service->inject(new PaymentRequest());

        $library = $request->getApplicationInfo()->getAdyenLibrary();
        $this->assertEquals(Configuration::LIB_NAME, $library->getName());
        $this->assertEquals(Configuration::LIB_VERSION, $library->getVersion());
    }

    /**
     * @covers \Adyen\BaseService::injectApplicationInfo
     */
    public function testInjectApplicationInfoLeavesModelsWithoutFieldUntouched()
    {
        $service = $this->createServiceProbe();

        $request = new PaymentCancelRequest();

        $this->assertSame($request, $service->inject($request));
    }

    /**
     * @covers \Adyen\BaseService::injectApplicationInfo
     */
    public function testInjectApplicationInfoOverwritesAdyenLibrary()
    {
        $service = $this->createServiceProbe();

        $library = new CommonField();
        $library->setName('fake');
        $library->setVersion('0.0.0');
        $applicationInfo = new ApplicationInfo();
        $applicationInfo->setAdyenLibrary($library);
        $request = new PaymentRequest();
        $request->setApplicationInfo($applicationInfo);

        $library = $service->inject($request)->getApplicationInfo()->getAdyenLibrary();
        $this->assertEquals(Configuration::LIB_NAME, $library->getName());
        $this->assertEquals(Configuration::LIB_VERSION, $library->getVersion());
    }

    /**
     * @covers \Adyen\BaseService::injectApplicationInfo
     */
    public function testInjectApplicationInfoKeepsMerchantExtras()
    {
        $service = $this->createServiceProbe();

        $paymentSource = new CommonField();
        $paymentSource->setName('adyen-giving-plugin');
        $paymentSource->setVersion('1.2.3');
        $applicationInfo = new ApplicationInfo();
        $applicationInfo->setAdyenPaymentSource($paymentSource);
        $request = new PaymentRequest();
        $request->setApplicationInfo($applicationInfo);

        $applicationInfo = $service->inject($request)->getApplicationInfo();
        $this->assertEquals('adyen-giving-plugin', $applicationInfo->getAdyenPaymentSource()->getName());
        $this->assertEquals('1.2.3', $applicationInfo->getAdyenPaymentSource()->getVersion());
    }

    /**
     * @covers \Adyen\BaseService::injectApplicationInfo
     */
    public function testInjectApplicationInfoAcceptsArray()
    {
        $service = $this->createServiceProbe();

        $request = new PaymentRequest([
            'applicationInfo' => [
                'merchantApplication' => [
                    'name' => 'MyShop',
                    'version' => '1.0'
                ]
            ]
        ]);

        $request = $service->inject($request);
        $applicationInfo = $request->getApplicationInfo();

        $this->assertInstanceOf(ApplicationInfo::class, $applicationInfo);

        $library = $applicationInfo->getAdyenLibrary();
        $this->assertEquals(Configuration::LIB_NAME, $library->getName());
        $this->assertEquals(Configuration::LIB_VERSION, $library->getVersion());

        $merchantApplication = $applicationInfo->getMerchantApplication();
        $this->assertEquals('MyShop', $merchantApplication['name']);
        $this->assertEquals('1.0', $merchantApplication['version']);
    }

    /**
     * Exposes the protected injectApplicationInfo helper for testing.
     */
    private function createServiceProbe(): BaseService
    {
        return new class (new Configuration([
            'adyenApiKey' => 'my-api-key',
            'environment' => Environment::TEST
        ])) extends BaseService {
            public function inject($requestModel): ?object
            {
                return $this->injectApplicationInfo($requestModel);
            }
        };
    }
}
