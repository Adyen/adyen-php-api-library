<?php

namespace Adyen\Service\ResourceModel\Payout\ThirdParty;

class ConfirmThirdParty extends \Adyen\Service\AbstractResource
{
	protected $_requiredFields = array(
		'merchantAccount',
		'originalReference'
	);

	protected $_endpoint;

	public function __construct($service)
	{
		$this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payout/' . $service->getClient()->getApiVersion() . '/confirmThirdParty';
		parent::__construct($service, $this->_endpoint, $this->_requiredFields);
	}

}