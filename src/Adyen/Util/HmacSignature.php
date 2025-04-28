<?php

namespace Adyen\Util;

use Adyen\AdyenException;

class HmacSignature
{
    const EVENT_CODE = "eventCode";

    /**
     * @deprecated use Use validateHMACSignature with correct parameter order instead
     * @param string $hmacKey Can be found in Customer Area
     * @param string $hmacSign Can be found in the Webhook headers
     * @param string $webhook The response from Adyen
     * @return bool
     * @throws AdyenException
     */
    public function validateHMAC(string $hmacKey, string $hmacSign, string $webhook): bool
    {
        if (!ctype_xdigit($hmacSign)) {
            throw new AdyenException("Invalid HMAC key: $hmacKey");
        }
        $expectedSign = base64_encode(hash_hmac(
            'sha256',
            $webhook,
            pack("H*", $hmacSign),
            true
        ));
        return hash_equals($expectedSign, $hmacKey);
    }

    /**
     * Validate the HMAC Signature of the webhook payload
     * Used for BankingWebhooks and ManagementWebhooks (where HMAC signature is provided in the HTTP header)
     * Note: HMAC signature is calculated considering the entire payload
     *
     * @param string $hmacKey Can be found in Customer Area
     * @param string $hmacSign Can be found in the Webhook headers
     * @param string $webhook The webhook payload
     * @return bool
     * @throws AdyenException
     */
    public function validateHMACSignature(string $hmacKey, string $hmacSign, string $webhook): bool
    {
        if (!ctype_xdigit($hmacKey)) {
            throw new AdyenException("Invalid HMAC key: $hmacKey");
        }
        $expectedSign = self::calculateHmacSignature($hmacKey, $webhook);
        return hash_equals($expectedSign, $hmacSign);
    }
    /**
     * Calculate HMAC Signature for Payments webhooks
     * @param string $hmacKey Can be found in Customer Area
     * @param array $params NotificationRequestItem object inside the webhook payload
     * @return string
     * @throws AdyenException
     */
    public function calculateNotificationHMAC($hmacKey, $params)
    {
        // validate if hmacKey is provided
        if (empty($hmacKey)) {
            throw new AdyenException("You did not provide a HMAC key");
        }

        // validate if hmacKey contains only hexadecimal chars to be packed with H*
        if (!ctype_xdigit($hmacKey)) {
            throw new AdyenException("Invalid HMAC key: $hmacKey");
        }

        if (empty($params)) {
            throw new AdyenException("You did not provide any parameters");
        }

        $dataToSign = self::getNotificationDataToSign($params);


        // base64-encode the binary result of the HMAC computation
        $merchantSig = self::calculateHmacSignature($hmacKey, $dataToSign);
        return $merchantSig;
    }

    /**
     * @param array $params
     * @return string
     */
    private function getNotificationDataToSign($params)
    {
        $pspReference = (!empty($params['pspReference'])) ? $params['pspReference'] : "";
        $originalReference = (!empty($params['originalReference'])) ? $params['originalReference'] : "";
        $merchantAccountCode = (!empty($params['merchantAccountCode'])) ? $params['merchantAccountCode'] : "";
        $merchantReference = (!empty($params['merchantReference'])) ? $params['merchantReference'] : "";
        // `empty` treats too many value types as empty. `isset` should prevent some of these cases.
        $value = (isset($params['amount']['value'])) ? $params['amount']['value'] : "";
        $currency = (!empty($params['amount']['currency'])) ? $params['amount']['currency'] : "";
        $eventCode = (!empty($params[self::EVENT_CODE])) ? $params[self::EVENT_CODE] : "";
        $success = (!empty($params['success'])) ? $params['success'] : "";

        $dataToSign = array(
            $pspReference,
            $originalReference,
            $merchantAccountCode,
            $merchantReference,
            $value,
            $currency,
            $eventCode,
            $success
        );

        return implode(":", $dataToSign);
    }

    /**
     * Validate the HMAC Signature of the requestItem object included in the webhook payload
     * Used for Payment Webhooks (where HMAC signature is provided in the `additionalData` field)
     * Note: HMAC signature is calculated considering a subset of the fields (see `calculateNotificationHMAC` function)
     *
     * @param string $hmacKey
     * @param array $params
     * @return bool
     * @throws AdyenException
     */
    public function isValidNotificationHMAC($hmacKey, $params)
    {
        if (empty($params["additionalData"]) || empty($params["additionalData"]["hmacSignature"])) {
            throw new AdyenException("You did not provide hmacSignature in additionalData");
        }
        $merchantSign = $params["additionalData"]["hmacSignature"];
        unset($params["additionalData"]);
        $expectedSign = $this->calculateNotificationHMAC($hmacKey, $params);

        return hash_equals($expectedSign, $merchantSign);
    }
    /**
     * Returns true when the event code support HMAC validation
     *
     * @param array $response
     * @return bool
     */
    public function isHmacSupportedEventCode($response)
    {
        $eventCodes =  array(
            "ADVICE_OF_DEBIT",
            "AUTHORISATION",
            "AUTHORISATION_PENDING",
            "AUTHORISE_REFERRAL",
            "CANCELLATION",
            "CANCEL_OR_REFUND",
            "CAPTURE",
            "CAPTURE_FAILED",
            "CAPTURE_WITH_EXTERNAL_AUTH",
            "CHARGEBACK",
            "CHARGEBACK_REVERSED",
            "DEACTIVATE_RECURRING",
            "FRAUD_ONLY",
            "FUND_TRANSFER",
            "HANDLED_EXTERNALLY",
            "MANUAL_REVIEW_ACCEPT",
            "NOTIFICATION_OF_CHARGEBACK",
            "NOTIFICATION_OF_FRAUD",
            "OFFER_CLOSED",
            "ORDER_OPENED",
            "PAIDOUT_REVERSED",
            "PAYOUT_DECLINE",
            "PAYOUT_EXPIRE",
            "PAYOUT_THIRDPARTY",
            "PREARBITRATION_LOST",
            "PREARBITRATION_WON",
            "PROCESS_RETRY",
            "RECURRING_CONTRACT",
            "REFUND",
            "REFUNDED_REVERSED",
            "REFUND_FAILED",
            "REFUND_WITH_DATA",
            "REQUEST_FOR_INFORMATION",
            "SECOND_CHARGEBACK",
            "SUBMIT_RECURRING",
            "VOID_PENDING_REFUND",
            "POSTPONED_REFUND",
            "TECHNICAL_CANCEL",
            "AUTHORISATION_ADJUSTMENT",
            "CANCEL_AUTORESCUE",
            "AUTORESCUE"
        );
        return array_key_exists(self::EVENT_CODE, $response) && in_array($response[self::EVENT_CODE], $eventCodes);
    }

    /**
    * Calculate HMAC signature
    *
    * @param string $hmacKey Can be found in Customer Area
    * @param string $payload The response from Adyen
    * @return string
    * @throws AdyenException
    */
    public function calculateHmacSignature(string $hmacKey, string $payload): string
    {
        if (empty($hmacKey)) {
            throw new AdyenException("You did not provide a HMAC key");
        }

        if (!ctype_xdigit($hmacKey)) {
            throw new AdyenException("Invalid HMAC key: $hmacKey");
        }

        return base64_encode(hash_hmac('sha256', $payload, pack("H*", $hmacKey), true));
    }
}
