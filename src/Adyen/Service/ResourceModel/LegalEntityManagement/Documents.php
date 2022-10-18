<?php

namespace Adyen\Service\ResourceModel\LegalEntityManagement;

use Adyen\AdyenException;
use Adyen\Service\AbstractPlatformsResource;

class Documents extends AbstractPlatformsResource
{
    const DOCUMENT_BY_ID = '/documents/{id}';
    const DOCUMENT_CREATE = '/documents';

    /**
     * @param array $queryParams
     * @return mixed
     * @throws AdyenException
     */
    public function find(array $queryParams = [])
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsLemVersion(),
            self::DOCUMENT_BY_ID,
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
            self::DOCUMENT_CREATE,
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
            self::DOCUMENT_BY_ID,
            function () use ($params) {
                return $this->requestPatch($params);
            }
        );
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function delete($params)
    {
        return $this->simulateEndpoint(
            $this->service->getClient()->getPlatformsLemVersion(),
            self::DOCUMENT_BY_ID,
            function () use ($params) {
                return $this->requestDelete($params);
            }
        );
    }
}
