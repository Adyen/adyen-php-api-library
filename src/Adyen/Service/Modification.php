<?php

namespace Adyen\Service;

class Modification extends \Adyen\Service
{
	/**
	 * @var ResourceModel\Modification\Cancel
	 */
	protected $_cancel;

	/**
	 * @var ResourceModel\Modification\CancelOrRefund
	 */
	protected $_cancelOrRefund;

	/**
	 * @var ResourceModel\Modification\Capture
	 */
	protected $_capture;

	/**
	 * @var ResourceModel\Modification\Refund
	 */
	protected $_refund;

	/**
	 * @var ResourceModel\Modification\AdjustAuthorisation
	 */
	protected $_adjustAuthorisation;

	/**
	 * Modification constructor.
	 *
	 * @param \Adyen\Client $client
	 * @throws \Adyen\AdyenException
	 */
	public function __construct(\Adyen\Client $client)
	{
		parent::__construct($client);
		$this->_cancel = new \Adyen\Service\ResourceModel\Modification\Cancel($this);
		$this->_cancelOrRefund = new \Adyen\Service\ResourceModel\Modification\CancelOrRefund($this);
		$this->_capture = new \Adyen\Service\ResourceModel\Modification\Capture($this);
		$this->_refund = new \Adyen\Service\ResourceModel\Modification\Refund($this);
		$this->_adjustAuthorisation = new \Adyen\Service\ResourceModel\Modification\AdjustAuthorisation($this);
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function cancel($params)
	{
		$result = $this->_cancel->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function cancelOrRefund($params)
	{
		$result = $this->_cancelOrRefund->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function capture($params)
	{
		$result = $this->_capture->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function refund($params)
	{
		$result = $this->_refund->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function adjustAuthorisation($params)
	{
		$result = $this->_adjustAuthorisation->request($params);
		return $result;
	}
}
