<?php

namespace Adyen\Service;


class Checkout extends \Adyen\Service
{
    protected $_setup;
    protected $_verify;
    protected $_paymentMethods;
    protected $_payments;
    protected $_paymentsDetails;

    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->_setup = new \Adyen\Service\ResourceModel\Checkout\Setup($this);
        $this->_verify = new \Adyen\Service\ResourceModel\Checkout\Verify($this);
        $this->_paymentMethods = new \Adyen\Service\ResourceModel\Checkout\PaymentMethods($this);
        $this->_payments = new \Adyen\Service\ResourceModel\Checkout\Payments($this);
        $this->_paymentsDetails = new \Adyen\Service\ResourceModel\Checkout\PaymentsDetails($this);
        $this->_supportsXAPIKey = true;

    }

    public function setup($params)
    {
        $result = $this->_setup->request($params);
        return $result;
    }

    public function verify($params)
    {
        $result = $this->_verify->request($params);
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