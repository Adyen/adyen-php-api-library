<?php

namespace Adyen\Service;

class Checkout extends \Adyen\ApiKeyAuthenticatedService
{
	/**
	 * @var ResourceModel\Checkout\PaymentSession
	 */
	protected $_paymentSession;

	/**
	 * @var ResourceModel\Checkout\PaymentsResult
	 */
	protected $_paymentsResult;

	/**
	 * @var ResourceModel\Checkout\PaymentMethods
	 */
	protected $_paymentMethods;

	/**
	 * @var ResourceModel\Checkout\Payments
	 */
	protected $_payments;

	/**
	 * @var ResourceModel\Checkout\PaymentsDetails
	 */
	protected $_paymentsDetails;

	/**
	 * Checkout constructor.
	 *
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

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function paymentSession($params)
	{
		$result = $this->_paymentSession->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function paymentsResult($params)
	{
		$result = $this->_paymentsResult->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function paymentMethods($params)
	{
		$result = $this->_paymentMethods->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function payments($params)
	{
		$result = $this->_payments->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function paymentsDetails($params)
	{
		$result = $this->_paymentsDetails->request($params);
		return $result;
	}
}
