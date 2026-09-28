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

/**
 * Tests the generated ConfigurationWebhooksHandler against its webhook payloads.
 */
class ConfigurationWebhooksHandlerTest extends AbstractWebhooksHandlerTest
{
    protected static function handlerClass(): string
    {
        return 'Adyen\Model\ConfigurationWebhooks\ConfigurationWebhooksHandler';
    }

    /**
     * @return array<string, array<mixed>>
     */
    public static function validWebhookProvider(): array
    {
        return [
            'balancePlatform.accountHolder.created' => [
                'configuration-webhook-account-holder-created.json',
                'getAccountHolderNotificationRequest',
                'Adyen\Model\ConfigurationWebhooks\AccountHolderNotificationRequest',
                'balancePlatform.accountHolder.created',
                [
                    'data.accountHolder.id' => 'AH00000000000000000000001',
                    'data.accountHolder.legalEntityId' => 'LE00000000000000000000001',
                    'data.accountHolder.primaryBalanceAccount' => 'BA00000000000000000000001',
                    'data.balancePlatform' => 'YOUR_BALANCE_PLATFORM',
                ],
            ],
            'balancePlatform.balanceAccount.created' => [
                'configuration-webhook-balance-account-created.json',
                'getBalanceAccountNotificationRequest',
                'Adyen\Model\ConfigurationWebhooks\BalanceAccountNotificationRequest',
                'balancePlatform.balanceAccount.created',
                [
                    'data.balanceAccount.id' => 'BA00000000000000000000001',
                    'data.balanceAccount.accountHolderId' => 'AH00000000000000000000001',
                    'data.balanceAccount.status' => 'Active',
                    'data.balancePlatform' => 'YOUR_BALANCE_PLATFORM',
                ],
            ],
            'balancePlatform.cardorder.created' => [
                'configuration-webhook-card-order-created.json',
                'getCardOrderNotificationRequest',
                'Adyen\Model\ConfigurationWebhooks\CardOrderNotificationRequest',
                'balancePlatform.cardorder.created',
                [
                    'data.id' => 'CO00000000000000000000001',
                    'data.cardOrderItemId' => 'OI00000000000000000000001',
                    'data.card.status' => 'delivered',
                    'data.shippingMethod' => 'standard',
                ],
            ],
            'balancePlatform.mandate.created' => [
                'configuration-webhook-mandate-created.json',
                'getMandateNotificationRequest',
                'Adyen\Model\ConfigurationWebhooks\MandateNotificationRequest',
                'balancePlatform.mandate.created',
                [
                    'data.mandate.id' => 'MD00000000000000000000001',
                    'data.mandate.status' => 'Active',
                    'data.mandate.type' => 'sepa',
                    'data.mandate.balanceAccountId' => 'BA00000000000000000000001',
                ],
            ],
            'balancePlatform.networkToken.created' => [
                'configuration-webhook-network-token-created.json',
                'getNetworkTokenNotificationRequest',
                'Adyen\Model\ConfigurationWebhooks\NetworkTokenNotificationRequest',
                'balancePlatform.networkToken.created',
                [
                    'data.id' => 'NT00000000000000000000001',
                    'data.tokenLastFour' => '5678',
                    'data.authenticationApplied' => true,
                    'data.status' => 'Active',
                ],
            ],
            'balancePlatform.balanceAccountPayoutSchedule.created' => [
                'configuration-webhook-payout-schedule-ba-created.json',
                'getPayoutScheduleBANotificationRequest',
                'Adyen\Model\ConfigurationWebhooks\PayoutScheduleBANotificationRequest',
                'balancePlatform.balanceAccountPayoutSchedule.created',
                [
                    'data.balanceAccountPayoutScheduleId' => 'BPS0000000000000000000001',
                    'data.currency' => 'EUR',
                    'data.enabled' => true,
                    'data.frequency' => 'daily',
                    'data.minPayoutAmount' => 100,
                ],
            ],
            'balancePlatform.balanceAccountPayoutScheduleAutoApplication.failed' => [
                'configuration-webhook-payout-auto-application-failed.json',
                'getAccountPayoutAutoApplicationNotificationRequest',
                'Adyen\Model\ConfigurationWebhooks\AccountPayoutAutoApplicationNotificationRequest',
                'balancePlatform.balanceAccountPayoutScheduleAutoApplication.failed',
                [
                    'data.reason' => 'The payout schedule is disabled',
                    'data.balanceAccountId' => 'BA00000000000000000000001',
                    'data.transferInstrumentId' => 'TI00000000000000000000001',
                ],
            ],
            'balancePlatform.balanceAccountPayoutScheduleExecution.succeeded' => [
                'configuration-webhook-payout-schedule-execution-succeeded.json',
                'getPayoutScheduleStateNotificationRequest',
                'Adyen\Model\ConfigurationWebhooks\PayoutScheduleStateNotificationRequest',
                'balancePlatform.balanceAccountPayoutScheduleExecution.succeeded',
                [
                    'data.result' => 'SUCCESS',
                    'data.balanceAccountId' => 'BA00000000000000000000001',
                    'data.balanceAccountPayoutScheduleId' => 'BPS0000000000000000000001',
                ],
            ],
            'balancePlatform.balancePlatformPayoutSchedule.created' => [
                'configuration-webhook-payout-schedule-bp-created.json',
                'getPayoutScheduleBPNotificationRequest',
                'Adyen\Model\ConfigurationWebhooks\PayoutScheduleBPNotificationRequest',
                'balancePlatform.balancePlatformPayoutSchedule.created',
                [
                    'data.balancePlatformPayoutScheduleId' => 'PPS0000000000000000000001',
                    'data.currency' => 'EUR',
                    'data.countryCode' => 'NL',
                    'data.defaultFrequency' => 'daily',
                ],
            ],
            'balancePlatform.score.triggered' => [
                'configuration-webhook-score-triggered.json',
                'getScoreNotificationRequest',
                'Adyen\Model\ConfigurationWebhooks\ScoreNotificationRequest',
                'balancePlatform.score.triggered',
                [
                    'data.id' => 'SI00000000000000000000001',
                    'data.riskScore' => 100,
                    'data.scoreSignalsTriggered.0' => 'signals.autoBlock',
                    'data.accountHolder.id' => 'AH00000000000000000000001',
                ],
            ],
            'balancePlatform.balanceAccountSweep.created' => [
                'configuration-webhook-sweep-created.json',
                'getSweepConfigurationNotificationRequest',
                'Adyen\Model\ConfigurationWebhooks\SweepConfigurationNotificationRequest',
                'balancePlatform.balanceAccountSweep.created',
                [
                    'data.sweep.id' => 'SW00000000000000000000001',
                    'data.sweep.status' => 'Active',
                    'data.sweep.currency' => 'EUR',
                    'data.accountId' => 'BA00000000000000000000001',
                ],
            ],
            'balancePlatform.balanceAccount.recurringTopUp.created' => [
                'configuration-webhook-recurring-top-up-created.json',
                'getTopUpConfigurationEventRequest',
                'Adyen\Model\ConfigurationWebhooks\TopUpConfigurationEventRequest',
                'balancePlatform.balanceAccount.recurringTopUp.created',
                [
                    'data.id' => 'RC00000000000000000000001',
                    'data.accountId' => 'BA00000000000000000000001',
                    'data.webhookTopUpConfiguration.id' => 'TC00000000000000000000001',
                    'data.webhookTopUpConfiguration.status' => 'Active',
                ],
            ],
            'balancePlatform.balanceAccount.recurringTopUp.deleted' => [
                'configuration-webhook-recurring-top-up-deleted.json',
                'getTopUpConfigurationEventRequest',
                'Adyen\Model\ConfigurationWebhooks\TopUpConfigurationEventRequest',
                'balancePlatform.balanceAccount.recurringTopUp.deleted',
                [
                    'data.id' => 'RC00000000000000000000002',
                    'data.webhookTopUpConfiguration.id' => 'TC00000000000000000000002',
                    'data.webhookTopUpConfiguration.status' => 'Disabled',
                ],
            ],
            'balancePlatform.balanceAccount.recurringTopUp.updated' => [
                'configuration-webhook-recurring-top-up-updated.json',
                'getTopUpConfigurationUpdatedEventRequest',
                'Adyen\Model\ConfigurationWebhooks\TopUpConfigurationUpdatedEventRequest',
                'balancePlatform.balanceAccount.recurringTopUp.updated',
                [
                    'data.id' => 'RC00000000000000000000003',
                    'data.webhookTopUpConfiguration.id' => 'TC00000000000000000000003',
                    'data.webhookTopUpConfiguration.status' => 'Disabled',
                    'data.webhookTopUpConfiguration.disabledReason' => 'mandateSuspended',
                ],
            ],
            'balancePlatform.paymentInstrument.created' => [
                'configuration-webhook-payment-instrument-created.json',
                'getPaymentNotificationRequest',
                'Adyen\Model\ConfigurationWebhooks\PaymentNotificationRequest',
                'balancePlatform.paymentInstrument.created',
                [
                    'data.paymentInstrument.id' => 'PI00000000000000000000001',
                    'data.paymentInstrument.balanceAccountId' => 'BA00000000000000000000001',
                    'data.paymentInstrument.status' => 'Active',
                    'data.balancePlatform' => 'YOUR_BALANCE_PLATFORM',
                ],
            ],
        ];
    }
}
