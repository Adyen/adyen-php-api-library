<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentMethods extends \Adyen\Service\AbstractCheckoutResource
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
	 * PaymentMethods constructor.
	 *
	 * @param \Adyen\Service $service
	 * @throws \Adyen\AdyenException
	 */
    public function __construct($service)
    {
        $this->_endpoint = $this->getCheckoutEndpoint($service) .'/'. $service->getClient()->getApiCheckoutVersion() . '/paymentMethods';
        parent::__construct($service, $this->_endpoint, $this->paramsToFilter);
    }
}
