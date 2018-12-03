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
	 * AdyenException constructor.
	 *
	 * @param string $message
	 * @param int $code
	 * @param Exception|null $previous
	 * @param null $status
	 * @param null $errorType
	 */
	public function __construct($message = "", $code = 0, Exception $previous = null, $status = null, $errorType = null)
	{
		$this->status = $status;
		$this->errorType = $errorType;
		parent::__construct($message, (int)$code, $previous);
	}

	/**
	 * Get status
	 *
	 * @return null
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get Adyen Error type
	 */
	public function getErrorType()
	{
		return $this->errorType;
	}
}
