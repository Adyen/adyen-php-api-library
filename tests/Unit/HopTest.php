<?php

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Service\Hop;

class HopTest extends TestCaseMock
{
    const SUCCESS_RESULT_CODE = 'Success';
    const FAILED_RESULT_CODE = 'Failed';

    /**
     * @dataProvider successUrlProvider
     */
    public function testGetOnboardingUrlSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new Hop($client);

        $params = ['accountHolderCode' => 'YourAccountHolderCode'];
        $result = $service->getOnboardingUrl($params);

        $this->assertSuccess($result);
    }

    public function testGetOnboardingUrlInvalidReturnUrl()
    {
        $client = $this->createMockClient(
            'tests/Resources/Hop/invalid-return-url.json',
            200
        );

        $service = new Hop($client);

        $params = [
            'accountHolderCode' => 'YourAccountHolderCode',
            'returnUrl' => 'badUrl',
        ];

        $result = $service->getOnboardingUrl($params);

        $this->assertInvalidUrl($result);
    }

    /**
     * @dataProvider failureUrlProvider
     */
    public function testGetOnboardingUrlFailure($jsonFile, $httpStatus, $expectedExceptionMessage)
    {
        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new Hop($client);

        $params = [
            'accountHolderCod' => "YourAccountHolderCode",
        ];

        $service->getOnboardingUrl($params);
    }

    /**
     * @dataProvider successUrlProvider
     */
    public function testGetPciQuestionnaireUrlSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new Hop($client);

        $params = ['accountHolderCode' => 'YourAccountHolderCode'];
        $result = $service->getPciQuestionnaireUrl($params);

        $this->assertSuccess($result);
    }

    public function testGetPciQuestionnaireUrlInvalidReturnUrl()
    {
        $client = $this->createMockClient(
            'tests/Resources/Hop/invalid-return-url.json',
            200
        );

        $service = new Hop($client);

        $params = [
            'accountHolderCode' => 'YourAccountHolderCode',
            'returnUrl' => 'myUrl',
        ];

        $result = $service->getPciQuestionnaireUrl($params);

        $this->assertInvalidUrl($result);
    }

    /**
     * @dataProvider failureUrlProvider
     */
    public function testGetPciQuestionnaireUrlFailure($jsonFile, $httpStatus, $expectedExceptionMessage)
    {
        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new Hop($client);

        $params = [
            'acountHolderCode' => "YourAccountHolderCode",
        ];

        $service->getPciQuestionnaireUrl($params);
    }

    public static function successUrlProvider()
    {
        return [['tests/Resources/Hop/url-success.json', 200]];
    }

    public static function failureUrlProvider()
    {
        return [
            ['tests/Resources/Hop/url-failure.json', 500, "Required field 'accountHolderCode' is null"]
        ];
    }

    private function assertInvalidUrl(array $result)
    {
        $this->assertArrayHasKey('invalidFields', $result);
        $this->assertArrayHasKey('pspReference', $result);
        $this->assertArrayHasKey('resultCode', $result);

        $this->assertNotEmpty($result['invalidFields']);
        $this->assertEquals(current($result['invalidFields']), $this->getInvalidFieldResponse());
        $this->assertEquals(self::FAILED_RESULT_CODE, $result['resultCode']);
    }

    private function assertSuccess(array $result)
    {
        $this->assertArrayHasKey('invalidFields', $result);
        $this->assertArrayHasKey('pspReference', $result);
        $this->assertArrayHasKey('resultCode', $result);
        $this->assertArrayHasKey('redirectUrl', $result);

        $this->assertEmpty($result['invalidFields']);
        $this->assertNotEmpty($result['pspReference']);
        $this->assertEquals(self::SUCCESS_RESULT_CODE, $result['resultCode']);
        $this->assertNotEmpty($result['redirectUrl']);
    }

    private function getInvalidFieldResponse()
    {
        return [
            "errorCode" => 91,
            "errorDescription" => "The return url specified is invalid",
            "fieldType" => [
                "field" => "returnUrl",
                "fieldName" => "returnUrl"
            ]
        ];
    }
}
