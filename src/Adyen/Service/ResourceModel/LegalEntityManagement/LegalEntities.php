<?php


namespace Adyen\Service\ResourceModel\LegalEntityManagement;

use Adyen\AdyenException;
use Adyen\Service\AbstractPlatformsResource;

class LegalEntities extends AbstractPlatformsResource
{
    const LEGAL_ENTITY_BY_ID = '/legalEntities/{id}';
    const LEGAL_ENTITY_CREATE = '/legalEntities';

    /**
     * @param array $queryParams
     * @return mixed
     * @throws AdyenException
     */
    public function find(array $queryParams = [])
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsLemVersion(),
            self::LEGAL_ENTITY_BY_ID,
            function () use ($queryParams) {
                return $this->requestGet($queryParams);
            }
        );
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function create($params)
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsLemVersion(),
            self::LEGAL_ENTITY_CREATE,
            function () use ($params) {
                return $this->request($params);
            }
        );
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function update($params)
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsLemVersion(),
            self::LEGAL_ENTITY_BY_ID,
            function () use ($params) {
                return $this->requestPatch($params);
            }
        );
    }
}
