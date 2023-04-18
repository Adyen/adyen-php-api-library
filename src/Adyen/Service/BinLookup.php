<?php

namespace Adyen\Service;

class BinLookup extends \Adyen\Service
{
    /**
     * @var ResourceModel\BinLookup\Get3dsAvailability
     */
    protected $get3dsAvailability;

    /**
     * @var \Adyen\Service\ResourceModel\BinLookup\GetCostEstimate
     */
    protected $getCostEstimate;

    /**
     * BinLookup constructor.
     *
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->get3dsAvailability = new \Adyen\Service\ResourceModel\BinLookup\Get3dsAvailability($this);
        $this->getCostEstimate = new \Adyen\Service\ResourceModel\BinLookup\GetCostEstimate($this);
    }


    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function get3dsAvailability($params)
    {
        $result = $this->get3dsAvailability->request($params);
        return $result;
    }

    /**
     * /getCostEstimate endpoint handler
     *
     * @param $params
     *
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function getCostEstimate($params)
    {
        return $this->getCostEstimate->request($params);
    }
}
