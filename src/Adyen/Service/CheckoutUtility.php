<?php

namespace Adyen\Service;

class CheckoutUtility extends \Adyen\ApiKeyAuthenticatedService
{
	/**
	 * @var ResourceModel\CheckoutUtility\OriginKeys
	 */
	protected $_originKeys;

	/**
	 * CheckoutUtility constructor.
	 *
	 * @param \Adyen\Client $client
	 * @throws \Adyen\AdyenException
	 */
	public function __construct(\Adyen\Client $client)
	{
		parent::__construct($client);
		$this->_originKeys = new \Adyen\Service\ResourceModel\CheckoutUtility\OriginKeys($this);
	}

	/**
	 * @param $params
	 * @return mixed
	 * @throws \Adyen\AdyenException
	 */
	public function originKeys($params)
	{
		$result = $this->_originKeys->request($params);
		return $result;
	}
}
