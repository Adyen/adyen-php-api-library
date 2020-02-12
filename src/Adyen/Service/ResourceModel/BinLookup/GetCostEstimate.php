<?php

namespace Adyen\Service\ResourceModel\BinLookup;

class GetCostEstimate extends \Adyen\Service\AbstractResource
{
    /**
     * GetCostEstimate constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/BinLookup/' . $service->getClient()->getApiBinLookupVersion() . '/getCostEstimate';
        parent::__construct($service, $endpoint, false);
    }
}
