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
use Adyen\Service\Checkout\ModificationsApi;
use Adyen\Tests\Unit\BaseTest;

class ModificationsApiTest extends BaseTest
{

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCaptureAuthorisedPayment()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/payments-capture-success.json',
            201,
            $container
        );
        $config = $this->createConfiguration();

        $service = new ModificationsApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("USD");
        $amount->setValue(2000);

        $paymentCaptureRequest = new \Adyen\Model\Checkout\PaymentCaptureRequest();
        $paymentCaptureRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $paymentCaptureRequest->setReference("YOUR_UNIQUE_REFERENCE");
        $paymentCaptureRequest->setAmount($amount);

        $result = $service->captureAuthorisedPayment('993617894903480A', $paymentCaptureRequest);

        $request = $container[0]['request'];
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/993617894903480A/captures',
            (string) $request->getUri()
        );

        $this->assertInstanceOf(\Adyen\Model\Checkout\PaymentCaptureResponse::class, $result);
        $this->assertEquals('993617894906488A', $result->getPspReference());
        $this->assertEquals('993617894903480A', $result->getPaymentPspReference());
        $this->assertEquals('received', $result->getStatus());
        $this->assertEquals('USD', $result->getAmount()->getCurrency());
        $this->assertEquals(2000, $result->getAmount()->getValue());
        $this->assertCount(2, $result->getSplits());
        $this->assertEquals('MarketPlace', $result->getSplits()[0]->getType());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCaptureAuthorisedPaymentWithArray()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payments-capture-success.json', 201);
        $config = $this->createConfiguration();

        $service = new ModificationsApi($config, $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'reference' => "YOUR_UNIQUE_REFERENCE",
            'amount' => array('currency' => "USD", 'value' => 2000),
        );

        $result = $service->captureAuthorisedPayment(
            '993617894903480A',
            new \Adyen\Model\Checkout\PaymentCaptureRequest($params)
        );

        $this->assertEquals('993617894906488A', $result['pspReference']);
        $this->assertEquals('received', $result['status']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCaptureAuthorisedPaymentArrayResponse()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payments-capture-success.json', 201);
        $config = $this->createConfiguration();

        $service = new ModificationsApi($config, $client);

        $paymentCaptureRequest = new \Adyen\Model\Checkout\PaymentCaptureRequest();
        $paymentCaptureRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $resultArray = $service->captureAuthorisedPayment('993617894903480A', $paymentCaptureRequest)->toArray();

        $this->assertEquals(array('currency' => 'USD', 'value' => 2000), $resultArray['amount']);
        $this->assertCount(2, $resultArray['splits']);
        $this->assertEquals(
            array(
                'account' => '8816080397613514',
                'amount' => array('value' => 1500),
                'reference' => 'Your reference for the sale amount.',
                'type' => 'MarketPlace',
            ),
            $resultArray['splits'][0]
        );
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCancelAuthorisedPayment()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/cancelAuthorisedPayment-success.json',
            201,
            $container
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $standalonePaymentCancelRequest = new \Adyen\Model\Checkout\StandalonePaymentCancelRequest();
        $standalonePaymentCancelRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $standalonePaymentCancelRequest->setPaymentReference("YOUR_UNIQUE_REFERENCE_FOR_THE_PAYMENT");

        $result = $service->cancelAuthorisedPayment($standalonePaymentCancelRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/cancels',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\StandalonePaymentCancelResponse::class, $result);
        $this->assertEquals('993617894906488A', $result->getPspReference());
        $this->assertEquals('YOUR_UNIQUE_REFERENCE_FOR_THE_PAYMENT', $result->getPaymentReference());
        $this->assertEquals('received', $result->getStatus());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCancelAuthorisedPaymentWithArray()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/cancelAuthorisedPayment-success.json',
            201
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'paymentReference' => "YOUR_UNIQUE_REFERENCE_FOR_THE_PAYMENT",
        );

        $result = $service->cancelAuthorisedPayment(
            new \Adyen\Model\Checkout\StandalonePaymentCancelRequest($params)
        );

        $this->assertEquals('993617894906488A', $result['pspReference']);
        $this->assertEquals('received', $result['status']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCancelAuthorisedPaymentArrayResponse()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/cancelAuthorisedPayment-success.json',
            201
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $standalonePaymentCancelRequest = new \Adyen\Model\Checkout\StandalonePaymentCancelRequest();
        $standalonePaymentCancelRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $resultArray = $service->cancelAuthorisedPayment($standalonePaymentCancelRequest)->toArray();

        $this->assertEquals('993617894906488A', $resultArray['pspReference']);
        $this->assertEquals('YOUR_UNIQUE_REFERENCE_FOR_THE_PAYMENT', $resultArray['paymentReference']);
        $this->assertEquals('received', $resultArray['status']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCancelAuthorisedPaymentByPspReference()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/cancelAuthorisedPaymentByPspReference-success.json',
            201,
            $container
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $paymentCancelRequest = new \Adyen\Model\Checkout\PaymentCancelRequest();
        $paymentCancelRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $paymentCancelRequest->setReference("YOUR_UNIQUE_REFERENCE");

        $result = $service->cancelAuthorisedPaymentByPspReference('993617894903480A', $paymentCancelRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/993617894903480A/cancels',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\PaymentCancelResponse::class, $result);
        $this->assertEquals('993617894906488A', $result->getPspReference());
        $this->assertEquals('993617894903480A', $result->getPaymentPspReference());
        $this->assertEquals('received', $result->getStatus());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCancelAuthorisedPaymentByPspReferenceWithArray()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/cancelAuthorisedPaymentByPspReference-success.json',
            201
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'reference' => "YOUR_UNIQUE_REFERENCE",
        );

        $result = $service->cancelAuthorisedPaymentByPspReference(
            '993617894903480A',
            new \Adyen\Model\Checkout\PaymentCancelRequest($params)
        );

        $this->assertEquals('993617894906488A', $result['pspReference']);
        $this->assertEquals('received', $result['status']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCancelAuthorisedPaymentByPspReferenceArrayResponse()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/cancelAuthorisedPaymentByPspReference-success.json',
            201
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $paymentCancelRequest = new \Adyen\Model\Checkout\PaymentCancelRequest();
        $paymentCancelRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $resultArray = $service
            ->cancelAuthorisedPaymentByPspReference('993617894903480A', $paymentCancelRequest)
            ->toArray();

        $this->assertEquals('993617894906488A', $resultArray['pspReference']);
        $this->assertEquals('993617894903480A', $resultArray['paymentPspReference']);
        $this->assertEquals('received', $resultArray['status']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testRefundCapturedPayment()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/refundCapturedPayment-success.json',
            201,
            $container
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(2500);

        $paymentRefundRequest = new \Adyen\Model\Checkout\PaymentRefundRequest();
        $paymentRefundRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $paymentRefundRequest->setAmount($amount);

        $result = $service->refundCapturedPayment('993617894903480A', $paymentRefundRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/993617894903480A/refunds',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\PaymentRefundResponse::class, $result);
        $this->assertEquals('993617894906488A', $result->getPspReference());
        $this->assertEquals('received', $result->getStatus());
        $this->assertEquals(2500, $result->getAmount()->getValue());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testRefundCapturedPaymentWithArray()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/refundCapturedPayment-success.json',
            201
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'amount' => array('currency' => "EUR", 'value' => 2500),
        );

        $result = $service->refundCapturedPayment(
            '993617894903480A',
            new \Adyen\Model\Checkout\PaymentRefundRequest($params)
        );

        $this->assertEquals('993617894906488A', $result['pspReference']);
        $this->assertEquals('received', $result['status']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testRefundCapturedPaymentArrayResponse()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/refundCapturedPayment-success.json',
            201
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $paymentRefundRequest = new \Adyen\Model\Checkout\PaymentRefundRequest();
        $paymentRefundRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $resultArray = $service->refundCapturedPayment('993617894903480A', $paymentRefundRequest)->toArray();

        $this->assertEquals('993617894906488A', $resultArray['pspReference']);
        $this->assertEquals('received', $resultArray['status']);
        $this->assertEquals(array('currency' => 'EUR', 'value' => 2500), $resultArray['amount']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testRefundOrCancelPayment()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/refundOrCancelPayment-success.json',
            201,
            $container
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $paymentReversalRequest = new \Adyen\Model\Checkout\PaymentReversalRequest();
        $paymentReversalRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $paymentReversalRequest->setReference("YOUR_UNIQUE_REFERENCE");

        $result = $service->refundOrCancelPayment('993617894903480A', $paymentReversalRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/993617894903480A/reversals',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\PaymentReversalResponse::class, $result);
        $this->assertEquals('993617894906488A', $result->getPspReference());
        $this->assertEquals('received', $result->getStatus());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testRefundOrCancelPaymentWithArray()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/refundOrCancelPayment-success.json',
            201
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'reference' => "YOUR_UNIQUE_REFERENCE",
        );

        $result = $service->refundOrCancelPayment(
            '993617894903480A',
            new \Adyen\Model\Checkout\PaymentReversalRequest($params)
        );

        $this->assertEquals('993617894906488A', $result['pspReference']);
        $this->assertEquals('received', $result['status']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testRefundOrCancelPaymentArrayResponse()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/refundOrCancelPayment-success.json',
            201
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $paymentReversalRequest = new \Adyen\Model\Checkout\PaymentReversalRequest();
        $paymentReversalRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $resultArray = $service->refundOrCancelPayment('993617894903480A', $paymentReversalRequest)->toArray();

        $this->assertEquals('993617894906488A', $resultArray['pspReference']);
        $this->assertEquals('993617894903480A', $resultArray['paymentPspReference']);
        $this->assertEquals('received', $resultArray['status']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testUpdateAuthorisedAmount()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/updateAuthorisedAmount-success.json',
            201,
            $container
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(2500);

        $paymentAmountUpdateRequest = new \Adyen\Model\Checkout\PaymentAmountUpdateRequest();
        $paymentAmountUpdateRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $paymentAmountUpdateRequest->setAmount($amount);

        $result = $service->updateAuthorisedAmount('993617894903480A', $paymentAmountUpdateRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/993617894903480A/amountUpdates',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\PaymentAmountUpdateResponse::class, $result);
        $this->assertEquals('993617894906488A', $result->getPspReference());
        $this->assertEquals('received', $result->getStatus());
        $this->assertEquals(2500, $result->getAmount()->getValue());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testUpdateAuthorisedAmountWithArray()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/updateAuthorisedAmount-success.json',
            201
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'amount' => array('currency' => "EUR", 'value' => 2500),
        );

        $result = $service->updateAuthorisedAmount(
            '993617894903480A',
            new \Adyen\Model\Checkout\PaymentAmountUpdateRequest($params)
        );

        $this->assertEquals('993617894906488A', $result['pspReference']);
        $this->assertEquals('received', $result['status']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testUpdateAuthorisedAmountArrayResponse()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/updateAuthorisedAmount-success.json',
            201
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $paymentAmountUpdateRequest = new \Adyen\Model\Checkout\PaymentAmountUpdateRequest();
        $paymentAmountUpdateRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $resultArray = $service->updateAuthorisedAmount('993617894903480A', $paymentAmountUpdateRequest)->toArray();

        $this->assertEquals('993617894906488A', $resultArray['pspReference']);
        $this->assertEquals('993617894903480A', $resultArray['paymentPspReference']);
        $this->assertEquals('received', $resultArray['status']);
        $this->assertEquals(array('currency' => 'EUR', 'value' => 2500), $resultArray['amount']);
    }

    public function testDoublePathParamSubstitution()
    {
        $client = $this->createMockSerializerClient(null, 201);
        $config = $this->createConfiguration();

        $service = new ModificationsApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(2000);

        $paymentCaptureRequest = new \Adyen\Model\Checkout\PaymentCaptureRequest();
        $paymentCaptureRequest->setMerchantAccount("YourMerchantAccount");
        $paymentCaptureRequest->setAmount($amount);

        $firstRequest = $service->captureAuthorisedPaymentRequest('pspRef1', $paymentCaptureRequest);
        $secondRequest = $service->captureAuthorisedPaymentRequest('pspRef2', $paymentCaptureRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/pspRef1/captures',
            (string) $firstRequest->getUri()
        );
        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/pspRef2/captures',
            (string) $secondRequest->getUri()
        );
    }
}
