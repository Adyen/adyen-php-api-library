<?php

namespace Adyen\Service;

class Checkout extends \Adyen\ApiKeyAuthenticatedService
{
    /**
     * @var ResourceModel\Checkout\PaymentSession
     */
    protected $paymentSession;

    /**
     * @var ResourceModel\Checkout\PaymentsResult
     */
    protected $paymentsResult;

    /**
     * @var ResourceModel\Checkout\PaymentMethods
     */
    protected $paymentMethods;

    /**
     * @var ResourceModel\Checkout\Payments
     */
    protected $payments;

    /**
     * @var ResourceModel\Checkout\PaymentsDetails
     */
    protected $paymentsDetails;

    /**
     * @var ResourceModel\Checkout\PaymentLinks
     */
    protected $paymentLinks;

    /**
     * @var ResourceModel\Checkout\Orders
     */
    protected $orders;

    /**
     * @var ResourceModel\Checkout\OrdersCancel
     */
    protected $ordersCancel;

    /**
     * @var ResourceModel\Checkout\PaymentMethodsBalance
     */
    protected $paymentMethodsBalance;

    /**
     * Checkout constructor.
     *
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->paymentSession = new \Adyen\Service\ResourceModel\Checkout\PaymentSession($this);
        $this->paymentsResult = new \Adyen\Service\ResourceModel\Checkout\PaymentsResult($this);
        $this->paymentMethods = new \Adyen\Service\ResourceModel\Checkout\PaymentMethods($this);
        $this->payments = new \Adyen\Service\ResourceModel\Checkout\Payments($this);
        $this->paymentsDetails = new \Adyen\Service\ResourceModel\Checkout\PaymentsDetails($this);
        $this->paymentLinks = new \Adyen\Service\ResourceModel\Checkout\PaymentLinks($this);
        $this->orders = new \Adyen\Service\ResourceModel\Checkout\Orders($this);
        $this->ordersCancel = new \Adyen\Service\ResourceModel\Checkout\OrdersCancel($this);
        $this->paymentMethodsBalance = new \Adyen\Service\ResourceModel\Checkout\PaymentMethodsBalance($this);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function paymentSession($params)
    {
        $result = $this->paymentSession->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function paymentsResult($params)
    {
        $result = $this->paymentsResult->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function paymentMethods($params)
    {
        $result = $this->paymentMethods->request($params);
        return $result;
    }

    /**
     * @param $params
     * @param null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function payments($params, $requestOptions = null)
    {
        $result = $this->payments->request($params, $requestOptions);
        return $result;
    }

    /**
     * @param $params
     * @param null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function paymentsDetails($params, $requestOptions = null)
    {
        $result = $this->paymentsDetails->request($params, $requestOptions);
        return $result;
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function paymentLinks($params, $requestOptions = null)
    {
        return $this->paymentLinks->request($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function paymentMethodsBalance($params, $requestOptions = null)
    {
        return $this->paymentMethodsBalance->request($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function orders($params, $requestOptions = null)
    {
        return $this->orders->request($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function ordersCancel($params, $requestOptions = null)
    {
        return $this->ordersCancel->request($params, $requestOptions);
    }
}
