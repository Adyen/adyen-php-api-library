<?php

/**
 * Management API
 *
 * The version of the OpenAPI document: 3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Management;

use \ArrayAccess;
use Adyen\Model\Management\ObjectSerializer;

/**
 * ReceiptPrinting Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ReceiptPrinting implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ReceiptPrinting';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'merchantApproved' => 'bool',
        'merchantCancelled' => 'bool',
        'merchantCaptureApproved' => 'bool',
        'merchantCaptureRefused' => 'bool',
        'merchantRefundApproved' => 'bool',
        'merchantRefundRefused' => 'bool',
        'merchantRefused' => 'bool',
        'merchantVoid' => 'bool',
        'shopperApproved' => 'bool',
        'shopperCancelled' => 'bool',
        'shopperCaptureApproved' => 'bool',
        'shopperCaptureRefused' => 'bool',
        'shopperRefundApproved' => 'bool',
        'shopperRefundRefused' => 'bool',
        'shopperRefused' => 'bool',
        'shopperVoid' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'merchantApproved' => null,
        'merchantCancelled' => null,
        'merchantCaptureApproved' => null,
        'merchantCaptureRefused' => null,
        'merchantRefundApproved' => null,
        'merchantRefundRefused' => null,
        'merchantRefused' => null,
        'merchantVoid' => null,
        'shopperApproved' => null,
        'shopperCancelled' => null,
        'shopperCaptureApproved' => null,
        'shopperCaptureRefused' => null,
        'shopperRefundApproved' => null,
        'shopperRefundRefused' => null,
        'shopperRefused' => null,
        'shopperVoid' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'merchantApproved' => false,
        'merchantCancelled' => false,
        'merchantCaptureApproved' => false,
        'merchantCaptureRefused' => false,
        'merchantRefundApproved' => false,
        'merchantRefundRefused' => false,
        'merchantRefused' => false,
        'merchantVoid' => false,
        'shopperApproved' => false,
        'shopperCancelled' => false,
        'shopperCaptureApproved' => false,
        'shopperCaptureRefused' => false,
        'shopperRefundApproved' => false,
        'shopperRefundRefused' => false,
        'shopperRefused' => false,
        'shopperVoid' => false
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
        'merchantApproved' => 'merchantApproved',
        'merchantCancelled' => 'merchantCancelled',
        'merchantCaptureApproved' => 'merchantCaptureApproved',
        'merchantCaptureRefused' => 'merchantCaptureRefused',
        'merchantRefundApproved' => 'merchantRefundApproved',
        'merchantRefundRefused' => 'merchantRefundRefused',
        'merchantRefused' => 'merchantRefused',
        'merchantVoid' => 'merchantVoid',
        'shopperApproved' => 'shopperApproved',
        'shopperCancelled' => 'shopperCancelled',
        'shopperCaptureApproved' => 'shopperCaptureApproved',
        'shopperCaptureRefused' => 'shopperCaptureRefused',
        'shopperRefundApproved' => 'shopperRefundApproved',
        'shopperRefundRefused' => 'shopperRefundRefused',
        'shopperRefused' => 'shopperRefused',
        'shopperVoid' => 'shopperVoid'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'merchantApproved' => 'setMerchantApproved',
        'merchantCancelled' => 'setMerchantCancelled',
        'merchantCaptureApproved' => 'setMerchantCaptureApproved',
        'merchantCaptureRefused' => 'setMerchantCaptureRefused',
        'merchantRefundApproved' => 'setMerchantRefundApproved',
        'merchantRefundRefused' => 'setMerchantRefundRefused',
        'merchantRefused' => 'setMerchantRefused',
        'merchantVoid' => 'setMerchantVoid',
        'shopperApproved' => 'setShopperApproved',
        'shopperCancelled' => 'setShopperCancelled',
        'shopperCaptureApproved' => 'setShopperCaptureApproved',
        'shopperCaptureRefused' => 'setShopperCaptureRefused',
        'shopperRefundApproved' => 'setShopperRefundApproved',
        'shopperRefundRefused' => 'setShopperRefundRefused',
        'shopperRefused' => 'setShopperRefused',
        'shopperVoid' => 'setShopperVoid'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'merchantApproved' => 'getMerchantApproved',
        'merchantCancelled' => 'getMerchantCancelled',
        'merchantCaptureApproved' => 'getMerchantCaptureApproved',
        'merchantCaptureRefused' => 'getMerchantCaptureRefused',
        'merchantRefundApproved' => 'getMerchantRefundApproved',
        'merchantRefundRefused' => 'getMerchantRefundRefused',
        'merchantRefused' => 'getMerchantRefused',
        'merchantVoid' => 'getMerchantVoid',
        'shopperApproved' => 'getShopperApproved',
        'shopperCancelled' => 'getShopperCancelled',
        'shopperCaptureApproved' => 'getShopperCaptureApproved',
        'shopperCaptureRefused' => 'getShopperCaptureRefused',
        'shopperRefundApproved' => 'getShopperRefundApproved',
        'shopperRefundRefused' => 'getShopperRefundRefused',
        'shopperRefused' => 'getShopperRefused',
        'shopperVoid' => 'getShopperVoid'
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
        $this->setIfExists('merchantApproved', $data ?? [], null);
        $this->setIfExists('merchantCancelled', $data ?? [], null);
        $this->setIfExists('merchantCaptureApproved', $data ?? [], null);
        $this->setIfExists('merchantCaptureRefused', $data ?? [], null);
        $this->setIfExists('merchantRefundApproved', $data ?? [], null);
        $this->setIfExists('merchantRefundRefused', $data ?? [], null);
        $this->setIfExists('merchantRefused', $data ?? [], null);
        $this->setIfExists('merchantVoid', $data ?? [], null);
        $this->setIfExists('shopperApproved', $data ?? [], null);
        $this->setIfExists('shopperCancelled', $data ?? [], null);
        $this->setIfExists('shopperCaptureApproved', $data ?? [], null);
        $this->setIfExists('shopperCaptureRefused', $data ?? [], null);
        $this->setIfExists('shopperRefundApproved', $data ?? [], null);
        $this->setIfExists('shopperRefundRefused', $data ?? [], null);
        $this->setIfExists('shopperRefused', $data ?? [], null);
        $this->setIfExists('shopperVoid', $data ?? [], null);
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
     * Gets merchantApproved
     *
     * @return bool|null
     */
    public function getMerchantApproved()
    {
        return $this->container['merchantApproved'];
    }

    /**
     * Sets merchantApproved
     *
     * @param bool|null $merchantApproved Print a merchant receipt when the payment is approved.
     *
     * @return self
     */
    public function setMerchantApproved($merchantApproved)
    {
        if (is_null($merchantApproved)) {
            throw new \InvalidArgumentException('non-nullable merchantApproved cannot be null');
        }
        $this->container['merchantApproved'] = $merchantApproved;

        return $this;
    }

    /**
     * Gets merchantCancelled
     *
     * @return bool|null
     */
    public function getMerchantCancelled()
    {
        return $this->container['merchantCancelled'];
    }

    /**
     * Sets merchantCancelled
     *
     * @param bool|null $merchantCancelled Print a merchant receipt when the transaction is cancelled.
     *
     * @return self
     */
    public function setMerchantCancelled($merchantCancelled)
    {
        if (is_null($merchantCancelled)) {
            throw new \InvalidArgumentException('non-nullable merchantCancelled cannot be null');
        }
        $this->container['merchantCancelled'] = $merchantCancelled;

        return $this;
    }

    /**
     * Gets merchantCaptureApproved
     *
     * @return bool|null
     */
    public function getMerchantCaptureApproved()
    {
        return $this->container['merchantCaptureApproved'];
    }

    /**
     * Sets merchantCaptureApproved
     *
     * @param bool|null $merchantCaptureApproved Print a merchant receipt when capturing the payment is approved.
     *
     * @return self
     */
    public function setMerchantCaptureApproved($merchantCaptureApproved)
    {
        if (is_null($merchantCaptureApproved)) {
            throw new \InvalidArgumentException('non-nullable merchantCaptureApproved cannot be null');
        }
        $this->container['merchantCaptureApproved'] = $merchantCaptureApproved;

        return $this;
    }

    /**
     * Gets merchantCaptureRefused
     *
     * @return bool|null
     */
    public function getMerchantCaptureRefused()
    {
        return $this->container['merchantCaptureRefused'];
    }

    /**
     * Sets merchantCaptureRefused
     *
     * @param bool|null $merchantCaptureRefused Print a merchant receipt when capturing the payment is refused.
     *
     * @return self
     */
    public function setMerchantCaptureRefused($merchantCaptureRefused)
    {
        if (is_null($merchantCaptureRefused)) {
            throw new \InvalidArgumentException('non-nullable merchantCaptureRefused cannot be null');
        }
        $this->container['merchantCaptureRefused'] = $merchantCaptureRefused;

        return $this;
    }

    /**
     * Gets merchantRefundApproved
     *
     * @return bool|null
     */
    public function getMerchantRefundApproved()
    {
        return $this->container['merchantRefundApproved'];
    }

    /**
     * Sets merchantRefundApproved
     *
     * @param bool|null $merchantRefundApproved Print a merchant receipt when the refund is approved.
     *
     * @return self
     */
    public function setMerchantRefundApproved($merchantRefundApproved)
    {
        if (is_null($merchantRefundApproved)) {
            throw new \InvalidArgumentException('non-nullable merchantRefundApproved cannot be null');
        }
        $this->container['merchantRefundApproved'] = $merchantRefundApproved;

        return $this;
    }

    /**
     * Gets merchantRefundRefused
     *
     * @return bool|null
     */
    public function getMerchantRefundRefused()
    {
        return $this->container['merchantRefundRefused'];
    }

    /**
     * Sets merchantRefundRefused
     *
     * @param bool|null $merchantRefundRefused Print a merchant receipt when the refund is refused.
     *
     * @return self
     */
    public function setMerchantRefundRefused($merchantRefundRefused)
    {
        if (is_null($merchantRefundRefused)) {
            throw new \InvalidArgumentException('non-nullable merchantRefundRefused cannot be null');
        }
        $this->container['merchantRefundRefused'] = $merchantRefundRefused;

        return $this;
    }

    /**
     * Gets merchantRefused
     *
     * @return bool|null
     */
    public function getMerchantRefused()
    {
        return $this->container['merchantRefused'];
    }

    /**
     * Sets merchantRefused
     *
     * @param bool|null $merchantRefused Print a merchant receipt when the payment is refused.
     *
     * @return self
     */
    public function setMerchantRefused($merchantRefused)
    {
        if (is_null($merchantRefused)) {
            throw new \InvalidArgumentException('non-nullable merchantRefused cannot be null');
        }
        $this->container['merchantRefused'] = $merchantRefused;

        return $this;
    }

    /**
     * Gets merchantVoid
     *
     * @return bool|null
     */
    public function getMerchantVoid()
    {
        return $this->container['merchantVoid'];
    }

    /**
     * Sets merchantVoid
     *
     * @param bool|null $merchantVoid Print a merchant receipt when a previous transaction is voided.
     *
     * @return self
     */
    public function setMerchantVoid($merchantVoid)
    {
        if (is_null($merchantVoid)) {
            throw new \InvalidArgumentException('non-nullable merchantVoid cannot be null');
        }
        $this->container['merchantVoid'] = $merchantVoid;

        return $this;
    }

    /**
     * Gets shopperApproved
     *
     * @return bool|null
     */
    public function getShopperApproved()
    {
        return $this->container['shopperApproved'];
    }

    /**
     * Sets shopperApproved
     *
     * @param bool|null $shopperApproved Print a shopper receipt when the payment is approved.
     *
     * @return self
     */
    public function setShopperApproved($shopperApproved)
    {
        if (is_null($shopperApproved)) {
            throw new \InvalidArgumentException('non-nullable shopperApproved cannot be null');
        }
        $this->container['shopperApproved'] = $shopperApproved;

        return $this;
    }

    /**
     * Gets shopperCancelled
     *
     * @return bool|null
     */
    public function getShopperCancelled()
    {
        return $this->container['shopperCancelled'];
    }

    /**
     * Sets shopperCancelled
     *
     * @param bool|null $shopperCancelled Print a shopper receipt when the transaction is cancelled.
     *
     * @return self
     */
    public function setShopperCancelled($shopperCancelled)
    {
        if (is_null($shopperCancelled)) {
            throw new \InvalidArgumentException('non-nullable shopperCancelled cannot be null');
        }
        $this->container['shopperCancelled'] = $shopperCancelled;

        return $this;
    }

    /**
     * Gets shopperCaptureApproved
     *
     * @return bool|null
     */
    public function getShopperCaptureApproved()
    {
        return $this->container['shopperCaptureApproved'];
    }

    /**
     * Sets shopperCaptureApproved
     *
     * @param bool|null $shopperCaptureApproved Print a shopper receipt when capturing the payment is approved.
     *
     * @return self
     */
    public function setShopperCaptureApproved($shopperCaptureApproved)
    {
        if (is_null($shopperCaptureApproved)) {
            throw new \InvalidArgumentException('non-nullable shopperCaptureApproved cannot be null');
        }
        $this->container['shopperCaptureApproved'] = $shopperCaptureApproved;

        return $this;
    }

    /**
     * Gets shopperCaptureRefused
     *
     * @return bool|null
     */
    public function getShopperCaptureRefused()
    {
        return $this->container['shopperCaptureRefused'];
    }

    /**
     * Sets shopperCaptureRefused
     *
     * @param bool|null $shopperCaptureRefused Print a shopper receipt when capturing the payment is refused.
     *
     * @return self
     */
    public function setShopperCaptureRefused($shopperCaptureRefused)
    {
        if (is_null($shopperCaptureRefused)) {
            throw new \InvalidArgumentException('non-nullable shopperCaptureRefused cannot be null');
        }
        $this->container['shopperCaptureRefused'] = $shopperCaptureRefused;

        return $this;
    }

    /**
     * Gets shopperRefundApproved
     *
     * @return bool|null
     */
    public function getShopperRefundApproved()
    {
        return $this->container['shopperRefundApproved'];
    }

    /**
     * Sets shopperRefundApproved
     *
     * @param bool|null $shopperRefundApproved Print a shopper receipt when the refund is approved.
     *
     * @return self
     */
    public function setShopperRefundApproved($shopperRefundApproved)
    {
        if (is_null($shopperRefundApproved)) {
            throw new \InvalidArgumentException('non-nullable shopperRefundApproved cannot be null');
        }
        $this->container['shopperRefundApproved'] = $shopperRefundApproved;

        return $this;
    }

    /**
     * Gets shopperRefundRefused
     *
     * @return bool|null
     */
    public function getShopperRefundRefused()
    {
        return $this->container['shopperRefundRefused'];
    }

    /**
     * Sets shopperRefundRefused
     *
     * @param bool|null $shopperRefundRefused Print a shopper receipt when the refund is refused.
     *
     * @return self
     */
    public function setShopperRefundRefused($shopperRefundRefused)
    {
        if (is_null($shopperRefundRefused)) {
            throw new \InvalidArgumentException('non-nullable shopperRefundRefused cannot be null');
        }
        $this->container['shopperRefundRefused'] = $shopperRefundRefused;

        return $this;
    }

    /**
     * Gets shopperRefused
     *
     * @return bool|null
     */
    public function getShopperRefused()
    {
        return $this->container['shopperRefused'];
    }

    /**
     * Sets shopperRefused
     *
     * @param bool|null $shopperRefused Print a shopper receipt when the payment is refused.
     *
     * @return self
     */
    public function setShopperRefused($shopperRefused)
    {
        if (is_null($shopperRefused)) {
            throw new \InvalidArgumentException('non-nullable shopperRefused cannot be null');
        }
        $this->container['shopperRefused'] = $shopperRefused;

        return $this;
    }

    /**
     * Gets shopperVoid
     *
     * @return bool|null
     */
    public function getShopperVoid()
    {
        return $this->container['shopperVoid'];
    }

    /**
     * Sets shopperVoid
     *
     * @param bool|null $shopperVoid Print a shopper receipt when a previous transaction is voided.
     *
     * @return self
     */
    public function setShopperVoid($shopperVoid)
    {
        if (is_null($shopperVoid)) {
            throw new \InvalidArgumentException('non-nullable shopperVoid cannot be null');
        }
        $this->container['shopperVoid'] = $shopperVoid;

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

    public function toArray(): array
    {
        $array = [];
        foreach (self::$openAPITypes as $propertyName => $propertyType) {
            $propertyValue = $this[$propertyName];
            if ($propertyValue !== null) {
                // Check if the property value is an object and has a toArray() method
                if (is_object($propertyValue) && method_exists($propertyValue, 'toArray')) {
                    $array[$propertyName] = $propertyValue->toArray();
                // Check if it's type datetime
                } elseif ($propertyValue instanceof \DateTime) {
                    $array[$propertyName] = $propertyValue->format(DATE_ATOM);
                // If it's an array type we should check whether it contains objects and if so call toArray method
                } elseif (is_array($propertyValue)) {
                    $array[$propertyName] = array_map(function ($item) {
                        return $item instanceof ModelInterface ? $item->toArray() : $item;
                    }, $propertyValue);
                } else {
                    // Otherwise, directly assign the property value to the array
                    $array[$propertyName] = $propertyValue;
                }
            }
        }
        return $array;
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
