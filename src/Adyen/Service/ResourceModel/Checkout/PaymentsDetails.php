<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentsDetails extends \Adyen\Service\AbstractCheckoutResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * PaymentsDetails constructor.
     *
     * @param \Adyen\Service $service
     * @throws \Adyen\AdyenException
     */
    public function __construct($service)
    {
        $this->endpoint = $this->getCheckoutEndpoint($service) .
            '/' . $service->getClient()->getApiCheckoutVersion() . '/payments/details';
        parent::__construct($service, $this->endpoint);
    }
}
