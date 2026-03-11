<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\ManagementWebhooks\PaymentMethodCreatedNotificationRequest;
use Adyen\Service\ManagementWebhookParser;

class ManagementWebhookParserTest extends TestCaseMock
{
    public function testManagementWebhookParser()
    {
        $jsonString = '{
          "createdAt": "2022-01-24T14:59:11+01:00",
          "data": {
            "id": "PM3224R223224K5FH4M2K9B86",
            "merchantId": "MERCHANT_ACCOUNT",
            "result": "SUCCESS",
            "storeId": "ST322LJ223223K5F4SQNR9XL5",
            "type": "visa"
          },
          "environment": "test",
          "type": "paymentMethod.created"
        }';
        $webhookParser = new ManagementWebhookParser($jsonString);
        $result = $webhookParser->getPaymentMethodCreatedNotificationRequest();
        self::assertEquals(PaymentMethodCreatedNotificationRequest::class, get_class($result));
        $paymentWebhook = new PaymentMethodCreatedNotificationRequest();
        self::assertEquals($paymentWebhook->getTypeAllowableValues()[0], $result->getType());
    }
}
