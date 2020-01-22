<?php

namespace Adyen;

/**
 * Created by PhpStorm.
 * User: rikt
 * Date: 11/3/15
 * Time: 10:27 AM
 */
class CreatePaymentRequestTest extends TestCase
{
    public function testCreatePaymentSuccess()
    {
        // initialize client
        $client = $this->createClient();

        // initialize service
        $service = new Service\Payment($client);

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
              "reference": "payment-test",
              "merchantAccount": "' . $this->merchantAccount .'"
            }';

        $params = json_decode($json, true);

        try {
            $result = $service->authorise($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // must exists
        $this->assertTrue(isset($result['resultCode']));

        // Assert
        $this->assertEquals('Authorised', $result['resultCode']);

        // return the result so this can be used in other test cases
        return $result;
    }

    public function testCreatePaymentWithRecurringSuccess()
    {
        // initialize client
        $client = $this->createClient();

        // initialize service
        $service = new Service\Payment($client);

        $json = '{
              "amount": {
                "currency": "EUR",
                "value": "1500"
              },
              "card": {
                "cvc": "737",
                "expiryMonth": "08",
                "expiryYear": "2018",
                "holderName": "John Smith",
                "number": "4111111111111111"
              },
              "merchantAccount": "' . $this->merchantAccount .'",
              "recurring": {
                "contract": "' . \Adyen\Contract::RECURRING . '",
                "recurringDetailName": "1"
              },
              "reference": "payment-test",
              "shopperEmail": "test@test.nl",
              "shopperReference": "1"
            }';

        $params = json_decode($json, true);


        try {
            $result = $service->authorise($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // must exists
        $this->assertTrue(isset($result['resultCode']));

        // Assert
        $this->assertEquals('Authorised', $result['resultCode']);

        // return the result so this can be used in other test cases
        return $result;
    }

    public function testCreatePaymentSuccessWithMerchantAccountInClient()
    {
        // initialize client
        $client = $this->createClientWithMerchantAccount();

        // initialize service
        $service = new Service\Payment($client);

        $json = '{
              "card": {
                "number": "4111111111111111",
                "expiryMonth": "08",
                "expiryYear": "2018",
                "cvc": "737",
                "holderName": "John Smith"
              },
              "amount": {
                "value": 3000,
                "currency": "EUR"
              },
              "reference": "payment-test"
            }';

        $params = json_decode($json, true);

        try {
            $result = $service->authorise($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // must exists
        $this->assertTrue(isset($result['resultCode']));

        // Assert
        $this->assertEquals('Authorised', $result['resultCode']);

        // return the result so this can be used in other test cases
        return $result;
    }

    public function testCreatePaymentSuccessJson()
    {
        // initialize client
        $client = $this->createClient();
        $client->setInputType('json');
        $client->setOutputType('json');

        // validate if types are set
        $this->assertEquals('json', $client->getConfig()->getInputType());
        $this->assertEquals('json', $client->getConfig()->getOutputType());

        // initialize service
        $service = new Service\Payment($client);

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
              "reference": "payment-test",
              "merchantAccount": "' . $this->merchantAccount .'"
            }';


        try {
            $result = $service->authorise($json);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // validate if json
        $this->isJson($result);

        // return into array
        $result = json_decode($result, true);

        // must exists
        $this->assertTrue(isset($result['resultCode']));

        // Assert
        $this->assertEquals('Authorised', $result['resultCode']);

        // return the result so this can be used in other test cases
        return $result;
    }

    public function testCreatePaymentWrongCvc()
    {

        // initialize client
        $client = $this->createClient();

        // initialize service
        $service = new Service\Payment($client);

        $json = '{
              "card": {
                "number": "4111111111111111",
                "expiryMonth": "08",
                "expiryYear": "2018",
                "cvc": "111",
                "holderName": "John Smith"
              },
              "amount": {
                "value": 1500,
                "currency": "EUR"
              },
              "reference": "payment-test",
              "merchantAccount": "' . $this->merchantAccount .'"
            }';

        $params = json_decode($json, true);

        try {
            $result = $service->authorise($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // Assert
        $this->assertEquals('Refused', $result['resultCode']);
        $this->assertEquals('CVC Declined', $result['refusalReason']);
    }
}
