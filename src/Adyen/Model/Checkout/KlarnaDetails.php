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
 * KlarnaDetails Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class KlarnaDetails implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'KlarnaDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'billingAddress' => 'string',
        'checkoutAttemptId' => 'string',
        'deliveryAddress' => 'string',
        'personalDetails' => 'string',
        'recurringDetailReference' => 'string',
        'storedPaymentMethodId' => 'string',
        'subtype' => 'string',
        'type' => 'string'
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
        'checkoutAttemptId' => null,
        'deliveryAddress' => null,
        'personalDetails' => null,
        'recurringDetailReference' => null,
        'storedPaymentMethodId' => null,
        'subtype' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'billingAddress' => false,
        'checkoutAttemptId' => false,
        'deliveryAddress' => false,
        'personalDetails' => false,
        'recurringDetailReference' => false,
        'storedPaymentMethodId' => false,
        'subtype' => false,
        'type' => false
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
        'checkoutAttemptId' => 'checkoutAttemptId',
        'deliveryAddress' => 'deliveryAddress',
        'personalDetails' => 'personalDetails',
        'recurringDetailReference' => 'recurringDetailReference',
        'storedPaymentMethodId' => 'storedPaymentMethodId',
        'subtype' => 'subtype',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'billingAddress' => 'setBillingAddress',
        'checkoutAttemptId' => 'setCheckoutAttemptId',
        'deliveryAddress' => 'setDeliveryAddress',
        'personalDetails' => 'setPersonalDetails',
        'recurringDetailReference' => 'setRecurringDetailReference',
        'storedPaymentMethodId' => 'setStoredPaymentMethodId',
        'subtype' => 'setSubtype',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'billingAddress' => 'getBillingAddress',
        'checkoutAttemptId' => 'getCheckoutAttemptId',
        'deliveryAddress' => 'getDeliveryAddress',
        'personalDetails' => 'getPersonalDetails',
        'recurringDetailReference' => 'getRecurringDetailReference',
        'storedPaymentMethodId' => 'getStoredPaymentMethodId',
        'subtype' => 'getSubtype',
        'type' => 'getType'
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

    public const TYPE_KLARNA = 'klarna';
    public const TYPE_KLARNAPAYMENTS = 'klarnapayments';
    public const TYPE_KLARNAPAYMENTS_ACCOUNT = 'klarnapayments_account';
    public const TYPE_KLARNAPAYMENTS_B2B = 'klarnapayments_b2b';
    public const TYPE_KLARNA_PAYNOW = 'klarna_paynow';
    public const TYPE_KLARNA_ACCOUNT = 'klarna_account';
    public const TYPE_KLARNA_B2B = 'klarna_b2b';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_KLARNA,
            self::TYPE_KLARNAPAYMENTS,
            self::TYPE_KLARNAPAYMENTS_ACCOUNT,
            self::TYPE_KLARNAPAYMENTS_B2B,
            self::TYPE_KLARNA_PAYNOW,
            self::TYPE_KLARNA_ACCOUNT,
            self::TYPE_KLARNA_B2B,
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
        $this->setIfExists('checkoutAttemptId', $data ?? [], null);
        $this->setIfExists('deliveryAddress', $data ?? [], null);
        $this->setIfExists('personalDetails', $data ?? [], null);
        $this->setIfExists('recurringDetailReference', $data ?? [], null);
        $this->setIfExists('storedPaymentMethodId', $data ?? [], null);
        $this->setIfExists('subtype', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], 'klarna');
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

        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
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
     * @param string|null $billingAddress The address where to send the invoice.
     *
     * @return self
     */
    public function setBillingAddress($billingAddress)
    {
        if (is_null($billingAddress)) {
            throw new \InvalidArgumentException('non-nullable billingAddress cannot be null');
        }
        $this->container['billingAddress'] = $billingAddress;

        return $this;
    }

    /**
     * Gets checkoutAttemptId
     *
     * @return string|null
     */
    public function getCheckoutAttemptId()
    {
        return $this->container['checkoutAttemptId'];
    }

    /**
     * Sets checkoutAttemptId
     *
     * @param string|null $checkoutAttemptId The checkout attempt identifier.
     *
     * @return self
     */
    public function setCheckoutAttemptId($checkoutAttemptId)
    {
        if (is_null($checkoutAttemptId)) {
            throw new \InvalidArgumentException('non-nullable checkoutAttemptId cannot be null');
        }
        $this->container['checkoutAttemptId'] = $checkoutAttemptId;

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
     * @param string|null $deliveryAddress The address where the goods should be delivered.
     *
     * @return self
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        if (is_null($deliveryAddress)) {
            throw new \InvalidArgumentException('non-nullable deliveryAddress cannot be null');
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
     * @param string|null $personalDetails Shopper name, date of birth, phone number, and email address.
     *
     * @return self
     */
    public function setPersonalDetails($personalDetails)
    {
        if (is_null($personalDetails)) {
            throw new \InvalidArgumentException('non-nullable personalDetails cannot be null');
        }
        $this->container['personalDetails'] = $personalDetails;

        return $this;
    }

    /**
     * Gets recurringDetailReference
     *
     * @return string|null
     * @deprecated
     */
    public function getRecurringDetailReference()
    {
        return $this->container['recurringDetailReference'];
    }

    /**
     * Sets recurringDetailReference
     *
     * @param string|null $recurringDetailReference This is the `recurringDetailReference` returned in the response when you created the token.
     *
     * @return self
     * @deprecated
     */
    public function setRecurringDetailReference($recurringDetailReference)
    {
        if (is_null($recurringDetailReference)) {
            throw new \InvalidArgumentException('non-nullable recurringDetailReference cannot be null');
        }
        $this->container['recurringDetailReference'] = $recurringDetailReference;

        return $this;
    }

    /**
     * Gets storedPaymentMethodId
     *
     * @return string|null
     */
    public function getStoredPaymentMethodId()
    {
        return $this->container['storedPaymentMethodId'];
    }

    /**
     * Sets storedPaymentMethodId
     *
     * @param string|null $storedPaymentMethodId This is the `recurringDetailReference` returned in the response when you created the token.
     *
     * @return self
     */
    public function setStoredPaymentMethodId($storedPaymentMethodId)
    {
        if (is_null($storedPaymentMethodId)) {
            throw new \InvalidArgumentException('non-nullable storedPaymentMethodId cannot be null');
        }
        $this->container['storedPaymentMethodId'] = $storedPaymentMethodId;

        return $this;
    }

    /**
     * Gets subtype
     *
     * @return string|null
     */
    public function getSubtype()
    {
        return $this->container['subtype'];
    }

    /**
     * Sets subtype
     *
     * @param string|null $subtype The type of flow to initiate.
     *
     * @return self
     */
    public function setSubtype($subtype)
    {
        if (is_null($subtype)) {
            throw new \InvalidArgumentException('non-nullable subtype cannot be null');
        }
        $this->container['subtype'] = $subtype;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type **klarna**
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'type', must be one of '%s'",
                    $type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

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
