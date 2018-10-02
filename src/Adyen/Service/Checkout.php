<?php

namespace Adyen\Service;


class Checkout extends \Adyen\ApiKeyAuthenticatedService
{
    protected $_paymentSession;
    protected $_paymentsResult;
    protected $_paymentMethods;
    protected $_payments;
    protected $_paymentsDetails;

    /**
     * Checkout constructor.
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->_paymentSession = new \Adyen\Service\ResourceModel\Checkout\PaymentSession($this);
        $this->_paymentsResult = new \Adyen\Service\ResourceModel\Checkout\PaymentsResult($this);
        $this->_paymentMethods = new \Adyen\Service\ResourceModel\Checkout\PaymentMethods($this);
        $this->_payments = new \Adyen\Service\ResourceModel\Checkout\Payments($this);
        $this->_paymentsDetails = new \Adyen\Service\ResourceModel\Checkout\PaymentsDetails($this);
    }

    public function paymentSession($params)
    {
        $result = $this->_paymentSession->request($params);
        return $result;
    }

    public function paymentsResult($params)
    {
        $result = $this->_paymentsResult->request($params);
        return $result;
    }

    public function paymentMethods($params)
    {
        $result = $this->_paymentMethods->request($params);
        return $result;
    }

    public function payments($params)
    {
        $result = $this->_payments->request($params);
        return $result;
    }

    public function paymentsDetails($params)
    {
        $result = $this->_paymentsDetails->request($params);
        return $result;
    }


}