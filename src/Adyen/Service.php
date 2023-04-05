<?php

namespace Adyen;

use PHPUnit\Util\Exception;

class Service
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var bool
     */
    protected $requiresApiKey = false;

    /**
     * Service constructor.
     *
     * @param Client $client
     * @throws AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        $msg = null;

        // validate if client has all the configuration we need
        if (!$client->getConfig()->get('environment')) {
            // throw exception
            $msg = 'The Client does not have a correct environment, use ' .
                \Adyen\Environment::TEST . ' or ' . \Adyen\Environment::LIVE;
            throw new \Adyen\AdyenException($msg);
        }

        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @throws AdyenException
     */
    protected function requestHttp(
        string $url,
        string $method = 'get',
        array $bodyParams = null,
        array $requestOptions = null
    ): array {
        // check if rest api method has a value
        if (!$method) {
            $msg = 'The REST API method is empty';
            $this->getClient()->getLogger()->error($msg);
            throw new AdyenException($msg);
        }
        // check if rest api method has a value
        if (!$url) {
            $msg = 'The REST API endpoint is empty';
            $this->getClient()->getLogger()->error($msg);
            throw new AdyenException($msg);
        }
        $curlClient = $this->getClient()->getHttpClient();

        // Retrieve queryParams from requestOptions and add to URL (and catch the DateTime values)
        $queryParams = $requestOptions['queryParams'];
        if (!empty($queryParams)) {

            // catch DateTime objects and convert them to string
            $queryParams = array_map(
                function ($val) {
                    if (is_object($val) && get_class($val) == \DateTime::class) {
                        return $val->format('Y-m-d H:i:sO');
                    }
                    return $val;
                },
                $queryParams
            );

            $url .= '?' . http_build_query($queryParams);
        }

        return $curlClient->requestHttp($this, $url, $bodyParams, $method, $requestOptions);
    }

    /**
     * @return bool
     */
    public function requiresApiKey()
    {
        return $this->requiresApiKey;
    }

    /**
     * @param string $url
     * @return string
     * @throws AdyenException
     */
    public function createBaseUrl(string $url): string
    {
        $config = $this->getClient()->getConfig();
        if ($this->getClient()->getConfig()->getEnvironment() === \Adyen\Environment::LIVE) {
            // Add live url prefix for pal/servlet endpoints
            if (strpos($url, "pal-") !== false) {
                // Check prefix is not empty and if so throw error
                if ($config->get('prefix') == null) {
                    throw new \Adyen\AdyenException(
                        "Please add your live URL prefix from CA under Developers > API URLs > Prefix"
                    );
                }

                // We inject the prefix formatted like "https://{PREFIX}-"
                $url = str_replace(
                    "https://pal-test.adyen.com/pal/servlet/",
                    "https://" . $config->get('prefix') . '-pal-live.adyenpayments.com/pal/servlet/',
                    $url
                );
            }
            // Add live url prefix for checkout
            if (strpos($url, "checkout-") !== false) {
                if ($config->get('prefix') == null) {
                    throw new \Adyen\AdyenException(
                        "Please add your checkout live URL prefix from CA under Developers > API URLs > Prefix"
                    );
                }

                // We inject the live prefix like "https://{PREFIX}-"
                $url = str_replace(
                    "https://checkout-test.adyen.com/",
                    "https://" . $config->get('prefix') . '-checkout-live.adyenpayments.com/checkout/',
                    $url
                );
            }

            // Replace 'test' in string with 'live' for the other endpoints
            $url = str_replace('-test', '-live', $url);
        }
        return $url;
    }
}
