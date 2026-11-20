<?php

namespace Adyen\Tests\Unit\Disputes;

use Adyen\Exception\AdyenException;
use Adyen\Model\Disputes\AcceptDisputeRequest;
use Adyen\Model\Disputes\AcceptDisputeResponse;
use Adyen\Model\Disputes\DefendDisputeRequest;
use Adyen\Model\Disputes\DefendDisputeResponse;
use Adyen\Model\Disputes\DefenseDocument;
use Adyen\Model\Disputes\DefenseDocumentType;
use Adyen\Model\Disputes\DefenseReason;
use Adyen\Model\Disputes\DefenseReasonsRequest;
use Adyen\Model\Disputes\DefenseReasonsResponse;
use Adyen\Model\Disputes\DeleteDefenseDocumentRequest;
use Adyen\Model\Disputes\DeleteDefenseDocumentResponse;
use Adyen\Model\Disputes\DisputeServiceResult;
use Adyen\Model\Disputes\SupplyDefenseDocumentRequest;
use Adyen\Model\Disputes\SupplyDefenseDocumentResponse;
use Adyen\Service\Disputes\DisputesApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Promise\PromiseInterface;

class DisputesApiTest extends BaseTest
{
    /**
     * @dataProvider successDisputeProvider
     */
    public function testAcceptDisputeSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);

        $service->acceptDispute(new AcceptDisputeRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://ca-test.adyen.com/ca/services/DisputeService/v30/acceptDispute',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testAcceptDisputeSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createLiveConfiguration(), $client);

        $service->acceptDispute(new AcceptDisputeRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://ca-live.adyen.com/ca/services/DisputeService/v30/acceptDispute',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testAcceptDisputeSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);
        $request = (new AcceptDisputeRequest())
            ->setDisputePspReference('DZ4DPSHB4WD2WN82')
            ->setMerchantAccountCode('YOUR_MERCHANT_ACCOUNT');

        $response = $service->acceptDispute($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->acceptDisputeRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(AcceptDisputeResponse::class, $response);
        self::assertSame('AcceptDisputeResponse', $response->getModelName());
        self::assertNotEmpty(json_encode($response->jsonSerialize(), JSON_THROW_ON_ERROR));
        self::assertInstanceOf(DisputeServiceResult::class, $response->getDisputeServiceResult());
        self::assertTrue($response->getDisputeServiceResult()->getSuccess());
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testAcceptDisputeSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);
        $params = $this->acceptDisputeRequestData();

        $response = $service->acceptDispute(new AcceptDisputeRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertTrue($response['disputeServiceResult']['success']);

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertTrue($resultArray['disputeServiceResult']['success']);
    }

    public function testAcceptDisputeOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Disputes/disputes-401-error.json', 401);
        $service = new DisputesApi($this->createConfiguration(), $client);

        try {
            $service->acceptDispute(
                new AcceptDisputeRequest($this->acceptDisputeRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    private function acceptDisputeRequestData(): array
    {
        return [
            'disputePspReference' => 'DZ4DPSHB4WD2WN82',
            'merchantAccountCode' => 'YOUR_MERCHANT_ACCOUNT',
        ];
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testDefendDisputeSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);

        $service->defendDispute(new DefendDisputeRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://ca-test.adyen.com/ca/services/DisputeService/v30/defendDispute',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testDefendDisputeSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createLiveConfiguration(), $client);

        $service->defendDispute(new DefendDisputeRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://ca-live.adyen.com/ca/services/DisputeService/v30/defendDispute',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testDefendDisputeSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);
        $request = (new DefendDisputeRequest())
            ->setDefenseReasonCode('SupplyDefenseMaterial')
            ->setDisputePspReference('DZ4DPSHB4WD2WN82')
            ->setMerchantAccountCode('YOUR_MERCHANT_ACCOUNT');

        $response = $service->defendDispute($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->defendDisputeRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(DefendDisputeResponse::class, $response);
        self::assertSame('DefendDisputeResponse', $response->getModelName());
        self::assertNotEmpty(json_encode($response->jsonSerialize(), JSON_THROW_ON_ERROR));
        self::assertInstanceOf(DisputeServiceResult::class, $response->getDisputeServiceResult());
        self::assertTrue($response->getDisputeServiceResult()->getSuccess());
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testDefendDisputeSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);
        $params = $this->defendDisputeRequestData();

        $response = $service->defendDispute(new DefendDisputeRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertTrue($response['disputeServiceResult']['success']);

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertTrue($resultArray['disputeServiceResult']['success']);
    }

    public function testDefendDisputeOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Disputes/disputes-401-error.json', 401);
        $service = new DisputesApi($this->createConfiguration(), $client);

        try {
            $service->defendDispute(
                new DefendDisputeRequest($this->defendDisputeRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    private function defendDisputeRequestData(): array
    {
        return [
            'defenseReasonCode' => 'SupplyDefenseMaterial',
            'disputePspReference' => 'DZ4DPSHB4WD2WN82',
            'merchantAccountCode' => 'YOUR_MERCHANT_ACCOUNT',
        ];
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testDeleteDisputeDefenseDocumentSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);

        $service->deleteDisputeDefenseDocument(new DeleteDefenseDocumentRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://ca-test.adyen.com/ca/services/DisputeService/v30/deleteDisputeDefenseDocument',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testDeleteDisputeDefenseDocumentSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createLiveConfiguration(), $client);

        $service->deleteDisputeDefenseDocument(new DeleteDefenseDocumentRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://ca-live.adyen.com/ca/services/DisputeService/v30/deleteDisputeDefenseDocument',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testDeleteDisputeDefenseDocumentSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);
        $request = (new DeleteDefenseDocumentRequest())
            ->setDefenseDocumentType('DefenseMaterial')
            ->setDisputePspReference('DZ4DPSHB4WD2WN82')
            ->setMerchantAccountCode('YOUR_MERCHANT_ACCOUNT');

        $response = $service->deleteDisputeDefenseDocument($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->deleteDisputeDefenseDocumentRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(DeleteDefenseDocumentResponse::class, $response);
        self::assertSame('DeleteDefenseDocumentResponse', $response->getModelName());
        self::assertNotEmpty(json_encode($response->jsonSerialize(), JSON_THROW_ON_ERROR));
        self::assertInstanceOf(DisputeServiceResult::class, $response->getDisputeServiceResult());
        self::assertTrue($response->getDisputeServiceResult()->getSuccess());
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testDeleteDisputeDefenseDocumentSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);
        $params = $this->deleteDisputeDefenseDocumentRequestData();

        $response = $service->deleteDisputeDefenseDocument(new DeleteDefenseDocumentRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertTrue($response['disputeServiceResult']['success']);

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertTrue($resultArray['disputeServiceResult']['success']);
    }

    public function testDeleteDisputeDefenseDocumentOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Disputes/disputes-401-error.json', 401);
        $service = new DisputesApi($this->createConfiguration(), $client);

        try {
            $service->deleteDisputeDefenseDocument(
                new DeleteDefenseDocumentRequest($this->deleteDisputeDefenseDocumentRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    private function deleteDisputeDefenseDocumentRequestData(): array
    {
        return [
            'defenseDocumentType' => 'DefenseMaterial',
            'disputePspReference' => 'DZ4DPSHB4WD2WN82',
            'merchantAccountCode' => 'YOUR_MERCHANT_ACCOUNT',
        ];
    }

    /**
     * @dataProvider successDefenseReasonsProvider
     */
    public function testRetrieveApplicableDefenseReasonsSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);

        $service->retrieveApplicableDefenseReasons(new DefenseReasonsRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://ca-test.adyen.com/ca/services/DisputeService/v30/retrieveApplicableDefenseReasons',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDefenseReasonsProvider
     */
    public function testRetrieveApplicableDefenseReasonsSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createLiveConfiguration(), $client);

        $service->retrieveApplicableDefenseReasons(new DefenseReasonsRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://ca-live.adyen.com/ca/services/DisputeService/v30/retrieveApplicableDefenseReasons',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDefenseReasonsProvider
     */
    public function testRetrieveApplicableDefenseReasonsSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);
        $request = (new DefenseReasonsRequest())
            ->setDisputePspReference('DZ4DPSHB4WD2WN82')
            ->setMerchantAccountCode('YOUR_MERCHANT_ACCOUNT');

        $response = $service->retrieveApplicableDefenseReasons($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->retrieveApplicableDefenseReasonsRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(DefenseReasonsResponse::class, $response);
        self::assertSame('DefenseReasonsResponse', $response->getModelName());
        self::assertNotEmpty(json_encode($response->jsonSerialize(), JSON_THROW_ON_ERROR));
        self::assertInstanceOf(DisputeServiceResult::class, $response->getDisputeServiceResult());
        self::assertTrue($response->getDisputeServiceResult()->getSuccess());
        self::assertCount(1, $response->getDefenseReasons());
        $reason = $response->getDefenseReasons()[0];
        self::assertInstanceOf(DefenseReason::class, $reason);
        self::assertSame('SupplyDefenseMaterial', $reason->getDefenseReasonCode());
        self::assertFalse($reason->getSatisfied());
        self::assertCount(1, $reason->getDefenseDocumentTypes());
        $documentType = $reason->getDefenseDocumentTypes()[0];
        self::assertInstanceOf(DefenseDocumentType::class, $documentType);
        self::assertTrue($documentType->getAvailable());
        self::assertSame('DefenseMaterial', $documentType->getDefenseDocumentTypeCode());
        self::assertSame('Required', $documentType->getRequirementLevel());
    }

    /**
     * @dataProvider successDefenseReasonsProvider
     */
    public function testRetrieveApplicableDefenseReasonsSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);
        $params = $this->retrieveApplicableDefenseReasonsRequestData();

        $response = $service->retrieveApplicableDefenseReasons(new DefenseReasonsRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertTrue($response['disputeServiceResult']['success']);
        self::assertCount(1, $response['defenseReasons']);
        self::assertSame('SupplyDefenseMaterial', $response['defenseReasons'][0]['defenseReasonCode']);
        self::assertFalse($response['defenseReasons'][0]['satisfied']);
        self::assertCount(1, $response['defenseReasons'][0]['defenseDocumentTypes']);
        self::assertTrue($response['defenseReasons'][0]['defenseDocumentTypes'][0]['available']);
        self::assertSame(
            'DefenseMaterial',
            $response['defenseReasons'][0]['defenseDocumentTypes'][0]['defenseDocumentTypeCode']
        );
        self::assertSame('Required', $response['defenseReasons'][0]['defenseDocumentTypes'][0]['requirementLevel']);

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertTrue($resultArray['disputeServiceResult']['success']);
        self::assertCount(1, $resultArray['defenseReasons']);
        self::assertSame('SupplyDefenseMaterial', $resultArray['defenseReasons'][0]['defenseReasonCode']);
        self::assertFalse($resultArray['defenseReasons'][0]['satisfied']);
        self::assertCount(1, $resultArray['defenseReasons'][0]['defenseDocumentTypes']);
        self::assertTrue($resultArray['defenseReasons'][0]['defenseDocumentTypes'][0]['available']);
        self::assertSame(
            'DefenseMaterial',
            $resultArray['defenseReasons'][0]['defenseDocumentTypes'][0]['defenseDocumentTypeCode']
        );
        self::assertSame('Required', $resultArray['defenseReasons'][0]['defenseDocumentTypes'][0]['requirementLevel']);
    }

    public function testRetrieveApplicableDefenseReasonsOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Disputes/disputes-401-error.json', 401);
        $service = new DisputesApi($this->createConfiguration(), $client);

        try {
            $service->retrieveApplicableDefenseReasons(
                new DefenseReasonsRequest($this->retrieveApplicableDefenseReasonsRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    private function retrieveApplicableDefenseReasonsRequestData(): array
    {
        return [
            'disputePspReference' => 'DZ4DPSHB4WD2WN82',
            'merchantAccountCode' => 'YOUR_MERCHANT_ACCOUNT',
        ];
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testSupplyDefenseDocumentSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);

        $service->supplyDefenseDocument(new SupplyDefenseDocumentRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://ca-test.adyen.com/ca/services/DisputeService/v30/supplyDefenseDocument',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testSupplyDefenseDocumentSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createLiveConfiguration(), $client);

        $service->supplyDefenseDocument(new SupplyDefenseDocumentRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://ca-live.adyen.com/ca/services/DisputeService/v30/supplyDefenseDocument',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testSupplyDefenseDocumentSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);
        $request = (new SupplyDefenseDocumentRequest())
            ->setDefenseDocuments([
                (new DefenseDocument())
                    ->setContent('JVBERi0xLjQKJcOkw7zDtsOfCjIgMCBv+f/ub0j6JPRX+E3EmC==')
                    ->setContentType('application/pdf')
                    ->setDefenseDocumentTypeCode('DefenseMaterial')
            ])
            ->setDisputePspReference('DZ4DPSHB4WD2WN82')
            ->setMerchantAccountCode('YOUR_MERCHANT_ACCOUNT');

        $response = $service->supplyDefenseDocument($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->supplyDefenseDocumentRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(SupplyDefenseDocumentResponse::class, $response);
        self::assertSame('SupplyDefenseDocumentResponse', $response->getModelName());
        self::assertNotEmpty(json_encode($response->jsonSerialize(), JSON_THROW_ON_ERROR));
        self::assertInstanceOf(DisputeServiceResult::class, $response->getDisputeServiceResult());
        self::assertTrue($response->getDisputeServiceResult()->getSuccess());
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testSupplyDefenseDocumentSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);
        $params = $this->supplyDefenseDocumentRequestData();

        $response = $service->supplyDefenseDocument(new SupplyDefenseDocumentRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertTrue($response['disputeServiceResult']['success']);

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertTrue($resultArray['disputeServiceResult']['success']);
    }

    public function testSupplyDefenseDocumentOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Disputes/disputes-401-error.json', 401);
        $service = new DisputesApi($this->createConfiguration(), $client);

        try {
            $service->supplyDefenseDocument(
                new SupplyDefenseDocumentRequest($this->supplyDefenseDocumentRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    private function supplyDefenseDocumentRequestData(): array
    {
        return [
            'defenseDocuments' => [
                [
                    'content' => 'JVBERi0xLjQKJcOkw7zDtsOfCjIgMCBv+f/ub0j6JPRX+E3EmC==',
                    'contentType' => 'application/pdf',
                    'defenseDocumentTypeCode' => 'DefenseMaterial',
                ],
            ],
            'disputePspReference' => 'DZ4DPSHB4WD2WN82',
            'merchantAccountCode' => 'YOUR_MERCHANT_ACCOUNT',
        ];
    }

    /**
     * @dataProvider successDefenseReasonsProvider
     */
    public function testRetrieveApplicableDefenseReasonsSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new DisputesApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->retrieveApplicableDefenseReasonsWithHttpInfo(
            new DefenseReasonsRequest($this->retrieveApplicableDefenseReasonsRequestData())
        );

        self::assertInstanceOf(DefenseReasonsResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertTrue($response->getDisputeServiceResult()->getSuccess());
        self::assertCount(1, $response->getDefenseReasons());
        self::assertSame('SupplyDefenseMaterial', $response->getDefenseReasons()[0]->getDefenseReasonCode());
        self::assertSame(
            'DefenseMaterial',
            $response->getDefenseReasons()[0]->getDefenseDocumentTypes()[0]->getDefenseDocumentTypeCode()
        );
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testDefendDisputeAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);

        $promise = $service->defendDisputeAsync(
            new DefendDisputeRequest($this->defendDisputeRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(DefendDisputeResponse::class, $response);
        self::assertTrue($response->getDisputeServiceResult()->getSuccess());
        self::assertJsonStringEqualsJsonString(
            json_encode($this->defendDisputeRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
    }

    /**
     * @dataProvider successDisputeProvider
     */
    public function testSupplyDefenseDocumentAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DisputesApi($this->createConfiguration(), $client);

        $promise = $service->supplyDefenseDocumentAsyncWithHttpInfo(
            new SupplyDefenseDocumentRequest($this->supplyDefenseDocumentRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(SupplyDefenseDocumentResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertTrue($response->getDisputeServiceResult()->getSuccess());
        self::assertJsonStringEqualsJsonString(
            json_encode($this->supplyDefenseDocumentRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
    }

    public function testAcceptDisputeAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Disputes/disputes-401-error.json', 401);
        $service = new DisputesApi($this->createConfiguration(), $client);

        try {
            $service->acceptDisputeAsync(
                new AcceptDisputeRequest($this->acceptDisputeRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successDisputeProvider(): array
    {
        return [
            ['tests/Resources/Disputes/generic-200.json', 200],
        ];
    }

    public static function successDefenseReasonsProvider(): array
    {
        return [
            ['tests/Resources/Disputes/defense-reasons-success.json', 200],
        ];
    }

    private function assertUnauthorizedException(AdyenException $exception): void
    {
        self::assertSame(401, $exception->getStatusCode());
        self::assertSame('Unauthorized', $exception->getMessage());
        self::assertNotNull($exception->getError());
        self::assertSame(401, $exception->getError()->getStatus());
        self::assertSame('000', $exception->getError()->getErrorCode());
        self::assertSame('security', $exception->getError()->getErrorType());
    }
}
