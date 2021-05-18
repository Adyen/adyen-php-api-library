<?php

namespace Adyen\Service;

class Recurring extends \Adyen\Service
{
    /**
     * @var ResourceModel\Recurring\ListRecurringDetails
     */
    protected $listRecurringDetails;

    /**
     * @var ResourceModel\Recurring\Disable
     */
    protected $disable;

    /**
     * @var ResourceModel\Recurring\NotifyShopper
     */
    protected $notifyShopper;

    /**
     * Recurring constructor.
     *
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->listRecurringDetails = new \Adyen\Service\ResourceModel\Recurring\ListRecurringDetails($this);
        $this->notifyShopper = new \Adyen\Service\ResourceModel\Recurring\NotifyShopper($this);

        $this->disable = new \Adyen\Service\ResourceModel\Recurring\Disable(
            $this,
            $this->getClient()->getConfig()->get('endpoint') . '/disable',
            array('merchantAccount', 'shopperReference')
        );
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function listRecurringDetails($params)
    {
        $result = $this->listRecurringDetails->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function notifyShopper($params)
    {
        $result = $this->notifyShopper->request($params);
        return $result;
    }
    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function disable($params)
    {
        $result = $this->disable->request($params);
        return $result;
    }
}
