<?php

namespace Adyen\HttpClient;
use Adyen\AdyenException;



class CurlClient implements ClientInterface
{
	/**
	 * Json API request to Adyen
	 *
	 * @param \Adyen\Service $service
	 * @param $requestUrl
	 * @param $params
	 * @return mixed
	 * @throws AdyenException
	 */
	public function requestJson(\Adyen\Service $service, $requestUrl, $params, $requestOptions = null)
	{
		$client = $service->getClient();
		$config = $client->getConfig();
		$logger = $client->getLogger();
		$username = $config->getUsername();
		$password = $config->getPassword();
		$xApiKey = $config->getXApiKey();
		$httpProxy = $config->getHttpProxy();

		$jsonRequest = json_encode($params);

		// log the request
		$this->logRequest($logger, $requestUrl, $params);

		//Initiate cURL.
		$ch = curl_init($requestUrl);

		//Tell cURL that we want to send a POST request.
		curl_setopt($ch, CURLOPT_POST, 1);

		//Attach our encoded JSON string to the POST fields.
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonRequest);

		$this->curlSetHttpProxy($ch, $httpProxy);

		//create a custom User-Agent
		$userAgent = $config->get('applicationName') . " " . \Adyen\Client::USER_AGENT_SUFFIX . $client->getLibraryVersion();

		//Set the content type to application/json and use the defined userAgent
		$headers = array(
			'Content-Type: application/json',
			'User-Agent: ' . $userAgent
		);

		// if idempotency key is provided as option include into request
        if ($requestOptions != null && !empty($requestOptions['idempotencyKey'])) {
            $headers[] = 'Idempotency-Key: ' . $requestOptions['idempotencyKey'];
        }

        // set authorisation credentials according to support & availability
        if (!empty($xApiKey)) {
            //Set the content type to application/json and use the defined userAgent along with the x-api-key
            $headers[] = 'x-api-key: ' . $xApiKey;
        } elseif ($service->requiresApiKey()) {
            $msg = "Please provide a valid Checkout API Key";
            throw new AdyenException($msg);
        } else {

			//Set the basic auth credentials
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
		}

		//Set the timeout
		if ($config->getTimeout() != null) {
			curl_setopt($ch, CURLOPT_TIMEOUT, $config->getTimeout());
		}

		//Set the headers
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		// return the result
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		//Execute the request
		list($result, $httpStatus) = $this->curlRequest($ch);

		// log the raw response
		$logger->info("JSON Response is: " . $result);

		// Get errors
		list($errno, $message) = $this->curlError($ch);

		curl_close($ch);

		// result not 200 throw error
		if ($httpStatus != 200 && $result) {
			$this->handleResultError($result, $logger);
		} elseif (!$result) {
			$this->handleCurlError($requestUrl, $errno, $message, $logger);
		}

		// result in array or json
		if ($config->getOutputType() == 'array') {

			// transform to PHP Array
			$result = json_decode($result, true);

			// log the array result
			$logger->info('Params in response from Adyen:' . print_r($result, 1));
		}

		return $result;
	}

	/**
	 * Set httpProxy in the current curl configuration
	 *
	 * @param resource $ch
	 * @param string $httpProxy
	 * @throws AdyenException
	 */
	public function curlSetHttpProxy($ch, $httpProxy)
	{
		if (empty($httpProxy)) {
			return;
		}

		$urlParts = parse_url($httpProxy);
		if ($urlParts == false || !array_key_exists("host", $urlParts)) {
			throw new AdyenException("Invalid proxy configuration " . $httpProxy);
		}

		$proxy = $urlParts["host"];
		if (isset($urlParts["port"])) {
			$proxy .= ":" . $urlParts["port"];
		}
		curl_setopt($ch, CURLOPT_PROXY, $proxy);

		if (isset($urlParts["user"])) {
			curl_setopt($ch, CURLOPT_PROXYUSERPWD, $urlParts["user"] . ":" . $urlParts["pass"]);
		}
	}

	/**
	 * Request to Adyen with query string used for Directory Lookup
	 *
	 * @param \Adyen\Service $service
	 * @param $requestUrl
	 * @param $params
	 * @return mixed
	 * @throws AdyenException
	 */
	public function requestPost(\Adyen\Service $service, $requestUrl, $params)
	{
		$client = $service->getClient();
		$config = $client->getConfig();
		$logger = $client->getLogger();
		$username = $config->getUsername();
		$password = $config->getPassword();
		$httpProxy = $config->getHttpProxy();

		// log the requestUr, params and json request
		$logger->info("Request url to Adyen: " . $requestUrl);
		$logger->info('Params in request to Adyen:' . print_r($params, 1));

		//Initiate cURL.
		$ch = curl_init($requestUrl);

		//Tell cURL that we want to send a POST request.
		curl_setopt($ch, CURLOPT_POST, 1);

		$this->curlSetHttpProxy($ch, $httpProxy);

		// set authorisation
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
		curl_setopt($ch, CURLOPT_POST, count($params));
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

		// set a custom User-Agent
		$userAgent = $config->get('applicationName') . " " . \Adyen\Client::USER_AGENT_SUFFIX . $client->getLibraryVersion();

		//Set the content type to application/json and use the defined userAgent
		$headers = array(
			'Content-Type: application/x-www-form-urlencoded',
			'User-Agent: ' . $userAgent
		);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		// return the result
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		//Execute the request
		list($result, $httpStatus) = $this->curlRequest($ch);

		// log the raw response
		$logger->info("JSON Response is: " . $result);

		// Get errors
		list($errno, $message) = $this->curlError($ch);

		curl_close($ch);

		if ($httpStatus != 200 && $result) {
			$this->handleResultError($result, $logger);
		} elseif (!$result) {
			$this->handleCurlError($requestUrl, $errno, $message, $logger);
		}

		// result in array or json
		if ($config->getOutputType() == 'array') {
			// transform to PHP Array
			$result = json_decode($result, true);

			if (!$result) {
				$msg = "The result is empty, looks like your request is invalid";
				$logger->error($msg);
				throw new AdyenException($msg);
			}

			// log the array result
			$logger->info('Params in response from Adyen:' . print_r($result, 1));
		}

		return $result;
	}


	/**
	 * Handle Curl exceptions
	 *
	 * @param $url
	 * @param $errno
	 * @param $message
	 * @param $logger
	 * @throws \Adyen\ConnectionException
	 */
	protected function handleCurlError($url, $errno, $message, $logger)
	{
		switch ($errno) {
			case CURLE_OK:
				$msg = "Probably your Web Service username and/or password is incorrect";
				break;
			case CURLE_COULDNT_RESOLVE_HOST:
			case CURLE_OPERATION_TIMEOUTED:
				$msg = "Could not connect to Adyen ($url).  Please check your "
					. "internet connection and try again.";
				break;
			case CURLE_SSL_CACERT:
			case CURLE_SSL_PEER_CERTIFICATE:
				$msg = "Could not verify Adyen's SSL certificate.  Please make sure "
					. "that your network is not intercepting certificates.  "
					. "(Try going to $url in your browser.)  "
					. "If this problem persists,";
				break;
			default:
				$msg = "Unexpected error communicating with Adyen.";
		}
		$msg .= "\n(Network error [errno $errno]: $message)";
		$logger->error($msg);
		throw new \Adyen\ConnectionException($msg, $errno);
	}

	/**
	 * Handle result errors from Adyen
	 *
	 * @param $result
	 * @param $logger
	 * @throws AdyenException
	 */
	protected function handleResultError($result, $logger)
	{
		$decodeResult = json_decode($result, true);
		if (isset($decodeResult['message']) && isset($decodeResult['errorCode'])) {
			$logger->error($decodeResult['errorCode'] . ': ' . $decodeResult['message']);
			throw new AdyenException(
                $decodeResult['message'],
                $decodeResult['errorCode'],
                null,
                $decodeResult['status'],
                $decodeResult['errorType'],
                isset($decodeResult['pspReference']) ? $decodeResult['pspReference'] : null
            );
		}
		$logger->error($result);
		throw new AdyenException($result);
	}

	/**
	 * Logs the API request, removing sensitive data
	 *
	 * @param \Psr\Log\LoggerInterface $logger
	 * @param $requestUrl
	 * @param $params
	 */
	private function logRequest(\Psr\Log\LoggerInterface $logger, $requestUrl, $params)
	{
		// log the requestUr, params and json request
		$logger->info("Request url to Adyen: " . $requestUrl);
		if (isset($params["additionalData"]) && isset($params["additionalData"]["card.encrypted.json"])) {
			$params["additionalData"]["card.encrypted.json"] = "*";
		}
		if (isset($params["card"]) && isset($params["card"]["number"])) {
			$params["card"]["number"] = "*";
			$params["card"]["cvc"] = "*";
		}
		$logger->info('JSON Request to Adyen:' . json_encode($params));
	}

	/**
	 * Execute curl, return the result and the http response code
	 *
	 * @param $ch
	 * @return array
	 */
	protected function curlRequest($ch)
	{
		$result = curl_exec($ch);
		$httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		return array($result, $httpStatus);
	}

	/**
	 * Retrieve curl error number and message
	 *
	 * @param $ch
	 * @return array
	 */
	protected function curlError($ch)
	{
		$errno = curl_errno($ch);
		$message = curl_error($ch);
		return array($errno, $message);
	}
}
