<?php

namespace Adyen;

class ClientFactory
{
	/**
	 * @param \Adyen\Client $client
	 * @return CheckoutUtility
	 */
	public function createClient()
	{
		return new \Adyen\Client();
	}
}
