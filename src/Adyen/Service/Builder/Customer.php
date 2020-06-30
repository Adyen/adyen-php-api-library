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
    const PAYMENT_METHOD = 'paymentMethod';
    const PERSONAL_DETAILS = 'personalDetails';
    const SHOPPER_NAME = 'shopperName';

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
        // Use $request['paymentMethod']['personalDetails'] as default for personalDetails
        if (!empty($request[self::PAYMENT_METHOD][self::PERSONAL_DETAILS])) {
            $paymentMethodPersonalDetails = $request[self::PAYMENT_METHOD][self::PERSONAL_DETAILS];
        }

        if (!empty($email)) {
            $paymentMethodPersonalDetails['shopperEmail'] = $email;
        }

        if (!empty($telephoneNumber)) {
            $paymentMethodPersonalDetails['telephoneNumber'] = $telephoneNumber;
        }

        if (!empty($gender)) {
            $paymentMethodPersonalDetails['gender'] = $gender;
        }

        if (!empty($dateOfBirth)) {
            $paymentMethodPersonalDetails['dateOfBirth'] = $dateOfBirth;
        }

        if (!empty($firstName)) {
            $paymentMethodPersonalDetails['firstName'] = $firstName;
        }

        if (!empty($lastName)) {
            $paymentMethodPersonalDetails['lastName'] = $lastName;
        }

        // Reassing modified personalDetails into request array
        if (isset($paymentMethodPersonalDetails)) {
            $request[self::PAYMENT_METHOD][self::PERSONAL_DETAILS] = $paymentMethodPersonalDetails;
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

        if (!empty($dateOfBirth)) {
            $request['dateOfBirth'] = $dateOfBirth;
        }

        // Use $request['shopperName'] as default for request shopperName array
        if (!empty($request[self::SHOPPER_NAME])) {
            $shopperName = $request[self::SHOPPER_NAME];
        }

        if (!empty($gender)) {
            $shopperName['gender'] = $gender;
        }

        if (!empty($firstName)) {
            $shopperName['firstName'] = $firstName;
        }

        if (!empty($lastName)) {
            $shopperName['lastName'] = $lastName;
        }

        if (isset($shopperName)) {
            $request[self::SHOPPER_NAME] = $shopperName;
        }

        return $request;
    }
}
