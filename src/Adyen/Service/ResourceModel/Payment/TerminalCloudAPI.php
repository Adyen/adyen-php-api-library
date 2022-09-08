<?php

namespace Adyen\Service\ResourceModel\Payment;

use Adyen\Client;
use Adyen\Region;

class TerminalCloudAPI extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * Include applicationInfo key in the request parameters
     *
     * @var bool
     */
    protected $allowApplicationInfo = false;

    /**
     * Include applicationInfo key in the request parameters
     *
     * @var bool
     */
    protected $allowApplicationInfoPOS = true;

    /**
     * TerminalCloudAPI constructor.
     *
     * @param \Adyen\Service $service
     * @param bool $asynchronous
     */
    public function __construct($service, $asynchronous)
    {
        $region = $service->getClient()->getConfig('region');

        if (isset($region) && $service->getClient()->getConfig('environment') == \Adyen\Environment::LIVE) {
            switch ($region) {
                case Region::US:
                    $endpointUrl = Client::ENDPOINT_TERMINAL_CLOUD_US_LIVE;
                    break;
                case Region::AU:
                    $endpointUrl = Client::ENDPOINT_TERMINAL_CLOUD_AU_LIVE;
                    break;
                case Region::EU:
                default:
                    $endpointUrl = Client::ENDPOINT_TERMINAL_CLOUD_LIVE;
            }
        } else {
            $endpointUrl = $service->getClient()->getConfig()->get('endpointTerminalCloud');
        }

        if ($asynchronous) {
            $this->endpoint = $endpointUrl . '/async';
        } else {
            $this->endpoint = $endpointUrl . '/sync';
        }

        parent::__construct($service, $this->endpoint, $this->allowApplicationInfo, $this->allowApplicationInfoPOS);
    }
}
