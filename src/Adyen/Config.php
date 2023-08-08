<?php

namespace Adyen;

class Config
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var array
     */
    protected $allowedInput = ['array', 'json'];

    /**
     * @var string
     */
    protected $defaultInput = 'array';

    /**
     * @var array
     */
    protected $allowedOutput = ['array', 'json'];

    /**
     * @var string
     */
    protected $defaultOutput = 'array';

    /**
     * Config constructor.
     *
     * @param array|null $params
     */
    public function __construct(array $params = null)
    {
        if ($params) {
            foreach ($params as $key => $param) {
                $this->data[$key] = $param;
            }
        }
    }

    /**
     * Get a specific key value.
     *
     * @param string $key Key to retrieve.
     *
     * @return mixed|null Value of the key or NULL
     */
    public function get(string $key)
    {
        return $this->data[$key] ?? null;
    }

    /**
     * Set a key value pair
     *
     * @param string $key Key to set
     * @param mixed $value Value to set
     */
    public function set(string $key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * @return mixed|null
     */
    public function getUsername()
    {
        return $this->data['username'] ?? null;
    }

    /**
     * @return mixed|null
     */
    public function getPassword()
    {
        return $this->data['password'] ?? null;
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

    /**
     * Get the http proxy configuration
     *
     * @return mixed|null
     */
    public function getHttpProxy()
    {
        return !empty($this->data['http-proxy']) ? $this->data['http-proxy'] : null;
    }

    /**
     * Get the path to a CA bundle file that enables verification using a custom certificate
     *
     * @return mixed|null
     */
    public function getSslVerify()
    {
        return !empty($this->data['ssl-verify']) ? $this->data['ssl-verify'] : null;
    }

    /**
     * @return mixed|string
     */
    public function getInputType()
    {
        if (isset($this->data['inputType']) && in_array($this->data['inputType'], $this->allowedInput)) {
            return $this->data['inputType'];
        }

        return $this->defaultInput;
    }

    /**
     * @return mixed|string
     */
    public function getOutputType()
    {
        if (isset($this->data['outputType']) && in_array($this->data['outputType'], $this->allowedOutput)) {
            return $this->data['outputType'];
        }

        return $this->defaultOutput;
    }

    /**
     * @return mixed|null
     */
    public function getTimeout()
    {
        return !empty($this->data['timeout']) ? $this->data['timeout'] : null;
    }

    /**
     * @return mixed|null
     */
    public function getMerchantAccount()
    {
        return $this->data['merchantAccount'] ?? null;
    }

    /**
     * @return mixed|null
     */
    public function getAdyenPaymentSource()
    {
        return $this->data['adyenPaymentSource'] ?? null;
    }

    /**
     * @return array|null an array with 'name' and 'version'
     */
    public function getMerchantApplication(): ?array
    {
        return $this->data['merchantApplication'] ?? null;
    }

    /**
     * @return mixed|null
     */
    public function getExternalPlatform()
    {
        return $this->data['externalPlatform'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getEnvironment(): ?string
    {
        return $this->data['environment'] ?? null;
    }
}
