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
 * Copyright (c) 2021 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\ConnectionException;
use Adyen\Service\Payment;
use Monolog\Handler\TestHandler;
use Monolog\Logger;

class RecurringTest extends TestCaseMock
{
    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider notifyShopperDataProvider
     * @throws \Adyen\AdyenException
     */
    public function testNotifyShopperSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $service = new \Adyen\Service\Recurring($client);

        $params = json_decode(
            '{
            "merchantAccount": "YOUR_MERCHANT_ACCOUNT",
	        "storedPaymentMethodId": "8415995487234100",
	        "shopperReference": "YOUR_SHOPPER_REFERENCE",
	        "amount": {
		        "currency": "INR",
		        "value": 1000
	        },
	        "billingDate": "2021-03-16",
	        "reference": "Example reference",
	        "displayedReference": "Example displayed reference"
            }',
            true
        );
        $result = $service->notifyShopper($params);
        $this->assertEquals($result['displayedReference'], 'Example displayed reference');
        $this->assertEquals($result['message'], 'Request processed successfully');
        $this->assertEquals($result['pspReference'], '8516167336214570');
        $this->assertEquals($result['resultCode'], 'Success');
        $this->assertEquals($result['shopperNotificationReference'], 'IA0F7500002462');
    }

    public static function notifyShopperDataProvider()
    {
        return array(
            array('tests/Resources/Recurring/notifyShopper-success.json', 200)
        );
    }
}
