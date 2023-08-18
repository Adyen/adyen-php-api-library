<?php

namespace Adyen\Service;

use Adyen\AdyenException;
use Adyen\Exception\AuthenticationException;
use Adyen\Exception\HMACKeyValidationException;
use Adyen\Exception\MerchantAccountCodeException;
use Adyen\Util\HmacSignature;

class WebhookReceiver
{
    /**
     * @var HmacSignature
     */
    private $hmacSignature;

    /**
     * WebhookReceiver constructor.
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
        $isTestWebhook = $this->isTestWebhook($response['pspReference']);
        if (!$this->hmacSignature->isValidNotificationHMAC($hmacKey, $response)) {
            if ($isTestWebhook) {
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
     * @param $webhookUsername
     * @param $webhookPassword
     * @return bool
     * @throws AuthenticationException
     * @throws MerchantAccountCodeException
     */
    public function isAuthenticated($response, $merchantAccount, $webhookUsername, $webhookPassword)
    {
        $submittedMerchantAccount = $response['merchantAccountCode'];
        $isValidRequest = true;
        $isTestWebhook = $this->isTestWebhook($response['pspReference']);
        if (empty($submittedMerchantAccount) || empty($merchantAccount)) {
            if ($isTestWebhook) {
                throw new MerchantAccountCodeException(
                    'merchantAccountCode is empty in settings or in the webhook'
                );
            }
            $isValidRequest = false;
        }
        // validate username and password
        if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
            if ($isTestWebhook) {
                throw new AuthenticationException(
                    'Authentication failed: PHP_AUTH_USER or PHP_AUTH_PW are empty.'
                );
            }
            $isValidRequest = false;
        }

        $usernameIsValid = hash_equals($webhookUsername, $_SERVER['PHP_AUTH_USER']);
        $passwordIsValid = hash_equals($webhookPassword, $_SERVER['PHP_AUTH_PW']);
        if (!$usernameIsValid || !$passwordIsValid) {
            if ($isTestWebhook) {
                throw new AuthenticationException(
                    'username and\or password are not the same as in settings'
                );
            }
            $isValidRequest = false;
        }

        return  $isValidRequest;
    }

    /**
     * Checks if webhook mode and the store mode configuration matches
     *
     * @param mixed $webhookMode
     * @param bool $testMode
     * @return bool
     */
    public function validateWebhookMode($webhookMode, $testMode)
    {
        // Webhook mode can be a string or a boolean
        return ($testMode && ($webhookMode === 'false' || $webhookMode === false))
            || (!$testMode && ($webhookMode === 'true' || $webhookMode === true));
    }

    /**
     * If webhook is a test webhook from Adyen Customer Area
     *
     * @param $pspReference
     * @return bool
     */
    public function isTestWebhook($pspReference)
    {
        return strpos(strtolower($pspReference), 'test_') !== false
            || strpos(strtolower($pspReference), 'testwebhook_') !== false;
    }

    /**
     * Check if webhook is a report webhook
     *
     * @param $eventCode
     * @return bool
     */
    public function isReportWebhook($eventCode)
    {
        return strpos($eventCode, 'REPORT_') !== false;
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
