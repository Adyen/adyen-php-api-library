<?php

/**
 * Adyen Checkout API
 *
 * The version of the OpenAPI document: 70
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

/**
 * ShopperInput Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ShopperInput implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ShopperInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'billingAddress' => 'string',
        'deliveryAddress' => 'string',
        'personalDetails' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'billingAddress' => null,
        'deliveryAddress' => null,
        'personalDetails' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'billingAddress' => false,
        'deliveryAddress' => false,
        'personalDetails' => false
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
        'billingAddress' => 'billingAddress',
        'deliveryAddress' => 'deliveryAddress',
        'personalDetails' => 'personalDetails'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'billingAddress' => 'setBillingAddress',
        'deliveryAddress' => 'setDeliveryAddress',
        'personalDetails' => 'setPersonalDetails'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'billingAddress' => 'getBillingAddress',
        'deliveryAddress' => 'getDeliveryAddress',
        'personalDetails' => 'getPersonalDetails'
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

    public const BILLING_ADDRESS_EDITABLE = 'editable';
    public const BILLING_ADDRESS_HIDDEN = 'hidden';
    public const BILLING_ADDRESS_READ_ONLY = 'readOnly';
    public const DELIVERY_ADDRESS_EDITABLE = 'editable';
    public const DELIVERY_ADDRESS_HIDDEN = 'hidden';
    public const DELIVERY_ADDRESS_READ_ONLY = 'readOnly';
    public const PERSONAL_DETAILS_EDITABLE = 'editable';
    public const PERSONAL_DETAILS_HIDDEN = 'hidden';
    public const PERSONAL_DETAILS_READ_ONLY = 'readOnly';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBillingAddressAllowableValues()
    {
        return [
            self::BILLING_ADDRESS_EDITABLE,
            self::BILLING_ADDRESS_HIDDEN,
            self::BILLING_ADDRESS_READ_ONLY,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDeliveryAddressAllowableValues()
    {
        return [
            self::DELIVERY_ADDRESS_EDITABLE,
            self::DELIVERY_ADDRESS_HIDDEN,
            self::DELIVERY_ADDRESS_READ_ONLY,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPersonalDetailsAllowableValues()
    {
        return [
            self::PERSONAL_DETAILS_EDITABLE,
            self::PERSONAL_DETAILS_HIDDEN,
            self::PERSONAL_DETAILS_READ_ONLY,
        ];
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
        $this->setIfExists('billingAddress', $data ?? [], null);
        $this->setIfExists('deliveryAddress', $data ?? [], null);
        $this->setIfExists('personalDetails', $data ?? [], null);
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

        $allowedValues = $this->getBillingAddressAllowableValues();
        if (!is_null($this->container['billingAddress']) && !in_array($this->container['billingAddress'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'billingAddress', must be one of '%s'",
                $this->container['billingAddress'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getDeliveryAddressAllowableValues();
        if (!is_null($this->container['deliveryAddress']) && !in_array($this->container['deliveryAddress'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'deliveryAddress', must be one of '%s'",
                $this->container['deliveryAddress'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getPersonalDetailsAllowableValues();
        if (!is_null($this->container['personalDetails']) && !in_array($this->container['personalDetails'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'personalDetails', must be one of '%s'",
                $this->container['personalDetails'],
                implode("', '", $allowedValues)
            );
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
     * Gets billingAddress
     *
     * @return string|null
     */
    public function getBillingAddress()
    {
        return $this->container['billingAddress'];
    }

    /**
     * Sets billingAddress
     *
     * @param string|null $billingAddress Specifies visibility of billing address fields.  Permitted values: * editable * hidden * readOnly
     *
     * @return self
     */
    public function setBillingAddress($billingAddress)
    {
        if (is_null($billingAddress)) {
            throw new \InvalidArgumentException('non-nullable billingAddress cannot be null');
        }
        $allowedValues = $this->getBillingAddressAllowableValues();
        if (!in_array($billingAddress, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'billingAddress', must be one of '%s'",
                    $billingAddress,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['billingAddress'] = $billingAddress;

        return $this;
    }

    /**
     * Gets deliveryAddress
     *
     * @return string|null
     */
    public function getDeliveryAddress()
    {
        return $this->container['deliveryAddress'];
    }

    /**
     * Sets deliveryAddress
     *
     * @param string|null $deliveryAddress Specifies visibility of delivery address fields.  Permitted values: * editable * hidden * readOnly
     *
     * @return self
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        if (is_null($deliveryAddress)) {
            throw new \InvalidArgumentException('non-nullable deliveryAddress cannot be null');
        }
        $allowedValues = $this->getDeliveryAddressAllowableValues();
        if (!in_array($deliveryAddress, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'deliveryAddress', must be one of '%s'",
                    $deliveryAddress,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['deliveryAddress'] = $deliveryAddress;

        return $this;
    }

    /**
     * Gets personalDetails
     *
     * @return string|null
     */
    public function getPersonalDetails()
    {
        return $this->container['personalDetails'];
    }

    /**
     * Sets personalDetails
     *
     * @param string|null $personalDetails Specifies visibility of personal details.  Permitted values: * editable * hidden * readOnly
     *
     * @return self
     */
    public function setPersonalDetails($personalDetails)
    {
        if (is_null($personalDetails)) {
            throw new \InvalidArgumentException('non-nullable personalDetails cannot be null');
        }
        $allowedValues = $this->getPersonalDetailsAllowableValues();
        if (!in_array($personalDetails, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'personalDetails', must be one of '%s'",
                    $personalDetails,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['personalDetails'] = $personalDetails;

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
