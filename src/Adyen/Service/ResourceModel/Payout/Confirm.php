<?php

namespace Adyen\Service\ResourceModel\Payout;

class Confirm extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * Confirm constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpoint') .
            '/pal/servlet/Payout/' .
            $service->getClient()->getApiPayoutVersion() .
            '/confirm';
        parent::__construct($service, $this->endpoint);
    }
}
