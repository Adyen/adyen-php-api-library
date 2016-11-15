<?php

namespace Adyen;

/**
 * Created by PhpStorm.
 * User: SwiTool
 * Date: 11/15/16
 * Time: 2:05 PM
 */
class CreatePayoutRequestTest extends TestCase
{

    public function testCreatePaymentSuccess()
    {
        // initialize client
        $client = $this->createClient();

        // initialize service
        $service = new Service\Payout($client);

        $json = '{
              "card": {
                "number": "4111111111111111",
                "expiryMonth": "08",
                "expiryYear": "2018",
                "cvc": "737",
                "holderName": "John Smith"
              },
              "amount": {
                "value": 1500,
                "currency": "EUR"
              },
              "reference": "payout-test",
              "recurring": {
                "contract": "PAYOUT"
              },
              "shopperEmail": "john.smith@test.com",
              "shopperReference": "johnsmithuniqueid",
              "merchantAccount": "' . $this->_merchantAccount .'"
            }';

        $params = json_decode($json, true);

        try {
            $result = $service->storeDetailsAndSubmit($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // must exists
        $this->assertTrue(isset($result['resultCode']));

        // Assert
        $this->assertEquals('payout-submit-received', $result['resultCode']);

        // return the result so this can be used in other test cases
        return $result;

    }

}
