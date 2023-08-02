<?php

namespace Adyen\HttpClient;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\ConnectionException;
use Adyen\Service;

class CurlClient implements ClientInterface
{

    const USER_AGENT = 'User-Agent: ';
    const CONTENT_TYPE = 'Content-Type: application/json';
    const LIBRARY_NAME = "adyen-library-name: ";
    const LIBRARY_VERSION = "adyen-library-version: ";

    /**
     * Json API request to Adyen
     *
     * @param Service $service
     * @param $requestUrl
     * @param $params
     * @param null $requestOptions
     * @return mixed
     * @throws AdyenException
     * @throws ConnectionException
     */
    public function requestJson(Service $service, $requestUrl, $params, $requestOptions = null)
    {
        return $this->requestHttp($service, $requestUrl, $params, 'post', $requestOptions);
    }

    /**
     * Set httpProxy in the current curl configuration
     *
     * @param resource $ch
     * @param string|null $httpProxy
     * @throws AdyenException
     */
    public function curlSetHttpProxy($ch, ?string $httpProxy)
    {
        if (empty($httpProxy)) {
            return;
        }

        $urlParts = parse_url($httpProxy);
        if (!$urlParts || !array_key_exists("host", $urlParts)) {
            throw new AdyenException("Invalid proxy configuration " . $httpProxy);
        }

        $proxy = "";
        if (isset($urlParts["scheme"])) {
            $proxy = $urlParts["scheme"] . "://";
        }
        $proxy .= $urlParts["host"];
        if (isset($urlParts["port"])) {
            $proxy .= ":" . $urlParts["port"];
        }
        curl_setopt($ch, CURLOPT_PROXY, $proxy);

        if (isset($urlParts["user"])) {
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $urlParts["user"] . ":" . $urlParts["pass"]);
        }
    }

    /**
     * Set the path to a custom CA bundle in the current curl configuration.
     *
     * @param resource $ch
     * @param string|null $certFilePath
     * @throws AdyenException
     */
    public function curlSetSslVerify($ch, ?string $certFilePath)
    {
        if (empty($certFilePath)) {
            return;
        }

        if (!file_exists($certFilePath)) {
            throw new AdyenException("SSL CA bundle not found: $certFilePath");
        }

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_CAINFO, $certFilePath);
    }

    /**
     * Request to Adyen with query string used for Directory Lookup
     *
     * @param Service $service
     * @param $requestUrl
     * @param $params
     * @return mixed
     * @throws AdyenException
     * @throws ConnectionException
     */
    public function requestPost(Service $service, $requestUrl, $params)
    {
        $client = $service->getClient();
        $config = $client->getConfig();
        $username = $config->getUsername();
        $password = $config->getPassword();
        $httpProxy = $config->getHttpProxy();
        $sslVerify = $config->getSslVerify();

        // Initiate cURL.
        $ch = curl_init($requestUrl);

        // Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);

        $this->curlSetHttpProxy($ch, $httpProxy);
        $this->curlSetSslVerify($ch, $sslVerify);

        // set authorisation
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

        // set a custom User-Agent
        $userAgent = $config->get('applicationName') . " " .
            Client::USER_AGENT_SUFFIX . $client->getLibraryVersion();

        // Add application info in headers
        $libraryName = self::LIBRARY_NAME . $client->getLibraryName();
        $libraryVersion = self::LIBRARY_VERSION . $client->getLibraryVersion();

        // Set the content type to application/json and use the defined userAgent
        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
            self::USER_AGENT . $userAgent,
            $libraryName,
            $libraryVersion
        );

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Return the result
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Execute the request
        [$result, $httpStatus] = $this->curlRequest($ch);

        // Get errors
        [$errno] = $this->curlError($ch);

        curl_close($ch);

        $resultOKHttpStatusCodes = array(200, 201, 202, 204);

        if (!in_array($httpStatus, $resultOKHttpStatusCodes) && $result) {
            $this->handleResultError($result);
        } elseif (!$result) {
            $this->handleCurlError($requestUrl, $errno);
        }

        // Result in array or json
        if ($config->getOutputType() == 'array') {
            // Transform to PHP Array
            $result = json_decode($result, true);

            if (!$result) {
                $msg = "The result is empty, looks like your request is invalid";
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
     * @throws ConnectionException
     */
    protected function handleCurlError($url, $errno)
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
        throw new ConnectionException($msg, $errno);
    }

    /**
     * Handle result errors from Adyen
     *
     * @param $result
     * @throws AdyenException
     */
    protected function handleResultError($result)
    {
        $decodeResult = json_decode($result, true);
        if (isset($decodeResult['message']) && isset($decodeResult['errorCode'])) {
            throw new AdyenException(
                $decodeResult['message'],
                $decodeResult['status'],
                null,
                $decodeResult['status'],
                $decodeResult['errorType'],
                $decodeResult['pspReference'] ?? null,
                $decodeResult['errorCode']
            );
        }
        throw new AdyenException($result);
    }

    /**
     * Execute curl, return the result and the http response code
     *
     * @param $ch
     * @return array
     */
    protected function curlRequest($ch): array
    {
        $result = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return [$result, $httpStatus];
    }

    /**
     * Retrieve curl error number and message
     *
     * @param $ch
     * @return array
     */
    protected function curlError($ch): array
    {
        $errno = curl_errno($ch);
        $message = curl_error($ch);
        return [$errno, $message];
    }

    /**
     * @throws ConnectionException
     * @throws AdyenException
     */
    public function requestHttp(Service $service, $requestUrl, $params, $method, $requestOptions = null)
    {
        $client = $service->getClient();
        $config = $client->getConfig();
        $username = $config->getUsername();
        $password = $config->getPassword();
        $xApiKey = $config->getXApiKey();
        $httpProxy = $config->getHttpProxy();
        $sslVerify = $config->getSslVerify();

        $jsonRequest = json_encode($params);

        // Initiate cURL.
        $ch = curl_init($requestUrl);

        if ($method === self::HTTP_METHOD_GET) {
            curl_setopt($ch, CURLOPT_HTTPGET, 1);
        } elseif ($method === self::HTTP_METHOD_POST) {
            // Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            // Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonRequest);
        } elseif ($method === self::HTTP_METHOD_PATCH) {
            // Tell cURL that we want to send a PATCH request.
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
            // Attach our encoded JSON string to the PATCH fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonRequest);
        } elseif ($method === self::HTTP_METHOD_DELETE) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        }

        $this->curlSetHttpProxy($ch, $httpProxy);
        $this->curlSetSslVerify($ch, $sslVerify);

        // Create a custom User-Agent
        $userAgent = $config->get('applicationName') . " " .
            Client::USER_AGENT_SUFFIX . $client->getLibraryVersion();

        // Add application info in headers
        $libraryName = self::LIBRARY_NAME . $client->getLibraryName();
        $libraryVersion = self::LIBRARY_VERSION . $client->getLibraryVersion();

        // Set the content type to application/json and use the defined userAgent
        $headers = array(
            self::CONTENT_TYPE,
            self::USER_AGENT . $userAgent,
            $libraryName,
            $libraryVersion
        );

        // If idempotency key is provided as option include into request
        if (!empty($requestOptions['idempotencyKey'])) {
            $headers[] = 'Idempotency-Key: ' . $requestOptions['idempotencyKey'];
        }

        // Set authorisation credentials according to support & availability
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

        // Set the timeout
        if ($config->getTimeout() != null) {
            curl_setopt($ch, CURLOPT_TIMEOUT, $config->getTimeout());
        }

        // Set the headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Return the result
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Execute the request
        [$result, $httpStatus] = $this->curlRequest($ch);

        // Get errors
        [$errno] = $this->curlError($ch);

        curl_close($ch);

        $hasFailed = !in_array($httpStatus, array(200, 201, 202, 204));

        if ($hasFailed && $result) {
            $this->handleResultError($result);
        } elseif ($hasFailed && !$result) {
            $this->handleCurlError($requestUrl, $errno);
        }

        // Result in array or json
        if ($config->getOutputType() == 'array') {
            // Transform to PHP Array
            $result = json_decode($result, true);
        }

        return $result;
    }
}
