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
use Psr\Log\LoggerInterface;

class NotificationReceiver
{
    /**
     * @var string
     */
    private $notificationHMAC;

    /**
     * @var HmacSignature
     */
    private $hmacSignature;

    /**
     * @var string
     */
    private $merchantAccount;

    /**
     * @var string
     */
    private $notificationUsername;

    /**
     * @var string
     */
    private $notificationPassword;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * NotificationReceiver constructor.
     *
     * @param HmacSignature $hmacSignature
     * @param $notificationHMAC
     * @param $merchantAccount
     * @param $notificationUsername
     * @param $notificationPassword
     * @param LoggerInterface $logger
     */
    public function __construct(
        HmacSignature $hmacSignature,
        $notificationHMAC,
        $merchantAccount,
        $notificationUsername,
        $notificationPassword,
        LoggerInterface $logger
    ) {
        $this->hmacSignature = $hmacSignature;
        $this->notificationHMAC = $notificationHMAC;
        $this->merchantAccount = $merchantAccount;
        $this->notificationUsername = $notificationUsername;
        $this->notificationPassword = $notificationPassword;
        $this->logger = $logger;
    }

    /**
     * HTTP Authentication of the notification
     *
     * @param $response
     * @return bool
     * @throws MerchantAccountCodeException
     * @throws AuthenticationException
     * @throws HMACKeyValidationException
     * @throws AdyenException
     */
    protected function isAuthorised($response)
    {
        $internalMerchantAccount = $this->merchantAccount;
        $submittedMerchantAccount = $response['merchantAccountCode'];

        $isTestNotification = $this->isTestNotification($response['pspReference']);
        if (empty($submittedMerchantAccount) && empty($internalMerchantAccount)) {
            if ($isTestNotification) {
                throw new MerchantAccountCodeException('merchantAccountCode is empty in settings');
            }
            return false;
        }

        // validate username and password
        if (!isset($_SERVER['PHP_AUTH_USER']) && !isset($_SERVER['PHP_AUTH_PW'])) {
            if ($isTestNotification) {
                $message = 'Authentication failed: PHP_AUTH_USER and PHP_AUTH_PW are empty.';
                $this->logger->addAdyenNotification($message);
                throw new AuthenticationException($message);
            }
            return false;
        }

        // validate hmac
        if (!$this->hmacSignature->isValidNotificationHMAC($this->notificationHMAC, $response)) {
            $message = 'HMAC key validation failed';
            $this->logger->addAdyenNotification($message);
            throw new HMACKeyValidationException($message);
        }

        $usernameIsValid = hash_equals($this->notificationUsername, $_SERVER['PHP_AUTH_USER']);
        $passwordIsValid = hash_equals($this->notificationPassword, $_SERVER['PHP_AUTH_PW']);
        if ($usernameIsValid && $passwordIsValid) {
            return true;
        }

        // If notification is test check if fields are correct if not return error
        if ($isTestNotification) {
            $message = 'username and\or password are not the same as in settings';
            $this->logger->addAdyenNotification($message);
            throw new AuthenticationException($message);
        }

        return false;
    }

    /**
     * Checks if notification mode and the store mode configuration matches
     *
     * @param $notificationMode
     * @param $testMode bool
     * @return bool
     */
    protected function validateNotificationMode($notificationMode, $testMode)
    {
        // Notification mode can be a string or a boolean
        if (($testMode && ($notificationMode == 'false' || !$notificationMode)) ||
            (!$testMode && ($notificationMode == 'true' || $notificationMode))
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
    protected function isTestNotification($pspReference)
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
    protected function isReportNotification($eventCode)
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
