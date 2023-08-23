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
        $this->assertEquals('Example displayed reference', $result['displayedReference']);
        $this->assertEquals('Request processed successfully', $result['message']);
        $this->assertEquals('8516167336214570', $result['pspReference']);
        $this->assertEquals('Success', $result['resultCode']);
        $this->assertEquals('IA0F7500002462', $result['shopperNotificationReference']);
    }

    public static function notifyShopperDataProvider()
    {
        return array(
            array('tests/Resources/Recurring/notifyShopper-success.json', 200)
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider scheduleAccountUpdaterDataProvider
     * @throws \Adyen\AdyenException
     */
    public function testScheduleAccountUpdaterSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $service = new \Adyen\Service\Recurring($client);

        $params = json_decode(
            '{
              "merchantAccount": "YOUR_MERCHANT_ACCOUNT",
              "reference": "YOUR_REFERENCE",
              "card": {
                "expiryMonth": "03",
                "expiryYear": "2030",
                "holderName": "Adyen Test",
                "number": "4111111111111111"
              }
            }',
            true
        );

        $result = $service->scheduleAccountUpdater($params);
        $this->assertEquals('8516167336214570', $result['pspReference']);
        $this->assertEquals('Success', $result['result']);
    }

    public static function scheduleAccountUpdaterDataProvider()
    {
        return array(
            array('tests/Resources/Recurring/scheduleAccountUpdater-success.json', 200)
        );
    }
}
