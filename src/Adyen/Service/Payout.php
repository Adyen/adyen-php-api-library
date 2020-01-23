<?php

namespace Adyen\Service;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Service\ResourceModel\Payout\Confirm;
use Adyen\Service\ResourceModel\Payout\Decline;
use Adyen\Service\ResourceModel\Payout\StoreDetailsAndSubmit;
use Adyen\Service\ResourceModel\Payout\Submit;
use Adyen\Service\ResourceModel\Payout\ThirdParty\ConfirmThirdParty;
use Adyen\Service\ResourceModel\Payout\ThirdParty\DeclineThirdParty;
use Adyen\Service\ResourceModel\Payout\ThirdParty\StoreDetail;
use Adyen\Service\ResourceModel\Payout\ThirdParty\StoreDetailsAndSubmitThirdParty;
use Adyen\Service\ResourceModel\Payout\ThirdParty\SubmitThirdParty;

class Payout extends Service
{
    /**
     * @var ResourceModel\Payout\Confirm
     */
    protected $confirm;

    /**
     * @var ResourceModel\Payout\Decline
     */
    protected $decline;

    /**
     * @var ResourceModel\Payout\StoreDetailsAndSubmit
     */
    protected $storeDetailsAndSubmit;

    /**
     * @var ResourceModel\Payout\Submit
     */
    protected $submit;

    /**
     * @var ResourceModel\Payout\ThirdParty\ConfirmThirdParty
     */
    protected $confirmThirdParty;

    /**
     * @var ResourceModel\Payout\ThirdParty\DeclineThirdParty
     */
    protected $declineThirdParty;

    /**
     * @var ResourceModel\Payout\ThirdParty\StoreDetailsAndSubmitThirdParty
     */
    protected $storeDetailsAndSubmitThirdParty;

    /**
     * @var ResourceModel\Payout\ThirdParty\SubmitThirdParty
     */
    protected $submitThirdParty;

    /**
     * @var ResourceModel\Payout\ThirdParty\StoreDetail
     */
    protected $storeDetail;

    /**
     * Payout constructor.
     *
     * @param Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);
        $this->confirm = new Confirm($this);
        $this->decline = new Decline($this);
        $this->storeDetailsAndSubmit = new StoreDetailsAndSubmit($this);
        $this->submit = new Submit($this);
        $this->confirmThirdParty = new ConfirmThirdParty($this);
        $this->declineThirdParty = new DeclineThirdParty($this);
        $this->storeDetailsAndSubmitThirdParty = new StoreDetailsAndSubmitThirdParty($this);
        $this->submitThirdParty = new SubmitThirdParty($this);
        $this->storeDetail = new StoreDetail($this);
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function confirm($params)
    {
        $result = $this->confirm->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function decline($params)
    {
        $result = $this->decline->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function storeDetailsAndSubmit($params)
    {
        $result = $this->storeDetailsAndSubmit->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function submit($params)
    {
        $result = $this->submit->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function confirmThirdParty($params)
    {
        $result = $this->confirmThirdParty->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function declineThirdParty($params)
    {
        $result = $this->declineThirdParty->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function storeDetailsAndSubmitThirdParty($params)
    {
        $result = $this->storeDetailsAndSubmitThirdParty->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function submitThirdParty($params)
    {
        $result = $this->submitThirdParty->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function storeDetail($params)
    {
        $result = $this->storeDetail->request($params);
        return $result;
    }
}
