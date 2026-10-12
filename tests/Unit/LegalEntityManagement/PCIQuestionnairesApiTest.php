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
 * Copyright (c) 2026 Adyen N.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Tests\Unit\LegalEntityManagement;

use Adyen\Exception\AdyenException;
use Adyen\Model\LegalEntityManagement\CalculatePciStatusRequest;
use Adyen\Model\LegalEntityManagement\CalculatePciStatusResponse;
use Adyen\Service\LegalEntityManagement\PCIQuestionnairesApi;
use Adyen\Tests\Unit\BaseTest;

class PCIQuestionnairesApiTest extends BaseTest
{
    public function testCalculatePciStatusOfLegalEntitySendsExpectedUrlOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/pci-status-success.json',
            200,
            $container
        );
        $service = new PCIQuestionnairesApi($this->createConfiguration(), $client);

        $service->calculatePciStatusOfLegalEntity('LE123', new CalculatePciStatusRequest());

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame(
            'https://kyc-test.adyen.com/lem/v4/legalEntities/LE123/pciQuestionnaires/signingRequired',
            (string) $request->getUri()
        );
    }

    public function testCalculatePciStatusOfLegalEntitySendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/pci-status-success.json',
            200,
            $container
        );
        $service = new PCIQuestionnairesApi($this->createLiveConfiguration(), $client);

        $service->calculatePciStatusOfLegalEntity('LE123', new CalculatePciStatusRequest());

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame(
            'https://kyc-live.adyen.com/lem/v4/legalEntities/LE123/pciQuestionnaires/signingRequired',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successPciStatusProvider
     */
    public function testCalculatePciStatusOfLegalEntitySuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PCIQuestionnairesApi($this->createConfiguration(), $client);
        $request = new CalculatePciStatusRequest();
        $request->setAdditionalSalesChannels(['eCommerce']);

        $result = $service->calculatePciStatusOfLegalEntity('LE123', $request);

        $this->assertInstanceOf(CalculatePciStatusResponse::class, $result);
        $this->assertTrue($result->getSigningRequired());
        $this->assertJsonStringEqualsJsonString(
            '{"additionalSalesChannels":["eCommerce"]}',
            (string) $container[0]['request']->getBody()
        );
    }

    /**
     * @dataProvider successPciStatusProvider
     */
    public function testCalculatePciStatusOfLegalEntitySuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PCIQuestionnairesApi($this->createConfiguration(), $client);
        $params = ['additionalSalesChannels' => ['eCommerce']];

        $result = $service->calculatePciStatusOfLegalEntity('LE123', new CalculatePciStatusRequest($params));

        $this->assertTrue($result['signingRequired']);
    }

    /**
     * @dataProvider successPciStatusProvider
     */
    public function testCalculatePciStatusOfLegalEntitySuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PCIQuestionnairesApi($this->createConfiguration(), $client);

        $result = $service->calculatePciStatusOfLegalEntity('LE123', new CalculatePciStatusRequest())->toArray();

        $this->assertSame(['signingRequired' => true], $result);
    }

    public static function successPciStatusProvider(): array
    {
        return [['tests/Resources/LegalEntityManagement/pci-status-success.json', 200]];
    }

    public function testCalculatePciStatusOfLegalEntityWithHttpInfo(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/pci-status-success.json',
            200
        );
        $service = new PCIQuestionnairesApi($this->createConfiguration(), $client);

        [$result, $status, $headers] = $service->calculatePciStatusOfLegalEntityWithHttpInfo(
            'LE123',
            new CalculatePciStatusRequest()
        );

        $this->assertInstanceOf(CalculatePciStatusResponse::class, $result);
        $this->assertTrue($result->getSigningRequired());
        $this->assertSame(200, $status);
        $this->assertIsArray($headers);
    }

    public function testCalculatePciStatusOfLegalEntityOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new PCIQuestionnairesApi($this->createConfiguration(), $client);

        try {
            $service->calculatePciStatusOfLegalEntity('LE123', new CalculatePciStatusRequest());
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }

    public function testCalculatePciStatusOfLegalEntityAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new PCIQuestionnairesApi($this->createConfiguration(), $client);

        try {
            $service->calculatePciStatusOfLegalEntityAsync('LE123', new CalculatePciStatusRequest())->wait();
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }
}
