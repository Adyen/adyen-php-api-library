<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentMethods extends \Adyen\Service\AbstractCheckoutResource
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
	 * PaymentMethods constructor.
	 *
	 * @param \Adyen\Service $service
	 * @throws \Adyen\AdyenException
	 */
    public function __construct($service)
    {
        $this->_endpoint = $this->getCheckoutEndpoint($service) .'/'. $service->getClient()->getApiCheckoutVersion() . '/paymentMethods';
        parent::__construct($service, $this->_endpoint, $this->removeApplicationInfoFromRequest);
    }
}
