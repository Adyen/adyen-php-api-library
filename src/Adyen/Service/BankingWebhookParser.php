<?php

namespace Adyen\Service;

use Adyen\Model\ConfigurationWebhooks\AccountHolderNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\BalanceAccountNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\ObjectSerializer;
use Adyen\Model\ConfigurationWebhooks\PaymentNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\SweepConfigurationNotificationRequest;
use Adyen\Model\ReportWebhooks\ReportNotificationRequest;
use Adyen\Model\TransferWebhooks\TransferNotificationRequest;

class BankingWebhookParser
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

        if (in_array($type, ($clazz = new AccountHolderNotificationRequest)->getTypeAllowableValues())) {
            return (object)$this->deserializewebhook($clazz);
        }

        if (in_array($type, ($clazz = new BalanceAccountNotificationRequest())->getTypeAllowableValues())) {
            return (object)$this->deserializeWebhook($clazz);
        }

        if (in_array($type, ($clazz = new PaymentNotificationRequest())->getTypeAllowableValues())) {
            return (object)$this->deserializeWebhook($clazz);
        }

        if (in_array($type, ($clazz =  new SweepConfigurationNotificationRequest())->getTypeAllowableValues())) {
            return (object)$this->deserializeWebhook($clazz);
        }

        if (in_array($type, ($clazz =  new ReportNotificationRequest())->getTypeAllowableValues())) {
            return (object)$this->deserializeWebhook($clazz);
        }

        if (in_array($type, ($clazz = new TransferNotificationRequest())->getTypeAllowableValues())) {
            return(object)$this->deserializeWebhook($clazz);
        }
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getAccountHolderNotificationRequest(): AccountHolderNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getBalanceAccountNotificationRequest(): BalanceAccountNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getPaymentNotificationRequest(): PaymentNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getSweepConfigurationNotificationRequest(): SweepConfigurationNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getReportNotificationRequest(): ReportNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getTransferNotificationRequest(): TransferNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    private function deserializeWebhook($clazz)
    {
        return ObjectSerializer::deserialize($this->payload, get_class($clazz));
    }
}
