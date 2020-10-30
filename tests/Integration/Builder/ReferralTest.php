<?php

namespace Adyen\Tests\Integration\Builder;

use Adyen\Service\Builder\Referral;
use Adyen\TestCase;

class ReferralTest extends TestCase
{
    public function testPaymentReferralRequest()
    {
        $expectedResult = array(
            'accountCode' => 'TestMerchant',
            'referralType' => 'shopperemail',
            'action' => 'block',
            'paymentReferenceReferrals' => array(
                array(
                    'paymentReferenceReferral' => array(
                        'pspReference' => '9900000000000001',
                        'referralTypes' => array(
                            'cardnumber',
                            'shopperemail'
                        )
                    )
                )
            ),
            'reason' => 'test behaviour'
        );

        $referral = new Referral();
        $result = $referral->buildPaymentReferralRequest(
            'TestMerchant',
            Referral::TYPE_SHOPPER_EMAIL,
            Referral::ACTION_BLOCK,
            array(
                $referral->buildPaymentReferralContainer(
                    '9900000000000001',
                    array(
                        'cardnumber',
                        'shopperemail'
                    )
                )
            ),
            'test behaviour'
        );
        $this->assertEquals($result, $expectedResult);
    }

    public function testReferralRequest()
    {
        $expectedResult = array(
            'accountCode' => 'TestMerchant',
            'referralType' => 'shopperemail',
            'action' => 'block',
            'referrals' => array(
                'referralContainer' => array(
                    'referral' => 'johnsmith@example.com'
                )
            ),
            'reason' => 'test behaviour'
        );

        $referral = new Referral();
        $result = $referral->buildReferralRequest(
            'TestMerchant',
            Referral::TYPE_SHOPPER_EMAIL,
            Referral::ACTION_BLOCK,
            $referral->buildReferralContainer('johnsmith@example.com'),
            'test behaviour'
        );
        $this->assertEquals($result, $expectedResult);
    }

    public function testBuildReferralContainer()
    {
        $expectedResult = array(
            'referralContainer' => array(
                'referral' => 'johnsmith@example.com'
            )
        );

        $referral = new Referral();
        $result = $referral->buildReferralContainer('johnsmith@example.com');
        $this->assertEquals($result, $expectedResult);
    }

    public function testBuildPaymentReferralContainer()
    {
        $pspReference = '9900000000000001';

        $referralTypes = array(
            'cardnumber',
            'shopperemail'
        );

        $expectedResult = array(
            'paymentReferenceReferral' => array(
                'pspReference' => $pspReference,
                'referralTypes' => $referralTypes
            )
        );

        $referral = new Referral();
        $result = $referral->buildPaymentReferralContainer($pspReference, $referralTypes);
        $this->assertEquals($result, $expectedResult);
    }

    public function testBuildAddressReferralContainer()
    {
        $addresses = array(
            array(
                'street' => 'Main St',
                'houseNumberOrName' => '2',
                'city' => 'Amsterdam',
                'postalCode' => '1000AA',
                'stateOrProvince' => 'Noord-Holland',
                'countryCode' => 'NL'
            ),
            array(
                'street' => 'West lane',
                'houseNumberOrName' => '2',
                'city' => 'London',
                'postalCode' => '1100AB',
                'stateOrProvince' => 'England',
                'countryCode' => 'UK'
            ),
        );

        $expectedResult = array(
            'addressReferrals' => array(
                array(
                    'shopperAddress' => $addresses[0]
                ),
                array(
                    'shopperAddress' => $addresses[1]
                )
            )
        );

        $referral = new Referral();
        $result = $referral->buildAddressReferralContainer($addresses);
        $this->assertEquals($result, $expectedResult);
    }
}
