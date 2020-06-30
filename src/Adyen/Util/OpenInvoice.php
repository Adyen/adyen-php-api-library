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

namespace Adyen\Util;

class OpenInvoice
{
    const AFTERPAY_PAYMENT_METHOD = 'afterpay';
    const AFTERPAY_B2B_PAYMENT_METHOD = 'afterpay_b2b';
    const AFTERPAY_DEFAULT_PAYMENT_METHOD = 'afterpay_default';
    const AFTERPAY_DIRECTDEBIT_PAYMENT_METHOD = 'afterpay_directdebit';
    const AFTERPAYTOUCH_PAYMENT_METHOD = 'afterpaytouch';

    const RATEPAY_PAYMENT_METHOD = 'ratepay';
    const RATEPAY_DIRECTDEBIT_PAYMENT_METHOD = 'ratepay_directdebit';

    const KLARNA_PAYMENT_METHOD = 'klarna';
    const KLARNA_B2B_PAYMENT_METHOD = 'klarna_b2b';
    const KLARNA_PAYNOW_PAYMENT_METHOD = 'klarna_paynow';
    const KLARNA_ACCOUNT_PAYMENT_METHOD = 'klarna_account';

    /**
     * List of open invoice payment methods
     *
     * @var array
     */
    private static $openInvoicePaymentMethods = array(
        self::AFTERPAY_PAYMENT_METHOD,
        self::AFTERPAY_B2B_PAYMENT_METHOD,
        self::AFTERPAY_DEFAULT_PAYMENT_METHOD,
        self::AFTERPAY_DIRECTDEBIT_PAYMENT_METHOD,
        self::AFTERPAYTOUCH_PAYMENT_METHOD,
        self::RATEPAY_PAYMENT_METHOD,
        self::RATEPAY_DIRECTDEBIT_PAYMENT_METHOD,
        self::KLARNA_PAYMENT_METHOD,
        self::KLARNA_B2B_PAYMENT_METHOD,
        self::KLARNA_PAYNOW_PAYMENT_METHOD,
        self::KLARNA_ACCOUNT_PAYMENT_METHOD,
    );

    /**
     * For Klarna And AfterPay use Vat category High others use none
     *
     * @param $paymentMethod
     * @return string 'High'/'None'
     */
    public function getVatCategory($paymentMethod)
    {
        if (mb_substr($paymentMethod, 0, 6) == self::KLARNA_PAYMENT_METHOD ||
            mb_substr($paymentMethod, 0, 8) == self::AFTERPAY_PAYMENT_METHOD) {
            return 'High';
        }
        return 'None';
    }

    /**
     * Returns true if the parameter is a valid open invoice payment method
     *
     * @param $paymentMethod
     * @return bool
     */
    public function isOpenInvoicePaymentMethod($paymentMethod)
    {
        if (in_array(strtolower($paymentMethod), self::$openInvoicePaymentMethods)) {
            return true;
        }
        return false;
    }

    /**
     * Returns true if $paymentMethod is 'afterpaytouch'
     *
     * @param $paymentMethod
     * @return bool
     */
    public function isAfterPayTouchPaymentMethod($paymentMethod)
    {
        if (self::AFTERPAYTOUCH_PAYMENT_METHOD === $paymentMethod) {
            return true;
        }
        return false;
    }
}
