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

namespace Adyen\Tests\Unit;

use Adyen\Model\AcsWebhooks\AuthenticationNotificationRequest;
use Adyen\Model\BalancePlatform\Balance;
use Adyen\Model\ConfigurationWebhooks\BalanceAccountNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\SweepConfigurationNotificationRequest;
use Adyen\Service\BankingWebhookParser;
use Adyen\Service\Notification;

class NotificationTest extends TestCaseMock
{
    /**
     * @dataProvider successNotificationCreateProvider
     */
    public function testNotificationCreateSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Notification($client);

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

        $this->assertEquals('true', $result['configurationDetails']['active']);
    }

    public static function successNotificationCreateProvider()
    {
        return array(
            array('tests/Resources/Notification/create-success.json', 200),
        );
    }

    /**
     * @dataProvider successNotificationGetlistProvider
     */
    public function testNotificationGetlistSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Notification($client);

        $params = json_decode(
            '
            {
              "configurationDetails": {
            
              }
            }',
            true
        );
        $result = $service->getNotificationConfigurationList($params);

        $this->assertEquals('true', $result['configurations'][0]['NotificationConfigurationDetails']['active']);
    }

    public static function successNotificationGetlistProvider()
    {
        return array(
            array('tests/Resources/Notification/getlist-success.json', 200),
        );
    }

    /**
     * @dataProvider successNotificationGetProvider
     */
    public function testNotificationGetSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Notification($client);

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
     * @dataProvider successNotificationUpdateProvider
     */
    public function testNotificationUpdateSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Notification($client);

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
     * @dataProvider successNotificationDeleteProvider
     */
    public function testNotificationDeleteSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Notification($client);

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
     * @dataProvider successNotificationTestProvider
     */
    public function testNotificationTestSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Notification($client);

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

    public function testBankingWebhookParser()
    {
        $jsonString = '{ "data": {"balancePlatform":"YOUR_BALANCE_PLATFORM","accountHolder":{"contactDetails":{"address":{"country":"NL","houseNumberOrName":"274","postalCode":"1020CD","street":"Brannan Street"},"email": "s.hopper@example.com","phone": {"number": "+315551231234","type": "Mobile"}},"description": "S.Hopper - Staff 123","id": "AH00000000000000000000001","status": "Active"}},"environment": "test","type": "balancePlatform.accountHolder.created"}';
        $webhookParser = new BankingWebhookParser($jsonString);
        $result = $webhookParser->getAccountHolderNotificationRequest();
        self::assertEquals("test", $result->getEnvironment());
    }

    public function testBankingWebhookParserBalanceAccount()
    {
        $jsonString = '{"data":{"balancePlatform":"Integration_tools_test","accountId":"BA32272223222H5HVKTBK4MLB","sweep":{"id":"SWPC42272223222H5HVKV6H8C64DP5","schedule":{"type":"balance"},"status":"active","targetAmount":{"currency":"EUR","value":0},"triggerAmount":{"currency":"EUR","value":0},"type":"pull","counterparty":{"balanceAccountId":"BA3227C223222H5HVKT3H9WLC"},"currency":"EUR"}},"environment":"test","type":"balancePlatform.balanceAccountSweep.updated"}';
        $webhookParser = new BankingWebhookParser($jsonString);
        $result = $webhookParser->getGenericWebhook();
        self::assertEquals(SweepConfigurationNotificationRequest::class, get_class($result));
        self::assertEquals("test", $result->getEnvironment());
    }

    public function testBankingWebhookParserAuthenticationRequest()
    {
        $jsonString = '{
          "data": {
            "authentication": {
              "acsTransId": "6a4c1709-a42e-4c7f-96c7-1043adacfc97",
              "challenge": {
                "flow": "OOB",
                "lastInteraction": "2022-12-22T15:49:03+01:00"
              },
              "challengeIndicator": "01",
              "createdAt": "2022-12-22T15:45:03+01:00",
              "deviceChannel": "app",
              "dsTransID": "a3b86754-444d-46ca-95a2-ada351d3f42c",
              "exemptionIndicator": "lowValue",
              "inPSD2Scope": true,
              "messageCategory": "payment",
              "messageVersion": "2.2.0",
              "riskScore": 0,
              "threeDSServerTransID": "6edcc246-23ee-4e94-ac5d-8ae620bea7d9",
              "transStatus": "Y",
              "type": "challenge"
            },
            "balancePlatform": "YOUR_BALANCE_PLATFORM",
            "id": "497f6eca-6276-4993-bfeb-53cbbbba6f08",
            "paymentInstrumentId": "PI3227C223222B5BPCMFXD2XG",
            "purchase": {
              "date": "2022-12-22T15:49:03+01:00",
              "merchantName": "TeaShop_NL",
              "originalAmount": {
                "currency": "EUR",
                "value": 1000
              }
            },
            "status": "authenticated"
          },
          "environment": "test",
          "type": "balancePlatform.authentication.created"
        }';
        $webhookParser = new BankingWebhookParser($jsonString);
        $result = $webhookParser->getGenericWebhook();
        self::assertEquals(AuthenticationNotificationRequest::class, get_class($result));
        self::assertEquals($webhookParser->getAuthenticationNotificationRequest(), $result);
        $authenticationRequest = new AuthenticationNotificationRequest();
        self::assertEquals($authenticationRequest->getTypeAllowableValues()[0], $webhookParser->getAuthenticationNotificationRequest()->getType());
    }
}
