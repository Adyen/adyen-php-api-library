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

    /**
     * @param string $version
     * @param string $endpoint
     * @param callable $callback
     * @return mixed
     */
    public function simulateEndpoint(string $version, string $endpoint, callable $callback)
    {
        $this->endpoint = sprintf('%s/%s/%s', $this->baseUrl, $version, $endpoint);
        $response = $callback();
        $this->endpoint = $this->baseUrl;
        return $response;
    }
}
