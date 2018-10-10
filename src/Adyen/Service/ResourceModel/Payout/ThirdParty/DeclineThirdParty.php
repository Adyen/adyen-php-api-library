<?php

namespace Adyen\Service\ResourceModel\Payout\ThirdParty;

use Adyen\Service;

class DeclineThirdParty extends \Adyen\Service\AbstractResource
{
	/**
	 * @var string
	 */
	protected $_endpoint;

	/**
	 * Remove applicationInfo key from the request parameters
	 *
	 * @var bool
	 */
	protected $removeApplicationInfoFromRequest = true;

	/**
	 * DeclineThirdParty constructor.
	 *
	 * @param \Adyen\Service $service
	 */
	public function __construct($service)
	{
		$this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payout/' . $service->getClient()->getApiVersion() . '/declineThirdParty';
		parent::__construct($service, $this->_endpoint, $this->removeApplicationInfoFromRequest);
	}
}
