<?php

namespace Adyen\Service;

class Payout extends \Adyen\Service
{

    protected $_confirm;
    protected $_decline;
    protected $_storeDetailsAndSubmit;
    protected $_submit;
    protected $_confirmThirdParty;
    protected $_declineThirdParty;
    protected $_storeDetailsAndSubmitThirdParty;
    protected $_submitThirdParty;
    protected $_storeDetail;

    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

	    $this->_confirm = new \Adyen\Service\ResourceModel\Payout\Confirm($this);
	    $this->_decline = new \Adyen\Service\ResourceModel\Payout\Decline($this);
	    $this->_storeDetailsAndSubmit = new \Adyen\Service\ResourceModel\Payout\StoreDetailsAndSubmit($this);
	    $this->_submit = new \Adyen\Service\ResourceModel\Payout\Submit($this);
	    $this->_confirmThirdParty = new \Adyen\Service\ResourceModel\Payout\ThirdParty\ConfirmThirdParty($this);
	    $this->_declineThirdParty = new \Adyen\Service\ResourceModel\Payout\ThirdParty\DeclineThirdParty($this);
	    $this->_storeDetailsAndSubmitThirdParty = new \Adyen\Service\ResourceModel\Payout\ThirdParty\StoreDetailsAndSubmitThirdParty($this);
	    $this->_submitThirdParty = new \Adyen\Service\ResourceModel\Payout\ThirdParty\SubmitThirdParty($this);
        $this->_storeDetail = new \Adyen\Service\ResourceModel\Payout\ThirdParty\StoreDetail($this);
    }

	public function confirm($params) {
		$result = $this->_confirm->request($params);
		return $result;
	}
	public function decline($params) {
		$result = $this->_decline->request($params);
		return $result;
	}
	public function storeDetailsAndSubmit($params) {
		$result = $this->_storeDetailsAndSubmit->request($params);
		return $result;
	}
	public function submit($params) {
		$result = $this->_submit->request($params);
		return $result;
	}
	public function confirmThirdParty($params) {
		$result = $this->_confirmThirdParty->request($params);
		return $result;
	}
	public function declineThirdParty($params) {
		$result = $this->_declineThirdParty->request($params);
		return $result;
	}
	public function storeDetailsAndSubmitThirdParty($params) {
		$result = $this->_storeDetailsAndSubmitThirdParty->request($params);
		return $result;
	}
	public function submitThirdParty($params) {
		$result = $this->_submitThirdParty->request($params);
		return $result;
	}
	public function storeDetail($params) {
	    $result = $this->_storeDetail->request($params);
	    return $result;
	}


}
