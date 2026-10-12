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
use Adyen\Model\LegalEntityManagement\GetTermsOfServiceDocumentRequest;
use Adyen\Model\LegalEntityManagement\GetTermsOfServiceDocumentResponse;
use Adyen\Service\LegalEntityManagement\TermsOfServiceApi;
use Adyen\Tests\Unit\BaseTest;

class TermsOfServiceApiTest extends BaseTest
{
    public function testGetTermsOfServiceDocumentSendsExpectedUrlOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/terms-of-service-document-post.json',
            200,
            $container
        );
        $service = new TermsOfServiceApi($this->createConfiguration(), $client);

        $response = $service->getTermsOfServiceDocument('id', new GetTermsOfServiceDocumentRequest());

        $this->assertEquals('JVBERi0xLjQKJcOkw7zDtsOfCjIgMCBv+f/ub0j6JPRX+E3EmC==', $response->getDocument());
        $this->assertEquals(GetTermsOfServiceDocumentResponse::TYPE_ADYEN_ISSUING, $response->getType());
        $this->assertSame('POST', $container[0]['request']->getMethod());
        $this->assertSame(
            'https://kyc-test.adyen.com/lem/v4/legalEntities/id/termsOfService',
            (string) $container[0]['request']->getUri()
        );
    }

    public function testGetTermsOfServiceDocumentSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/terms-of-service-document-post.json',
            200,
            $container
        );
        $service = new TermsOfServiceApi($this->createLiveConfiguration(), $client);

        $service->getTermsOfServiceDocument('id', new GetTermsOfServiceDocumentRequest());

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame(
            'https://kyc-live.adyen.com/lem/v4/legalEntities/id/termsOfService',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successTermsOfServiceProvider
     */
    public function testGetTermsOfServiceDocumentSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new TermsOfServiceApi($this->createConfiguration(), $client);
        $params = ['type' => 'adyenIssuing', 'language' => 'en'];

        $result = $service->getTermsOfServiceDocument('id', new GetTermsOfServiceDocumentRequest($params));

        $this->assertSame('adyenIssuing', $result['type']);
        $this->assertSame('JVBERi0xLjQKJcOkw7zDtsOfCjIgMCBv+f/ub0j6JPRX+E3EmC==', $result['document']);
        $this->assertJsonStringEqualsJsonString(
            '{"type":"adyenIssuing","language":"en"}',
            (string) $container[0]['request']->getBody()
        );
    }

    /**
     * @dataProvider successTermsOfServiceProvider
     */
    public function testGetTermsOfServiceDocumentSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new TermsOfServiceApi($this->createConfiguration(), $client);

        $result = $service->getTermsOfServiceDocument('id', new GetTermsOfServiceDocumentRequest())->toArray();

        $this->assertSame('adyenIssuing', $result['type']);
        $this->assertSame('JVBERi0xLjQKJcOkw7zDtsOfCjIgMCBv+f/ub0j6JPRX+E3EmC==', $result['document']);
    }

    public static function successTermsOfServiceProvider(): array
    {
        return [['tests/Resources/LegalEntityManagement/terms-of-service-document-post.json', 200]];
    }

    public function testGetTermsOfServiceDocumentWithHttpInfo(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/terms-of-service-document-post.json',
            200
        );
        $service = new TermsOfServiceApi($this->createConfiguration(), $client);

        [$result, $status, $headers] = $service->getTermsOfServiceDocumentWithHttpInfo(
            'id',
            new GetTermsOfServiceDocumentRequest()
        );

        $this->assertInstanceOf(GetTermsOfServiceDocumentResponse::class, $result);
        $this->assertSame('adyenIssuing', $result->getType());
        $this->assertSame(200, $status);
        $this->assertIsArray($headers);
    }

    public function testGetTermsOfServiceDocumentOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new TermsOfServiceApi($this->createConfiguration(), $client);

        try {
            $service->getTermsOfServiceDocument('id', new GetTermsOfServiceDocumentRequest());
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }

    public function testGetTermsOfServiceDocumentAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new TermsOfServiceApi($this->createConfiguration(), $client);

        try {
            $service->getTermsOfServiceDocumentAsync('id', new GetTermsOfServiceDocumentRequest())->wait();
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }
}
