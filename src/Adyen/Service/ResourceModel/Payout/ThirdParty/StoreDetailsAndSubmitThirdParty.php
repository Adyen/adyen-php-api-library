<?php

namespace Adyen\Service\ResourceModel\Payout\ThirdParty;

class StoreDetailsAndSubmitThirdParty extends \Adyen\Service\AbstractResource
{
	protected $_requiredFields = array(
		'merchantAccount',
		'shopperEmail',
		'shopperReference',
		'reference',
		'recurring.contract',
		'amount.currency',
		'amount.value'
	);

	protected $_endpoint;

	public function __construct($service)
	{
		$this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payout/' . $service->getClient()->getApiVersion() . '/storeDetailAndSubmitThirdParty';
		parent::__construct($service, $this->_endpoint, $this->_requiredFields);
	}

}