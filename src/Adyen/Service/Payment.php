<?php

namespace Adyen\Service;

class Payment extends \Adyen\Service
{
    /**
     * @var ResourceModel\Payment\Authorise
     */
    protected $authorise;

    /**
     * @var ResourceModel\Payment\Authorise3D
     */
    protected $authorise3D;

    /**
     * @var ResourceModel\Payment\Authorise3DS2
     */
    protected $authorise3DS2;

    /**
     * Payment constructor.
     *
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->authorise = new \Adyen\Service\ResourceModel\Payment\Authorise($this);
        $this->authorise3D = new \Adyen\Service\ResourceModel\Payment\Authorise3D($this);
        $this->authorise3DS2 = new \Adyen\Service\ResourceModel\Payment\Authorise3DS2($this);
    }

    /**
     * @param $params
     * @param null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function authorise($params, $requestOptions = null)
    {
        $result = $this->authorise->request($params, $requestOptions);
        return $result;
    }

    /**
     * @param $params
     * @param null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function authorise3D($params, $requestOptions = null)
    {
        $result = $this->authorise3D->request($params, $requestOptions);
        return $result;
    }

    /**
     * @param $params
     * @param null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function authorise3DS2($params, $requestOptions = null)
    {
        $result = $this->authorise3DS2->request($params, $requestOptions);
        return $result;
    }
}
