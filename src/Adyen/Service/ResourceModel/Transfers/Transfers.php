<?php

namespace Adyen\Service\ResourceModel\Transfers;

use Adyen\AdyenException;
use Adyen\Service\AbstractPlatformsResource;

class Transfers extends AbstractPlatformsResource
{
    const TRANSFERS = '/transfers';

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function create($params)
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsTransfersVersion(),
            self::TRANSFERS,
            function () use ($params) {
                return $this->request($params);
            }
        );
    }
}
