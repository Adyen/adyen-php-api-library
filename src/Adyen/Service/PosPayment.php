<?php

namespace Adyen\Service;

class PosPayment extends \Adyen\ApiKeyAuthenticatedService
{
	/**
	 * @var ResourceModel\Payment\TerminalCloudAPI
	 */
	protected $_runTenderSync;

	/**
	 * @var ResourceModel\Payment\TerminalCloudAPI
	 */
	protected $_runTenderAsync;

	/**
	 * @var
	 */
	protected $_txType;

	/**
	 * PosPayment constructor.
	 *
	 * @param \Adyen\Client $client
	 * @throws \Adyen\AdyenException
	 */
	public function __construct(\Adyen\Client $client)
	{
		parent::__construct($client);
		$this->_runTenderSync = new \Adyen\Service\ResourceModel\Payment\TerminalCloudAPI($this, false);
		$this->_runTenderAsync = new \Adyen\Service\ResourceModel\Payment\TerminalCloudAPI($this, true);
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function runTenderSync($params)
	{
		$result = $this->_runTenderSync->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function runTenderAsync($params)
	{
		$result = $this->_runTenderAsync->request($params);
		return $result;
	}

	/**
	 * @param $request
	 * @return null
	 */
	public function getServiceId($request)
	{
		if (isset($request['SaleToPOIRequest']['MessageHeader']['ServiceID'])) {
			return $request['SaleToPOIRequest']['MessageHeader']['ServiceID'];
		}
		return null;
	}
}
