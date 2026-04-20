<?php

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Configuration;
use Adyen\Environment;
use Adyen\RequestOptions;
use Adyen\Model\BinLookup\Amount;
use Adyen\Model\BinLookup\CostEstimateAssumptions;
use Adyen\Model\BinLookup\CostEstimateRequest;
use Adyen\Model\BinLookup\MerchantDetails;
use Adyen\Model\BinLookup\ThreeDSAvailabilityRequest;
use Adyen\Model\BinLookup\ThreeDSAvailabilityResponse;
use Adyen\Service\BinLookup\BinLookupApi;

class BinLookupTest extends BaseTest
{

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
     * @throws AdyenException
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
     * @throws AdyenException
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
        $this->assertTrue($result->getThreeDs1Supported());
    }

    /**
     * @throws AdyenException
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
     * @throws AdyenException
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
     * @throws AdyenException
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
     * @throws AdyenException
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
        $this->assertEquals('Unsupported', $result->getResultCode());
    }

    public function testGet3DSAvailability401()
    {
        // create mock client
        $client = $this->createMockSerializerClient('tests/Resources/BinLookup/3ds-availability-401-error.json', 401);

        // initialize service
        $config = $this->createConfiguration();
        $service = new BinLookupApi($config, $client);

        try {
            $service->get3dsAvailability(new ThreeDSAvailabilityRequest());
            $this->fail("Expected Adyen\AdyenException was not thrown.");
        } catch (\Adyen\AdyenException $e) {
            $this->assertEquals(401, $e->getCode());
            $this->assertEquals('Unauthorized client error', $e->getMessage());
            $this->assertEquals('000', $e->getAdyenErrorCode());
            $this->assertEquals('security', $e->getErrorType());
            $this->assertNull($e->getPspReference());
        }
    }

    /**
     * @throws AdyenException
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
     * @throws AdyenException
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
     * @throws AdyenException
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
}
