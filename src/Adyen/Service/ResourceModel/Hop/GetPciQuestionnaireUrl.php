<?php

namespace Adyen\Service\ResourceModel\Hop;

class GetPciQuestionnaireUrl extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * GetPciQuestionnaireUrl constructor.
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointHop') .
            '/' . $service->getClient()->getApiHopVersion() . '/getPciQuestionnaireUrl';
        parent::__construct($service, $this->endpoint);
    }
}
