<?php

namespace Adyen\Service\ResourceModel\Payout\ThirdParty;

class DeclineThirdParty extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * DeclineThirdParty constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpoint') .
            '/pal/servlet/Payout/' . $service->getClient()->getApiPayoutVersion() . '/declineThirdParty';
        parent::__construct($service, $this->endpoint);
    }
}
