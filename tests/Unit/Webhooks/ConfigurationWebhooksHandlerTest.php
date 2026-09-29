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

namespace Adyen\Tests\Unit\Webhooks;

use Adyen\Model\ConfigurationWebhooks\AccountHolderNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\AccountPayoutAutoApplicationNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\BalanceAccountNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\CardOrderNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\ConfigurationWebhooksHandler;
use Adyen\Model\ConfigurationWebhooks\MandateNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\NetworkTokenNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\PaymentNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\PayoutScheduleBANotificationRequest;
use Adyen\Model\ConfigurationWebhooks\PayoutScheduleBPNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\PayoutScheduleStateNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\ScoreNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\SweepConfigurationNotificationRequest;
use Adyen\Model\ConfigurationWebhooks\TopUpConfigurationEventRequest;
use Adyen\Model\ConfigurationWebhooks\TopUpConfigurationUpdatedEventRequest;

/**
 * Tests the generated ConfigurationWebhooksHandler against its webhook
 * payloads.
 *
 * Each webhook gets one test method that reads as a scenario: given the
 * event, when deserializing it, then expect the model, its fields and
 * the resilience guarantees. The rejection scenarios live in the shared
 * base class.
 */
class ConfigurationWebhooksHandlerTest extends WebhooksHandlerTestCase
{
    protected static function handlerClass(): string
    {
        return ConfigurationWebhooksHandler::class;
    }

    public function testAccountHolderCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.accountHolder.created',
                'configuration-webhook-account-holder-created.json'
            )
            ->whenCalling('getAccountHolderNotificationRequest')
            ->expectModel(AccountHolderNotificationRequest::class)
            ->expectField('data.accountHolder.id', 'AH00000000000000000000001')
            ->expectField('data.accountHolder.legalEntityId', 'LE00000000000000000000001')
            ->expectField('data.accountHolder.primaryBalanceAccount', 'BA00000000000000000000001')
            ->expectField('data.balancePlatform', 'YOUR_BALANCE_PLATFORM')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.accountHolder.id');
    }

    public function testBalanceAccountCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.balanceAccount.created',
                'configuration-webhook-balance-account-created.json'
            )
            ->whenCalling('getBalanceAccountNotificationRequest')
            ->expectModel(BalanceAccountNotificationRequest::class)
            ->expectField('data.balanceAccount.id', 'BA00000000000000000000001')
            ->expectField('data.balanceAccount.accountHolderId', 'AH00000000000000000000001')
            ->expectField('data.balanceAccount.status', 'Active')
            ->expectField('data.balancePlatform', 'YOUR_BALANCE_PLATFORM')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.balanceAccount.id');
    }

    public function testCardOrderCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.cardorder.created',
                'configuration-webhook-card-order-created.json'
            )
            ->whenCalling('getCardOrderNotificationRequest')
            ->expectModel(CardOrderNotificationRequest::class)
            ->expectField('data.id', 'CO00000000000000000000001')
            ->expectField('data.cardOrderItemId', 'OI00000000000000000000001')
            ->expectField('data.card.status', 'delivered')
            ->expectField('data.shippingMethod', 'standard')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }

    public function testMandateCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.mandate.created',
                'configuration-webhook-mandate-created.json'
            )
            ->whenCalling('getMandateNotificationRequest')
            ->expectModel(MandateNotificationRequest::class)
            ->expectField('data.mandate.id', 'MD00000000000000000000001')
            ->expectField('data.mandate.status', 'Active')
            ->expectField('data.mandate.type', 'sepa')
            ->expectField('data.mandate.balanceAccountId', 'BA00000000000000000000001')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.mandate.id');
    }

    public function testNetworkTokenCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.networkToken.created',
                'configuration-webhook-network-token-created.json'
            )
            ->whenCalling('getNetworkTokenNotificationRequest')
            ->expectModel(NetworkTokenNotificationRequest::class)
            ->expectField('data.id', 'NT00000000000000000000001')
            ->expectField('data.tokenLastFour', '5678')
            ->expectField('data.authenticationApplied', true)
            ->expectField('data.status', 'Active')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }

    public function testBalanceAccountPayoutScheduleCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.balanceAccountPayoutSchedule.created',
                'configuration-webhook-payout-schedule-ba-created.json'
            )
            ->whenCalling('getPayoutScheduleBANotificationRequest')
            ->expectModel(PayoutScheduleBANotificationRequest::class)
            ->expectField('data.balanceAccountPayoutScheduleId', 'BPS0000000000000000000001')
            ->expectField('data.currency', 'EUR')
            ->expectField('data.enabled', true)
            ->expectField('data.frequency', 'daily')
            ->expectField('data.minPayoutAmount', 100)
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.balanceAccountPayoutScheduleId');
    }

    public function testPayoutScheduleAutoApplicationFailed(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.balanceAccountPayoutScheduleAutoApplication.failed',
                'configuration-webhook-payout-auto-application-failed.json'
            )
            ->whenCalling('getAccountPayoutAutoApplicationNotificationRequest')
            ->expectModel(AccountPayoutAutoApplicationNotificationRequest::class)
            ->expectField('data.reason', 'The payout schedule is disabled')
            ->expectField('data.balanceAccountId', 'BA00000000000000000000001')
            ->expectField('data.transferInstrumentId', 'TI00000000000000000000001')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.reason');
    }

    public function testPayoutScheduleExecutionSucceeded(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.balanceAccountPayoutScheduleExecution.succeeded',
                'configuration-webhook-payout-schedule-execution-succeeded.json'
            )
            ->whenCalling('getPayoutScheduleStateNotificationRequest')
            ->expectModel(PayoutScheduleStateNotificationRequest::class)
            ->expectField('data.result', 'SUCCESS')
            ->expectField('data.balanceAccountId', 'BA00000000000000000000001')
            ->expectField('data.balanceAccountPayoutScheduleId', 'BPS0000000000000000000001')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.result');
    }

    public function testBalancePlatformPayoutScheduleCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.balancePlatformPayoutSchedule.created',
                'configuration-webhook-payout-schedule-bp-created.json'
            )
            ->whenCalling('getPayoutScheduleBPNotificationRequest')
            ->expectModel(PayoutScheduleBPNotificationRequest::class)
            ->expectField('data.balancePlatformPayoutScheduleId', 'PPS0000000000000000000001')
            ->expectField('data.currency', 'EUR')
            ->expectField('data.countryCode', 'NL')
            ->expectField('data.defaultFrequency', 'daily')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.balancePlatformPayoutScheduleId');
    }

    public function testScoreTriggered(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.score.triggered',
                'configuration-webhook-score-triggered.json'
            )
            ->whenCalling('getScoreNotificationRequest')
            ->expectModel(ScoreNotificationRequest::class)
            ->expectField('data.id', 'SI00000000000000000000001')
            ->expectField('data.riskScore', 100)
            ->expectField('data.scoreSignalsTriggered.0', 'signals.autoBlock')
            ->expectField('data.accountHolder.id', 'AH00000000000000000000001')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }

    public function testSweepCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.balanceAccountSweep.created',
                'configuration-webhook-sweep-created.json'
            )
            ->whenCalling('getSweepConfigurationNotificationRequest')
            ->expectModel(SweepConfigurationNotificationRequest::class)
            ->expectField('data.sweep.id', 'SW00000000000000000000001')
            ->expectField('data.sweep.status', 'Active')
            ->expectField('data.sweep.currency', 'EUR')
            ->expectField('data.accountId', 'BA00000000000000000000001')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.sweep.id');
    }

    public function testRecurringTopUpCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.balanceAccount.recurringTopUp.created',
                'configuration-webhook-recurring-top-up-created.json'
            )
            ->whenCalling('getTopUpConfigurationEventRequest')
            ->expectModel(TopUpConfigurationEventRequest::class)
            ->expectField('data.id', 'RC00000000000000000000001')
            ->expectField('data.accountId', 'BA00000000000000000000001')
            ->expectField('data.webhookTopUpConfiguration.id', 'TC00000000000000000000001')
            ->expectField('data.webhookTopUpConfiguration.status', 'Active')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }

    public function testRecurringTopUpDeleted(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.balanceAccount.recurringTopUp.deleted',
                'configuration-webhook-recurring-top-up-deleted.json'
            )
            ->whenCalling('getTopUpConfigurationEventRequest')
            ->expectModel(TopUpConfigurationEventRequest::class)
            ->expectField('data.id', 'RC00000000000000000000002')
            ->expectField('data.webhookTopUpConfiguration.id', 'TC00000000000000000000002')
            ->expectField('data.webhookTopUpConfiguration.status', 'Disabled')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }

    public function testRecurringTopUpUpdated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.balanceAccount.recurringTopUp.updated',
                'configuration-webhook-recurring-top-up-updated.json'
            )
            ->whenCalling('getTopUpConfigurationUpdatedEventRequest')
            ->expectModel(TopUpConfigurationUpdatedEventRequest::class)
            ->expectField('data.id', 'RC00000000000000000000003')
            ->expectField('data.webhookTopUpConfiguration.id', 'TC00000000000000000000003')
            ->expectField('data.webhookTopUpConfiguration.status', 'Disabled')
            ->expectField('data.webhookTopUpConfiguration.disabledReason', 'mandateSuspended')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }

    public function testPaymentInstrumentCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.paymentInstrument.created',
                'configuration-webhook-payment-instrument-created.json'
            )
            ->whenCalling('getPaymentNotificationRequest')
            ->expectModel(PaymentNotificationRequest::class)
            ->expectField('data.paymentInstrument.id', 'PI00000000000000000000001')
            ->expectField('data.paymentInstrument.balanceAccountId', 'BA00000000000000000000001')
            ->expectField('data.paymentInstrument.status', 'Active')
            ->expectField('data.balancePlatform', 'YOUR_BALANCE_PLATFORM')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.paymentInstrument.id');
    }
}
