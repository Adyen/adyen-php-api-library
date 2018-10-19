<?php

namespace Adyen\Service\ResourceModel\Payout\ThirdParty;

class ConfirmThirdParty extends \Adyen\Service\AbstractResource
{
	/**
	 * @var string
	 */
	protected $_endpoint;

	/**
	 * ConfirmThirdParty constructor.
	 *
	 * @param \Adyen\Service $service
	 */
	public function __construct($service)
	{
		$this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payout/' . $service->getClient()->getApiVersion() . '/confirmThirdParty';
		parent::__construct($service, $this->_endpoint);
	}
}
