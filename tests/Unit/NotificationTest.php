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

namespace Adyen\Unit;

class NotificationTest extends TestCaseMock
{
    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successNotificationCreateProvider
     * @throws \Adyen\AdyenException
     */
    public function testNotificationCreateSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Notification($client);

        $params = json_decode(
            '
            {
              "configurationDetails": {
                "active": "true",
                "description": "Test notification769551",
                "eventConfigs": [
                  {
                    "NotificationEventConfiguration": {
                      "eventType": "ACCOUNT_HOLDER_VERIFICATION",
                      "includeMode": "INCLUDE"
                    }
                  }
                ],
                "messageFormat": "SOAP",
                "notifyURL": "https://www.merchant-domain.com/notification-handler",
                "notifyUsername": "testUserName",
                "notifyPassword": "testPassword",
                "sendActionHeader": "true",
                "sslProtocol": "SSL"
              }
            }',
            true
        );

        $result = $service->createNotificationConfiguration($params);

        $this->assertContains($result['configurationDetails']['active'], array(true));
    }

    public static function successNotificationCreateProvider()
    {
        return array(
            array('tests/Resources/Notification/create-success.json', 200),
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successNotificationGetlistProvider
     * @throws \Adyen\AdyenException
     */
    public function testNotificationGetlistSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Notification($client);

        $params = json_decode(
            '
            {
              "configurationDetails": {
            
              }
            }',
            true
        );
        $result = $service->getNotificationConfigurationList($params);

        $this->assertContains($result['configurations'][0]['NotificationConfigurationDetails']['active'], array(true));
    }

    public static function successNotificationGetlistProvider()
    {
        return array(
            array('tests/Resources/Notification/getlist-success.json', 200),
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successNotificationGetProvider
     * @throws \Adyen\AdyenException
     */
    public function testNotificationGetSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Notification($client);

        $params = json_decode(
            '
            {
              "notificationId": 15007
            }',
            true
        );
        $result = $service->getNotificationConfiguration($params);

        $this->assertContains($result['configurationDetails']['notificationId'], array(15007));
    }

    public static function successNotificationGetProvider()
    {
        return array(
            array('tests/Resources/Notification/get-success.json', 200),
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successNotificationUpdateProvider
     * @throws \Adyen\AdyenException
     */
    public function testNotificationUpdateSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Notification($client);

        $params = json_decode(
            '
            {
              "configurationDetails": {
                "active": "false",
                "description": "new yolo 1",
                "eventConfigs": [
                  {
                    "NotificationEventConfiguration": {
                      "eventType": "ACCOUNT_HOLDER_CREATED",
                      "includeMode": "EXCLUDE"
                    }
                  },
                  {
                    "NotificationEventConfiguration": {
                      "eventType": "ACCOUNT_CREATED",
                      "includeMode": "INCLUDE"
                    }
                  }
                ],
                "notificationId": 15007,
                "notifyPassword": "testPassword2",
                "notifyURL": "http://www.adyen.com",
                "notifyUsername": "testUserName2",
                "sendActionHeader": "false",
                "sslProtocol": "TLSv10"
              }
            }',
            true
        );
        $result = $service->updateNotificationConfiguration($params);

        $this->assertContains($result['configurationDetails']['notificationId'], array(15007));
    }

    public static function successNotificationUpdateProvider()
    {
        return array(
            array('tests/Resources/Notification/update-success.json', 200),
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successNotificationDeleteProvider
     * @throws \Adyen\AdyenException
     */
    public function testNotificationDeleteSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Notification($client);

        $params = json_decode(
            '
            {
              "notificationIds": [
                15007,
                15008
              ]
            }',
            true
        );
        $result = $service->deleteNotificationConfigurations($params);

        $this->assertContains($result['pspReference'], array('8815324250627802'));
    }

    public static function successNotificationDeleteProvider()
    {
        return array(
            array('tests/Resources/Notification/delete-success.json', 200),
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successNotificationTestProvider
     * @throws \Adyen\AdyenException
     */
    public function testNotificationTestSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Notification($client);

        $params = json_decode(
            '
            {
              "eventTypes": [],
              "notificationId": 15009
            }',
            true
        );
        $result = $service->updateNotificationConfiguration($params);

        $this->assertContains($result['eventTypes'][0], array('ACCOUNT_HOLDER_VERIFICATION'));
    }

    /**
     * @return array
     */
    public static function successNotificationTestProvider()
    {
        return array(
            array('tests/Resources/Notification/test-success.json', 200),
        );
    }
}
