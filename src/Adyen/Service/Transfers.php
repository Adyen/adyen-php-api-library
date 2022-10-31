<?php

namespace Adyen\Service;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\PlatformsService;
use Adyen\Service\ResourceModel\Transfers\Transactions;

class Transfers extends PlatformsService
{
    /** @var ResourceModel\Transfers\Transfers $transfers */
    private $transfers;

    /** @var Transactions $transactions */
    private $transactions;

    /**
     * @param Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct(
            $client,
            $client->getConfig()->get('endpointPlatformsTransfers')
        );

        $this->transfers = new ResourceModel\Transfers\Transfers($this);
        $this->transactions = new Transactions($this);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function createTransfer($params)
    {
        return $this->transfers->create($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function findTransaction($params)
    {
        return $this->transactions->find($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function findTransactions($params)
    {
        return $this->transactions->findAll($params);
    }
}
