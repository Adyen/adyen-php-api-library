<?php

namespace Adyen\Service;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\PlatformsService;
use Adyen\Service\ResourceModel\LegalEntityManagement\Documents;
use Adyen\Service\ResourceModel\LegalEntityManagement\LegalEntities;
use Adyen\Service\ResourceModel\LegalEntityManagement\TransferInstruments;

class LegalEntityManagement extends PlatformsService
{
    /** @var LegalEntities $legalEntities */
    private $legalEntities;

    /** @var Documents $documents */
    private $documents;

    /** @var TransferInstruments $transferInstruments */
    private $transferInstruments;

    /**
     * LegalEntityManagement constructor.
     *
     * @param Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct(
            $client,
            $client->getConfig()->get('endpointPlatformsLem')
        );

        $this->legalEntities = new LegalEntities($this);
        $this->documents = new Documents($this);
        $this->transferInstruments = new TransferInstruments($this);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function createLegalEntity($params)
    {
        return $this->legalEntities->create($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function updateLegalEntity($params)
    {
        return $this->legalEntities->update($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function findLegalEntity($params)
    {
        return $this->legalEntities->find($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function createDocuments($params)
    {
        return $this->documents->create($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function updateDocuments($params)
    {
        return $this->documents->update($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function deleteDocuments($params)
    {
        return $this->documents->delete($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function findDocuments($params)
    {
        return $this->documents->find($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function createTransferInstruments($params)
    {
        return $this->transferInstruments->create($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function updateTransferInstruments($params)
    {
        return $this->transferInstruments->update($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function findTransferInstruments($params)
    {
        return $this->transferInstruments->find($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function deleteTransferInstruments($params)
    {
        return $this->transferInstruments->delete($params);
    }
}
