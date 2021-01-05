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
 * Copyright (c) 2020 Adyen N.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Service;

use Adyen\AdyenException;
use Adyen\Exception\AuthenticationException;
use Adyen\Exception\HMACKeyValidationException;
use Adyen\Exception\MerchantAccountCodeException;
use Adyen\Util\HmacSignature;

class NotificationReceiver
{
    /**
     * @var HmacSignature
     */
    private $hmacSignature;

    /**
     * NotificationReceiver constructor.
     * @param HmacSignature $hmacSignature
     */
    public function __construct(
        HmacSignature $hmacSignature
    ) {
        $this->hmacSignature = $hmacSignature;
    }

    /**
     * Checks if the hmac key is valid
     * @param $response
     * @param $hmacKey
     * @return bool
     * @throws AdyenException
     * @throws HMACKeyValidationException
     */
    public function validateHmac($response, $hmacKey)
    {
        $isTestNotification = $this->isTestNotification($response['pspReference']);
        if (!$this->hmacSignature->isValidNotificationHMAC($hmacKey, $response)) {
            if ($isTestNotification) {
                $message = 'HMAC key validation failed';
                throw new HMACKeyValidationException($message);
            }
            return false;
        }
        return true;
    }

    /**
     * @param $response
     * @param $merchantAccount
     * @param $notificationUsername
     * @param $notificationPassword
     * @return bool
     * @throws AuthenticationException
     * @throws MerchantAccountCodeException
     */
    public function isAuthenticated($response, $merchantAccount, $notificationUsername, $notificationPassword)
    {
        $submittedMerchantAccount = $response['merchantAccountCode'];

        $isTestNotification = $this->isTestNotification($response['pspReference']);
        if (empty($submittedMerchantAccount) || empty($merchantAccount)) {
            if ($isTestNotification) {
                throw new MerchantAccountCodeException(
                    'merchantAccountCode is empty in settings or in the notification'
                );
            }
            return false;
        }
        // validate username and password
        if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
            if ($isTestNotification) {
                $message = 'Authentication failed: PHP_AUTH_USER or PHP_AUTH_PW are empty.';
                throw new AuthenticationException($message);
            }
            return false;
        }

        $usernameIsValid = hash_equals($notificationUsername, $_SERVER['PHP_AUTH_USER']);
        $passwordIsValid = hash_equals($notificationPassword, $_SERVER['PHP_AUTH_PW']);
        if ($usernameIsValid && $passwordIsValid) {
            return true;
        }

        // If notification is test check if fields are correct if not return error
        if ($isTestNotification) {
            $message = 'username and\or password are not the same as in settings';
            throw new AuthenticationException($message);
        }
        return false;
    }

    /**
     * Checks if notification mode and the store mode configuration matches
     *
     * @param mixed $notificationMode
     * @param bool $testMode
     * @return bool
     */
    public function validateNotificationMode($notificationMode, $testMode)
    {
        // Notification mode can be a string or a boolean
        if (($testMode && ($notificationMode === 'false' || $notificationMode === false)) ||
            (!$testMode && ($notificationMode === 'true' || $notificationMode === true))
        ) {
            return true;
        }
        return false;
    }

    /**
     * If notification is a test notification from Adyen Customer Area
     *
     * @param $pspReference
     * @return bool
     */
    public function isTestNotification($pspReference)
    {
        if (strpos(strtolower($pspReference), 'test_') !== false
            || strpos(strtolower($pspReference), 'testnotification_') !== false
        ) {
            return true;
        }

        return false;
    }

    /**
     * Check if notification is a report notification
     *
     * @param $eventCode
     * @return bool
     */
    public function isReportNotification($eventCode)
    {
        if (strpos($eventCode, 'REPORT_') !== false) {
            return true;
        }

        return false;
    }

    /**
     * Add '[accepted]' into $acceptedMessage if empty
     *
     * @param $acceptedMessage
     * @return string
     */
    public function returnAccepted($acceptedMessage)
    {
        if (empty($acceptedMessage)) {
            $acceptedMessage = '[accepted]';
        }
        return $acceptedMessage;
    }
}
