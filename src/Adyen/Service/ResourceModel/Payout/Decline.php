<?php

namespace Adyen\Service\ResourceModel\Payout;

class Decline extends \Adyen\Service\AbstractResource
{
	protected $_endpoint;

	public function __construct($service)
	{
		$this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payout/' . $service->getClient()->getApiVersion() . '/decline';
		parent::__construct($service, $this->_endpoint);
	}

}