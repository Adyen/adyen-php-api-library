<?php

namespace Adyen\Service;

use Adyen\PlatformsService;

class AbstractPlatformsResource extends AbstractResource
{
    /** @var string baseUrl */
    protected $baseUrl;

    public function __construct(PlatformsService $service)
    {
        $this->baseUrl = $service->getBaseUrl();

        parent::__construct(
            $service,
            $this->baseUrl,
            true
        );
    }
}
