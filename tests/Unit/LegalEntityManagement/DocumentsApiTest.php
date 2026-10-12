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
use Adyen\Model\LegalEntityManagement\Attachment;
use Adyen\Model\LegalEntityManagement\Document;
use Adyen\RequestOptions;
use Adyen\Service\LegalEntityManagement\DocumentsApi;
use Adyen\Tests\Unit\BaseTest;

class DocumentsApiTest extends BaseTest
{
    public function testDeleteDocumentSendsExpectedUrlOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(null, 204, $container);
        $service = new DocumentsApi($this->createConfiguration(), $client);

        $service->deleteDocument('Id');

        $request = $container[0]['request'];
        $this->assertSame('DELETE', $request->getMethod());
        $this->assertSame(
            'https://kyc-test.adyen.com/lem/v4/documents/Id',
            (string) $request->getUri()
        );
    }

    public function testUploadDocumentForVerificationChecksSendsVerificationCodeHeader(): void
    {
        $service = new DocumentsApi($this->createConfiguration());
        $requestOptions = new RequestOptions(['requestedVerificationCodeHeader' => '123456']);

        $request = $service->uploadDocumentForVerificationChecksRequest(
            new Document(),
            requestOptions: $requestOptions
        );

        $this->assertSame('123456', $request->getHeaderLine('x-requested-verification-code'));
        $this->assertFalse($request->hasHeader('Adyen-Requested-Verification-Code'));
    }

    public function testDeleteDocumentSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(null, 204, $container);
        $service = new DocumentsApi($this->createLiveConfiguration(), $client);

        $service->deleteDocument('Id');

        $request = $container[0]['request'];
        $this->assertSame('DELETE', $request->getMethod());
        $this->assertSame('https://kyc-live.adyen.com/lem/v4/documents/Id', (string) $request->getUri());
    }

    public function testGetDocumentSendsExpectedUrlOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/document-success.json',
            200,
            $container
        );
        $service = new DocumentsApi($this->createConfiguration(), $client);

        $service->getDocument('DO123', skipContent: true);

        $request = $container[0]['request'];
        $this->assertSame('GET', $request->getMethod());
        $this->assertSame(
            'https://kyc-test.adyen.com/lem/v4/documents/DO123?skipContent=1',
            (string) $request->getUri()
        );
    }

    public function testGetDocumentSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/document-success.json',
            200,
            $container
        );
        $service = new DocumentsApi($this->createLiveConfiguration(), $client);

        $service->getDocument('DO123', skipContent: true);

        $request = $container[0]['request'];
        $this->assertSame('GET', $request->getMethod());
        $this->assertSame(
            'https://kyc-live.adyen.com/lem/v4/documents/DO123?skipContent=1',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDocumentProvider
     */
    public function testUploadDocumentSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new DocumentsApi($this->createConfiguration(), $client);
        $attachment = new Attachment();
        $attachment->setContent('dGVzdA==')->setFilename('passport.pdf')->setContentType('application/pdf');
        $document = new Document();
        $document->setType(Document::TYPE_PASSPORT)->setAttachments([$attachment]);
        $options = new RequestOptions(['requestedVerificationCodeHeader' => '123456']);

        $result = $service->uploadDocumentForVerificationChecks($document, $options);

        $this->assertInstanceOf(Document::class, $result);
        $this->assertSame('DO00000000000000000000001', $result->getId());
        $this->assertSame('passport.pdf', $result->getAttachments()[0]->getFilename());
        $request = $container[0]['request'];
        $this->assertSame('123456', $request->getHeaderLine('x-requested-verification-code'));
        $this->assertSame('MockAPIKey', $request->getHeaderLine('x-api-key'));
        $this->assertJsonStringEqualsJsonString(
            '{"type":"passport","attachments":[{"content":"dGVzdA==",'
                . '"filename":"passport.pdf","contentType":"application/pdf"}]}',
            (string) $request->getBody()
        );
    }

    /**
     * @dataProvider successDocumentProvider
     */
    public function testUploadDocumentSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new DocumentsApi($this->createConfiguration(), $client);
        $params = [
            'type' => 'passport',
            'attachments' => [
                ['content' => 'dGVzdA==', 'filename' => 'passport.pdf', 'contentType' => 'application/pdf']
            ]
        ];

        $result = $service->uploadDocumentForVerificationChecks(new Document($params));

        $this->assertSame('DO00000000000000000000001', $result['id']);
        $this->assertSame('passport.pdf', $result['attachments'][0]['filename']);
    }

    /**
     * @dataProvider successDocumentProvider
     */
    public function testUploadDocumentSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new DocumentsApi($this->createConfiguration(), $client);

        $result = $service->uploadDocumentForVerificationChecks(new Document(['type' => 'passport']))->toArray();

        $this->assertSame('DO00000000000000000000001', $result['id']);
        $this->assertIsArray($result['attachments'][0]);
        $this->assertSame('application/pdf', $result['attachments'][0]['contentType']);
    }

    public static function successDocumentProvider(): array
    {
        return [['tests/Resources/LegalEntityManagement/document-success.json', 200]];
    }

    public function testUploadDocumentWithHttpInfo(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/document-success.json', 200);
        $service = new DocumentsApi($this->createConfiguration(), $client);

        [$result, $status, $headers] = $service->uploadDocumentForVerificationChecksWithHttpInfo(new Document());

        $this->assertInstanceOf(Document::class, $result);
        $this->assertSame('DO00000000000000000000001', $result->getId());
        $this->assertSame(200, $status);
        $this->assertIsArray($headers);
    }

    public function testDeleteDocumentWithHttpInfo(): void
    {
        $client = $this->createMockSerializerClient(null, 204);
        $service = new DocumentsApi($this->createConfiguration(), $client);

        [$result, $status, $headers] = $service->deleteDocumentWithHttpInfo('Id');

        $this->assertNull($result);
        $this->assertSame(204, $status);
        $this->assertIsArray($headers);
    }

    public function testDeleteDocumentOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new DocumentsApi($this->createConfiguration(), $client);

        try {
            $service->deleteDocument('Id');
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }

    public function testUploadDocumentOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new DocumentsApi($this->createConfiguration(), $client);

        try {
            $service->uploadDocumentForVerificationChecks(new Document());
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }

    public function testUploadDocumentAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new DocumentsApi($this->createConfiguration(), $client);

        try {
            $service->uploadDocumentForVerificationChecksAsync(new Document())->wait();
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }
}
