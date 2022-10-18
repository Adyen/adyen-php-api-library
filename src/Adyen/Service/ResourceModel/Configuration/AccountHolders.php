<?php

namespace Adyen\Service\ResourceModel\Configuration;

use Adyen\AdyenException;
use Adyen\Service\AbstractPlatformsResource;

class AccountHolders extends AbstractPlatformsResource
{
    const ACCOUNT_HOLDERS = '/accountHolders';
    const ACCOUNT_HOLDERS_BY_ID = '/accountHolders/{id}';
    const ACCOUNT_HOLDERS_BALANCE_ACCOUNTS_BY_ID = '/accountHolders/{id}/balanceAccounts';

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function create(array $params = [])
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsConfigurationVersion(),
            self::ACCOUNT_HOLDERS,
            function () use ($params) {
                return $this->request($params);
            }
        );
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function update(array $params = [])
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsConfigurationVersion(),
            self::ACCOUNT_HOLDERS_BY_ID,
            function () use ($params) {
                return $this->requestPatch($params);
            }
        );
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function find(array $params = [])
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsConfigurationVersion(),
            self::ACCOUNT_HOLDERS_BY_ID,
            function () use ($params) {
                return $this->requestGet($params);
            }
        );
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function findBalanceAccounts(array $params = [])
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsConfigurationVersion(),
            self::ACCOUNT_HOLDERS_BALANCE_ACCOUNTS_BY_ID,
            function () use ($params) {
                return $this->requestGet($params);
            }
        );
    }
}
