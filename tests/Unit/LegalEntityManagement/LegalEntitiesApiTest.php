<?php
/**
 *                       ######
 *                       ######
 * ############    ####( ######  #####. ######  ############   ############
 * #############  #####( ######  #####. ######  #############  #############
 *        ######  #####( ######  #####. ######  #####  ######  #####  ######
 * ###### ######  #####( ######  #####. ######  #####  #####   #####  ######
 * ###### ######  #####( ######  #####. ######  #####          #####  ######
 * #############  #############  #############  #############  #####  ######
 *  ############   ############  #############   ############  #####  ######
 *                                      ######
 *                               #############
 *                               ############
 *
 * Adyen API Library for PHP
 *
 * Copyright (c) 2020 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Tests\Unit\LegalEntityManagement;

use Adyen\Exception\AdyenException;
use Adyen\Model\LegalEntityManagement\Address;
use Adyen\Model\LegalEntityManagement\BirthData;
use Adyen\Model\LegalEntityManagement\BusinessLine;
use Adyen\Model\LegalEntityManagement\IdentificationData;
use Adyen\Model\LegalEntityManagement\Individual;
use Adyen\Model\LegalEntityManagement\LegalEntityAssociation;
use Adyen\Model\LegalEntityManagement\LegalEntityInfo;
use Adyen\Model\LegalEntityManagement\LegalEntityInfoRequiredType;
use Adyen\Model\LegalEntityManagement\LegalEntity;
use Adyen\Model\LegalEntityManagement\Name;
use Adyen\RequestOptions;
use Adyen\Service\LegalEntityManagement\LegalEntitiesApi;
use Adyen\Tests\Unit\ApiExceptionScenario;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;

class LegalEntitiesApiTest extends BaseTest
{
    public function testGetAllBusinessLinesUnderLegalEntitySendsExpectedUrlOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/business-lines-under-entity.json',
            200,
            $container
        );
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);

        $response = $service->getAllBusinessLinesUnderLegalEntity('Id');

        $request = $container[0]['request'];
        $this->assertSame('GET', $request->getMethod());
        $this->assertSame(
            'https://kyc-test.adyen.com/lem/v4/legalEntities/Id/businessLines',
            (string) $request->getUri()
        );
        $this->assertEquals('SE322JV223222F5GVGMLNB83F', $response->getBusinessLines()[0]->getId());
        $this->assertEquals(
            BusinessLine::SERVICE_PAYMENT_PROCESSING,
            $response->getBusinessLines()[1]->getService()
        );
    }

    public function testGetAllBusinessLinesUnderLegalEntitySendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/business-lines-under-entity.json',
            200,
            $container
        );
        $service = new LegalEntitiesApi($this->createLiveConfiguration(), $client);

        $service->getAllBusinessLinesUnderLegalEntity('Id');

        $request = $container[0]['request'];
        $this->assertSame('GET', $request->getMethod());
        $this->assertSame(
            'https://kyc-live.adyen.com/lem/v4/legalEntities/Id/businessLines',
            (string) $request->getUri()
        );
    }

    public function testRequestPeriodicReview(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(null, 200, $container);
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);

        $service->requestPeriodicReview('LE322JV223222F5GVGMLNB83F');

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame(
            'https://kyc-test.adyen.com/lem/v4/legalEntities/LE322JV223222F5GVGMLNB83F/requestPeriodicReview',
            (string) $request->getUri()
        );
        // The spec declares no security for this operation, but credentials must still be sent
        $this->assertSame('MockAPIKey', $request->getHeaderLine('x-api-key'));
    }

    public function testCreateLegalEntity()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/create-legal-entity-response.json',
            200,
            $container
        );
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);

        // Individual Name
        $name = new Name();
        $name->setFirstName('Shelly');
        $name->setLastName('Eller');

        // Individual Residential Address
        $residentialAddress = new Address();
        $residentialAddress->setCity('Sydney');
        $residentialAddress->setCountry('AU');
        $residentialAddress->setPostalCode('1122');
        $residentialAddress->setStateOrProvince('NSW');
        $residentialAddress->setStreet('Winfield Avenue');
        $residentialAddress->setStreet2('12');

        // Individual Identification Data
        $identificationData = new IdentificationData();
        $identificationData->setIssuerState('NSW');
        $identificationData->setNumber('1234567891');
        $identificationData->setType(IdentificationData::TYPE_DRIVERS_LICENSE);
        $identificationData->setCardNumber('112327');

        // Individual Birth Data
        $birthData = new BirthData();
        $birthData->setDateOfBirth('1991-01-01');

        // Individual
        $individual = new Individual();
        $individual->setName($name);
        $individual->setResidentialAddress($residentialAddress);
        $individual->setIdentificationData($identificationData);
        $individual->setBirthData($birthData);
        $individual->setEmail('s.hopper @example.com');

        // LegalEntityInfoRequiredType
        $legalEntityInfoRequiredType = new LegalEntityInfoRequiredType();
        $legalEntityInfoRequiredType->setType(LegalEntityInfoRequiredType::TYPE_INDIVIDUAL);
        $legalEntityInfoRequiredType->setIndividual($individual);

        $response = $service->createLegalEntity($legalEntityInfoRequiredType);

        $this->assertInstanceOf(LegalEntity::class, $response);
        $this->assertJsonStringEqualsJsonFile(
            'tests/Resources/LegalEntityManagement/create-legal-entity-request.json',
            (string) $container[0]['request']->getBody()
        );
        $this->assertEquals('LE00000000000000000000001', $response->getId());
        $this->assertEquals('individual', $response->getType());
        $this->assertEquals('s.hopper @example.com', $response->getIndividual()->getEmail());
        $this->assertEquals('Sydney', $response->getIndividual()->getResidentialAddress()->getCity());
        $this->assertEquals('Shelly', $response->getIndividual()->getName()->getFirstName());
    }

    public function testUpdateLegalEntity()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/update-legal-entity-response.json',
            200,
            $container
        );
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);

        // LegalEntityAssociation
        $legalEntityAssociation = new LegalEntityAssociation();
        $legalEntityAssociation->setLegalEntityId('LE00000000000000000000002');
        $legalEntityAssociation->setType(LegalEntityAssociation::TYPE_SETTLOR);
        $legalEntityAssociation->setEntityType('individual');
        $legalEntityAssociation->setSettlorExemptionReason([
            'deceased',
            'professionalServiceProvider'
        ]);

        // LegalEntityInfo
        $legalEntityInfo = new LegalEntityInfo();
        $legalEntityInfo->setEntityAssociations([$legalEntityAssociation]);

        $response = $service->updateLegalEntity('LE00000000000000000000001', $legalEntityInfo);

        $this->assertSame('PATCH', $container[0]['request']->getMethod());
        $this->assertSame(
            'https://kyc-test.adyen.com/lem/v4/legalEntities/LE00000000000000000000001',
            (string) $container[0]['request']->getUri()
        );
        $this->assertJsonStringEqualsJsonFile(
            'tests/Resources/LegalEntityManagement/update-legal-entity-request.json',
            (string) $container[0]['request']->getBody()
        );
        $this->assertEquals('LE00000000000000000000001', $response->getId());
        $this->assertEquals('trust', $response->getType());
        $this->assertCount(1, $response->getEntityAssociations());
        $this->assertEquals('LE00000000000000000000002', $response->getEntityAssociations()[0]->getLegalEntityId());
        $this->assertEquals('settlor', $response->getEntityAssociations()[0]->getType());
    }

    public function testCreateLegalEntitySendsExpectedUrlOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/create-legal-entity-response.json',
            200,
            $container
        );
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);

        $service->createLegalEntity(new LegalEntityInfoRequiredType(['type' => 'individual']));

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('https://kyc-test.adyen.com/lem/v4/legalEntities', (string) $request->getUri());
    }

    public function testCreateLegalEntitySendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/create-legal-entity-response.json',
            200,
            $container
        );
        $service = new LegalEntitiesApi($this->createLiveConfiguration(), $client);

        $service->createLegalEntity(new LegalEntityInfoRequiredType(['type' => 'individual']));

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('https://kyc-live.adyen.com/lem/v4/legalEntities', (string) $request->getUri());
    }

    /**
     * @dataProvider successCreateLegalEntityProvider
     */
    public function testCreateLegalEntitySuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);
        $params = json_decode(
            file_get_contents('tests/Resources/LegalEntityManagement/create-legal-entity-request.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $result = $service->createLegalEntity(new LegalEntityInfoRequiredType($params));

        $this->assertSame('LE00000000000000000000001', $result['id']);
        $this->assertSame('Shelly', $result['individual']['name']['firstName']);
        $this->assertJsonStringEqualsJsonFile(
            'tests/Resources/LegalEntityManagement/create-legal-entity-request.json',
            (string) $container[0]['request']->getBody()
        );
    }

    /**
     * @dataProvider successCreateLegalEntityProvider
     */
    public function testCreateLegalEntitySuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);

        $result = $service->createLegalEntity(new LegalEntityInfoRequiredType(['type' => 'individual']))->toArray();

        $this->assertSame('LE00000000000000000000001', $result['id']);
        $this->assertIsArray($result['individual']);
        $this->assertSame('Sydney', $result['individual']['residentialAddress']['city']);
        $this->assertSame('Shelly', $result['individual']['name']['firstName']);
    }

    public static function successCreateLegalEntityProvider(): array
    {
        return [
            ['tests/Resources/LegalEntityManagement/create-legal-entity-response.json', 200]
        ];
    }

    public function testCreateLegalEntityWithHttpInfo(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/create-legal-entity-response.json',
            200,
            $container
        );
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);
        $options = new RequestOptions(['idempotencyKey' => 'create-legal-entity']);

        [$result, $status, $headers] = $service->createLegalEntityWithHttpInfo(
            new LegalEntityInfoRequiredType(['type' => 'individual']),
            $options
        );

        $this->assertInstanceOf(LegalEntity::class, $result);
        $this->assertSame('LE00000000000000000000001', $result->getId());
        $this->assertSame(200, $status);
        $this->assertIsArray($headers);
        $this->assertCount(1, $container);
        $this->assertSame('create-legal-entity', $container[0]['request']->getHeaderLine('Idempotency-Key'));
        $this->assertSame(['MockAPIKey'], $container[0]['request']->getHeader('x-api-key'));
    }

    public function testCreateLegalEntityAsync(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/create-legal-entity-response.json',
            200
        );
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);

        $promise = $service->createLegalEntityAsync(new LegalEntityInfoRequiredType(['type' => 'individual']));

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $result = $promise->wait();
        $this->assertInstanceOf(LegalEntity::class, $result);
        $this->assertSame('LE00000000000000000000001', $result->getId());
        $this->assertSame('Shelly', $result->getIndividual()->getName()->getFirstName());
    }

    public function testCreateLegalEntityAsyncWithHttpInfo(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/create-legal-entity-response.json',
            200,
            $container
        );
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);
        $options = new RequestOptions(['idempotencyKey' => 'create-legal-entity-async']);

        $promise = $service->createLegalEntityAsyncWithHttpInfo(
            new LegalEntityInfoRequiredType(['type' => 'individual']),
            $options
        );

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        [$result, $status, $headers] = $promise->wait();
        $this->assertInstanceOf(LegalEntity::class, $result);
        $this->assertSame('LE00000000000000000000001', $result->getId());
        $this->assertSame(200, $status);
        $this->assertIsArray($headers);
        $this->assertCount(1, $container);
        $this->assertSame('create-legal-entity-async', $container[0]['request']->getHeaderLine('Idempotency-Key'));
        $this->assertSame(['MockAPIKey'], $container[0]['request']->getHeader('x-api-key'));
    }

    public function testCreateLegalEntityOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);

        try {
            $service->createLegalEntity(new LegalEntityInfoRequiredType(['type' => 'individual']));
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }

    /**
     * @dataProvider apiKeyHeaderProvider
     */
    public function testCreateLegalEntityMergesAdditionalApiKey(string $headerName, array $expectedValues): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/create-legal-entity-response.json',
            200,
            $container
        );
        $config = $this->createConfiguration();
        $service = new LegalEntitiesApi($config, $client);
        $options = new RequestOptions(['additionalHeaders' => [
            $headerName => 'MerchantAPIKey',
            'adyen-library-name' => 'merchant-name',
            'adyen-library-version' => 'merchant-version'
        ]]);

        $service->createLegalEntity(new LegalEntityInfoRequiredType(['type' => 'individual']), $options);

        $request = $container[0]['request'];
        $this->assertSame($expectedValues, $request->getHeader('x-api-key'));
        $this->assertSame($config->getLibraryName(), $request->getHeaderLine('adyen-library-name'));
        $this->assertSame($config->getLibraryVersion(), $request->getHeaderLine('adyen-library-version'));
        $this->assertSame('MockAPIKey', $config->getAdyenApiKey());
    }

    /**
     * @dataProvider apiKeyHeaderProvider
     */
    public function testCreateLegalEntityAsyncMergesAdditionalApiKey(string $headerName, array $expectedValues): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/create-legal-entity-response.json',
            200,
            $container
        );
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);
        $options = new RequestOptions(['additionalHeaders' => [$headerName => 'MerchantAPIKey']]);

        $result = $service->createLegalEntityAsync(
            new LegalEntityInfoRequiredType(['type' => 'individual']),
            $options
        )->wait();

        $this->assertInstanceOf(LegalEntity::class, $result);
        $this->assertSame($expectedValues, $container[0]['request']->getHeader('x-api-key'));
    }

    /**
     * @dataProvider apiKeyHeaderProvider
     */
    public function testRequestPeriodicReviewMergesAdditionalApiKey(string $headerName, array $expectedValues): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(null, 200, $container);
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);
        $options = new RequestOptions(['additionalHeaders' => [$headerName => 'MerchantAPIKey']]);

        $service->requestPeriodicReview('LE123', $options);

        $this->assertSame($expectedValues, $container[0]['request']->getHeader('x-api-key'));
    }

    public static function apiKeyHeaderProvider(): array
    {
        return [
            'matching name overrides SDK key' => ['x-api-key', ['MerchantAPIKey']],
            'spec casing keeps both values' => ['X-API-Key', ['MockAPIKey', 'MerchantAPIKey']],
            'mixed case keeps both values' => ['X-Api-Key', ['MockAPIKey', 'MerchantAPIKey']]
        ];
    }

    public function testCreateLegalEntityAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new LegalEntitiesApi($this->createConfiguration(), $client);

        try {
            $service->createLegalEntityAsync(new LegalEntityInfoRequiredType(['type' => 'individual']))->wait();
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }

    public function testCreateLegalEntityRejectMalformedSuccessResponse(): void
    {
        $this->apiExceptionScenario()
            ->givenResponse(200, [], '{invalid-json')
            ->whenCalling('createLegalEntity', new LegalEntityInfoRequiredType(['type' => 'individual']))
            ->expectMessageContains('Error JSON decoding server response');
    }

    public function testCreateLegalEntityAsyncRejectMalformedSuccessResponse(): void
    {
        $this->apiExceptionScenario()
            ->givenResponse(200, [], '{invalid-json')
            ->whenCallingAsync('createLegalEntityAsync', new LegalEntityInfoRequiredType(['type' => 'individual']))
            ->expectMessageContains('Error JSON decoding server response');
    }

    public function testCreateLegalEntityOnConnectionFailureThrows(): void
    {
        $this->apiExceptionScenario()
            ->givenConnectionException()
            ->whenCalling('createLegalEntity', new LegalEntityInfoRequiredType(['type' => 'individual']))
            ->expectStatus(0)
            ->expectNoResponse()
            ->expectPreviousTransportException();
    }

    public function testCreateLegalEntityAsyncOnConnectionFailureThrows(): void
    {
        $this->apiExceptionScenario()
            ->givenConnectionException()
            ->whenCallingAsync('createLegalEntityAsync', new LegalEntityInfoRequiredType(['type' => 'individual']))
            ->expectStatus(0)
            ->expectNoResponse()
            ->expectPreviousTransportException();
    }

    public function testCreateLegalEntityOnRequestExceptionWithoutResponseThrows(): void
    {
        $this->apiExceptionScenario()
            ->givenRequestExceptionWithoutResponse()
            ->whenCalling('createLegalEntity', new LegalEntityInfoRequiredType(['type' => 'individual']))
            ->expectStatus(0)
            ->expectMessage('[0] Request failed')
            ->expectNoResponse()
            ->expectPreviousTransportException();
    }

    public function testCreateLegalEntityAsyncOnRequestExceptionWithoutResponseThrows(): void
    {
        $this->apiExceptionScenario()
            ->givenRequestExceptionWithoutResponse()
            ->whenCallingAsync('createLegalEntityAsync', new LegalEntityInfoRequiredType(['type' => 'individual']))
            ->expectStatus(0)
            ->expectMessage('[0] Request failed')
            ->expectNoResponse()
            ->expectPreviousTransportException();
    }

    public function testCreateLegalEntityOnRequestExceptionWithResponseThrows(): void
    {
        $body = '{"status":422,"errorCode":"010","detail":"Invalid request"}';

        $this->apiExceptionScenario()
            ->givenRequestExceptionWithResponse(422, ['X-Request-ID' => 'request-id'], $body)
            ->whenCalling('createLegalEntity', new LegalEntityInfoRequiredType(['type' => 'individual']))
            ->expectStatus(422)
            ->expectMessage('Invalid request')
            ->expectResponse(['X-Request-ID' => ['request-id']], $body)
            ->expectErrorCode('010')
            ->expectPreviousTransportException();
    }

    public function testCreateLegalEntityAsyncOnRequestExceptionWithResponseThrows(): void
    {
        $body = '{"status":422,"errorCode":"010","detail":"Invalid request"}';

        $this->apiExceptionScenario()
            ->givenRequestExceptionWithResponse(422, ['X-Request-ID' => 'request-id'], $body)
            ->whenCallingAsync('createLegalEntityAsync', new LegalEntityInfoRequiredType(['type' => 'individual']))
            ->expectStatus(422)
            ->expectMessage('Invalid request')
            ->expectResponse(['X-Request-ID' => ['request-id']], $body)
            ->expectErrorCode('010')
            ->expectPreviousTransportException();
    }

    private function apiExceptionScenario(): ApiExceptionScenario
    {
        return new ApiExceptionScenario(
            $this,
            'POST',
            'https://kyc-test.adyen.com/lem/v4/legalEntities',
            fn (Client $client): LegalEntitiesApi => new LegalEntitiesApi($this->createConfiguration(), $client)
        );
    }
}
