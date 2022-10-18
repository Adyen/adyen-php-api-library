<?php

namespace Adyen\Service\ResourceModel\Transfers;

use Adyen\AdyenException;
use Adyen\Service\AbstractPlatformsResource;

class Transactions extends AbstractPlatformsResource
{
    const TRANSACTIONS = '/transactions';
    const TRANSACTIONS_BY_ID = '/transactions/{id}';

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function findAll($params)
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsTransfersVersion(),
            self::TRANSACTIONS,
            function () use ($params) {
                return $this->requestGet($params);
            }
        );
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function find($params)
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsTransfersVersion(),
            self::TRANSACTIONS_BY_ID,
            function () use ($params) {
                return $this->requestGet($params);
            }
        );
    }
}
