<?php

namespace Adyen\Service\ResourceModel\Payment;

class TerminalCloudAPI extends \Adyen\Service\AbstractResource
{
	/**
	 * @var string
	 */
	protected $endpoint;

	/**
	 * TerminalCloudAPI constructor.
	 *
	 * @param \Adyen\Service $service
	 * @param bool $asynchronous
	 */
	public function __construct($service, $asynchronous)
	{
		if ($asynchronous) {
			$this->endpoint = $service->getClient()->getConfig()->get('endpointTerminalCloud') . '/async';
		} else {
			$this->endpoint = $service->getClient()->getConfig()->get('endpointTerminalCloud') . '/sync';
		}
		parent::__construct($service, $this->endpoint);
	}
}
