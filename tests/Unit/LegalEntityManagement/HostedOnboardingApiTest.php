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
use Adyen\Model\LegalEntityManagement\OnboardingLink;
use Adyen\Model\LegalEntityManagement\OnboardingLinkInfo;
use Adyen\Service\LegalEntityManagement\HostedOnboardingApi;
use Adyen\Tests\Unit\BaseTest;

class HostedOnboardingApiTest extends BaseTest
{
    public function testGetLinkToAdyenhostedOnboardingPageSendsExpectedUrlOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/onboarding-link-success.json',
            200,
            $container
        );
        $service = new HostedOnboardingApi($this->createConfiguration(), $client);

        $service->getLinkToAdyenhostedOnboardingPage('LE123', new OnboardingLinkInfo());

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame(
            'https://kyc-test.adyen.com/lem/v4/legalEntities/LE123/onboardingLinks',
            (string) $request->getUri()
        );
    }

    public function testGetLinkToAdyenhostedOnboardingPageSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/onboarding-link-success.json',
            200,
            $container
        );
        $service = new HostedOnboardingApi($this->createLiveConfiguration(), $client);

        $service->getLinkToAdyenhostedOnboardingPage('LE123', new OnboardingLinkInfo());

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame(
            'https://kyc-live.adyen.com/lem/v4/legalEntities/LE123/onboardingLinks',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successOnboardingLinkProvider
     */
    public function testGetLinkToAdyenhostedOnboardingPageSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new HostedOnboardingApi($this->createConfiguration(), $client);
        $info = new OnboardingLinkInfo();
        $info->setLocale('en-US')->setRedirectUrl('https://merchant.example.com/return');

        $result = $service->getLinkToAdyenhostedOnboardingPage('LE123', $info);

        $this->assertInstanceOf(OnboardingLink::class, $result);
        $this->assertSame('https://onboarding.example.com/session', $result->getUrl());
        $this->assertJsonStringEqualsJsonString(
            '{"locale":"en-US","redirectUrl":"https://merchant.example.com/return"}',
            (string) $container[0]['request']->getBody()
        );
    }

    /**
     * @dataProvider successOnboardingLinkProvider
     */
    public function testGetLinkToAdyenhostedOnboardingPageSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new HostedOnboardingApi($this->createConfiguration(), $client);
        $params = ['locale' => 'en-US', 'redirectUrl' => 'https://merchant.example.com/return'];

        $result = $service->getLinkToAdyenhostedOnboardingPage('LE123', new OnboardingLinkInfo($params));

        $this->assertSame('https://onboarding.example.com/session', $result['url']);
    }

    /**
     * @dataProvider successOnboardingLinkProvider
     */
    public function testGetLinkToAdyenhostedOnboardingPageSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new HostedOnboardingApi($this->createConfiguration(), $client);

        $result = $service->getLinkToAdyenhostedOnboardingPage('LE123', new OnboardingLinkInfo())->toArray();

        $this->assertSame(['url' => 'https://onboarding.example.com/session'], $result);
    }

    public static function successOnboardingLinkProvider(): array
    {
        return [['tests/Resources/LegalEntityManagement/onboarding-link-success.json', 200]];
    }

    public function testGetLinkToAdyenhostedOnboardingPageWithHttpInfo(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/LegalEntityManagement/onboarding-link-success.json',
            200
        );
        $service = new HostedOnboardingApi($this->createConfiguration(), $client);

        [$result, $status, $headers] = $service->getLinkToAdyenhostedOnboardingPageWithHttpInfo(
            'LE123',
            new OnboardingLinkInfo()
        );

        $this->assertInstanceOf(OnboardingLink::class, $result);
        $this->assertSame('https://onboarding.example.com/session', $result->getUrl());
        $this->assertSame(200, $status);
        $this->assertIsArray($headers);
    }

    public function testGetLinkToAdyenhostedOnboardingPageOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new HostedOnboardingApi($this->createConfiguration(), $client);

        try {
            $service->getLinkToAdyenhostedOnboardingPage('LE123', new OnboardingLinkInfo());
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }

    public function testGetLinkToAdyenhostedOnboardingPageAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/LegalEntityManagement/forbidden.json', 403);
        $service = new HostedOnboardingApi($this->createConfiguration(), $client);

        try {
            $service->getLinkToAdyenhostedOnboardingPageAsync('LE123', new OnboardingLinkInfo())->wait();
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden: Insufficient permissions', $exception->getMessage());
            $this->assertNotNull($exception->getError());
            $this->assertSame('010', $exception->getError()->getErrorCode());
        }
    }
}
