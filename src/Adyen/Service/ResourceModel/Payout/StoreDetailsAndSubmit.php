<?php

namespace Adyen\Service\ResourceModel\Payout;

class StoreDetailsAndSubmit extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * StoreDetailsAndSubmit constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpoint') .
            '/pal/servlet/Payout/' . $service->getClient()->getApiPayoutVersion() .
            '/storeDetailAndSubmit';
        parent::__construct($service, $this->endpoint);
    }
}
