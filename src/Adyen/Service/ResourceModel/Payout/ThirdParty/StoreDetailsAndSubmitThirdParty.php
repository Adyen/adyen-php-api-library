<?php

namespace Adyen\Service\ResourceModel\Payout\ThirdParty;

class StoreDetailsAndSubmitThirdParty extends \Adyen\Service\AbstractResource
{
	/**
	 * @var string
	 */
	protected $_endpoint;

	/**
	 * StoreDetailsAndSubmitThirdParty constructor.
	 *
	 * @param \Adyen\Service $service
	 */
	public function __construct($service)
	{
		$this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payout/' . $service->getClient()->getApiVersion() . '/storeDetailAndSubmitThirdParty';
		parent::__construct($service, $this->_endpoint);
	}
}
