<?php

namespace Adyen\Service\ResourceModel\DirectoryLookup;

class Directory extends \Adyen\Service\AbstractResource
{
	/**
	 * @var string
	 */
	protected $_endpoint;

	/**
	 * Directory constructor.
	 * https://test.adyen.com/hpp/directory.shtml
	 *
	 * @param \Adyen\Service $service
	 */
	public function __construct($service)
	{
		$this->_endpoint = $service->getClient()->getConfig()->get('endpointDirectorylookup');
		parent::__construct($service, $this->_endpoint);
	}
}
