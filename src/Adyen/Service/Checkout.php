<?php

namespace Adyen\Service;

use Adyen\Service\ResourceModel\Checkout\Recurring;

/**
 * @deprecated Please consider using the model based services instead (suffix -Api.php)
 * @see \Adyen\Service\Checkout\
 */
class Checkout extends \Adyen\ApiKeyAuthenticatedService
{
    /**
     * @var ResourceModel\Checkout\Sessions
     */
    protected $sessions;

    /**
     * @var ResourceModel\Checkout\PaymentMethods
     */
    protected $paymentMethods;

    /**
     * @var ResourceModel\Checkout\Payments
     */
    protected $payments;

    /**
     * @var ResourceModel\Checkout\PaymentsDetails
     */
    protected $paymentsDetails;

    /**
     * @var ResourceModel\Checkout\Donations
     */
    protected $donations;

    /**
     * @var ResourceModel\Checkout\CardDetails
     */
    protected $cardDetails;

    /**
     * @var ResourceModel\Checkout\PaymentLinks
     */
    protected $paymentLinks;

    /**
     * @var ResourceModel\Checkout\Orders
     */
    protected $orders;

    /**
     * @var ResourceModel\Checkout\OrdersCancel
     */
    protected $ordersCancel;

    /**
     * @var ResourceModel\Checkout\PaymentMethodsBalance
     */
    protected $paymentMethodsBalance;

    /**
     * @var ResourceModel\Checkout\Refunds
     */
    protected $refunds;

    /**
     * @var ResourceModel\Checkout\Reversals
     */
    protected $reversals;

    /**
     * @var ResourceModel\Checkout\Captures
     */
    protected $captures;

    /**
     * @var ResourceModel\Checkout\Cancels
     */
    protected $cancels;

    /**
     * @var ResourceModel\Checkout\TechnicalCancels
     */
    protected $technicalCancels;

    /**
     * @var ResourceModel\Checkout\Recurring
     */
    protected $recurring;

    /**
     * @var ResourceModel\Checkout\PaymentSession
     * @deprecated
     */
    protected $paymentSession;

    /**
     * @var ResourceModel\Checkout\PaymentsResult
     * @deprecated
     */
    protected $paymentsResult;

    /**
     * Checkout constructor.
     *
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->paymentSession = new \Adyen\Service\ResourceModel\Checkout\PaymentSession($this);
        $this->paymentsResult = new \Adyen\Service\ResourceModel\Checkout\PaymentsResult($this);
        $this->paymentMethods = new \Adyen\Service\ResourceModel\Checkout\PaymentMethods($this);
        $this->payments = new \Adyen\Service\ResourceModel\Checkout\Payments($this);
        $this->paymentsDetails = new \Adyen\Service\ResourceModel\Checkout\PaymentsDetails($this);
        $this->paymentLinks = new \Adyen\Service\ResourceModel\Checkout\PaymentLinks($this, null);
        $this->orders = new \Adyen\Service\ResourceModel\Checkout\Orders($this);
        $this->ordersCancel = new \Adyen\Service\ResourceModel\Checkout\OrdersCancel($this);
        $this->paymentMethodsBalance = new \Adyen\Service\ResourceModel\Checkout\PaymentMethodsBalance($this);
        $this->donations = new \Adyen\Service\ResourceModel\Checkout\Donations($this);
        $this->sessions = new \Adyen\Service\ResourceModel\Checkout\Sessions($this);
        $this->cardDetails = new \Adyen\Service\ResourceModel\Checkout\CardDetails($this);
        $this->refunds = new \Adyen\Service\ResourceModel\Checkout\Refunds($this);
        $this->reversals = new \Adyen\Service\ResourceModel\Checkout\Reversals($this);
        $this->captures = new \Adyen\Service\ResourceModel\Checkout\Captures($this);
        $this->cancels = new \Adyen\Service\ResourceModel\Checkout\Cancels($this);
        $this->technicalCancels = new \Adyen\Service\ResourceModel\Checkout\TechnicalCancels($this);
        $this->recurring = new Recurring($this, null);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function paymentSession($params)
    {
        $result = $this->paymentSession->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function paymentsResult($params)
    {
        $result = $this->paymentsResult->request($params);
        return $result;
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function paymentMethods($params)
    {
        $result = $this->paymentMethods->request($params);
        return $result;
    }

    /**
     * @param $params
     * @param null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function payments($params, $requestOptions = null)
    {
        $result = $this->payments->request($params, $requestOptions);
        return $result;
    }

    /**
     * @param $params
     * @param null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function paymentsDetails($params, $requestOptions = null)
    {
        $result = $this->paymentsDetails->request($params, $requestOptions);
        return $result;
    }

    /**
     * @param $params
     * @param null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function cardDetails($params, $requestOptions = null)
    {
        $result = $this->cardDetails->request($params, $requestOptions);
        return $result;
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function paymentLinks($params, $requestOptions = null)
    {
        return $this->paymentLinks->create($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function retrievePaymentLinks($linkId)
    {
        return $this->paymentLinks->retrieve($linkId);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function updatePaymentLinks($linkId, $params)
    {
        return $this->paymentLinks->update($linkId, $params);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function paymentMethodsBalance($params, $requestOptions = null)
    {
        return $this->paymentMethodsBalance->request($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function orders($params, $requestOptions = null)
    {
        return $this->orders->request($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function ordersCancel($params, $requestOptions = null)
    {
        return $this->ordersCancel->request($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function donations($params, $requestOptions = null)
    {
        return $this->donations->request($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function sessions($params, $requestOptions = null)
    {
        return $this->sessions->request($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function refunds($params, $requestOptions = null)
    {
        return $this->refunds->request($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function reversals($params, $requestOptions = null)
    {
        return $this->reversals->request($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function captures($params, $requestOptions = null)
    {
        return $this->captures->request($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function cancels($params, $requestOptions = null)
    {
        return $this->cancels->request($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function technicalCancels($params, $requestOptions = null)
    {
        return $this->technicalCancels->request($params, $requestOptions);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function getStoredPaymentMethods(array $queryParams = [])
    {
        return $this->recurring->retrieve($queryParams);
    }

    /**
     * @param array $params
     * @param array|null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function deleteStoredPaymentMethods($recurringId, array $queryParams = [])
    {
        return $this->recurring->delete($recurringId, $queryParams);
    }
}
