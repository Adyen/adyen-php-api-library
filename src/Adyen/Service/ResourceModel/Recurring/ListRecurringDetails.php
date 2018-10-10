<?php

namespace Adyen\Service\ResourceModel\Recurring;

class ListRecurringDetails extends \Adyen\Service\AbstractResource
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
	 * ListRecurringDetails constructor.
	 *
	 * @param \Adyen\Service $service
	 */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Recurring/' . $service->getClient()->getApiRecurringVersion() . '/listRecurringDetails';
        parent::__construct($service, $this->endpoint, $this->paramsToFilter);
    }
}
