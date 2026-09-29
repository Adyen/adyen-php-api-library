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

use Adyen\Model\AcsWebhooks\AcsWebhooksHandler;
use Adyen\Model\AcsWebhooks\AuthenticationNotificationRequest;
use Adyen\Model\AcsWebhooks\RelayedAuthenticationRequest;

/**
 * Tests the generated AcsWebhooksHandler against its webhook payloads.
 *
 * Each webhook gets one test method that reads as a scenario: given the
 * event, when deserializing it, then expect the model, its fields and
 * the resilience guarantees. The rejection scenarios live in the shared
 * base class.
 */
class AcsWebhooksHandlerTest extends WebhooksHandlerTestCase
{
    protected static function handlerClass(): string
    {
        return AcsWebhooksHandler::class;
    }

    public function testAuthenticationCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.authentication.created',
                'balanceplatform-authentication-created.json'
            )
            ->whenCalling('getAuthenticationNotificationRequest')
            ->expectModel(AuthenticationNotificationRequest::class)
            ->expectField('data.id', '497f6eca-6276-4993-bfeb-53cbbbba6f08')
            ->expectField(
                'data.authentication.acsTransId',
                '6a4c1709-a42e-4c7f-96c7-1043adacfc97'
            )
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }

    public function testAuthenticationRelayed(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.authentication.relayed',
                'balanceplatform-relayed-authentication-request.json'
            )
            ->whenCalling('getRelayedAuthenticationRequest')
            ->expectModel(RelayedAuthenticationRequest::class)
            ->expectField('id', '1ea64f8e-d1e1-4b9d-a3a2-3953e385b2c8')
            ->expectField('paymentInstrumentId', 'PI123ABCDEFGHIJKLMN45678')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('id');
    }
}
