<?php

namespace Adyen\Service;

use Adyen\Model\AcsWebhooks\AuthenticationNotificationRequest;
use Adyen\Model\AcsWebhooks\RelayedAuthenticationRequest;
use Adyen\Model\BalanceWebhooks\BalanceAccountBalanceNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\AccountHolderNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\BalanceAccountNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\ObjectSerializer;
use Adyen\Model\ConfigurationWebhooks\PaymentNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\SweepConfigurationNotificationRequest;
use Adyen\Model\ReportWebhooks\ReportNotificationRequest;
use Adyen\Model\TransactionWebhooks\TransactionNotificationRequestV4;
use Adyen\Model\TransferWebhooks\TransferNotificationRequest;
use Exception;
use PhpParser\Error;

class BankingWebhookParser
{
    private $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }

    public function getGenericWebhook()
    {
        $jsonPayload = (array)json_decode($this->payload, true);

        // custom check for RelayedAuthenticationRequest as it doesn't include the attribute 'type'
        if (is_array($jsonPayload) &&
            array_key_exists('id', $jsonPayload) &&
            array_key_exists('paymentInstrumentId', $jsonPayload)) {
                $clazz = new RelayedAuthenticationRequest();
                return (object)$this->deserializewebhook($clazz);
        }

        // handle other webhook events using `type attribute
        try {
            $type = $jsonPayload['type'];
        } catch (Exception $ex) {
            throw new Error("'type' attribute not found in payload: " . $this->payload);
        }

        if (in_array($type, ($clazz = new AuthenticationNotificationRequest())->getTypeAllowableValues())) {
            return (object)$this->deserializewebhook($clazz);
        }

        if (in_array($type, ($clazz = new BalanceAccountBalanceNotificationRequest())->getTypeAllowableValues())) {
            return (object)$this->deserializewebhook($clazz);
        }

        if (in_array($type, ($clazz = new AccountHolderNotificationRequest)->getTypeAllowableValues())) {
            return (object)self::deserializewebhook($clazz);
        }

        if (in_array($type, ($clazz = new BalanceAccountNotificationRequest())->getTypeAllowableValues())) {
            return (object)self::deserializeWebhook($clazz);
        }

        if (in_array($type, ($clazz = new PaymentNotificationRequest())->getTypeAllowableValues())) {
            return (object)self::deserializeWebhook($clazz);
        }

        if (in_array($type, ($clazz =  new SweepConfigurationNotificationRequest())->getTypeAllowableValues())) {
            return (object)self::deserializeWebhook($clazz);
        }

        if (in_array($type, ($clazz =  new ReportNotificationRequest())->getTypeAllowableValues())) {
            return (object)self::deserializeWebhook($clazz);
        }

        if (in_array($type, ($clazz = new TransferNotificationRequest())->getTypeAllowableValues())) {
            return(object)self::deserializeWebhook($clazz);
        }

        if (in_array($type, ($clazz = new TransactionNotificationRequestV4())->getTypeAllowableValues())) {
            return(object)self::deserializeWebhook($clazz);
        }

        // throw error in case the webhook can not be parsed
        throw new \Error("Could not parse the payload: " . $this->payload);
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getAuthenticationNotificationRequest(): AuthenticationNotificationRequest
    {
        return $this->getGenericWebhook();
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getRelayedAuthenticationRequest(): RelayedAuthenticationRequest
    {
        return $this->getGenericWebhook();
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getBalanceAccountBalanceNotificationRequest(): BalanceAccountBalanceNotificationRequest
    {
        return $this->getGenericWebhook();
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

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getTransactionNotificationRequestV4(): TransactionNotificationRequestV4
    {
        return $this->getGenericWebhook();
    }

    private function deserializeWebhook($clazz)
    {
        return ObjectSerializer::deserialize($this->payload, get_class($clazz));
    }
}
