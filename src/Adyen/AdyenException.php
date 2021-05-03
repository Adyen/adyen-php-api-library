<?php

namespace Adyen;

use Exception;

class AdyenException extends Exception
{
    /**
     * @var null
     */
    protected $status;

    /**
     * @var null
     */
    protected $errorType;

    /**
     * @var string
     */
    protected $pspReference;

    /**
     * @var string
     */
    protected $adyenErrorCode;

    /**
     * AdyenException constructor.
     *
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     * @param string|null $status
     * @param string|null $errorType
     * @param string|null $pspReference
     * @param string|null $adyenErrorCode
     */
    public function __construct(
        $message = "",
        $code = 0,
        Exception $previous = null,
        $status = null,
        $errorType = null,
        $pspReference = null,
        $adyenErrorCode = null
    ) {
        $this->status = $status;
        $this->errorType = $errorType;
        $this->pspReference = $pspReference;
        $this->adyenErrorCode = $adyenErrorCode;
        parent::__construct($message, (int)$code, $previous);
    }

    /**
     * Get status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get Adyen Error type
     *
     * @return string|null
     */
    public function getErrorType()
    {
        return $this->errorType;
    }

    /**
     * @return string|null
     */
    public function getPspReference()
    {
        return $this->pspReference;
    }

    /**
     * @return string
     */
    public function getAdyenErrorCode()
    {
        return $this->adyenErrorCode;
    }
}
