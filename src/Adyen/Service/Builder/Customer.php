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

namespace Adyen\Service\Builder;

class Customer
{
    /**
     * Builds the customer related data
     *
     * @param $isOpenInvoicePaymentMethod
     * @param string $email
     * @param string $phoneNumber
     * @param string $gender
     * @param string $dateOfBirth
     * @param string $firstName
     * @param string $lastName
     * @param string $countryCode
     * @param string $localeCode
     * @param string $shopperIp
     * @param int $customerId
     * @param array $request
     * @return array
     */
    public function buildCustomerData(
        $isOpenInvoicePaymentMethod,
        $email = '',
        $phoneNumber = '',
        $gender = '',
        $dateOfBirth = '',
        $firstName = '',
        $lastName = '',
        $countryCode = '',
        $localeCode = '',
        $shopperIp = '',
        $customerId = 0,
        $request = array()
    ) {
        // Add shopperReference to identify the unique shoppers in the store by id, necessary for recurring payments
        if (!empty($customerId)) {
            $request['shopperReference'] = $customerId;
        }

        // Open invoice methods requires different request format
        if ($isOpenInvoicePaymentMethod) {
            $request = $this->buildCustomerDataForOpenInvoicePaymentMethod(
                $email,
                $phoneNumber,
                $gender,
                $dateOfBirth,
                $firstName,
                $lastName,
                $request
            );
        } else {
            $request = $this->buildCustomerDataForNonOpenInvoicePaymentMethod(
                $email,
                $phoneNumber,
                $gender,
                $dateOfBirth,
                $firstName,
                $lastName,
                $request
            );
        }

        if (!empty($countryCode)) {
            $request['countryCode'] = $countryCode;
        }

        if (!empty($localeCode)) {
            $request['shopperLocale'] = $localeCode;
        }

        if (!empty($shopperIp)) {
            $request['shopperIP'] = $shopperIp;
        }

        return $request;
    }

    /**
     * Builds customer related data listed in the parameter list for open invoice payment methods
     *
     * @param $email
     * @param $telephoneNumber
     * @param $gender
     * @param $dateOfBirth
     * @param $firstName
     * @param $lastName
     * @param array $request
     * @return array
     */
    private function buildCustomerDataForOpenInvoicePaymentMethod(
        $email,
        $telephoneNumber,
        $gender,
        $dateOfBirth,
        $firstName,
        $lastName,
        $request = array()
    ) {
        if (!empty($email)) {
            $request['paymentMethod']['personalDetails']['shopperEmail'] = $email;
        }

        if (!empty($telephoneNumber)) {
            $request['paymentMethod']['personalDetails']['telephoneNumber'] = $telephoneNumber;
        }

        if (!empty($gender)) {
            $request['paymentMethod']['personalDetails']['gender'] = $gender;
        }

        if (!empty($dateOfBirth)) {
            $request['paymentMethod']['personalDetails']['dateOfBirth'] = $dateOfBirth;
        }

        if (!empty($firstName)) {
            $request['paymentMethod']['personalDetails']['firstName'] = $firstName;
        }

        if (!empty($lastName)) {
            $request['paymentMethod']['personalDetails']['lastName'] = $lastName;
        }
        return $request;
    }

    /**
     * Builds customer related data listed in the parameter list for not open invoice payment methods
     *
     * @param $email
     * @param $telephoneNumber
     * @param $gender
     * @param $dateOfBirth
     * @param $firstName
     * @param $lastName
     * @param array $request
     * @return array
     */
    private function buildCustomerDataForNonOpenInvoicePaymentMethod(
        $email,
        $telephoneNumber,
        $gender,
        $dateOfBirth,
        $firstName,
        $lastName,
        $request = array()
    ) {
        if (!empty($email)) {
            $request['shopperEmail'] = $email;
        }

        if (!empty($telephoneNumber)) {
            $request['telephoneNumber'] = $telephoneNumber;
        }

        if (!empty($gender)) {
            $request['shopperName']['gender'] = $gender;
        }

        if (!empty($dateOfBirth)) {
            $request['dateOfBirth'] = $dateOfBirth;
        }

        if (!empty($firstName)) {
            $request['shopperName']['firstName'] = $firstName;
        }

        if (!empty($lastName)) {
            $request['shopperName']['lastName'] = $lastName;
        }

        return $request;
    }
}
