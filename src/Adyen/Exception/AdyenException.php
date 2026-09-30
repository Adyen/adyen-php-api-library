<?php
/**
 *                       ######
 *                       ######
 * ############    ####( ######  #####. ######  ############   ############
 * #############  #####( ######  #####. ######  #############  #############
 *        ######  #####( ######  #####. ######  #####  ######  #####  ######
 * ###### ######  #####( ######  #####. ######  #####  #####   #####  ######
 * ###### ######  #####( ######  #####. ######  #####          #####  ######
 * #############  #############  #############  #############  #####  ######
 *  ############   ############  #############   ############  #####  ######
 *                                      ######
 *                               #############
 *                               ############
 *
 * Adyen API Library for PHP
 *
 * Copyright (c) 2026 Adyen N.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Exception;

use Adyen\Model\ApiError;
use Exception;

/**
 * AdyenException Class
 *
 * @package  Adyen
 */
class AdyenException extends Exception
{
    /**
     * The HTTP body of the server response either as Json or string.
     *
     * @var \stdClass|string|null
     */
    protected $responseBody;

    /**
     * The HTTP header of the server response.
     *
     * @var string[][]|null
     */
    protected $responseHeaders;

    /**
     * The deserialized response object
     *
     * @var \stdClass|string|null
     */
    protected $responseObject;

    /**
     * The parsed API error.
     *
     * @var ApiError|null
     */
    protected $error;

    /**
     * Constructor
     *
     * @param string                $message         Error message
     * @param int                   $code            HTTP status code
     * @param string[][]|null       $responseHeaders HTTP response header
     * @param \stdClass|string|null $responseBody    Raw HTTP response body
     * @param \Throwable|null       $previous        Previous exception
     */
    public function __construct(
        $message = "",
        $code = 0,
        $responseHeaders = [],
        $responseBody = null,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
    }

    /**
     * Gets the HTTP response header
     *
     * @return string[][]|null HTTP response header
     */
    public function getResponseHeaders()
    {
        return $this->responseHeaders;
    }

    /**
     * Gets the HTTP body of the server response either as Json or string
     *
     * @return \stdClass|string|null HTTP body of the server response either as \stdClass or string
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * Sets the deserialized response object (during deserialization)
     *
     * @param mixed $obj Deserialized response object
     *
     * @return void
     */
    public function setResponseObject($obj)
    {
        $this->responseObject = $obj;
    }

    /**
     * Gets the deserialized response object (during deserialization)
     *
     * @return mixed the deserialized response object
     */
    public function getResponseObject()
    {
        return $this->responseObject;
    }

    /**
     * Creates an exception from an HTTP error response.
     *
     * @param int             $statusCode     HTTP status code
     * @param string[][]      $responseHeaders HTTP response headers
     * @param string|null     $responseBody   Raw HTTP response body
     * @param \Throwable|null $previous       Previous exception
     */
    public static function fromResponse(
        int $statusCode,
        array $responseHeaders = [],
        ?string $responseBody = null,
        ?\Throwable $previous = null
    ): self {
        $error = self::decodeError($responseBody);
        $exception = new self(
            self::createMessage($statusCode, $responseBody, $error),
            $statusCode,
            $responseHeaders,
            $responseBody,
            $previous
        );

        $exception->error = $error;
        $exception->responseObject = $error;

        return $exception;
    }

    /**
     * Gets the HTTP status code.
     */
    public function getStatusCode(): int
    {
        return $this->getCode();
    }

    /**
     * Gets the parsed API error.
     */
    public function getError(): ?ApiError
    {
        return $this->error;
    }

    private static function decodeError(?string $responseBody): ?ApiError
    {
        if ($responseBody === null || trim($responseBody) === '') {
            return null;
        }

        try {
            $payload = json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $exception) {
            return null;
        }

        return is_array($payload) ? ApiError::fromArray($payload) : null;
    }

    private static function createMessage(
        int $statusCode,
        ?string $responseBody,
        ?ApiError $error
    ): string {
        if ($error &&
            $error->getTitle() !== null &&
            $error->getTitle() !== '' &&
            $error->getDetail() !== null &&
            $error->getDetail() !== ''
        ) {
            return sprintf('%s: %s', $error->getTitle(), $error->getDetail());
        }

        if ($error && $error->getMessage() !== null && $error->getMessage() !== '') {
            return $error->getMessage();
        }

        if ($error && $error->getTitle() !== null && $error->getTitle() !== '') {
            return $error->getTitle();
        }

        if ($responseBody !== null && trim($responseBody) !== '') {
            return $responseBody;
        }

        return sprintf('HTTP request failed with status %d', $statusCode);
    }
}
