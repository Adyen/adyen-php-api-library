<?php
/**
 * Created by PhpStorm.
 * User: rikt
 * Date: 11/6/15
 * Time: 2:53 PM
 */

namespace Adyen;


use Adyen\Util\Util;

class DirectoryLookupTest extends TestCase
{

    public function testDirectoryLookup()
    {
	    $this->_needSkinCode();
        // initialize client
        $client = $this->createClient();

        // initialize service
        $service = new Service\DirectoryLookup($client);
        $sessionValidity = date(
            DATE_ATOM,
            mktime(date("H") + 10, date("i"), date("s"), date("m"), date("j"), date("Y"))
        );

        $json = '{
              "paymentAmount": "1000",
              "currencyCode": "EUR",
              "merchantReference": "Get Payment methods",
              "skinCode":  "' . $this->_skinCode .'",
              "merchantAccount": "' . $this->_merchantAccount .'",
              "sessionValidity": "'.$sessionValidity.'",
              "countryCode": "NL",
              "shopperLocale": "nl_NL"
            }';


        // calculate string
        $params = json_decode($json, true);

        // calculate the signature
        $hmacKey = $this->_hmacSignature;

        // add signature in request
        $params["merchantSig"] = Util::calculateSha256Signature($hmacKey, $params);

        // convert the result into an array
        $result = $service->directoryLookup($params);

        // needs to have an array with the result
        $this->assertInternalType('array',$result);

        // needs to have Ideal in result because country is netherlands
        $hasIdeal = false;
        foreach($result['paymentMethods'] as $paymentMethod) {
            if($paymentMethod['brandCode'] == 'ideal') {
                $hasIdeal = true;
            }
        }

        $this->assertEquals(true, $hasIdeal);
    }

    public function testDirectoryLookupEmptyParameters()
    {
        // initialize client
        $client = $this->createClient();

        // initialize service
        $service = new Service\DirectoryLookup($client);

	    $e = null;
        try {
            $result = $service->directoryLookup("");
        } catch (\Exception $e) {
        }

        $this->assertEquals('Adyen\AdyenException', get_class($e));
        $this->assertEquals("The parameters in the request are empty", $e->getMessage());
        $this->assertEquals('0', $e->getCode());

    }

    public function testDirectoryLookupFailed()
    {
	    $this->_needSkinCode();
        // initialize client
        $client = $this->createClient();

        // initialize service
        $service = new Service\DirectoryLookup($client);

        $sessionValidity = date(
            DATE_ATOM,
            mktime(date("H") + 10, date("i"), date("s"), date("m"), date("j"), date("Y"))
        );

        $json = '{
              "paymentAmount": "1000",
              "currencyCode": "EUR",
              "merchantReference": "Get Payment methods",
              "skinCode":  "' . $this->_skinCode .'",
              "merchantAccount": "A MERCHANT ACCOUNT THAT DOES NOT EXISTS",
              "sessionValidity": "'.$sessionValidity.'",
              "countryCode": "NL",
              "shopperLocale": "nl_NL",
              "merchantSig": "INVALID MERCHANT SIG"
            }';

        // convert the result into an array
        $params = json_decode($json, true);

        $e = null;
        try {
            $result = $service->directoryLookup($params);
        } catch (\Exception $e) {
        }

        $this->assertEquals('Adyen\AdyenException', get_class($e));
        $this->assertEquals("The result is empty, looks like your request is invalid", $e->getMessage());
        $this->assertEquals('0', $e->getCode());
    }
}
