<?php

namespace Adyen\Service\ResourceModel\Payout;

class StoreDetailsAndSubmit extends \Adyen\Service\AbstractResource
{
	/**
	 * @var string
	 */
	protected $_endpoint;

	/**
	 * StoreDetailsAndSubmit constructor.
	 *
	 * @param \Adyen\Service $service
	 */
	public function __construct($service)
	{
		$this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payout/' . $service->getClient()->getApiVersion() . '/storeDetailAndSubmit';
		parent::__construct($service, $this->_endpoint);
	}
}
