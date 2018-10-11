<?php

namespace Adyen\Service\ResourceModel\CheckoutUtility;

class OriginKeys extends \Adyen\Service\AbstractCheckoutResource
{
	/**
	 * @var string
	 */
    protected $_endpoint;

	/**
	 * OriginKeys constructor.
	 *
	 * @param \Adyen\Service $service
	 * @throws \Adyen\AdyenException
	 */
    public function __construct($service)
    {
        $this->_endpoint = $this->getCheckoutEndpoint($service) .'/'. $service->getClient()->getApiCheckoutUtilityVersion() . '/originKeys';
        parent::__construct($service, $this->_endpoint);
    }
}
