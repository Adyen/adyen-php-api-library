<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\Payments\AdjustAuthorisationRequest;
use Adyen\Model\Payments\CancelRequest;
use Adyen\Model\Payments\PaymentRequest;
use Adyen\Model\Payments\PaymentRequest3d;
use Adyen\Model\Payments\PaymentRequest3ds2;
use Adyen\Service\Payments\ModificationsApi;
use Adyen\Service\Payments\PaymentsApi;

class ModelBasedPaymentsTest extends TestCaseMock
{
    /**
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseSuccess($jsonFile, $httpStatus)
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new PaymentsApi($client);

        $result = $service->authorise(new PaymentRequest());

        $this->assertArrayHasKey('resultCode', (array)$result->jsonSerialize());
        $this->assertEquals('AuthenticationFinished', $result->getResultCode());
        $this->assertEquals('string', $result->getAuthCode());
    }

    public static function successAuthoriseProvider()
    {
        return array(
            array('tests/Resources/ModelBasedPayments/authorise-success.json', 200),
        );
    }

    /**
     * @dataProvider successAuthoriseProvider3d
     */
    public function testAuthorise3dSuccess($jsonFile, $httpStatus)
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new PaymentsApi($client);

        $result = $service->authorise3d(new PaymentRequest3d());

        $this->assertArrayHasKey('resultCode', (array)$result->jsonSerialize());
        $this->assertEquals('AuthenticationFinished', $result->getResultCode());
    }

    public static function successAuthoriseProvider3d()
    {
        return array(
            array('tests/Resources/ModelBasedPayments/authorise3d-success.json', 200),
        );
    }

    /**
     * @dataProvider successAuthoriseProvider3ds2
     */
    public function testAuthorise3ds2Success($jsonFile, $httpStatus)
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new PaymentsApi($client);

        $result = $service->authorise3ds2(new PaymentRequest3ds2());

        $this->assertArrayHasKey('resultCode', (array)$result->jsonSerialize());
        $this->assertEquals('AuthenticationFinished', $result->getResultCode());
    }

    public static function successAuthoriseProvider3ds2()
    {
        return array(
            array('tests/Resources/ModelBasedPayments/authorise3ds2-success.json', 200),
        );
    }

    public function testAdjustAuthorisation()
    {
        // create client
        $client = $this->createMockClient('tests/Resources/ModelBasedPayments/adjust-auth.json', 200);

        // initialize service
        $service = new ModificationsApi($client);

        $result = $service->adjustAuthorisation(new AdjustAuthorisationRequest());

        $this->assertArrayHasKey('pspReference', (array)$result->jsonSerialize());
        $this->assertEquals('[adjustAuthorisation-received]', $result->getResponse());
    }

    public function testCancel()
    {
        // create client
        $client = $this->createMockClient('tests/Resources/ModelBasedPayments/cancel.json', 200);

        // initialize service
        $service = new ModificationsApi($client);

        $result = $service->cancel(new CancelRequest());

        $this->assertArrayHasKey('additionalData', (array)$result->jsonSerialize());
        $this->assertEquals('[capture-received]', $result->getResponse());
    }
}
