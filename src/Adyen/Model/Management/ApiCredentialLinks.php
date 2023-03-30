<?php

/**
 * Management API
 *
 * Configure and manage your Adyen company and merchant accounts, stores, and payment terminals. ## Authentication Each request to the Management API must be signed with an API key. [Generate your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) in the Customer Area and then set this key to the `X-API-Key` header value.  To access the live endpoints, you need to generate a new API key in your live Customer Area. ## Versioning  Management API handles versioning as part of the endpoint URL. For example, to send a request to version 1 of the `/companies/{companyId}/webhooks` endpoint, use:  ```text https://management-test.adyen.com/v1/companies/{companyId}/webhooks ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area. Use this API key to make requests to:  ```text https://management-live.adyen.com/v1 ```
 *
 * The version of the OpenAPI document: 1
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Management;

use \ArrayAccess;
use Adyen\Model\Management\ObjectSerializer;

/**
 * ApiCredentialLinks Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ApiCredentialLinks implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ApiCredentialLinks';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'allowed_origins' => '\Adyen\Model\Management\LinksElement',
        'company' => '\Adyen\Model\Management\LinksElement',
        'generate_api_key' => '\Adyen\Model\Management\LinksElement',
        'generate_client_key' => '\Adyen\Model\Management\LinksElement',
        'merchant' => '\Adyen\Model\Management\LinksElement',
        'self' => '\Adyen\Model\Management\LinksElement'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'allowed_origins' => null,
        'company' => null,
        'generate_api_key' => null,
        'generate_client_key' => null,
        'merchant' => null,
        'self' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'allowed_origins' => false,
		'company' => false,
		'generate_api_key' => false,
		'generate_client_key' => false,
		'merchant' => false,
		'self' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'allowed_origins' => 'allowedOrigins',
        'company' => 'company',
        'generate_api_key' => 'generateApiKey',
        'generate_client_key' => 'generateClientKey',
        'merchant' => 'merchant',
        'self' => 'self'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'allowed_origins' => 'setAllowedOrigins',
        'company' => 'setCompany',
        'generate_api_key' => 'setGenerateApiKey',
        'generate_client_key' => 'setGenerateClientKey',
        'merchant' => 'setMerchant',
        'self' => 'setSelf'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'allowed_origins' => 'getAllowedOrigins',
        'company' => 'getCompany',
        'generate_api_key' => 'getGenerateApiKey',
        'generate_client_key' => 'getGenerateClientKey',
        'merchant' => 'getMerchant',
        'self' => 'getSelf'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('allowed_origins', $data ?? [], null);
        $this->setIfExists('company', $data ?? [], null);
        $this->setIfExists('generate_api_key', $data ?? [], null);
        $this->setIfExists('generate_client_key', $data ?? [], null);
        $this->setIfExists('merchant', $data ?? [], null);
        $this->setIfExists('self', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['self'] === null) {
            $invalidProperties[] = "'self' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets allowed_origins
     *
     * @return \Adyen\Model\Management\LinksElement|null
     */
    public function getAllowedOrigins()
    {
        return $this->container['allowed_origins'];
    }

    /**
     * Sets allowed_origins
     *
     * @param \Adyen\Model\Management\LinksElement|null $allowed_origins allowed_origins
     *
     * @return self
     */
    public function setAllowedOrigins($allowed_origins)
    {
        if (is_null($allowed_origins)) {
            throw new \InvalidArgumentException('non-nullable allowed_origins cannot be null');
        }
        $this->container['allowed_origins'] = $allowed_origins;

        return $this;
    }

    /**
     * Gets company
     *
     * @return \Adyen\Model\Management\LinksElement|null
     */
    public function getCompany()
    {
        return $this->container['company'];
    }

    /**
     * Sets company
     *
     * @param \Adyen\Model\Management\LinksElement|null $company company
     *
     * @return self
     */
    public function setCompany($company)
    {
        if (is_null($company)) {
            throw new \InvalidArgumentException('non-nullable company cannot be null');
        }
        $this->container['company'] = $company;

        return $this;
    }

    /**
     * Gets generate_api_key
     *
     * @return \Adyen\Model\Management\LinksElement|null
     */
    public function getGenerateApiKey()
    {
        return $this->container['generate_api_key'];
    }

    /**
     * Sets generate_api_key
     *
     * @param \Adyen\Model\Management\LinksElement|null $generate_api_key generate_api_key
     *
     * @return self
     */
    public function setGenerateApiKey($generate_api_key)
    {
        if (is_null($generate_api_key)) {
            throw new \InvalidArgumentException('non-nullable generate_api_key cannot be null');
        }
        $this->container['generate_api_key'] = $generate_api_key;

        return $this;
    }

    /**
     * Gets generate_client_key
     *
     * @return \Adyen\Model\Management\LinksElement|null
     */
    public function getGenerateClientKey()
    {
        return $this->container['generate_client_key'];
    }

    /**
     * Sets generate_client_key
     *
     * @param \Adyen\Model\Management\LinksElement|null $generate_client_key generate_client_key
     *
     * @return self
     */
    public function setGenerateClientKey($generate_client_key)
    {
        if (is_null($generate_client_key)) {
            throw new \InvalidArgumentException('non-nullable generate_client_key cannot be null');
        }
        $this->container['generate_client_key'] = $generate_client_key;

        return $this;
    }

    /**
     * Gets merchant
     *
     * @return \Adyen\Model\Management\LinksElement|null
     */
    public function getMerchant()
    {
        return $this->container['merchant'];
    }

    /**
     * Sets merchant
     *
     * @param \Adyen\Model\Management\LinksElement|null $merchant merchant
     *
     * @return self
     */
    public function setMerchant($merchant)
    {
        if (is_null($merchant)) {
            throw new \InvalidArgumentException('non-nullable merchant cannot be null');
        }
        $this->container['merchant'] = $merchant;

        return $this;
    }

    /**
     * Gets self
     *
     * @return \Adyen\Model\Management\LinksElement
     */
    public function getSelf()
    {
        return $this->container['self'];
    }

    /**
     * Sets self
     *
     * @param \Adyen\Model\Management\LinksElement $self self
     *
     * @return self
     */
    public function setSelf($self)
    {
        if (is_null($self)) {
            throw new \InvalidArgumentException('non-nullable self cannot be null');
        }
        $this->container['self'] = $self;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }
}
