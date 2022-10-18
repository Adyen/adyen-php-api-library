<?php

namespace Adyen;

class PlatformsService extends ApiKeyAuthenticatedService
{
    private $baseUrl;

    public function __construct(Client $client, string $baseUrl)
    {
        parent::__construct($client);
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }
}
