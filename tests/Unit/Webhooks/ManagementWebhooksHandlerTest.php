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
 * Tests the generated ManagementWebhooksHandler against its webhook payloads.
 */
class ManagementWebhooksHandlerTest extends AbstractWebhooksHandlerTest
{
    protected static function handlerClass(): string
    {
        return 'Adyen\Model\ManagementWebhooks\ManagementWebhooksHandler';
    }

    /**
     * @return array<string, array<mixed>>
     */
    public static function validWebhookProvider(): array
    {
        return [
            'paymentMethod.created' => [
                'management-webhook-payment-method-created.json',
                'getPaymentMethodCreatedNotificationRequest',
                'Adyen\Model\ManagementWebhooks\PaymentMethodCreatedNotificationRequest',
                'paymentMethod.created',
                [
                    'data.id' => 'PM1234567890000000',
                    'data.status' => 'success',
                ],
            ],
            'merchant.created' => [
                'management-webhook-merchant-created.json',
                'getMerchantCreatedNotificationRequest',
                'Adyen\Model\ManagementWebhooks\MerchantCreatedNotificationRequest',
                'merchant.created',
                [
                    'data.merchantId' => 'MC3224X22322535GH8D537TJR',
                    'data.companyId' => 'YOUR_COMPANY_ID',
                ],
            ],
            'merchant.updated' => [
                'management-webhook-merchant-updated.json',
                'getMerchantUpdatedNotificationRequest',
                'Adyen\Model\ManagementWebhooks\MerchantUpdatedNotificationRequest',
                'merchant.updated',
                [
                    'data.legalEntityId' => 'LE322KH223222F5GNNW694PZN',
                    'data.merchantId' => 'YOUR_MERCHANT_ID',
                ],
            ],
            'paymentMethodRequest.scheduledForRemoval' => [
                'management-webhook-payment-method-scheduled-for-removal.json',
                'getPaymentMethodScheduledForRemovalNotificationRequest',
                'Adyen\Model\ManagementWebhooks\PaymentMethodScheduledForRemovalNotificationRequest',
                'paymentMethodRequest.scheduledForRemoval',
                [
                    'data.id' => 'PM1234567890000000',
                    'data.status' => 'pendingRemoval',
                    'data.enabled' => false,
                    'data.verificationStatus' => 'valid',
                ],
            ],
            'paymentMethodRequest.removed' => [
                'management-webhook-payment-method-request-removed.json',
                'getPaymentMethodRequestRemovedNotificationRequest',
                'Adyen\Model\ManagementWebhooks\PaymentMethodRequestRemovedNotificationRequest',
                'paymentMethodRequest.removed',
                [
                    'data.id' => 'PM1234567890000000',
                    'data.status' => 'success',
                    'data.allowed' => true,
                    'data.merchantId' => 'MERCHANT_ACCOUNT',
                ],
            ],
            'terminalBoarding.triggered' => [
                'management-webhook-terminal-boarding.json',
                'getTerminalBoardingNotificationRequest',
                'Adyen\Model\ManagementWebhooks\TerminalBoardingNotificationRequest',
                'terminalBoarding.triggered',
                [
                    'data.uniqueTerminalId' => 'P400-374560621',
                    'data.merchantId' => 'YOUR_MERCHANT_ID',
                    'data.companyId' => 'YOUR_COMPANY_ID',
                ],
            ],
            'terminalSettings.modified' => [
                'management-webhook-terminal-settings.json',
                'getTerminalSettingsNotificationRequest',
                'Adyen\Model\ManagementWebhooks\TerminalSettingsNotificationRequest',
                'terminalSettings.modified',
                [
                    'data.terminalId' => 'P400-374560621',
                    'data.updateSource' => 'adyen',
                    'data.storeId' => 'ST322LJ00000000000',
                ],
            ],
        ];
    }
}
