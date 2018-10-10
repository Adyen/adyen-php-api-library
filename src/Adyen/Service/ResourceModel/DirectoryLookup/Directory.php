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
	 * Remove applicationInfo key from the request parameters
	 *
	 * @var bool
	 */
	protected $removeApplicationInfoFromRequest = true;

	/**
	 * Directory constructor.
	 *
	 * @param \Adyen\Service $service
	 */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointDirectorylookup');
        parent::__construct($service, $this->_endpoint, $this->removeApplicationInfoFromRequest);
    }
}
