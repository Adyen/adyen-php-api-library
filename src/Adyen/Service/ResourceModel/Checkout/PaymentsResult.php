<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentsResult extends \Adyen\Service\AbstractCheckoutResource
{
	/**
	 * @var string
	 */
	protected $_endpoint;

	/**
	 * PaymentsResult constructor.
	 *
	 * @param \Adyen\Service $service
	 * @throws \Adyen\AdyenException
	 */
    public function __construct($service)
    {
        $this->_endpoint = $this->getCheckoutEndpoint($service) .'/'. $service->getClient()->getApiCheckoutVersion() . '/payments/result';
        parent::__construct($service, $this->_endpoint);
    }
}
