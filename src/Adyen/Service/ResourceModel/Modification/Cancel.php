<?php

namespace Adyen\Service\ResourceModel\Modification;

class Cancel extends \Adyen\Service\AbstractResource
{
	/**
	 * @var string
	 */
	protected $_endpoint;

	/**
	 * Include applicationInfo key in the request parameters
	 *
	 * @var bool
	 */
	protected $allowApplicationInfo = true;

	/**
	 * Cancel constructor.
	 *
	 * @param \Adyen\Service $service
	 */
	public function __construct($service)
	{
		$this->_endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Payment/' . $service->getClient()->getApiVersion() . '/cancel';
		parent::__construct($service, $this->_endpoint, $this->allowApplicationInfo);
	}
}
