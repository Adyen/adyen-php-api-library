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
use Adyen\Model\LegalEntityManagement\BankAccountInfoAccountIdentification;
use Adyen\Model\LegalEntityManagement\TransferInstrument;
use Adyen\Model\LegalEntityManagement\TransferInstrumentInfo;
use Adyen\Service\LegalEntityManagement\TransferInstrumentsApi;
use Adyen\Tests\Unit\BaseTest;

class TransferInstrumentsApiTest extends BaseTest
{
    public function testUpdateTransferInstrumentSendsExpectedUrlOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/transfer-instrument-patch.json',
            200,
            $container
        );
        $service = new TransferInstrumentsApi($this->createConfiguration(), $client);

        $response = $service->updateTransferInstrument('id', new TransferInstrumentInfo());

        $this->assertSame('PATCH', $container[0]['request']->getMethod());
        $this->assertSame(
            'https://kyc-test.adyen.com/lem/v4/transferInstruments/id',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(TransferInstrument::class, $response);
        $this->assertEquals('SE322JV223222F5GVGMLNB83F', $response->getId());
        $this->assertEquals(
            new \DateTime('2023-04-03T09:46:26.482Z'),
            $response->getDocumentDetails()[0]->getModificationDate()
        );
        $this->assertInstanceOf(
            BankAccountInfoAccountIdentification::class,
            $response->getBankAccount()->getAccountIdentification()
        );
        $this->assertEquals('auLocal', $response->getBankAccount()->getAccountIdentification()->getType());
    }

    public function testUpdateTransferInstrumentSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/transfer-instrument-patch.json',
            200,
            $container
        );
        $service = new TransferInstrumentsApi($this->createLiveConfiguration(), $client);

        $service->updateTransferInstrument('id', new TransferInstrumentInfo());

        $request = $container[0]['request'];
        $this->assertSame('PATCH', $request->getMethod());
        $this->assertSame('https://kyc-live.adyen.com/lem/v4/transferInstruments/id', (string) $request->getUri());
    }

    /**
     * @dataProvider successTransferInstrumentProvider
     */
    public function testUpdateTransferInstrumentSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new TransferInstrumentsApi($this->createConfiguration(), $client);
        $params = ['legalEntityId' => 'LE123', 'type' => 'bankAccount'];

        $result = $service->updateTransferInstrument('id', new TransferInstrumentInfo($params));

        $this->assertSame('SE322JV223222F5GVGMLNB83F', $result['id']);
        $this->assertSame('auLocal', $result['bankAccount']['accountIdentification']['type']);
        $this->assertJsonStringEqualsJsonString(
            '{"legalEntityId":"LE123","type":"bankAccount"}',
            (string) $container[0]['request']->getBody()
        );
    }

    /**
     * @dataProvider successTransferInstrumentProvider
     */
    public function testUpdateTransferInstrumentSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new TransferInstrumentsApi($this->createConfiguration(), $client);

        $result = $service->updateTransferInstrument('id', new TransferInstrumentInfo())->toArray();

        $this->assertSame('SE322JV223222F5GVGMLNB83F', $result['id']);
        $this->assertIsArray($result['documentDetails'][0]);
        $this->assertSame('auLocal', $result['bankAccount']['accountIdentification']['type']);
        $this->assertSame('string', $result['bankAccount']['accountIdentification']['bsbCode']);
    }

    public static function successTransferInstrumentProvider(): array
    {
        return [['tests/Resources/LegalEntityManagement/transfer-instrument-patch.json', 200]];
    }

    public function testUpdateTransferInstrumentWithHttpInfo(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/transfer-instrument-patch.json',
            200
        );
        $service = new TransferInstrumentsApi($this->createConfiguration(), $client);

        [$result, $status, $headers] = $service->updateTransferInstrumentWithHttpInfo(
            'id',
            new TransferInstrumentInfo()
        );

        $this->assertInstanceOf(TransferInstrument::class, $result);
        $this->assertSame('SE322JV223222F5GVGMLNB83F', $result->getId());
        $this->assertSame(200, $status);
        $this->assertIsArray($headers);
    }

    public function testUpdateTransferInstrumentOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new TransferInstrumentsApi($this->createConfiguration(), $client);

        try {
            $service->updateTransferInstrument('id', new TransferInstrumentInfo());
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }

    public function testUpdateTransferInstrumentAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new TransferInstrumentsApi($this->createConfiguration(), $client);

        try {
            $service->updateTransferInstrumentAsync('id', new TransferInstrumentInfo())->wait();
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }
}
