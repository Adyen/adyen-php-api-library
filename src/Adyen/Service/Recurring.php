<?php

namespace Adyen\Service;

/**
 * @deprecated Please consider using the model based services instead (suffix -Api.php)
 * @see \Adyen\Service\RecurringApi
 */
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
     * @var ResourceModel\Recurring\ScheduleAccountUpdater
     */
    protected $scheduleAccountUpdater;

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
        $this->scheduleAccountUpdater = new \Adyen\Service\ResourceModel\Recurring\ScheduleAccountUpdater($this);

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
    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function scheduleAccountUpdater($params)
    {
        $result = $this->scheduleAccountUpdater->request($params);
        return $result;
    }
}
