<?php

namespace Adyen\Service;

class ServiceFactory
{
	/**
	 * @param \Adyen\Client $client
	 * @return CheckoutUtility
	 */
	public function createCheckoutUtility(\Adyen\Client $client)
	{
		return new \Adyen\Service\CheckoutUtility($client);
	}
}
