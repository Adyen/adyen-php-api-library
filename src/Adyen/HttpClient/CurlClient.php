<?php

namespace Adyen\HttpClient;


class CurlClient implements ClientInterface
{

    public function requestJson(\Adyen\Service $service, $requestUrl, $params)
    {

        $username = $service->getClient()->getConfig()->getUsername();
        $password = $service->getClient()->getConfig()->getPassword();

        $jsonRequest = json_encode($params);

        //Initiate cURL.
        $ch = curl_init($requestUrl);

        //Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);

        // set authorisation
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password);

        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonRequest);

        // set a custom User-Agent
        $userAgent = $service->getClient()->getConfig()->get('applicationName') . " " . \Adyen\Client::USER_AGENT_SUFFIX . $service->getClient()->getLibraryVersion();

        //Set the content type to application/json and use the defined userAgent
        $headers = array(
            'Content-Type: application/json',
            'User-Agent: ' . $userAgent
        );

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // return the result
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //Execute the request
        $result = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // result not 200 throw error
        if ($httpStatus != 200 && $result) {
            $this->handleResultError($result);
        } elseif(!$result) {
            $errno = curl_errno($ch);
            $message = curl_error($ch);

            curl_close($ch);
            $this->handleCurlError($requestUrl, $errno, $message);
        }

        curl_close($ch);

        // result in array or json
        if($service->getClient()->getConfig()->getOutputType() == 'array') {
            // transform to PHP Array
            return json_decode($result, true);
        }

        return $result;

    }

    public function requestPost(\Adyen\Service $service, $requestUrl, $params)
    {
        $username = $service->getClient()->getConfig()->getUsername();
        $password = $service->getClient()->getConfig()->getPassword();


        //Initiate cURL.
        $ch = curl_init($requestUrl);

        //Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);

        // set authorisation
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password);

//        needed for directoryLookup ? yes and disabled contyent type = json
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

        // set a custom User-Agent
        $userAgent = $service->getClient()->getConfig()->get('applicationName') . " " . \Adyen\Client::USER_AGENT_SUFFIX . $service->getClient()->getLibraryVersion();

        //Set the content type to application/json and use the defined userAgent
        $headers = array(
            'Content-Type: application/json',
            'User-Agent: ' . $userAgent
        );

        // return the result
        curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

        //Execute the request
        $result = curl_exec($ch);

        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpStatus != 200 && $result) {
            $this->handleResultError($result);
        } elseif(!$result) {
            $errno = curl_errno($ch);
            $message = curl_error($ch);
            $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);
            $this->handleCurlError($requestUrl, $errno, $message);
        }

        curl_close($ch);

        // result in array or json
        if($service->getClient()->getConfig()->getOutputType() == 'array') {
            // transform to PHP Array
            return json_decode($result, true);
        }

        return $result;
    }



    private function handleCurlError($url, $errno, $message)
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
                $msg = "Could not verify Stripe's SSL certificate.  Please make sure "
                    . "that your network is not intercepting certificates.  "
                    . "(Try going to $url in your browser.)  "
                    . "If this problem persists,";
                break;
            default:
                $msg = "Unexpected error communicating with Adyen.";
        }
        $msg .= "\n(Network error [errno $errno]: $message)";
        throw new \Adyen\AdyenException($msg);
    }

    private function handleResultError($result)
    {
        $decodeResult = json_decode($result, true);

        if(isset($decodeResult['message']) && isset($decodeResult['errorCode'])) {
            throw new \Adyen\AdyenException($decodeResult['message'], $decodeResult['errorCode']);
        }
        throw new \Adyen\AdyenException($result);
    }

}