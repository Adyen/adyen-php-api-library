<?php
/**
 * Created by PhpStorm.
 * User: rikt
 * Date: 11/18/15
 * Time: 12:01 PM
 */

namespace Adyen;


class ExceptionTest extends TestCase
{

    public function testExceptionMisspelledContractParameterValue()
    {

        // initialize client
        $client = $this->createClient();

        // intialize service
        $service = new Service\Recurring($client);

        $recurring = array('contract' => "WRONG PARAMETER");
        $params = array('merchantAccount' => $this->getMerchantAccount(), 'recurring' => $recurring, 'shopperReference' => '1');

        try {
            $result = $service->listRecurringDetails($params);
        } catch (\Exception $e){
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
        $client->setModus("test");

        // intialize service
        $service = new Service\Recurring($client);

        // in a model form ?
        $recurring = array('contract' => "RECURRING");
        $params = array('merchantAccount' => $this->getMerchantAccount(), 'recurring' => $recurring, 'shopperReference' => '1');

        $e = null;
        try {
            $result = $service->listRecurringDetails($params);
        } catch (\Exception $e){

        }

        // check if exception is correct
        $this->assertEquals('Adyen\AdyenException', get_class($e));
        $this->assertEquals("Probably your Web Service username and/or password is incorrect\n(Network error [errno 0]: )", $e->getMessage());
        $this->assertEquals('0', $e->getCode());
    }
}
