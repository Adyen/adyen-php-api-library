<?php

namespace Adyen;

class Config implements ConfigInterface
{

    /** @var array */
    protected $data = array();

    // allowed input
    protected $allowedInput = array('array', 'json');
    protected $defaultInput = 'array';

    // allowed output
    protected $allowedOutput = array('array', 'json');
    protected $defaultOutput = 'array';

    public function __construct($params = null)
    {
        if($params && is_array($params)) {
            foreach($params as $key => $param) {
                $this->data[$key] = $param;
            }
        }
        return $this;
    }

    /**
     * Get a specific key value.
     *
     * @param string $key Key to retrieve.
     *
     * @return mixed|null Value of the key or NULL
     */
    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    /**
     * Set a key value pair
     *
     * @param string $key   Key to set
     * @param mixed  $value Value to set
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getUsername()
    {
        return isset($this->data['username']) ? $this->data['username'] : null;
    }

    public function getPassword()
    {
        return isset($this->data['password']) ? $this->data['password'] : null;
    }

    /**
     * Get the Checkout API Key from the Adyen Customer Area
     *
     * @return mixed|null
     */
    public function getXApiKey()
    {
        return !empty($this->data['x-api-key']) ? $this->data['x-api-key'] : null;
    }

    public function getInputType()
    {
        if(isset($this->data['inputType']) && in_array($this->data['inputType'], $this->allowedInput)) {
            return $this->data['inputType'];
        }

        // return default type
        return $this->defaultInput;
    }

    public function getOutputType()
    {
        if(isset($this->data['outputType']) && in_array($this->data['outputType'], $this->allowedOutput)) {
            return $this->data['outputType'];
        }
        // return the default type
        return $this->defaultOutput;
    }

    public function getTimeout()
    {
        return !empty($this->data['timeout']) ? $this->data['timeout'] : null;
    }

    public function getMerchantAccount()
    {
        return isset($this->data['merchantAccount']) ? $this->data['merchantAccount'] : null;
    }

	/**
	 * @return mixed|null
	 */
	public function getAdyenPaymentSource()
	{
		return isset($this->data['adyenPaymentSource']) ? $this->data['adyenPaymentSource'] : null;
	}

	/**
	 * @return mixed|null
	 */
	public function getExternalPlatform()
	{
		return isset($this->data['externalPlatform']) ? $this->data['externalPlatform'] : null;
	}
}