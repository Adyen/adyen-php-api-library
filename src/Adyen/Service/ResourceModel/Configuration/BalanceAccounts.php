<?php

namespace Adyen\Service\ResourceModel\Configuration;

use Adyen\AdyenException;
use Adyen\Service\AbstractPlatformsResource;

class BalanceAccounts extends AbstractPlatformsResource
{
    const BALANCE_ACCOUNTS = '/balanceAccounts';
    const BALANCE_ACCOUNTS_BY_ID = '/balanceAccounts/{id}';
    const BALANCE_ACCOUNTS_PAYMENT_INSTRUMENTS_BY_ID = '/balanceAccounts/{id}/paymentInstruments';

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function create(array $params = [])
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsConfigurationVersion(),
            self::BALANCE_ACCOUNTS,
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
            self::BALANCE_ACCOUNTS_BY_ID,
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
            self::BALANCE_ACCOUNTS_BY_ID,
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
    public function findPaymentInstruments(array $params = [])
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsConfigurationVersion(),
            self::BALANCE_ACCOUNTS_PAYMENT_INSTRUMENTS_BY_ID,
            function () use ($params) {
                return $this->requestGet($params);
            }
        );
    }
}
