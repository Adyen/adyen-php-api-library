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
 * Copyright (c) 2020 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Tests\Unit\Checkout;

use Adyen\AdyenException;
use Adyen\Model\Checkout\DonationPaymentRequest;
use Adyen\Model\Checkout\DonationPaymentMethod;
use Adyen\Service\Checkout\DonationsApi;
use Adyen\Tests\Unit\BaseTest;

class DonationsApiTest extends BaseTest
{

    const HOLDER_NAME = "John Smith";
    const RETURN_URL = "https://your-company.com/...";

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successDonationsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDonationsSuccessWithArray($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new DonationsApi($config, $client);

        $params = array(
            'amount' => array('currency' => "BRL", 'value' => 1250),
            'reference' => '12345',
            'merchantAccount' => "YourMerchantAccount",
            'paymentMethod' => array(
                'type' => "scheme",
                'encryptedCardNumber' => 'test_4111111111111111',
                'encryptedExpiryMonth' => 'test_03',
                'encryptedExpiryYear' => 'test_2030',
                'encryptedSecurityCode' => 'test_737',
                'holderName' => self::HOLDER_NAME
            ),
            'donationToken' => "YOUR_DONATION_TOKEN",
            'donationOriginalPspReference' => "991559660454807J",
            'donationAccount' => "CHARITY_ACCOUNT",
            'returnUrl' => self::RETURN_URL,
            'shopperInteraction' => "Ecommerce"
        );

        $result = $service->donations(new DonationPaymentRequest($params));
        $this->assertEquals('YOUR_DONATION_REFERENCE', $result['reference']);
        $this->assertEquals('completed', $result['status']);
        $this->assertEquals('1234567890', $result['payment']['pspReference']);
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successDonationsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDonationsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new DonationsApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("BRL");
        $amount->setValue(1250);

        $paymentMethod = new \Adyen\Model\Checkout\DonationPaymentMethod();
        $paymentMethod->setType("scheme");
        $paymentMethod->setEncryptedCardNumber('test_4111111111111111');
        $paymentMethod->setEncryptedExpiryMonth('test_03');
        $paymentMethod->setEncryptedExpiryYear('test_2030');
        $paymentMethod->setEncryptedSecurityCode('test_737');
        $paymentMethod->setHolderName(self::HOLDER_NAME);

        $donationPaymentRequest = new \Adyen\Model\Checkout\DonationPaymentRequest();
        $donationPaymentRequest->setAmount($amount);
        $donationPaymentRequest->setReference('12345');
        $donationPaymentRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $donationPaymentRequest->setPaymentMethod($paymentMethod);
        $donationPaymentRequest->setDonationToken("YOUR_DONATION_TOKEN");
        $donationPaymentRequest->setDonationOriginalPspReference("991559660454807J");
        $donationPaymentRequest->setDonationAccount("CHARITY_ACCOUNT");
        $donationPaymentRequest->setReturnUrl(self::RETURN_URL);
        $donationPaymentRequest->setShopperInteraction("Ecommerce");

        $result = $service->donations($donationPaymentRequest);
        $this->assertEquals('YOUR_DONATION_REFERENCE', $result->getReference());
        $this->assertEquals('completed', $result->getStatus());
        $this->assertEquals('1234567890', $result->getPayment()->getPspReference());
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successDonationsProvider
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDonationsSuccessArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new DonationsApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("BRL");
        $amount->setValue(1250);

        $donationPaymentRequest = new \Adyen\Model\Checkout\DonationPaymentRequest();
        $donationPaymentRequest->setAmount($amount);
        $donationPaymentRequest->setReference('12345');
        $donationPaymentRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $donationPaymentRequest->setDonationAccount("CHARITY_ACCOUNT");
        $donationPaymentRequest->setReturnUrl(self::RETURN_URL);

        $resultArray = $service->donations($donationPaymentRequest)->toArray();

        $this->assertEquals('completed', $resultArray['status']);
        $this->assertIsArray($resultArray['payment']);
        $this->assertEquals('1234567890', $resultArray['payment']['pspReference']);
        $this->assertEquals(
            array('currency' => 'EUR', 'value' => 1000),
            $resultArray['payment']['amount']
        );
    }

    public static function successDonationsProvider()
    {
        return array(
            array('tests/Resources/Checkout/donations-success.json', 200),
        );
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDonationCampaigns()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/donationCampaigns-success.json',
            200,
            $container
        );
        $service = new DonationsApi($this->createConfiguration(), $client);

        $donationCampaignsRequest = new \Adyen\Model\Checkout\DonationCampaignsRequest();
        $donationCampaignsRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $donationCampaignsRequest->setCurrency("EUR");
        $donationCampaignsRequest->setLocale("en-US");

        $result = $service->donationCampaigns($donationCampaignsRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/donationCampaigns',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\DonationCampaignsResponse::class, $result);
        $this->assertNotEmpty($result->getDonationCampaigns());
        $this->assertEquals('DONATION_CAMPAIGN_ID', $result->getDonationCampaigns()[0]->getId());
        $this->assertEquals('NONPROFIT_NAME', $result->getDonationCampaigns()[0]->getNonprofitName());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDonationCampaignsWithArray()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/donationCampaigns-success.json',
            200
        );
        $service = new DonationsApi($this->createConfiguration(), $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'currency' => "EUR",
            'locale' => "en-US",
        );

        $result = $service->donationCampaigns(new \Adyen\Model\Checkout\DonationCampaignsRequest($params));

        $this->assertNotEmpty($result['donationCampaigns']);
        $this->assertEquals('DONATION_CAMPAIGN_ID', $result['donationCampaigns'][0]['id']);
    }

    /**
     * Covers a response shape the other array tests do not reach: a list of models, each holding a
     * nested model that itself holds a list of scalars.
     *
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDonationCampaignsArrayResponse()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/donationCampaigns-success.json', 200);
        $service = new DonationsApi($this->createConfiguration(), $client);

        $donationCampaignsRequest = new \Adyen\Model\Checkout\DonationCampaignsRequest();
        $donationCampaignsRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $resultArray = $service->donationCampaigns($donationCampaignsRequest)->toArray();

        $this->assertCount(2, $resultArray['donationCampaigns']);
        $this->assertEquals(
            array('currency' => 'EUR', 'donationType' => 'fixedAmounts', 'type' => 'fixedAmounts',
                'values' => array(100, 200, 300)),
            $resultArray['donationCampaigns'][0]['donation']
        );
    }
}
