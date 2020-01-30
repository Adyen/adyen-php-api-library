<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentSession extends \Adyen\Service\AbstractCheckoutResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * PaymentSession constructor.
     *
     * @param \Adyen\Service $service
     * @throws \Adyen\AdyenException
     */
    public function __construct($service)
    {
        $this->endpoint = $this->getCheckoutEndpoint($service) .
            '/' . $service->getClient()->getApiCheckoutVersion() . '/paymentSession';
        parent::__construct($service, $this->endpoint);
    }
}
