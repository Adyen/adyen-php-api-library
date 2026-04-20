<?php

namespace Adyen;

/**
 * Parent class for API services
 */
class BaseService
{
    private Configuration $configuration;

    /**
     * Service constructor.
     *
     * @param Configuration $configuration
     * @throws AdyenException
     */
    public function __construct(Configuration $configuration)
    {
        if (!$configuration->getAdyenApiKey()) {
            $msg = 'API Key is undefined';
            throw new AdyenException($msg);
        }

        if (!$configuration->getEnvironment()) {
            $msg = 'The Client does not have a correct environment, use ' .
                Environment::TEST . ' or ' . Environment::LIVE;
            throw new AdyenException($msg);
        }

        if ($configuration->getEnvironment() == Environment::LIVE && !$configuration->getLiveEndpointUrlPrefix()) {
            $msg = 'The live URL prefix is not defined';
            throw new AdyenException($msg);
        }
        $this->configuration = $configuration;
    }

    /**
     * @param string $url
     * @return string
     * @throws AdyenException
     */
    public function createBaseUrl(string $url): string
    {
        if ($this->configuration->getEnvironment() == Environment::TEST) {
            return $url;
        }

        if (strpos($url, "pal-") !== false) {
            // Add live prefix for PAL endpoints
            $url = str_replace(
                "https://pal-test.adyen.com/pal/servlet/",
                "https://" . $this->configuration->getLiveEndpointUrlPrefix() . '-pal-live.adyenpayments.com/pal/servlet/',
                $url
            );
        }
        if (strpos($url, "checkout-") !== false) {
            // Add live prefix for Checkout endpoints
            if (strpos($url, "possdk") !== false) {
                // PosSdk (PosMobileApi): inject the live prefix like "https://{PREFIX}-" without duplicating `/checkout` in path
                $url = str_replace(
                    "https://checkout-test.adyen.com/",
                    "https://" . $this->configuration->getLiveEndpointUrlPrefix() . '-checkout-live.adyenpayments.com/',
                    $url
                );
            } else {
                // Other services: inject the live prefix like "https://{PREFIX}-"
                $url = str_replace(
                    "https://checkout-test.adyen.com/",
                    "https://" . $this->configuration->getLiveEndpointUrlPrefix() . '-checkout-live.adyenpayments.com/checkout/',
                    $url
                );
            }
        }

        // Replace 'test' in string with 'live' for the other endpoints
        return str_replace('-test', '-live', $url);
    }
}
