<?php

namespace Adyen\Service\ResourceModel\Payment;

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
        if ($asynchronous) {
            $this->endpoint = $service->getClient()->getConfig()->get('endpointTerminalCloud') . '/async';
        } else {
            $this->endpoint = $service->getClient()->getConfig()->get('endpointTerminalCloud') . '/sync';
        }
        parent::__construct($service, $this->endpoint, $this->allowApplicationInfo, $this->allowApplicationInfoPOS);
    }
}
