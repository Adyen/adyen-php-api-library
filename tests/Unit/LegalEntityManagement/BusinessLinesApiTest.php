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
use Adyen\Model\LegalEntityManagement\BusinessLine;
use Adyen\Model\LegalEntityManagement\BusinessLineInfo;
use Adyen\Service\LegalEntityManagement\BusinessLinesApi;
use Adyen\Tests\Unit\BaseTest;

class BusinessLinesApiTest extends BaseTest
{
    public function testCreateBusinessLineSendsExpectedUrlOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/business-line-success.json',
            200,
            $container
        );
        $service = new BusinessLinesApi($this->createConfiguration(), $client);

        $service->createBusinessLine(new BusinessLineInfo());

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('https://kyc-test.adyen.com/lem/v4/businessLines', (string) $request->getUri());
    }

    public function testCreateBusinessLineSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/business-line-success.json',
            200,
            $container
        );
        $service = new BusinessLinesApi($this->createLiveConfiguration(), $client);

        $service->createBusinessLine(new BusinessLineInfo());

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('https://kyc-live.adyen.com/lem/v4/businessLines', (string) $request->getUri());
    }

    /**
     * @dataProvider successBusinessLineProvider
     */
    public function testCreateBusinessLineSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new BusinessLinesApi($this->createConfiguration(), $client);
        $info = new BusinessLineInfo();
        $info->setLegalEntityId('LE00000000000000000000001')
            ->setService(BusinessLine::SERVICE_PAYMENT_PROCESSING)
            ->setIndustryCode('5399');

        $result = $service->createBusinessLine($info);

        $this->assertInstanceOf(BusinessLine::class, $result);
        $this->assertSame('SE322JV223222F5GVGMLNB83F', $result->getId());
        $this->assertSame(BusinessLine::SERVICE_PAYMENT_PROCESSING, $result->getService());
        $this->assertSame(['eCommerce'], $result->getSalesChannels());
        $this->assertJsonStringEqualsJsonString(
            '{"legalEntityId":"LE00000000000000000000001","service":"paymentProcessing","industryCode":"5399"}',
            (string) $container[0]['request']->getBody()
        );
    }

    /**
     * @dataProvider successBusinessLineProvider
     */
    public function testCreateBusinessLineSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new BusinessLinesApi($this->createConfiguration(), $client);
        $params = ['legalEntityId' => 'LE00000000000000000000001', 'service' => 'paymentProcessing'];

        $result = $service->createBusinessLine(new BusinessLineInfo($params));

        $this->assertSame('SE322JV223222F5GVGMLNB83F', $result['id']);
        $this->assertSame('paymentProcessing', $result['service']);
    }

    /**
     * @dataProvider successBusinessLineProvider
     */
    public function testCreateBusinessLineSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new BusinessLinesApi($this->createConfiguration(), $client);

        $result = $service->createBusinessLine(new BusinessLineInfo())->toArray();

        $this->assertSame('SE322JV223222F5GVGMLNB83F', $result['id']);
        $this->assertSame(['eCommerce'], $result['salesChannels']);
    }

    public static function successBusinessLineProvider(): array
    {
        return [['tests/Resources/LegalEntityManagement/business-line-success.json', 200]];
    }

    public function testCreateBusinessLineWithHttpInfo(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/business-line-success.json',
            200
        );
        $service = new BusinessLinesApi($this->createConfiguration(), $client);

        [$result, $status, $headers] = $service->createBusinessLineWithHttpInfo(new BusinessLineInfo());

        $this->assertInstanceOf(BusinessLine::class, $result);
        $this->assertSame('SE322JV223222F5GVGMLNB83F', $result->getId());
        $this->assertSame(200, $status);
        $this->assertIsArray($headers);
    }

    public function testCreateBusinessLineOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new BusinessLinesApi($this->createConfiguration(), $client);

        try {
            $service->createBusinessLine(new BusinessLineInfo());
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }

    public function testCreateBusinessLineAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new BusinessLinesApi($this->createConfiguration(), $client);

        try {
            $service->createBusinessLineAsync(new BusinessLineInfo())->wait();
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }
}
