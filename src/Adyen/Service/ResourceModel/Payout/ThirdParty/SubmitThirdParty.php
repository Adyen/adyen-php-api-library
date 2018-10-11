<?php

namespace Adyen\Service\ResourceModel\Payout\ThirdParty;

class SubmitThirdParty extends \Adyen\Service\AbstractResource
{
	/**
	 * @var string
	 */
	protected $_endpoint;

	/**
	 * SubmitThirdParty constructor.
	 *
	 * @param \Adyen\Service $service
	 */
	public function __construct($service)
	{
		$this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payout/' . $service->getClient()->getApiVersion() . '/submitThirdParty';
		parent::__construct($service, $this->_endpoint);
	}
}
