<?php

namespace Adyen\Service\ResourceModel\Configuration;

use Adyen\AdyenException;
use Adyen\Service\AbstractPlatformsResource;

class BalancePlatforms extends AbstractPlatformsResource
{
    const BALANCE_PLATFORM_BY_ID = '/balancePlatforms/{id}';
    const BALANCE_PLATFORM_ACCOUNT_HOLDERS = '/balancePlatforms/{id}/accountHolders';

    /**
     * @param array $queryParams
     * @return mixed
     * @throws AdyenException
     */
    public function findBalancePlatform(array $queryParams = [])
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsConfigurationVersion(),
            self::BALANCE_PLATFORM_BY_ID,
            function () use ($queryParams) {
                return $this->requestGet($queryParams);
            }
        );
    }

    /**
     * @param array $queryParams
     * @return mixed
     * @throws AdyenException
     */
    public function findBalancePlatformAccountHolders(array $queryParams = [])
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsConfigurationVersion(),
            self::BALANCE_PLATFORM_ACCOUNT_HOLDERS,
            function () use ($queryParams) {
                return $this->requestGet($queryParams);
            }
        );
    }
}
