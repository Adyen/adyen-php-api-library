<?php

namespace Adyen\Service;

use Adyen\Model\ManagementWebhooks\MerchantCreatedNotificationRequest;
use Adyen\Model\ManagementWebhooks\MerchantUpdatedNotificationRequest;
use Adyen\Model\ManagementWebhooks\PaymentMethodCreatedNotificationRequest;
use Adyen\Model\ManagementWebhooks\ObjectSerializer;

class ManagementWebhookParser
{
    private $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }

    public function getGenericWebhook()
    {
        $jsonPayload = json_decode($this->payload, true);
        $type = $jsonPayload['type'];

        if (in_array($type, ($clazz = new MerchantCreatedNotificationRequest())->getTypeAllowableValues())) {
            return (object)self::deserializewebhook($clazz);
        }

        if (in_array($type, ($clazz = new MerchantUpdatedNotificationRequest())->getTypeAllowableValues())) {
            return (object)self::deserializewebhook($clazz);
        }

        if (in_array($type, ($clazz = new PaymentMethodCreatedNotificationRequest())->getTypeAllowableValues())) {
            return (object)self::deserializewebhook($clazz);
        }

        // throw error in case the webhook can not be parsed
        throw new \Error("Could not parse the payload:" . $this->payload);
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getMerchantCreatedNotificationRequest(): MerchantCreatedNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getMerchantUpdatedNotificationRequest(): MerchantUpdatedNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getPaymentMethodCreatedNotificationRequest(): PaymentMethodCreatedNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    private function deserializeWebhook($clazz)
    {
        return ObjectSerializer::deserialize($this->payload, get_class($clazz));
    }
}
