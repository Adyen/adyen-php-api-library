<?php
/**
 * Created by PhpStorm.
 * User: rikt
 * Date: 11/18/15
 * Time: 12:01 PM
 */

namespace Adyen;

class ExceptionTest extends \Adyen\TestCase
{
    public function testExceptionMissingEnvironmentValue()
    {
        $client = new \Adyen\Client();
        $client->setApplicationName("My Test Application");
        $client->setUsername('username');
        $client->setPassword('password');
        // do not set environment to test exception


        try {
            $service = new Service\Recurring($client);
        } catch (\Exception $e) {
        }

        // should have environment exception
        $this->assertEquals('Adyen\AdyenException', get_class($e));
        $this->assertEquals('The Client does not have a correct environment, use test or live', $e->getMessage());
    }

    public function testExceptionMisspelledContractParameterValue()
    {

        // initialize client
        $client = $this->createClient();

        // initialize service
        $service = new Service\Recurring($client);

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
        $this->assertEquals('Adyen\AdyenException', get_class($e));
        $this->assertEquals('Invalid contract', $e->getMessage());
        $this->assertEquals('802', $e->getCode());
    }

    public function testExceptionMissingUsernamePassword()
    {
        // initialize client
        $client = new \Adyen\Client();
        $client->setApplicationName("Adyen PHP Api Library");
        $client->setUsername("");
        $client->setPassword("");
        $client->setEnvironment(\Adyen\Environment::TEST);

        // initialize service
        $service = new Service\Recurring($client);

        // in a model form ?
        $recurring = array('contract' => \Adyen\Contract::RECURRING);
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
        $this->assertEquals('Adyen\AdyenException', get_class($e));
        $this->assertEquals("HTTP Status Response - Unauthorized", $e->getMessage());
        $this->assertEquals('0', $e->getCode());
        $this->assertEquals('401', $e->getStatus());
    }
}
