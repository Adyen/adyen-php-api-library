<?php

namespace Adyen\Service;

class Modification extends \Adyen\Service
{
	/**
	 * @var ResourceModel\Modification\Cancel
	 */
	protected $cancel;

	/**
	 * @var ResourceModel\Modification\CancelOrRefund
	 */
	protected $cancelOrRefund;

	/**
	 * @var ResourceModel\Modification\Capture
	 */
	protected $capture;

	/**
	 * @var ResourceModel\Modification\Refund
	 */
	protected $refund;

	/**
	 * @var ResourceModel\Modification\RefundWithData
	 */
	protected $refundWithData;

	/**
	 * @var ResourceModel\Modification\AdjustAuthorisation
	 */
	protected $adjustAuthorisation;

	/**
	 * Modification constructor.
	 *
	 * @param \Adyen\Client $client
	 * @throws \Adyen\AdyenException
	 */
	public function __construct(\Adyen\Client $client)
	{
		parent::__construct($client);
		$this->cancel = new \Adyen\Service\ResourceModel\Modification\Cancel($this);
		$this->cancelOrRefund = new \Adyen\Service\ResourceModel\Modification\CancelOrRefund($this);
		$this->capture = new \Adyen\Service\ResourceModel\Modification\Capture($this);
		$this->refund = new \Adyen\Service\ResourceModel\Modification\Refund($this);
		$this->refundWithData = new \Adyen\Service\ResourceModel\Modification\RefundWithData($this);
		$this->adjustAuthorisation = new \Adyen\Service\ResourceModel\Modification\AdjustAuthorisation($this);
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function cancel($params)
	{
		$result = $this->cancel->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function cancelOrRefund($params)
	{
		$result = $this->cancelOrRefund->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function capture($params)
	{
		$result = $this->capture->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function refund($params)
	{
		$result = $this->refund->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function refundWithData($params)
	{
		$result = $this->refundWithData->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function adjustAuthorisation($params)
	{
		$result = $this->adjustAuthorisation->request($params);
		return $result;
	}
}
