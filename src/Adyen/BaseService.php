<?php

namespace Adyen;

use Adyen\Model\Checkout\ApplicationInfo;
use Adyen\Model\Checkout\CommonField;

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
        $hasApiKey = !empty($configuration->getAdyenApiKey());
        $hasBasicAuth = !empty($configuration->getUsername())
            && !empty($configuration->getPassword());
        if (!$hasApiKey && !$hasBasicAuth) {
            $msg = 'API Key or Basic Authentication credentials are undefined';
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

    /**
     * Adds or overwrites the applicationInfo adyenLibrary name and version on a request model.
     * Request models without an applicationInfo field are returned untouched.
     *
     * @param object|null $requestModel
     * @return object|null
     */
    protected function injectApplicationInfo(?object $requestModel): ?object
    {
        if (!is_object($requestModel) || !method_exists($requestModel, 'setApplicationInfo')) {
            return $requestModel;
        }

        $applicationInfo = $requestModel->getApplicationInfo();

        if (is_array($applicationInfo)) {
            $applicationInfo = new ApplicationInfo($applicationInfo);
        } elseif ($applicationInfo === null) {
            $applicationInfo = new ApplicationInfo();
        }

        $library = new CommonField();
        $library->setName(Configuration::LIB_NAME);
        $library->setVersion(Configuration::LIB_VERSION);
        $applicationInfo->setAdyenLibrary($library);

        $requestModel->setApplicationInfo($applicationInfo);
        return $requestModel;
    }
}
