<?php

namespace Adyen\Service;

use Adyen\AdyenException;

class AbstractCheckoutResource extends AbstractResource
{
    /**
     * Return Checkout endpoint
     *
     * @param $service
     * @return mixed
     * @throws AdyenException
     */
    public function getCheckoutEndpoint($service)
    {
        // check if endpoint is set
        if ($service->getClient()->getConfig()->get('endpointCheckout') == null) {
            $msg = 'Please provide your unique live url prefix on the' .
                ' setEnvironment() call on the Client or provide endpointCheckout' .
                ' in your config object.';
            throw new AdyenException($msg);
        }

        return $service->getClient()->getConfig()->get('endpointCheckout');
    }
}
