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
     * AdyenException constructor.
     *
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     * @param ?string $status
     * @param ?string $errorType
     * @param ?string $pspReference
     */
	public function __construct(
	    $message = "",
        $code = 0,
        Exception $previous = null,
        $status = null,
        $errorType = null,
        $pspReference = null
    ) {
		$this->status = $status;
		$this->errorType = $errorType;
		$this->pspReference = $pspReference;
		parent::__construct($message, (int)$code, $previous);
	}

	/**
	 * Get status
	 *
	 * @return ?string
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get Adyen Error type
	 * 
	 * @return ?string
	 */
	public function getErrorType()
	{
		return $this->errorType;
	}

    /**
     * @return ?string
     */
    public function getPspReference()
    {
        return $this->pspReference;
    }
}
