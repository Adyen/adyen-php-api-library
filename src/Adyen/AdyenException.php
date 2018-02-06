<?php

namespace Adyen;

use Exception;

class AdyenException extends Exception
{

    protected $_status;
    protected $_errorType;

    /**
     * AdyenException constructor.
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     * @param null $status
     * @param null $errorType
     */
    public function __construct($message = "", $code = 0, Exception $previous = null, $status = null, $errorType = null)
    {
        $this->_status = $status;
        $this->_errorType = $errorType;
        parent::__construct($message, (int) $code, $previous);
    }

    /**
     * Get status
     *
     * @return null
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * Get Adyen Error type
     */
    public function getErrorType()
    {
        return $this->_errorType;
    }
}
