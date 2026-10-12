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
use Adyen\Model\LegalEntityManagement\CheckTaxElectronicDeliveryConsentResponse;
use Adyen\Model\LegalEntityManagement\SetTaxElectronicDeliveryConsentRequest;
use Adyen\Service\LegalEntityManagement\TaxEDeliveryConsentApi;
use Adyen\Tests\Unit\BaseTest;

class TaxEDeliveryConsentApiTest extends BaseTest
{
    public function testCheckStatusOfConsentSendsExpectedUrlOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/tax-consent-success.json',
            200,
            $container
        );
        $service = new TaxEDeliveryConsentApi($this->createConfiguration(), $client);

        $service->checkStatusOfConsentForElectronicDeliveryOfTaxForms('LE123');

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame(
            'https://kyc-test.adyen.com/lem/v4/legalEntities/LE123/checkTaxElectronicDeliveryConsent',
            (string) $request->getUri()
        );
    }

    public function testCheckStatusOfConsentSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/tax-consent-success.json',
            200,
            $container
        );
        $service = new TaxEDeliveryConsentApi($this->createLiveConfiguration(), $client);

        $service->checkStatusOfConsentForElectronicDeliveryOfTaxForms('LE123');

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame(
            'https://kyc-live.adyen.com/lem/v4/legalEntities/LE123/checkTaxElectronicDeliveryConsent',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successTaxConsentProvider
     */
    public function testCheckStatusOfConsentSuccess(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new TaxEDeliveryConsentApi($this->createConfiguration(), $client);

        $result = $service->checkStatusOfConsentForElectronicDeliveryOfTaxForms('LE123');

        $this->assertInstanceOf(CheckTaxElectronicDeliveryConsentResponse::class, $result);
        $this->assertTrue($result->getUS1099k());
    }

    /**
     * @dataProvider successTaxConsentProvider
     */
    public function testCheckStatusOfConsentSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new TaxEDeliveryConsentApi($this->createConfiguration(), $client);

        $result = $service->checkStatusOfConsentForElectronicDeliveryOfTaxForms('LE123')->toArray();

        $this->assertSame(['uS1099k' => true], $result);
    }

    public static function successTaxConsentProvider(): array
    {
        return [['tests/Resources/LegalEntityManagement/tax-consent-success.json', 200]];
    }

    public function testSetConsentStatusSuccessWithArray(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(null, 204, $container);
        $service = new TaxEDeliveryConsentApi($this->createConfiguration(), $client);
        $params = ['uS1099k' => true];

        [$result, $status, $headers] = $service->setConsentStatusForElectronicDeliveryOfTaxFormsWithHttpInfo(
            'LE123',
            new SetTaxElectronicDeliveryConsentRequest($params)
        );

        $this->assertNull($result);
        $this->assertSame(204, $status);
        $this->assertIsArray($headers);
        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame(
            'https://kyc-test.adyen.com/lem/v4/legalEntities/LE123/setTaxElectronicDeliveryConsent',
            (string) $request->getUri()
        );
        $this->assertJsonStringEqualsJsonString('{"US1099k":true}', (string) $request->getBody());
    }

    public function testCheckStatusOfConsentWithHttpInfo(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/tax-consent-success.json',
            200
        );
        $service = new TaxEDeliveryConsentApi($this->createConfiguration(), $client);

        [$result, $status, $headers] = $service
            ->checkStatusOfConsentForElectronicDeliveryOfTaxFormsWithHttpInfo('LE123');

        $this->assertInstanceOf(CheckTaxElectronicDeliveryConsentResponse::class, $result);
        $this->assertTrue($result->getUS1099k());
        $this->assertSame(200, $status);
        $this->assertIsArray($headers);
    }

    public function testCheckStatusOfConsentOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new TaxEDeliveryConsentApi($this->createConfiguration(), $client);

        try {
            $service->checkStatusOfConsentForElectronicDeliveryOfTaxForms('LE123');
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }

    public function testCheckStatusOfConsentAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new TaxEDeliveryConsentApi($this->createConfiguration(), $client);

        try {
            $service->checkStatusOfConsentForElectronicDeliveryOfTaxFormsAsync('LE123')->wait();
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }
}
