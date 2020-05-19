<?php

namespace Adyen\Service\ResourceModel\DisputeService;

use Adyen\Service\AbstractResource;

class DefendDispute extends AbstractResource
{
    /**
     * DefendDispute constructor.
     *
     * @param \Adyen\Service\DisputeService $service
     */
    public function __construct($service)
    {
        parent::__construct($service, $service->getResourceURL('defendDispute'));
    }
}
