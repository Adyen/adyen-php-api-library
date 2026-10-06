<?php

namespace Adyen;

use Adyen\Exception\AdyenException;

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
            // A specification may list its live server first, which makes the generated
            // base URL point at live even though the client is configured for test.
            return str_replace('-live.adyen.com', '-test.adyen.com', $url);
        }

        if (strpos($url, '/authe/') !== false) {
            return str_replace(
                'https://test.adyen.com/',
                'https://authe-live.adyen.com/',
                $url
            );
        }

        $livePrefix = $this->configuration->getLiveEndpointUrlPrefix();

        if (strpos($url, "pal-") !== false) {
            if (!$livePrefix) {
                throw new AdyenException('The live URL prefix is not defined');
            }
            // Add live prefix for PAL endpoints
            $url = str_replace(
                "https://pal-test.adyen.com/pal/servlet/",
                'https://' . $livePrefix . '-pal-live.adyenpayments.com/pal/servlet/',
                $url
            );
        }
        if (strpos($url, "checkout-") !== false) {
            if (!$livePrefix) {
                throw new AdyenException('The live URL prefix is not defined');
            }
            // Add live prefix for Checkout endpoints
            if (strpos($url, "possdk") !== false) {
                // PosSdk: inject the live prefix without duplicating the '/checkout' path segment
                $url = str_replace(
                    "https://checkout-test.adyen.com/",
                    'https://' . $livePrefix . '-checkout-live.adyenpayments.com/',
                    $url
                );
            } else {
                // Other services: inject the live prefix like "https://{PREFIX}-"
                $url = str_replace(
                    "https://checkout-test.adyen.com/",
                    'https://' . $livePrefix . '-checkout-live.adyenpayments.com/checkout/',
                    $url
                );
            }
        }

        // Replace 'test' in string with 'live' for the other endpoints
        return str_replace('-test', '-live', $url);
    }

    /**
     * Resolves an operation-level server for the configured environment.
     *
     * @param array $hostSettings
     * @param int|null $hostIndex
     * @param array $variables
     * @param string $baseUrl
     * @return string
     */
    protected function resolveOperationHost(
        array $hostSettings,
        ?int $hostIndex,
        array $variables,
        string $baseUrl
    ): string {
        if (count($hostSettings) === 0) {
            throw new \InvalidArgumentException('No operation hosts were provided');
        }

        $isTest = $this->configuration->getEnvironment() === Environment::TEST;

        if ($hostIndex === null) {
            foreach ($hostSettings as $index => $hostSetting) {
                $description = $hostSetting['description'] ?? '';
                if ($description === ($isTest ? 'Test Environment' : 'Live Environment')) {
                    $hostIndex = $index;
                    break;
                }
            }
        }

        if ($hostIndex === null) {
            // Descriptions are specification metadata and may be reworded or absent,
            // so the host name is used as a second signal before defaulting to the
            // first host, which specifications tend to point at the live environment.
            foreach ($hostSettings as $index => $hostSetting) {
                if (strpos($hostSetting['url'] ?? '', $isTest ? '-test.' : '-live.') !== false) {
                    $hostIndex = $index;
                    break;
                }
            }
        }

        $hostIndex ??= 0;
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);

        if ($operationHost === null) {
            throw new \InvalidArgumentException('The selected operation host is invalid');
        }

        $basePath = parse_url($baseUrl, PHP_URL_PATH) ?: '';
        $operationPath = parse_url($operationHost, PHP_URL_PATH) ?: '';

        if ($basePath !== '' && $basePath !== '/' && ($operationPath === '' || $operationPath === '/')) {
            $operationHost = rtrim($operationHost, '/') . '/' . ltrim($basePath, '/');
        }

        return $operationHost;
    }

    /**
     * Adds or overwrites the applicationInfo adyenLibrary name and version on a request model
     * and merges the adyenPaymentSource, externalPlatform and merchantApplication values
     * configured on the Configuration, mirroring the behaviour of the array based services.
     * Request models without an applicationInfo field are returned untouched and
     * merchant-provided values are kept unless a matching value is configured.
     *
     * @param object|null $requestModel
     * @return object|null
     */
    protected function injectApplicationInfo(?object $requestModel): ?object
    {
        if ($requestModel === null ||
            !method_exists($requestModel, 'setApplicationInfo') ||
            !method_exists($requestModel, 'getApplicationInfo') ||
            !method_exists($requestModel, 'openAPITypes')
        ) {
            return $requestModel;
        }

        $applicationInfoClass = $requestModel::openAPITypes()['applicationInfo'] ?? null;
        if ($applicationInfoClass === null) {
            return $requestModel;
        }

        $applicationInfo = $requestModel->getApplicationInfo();
        if (is_array($applicationInfo) || $applicationInfo === null) {
            $applicationInfo = new $applicationInfoClass($applicationInfo);
        }
        $fieldTypes = $applicationInfoClass::openAPITypes();

        // add/overwrite applicationInfo adyenLibrary even if it's already set
        if (isset($fieldTypes['adyenLibrary'])) {
            $libraryClass = $fieldTypes['adyenLibrary'];
            $library = new $libraryClass();
            $library->setName(Configuration::LIB_NAME);
            $library->setVersion(Configuration::LIB_VERSION);
            $applicationInfo->setAdyenLibrary($library);
        }

        if (isset($fieldTypes['adyenPaymentSource']) &&
            ($adyenPaymentSource = $this->configuration->getAdyenPaymentSource())
        ) {
            $paymentSourceClass = $fieldTypes['adyenPaymentSource'];
            $paymentSource = new $paymentSourceClass();
            $paymentSource->setName($adyenPaymentSource['name']);
            $paymentSource->setVersion($adyenPaymentSource['version']);
            $applicationInfo->setAdyenPaymentSource($paymentSource);
        }

        if (isset($fieldTypes['externalPlatform']) &&
            ($externalPlatform = $this->configuration->getExternalPlatform())
        ) {
            $platformClass = $fieldTypes['externalPlatform'];
            $platform = new $platformClass();
            $platform->setName($externalPlatform['name']);
            $platform->setVersion($externalPlatform['version']);
            if (!empty($externalPlatform['integrator'])) {
                $platform->setIntegrator($externalPlatform['integrator']);
            }
            $applicationInfo->setExternalPlatform($platform);
        }

        if (isset($fieldTypes['merchantApplication']) &&
            ($merchantApplication = $this->configuration->getMerchantApplication())
        ) {
            $merchantAppClass = $fieldTypes['merchantApplication'];
            $merchantApp = new $merchantAppClass();
            $merchantApp->setName($merchantApplication['name']);
            $merchantApp->setVersion($merchantApplication['version']);
            $applicationInfo->setMerchantApplication($merchantApp);
        }

        $requestModel->setApplicationInfo($applicationInfo);
        return $requestModel;
    }
}
