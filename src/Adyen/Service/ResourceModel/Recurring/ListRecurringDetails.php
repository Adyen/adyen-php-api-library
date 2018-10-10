<?php

namespace Adyen\Service\ResourceModel\Recurring;

class ListRecurringDetails extends \Adyen\Service\AbstractResource
{
	/**
	 * @var string
	 */
	protected $endpoint;

	/**
	 * Remove applicationInfo key from the request parameters
	 *
	 * @var bool
	 */
	protected $removeApplicationInfoFromRequest = true;

	/**
	 * ListRecurringDetails constructor.
	 *
	 * @param \Adyen\Service $service
	 */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Recurring/' . $service->getClient()->getApiRecurringVersion() . '/listRecurringDetails';
        parent::__construct($service, $this->endpoint, $this->removeApplicationInfoFromRequest);
    }
}
