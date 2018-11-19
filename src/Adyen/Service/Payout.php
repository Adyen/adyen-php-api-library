<?php

namespace Adyen\Service;

class Payout extends \Adyen\Service
{
	/**
	 * @var ResourceModel\Payout\Confirm
	 */
	protected $_confirm;

	/**
	 * @var ResourceModel\Payout\Decline
	 */
	protected $_decline;

	/**
	 * @var ResourceModel\Payout\StoreDetailsAndSubmit
	 */
	protected $_storeDetailsAndSubmit;

	/**
	 * @var ResourceModel\Payout\Submit
	 */
	protected $_submit;

	/**
	 * @var ResourceModel\Payout\ThirdParty\ConfirmThirdParty
	 */
	protected $_confirmThirdParty;

	/**
	 * @var ResourceModel\Payout\ThirdParty\DeclineThirdParty
	 */
	protected $_declineThirdParty;

	/**
	 * @var ResourceModel\Payout\ThirdParty\StoreDetailsAndSubmitThirdParty
	 */
	protected $_storeDetailsAndSubmitThirdParty;

	/**
	 * @var ResourceModel\Payout\ThirdParty\SubmitThirdParty
	 */
	protected $_submitThirdParty;

	/**
	 * @var ResourceModel\Payout\ThirdParty\StoreDetail
	 */
	protected $_storeDetail;

	/**
	 * Payout constructor.
	 *
	 * @param \Adyen\Client $client
	 * @throws \Adyen\AdyenException
	 */
	public function __construct(\Adyen\Client $client)
	{
		parent::__construct($client);
		$this->_confirm = new \Adyen\Service\ResourceModel\Payout\Confirm($this);
		$this->_decline = new \Adyen\Service\ResourceModel\Payout\Decline($this);
		$this->_storeDetailsAndSubmit = new \Adyen\Service\ResourceModel\Payout\StoreDetailsAndSubmit($this);
		$this->_submit = new \Adyen\Service\ResourceModel\Payout\Submit($this);
		$this->_confirmThirdParty = new \Adyen\Service\ResourceModel\Payout\ThirdParty\ConfirmThirdParty($this);
		$this->_declineThirdParty = new \Adyen\Service\ResourceModel\Payout\ThirdParty\DeclineThirdParty($this);
		$this->_storeDetailsAndSubmitThirdParty = new \Adyen\Service\ResourceModel\Payout\ThirdParty\StoreDetailsAndSubmitThirdParty($this);
		$this->_submitThirdParty = new \Adyen\Service\ResourceModel\Payout\ThirdParty\SubmitThirdParty($this);
		$this->_storeDetail = new \Adyen\Service\ResourceModel\Payout\ThirdParty\StoreDetail($this);
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function confirm($params)
	{
		$result = $this->_confirm->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function decline($params)
	{
		$result = $this->_decline->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function storeDetailsAndSubmit($params)
	{
		$result = $this->_storeDetailsAndSubmit->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function submit($params)
	{
		$result = $this->_submit->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function confirmThirdParty($params)
	{
		$result = $this->_confirmThirdParty->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function declineThirdParty($params)
	{
		$result = $this->_declineThirdParty->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function storeDetailsAndSubmitThirdParty($params)
	{
		$result = $this->_storeDetailsAndSubmitThirdParty->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function submitThirdParty($params)
	{
		$result = $this->_submitThirdParty->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function storeDetail($params)
	{
		$result = $this->_storeDetail->request($params);
		return $result;
	}
}
