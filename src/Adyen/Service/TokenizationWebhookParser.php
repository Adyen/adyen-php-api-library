<?php

namespace Adyen\Service;

use Adyen\Model\ConfigurationWebhooks\ObjectSerializer;
use Adyen\Model\TokenizationWebhooks\TokenizationAlreadyExistingDetailsNotificationRequest;
use Adyen\Model\TokenizationWebhooks\TokenizationCreatedDetailsNotificationRequest;
use Adyen\Model\TokenizationWebhooks\TokenizationDisabledDetailsNotificationRequest;
use Adyen\Model\TokenizationWebhooks\TokenizationUpdatedDetailsNotificationRequest;

use Exception;
use PhpParser\Error;

class TokenizationWebhookParser
{
    private $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }

    public function getGenericWebhook()
    {
        $jsonPayload = (array)json_decode($this->payload, true);

        try {
            $type = $jsonPayload['type'];
        } catch (Exception $ex) {
            throw new Error("'type' attribute not found in payload: " . $this->payload);
        }

        if (in_array($type, ($clazz = new TokenizationAlreadyExistingDetailsNotificationRequest())->getTypeAllowableValues())) {
            return (object)$this->deserializewebhook($clazz);
        }

        if (in_array($type, ($clazz = new TokenizationCreatedDetailsNotificationRequest())->getTypeAllowableValues())) {
            return (object)$this->deserializewebhook($clazz);
        }

        if (in_array($type, ($clazz = new TokenizationDisabledDetailsNotificationRequest)->getTypeAllowableValues())) {
            return (object)self::deserializewebhook($clazz);
        }

        if (in_array($type, ($clazz = new TokenizationUpdatedDetailsNotificationRequest())->getTypeAllowableValues())) {
            return (object)self::deserializeWebhook($clazz);
        }

        // throw error in case the webhook can not be parsed
        throw new \Error("Could not parse the payload: " . $this->payload);
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getTokenizationAlreadyExistingDetailsNotificationRequest(): TokenizationAlreadyExistingDetailsNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getTokenizationCreatedDetailsNotificationRequest(): TokenizationCreatedDetailsNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getTokenizationDisabledDetailsNotificationRequest(): TokenizationDisabledDetailsNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getTokenizationUpdatedDetailsNotificationRequest(): TokenizationUpdatedDetailsNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    private function deserializeWebhook($clazz)
    {
        return ObjectSerializer::deserialize($this->payload, get_class($clazz));
    }
}
