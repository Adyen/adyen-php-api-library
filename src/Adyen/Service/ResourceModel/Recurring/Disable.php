<?php

namespace Adyen\Service\ResourceModel\Recurring;

class Disable extends \Adyen\Service\AbstractResource
{
	/**
	 * @var string
	 */
	protected $endpoint;

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
	 * Disable constructor.
	 *
	 * @param \Adyen\Service $service
	 */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Recurring/' . $service->getClient()->getApiRecurringVersion() . '/disable';
        parent::__construct($service, $this->endpoint, $this->paramsToFilter);
    }
}
