<?php

namespace Adyen\Service\ResourceModel\Payout\ThirdParty;

class SubmitThirdParty extends \Adyen\Service\AbstractResource
{
	protected $_requiredFields = array(
		'amount.currency',
		'amount.value',
		'merchantAccount',
		'recurring.contract',
		'reference',
		'shopperEmail',
		'shopperReference',
		'selectedRecurringDetailReference'
	);

	protected $_endpoint;

	public function __construct($service)
	{
		$this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payout/' . $service->getClient()->getApiVersion() . '/submitThirdParty';
		parent::__construct($service, $this->_endpoint, $this->_requiredFields);
	}

}