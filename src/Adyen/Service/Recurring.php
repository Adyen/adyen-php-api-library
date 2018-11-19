<?php

namespace Adyen\Service;

class Recurring extends \Adyen\Service
{
	/**
	 * @var ResourceModel\Recurring\ListRecurringDetails
	 */
	protected $_listRecurringDetails;

	/**
	 * @var ResourceModel\Recurring\Disable
	 */
	protected $_disable;

	/**
	 * Recurring constructor.
	 *
	 * @param \Adyen\Client $client
	 * @throws \Adyen\AdyenException
	 */
	public function __construct(\Adyen\Client $client)
	{
		parent::__construct($client);
		$this->_listRecurringDetails = new \Adyen\Service\ResourceModel\Recurring\ListRecurringDetails($this);

		$this->_disable = new \Adyen\Service\ResourceModel\Recurring\Disable(
			$this,
			$this->getClient()->getConfig()->get('endpoint') . '/disable',
			array('merchantAccount', 'shopperReference'));
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function listRecurringDetails($params)
	{
		$result = $this->_listRecurringDetails->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function disable($params)
	{
		$result = $this->_disable->request($params);
		return $result;
	}
}
