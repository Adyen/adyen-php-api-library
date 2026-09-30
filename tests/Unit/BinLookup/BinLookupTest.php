<?php

namespace Adyen\Tests\Unit\BinLookup;

use Adyen\Configuration;
use Adyen\Environment;
use Adyen\Exception\AdyenException;
use Adyen\RequestOptions;
use Adyen\Model\BinLookup\Amount;
use Adyen\Model\BinLookup\CostEstimateAssumptions;
use Adyen\Model\BinLookup\CostEstimateRequest;
use Adyen\Model\BinLookup\MerchantDetails;
use Adyen\Model\BinLookup\ThreeDSAvailabilityRequest;
use Adyen\Model\BinLookup\ThreeDSAvailabilityResponse;
use Adyen\Service\BinLookup\BinLookupApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class BinLookupTest extends BaseTest
{
    public function testGet3dsAvailabilitySendsExpectedUrl(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient('tests/Resources/BinLookup/3ds-availability.json', 200, $container);
        $service = new BinLookupApi($this->createConfiguration(), $client);

        $service->get3dsAvailability(new ThreeDSAvailabilityRequest());

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame(
            'https://pal-test.adyen.com/pal/servlet/BinLookup/v54/get3dsAvailability',
            (string) $request->getUri()
        );
    }

    public function testTestUrl()
    {
        $config = new Configuration();
        $config->setEnvironment(Environment::TEST);
        $config->setAdyenApiKey("MockAPIKey");

        $service = new BinLookupApi($config);

        // get field by reflection (it is protected)
        $reflection = new \ReflectionClass($service);
        $property = $reflection->getProperty('baseURL');

        $this->assertEquals(
            'https://pal-test.adyen.com/pal/servlet/BinLookup/v54',
            $property->getValue($service)
        );
    }

    public function testLiveUrl()
    {
        $config = new Configuration();
        $config->setEnvironment(Environment::LIVE);
        $config->setAdyenApiKey("MockAPIKey");
        $config->setLiveEndpointUrlPrefix("myCompany");

        $service = new BinLookupApi($config);

        // get field by reflection (it is protected)
        $reflection = new \ReflectionClass($service);
        $property = $reflection->getProperty('baseURL');

        $this->assertEquals(
            'https://myCompany-pal-live.adyenpayments.com/pal/servlet/BinLookup/v54',
            $property->getValue($service)
        );
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGet3DSAvailability()
    {
        // create mock client
        $client = $this->createMockSerializerClient('tests/Resources/BinLookup/3ds-availability.json', 200);

        // initialize service
        $config = $this->createConfiguration();
        $service = new BinLookupApi($config, $client);

        $threeDSAvailabilityRequest = new ThreeDSAvailabilityRequest();
        $threeDSAvailabilityRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $threeDSAvailabilityRequest->setCardNumber("cardNumber");

        $result = $service->get3dsAvailability($threeDSAvailabilityRequest);
        $this->assertTrue($result->getThreeDs1Supported());
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGet3DSAvailabilityWithArray()
    {
        // create mock client
        $client = $this->createMockSerializerClient('tests/Resources/BinLookup/3ds-availability.json', 200);

        // initialize service
        $config = $this->createConfiguration();
        $service = new BinLookupApi($config, $client);

        $params = [
            "merchantAccount" => "YOUR_MERCHANT_ACCOUNT",
            "cardNumber" => "cardNumber"
        ];

        $threeDSAvailabilityRequest = new ThreeDSAvailabilityRequest($params);
        $result = $service->get3dsAvailability($threeDSAvailabilityRequest);
        $this->assertTrue($result['threeDS1Supported']);
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGet3DSAvailabilityWithArrayResponse()
    {
        // create mock client
        $client = $this->createMockSerializerClient('tests/Resources/BinLookup/3ds-availability.json', 200);

        // initialize service
        $config = $this->createConfiguration();
        $service = new BinLookupApi($config, $client);

        $params = [
            "merchantAccount" => "YOUR_MERCHANT_ACCOUNT",
            "cardNumber" => "cardNumber"
        ];

        $threeDSAvailabilityRequest = new ThreeDSAvailabilityRequest($params);
        $result = $service->get3dsAvailability($threeDSAvailabilityRequest);
        $resultArray = $result->toArray();

        $this->assertIsArray($resultArray);
        $this->assertTrue($resultArray['threeDS1Supported']);
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGet3dsAvailabilityWithHttpInfo()
    {
        // create mock client
        $client = $this->createMockSerializerClient('tests/Resources/BinLookup/3ds-availability.json', 200);

        // initialize service
        $config = $this->createConfiguration();
        $service = new BinLookupApi($config, $client);

        $threeDSAvailabilityRequest = new ThreeDSAvailabilityRequest();
        $threeDSAvailabilityRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $threeDSAvailabilityRequest->setCardNumber("cardNumber");

        list($result, $statusCode, $headers) = $service->get3dsAvailabilityWithHttpInfo($threeDSAvailabilityRequest);

        $this->assertInstanceOf(ThreeDSAvailabilityResponse::class, $result);
        $this->assertEquals(200, $statusCode);
        $this->assertTrue($result->getThreeDs1Supported());
        $this->assertEmpty($headers);
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetCostEstimate()
    {
        // create mock client
        $client = $this->createMockSerializerClient('tests/Resources/BinLookup/getCostEstimate-success.json', 200);

        // initialize service
        $config = $this->createConfiguration();
        $service = new BinLookupApi($config, $client);

        $costEstimateRequest = new CostEstimateRequest();
        $amount = new Amount();
        $amount->setValue(1234);
        $amount->setCurrency("EUR");
        $costEstimateRequest->setAmount($amount);

        $assumptions = new CostEstimateAssumptions();
        $assumptions->setAssumeLevel3Data(true);
        $assumptions->setAssume3DSecureAuthenticated(true);
        $costEstimateRequest->setAssumptions($assumptions);

        $costEstimateRequest->setCardNumber("4111111111111111");
        $costEstimateRequest->setMerchantAccount("TestMerchant");

        $merchantDetails = new MerchantDetails();
        $merchantDetails->setCountryCode("NL");
        $merchantDetails->setMcc("7411");
        $merchantDetails->setEnrolledIn3DSecure(true);
        $costEstimateRequest->setMerchantDetails($merchantDetails);

        $costEstimateRequest->setShopperInteraction("Ecommerce");

        $result = $service->getCostEstimate($costEstimateRequest);
        $this->assertEquals('Unsupported', $result->getResultCode());
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetCostEstimateWithArray()
    {
        // create mock client
        $client = $this->createMockSerializerClient('tests/Resources/BinLookup/getCostEstimate-success.json', 200);

        // initialize service
        $config = $this->createConfiguration();
        $service = new BinLookupApi($config, $client);

        $params = array(
            "amount" => array(
                "value" => 1234,
                "currency" => "EUR"
            ),
            "assumptions" => array(
                "assumeLevel3Data" => true,
                "assume3DSecureAuthenticated" => true
            ),
            "cardNumber" => "4111111111111111",
            "merchantAccount" => "TestMerchant",
            "merchantDetails" => array(
                "countryCode" => "NL",
                "mcc" => "7411",
                "enrolledIn3DSecure" => true
            ),
            "shopperInteraction" => "Ecommerce"
        );

        $costEstimateRequest = new CostEstimateRequest($params);

        $result = $service->getCostEstimate($costEstimateRequest);
        $this->assertEquals('Unsupported', $result['resultCode']);
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetCostEstimateWithArrayResponse()
    {
        // create mock client
        $client = $this->createMockSerializerClient('tests/Resources/BinLookup/getCostEstimate-success.json', 200);

        // initialize service
        $config = $this->createConfiguration();
        $service = new BinLookupApi($config, $client);

        $costEstimateRequest = new CostEstimateRequest();
        $costEstimateRequest->setCardNumber("4111111111111111");
        $costEstimateRequest->setMerchantAccount("TestMerchant");

        $result = $service->getCostEstimate($costEstimateRequest);
        $resultArray = $result->toArray();

        $this->assertIsArray($resultArray);
        $this->assertEquals('Unsupported', $resultArray['resultCode']);
        $this->assertEquals('1111', $resultArray['cardBin']['summary']);
    }

    public function testGet3DSAvailability401()
    {
        $client = $this->createMockSerializerClient('tests/Resources/BinLookup/3ds-availability-401-error.json', 401);
        $service = new BinLookupApi($this->createConfiguration(), $client);

        try {
            $service->get3dsAvailability(new ThreeDSAvailabilityRequest());
            $this->fail('Expected an AdyenException for HTTP 401');
        } catch (AdyenException $exception) {
            $this->assertSame(401, $exception->getStatusCode());
            $this->assertSame('Unauthorized client error', $exception->getMessage());
            $error = $exception->getError();
            $this->assertNotNull($error);
            $this->assertSame('000', $error->getErrorCode());
            $this->assertSame('security', $error->getErrorType());
            $this->assertNull($error->getPspReference());
        }
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGet3dsAvailabilityWithCustomHeaders()
    {
        $container = [];
        $client = $this->createMockSerializerClient('tests/Resources/BinLookup/3ds-availability.json', 200, $container);
        $config = $this->createConfiguration();
        $service = new BinLookupApi($config, $client);

        $requestOptions = new RequestOptions();
        $requestOptions->setIdempotencyKey('idempotencyKey');
        $requestOptions->setAdditionalHeaders(['Custom-Header' => 'CustomValue']);

        $threeDSAvailabilityRequest = new ThreeDSAvailabilityRequest();
        $threeDSAvailabilityRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $threeDSAvailabilityRequest->setCardNumber("cardNumber");

        $service->get3dsAvailability($threeDSAvailabilityRequest, $requestOptions);

        $this->assertCount(1, $container);
        $request = $container[0]['request'];
        $this->assertEquals('idempotencyKey', $request->getHeaderLine('Idempotency-Key'));
        $this->assertEquals('CustomValue', $request->getHeaderLine('Custom-Header'));
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGet3DSAvailabilityAsync()
    {
        // create mock client
        $client = $this->createMockSerializerClient('tests/Resources/BinLookup/3ds-availability.json', 200);

        // initialize service
        $config = $this->createConfiguration();
        $service = new BinLookupApi($config, $client);

        $threeDSAvailabilityRequest = new ThreeDSAvailabilityRequest();
        $threeDSAvailabilityRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $threeDSAvailabilityRequest->setCardNumber("cardNumber");

        $promise = $service->get3dsAvailabilityAsync($threeDSAvailabilityRequest);
        $result = $promise->wait();
        $this->assertTrue($result->getThreeDs1Supported());
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGet3dsAvailabilityAsyncWithHttpInfo()
    {
        // create mock client
        $container = [];
        $client = $this->createMockSerializerClient('tests/Resources/BinLookup/3ds-availability.json', 200, $container);

        // initialize service
        $config = $this->createConfiguration();
        $service = new BinLookupApi($config, $client);

        $requestOptions = new RequestOptions();
        $requestOptions->setIdempotencyKey('idempotencyKeyAsync');
        $requestOptions->setAdditionalHeaders(['Custom-Header-Async' => 'CustomValueAsync']);

        $threeDSAvailabilityRequest = new ThreeDSAvailabilityRequest();
        $threeDSAvailabilityRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $threeDSAvailabilityRequest->setCardNumber("cardNumber");

        $promise = $service->get3dsAvailabilityAsyncWithHttpInfo($threeDSAvailabilityRequest, $requestOptions);
        list($result, $statusCode, $headers) = $promise->wait();

        $this->assertCount(1, $container);
        $request = $container[0]['request'];
        $this->assertEquals('idempotencyKeyAsync', $request->getHeaderLine('Idempotency-Key'));
        $this->assertEquals('CustomValueAsync', $request->getHeaderLine('Custom-Header-Async'));

        $this->assertInstanceOf(ThreeDSAvailabilityResponse::class, $result);
        $this->assertEquals(200, $statusCode);
        $this->assertTrue($result->getThreeDs1Supported());
        $this->assertEmpty($headers);
    }

    public function testGet3dsAvailabilityAsyncOnErrorResponseThrows()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/BinLookup/3ds-availability-401-error.json',
            401
        );
        $service = new BinLookupApi($this->createConfiguration(), $client);

        try {
            $service->get3dsAvailabilityAsync(new ThreeDSAvailabilityRequest())->wait();
            $this->fail('Expected an AdyenException for HTTP 401');
        } catch (AdyenException $exception) {
            $this->assertSame(401, $exception->getStatusCode());
            $this->assertSame('Unauthorized client error', $exception->getMessage());
            $error = $exception->getError();
            $this->assertNotNull($error);
            $this->assertSame('000', $error->getErrorCode());
            $this->assertSame('security', $error->getErrorType());
            $this->assertNull($error->getPspReference());
        }
    }

    public function testGet3dsAvailabilityRejectsMalformedSuccessResponse()
    {
        $client = new Client(['handler' => HandlerStack::create(new MockHandler([
            new Response(200, [], '{invalid-json')
        ]))]);
        $service = new BinLookupApi($this->createConfiguration(), $client);

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('Error JSON decoding server response');
        $service->get3dsAvailability(new ThreeDSAvailabilityRequest());
    }

    public function testGet3dsAvailabilityAsyncRejectsMalformedSuccessResponse()
    {
        $client = new Client(['handler' => HandlerStack::create(new MockHandler([
            new Response(200, [], '{invalid-json')
        ]))]);
        $service = new BinLookupApi($this->createConfiguration(), $client);

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('Error JSON decoding server response');
        $service->get3dsAvailabilityAsync(new ThreeDSAvailabilityRequest())->wait();
    }

    public function testGet3dsAvailabilityOnConnectionFailureThrowsAdyenException()
    {
        $client = new Client(['handler' => HandlerStack::create(new MockHandler([
            new \GuzzleHttp\Exception\ConnectException(
                'Connection refused',
                new \GuzzleHttp\Psr7\Request(
                    'POST',
                    'https://pal-test.adyen.com/pal/servlet/BinLookup/v54/get3dsAvailability'
                )
            )
        ]))]);
        $service = new BinLookupApi($this->createConfiguration(), $client);

        $this->expectException(AdyenException::class);
        $service->get3dsAvailability(new ThreeDSAvailabilityRequest());
    }

    public function testGet3dsAvailabilityAsyncOnConnectionFailureThrowsAdyenException()
    {
        $client = new Client(['handler' => HandlerStack::create(new MockHandler([
            new \GuzzleHttp\Exception\ConnectException(
                'Connection refused',
                new \GuzzleHttp\Psr7\Request(
                    'POST',
                    'https://pal-test.adyen.com/pal/servlet/BinLookup/v54/get3dsAvailability'
                )
            )
        ]))]);
        $service = new BinLookupApi($this->createConfiguration(), $client);

        $this->expectException(AdyenException::class);
        $service->get3dsAvailabilityAsync(new ThreeDSAvailabilityRequest())->wait();
    }

    public function testRequestUsesBaseUrl()
    {
        $service = new BinLookupApi($this->createConfiguration());

        $request = $service->get3dsAvailabilityRequest(
            new ThreeDSAvailabilityRequest()
        );

        $this->assertEquals(
            'https://pal-test.adyen.com/pal/servlet/BinLookup/v54/get3dsAvailability',
            (string) $request->getUri()
        );
    }

    public function testConstructorUsesDefaultConfiguration()
    {
        $previousConfiguration = Configuration::getDefaultConfiguration();
        $configuration = $this->createConfiguration();
        Configuration::setDefaultConfiguration($configuration);

        try {
            $service = new BinLookupApi();

            $this->assertSame($configuration, $service->getConfig());
        } finally {
            Configuration::setDefaultConfiguration($previousConfiguration);
        }
    }
}
