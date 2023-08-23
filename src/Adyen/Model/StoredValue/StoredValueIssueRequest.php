<?php

/**
 * Adyen Stored Value API
 *
 * The version of the OpenAPI document: 46
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Model\StoredValue;

use \ArrayAccess;
use Adyen\Model\StoredValue\ObjectSerializer;

/**
 * StoredValueIssueRequest Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class StoredValueIssueRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'StoredValueIssueRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'amount' => '\Adyen\Model\StoredValue\Amount',
        'merchantAccount' => 'string',
        'paymentMethod' => 'array<string,string>',
        'recurringDetailReference' => 'string',
        'reference' => 'string',
        'shopperInteraction' => 'string',
        'shopperReference' => 'string',
        'store' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'amount' => null,
        'merchantAccount' => null,
        'paymentMethod' => null,
        'recurringDetailReference' => null,
        'reference' => null,
        'shopperInteraction' => null,
        'shopperReference' => null,
        'store' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'amount' => false,
        'merchantAccount' => false,
        'paymentMethod' => false,
        'recurringDetailReference' => false,
        'reference' => false,
        'shopperInteraction' => false,
        'shopperReference' => false,
        'store' => false
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
        'amount' => 'amount',
        'merchantAccount' => 'merchantAccount',
        'paymentMethod' => 'paymentMethod',
        'recurringDetailReference' => 'recurringDetailReference',
        'reference' => 'reference',
        'shopperInteraction' => 'shopperInteraction',
        'shopperReference' => 'shopperReference',
        'store' => 'store'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'merchantAccount' => 'setMerchantAccount',
        'paymentMethod' => 'setPaymentMethod',
        'recurringDetailReference' => 'setRecurringDetailReference',
        'reference' => 'setReference',
        'shopperInteraction' => 'setShopperInteraction',
        'shopperReference' => 'setShopperReference',
        'store' => 'setStore'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'merchantAccount' => 'getMerchantAccount',
        'paymentMethod' => 'getPaymentMethod',
        'recurringDetailReference' => 'getRecurringDetailReference',
        'reference' => 'getReference',
        'shopperInteraction' => 'getShopperInteraction',
        'shopperReference' => 'getShopperReference',
        'store' => 'getStore'
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

    public const SHOPPER_INTERACTION_ECOMMERCE = 'Ecommerce';
    public const SHOPPER_INTERACTION_CONT_AUTH = 'ContAuth';
    public const SHOPPER_INTERACTION_MOTO = 'Moto';
    public const SHOPPER_INTERACTION_POS = 'POS';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getShopperInteractionAllowableValues()
    {
        return [
            self::SHOPPER_INTERACTION_ECOMMERCE,
            self::SHOPPER_INTERACTION_CONT_AUTH,
            self::SHOPPER_INTERACTION_MOTO,
            self::SHOPPER_INTERACTION_POS,
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
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('merchantAccount', $data ?? [], null);
        $this->setIfExists('paymentMethod', $data ?? [], null);
        $this->setIfExists('recurringDetailReference', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('shopperInteraction', $data ?? [], null);
        $this->setIfExists('shopperReference', $data ?? [], null);
        $this->setIfExists('store', $data ?? [], null);
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

        if ($this->container['merchantAccount'] === null) {
            $invalidProperties[] = "'merchantAccount' can't be null";
        }
        if ($this->container['paymentMethod'] === null) {
            $invalidProperties[] = "'paymentMethod' can't be null";
        }
        if ($this->container['reference'] === null) {
            $invalidProperties[] = "'reference' can't be null";
        }
        $allowedValues = $this->getShopperInteractionAllowableValues();
        if (!is_null($this->container['shopperInteraction']) && !in_array($this->container['shopperInteraction'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'shopperInteraction', must be one of '%s'",
                $this->container['shopperInteraction'],
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
     * Gets amount
     *
     * @return \Adyen\Model\StoredValue\Amount|null
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param \Adyen\Model\StoredValue\Amount|null $amount amount
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if (is_null($amount)) {
            throw new \InvalidArgumentException('non-nullable amount cannot be null');
        }
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets merchantAccount
     *
     * @return string
     */
    public function getMerchantAccount()
    {
        return $this->container['merchantAccount'];
    }

    /**
     * Sets merchantAccount
     *
     * @param string $merchantAccount The merchant account identifier, with which you want to process the transaction.
     *
     * @return self
     */
    public function setMerchantAccount($merchantAccount)
    {
        if (is_null($merchantAccount)) {
            throw new \InvalidArgumentException('non-nullable merchantAccount cannot be null');
        }
        $this->container['merchantAccount'] = $merchantAccount;

        return $this;
    }

    /**
     * Gets paymentMethod
     *
     * @return array<string,string>
     */
    public function getPaymentMethod()
    {
        return $this->container['paymentMethod'];
    }

    /**
     * Sets paymentMethod
     *
     * @param array<string,string> $paymentMethod The collection that contains the type of the payment method and its specific information if available
     *
     * @return self
     */
    public function setPaymentMethod($paymentMethod)
    {
        if (is_null($paymentMethod)) {
            throw new \InvalidArgumentException('non-nullable paymentMethod cannot be null');
        }
        $this->container['paymentMethod'] = $paymentMethod;

        return $this;
    }

    /**
     * Gets recurringDetailReference
     *
     * @return string|null
     */
    public function getRecurringDetailReference()
    {
        return $this->container['recurringDetailReference'];
    }

    /**
     * Sets recurringDetailReference
     *
     * @param string|null $recurringDetailReference recurringDetailReference
     *
     * @return self
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
     * Gets reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string $reference The reference to uniquely identify a payment. This reference is used in all communication with you about the payment status. We recommend using a unique value per payment; however, it is not a requirement. If you need to provide multiple references for a transaction, separate them with hyphens (\"-\"). Maximum length: 80 characters.
     *
     * @return self
     */
    public function setReference($reference)
    {
        if (is_null($reference)) {
            throw new \InvalidArgumentException('non-nullable reference cannot be null');
        }
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets shopperInteraction
     *
     * @return string|null
     */
    public function getShopperInteraction()
    {
        return $this->container['shopperInteraction'];
    }

    /**
     * Sets shopperInteraction
     *
     * @param string|null $shopperInteraction Specifies the sales channel, through which the shopper gives their card details, and whether the shopper is a returning customer. For the web service API, Adyen assumes Ecommerce shopper interaction by default.  This field has the following possible values: * `Ecommerce` - Online transactions where the cardholder is present (online). For better authorisation rates, we recommend sending the card security code (CSC) along with the request. * `ContAuth` - Card on file and/or subscription transactions, where the cardholder is known to the merchant (returning customer). If the shopper is present (online), you can supply also the CSC to improve authorisation (one-click payment). * `Moto` - Mail-order and telephone-order transactions where the shopper is in contact with the merchant via email or telephone. * `POS` - Point-of-sale transactions where the shopper is physically present to make a payment using a secure payment terminal.
     *
     * @return self
     */
    public function setShopperInteraction($shopperInteraction)
    {
        if (is_null($shopperInteraction)) {
            throw new \InvalidArgumentException('non-nullable shopperInteraction cannot be null');
        }
        $allowedValues = $this->getShopperInteractionAllowableValues();
        if (!in_array($shopperInteraction, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'shopperInteraction', must be one of '%s'",
                    $shopperInteraction,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['shopperInteraction'] = $shopperInteraction;

        return $this;
    }

    /**
     * Gets shopperReference
     *
     * @return string|null
     */
    public function getShopperReference()
    {
        return $this->container['shopperReference'];
    }

    /**
     * Sets shopperReference
     *
     * @param string|null $shopperReference shopperReference
     *
     * @return self
     */
    public function setShopperReference($shopperReference)
    {
        if (is_null($shopperReference)) {
            throw new \InvalidArgumentException('non-nullable shopperReference cannot be null');
        }
        $this->container['shopperReference'] = $shopperReference;

        return $this;
    }

    /**
     * Gets store
     *
     * @return string|null
     */
    public function getStore()
    {
        return $this->container['store'];
    }

    /**
     * Sets store
     *
     * @param string|null $store The physical store, for which this payment is processed.
     *
     * @return self
     */
    public function setStore($store)
    {
        if (is_null($store)) {
            throw new \InvalidArgumentException('non-nullable store cannot be null');
        }
        $this->container['store'] = $store;

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
