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
}
