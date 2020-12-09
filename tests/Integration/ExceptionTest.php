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

namespace Adyen\Tests\Integration;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Contract;
use Adyen\Environment;
use Adyen\Service\Recurring;
use Adyen\Tests\TestCase;

class ExceptionTest extends TestCase
{
    public function testExceptionMissingEnvironmentValue()
    {
        $client = new Client();
        $client->setApplicationName("My Test Application");
        $client->setUsername('username');
        $client->setPassword('password');
        // do not set environment to test exception


        try {
            $service = new Recurring($client);
        } catch (\Exception $e) {
        }

        // should have environment exception
        $this->assertEquals(AdyenException::class, get_class($e));
        $this->assertEquals('The Client does not have a correct environment, use test or live', $e->getMessage());
    }

    public function testExceptionMisspelledContractParameterValue()
    {

        // initialize client
        $client = $this->createClient();

        // initialize service
        $service = new Recurring($client);

        $recurring = array('contract' => "WRONG PARAMETER");
        $params = array(
            'merchantAccount' => $this->getMerchantAccount(),
            'recurring' => $recurring,
            'shopperReference' => '1'
        );

        try {
            $result = $service->listRecurringDetails($params);
        } catch (\Exception $e) {
        }

        // check if exception is correct
        $this->assertEquals(AdyenException::class, get_class($e));
        $this->assertEquals('Invalid contract', $e->getMessage());
        $this->assertEquals('422', $e->getCode());
    }

    public function testExceptionMissingUsernamePassword()
    {
        // initialize client
        $client = new Client();
        $client->setApplicationName("Adyen PHP Api Library");
        $client->setUsername("");
        $client->setPassword("");
        $client->setEnvironment(Environment::TEST);

        // initialize service
        $service = new Recurring($client);

        // in a model form ?
        $recurring = array('contract' => Contract::RECURRING);
        $params = array(
            'merchantAccount' => $this->getMerchantAccount(),
            'recurring' => $recurring,
            'shopperReference' => '1'
        );

        $e = null;
        try {
            $result = $service->listRecurringDetails($params);
        } catch (\Exception $e) {
        }

        // check if exception is correct
        $this->assertEquals(AdyenException::class, get_class($e));
        $this->assertEquals("HTTP Status Response - Unauthorized", $e->getMessage());
        $this->assertEquals('401', $e->getCode());
        $this->assertEquals('401', $e->getStatus());
    }
}
