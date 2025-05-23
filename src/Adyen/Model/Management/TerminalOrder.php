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
 * TerminalOrder Class Doc Comment
 *
 * @package  Adyen
 * @implements \ArrayAccess<string, mixed>
 */
class TerminalOrder implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'TerminalOrder';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'billingEntity' => '\Adyen\Model\Management\BillingEntity',
        'customerOrderReference' => 'string',
        'id' => 'string',
        'items' => '\Adyen\Model\Management\OrderItem[]',
        'orderDate' => 'string',
        'shippingLocation' => '\Adyen\Model\Management\ShippingLocation',
        'status' => 'string',
        'trackingUrl' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'billingEntity' => null,
        'customerOrderReference' => null,
        'id' => null,
        'items' => null,
        'orderDate' => null,
        'shippingLocation' => null,
        'status' => null,
        'trackingUrl' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'billingEntity' => false,
        'customerOrderReference' => false,
        'id' => false,
        'items' => false,
        'orderDate' => false,
        'shippingLocation' => false,
        'status' => false,
        'trackingUrl' => false
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
        'billingEntity' => 'billingEntity',
        'customerOrderReference' => 'customerOrderReference',
        'id' => 'id',
        'items' => 'items',
        'orderDate' => 'orderDate',
        'shippingLocation' => 'shippingLocation',
        'status' => 'status',
        'trackingUrl' => 'trackingUrl'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'billingEntity' => 'setBillingEntity',
        'customerOrderReference' => 'setCustomerOrderReference',
        'id' => 'setId',
        'items' => 'setItems',
        'orderDate' => 'setOrderDate',
        'shippingLocation' => 'setShippingLocation',
        'status' => 'setStatus',
        'trackingUrl' => 'setTrackingUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'billingEntity' => 'getBillingEntity',
        'customerOrderReference' => 'getCustomerOrderReference',
        'id' => 'getId',
        'items' => 'getItems',
        'orderDate' => 'getOrderDate',
        'shippingLocation' => 'getShippingLocation',
        'status' => 'getStatus',
        'trackingUrl' => 'getTrackingUrl'
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
    public function __construct(?array $data = null)
    {
        $this->setIfExists('billingEntity', $data ?? [], null);
        $this->setIfExists('customerOrderReference', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('items', $data ?? [], null);
        $this->setIfExists('orderDate', $data ?? [], null);
        $this->setIfExists('shippingLocation', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('trackingUrl', $data ?? [], null);
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
     * Gets billingEntity
     *
     * @return \Adyen\Model\Management\BillingEntity|null
     */
    public function getBillingEntity()
    {
        return $this->container['billingEntity'];
    }

    /**
     * Sets billingEntity
     *
     * @param \Adyen\Model\Management\BillingEntity|null $billingEntity billingEntity
     *
     * @return self
     */
    public function setBillingEntity($billingEntity)
    {
        $this->container['billingEntity'] = $billingEntity;

        return $this;
    }

    /**
     * Gets customerOrderReference
     *
     * @return string|null
     */
    public function getCustomerOrderReference()
    {
        return $this->container['customerOrderReference'];
    }

    /**
     * Sets customerOrderReference
     *
     * @param string|null $customerOrderReference The merchant-defined purchase order number. This will be printed on the packing list.
     *
     * @return self
     */
    public function setCustomerOrderReference($customerOrderReference)
    {
        $this->container['customerOrderReference'] = $customerOrderReference;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id The unique identifier of the order.
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets items
     *
     * @return \Adyen\Model\Management\OrderItem[]|null
     */
    public function getItems()
    {
        return $this->container['items'];
    }

    /**
     * Sets items
     *
     * @param \Adyen\Model\Management\OrderItem[]|null $items The products included in the order.
     *
     * @return self
     */
    public function setItems($items)
    {
        $this->container['items'] = $items;

        return $this;
    }

    /**
     * Gets orderDate
     *
     * @return string|null
     */
    public function getOrderDate()
    {
        return $this->container['orderDate'];
    }

    /**
     * Sets orderDate
     *
     * @param string|null $orderDate The date and time that the order was placed, in UTC ISO 8601 format. For example, \"2011-12-03T10:15:30Z\".
     *
     * @return self
     */
    public function setOrderDate($orderDate)
    {
        $this->container['orderDate'] = $orderDate;

        return $this;
    }

    /**
     * Gets shippingLocation
     *
     * @return \Adyen\Model\Management\ShippingLocation|null
     */
    public function getShippingLocation()
    {
        return $this->container['shippingLocation'];
    }

    /**
     * Sets shippingLocation
     *
     * @param \Adyen\Model\Management\ShippingLocation|null $shippingLocation shippingLocation
     *
     * @return self
     */
    public function setShippingLocation($shippingLocation)
    {
        $this->container['shippingLocation'] = $shippingLocation;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status The processing status of the order.
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets trackingUrl
     *
     * @return string|null
     */
    public function getTrackingUrl()
    {
        return $this->container['trackingUrl'];
    }

    /**
     * Sets trackingUrl
     *
     * @param string|null $trackingUrl The URL, provided by the carrier company, where the shipment can be tracked.
     *
     * @return self
     */
    public function setTrackingUrl($trackingUrl)
    {
        $this->container['trackingUrl'] = $trackingUrl;

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
