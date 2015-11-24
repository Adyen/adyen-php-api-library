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

        // initialize client
        $client = $this->createClient();
//        $logger = $client->getLogger();

//        $logger->log(
//            'info',
//            'OAuth2 access token refresh with Signed JWT assertion grants.'
//        );

        // intialize service
        $service = new Service\DirectoryLookup($client);


        date_default_timezone_set('UTC');

        $sessionValidity = date(
            DATE_ATOM,
            mktime(date("H") + 10, date("i"), date("s"), date("m"), date("j"), date("Y"))
        );

        // [sessionValidity] => 2015-11-06T15:13:11+00:00

        //CNY retrieves Ideal as well should not be

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
}
