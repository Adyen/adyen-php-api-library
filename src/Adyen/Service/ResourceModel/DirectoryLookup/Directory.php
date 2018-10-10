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
	 * Add parameters that you want to filter out from the params in the request
	 * For more information about building this property please check Adyen\Service\AbstractResource filterParams doc block
	 *
	 * @var array
	 */
	protected $paramsToFilter = array(
		"applicationInfo"
	);

	/**
	 * Directory constructor.
	 *
	 * @param \Adyen\Service $service
	 */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointDirectorylookup');
        parent::__construct($service, $this->_endpoint, $this->paramsToFilter);
    }
}
