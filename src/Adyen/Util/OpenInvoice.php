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

    const AFTERPAYTOUCH = "afterpaytouch";
    const AFTERPAYTOUCH_AU = "afterpaytouch_AU";
    const AFTERPAYTOUCH_CA = "afterpaytouch_CA";
    const AFTERPAYTOUCH_NZ = "afterpaytouch_NZ";
    const AFTERPAYTOUCH_US = "afterpaytouch_US";

    const RATEPAY = 'ratepay';
    const RATEPAY_DIRECTDEBIT_PAYMENT_METHOD = 'ratepay_directdebit';

    const KLARNA_PAYMENT_METHOD = 'klarna';
    const KLARNA_B2B_PAYMENT_METHOD = 'klarna_b2b';
    const KLARNA_PAYNOW_PAYMENT_METHOD = 'klarna_paynow';
    const KLARNA_ACCOUNT_PAYMENT_METHOD = 'klarna_account';

    const FACILYPAY = 'facilypay';
    const FACILYPAY_10X = 'facilypay_10x';
    const FACILYPAY_10X_MERCHANT_PAYS = 'facilypay_10x_merchant_pays';
    const FACILYPAY_10X_WITHFEES = 'facilypay_10x_withfees';
    const FACILYPAY_12X = 'facilypay_12x';
    const FACILYPAY_12X_MERCHANT_PAYS = 'facilypay_12x_merchant_pays';
    const FACILYPAY_12X_WITHFEES = 'facilypay_12x_withfees';
    const FACILYPAY_3X = 'facilypay_3x';
    const FACILYPAY_3X_MERCHANT_PAYS = 'facilypay_3x_merchant_pays';
    const FACILYPAY_3X_WITHFEES = 'facilypay_3x_withfees';
    const FACILYPAY_4X = 'facilypay_4x';
    const FACILYPAY_4X_MERCHANT_PAYS = 'facilypay_4x_merchant_pays';
    const FACILYPAY_4X_WITHFEES = 'facilypay_4x_withfees';
    const FACILYPAY_6X = 'facilypay_6x';
    const FACILYPAY_6X_MERCHANT_PAYS = 'facilypay_6x_merchant_pays';
    const FACILYPAY_6X_WITHFEES = 'facilypay_6x_withfees';
    const FACILYPAY_FR = 'facilypay_fr';

    const AFFIRM = 'affirm';
    const CLEARPAY = 'clearpay';

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
        self::AFTERPAYTOUCH,
        self::AFTERPAYTOUCH_AU,
        self::AFTERPAYTOUCH_CA,
        self::AFTERPAYTOUCH_NZ,
        self::AFTERPAYTOUCH_US,
        self::RATEPAY,
        self::RATEPAY_DIRECTDEBIT_PAYMENT_METHOD,
        self::KLARNA_PAYMENT_METHOD,
        self::KLARNA_B2B_PAYMENT_METHOD,
        self::KLARNA_PAYNOW_PAYMENT_METHOD,
        self::KLARNA_ACCOUNT_PAYMENT_METHOD,
        self::AFFIRM,
        self::CLEARPAY,
        self::FACILYPAY,
        self::FACILYPAY_10X,
        self::FACILYPAY_10X_MERCHANT_PAYS,
        self::FACILYPAY_10X_WITHFEES,
        self::FACILYPAY_12X,
        self::FACILYPAY_12X_MERCHANT_PAYS,
        self::FACILYPAY_12X_WITHFEES,
        self::FACILYPAY_3X,
        self::FACILYPAY_3X_MERCHANT_PAYS,
        self::FACILYPAY_3X_WITHFEES,
        self::FACILYPAY_4X,
        self::FACILYPAY_4X_MERCHANT_PAYS,
        self::FACILYPAY_4X_WITHFEES,
        self::FACILYPAY_6X,
        self::FACILYPAY_6X_MERCHANT_PAYS,
        self::FACILYPAY_6X_WITHFEES,
        self::FACILYPAY_FR,
    );

    /**
     * List of after pay touch payment methods
     *
     * @var array
     */
    private static $afterPayTouchPaymentMethods = array(
        self::AFTERPAYTOUCH,
        self::AFTERPAYTOUCH_AU,
        self::AFTERPAYTOUCH_CA,
        self::AFTERPAYTOUCH_NZ,
        self::AFTERPAYTOUCH_US,
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
        if (in_array($paymentMethod, self::$afterPayTouchPaymentMethods)) {
            return true;
        }
        return false;
    }
}
