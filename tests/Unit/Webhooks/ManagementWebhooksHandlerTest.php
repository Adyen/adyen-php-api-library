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

use Adyen\Model\ManagementWebhooks\ManagementWebhooksHandler;
use Adyen\Model\ManagementWebhooks\MerchantCreatedNotificationRequest;
use Adyen\Model\ManagementWebhooks\MerchantUpdatedNotificationRequest;
use Adyen\Model\ManagementWebhooks\PaymentMethodCreatedNotificationRequest;
use Adyen\Model\ManagementWebhooks\PaymentMethodRequestRemovedNotificationRequest;
use Adyen\Model\ManagementWebhooks\PaymentMethodScheduledForRemovalNotificationRequest;
use Adyen\Model\ManagementWebhooks\TerminalBoardingNotificationRequest;
use Adyen\Model\ManagementWebhooks\TerminalSettingsNotificationRequest;

/**
 * Tests the generated ManagementWebhooksHandler against its webhook payloads.
 *
 * Each webhook gets one test method that reads as a scenario: given the
 * event, when deserializing it, then expect the model, its fields and
 * the resilience guarantees. The rejection scenarios live in the shared
 * base class.
 */
class ManagementWebhooksHandlerTest extends WebhooksHandlerTestCase
{
    protected static function handlerClass(): string
    {
        return ManagementWebhooksHandler::class;
    }

    public function testPaymentMethodCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'paymentMethod.created',
                'management-webhook-payment-method-created.json'
            )
            ->whenCalling('getPaymentMethodCreatedNotificationRequest')
            ->expectModel(PaymentMethodCreatedNotificationRequest::class)
            ->expectField('data.id', 'PM1234567890000000')
            ->expectField('data.status', 'success')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }

    public function testMerchantCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'merchant.created',
                'management-webhook-merchant-created.json'
            )
            ->whenCalling('getMerchantCreatedNotificationRequest')
            ->expectModel(MerchantCreatedNotificationRequest::class)
            ->expectField('data.merchantId', 'MC3224X22322535GH8D537TJR')
            ->expectField('data.companyId', 'YOUR_COMPANY_ID')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.merchantId');
    }

    public function testMerchantUpdated(): void
    {
        $this->scenario()
            ->givenEvent(
                'merchant.updated',
                'management-webhook-merchant-updated.json'
            )
            ->whenCalling('getMerchantUpdatedNotificationRequest')
            ->expectModel(MerchantUpdatedNotificationRequest::class)
            ->expectField('data.legalEntityId', 'LE322KH223222F5GNNW694PZN')
            ->expectField('data.merchantId', 'YOUR_MERCHANT_ID')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.legalEntityId');
    }

    public function testPaymentMethodScheduledForRemoval(): void
    {
        $this->scenario()
            ->givenEvent(
                'paymentMethodRequest.scheduledForRemoval',
                'management-webhook-payment-method-scheduled-for-removal.json'
            )
            ->whenCalling('getPaymentMethodScheduledForRemovalNotificationRequest')
            ->expectModel(PaymentMethodScheduledForRemovalNotificationRequest::class)
            ->expectField('data.id', 'PM1234567890000000')
            ->expectField('data.status', 'pendingRemoval')
            ->expectField('data.enabled', false)
            ->expectField('data.verificationStatus', 'valid')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }

    public function testPaymentMethodRequestRemoved(): void
    {
        $this->scenario()
            ->givenEvent(
                'paymentMethodRequest.removed',
                'management-webhook-payment-method-request-removed.json'
            )
            ->whenCalling('getPaymentMethodRequestRemovedNotificationRequest')
            ->expectModel(PaymentMethodRequestRemovedNotificationRequest::class)
            ->expectField('data.id', 'PM1234567890000000')
            ->expectField('data.status', 'success')
            ->expectField('data.allowed', true)
            ->expectField('data.merchantId', 'MERCHANT_ACCOUNT')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }

    public function testTerminalBoardingTriggered(): void
    {
        $this->scenario()
            ->givenEvent(
                'terminalBoarding.triggered',
                'management-webhook-terminal-boarding.json'
            )
            ->whenCalling('getTerminalBoardingNotificationRequest')
            ->expectModel(TerminalBoardingNotificationRequest::class)
            ->expectField('data.uniqueTerminalId', 'P400-374560621')
            ->expectField('data.merchantId', 'YOUR_MERCHANT_ID')
            ->expectField('data.companyId', 'YOUR_COMPANY_ID')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.uniqueTerminalId');
    }

    public function testTerminalSettingsModified(): void
    {
        $this->scenario()
            ->givenEvent(
                'terminalSettings.modified',
                'management-webhook-terminal-settings.json'
            )
            ->whenCalling('getTerminalSettingsNotificationRequest')
            ->expectModel(TerminalSettingsNotificationRequest::class)
            ->expectField('data.terminalId', 'P400-374560621')
            ->expectField('data.updateSource', 'adyen')
            ->expectField('data.storeId', 'ST322LJ00000000000')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.terminalId');
    }
}
