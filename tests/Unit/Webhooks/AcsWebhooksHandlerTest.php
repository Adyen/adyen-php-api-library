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
 * Tests the generated AcsWebhooksHandler against its webhook payloads.
 */
class AcsWebhooksHandlerTest extends AbstractWebhooksHandlerTest
{
    protected static function handlerClass(): string
    {
        return 'Adyen\Model\AcsWebhooks\AcsWebhooksHandler';
    }

    /**
     * @return array<string, array<mixed>>
     */
    public static function validWebhookProvider(): array
    {
        return [
            'balancePlatform.authentication.created' => [
                'balanceplatform-authentication-created.json',
                'getAuthenticationNotificationRequest',
                'Adyen\Model\AcsWebhooks\AuthenticationNotificationRequest',
                'balancePlatform.authentication.created',
                [
                    'data.id' => '497f6eca-6276-4993-bfeb-53cbbbba6f08',
                    'data.authentication.acsTransId' => '6a4c1709-a42e-4c7f-96c7-1043adacfc97',
                ],
            ],
            'balancePlatform.authentication.relayed' => [
                'balanceplatform-relayed-authentication-request.json',
                'getRelayedAuthenticationRequest',
                'Adyen\Model\AcsWebhooks\RelayedAuthenticationRequest',
                'balancePlatform.authentication.relayed',
                [
                    'id' => '1ea64f8e-d1e1-4b9d-a3a2-3953e385b2c8',
                    'paymentInstrumentId' => 'PI123ABCDEFGHIJKLMN45678',
                ],
            ],
        ];
    }
}
