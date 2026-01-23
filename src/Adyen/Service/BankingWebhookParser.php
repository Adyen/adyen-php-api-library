<?php

namespace Adyen\Service;

use Adyen\Model\AcsWebhooks\AuthenticationNotificationRequest;
use Adyen\Model\AcsWebhooks\RelayedAuthenticationRequest;
use Adyen\Model\BalanceWebhooks\BalanceAccountBalanceNotificationRequest;
use Adyen\Model\BalanceWebhooks\ReleasedBlockedBalanceNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\AccountHolderNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\BalanceAccountNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\NetworkTokenNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\ObjectSerializer;
use Adyen\Model\ConfigurationWebhooks\PaymentNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\ScoreNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\SweepConfigurationNotificationRequest;
use Adyen\Model\ReportWebhooks\ReportNotificationRequest;
use Adyen\Model\TransactionWebhooks\TransactionNotificationRequestV4;
use Adyen\Model\TransferWebhooks\TransferNotificationRequest;
use Adyen\Service\WebhookParseException;
use JsonException;

class BankingWebhookParser
{
    private $payload;

    private const WEBHOOK_CLASSES = [
        AuthenticationNotificationRequest::class,
        RelayedAuthenticationRequest::class,
        BalanceAccountBalanceNotificationRequest::class,
        ReleasedBlockedBalanceNotificationRequest::class,
        AccountHolderNotificationRequest::class,
        BalanceAccountNotificationRequest::class,
        PaymentNotificationRequest::class,
        SweepConfigurationNotificationRequest::class,
        ReportNotificationRequest::class,
        TransferNotificationRequest::class,
        TransactionNotificationRequestV4::class,
        ScoreNotificationRequest::class,
        NetworkTokenNotificationRequest::class
    ];

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Parse payload into the appropriate webhook model based on the `type` field.
     *
     * @return object The deserialized webhook model.
     * @throws WebhookParseException
     */
    public function getGenericWebhook(): object
    {
        try {
            $jsonPayload = json_decode($this->payload, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new WebhookParseException("Invalid JSON payload: " . $e->getMessage(), 0, $e);
        }

        if (!isset($jsonPayload['type'])) {
            throw new WebhookParseException("'type' attribute not found in payload: " . $this->payload);
        }

        $type = $jsonPayload['type'];

        foreach (self::WEBHOOK_CLASSES as $class) {
            $instance = new $class();
            if (in_array($type, $instance->getTypeAllowableValues(), true)) {
                return $this->deserializeWebhook($instance);
            }
        }

        throw new WebhookParseException("Could not parse the payload: " . $this->payload);
    }

    /**
     * Type-safe getters for specific webhook classes.
     */
    public function getAuthenticationNotificationRequest(): AuthenticationNotificationRequest
    {
        return $this->getWebhookByClass(AuthenticationNotificationRequest::class);
    }

    public function getRelayedAuthenticationRequest(): RelayedAuthenticationRequest
    {
        return $this->getWebhookByClass(RelayedAuthenticationRequest::class);
    }

    public function getBalanceAccountBalanceNotificationRequest(): BalanceAccountBalanceNotificationRequest
    {
        return $this->getWebhookByClass(BalanceAccountBalanceNotificationRequest::class);
    }

    public function getReleasedBlockedBalanceNotificationRequest(): ReleasedBlockedBalanceNotificationRequest
    {
        return $this->getWebhookByClass(ReleasedBlockedBalanceNotificationRequest::class);
    }

    public function getAccountHolderNotificationRequest(): AccountHolderNotificationRequest
    {
        return $this->getWebhookByClass(AccountHolderNotificationRequest::class);
    }

    public function getBalanceAccountNotificationRequest(): BalanceAccountNotificationRequest
    {
        return $this->getWebhookByClass(BalanceAccountNotificationRequest::class);
    }

    public function getPaymentNotificationRequest(): PaymentNotificationRequest
    {
        return $this->getWebhookByClass(PaymentNotificationRequest::class);
    }

    public function getSweepConfigurationNotificationRequest(): SweepConfigurationNotificationRequest
    {
        return $this->getWebhookByClass(SweepConfigurationNotificationRequest::class);
    }

    public function getReportNotificationRequest(): ReportNotificationRequest
    {
        return $this->getWebhookByClass(ReportNotificationRequest::class);
    }

    public function getTransferNotificationRequest(): TransferNotificationRequest
    {
        return $this->getWebhookByClass(TransferNotificationRequest::class);
    }

    public function getTransactionNotificationRequestV4(): TransactionNotificationRequestV4
    {
        return $this->getWebhookByClass(TransactionNotificationRequestV4::class);
    }

    public function getNetworkTokenNotificationRequest(): NetworkTokenNotificationRequest
    {
        return $this->getWebhookByClass(NetworkTokenNotificationRequest::class);
    }

    public function getScoreNotificationRequest(): ScoreNotificationRequest
    {
        return $this->getWebhookByClass(ScoreNotificationRequest::class);
    }

    private function getWebhookByClass(string $expectedClass): object
    {
        $webhook = $this->getGenericWebhook();

        if (!$webhook instanceof $expectedClass) {
            throw new WebhookParseException("Expected $expectedClass but got " . get_class($webhook));
        }

        return $webhook;
    }

    private function deserializeWebhook(object $instance): object
    {
        return ObjectSerializer::deserialize($this->payload, get_class($instance));
    }
}
