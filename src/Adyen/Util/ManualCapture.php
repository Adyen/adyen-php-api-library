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
 * Copyright (c) 2022 Adyen N.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Util;

/**
 * @deprecated
 */
class ManualCapture
{
    private $openInvoice;

    /**
     * ManualCapture constructor.
     */
    public function __construct()
    {
        $this->openInvoice = new OpenInvoice();
    }

    private static $paymentMethods = array(
        'cup',
        'cartebancaire',
        'visa',
        'visadankort',
        'mc',
        'uatp',
        'amex',
        'maestro',
        'maestrouk',
        'diners',
        'discover',
        'jcb',
        'laser',
        'paypal',
        'sepadirectdebit',
        'ach',
        'dankort',
        'elo',
        'hipercard',
        'mc_applepay',
        'visa_applepay',
        'amex_applepay',
        'discover_applepay',
        'maestro_applepay',
        'cartebancaire_applepay',
        'paywithgoogle',
        'mc_googlepay',
        'visa_googlepay',
        'amex_googlepay',
        'discover_googlepay',
        'maestro_googlepay',
        'svs',
        'givex',
        'valuelink',
        'twint',
        'carnet',
        'pix',
        'klarna',
        'oney',
        'affirm',
        'bright',
        'amazonpay',
        'applepay',
        'googlepay',
        'mobilepay',
        'vipps',
        'walley',
        'walley_b2b'
    );

    public function isManualCaptureSupported($notificationPaymentMethod): bool
    {
        $manualCaptureAllowed = false;
        //For all openinvoice methods manual capture is the default
        if ($this->openInvoice->isOpenInvoicePaymentMethod($notificationPaymentMethod)) {
            return true;
        }

        //Check for payment methods with no variants
        if (in_array($notificationPaymentMethod, self::$paymentMethods)) {
            return true;
        }
        //Regex pattern for payment methods with variants
        $paymentMethodsWithVariants = '/^afterpay|^boleto|^clearpay|^ratepay|^zip/';

        //Check the payment methods with variants
        if (preg_match($paymentMethodsWithVariants, $notificationPaymentMethod)) {
            $manualCaptureAllowed = true;
        }
        return $manualCaptureAllowed;
    }
}
