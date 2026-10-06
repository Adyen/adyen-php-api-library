<?php

namespace Adyen\Tests\Unit;

use Adyen\BaseService;
use Adyen\Configuration;
use Adyen\Environment;
use Adyen\Exception\AdyenException;
use Adyen\Model\BinLookup\ThreeDSAvailabilityRequest;
use Adyen\Model\Checkout\ApplicationInfo;
use Adyen\Model\Checkout\CommonField;
use Adyen\Model\Checkout\ExternalPlatform;
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
     * @throws \Adyen\AdyenException
     */
    public function testConstructorAllowsLiveEnvironmentWithoutPrefix(): void
    {
        $config = new Configuration();
        $config->setAdyenApiKey('MockedKey');
        $config->setEnvironment(Environment::LIVE);

        $service = new BaseService($config);

        $this->assertInstanceOf(BaseService::class, $service);
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
     * Some specifications list their live server first, so the generated base URL
     * points at live even when the client is configured for test.
     *
     * @covers \Adyen\BaseService::createBaseUrl
     */
    public function testCreateBaseUrlTestEnvironmentWithLiveServerInSpec()
    {
        $config = new Configuration([
            'adyenApiKey' => 'my-api-key',
            'environment' => Environment::TEST
        ]);
        $service = new BaseService($config);
        $url = 'https://management-live.adyen.com/v1';
        $expected = 'https://management-test.adyen.com/v1';
        $this->assertEquals($expected, $service->createBaseUrl($url));
    }

    /**
     * @covers \Adyen\BaseService::createBaseUrl
     */
    public function testCreateBaseUrlLiveEnvironmentWithLiveServerInSpec()
    {
        $config = new Configuration([
            'adyenApiKey' => 'my-api-key',
            'environment' => Environment::LIVE
        ]);
        $service = new BaseService($config);
        $url = 'https://management-live.adyen.com/v1';
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
     * @covers \Adyen\BaseService::resolveOperationHost
     */
    public function testResolveOperationHostPrefersTheEnvironmentDescription()
    {
        $hostSettings = [
            ['url' => 'https://management-live.adyen.com', 'description' => 'Live Environment'],
            ['url' => 'https://management-test.adyen.com', 'description' => 'Test Environment'],
        ];

        $this->assertSame(
            'https://management-test.adyen.com',
            $this->createServiceProbe()->resolveHost($hostSettings)
        );
    }

    /**
     * Descriptions come from the specification, so the host name is the fallback signal.
     *
     * @covers \Adyen\BaseService::resolveOperationHost
     */
    public function testResolveOperationHostFallsBackToHostNameWhenDescriptionIsUnknown()
    {
        $hostSettings = [
            ['url' => 'https://management-live.adyen.com', 'description' => 'Production'],
            ['url' => 'https://management-test.adyen.com', 'description' => 'Sandbox'],
        ];

        $this->assertSame(
            'https://management-test.adyen.com',
            $this->createServiceProbe()->resolveHost($hostSettings)
        );

        $this->assertSame(
            'https://management-live.adyen.com',
            $this->createServiceProbe(['environment' => Environment::LIVE])->resolveHost($hostSettings)
        );
    }

    /**
     * @covers \Adyen\BaseService::resolveOperationHost
     */
    public function testResolveOperationHostFallsBackToTheFirstHostWhenNothingMatches()
    {
        $hostSettings = [
            ['url' => 'https://first.example.com'],
            ['url' => 'https://second.example.com'],
        ];

        $this->assertSame(
            'https://first.example.com',
            $this->createServiceProbe()->resolveHost($hostSettings)
        );
    }

    /**
     * @covers \Adyen\BaseService::resolveOperationHost
     */
    public function testResolveOperationHostHonoursAnExplicitHostIndex()
    {
        $hostSettings = [
            ['url' => 'https://management-live.adyen.com', 'description' => 'Live Environment'],
            ['url' => 'https://management-test.adyen.com', 'description' => 'Test Environment'],
        ];

        $this->assertSame(
            'https://management-live.adyen.com',
            $this->createServiceProbe()->resolveHost($hostSettings, 0)
        );
    }

    /**
     * @covers \Adyen\BaseService::injectApplicationInfo
     */
    public function testInjectApplicationInfo()
    {
        $service = $this->createServiceProbe([
            'externalPlatform' => ['name' => 'Magento', 'version' => '2.4', 'integrator' => 'Acme'],
            'merchantApplication' => ['name' => 'MyShop', 'version' => '1.0'],
        ]);

        $request = new PaymentRequest();
        $request->setApplicationInfo([
            'adyenLibrary' => ['name' => 'fake', 'version' => '0.0.0'],              // overwritten
            'adyenPaymentSource' => ['name' => 'adyen-giving', 'version' => '1.2'],  // merchant-only, kept
            'externalPlatform' => ['name' => 'WooCommerce', 'version' => '9.9'],     // loses to config
        ]);

        $applicationInfo = $service->inject($request)->getApplicationInfo();
        $this->assertInstanceOf(ApplicationInfo::class, $applicationInfo);
        $this->assertInstanceOf(CommonField::class, $applicationInfo->getAdyenLibrary());
        $this->assertInstanceOf(ExternalPlatform::class, $applicationInfo->getExternalPlatform());
        $this->assertInstanceOf(CommonField::class, $applicationInfo->getMerchantApplication());

        $this->assertEquals([
            'adyenLibrary' => [
                'name' => Configuration::LIB_NAME,
                'version' => Configuration::LIB_VERSION
            ],
            'adyenPaymentSource' => ['name' => 'adyen-giving', 'version' => '1.2'],
            'externalPlatform' => ['name' => 'Magento', 'version' => '2.4', 'integrator' => 'Acme'],
            'merchantApplication' => ['name' => 'MyShop', 'version' => '1.0'],
        ], $applicationInfo->toArray());
    }

    /**
     * @covers \Adyen\BaseService::injectApplicationInfo
     */
    public function testInjectApplicationInfoCreatesCheckoutModelsFromMetadata()
    {
        $service = $this->createServiceProbe([
            'adyenPaymentSource' => ['name' => 'adyen-giving', 'version' => '1.2'],
        ]);
        $request = new PaymentRequest();

        $applicationInfo = $service->inject($request)->getApplicationInfo();

        $this->assertInstanceOf(ApplicationInfo::class, $applicationInfo);
        $this->assertInstanceOf(CommonField::class, $applicationInfo->getAdyenLibrary());
        $this->assertInstanceOf(CommonField::class, $applicationInfo->getAdyenPaymentSource());
        $this->assertSame('adyen-giving', $applicationInfo->getAdyenPaymentSource()->getName());
    }

    /**
     * @covers \Adyen\BaseService::injectApplicationInfo
     */
    public function testInjectApplicationInfoOmitsIntegratorWhenNotSet()
    {
        $service = $this->createServiceProbe([
            'externalPlatform' => ['name' => 'Magento', 'version' => '2.4']
        ]);

        // model-object input: the helper mutates the existing applicationInfo in place
        $request = new PaymentRequest();
        $applicationInfo = new ApplicationInfo();
        $request->setApplicationInfo($applicationInfo);

        $this->assertSame($applicationInfo, $service->inject($request)->getApplicationInfo());
        $this->assertEquals([
            'adyenLibrary' => [
                'name' => Configuration::LIB_NAME,
                'version' => Configuration::LIB_VERSION
            ],
            'externalPlatform' => ['name' => 'Magento', 'version' => '2.4'],
        ], $applicationInfo->toArray());
    }

    /**
     * @covers \Adyen\BaseService::injectApplicationInfo
     */
    public function testInjectApplicationInfoLeavesModelsWithoutFieldUntouched()
    {
        $request = new PaymentCancelRequest();
        $this->assertSame($request, $this->createServiceProbe()->inject($request));

        $requestWithoutApplicationInfo = new ThreeDSAvailabilityRequest();
        $this->assertSame(
            $requestWithoutApplicationInfo,
            $this->createServiceProbe()->inject($requestWithoutApplicationInfo)
        );
    }

    /**
     * Exposes the protected injectApplicationInfo and resolveOperationHost helpers for testing.
     */
    private function createServiceProbe(array $params = []): BaseService
    {
        return new class (new Configuration($params + [
            'adyenApiKey' => 'my-api-key',
            'environment' => Environment::TEST
        ])) extends BaseService {
            public function inject($requestModel): ?object
            {
                return $this->injectApplicationInfo($requestModel);
            }

            public function resolveHost(array $hostSettings, ?int $hostIndex = null): string
            {
                return $this->resolveOperationHost($hostSettings, $hostIndex, [], 'https://example.com');
            }
        };
    }
}
