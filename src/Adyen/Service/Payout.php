<?php

namespace Adyen\Service;

class Payout extends \Adyen\Service
{
	/**
	 * @var ResourceModel\Payout\Confirm
	 */
	protected $confirm;

	/**
	 * @var ResourceModel\Payout\Decline
	 */
	protected $decline;

	/**
	 * @var ResourceModel\Payout\StoreDetailsAndSubmit
	 */
	protected $storeDetailsAndSubmit;

	/**
	 * @var ResourceModel\Payout\Submit
	 */
	protected $submit;

	/**
	 * @var ResourceModel\Payout\ThirdParty\ConfirmThirdParty
	 */
	protected $confirmThirdParty;

	/**
	 * @var ResourceModel\Payout\ThirdParty\DeclineThirdParty
	 */
	protected $declineThirdParty;

	/**
	 * @var ResourceModel\Payout\ThirdParty\StoreDetailsAndSubmitThirdParty
	 */
	protected $storeDetailsAndSubmitThirdParty;

	/**
	 * @var ResourceModel\Payout\ThirdParty\SubmitThirdParty
	 */
	protected $submitThirdParty;

	/**
	 * @var ResourceModel\Payout\ThirdParty\StoreDetail
	 */
	protected $storeDetail;

	/**
	 * Payout constructor.
	 *
	 * @param \Adyen\Client $client
	 * @throws \Adyen\AdyenException
	 */
	public function __construct(\Adyen\Client $client)
	{
		parent::__construct($client);
		$this->confirm = new \Adyen\Service\ResourceModel\Payout\Confirm($this);
		$this->decline = new \Adyen\Service\ResourceModel\Payout\Decline($this);
		$this->storeDetailsAndSubmit = new \Adyen\Service\ResourceModel\Payout\StoreDetailsAndSubmit($this);
		$this->submit = new \Adyen\Service\ResourceModel\Payout\Submit($this);
		$this->confirmThirdParty = new \Adyen\Service\ResourceModel\Payout\ThirdParty\ConfirmThirdParty($this);
		$this->declineThirdParty = new \Adyen\Service\ResourceModel\Payout\ThirdParty\DeclineThirdParty($this);
		$this->storeDetailsAndSubmitThirdParty = new \Adyen\Service\ResourceModel\Payout\ThirdParty\StoreDetailsAndSubmitThirdParty($this);
		$this->submitThirdParty = new \Adyen\Service\ResourceModel\Payout\ThirdParty\SubmitThirdParty($this);
		$this->storeDetail = new \Adyen\Service\ResourceModel\Payout\ThirdParty\StoreDetail($this);
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function confirm($params)
	{
		$result = $this->confirm->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function decline($params)
	{
		$result = $this->decline->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function storeDetailsAndSubmit($params)
	{
		$result = $this->storeDetailsAndSubmit->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function submit($params)
	{
		$result = $this->submit->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function confirmThirdParty($params)
	{
		$result = $this->confirmThirdParty->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function declineThirdParty($params)
	{
		$result = $this->declineThirdParty->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function storeDetailsAndSubmitThirdParty($params)
	{
		$result = $this->storeDetailsAndSubmitThirdParty->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function submitThirdParty($params)
	{
		$result = $this->submitThirdParty->request($params);
		return $result;
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function storeDetail($params)
	{
		$result = $this->storeDetail->request($params);
		return $result;
	}
}
