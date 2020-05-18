<?php

namespace Adyen\HttpClient;

use Adyen\AdyenException;

class CurlClient implements ClientInterface
{
    // List of parameters that needs to be masked with the same array structure as it appears in
    // the response array
    private static $responseParamsToMask = array(
        'paymentData',
        'action' => array(
            'paymentData'
        )
    );

    // List of parameters that needs to be masked with the same array structure as it appears in
    // the request array

    private static $requestParamsToMask = array(
        'paymentData',
        'card' => array(
            'number',
            'cvc'
        ),
        'additionalData' => array(
            'card.encrypted.json'
        ),
        'paymentMethod' => array(
            'number',
            'expiryMonth',
            'expiryYear',
            'cvc',
            'encryptedCardNumber',
            'encryptedExpiryMonth',
            'encryptedExpiryYear',
            'encryptedSecurityCode',
            'applepay.token',
            'paywithgoogle.token'
        )
    );
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
        $environment = $config->getEnvironment();

        $jsonRequest = json_encode($params);

        // log the request
        $this->logRequest($logger, $requestUrl, $environment, $params);

        //Initiate cURL.
        $ch = curl_init($requestUrl);

        //Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);

        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonRequest);

        $this->curlSetHttpProxy($ch, $httpProxy);

        //create a custom User-Agent
        $userAgent = $config->get('applicationName') . " " .
            \Adyen\Client::USER_AGENT_SUFFIX . $client->getLibraryVersion();

        //Set the content type to application/json and use the defined userAgent
        $headers = array(
            'Content-Type: application/json',
            'User-Agent: ' . $userAgent
        );

        // if idempotency key is provided as option include into request
        if (!empty($requestOptions['idempotencyKey'])) {
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

        // log the response
        $decodedResult = json_decode($result, true);
        $this->logResponse($logger, $environment, $decodedResult);

        // Get errors
        list($errno, $message) = $this->curlError($ch);

        curl_close($ch);

        $resultOKHttpStatusCodes = array(200, 201, 202, 204);

        if (!in_array($httpStatus, $resultOKHttpStatusCodes) && $result) {
            $this->handleResultError($result, $logger);
        } elseif (!$result) {
            $this->handleCurlError($requestUrl, $errno, $message, $logger);
        }

        // result in array or json
        if ($config->getOutputType() == 'array') {
            // transform to PHP Array
            $result = json_decode($result, true);
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
        $environment = $config->getEnvironment();

        // log the request
        $this->logRequest($logger, $requestUrl, $environment, $params);

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
        $userAgent = $config->get('applicationName') . " " .
            \Adyen\Client::USER_AGENT_SUFFIX . $client->getLibraryVersion();

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

        // log the response
        $decodedResult = json_decode($result, true);
        $this->logResponse($logger, $environment, $decodedResult);

        // Get errors
        list($errno, $message) = $this->curlError($ch);

        curl_close($ch);

        $resultOKHttpStatusCodes = array(200, 201, 202, 204);

        if (!in_array($httpStatus, $resultOKHttpStatusCodes) && $result) {
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
     * @param string requestUrl
     * @param string $environment
     * @param array $params
     */
    private function logRequest(\Psr\Log\LoggerInterface $logger, $requestUrl, $environment, $params)
    {
        // log the requestUr, params and json request
        $logger->info("Request url to Adyen: " . $requestUrl);

        // Filter sensitive data from logs when live
        if (\Adyen\Environment::LIVE == $environment) {
            $params = $this->maskParametersRecursive(self::$requestParamsToMask, $params);
        }

        $logger->info('JSON Request to Adyen:' . json_encode($params));
    }

    /**
     * Logs the API request, removing sensitive data
     *
     * @param \Psr\Log\LoggerInterface $logger
     * @param string requestUrl
     * @param string $environment
     * @param array $params
     */
    private function logResponse(\Psr\Log\LoggerInterface $logger, $environment, $params)
    {
        // Filter sensitive data from logs when live
        if (\Adyen\Environment::LIVE == $environment) {
            $params = $this->maskParametersRecursive(self::$responseParamsToMask, $params);
        }

        $logger->info('JSON Response to Adyen:' . json_encode($params));
    }

    /**
     * @param $value
     * @param $key
     * @param $param
     */
    private function maskParametersRecursive($paramsToMaskList, $params)
    {
        if (is_array($paramsToMaskList)) {
            foreach ($paramsToMaskList as $key => $paramsToMask) {
                if (is_array($paramsToMask) && isset($params[$key])) {
                    // if $paramsToMask is an array and $params[$key] exists, $paramsToMask is an array of keys
                    $params[$key] = $this->maskParametersRecursive($paramsToMask, $params[$key]);
                } elseif (!is_array($paramsToMask) && isset($params[$paramsToMask])) {
                    // if $paramsToMask is not an array and $params[$paramsToMask] exists, $params[$paramsToMask] is
                    // a parameter that needs to be masked
                    $params[$paramsToMask] = $this->maskParameter($params[$paramsToMask]);
                }
            }
        } else {
            // in case $paramsToMaskList is not an array then it is a parameter that needs to be masked
            $params[$paramsToMaskList] = $this->maskParameter($params[$paramsToMaskList]);
        }

        return $params;
    }

    /**
     * Masks the parameter
     * If the value is longer than 6 char then 3 asterisks are appended to the first 6 char of the value
     * If the value is shorter than 6 char then replace all the chars with asterisks
     *
     * @param $parameter
     * @return string
     */
    private function maskParameter($parameter)
    {
        if (empty($parameter)) {
            return $parameter;
        }

        if (strlen($parameter) > 6) {
            $parameter = substr($parameter, 0, 6) . '***';
        } else {
            $parameter = str_repeat('*', strlen($parameter));
        }

        return $parameter;
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
