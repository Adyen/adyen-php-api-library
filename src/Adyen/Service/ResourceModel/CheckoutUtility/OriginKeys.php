<?php

namespace Adyen\Service\ResourceModel\CheckoutUtility;

class OriginKeys extends \Adyen\Service\AbstractCheckoutResource
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
	protected $paramsToFilter = array(
		"applicationInfo"
	);

	/**
	 * OriginKeys constructor.
	 *
	 * @param \Adyen\Sercvice $service
	 * @throws \Adyen\AdyenException
	 */
    public function __construct($service)
    {
        $this->_endpoint = $this->getCheckoutEndpoint($service) .'/'. $service->getClient()->getApiCheckoutUtilityVersion() . '/originKeys';
        parent::__construct($service, $this->_endpoint, $this->paramsToFilter);
    }
}
