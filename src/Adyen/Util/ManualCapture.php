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

    public function isManualCaptureSupported($notificationPaymentMethod): bool
    {
        $manualCaptureAllowed = false;
        // For all openinvoice methods manual capture is the default
        if ($this->openInvoice->isOpenInvoicePaymentMethod($notificationPaymentMethod)) {
            return true;
        }

        switch ($notificationPaymentMethod) {
            case 'cup':
            case 'cartebancaire':
            case 'visa':
            case 'visadankort':
            case 'mc':
            case 'uatp':
            case 'amex':
            case 'maestro':
            case 'maestrouk':
            case 'diners':
            case 'discover':
            case 'jcb':
            case 'laser':
            case 'paypal':
            case 'sepadirectdebit':
            case 'dankort':
            case 'elo':
            case 'hipercard':
            case 'mc_applepay':
            case 'visa_applepay':
            case 'amex_applepay':
            case 'discover_applepay':
            case 'maestro_applepay':
            case 'paywithgoogle':
            case 'svs':
            case 'givex':
            case 'valuelink':
            case 'twint':
            case 'carnet':
            case 'pix':
            case 'klarna':
            case 'oney':
            case 'affirm':
            case 'bright':
            case 'amazonpay':
            case 'applepay':
            case 'googlepay':
            case 'mobilepay':
            case 'vipps':
                $manualCaptureAllowed = true;
                break;
            default:
                break;
        }

        $paymentMethodsWithVariants = array(
            'boleto',
            'clearpay',
            'afterpay',
            'ratepay',
            'zip',
        );

        //check the payment methods with variants
        foreach ($paymentMethodsWithVariants as $paymentMethod) {
            if (str_contains($notificationPaymentMethod, $paymentMethod)) {
                $manualCaptureAllowed = true;
            }
        }
        return $manualCaptureAllowed;
    }
}
