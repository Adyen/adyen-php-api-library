<?php

namespace Adyen\Service\ResourceModel\Payout\ThirdParty;

class StoreDetail extends \Adyen\Service\AbstractResource
{
	/**
	 * @var string
	 */
	protected $_endpoint;

	/**
	 * StoreDetail constructor.
	 *
	 * @param \Adyen\Service $service
	 */
	public function __construct($service)
	{
		$this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payout/' . $service->getClient()->getApiVersion() . '/storeDetail';
		parent::__construct($service, $this->_endpoint);
	}
}
