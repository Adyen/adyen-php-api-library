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

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\ConnectionException;
use Adyen\Model\Payments\PaymentRequest;
use Adyen\Model\Payments\PaymentRequest3d;
use Adyen\Model\Payments\PaymentRequest3ds2;
use Adyen\Service\Payments\GeneralApi;
use Monolog\Handler\TestHandler;
use Monolog\Logger;

class ModelBasedPaymentsTest extends TestCaseMock
{
    /**
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseSuccess($jsonFile, $httpStatus)
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $handler = new TestHandler();

        $logger = new Logger('test', array($handler));

        // Stub Logger to prevent full card data being logged
        $client->setLogger($logger);

        // initialize service
        $service = new GeneralApi($client);

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

        $handler = new TestHandler();

        $logger = new Logger('test', array($handler));

        // Stub Logger to prevent full card data being logged
        $client->setLogger($logger);

        // initialize service
        $service = new GeneralApi($client);

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

        $handler = new TestHandler();

        $logger = new Logger('test', array($handler));

        // Stub Logger to prevent full card data being logged
        $client->setLogger($logger);

        // initialize service
        $service = new GeneralApi($client);

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

}
