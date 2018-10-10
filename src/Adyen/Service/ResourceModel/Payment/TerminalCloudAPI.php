<?php

namespace Adyen\Service\ResourceModel\Payment;

class TerminalCloudAPI extends \Adyen\Service\AbstractResource
{
	/**
	 * @var string
	 */
	protected $_endpoint;

	/**
	 * Remove applicationInfo key from the request parameters
	 *
	 * @var bool
	 */
	protected $removeApplicationInfoFromRequest = true;

	/**
	 * TerminalCloudAPI constructor.
	 *
	 * @param \Adyen\Service $service
	 * @param bool $asynchronous
	 */
    public function __construct($service, $asynchronous)
    {
        if ($asynchronous) {
            $this->_endpoint = $service->getClient()->getConfig()->get('endpointTerminalCloud') . '/async';
        } else {
            $this->_endpoint = $service->getClient()->getConfig()->get('endpointTerminalCloud') . '/sync';
        }
        parent::__construct($service, $this->_endpoint, $this->removeApplicationInfoFromRequest);
    }
}
