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

use Adyen\Exception\AdyenException;
use Adyen\Service\Checkout\OrdersApi;
use Adyen\Tests\Unit\BaseTest;

class OrdersApiTest extends BaseTest
{
    public function testOrdersSendsExpectedUrl(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/orders-success.json', 200, $container);
        $service = new OrdersApi($this->createConfiguration(), $client);

        $service->orders(new \Adyen\Model\Checkout\CreateOrderRequest());

        $request = $container[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('https://checkout-test.adyen.com/v72/orders', (string) $request->getUri());
    }

    public function testOrdersOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-methods-forbidden.json', 403);
        $service = new OrdersApi($this->createConfiguration(), $client);

        try {
            $service->orders(new \Adyen\Model\Checkout\CreateOrderRequest());
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden', $exception->getMessage());
            $error = $exception->getError();
            $this->assertNotNull($error);
            $this->assertSame('010', $error->getErrorCode());
        }
    }

    public function testOrdersAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-methods-forbidden.json', 403);
        $service = new OrdersApi($this->createConfiguration(), $client);

        try {
            $service->ordersAsync(new \Adyen\Model\Checkout\CreateOrderRequest())->wait();
            $this->fail('Expected an AdyenException for HTTP 403');
        } catch (AdyenException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
            $this->assertSame('Forbidden', $exception->getMessage());
            $error = $exception->getError();
            $this->assertNotNull($error);
            $this->assertSame('010', $error->getErrorCode());
        }
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testOrders()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/orders-success.json',
            200
        );
        $service = new OrdersApi($this->createConfiguration(), $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(2500);

        $createOrderRequest = new \Adyen\Model\Checkout\CreateOrderRequest();
        $createOrderRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $createOrderRequest->setReference("shopper-reference-ekvL83");
        $createOrderRequest->setAmount($amount);

        $result = $service->orders($createOrderRequest);

        $this->assertInstanceOf(\Adyen\Model\Checkout\CreateOrderResponse::class, $result);
        $this->assertEquals('8616178914061985', $result->getPspReference());
        $this->assertEquals('Success', $result->getResultCode());
        $this->assertEquals(2500, $result->getRemainingAmount()->getValue());
        $this->assertNotEmpty($result->getOrderData());
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testOrdersWithArray()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/orders-success.json', 200);
        $service = new OrdersApi($this->createConfiguration(), $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'reference' => "shopper-reference-ekvL83",
            'amount' => array('currency' => "EUR", 'value' => 2500),
        );

        $result = $service->orders(new \Adyen\Model\Checkout\CreateOrderRequest($params));

        $this->assertEquals('8616178914061985', $result['pspReference']);
        $this->assertEquals('Success', $result['resultCode']);
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testOrdersArrayResponse()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/orders-success.json', 200);
        $service = new OrdersApi($this->createConfiguration(), $client);

        $createOrderRequest = new \Adyen\Model\Checkout\CreateOrderRequest();
        $createOrderRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $resultArray = $service->orders($createOrderRequest)->toArray();

        $this->assertEquals('8616178914061985', $resultArray['pspReference']);
        $this->assertEquals('Success', $resultArray['resultCode']);
        $this->assertEquals(array('currency' => 'EUR', 'value' => 2500), $resultArray['remainingAmount']);
        $this->assertEquals('2021-04-09T14:16:46Z', $resultArray['expiresAt']);
        $this->assertNotEmpty($resultArray['orderData']);
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCancelOrder()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/cancelOrder-success.json',
            200
        );
        $service = new OrdersApi($this->createConfiguration(), $client);

        $order = new \Adyen\Model\Checkout\EncryptedOrderData();
        $order->setOrderData("823fh892f8f18f4...148f13f9f3f");
        $order->setPspReference("8815517812932012");

        $cancelOrderRequest = new \Adyen\Model\Checkout\CancelOrderRequest();
        $cancelOrderRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $cancelOrderRequest->setOrder($order);

        $result = $service->cancelOrder($cancelOrderRequest);

        $this->assertInstanceOf(\Adyen\Model\Checkout\CancelOrderResponse::class, $result);
        $this->assertEquals('8816178914079738', $result->getPspReference());
        $this->assertEquals('Received', $result->getResultCode());
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCancelOrderWithArray()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/cancelOrder-success.json', 200);
        $service = new OrdersApi($this->createConfiguration(), $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'order' => array(
                'orderData' => "823fh892f8f18f4...148f13f9f3f",
                'pspReference' => "8815517812932012",
            ),
        );

        $result = $service->cancelOrder(new \Adyen\Model\Checkout\CancelOrderRequest($params));

        $this->assertEquals('8816178914079738', $result['pspReference']);
        $this->assertEquals('Received', $result['resultCode']);
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCancelOrderArrayResponse()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/cancelOrder-success.json', 200);
        $service = new OrdersApi($this->createConfiguration(), $client);

        $cancelOrderRequest = new \Adyen\Model\Checkout\CancelOrderRequest();
        $cancelOrderRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $resultArray = $service->cancelOrder($cancelOrderRequest)->toArray();

        $this->assertEquals('8816178914079738', $resultArray['pspReference']);
        $this->assertEquals('Received', $resultArray['resultCode']);
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetBalanceOfGiftCard()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/getBalanceOfGiftCard-success.json',
            200
        );
        $service = new OrdersApi($this->createConfiguration(), $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(100);

        $balanceCheckRequest = new \Adyen\Model\Checkout\BalanceCheckRequest();
        $balanceCheckRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $balanceCheckRequest->setAmount($amount);
        $balanceCheckRequest->setPaymentMethod(array('type' => 'giftcard', 'brand' => 'givex'));

        $result = $service->getBalanceOfGiftCard($balanceCheckRequest);

        $this->assertInstanceOf(\Adyen\Model\Checkout\BalanceCheckResponse::class, $result);
        $this->assertEquals('Success', $result->getResultCode());
        $this->assertEquals(5000, $result->getBalance()->getValue());
        $this->assertEquals('EUR', $result->getBalance()->getCurrency());
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetBalanceOfGiftCardWithArray()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/getBalanceOfGiftCard-success.json',
            200
        );
        $service = new OrdersApi($this->createConfiguration(), $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'amount' => array('currency' => "EUR", 'value' => 100),
            'paymentMethod' => array('type' => 'giftcard', 'brand' => 'givex'),
        );

        $result = $service->getBalanceOfGiftCard(new \Adyen\Model\Checkout\BalanceCheckRequest($params));

        $this->assertEquals('Success', $result['resultCode']);
        $this->assertSame(5000, $result['balance']['value']);
    }

    /**
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetBalanceOfGiftCardArrayResponse()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/getBalanceOfGiftCard-success.json',
            200
        );
        $service = new OrdersApi($this->createConfiguration(), $client);

        $balanceCheckRequest = new \Adyen\Model\Checkout\BalanceCheckRequest();
        $balanceCheckRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $resultArray = $service->getBalanceOfGiftCard($balanceCheckRequest)->toArray();

        $this->assertEquals('KHQC5N7G84BLNK43', $resultArray['pspReference']);
        $this->assertEquals('Success', $resultArray['resultCode']);
        $this->assertEquals(array('currency' => 'EUR', 'value' => 5000), $resultArray['balance']);
    }
}
