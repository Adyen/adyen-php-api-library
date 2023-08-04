<?php

namespace Adyen\Service\Builder;

/**
 * @deprecated
 */
class Referral
{
    const ACTION_BLOCK = 'block';
    const ACTION_TRUST = 'trust';
    const ACTION_DELETE = 'delete';

    const TYPE_SHOPPER_EMAIL = 'shopperemail';
    const TYPE_SHOPPER_IP = 'shopperip';
    const TYPE_SHOPPER_NAME = 'pmowner';
    const TYPE_SHOPPER_ADDRESS = 'shopperaddress';
    const TYPE_SHOPPER_REFERENCE = 'shopperreference';
    const TYPE_PAYPAL_PAYER_ID = 'txvariantshopperreference';
    const TYPE_EMAIL_DOMAIN = 'emaildomain';
    const TYPE_SOCIAL_SECURITY_NUMBER = 'socialsecuritynumber';
    const TYPE_PHONE_NUMBER = 'phonenumber';
    const TYPE_CARD_NUMBER = 'cardnumber';
    const TYPE_IBAN = 'ibannumber';
    const TYPE_ISSUE_REFERENCE = 'issuerreference';
    const TYPE_ISSUE_COUNTRY = 'issuingcountry';
    const TYPE_COOKIE = 'persistentcookie';
    const TYPE_IP_COUNTRY = 'ipcountry';
    const TYPE_PAYMENT_REFERENCE = 'paymentreference';

    /**
     * @param string $accountCode
     * @param string $referralType
     * @param string $action
     * @param array $referrals
     * @param string $reason
     *
     * @return array
     */
    public function buildReferralRequest($accountCode, $referralType, $action, $referrals, $reason = '')
    {
        $data = $this->buildCommonRequestData($accountCode, $referralType, $action, $reason);
        $data['referrals'] = $referrals;
        return $data;
    }

    /**
     * @param string $accountCode
     * @param string $referralType
     * @param string $action
     * @param array $referrals
     * @param string $reason
     *
     * @return array
     */
    public function buildPaymentReferralRequest($accountCode, $referralType, $action, $referrals, $reason = '')
    {
        $data = $this->buildCommonRequestData($accountCode, $referralType, $action, $reason);
        $data['paymentReferenceReferrals'] = $referrals;
        return $data;
    }

    /**
     * @param string $referral
     *
     * @return array
     */
    public function buildReferralContainer($referral)
    {
        return
            array(
                'referralContainer' => array(
                    'referral' => $referral
                )
            );
    }

    /**
     * @param array $addresses
     *
     * @return array
     */
    public function buildAddressReferralContainer($addresses)
    {
        $data = array(
            'addressReferrals' => array()
        );

        foreach ($addresses as $address) {
            $data['addressReferrals'][] = array(
                'shopperAddress' => $address
            );
        }

        return $data;
    }

    /**
     * @param string $pspReference
     * @param array $referralTypes
     *
     * @return array
     */
    public function buildPaymentReferralContainer($pspReference, $referralTypes)
    {
        return
            array(
                'paymentReferenceReferral' => array(
                    'pspReference' => $pspReference,
                    'referralTypes' => $referralTypes
                )
            );
    }

    /**
     * @param string $accountCode
     * @param string $referralType
     * @param string $action
     * @param string $reason
     *
     * @return array
     */
    private function buildCommonRequestData($accountCode, $referralType, $action, $reason = '')
    {
        $data = array(
            'accountCode' => $accountCode,
            'referralType' => $referralType,
            'action' => $action
        );

        if (!empty($reason)) {
            $data['reason'] = $reason;
        }

        return $data;
    }
}
