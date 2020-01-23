<?php

namespace Adyen\Service;

class DirectoryLookup extends \Adyen\Service
{
    /**
     * @var ResourceModel\DirectoryLookup\Directory
     */
    protected $directoryLookup;

    /**
     * DirectoryLookup constructor.
     *
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->directoryLookup = new \Adyen\Service\ResourceModel\DirectoryLookup\Directory($this);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function directoryLookup($params)
    {
        $result = $this->directoryLookup->requestPost($params);
        return $result;
    }
}
