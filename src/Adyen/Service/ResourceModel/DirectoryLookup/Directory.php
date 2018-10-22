<?php

//https://test.adyen.com/hpp/directory.shtml

namespace Adyen\Service\ResourceModel\DirectoryLookup;

class Directory extends \Adyen\Service\AbstractResource
{
	/**
	 * @var
	 */
    protected $_endpoint;

	/**
	 * Directory constructor.
	 *
	 * @param \Adyen\Service $service
	 */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointDirectorylookup');
        parent::__construct($service, $this->_endpoint);
    }
}
