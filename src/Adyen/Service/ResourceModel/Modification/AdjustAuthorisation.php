<?php

namespace Adyen\Service\ResourceModel\Modification;

class AdjustAuthorisation extends \Adyen\Service\AbstractResource
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
	protected $paramsToFilter = array();

	/**
	 * AdjustAuthorisation constructor.
	 *
	 * @param \Adyen\Service $service
	 */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpoint').'/pal/servlet/Payment/'.$service->getClient()->getApiVersion().'/adjustAuthorisation';
        parent::__construct($service, $this->_endpoint, $this->paramsToFilter);
    }
}
