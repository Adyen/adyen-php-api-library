<?php

namespace Adyen\Service\ResourceModel\Payout;

class Decline extends \Adyen\Service\AbstractResource
{
	/**
	 * @var string
	 */
	protected $_endpoint;

	/**
	 * Add parameters that you want to filter out from the params in the request
	 * For more information about building this property please check Adyen\Service\AbstractResource filterParams doc block
	 *
	 * @var array
	 */
	protected $paramsToFilter = array(
		"applicationInfo"
	);

	/**
	 * Decline constructor.
	 *
	 * @param \Adyen\Service $service
	 */
	public function __construct($service)
	{
		$this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payout/' . $service->getClient()->getApiVersion() . '/decline';
		parent::__construct($service, $this->_endpoint, $this->paramsToFilter);
	}
}
