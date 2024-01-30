<?php

/**
 * Configuration API
 *
 * The version of the OpenAPI document: 2
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\BalancePlatform;

use \ArrayAccess;
use Adyen\Model\BalancePlatform\ObjectSerializer;

/**
 * CardOrderItem Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CardOrderItem implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CardOrderItem';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'balancePlatform' => 'string',
        'card' => '\Adyen\Model\BalancePlatform\CardOrderItemDeliveryStatus',
        'cardOrderItemId' => 'string',
        'creationDate' => '\DateTime',
        'id' => 'string',
        'paymentInstrumentId' => 'string',
        'pin' => '\Adyen\Model\BalancePlatform\CardOrderItemDeliveryStatus',
        'shippingMethod' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'balancePlatform' => null,
        'card' => null,
        'cardOrderItemId' => null,
        'creationDate' => 'date-time',
        'id' => null,
        'paymentInstrumentId' => null,
        'pin' => null,
        'shippingMethod' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'balancePlatform' => false,
        'card' => false,
        'cardOrderItemId' => false,
        'creationDate' => false,
        'id' => false,
        'paymentInstrumentId' => false,
        'pin' => false,
        'shippingMethod' => false
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
        'balancePlatform' => 'balancePlatform',
        'card' => 'card',
        'cardOrderItemId' => 'cardOrderItemId',
        'creationDate' => 'creationDate',
        'id' => 'id',
        'paymentInstrumentId' => 'paymentInstrumentId',
        'pin' => 'pin',
        'shippingMethod' => 'shippingMethod'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'balancePlatform' => 'setBalancePlatform',
        'card' => 'setCard',
        'cardOrderItemId' => 'setCardOrderItemId',
        'creationDate' => 'setCreationDate',
        'id' => 'setId',
        'paymentInstrumentId' => 'setPaymentInstrumentId',
        'pin' => 'setPin',
        'shippingMethod' => 'setShippingMethod'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'balancePlatform' => 'getBalancePlatform',
        'card' => 'getCard',
        'cardOrderItemId' => 'getCardOrderItemId',
        'creationDate' => 'getCreationDate',
        'id' => 'getId',
        'paymentInstrumentId' => 'getPaymentInstrumentId',
        'pin' => 'getPin',
        'shippingMethod' => 'getShippingMethod'
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
        $this->setIfExists('balancePlatform', $data ?? [], null);
        $this->setIfExists('card', $data ?? [], null);
        $this->setIfExists('cardOrderItemId', $data ?? [], null);
        $this->setIfExists('creationDate', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('paymentInstrumentId', $data ?? [], null);
        $this->setIfExists('pin', $data ?? [], null);
        $this->setIfExists('shippingMethod', $data ?? [], null);
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
     * Gets balancePlatform
     *
     * @return string|null
     */
    public function getBalancePlatform()
    {
        return $this->container['balancePlatform'];
    }

    /**
     * Sets balancePlatform
     *
     * @param string|null $balancePlatform The unique identifier of the balance platform.
     *
     * @return self
     */
    public function setBalancePlatform($balancePlatform)
    {
        if (is_null($balancePlatform)) {
            throw new \InvalidArgumentException('non-nullable balancePlatform cannot be null');
        }
        $this->container['balancePlatform'] = $balancePlatform;

        return $this;
    }

    /**
     * Gets card
     *
     * @return \Adyen\Model\BalancePlatform\CardOrderItemDeliveryStatus|null
     */
    public function getCard()
    {
        return $this->container['card'];
    }

    /**
     * Sets card
     *
     * @param \Adyen\Model\BalancePlatform\CardOrderItemDeliveryStatus|null $card card
     *
     * @return self
     */
    public function setCard($card)
    {
        if (is_null($card)) {
            throw new \InvalidArgumentException('non-nullable card cannot be null');
        }
        $this->container['card'] = $card;

        return $this;
    }

    /**
     * Gets cardOrderItemId
     *
     * @return string|null
     */
    public function getCardOrderItemId()
    {
        return $this->container['cardOrderItemId'];
    }

    /**
     * Sets cardOrderItemId
     *
     * @param string|null $cardOrderItemId The unique identifier of the card order item.
     *
     * @return self
     */
    public function setCardOrderItemId($cardOrderItemId)
    {
        if (is_null($cardOrderItemId)) {
            throw new \InvalidArgumentException('non-nullable cardOrderItemId cannot be null');
        }
        $this->container['cardOrderItemId'] = $cardOrderItemId;

        return $this;
    }

    /**
     * Gets creationDate
     *
     * @return \DateTime|null
     */
    public function getCreationDate()
    {
        return $this->container['creationDate'];
    }

    /**
     * Sets creationDate
     *
     * @param \DateTime|null $creationDate The date and time when the event was triggered, in ISO 8601 extended format. For example, **2020-12-18T10:15:30+01:00**.
     *
     * @return self
     */
    public function setCreationDate($creationDate)
    {
        if (is_null($creationDate)) {
            throw new \InvalidArgumentException('non-nullable creationDate cannot be null');
        }
        $this->container['creationDate'] = $creationDate;

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
     * @param string|null $id The ID of the resource.
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets paymentInstrumentId
     *
     * @return string|null
     */
    public function getPaymentInstrumentId()
    {
        return $this->container['paymentInstrumentId'];
    }

    /**
     * Sets paymentInstrumentId
     *
     * @param string|null $paymentInstrumentId The unique identifier of the payment instrument related to the card order item.
     *
     * @return self
     */
    public function setPaymentInstrumentId($paymentInstrumentId)
    {
        if (is_null($paymentInstrumentId)) {
            throw new \InvalidArgumentException('non-nullable paymentInstrumentId cannot be null');
        }
        $this->container['paymentInstrumentId'] = $paymentInstrumentId;

        return $this;
    }

    /**
     * Gets pin
     *
     * @return \Adyen\Model\BalancePlatform\CardOrderItemDeliveryStatus|null
     */
    public function getPin()
    {
        return $this->container['pin'];
    }

    /**
     * Sets pin
     *
     * @param \Adyen\Model\BalancePlatform\CardOrderItemDeliveryStatus|null $pin pin
     *
     * @return self
     */
    public function setPin($pin)
    {
        if (is_null($pin)) {
            throw new \InvalidArgumentException('non-nullable pin cannot be null');
        }
        $this->container['pin'] = $pin;

        return $this;
    }

    /**
     * Gets shippingMethod
     *
     * @return string|null
     */
    public function getShippingMethod()
    {
        return $this->container['shippingMethod'];
    }

    /**
     * Sets shippingMethod
     *
     * @param string|null $shippingMethod The shipping method used to deliver the card or the PIN.
     *
     * @return self
     */
    public function setShippingMethod($shippingMethod)
    {
        if (is_null($shippingMethod)) {
            throw new \InvalidArgumentException('non-nullable shippingMethod cannot be null');
        }
        $this->container['shippingMethod'] = $shippingMethod;

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
