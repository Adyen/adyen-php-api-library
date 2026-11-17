<?php

namespace Adyen\Tests\Unit\DataProtection;

use Adyen\Exception\AdyenException;
use Adyen\Model\DataProtection\SubjectErasureByPspReferenceRequest;
use Adyen\Model\DataProtection\SubjectErasureResponse;
use Adyen\Service\DataProtection\DataProtectionApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Promise\PromiseInterface;

class DataProtectionApiTest extends BaseTest
{
    /**
     * @dataProvider successRequestSubjectErasureProvider
     */
    public function testRequestSubjectErasureSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DataProtectionApi($this->createConfiguration(), $client);

        $service->requestSubjectErasure(new SubjectErasureByPspReferenceRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://ca-test.adyen.com/ca/services/DataProtectionService/v1/requestSubjectErasure',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successRequestSubjectErasureProvider
     */
    public function testRequestSubjectErasureSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DataProtectionApi($this->createLiveConfiguration(), $client);

        $service->requestSubjectErasure(new SubjectErasureByPspReferenceRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://ca-live.adyen.com/ca/services/DataProtectionService/v1/requestSubjectErasure',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successRequestSubjectErasureProvider
     */
    public function testRequestSubjectErasureSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DataProtectionApi($this->createConfiguration(), $client);
        $request = (new SubjectErasureByPspReferenceRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setPspReference('9915520502347613')
            ->setForceErasure(true);

        $response = $service->requestSubjectErasure($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->requestSubjectErasureData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(SubjectErasureResponse::class, $response);
        self::assertSame(SubjectErasureResponse::RESULT_SUCCESS, $response->getResult());
    }

    /**
     * @dataProvider successRequestSubjectErasureProvider
     */
    public function testRequestSubjectErasureSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DataProtectionApi($this->createConfiguration(), $client);
        $params = $this->requestSubjectErasureData();

        $response = $service->requestSubjectErasure(new SubjectErasureByPspReferenceRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame(SubjectErasureResponse::RESULT_SUCCESS, $response['result']);
    }

    /**
     * @dataProvider successRequestSubjectErasureProvider
     */
    public function testRequestSubjectErasureSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new DataProtectionApi($this->createConfiguration(), $client);

        $result = $service->requestSubjectErasure(
            new SubjectErasureByPspReferenceRequest($this->requestSubjectErasureData())
        )->toArray();

        self::assertIsArray($result);
        self::assertSame(SubjectErasureResponse::RESULT_SUCCESS, $result['result']);
    }

    /**
     * @dataProvider successRequestSubjectErasureProvider
     */
    public function testRequestSubjectErasureSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new DataProtectionApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->requestSubjectErasureWithHttpInfo(
            new SubjectErasureByPspReferenceRequest($this->requestSubjectErasureData())
        );

        self::assertInstanceOf(SubjectErasureResponse::class, $response);
        self::assertSame(SubjectErasureResponse::RESULT_SUCCESS, $response->getResult());
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
    }

    /**
     * @dataProvider successRequestSubjectErasureProvider
     */
    public function testRequestSubjectErasureAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new DataProtectionApi($this->createConfiguration(), $client);

        $promise = $service->requestSubjectErasureAsync(
            new SubjectErasureByPspReferenceRequest($this->requestSubjectErasureData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(SubjectErasureResponse::class, $response);
        self::assertSame(SubjectErasureResponse::RESULT_SUCCESS, $response->getResult());
    }

    /**
     * @dataProvider successRequestSubjectErasureProvider
     */
    public function testRequestSubjectErasureAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new DataProtectionApi($this->createConfiguration(), $client);

        $promise = $service->requestSubjectErasureAsyncWithHttpInfo(
            new SubjectErasureByPspReferenceRequest($this->requestSubjectErasureData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(SubjectErasureResponse::class, $response);
        self::assertSame(SubjectErasureResponse::RESULT_SUCCESS, $response->getResult());
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
    }

    public function testRequestSubjectErasureOnErrorResponseThrows(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/DataProtection/authorization-error.json',
            403,
            $container
        );
        $service = new DataProtectionApi($this->createConfiguration(), $client);
        $params = [
            'merchantAccount' => 'NOT_YOUR_MERCHANT_ACCOUNT',
            'pspReference' => '9915520502347613',
        ];

        try {
            $service->requestSubjectErasure(new SubjectErasureByPspReferenceRequest($params));
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
    }

    public function testRequestSubjectErasureAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/DataProtection/authorization-error.json',
            403
        );
        $service = new DataProtectionApi($this->createConfiguration(), $client);
        $request = (new SubjectErasureByPspReferenceRequest())
            ->setMerchantAccount('NOT_YOUR_MERCHANT_ACCOUNT')
            ->setPspReference('9915520502347613');

        try {
            $service->requestSubjectErasureAsync($request)->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    public function testRequestSubjectErasurePreservesFalseForceErasureWithoutPspReference(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/DataProtection/post-request-subject-erasure-success.json',
            200,
            $container
        );
        $service = new DataProtectionApi($this->createConfiguration(), $client);
        $request = (new SubjectErasureByPspReferenceRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setForceErasure(false);

        $service->requestSubjectErasure($request);

        self::assertJsonStringEqualsJsonString(
            json_encode([
                'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
                'forceErasure' => false,
            ], JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
    }

    public static function successRequestSubjectErasureProvider(): array
    {
        return [
            ['tests/Resources/DataProtection/post-request-subject-erasure-success.json', 200],
        ];
    }

    private function requestSubjectErasureData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'pspReference' => '9915520502347613',
            'forceErasure' => true,
        ];
    }

    private function assertForbiddenException(AdyenException $exception): void
    {
        self::assertSame(403, $exception->getStatusCode());
        self::assertSame('Not allowed', $exception->getMessage());
        self::assertNotNull($exception->getError());
        self::assertSame('010', $exception->getError()->getErrorCode());
        self::assertSame('security', $exception->getError()->getErrorType());
    }
}
