<?php

namespace Adyen\Service\ResourceModel\Payout;

class Decline extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * Decline constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpoint') .
            '/pal/servlet/Payout/' . $service->getClient()->getApiPayoutVersion() .
            '/decline';
        parent::__construct($service, $this->endpoint);
    }
}
