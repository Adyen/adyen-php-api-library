<?php

namespace Adyen\Service\ResourceModel\DisputeService;

use Adyen\Service\AbstractResource;

class DeleteDisputeDefenseDocument extends AbstractResource
{
    /**
     * DeleteDisputeDefenseDocument constructor.
     *
     * @param \Adyen\Service\DisputeService $service
     */
    public function __construct($service)
    {
        parent::__construct($service, $service->getResourceURL('deleteDisputeDefenseDocument'));
    }
}
