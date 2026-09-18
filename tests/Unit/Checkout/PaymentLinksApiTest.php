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
use Adyen\Model\Checkout\PaymentLinkRequest;
use Adyen\Model\Checkout\UpdatePaymentLinkRequest;
use Adyen\Service\Checkout\PaymentLinksApi;
use Adyen\Tests\Unit\BaseTest;

class PaymentLinksApiTest extends BaseTest
{

    /**
     * @dataProvider failurePaymentsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksFailure(
        $jsonFile,
        $httpStatus,
        $expectedExceptionMessage
    ) {
        // create Checkout client
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        // initialize service
        $service = new PaymentLinksApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("BRL");
        $amount->setValue(1250);

        $billingAddress = new \Adyen\Model\Checkout\Address();
        $billingAddress->setStreet("Roque Petroni Jr");
        $billingAddress->setPostalCode("59000060");
        $billingAddress->setCity("São Paulo");
        $billingAddress->setHouseNumberOrName("999");
        $billingAddress->setCountry("BR");
        $billingAddress->setStateOrProvince("SP");

        $deliveryAddress = new \Adyen\Model\Checkout\Address();
        $deliveryAddress->setStreet("Roque Petroni Jr");
        $deliveryAddress->setPostalCode("59000060");
        $deliveryAddress->setCity("São Paulo");
        $deliveryAddress->setHouseNumberOrName("999");
        $deliveryAddress->setCountry("BR");
        $deliveryAddress->setStateOrProvince("SP");

        $paymentLinkRequest = new \Adyen\Model\Checkout\PaymentLinkRequest();
        $paymentLinkRequest->setMerchantAccount("YourMerchantAccount");
        $paymentLinkRequest->setReference('12345');
        $paymentLinkRequest->setAmount($amount);
        $paymentLinkRequest->setCountryCode("BR");
        $paymentLinkRequest->setShopperReference("YourUniqueShopperId");
        $paymentLinkRequest->setShopperEmail("test@email.com");
        $paymentLinkRequest->setShopperLocale("pt_BR");
        $paymentLinkRequest->setBillingAddress($billingAddress);
        $paymentLinkRequest->setDeliveryAddress($deliveryAddress);


        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);
        $service->paymentLinks($paymentLinkRequest);
    }

    public static function failurePaymentsProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/invalid-merchant-account.json', 403, "Invalid Merchant Account"),
            array('tests/Resources/Checkout/payments-forbidden.json', 403, "Forbidden")
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successPaymentsLinkProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksSuccessWithArray($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'reference' => '12345',
            'amount' => array('currency' => "BRL", 'value' => 1250),
            'countryCode' => "BR",
            'shopperReference' => "YourUniqueShopperId",
            'shopperEmail' => "test@email.com",
            'shopperLocale' => "pt_BR",
            'billingAddress' => $this->getExampleAddressStruct(),
            'deliveryAddress' => $this->getExampleAddressStruct(),
        );

        $result = $service->paymentLinks(new PaymentLinkRequest($params));

        $this->assertStringContainsString('payByLink.shtml', $result['url']);
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successPaymentsLinkProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        // initialize service
        $service = new PaymentLinksApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("BRL");
        $amount->setValue(1250);

        $billingAddress = new \Adyen\Model\Checkout\Address();
        $billingAddress->setStreet("Roque Petroni Jr");
        $billingAddress->setPostalCode("59000060");
        $billingAddress->setCity("São Paulo");
        $billingAddress->setHouseNumberOrName("999");
        $billingAddress->setCountry("BR");
        $billingAddress->setStateOrProvince("SP");

        $deliveryAddress = new \Adyen\Model\Checkout\Address();
        $deliveryAddress->setStreet("Roque Petroni Jr");
        $deliveryAddress->setPostalCode("59000060");
        $deliveryAddress->setCity("São Paulo");
        $deliveryAddress->setHouseNumberOrName("999");
        $deliveryAddress->setCountry("BR");
        $deliveryAddress->setStateOrProvince("SP");

        $paymentLinkRequest = new \Adyen\Model\Checkout\PaymentLinkRequest();
        $paymentLinkRequest->setMerchantAccount("YourMerchantAccount");
        $paymentLinkRequest->setReference('12345');
        $paymentLinkRequest->setAmount($amount);
        $paymentLinkRequest->setCountryCode("BR");
        $paymentLinkRequest->setShopperReference("YourUniqueShopperId");
        $paymentLinkRequest->setShopperEmail("test@email.com");
        $paymentLinkRequest->setShopperLocale("pt_BR");
        $paymentLinkRequest->setBillingAddress($billingAddress);
        $paymentLinkRequest->setDeliveryAddress($deliveryAddress);

        $result = $service->paymentLinks($paymentLinkRequest);

        $this->assertStringContainsString('payByLink.shtml', $result['url']);
    }

    public static function successPaymentsLinkProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/payment-links-success.json', 200)
        );
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksExpiredWithArray()
    {
        // create Checkout client
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-links-expired.json', 200);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $params = array(
            'status' => "expired"
        );

        $result = $service->updatePaymentLink('linkid', new UpdatePaymentLinkRequest($params));

        $this->assertEquals('expired', $result['status']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksExpired()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-links-expired.json', 200);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $updatePaymentLinkRequest = new \Adyen\Model\Checkout\UpdatePaymentLinkRequest();
        $updatePaymentLinkRequest->setStatus("expired");

        $result = $service->updatePaymentLink('linkid', $updatePaymentLinkRequest);

        $this->assertEquals('expired', $result->getStatus());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksExpiredArrayResponse()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-links-expired.json', 200);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $updatePaymentLinkRequest = new \Adyen\Model\Checkout\UpdatePaymentLinkRequest();
        $updatePaymentLinkRequest->setStatus("expired");

        $resultArray = $service->updatePaymentLink('linkid', $updatePaymentLinkRequest)->toArray();

        $this->assertEquals('expired', $resultArray['status']);
        $this->assertEquals(array('currency' => 'BRL', 'value' => 1250), $resultArray['amount']);
        $this->assertEquals('2020-06-30T08:23:18+00:00', $resultArray['expiresAt']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksRetrieveSuccess()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-links-success.json', 200);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $result = $service->getPaymentLink('linkId');

        $this->assertStringContainsString('payByLink.shtml', $result['url']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksInvalidWithArray()
    {
        // create Checkout client
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-links-invalid.json', 422);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'amount' => array('currency' => "BRL", 'value' => 1250),
            'countryCode' => "BR",
            'shopperReference' => "YourUniqueShopperId",
            'shopperEmail' => "test@email.com",
            'shopperLocale' => "pt_BR",
            'billingAddress' => $this->getExampleAddressStruct(),
            'deliveryAddress' => $this->getExampleAddressStruct(),
        );

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('Reference Missing');

        $service->paymentLinks(new PaymentLinkRequest($params));
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksInvalid()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-links-invalid.json', 422);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("BRL");
        $amount->setValue(1250);

        $billingAddress = new \Adyen\Model\Checkout\Address();
        $billingAddress->setStreet("Roque Petroni Jr");
        $billingAddress->setPostalCode("59000060");
        $billingAddress->setCity("São Paulo");
        $billingAddress->setHouseNumberOrName("999");
        $billingAddress->setCountry("BR");
        $billingAddress->setStateOrProvince("SP");

        $deliveryAddress = new \Adyen\Model\Checkout\Address();
        $deliveryAddress->setStreet("Roque Petroni Jr");
        $deliveryAddress->setPostalCode("59000060");
        $deliveryAddress->setCity("São Paulo");
        $deliveryAddress->setHouseNumberOrName("999");
        $deliveryAddress->setCountry("BR");
        $deliveryAddress->setStateOrProvince("SP");

        $paymentLinkRequest = new \Adyen\Model\Checkout\PaymentLinkRequest();
        $paymentLinkRequest->setMerchantAccount("YourMerchantAccount");
        $paymentLinkRequest->setAmount($amount);
        $paymentLinkRequest->setCountryCode("BR");
        $paymentLinkRequest->setShopperReference("YourUniqueShopperId");
        $paymentLinkRequest->setShopperEmail("test@email.com");
        $paymentLinkRequest->setShopperLocale("pt_BR");
        $paymentLinkRequest->setBillingAddress($billingAddress);
        $paymentLinkRequest->setDeliveryAddress($deliveryAddress);

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('Reference Missing');

        $service->paymentLinks($paymentLinkRequest);
    }

    private function getExampleAddressStruct(): array
    {
        return array(
            'street' => "Roque Petroni Jr",
            'postalCode' => "59000060",
            'city' => "São Paulo",
            'houseNumberOrName' => "999",
            'country' => "BR",
            'stateOrProvince' => "SP",
        );
    }
}
