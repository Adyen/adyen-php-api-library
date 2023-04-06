<?php

/**
 * Adyen Stored Value API
 *
 * The version of the OpenAPI document: 46
 * Contact: developer-experience@adyen.com
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
 * StoredValueBalanceMergeRequest Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class StoredValueBalanceMergeRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'StoredValueBalanceMergeRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'amount' => '\Adyen\Model\StoredValue\Amount',
        'merchant_account' => 'string',
        'payment_method' => 'array<string,string>',
        'recurring_detail_reference' => 'string',
        'reference' => 'string',
        'shopper_interaction' => 'string',
        'shopper_reference' => 'string',
        'source_payment_method' => 'array<string,string>',
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
        'merchant_account' => null,
        'payment_method' => null,
        'recurring_detail_reference' => null,
        'reference' => null,
        'shopper_interaction' => null,
        'shopper_reference' => null,
        'source_payment_method' => null,
        'store' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'amount' => false,
        'merchant_account' => false,
        'payment_method' => false,
        'recurring_detail_reference' => false,
        'reference' => false,
        'shopper_interaction' => false,
        'shopper_reference' => false,
        'source_payment_method' => false,
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
        'merchant_account' => 'merchantAccount',
        'payment_method' => 'paymentMethod',
        'recurring_detail_reference' => 'recurringDetailReference',
        'reference' => 'reference',
        'shopper_interaction' => 'shopperInteraction',
        'shopper_reference' => 'shopperReference',
        'source_payment_method' => 'sourcePaymentMethod',
        'store' => 'store'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'merchant_account' => 'setMerchantAccount',
        'payment_method' => 'setPaymentMethod',
        'recurring_detail_reference' => 'setRecurringDetailReference',
        'reference' => 'setReference',
        'shopper_interaction' => 'setShopperInteraction',
        'shopper_reference' => 'setShopperReference',
        'source_payment_method' => 'setSourcePaymentMethod',
        'store' => 'setStore'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'merchant_account' => 'getMerchantAccount',
        'payment_method' => 'getPaymentMethod',
        'recurring_detail_reference' => 'getRecurringDetailReference',
        'reference' => 'getReference',
        'shopper_interaction' => 'getShopperInteraction',
        'shopper_reference' => 'getShopperReference',
        'source_payment_method' => 'getSourcePaymentMethod',
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
        $this->setIfExists('merchant_account', $data ?? [], null);
        $this->setIfExists('payment_method', $data ?? [], null);
        $this->setIfExists('recurring_detail_reference', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('shopper_interaction', $data ?? [], null);
        $this->setIfExists('shopper_reference', $data ?? [], null);
        $this->setIfExists('source_payment_method', $data ?? [], null);
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

        if ($this->container['merchant_account'] === null) {
            $invalidProperties[] = "'merchant_account' can't be null";
        }
        if ($this->container['payment_method'] === null) {
            $invalidProperties[] = "'payment_method' can't be null";
        }
        if ($this->container['reference'] === null) {
            $invalidProperties[] = "'reference' can't be null";
        }
        $allowedValues = $this->getShopperInteractionAllowableValues();
        if (!is_null($this->container['shopper_interaction']) && !in_array($this->container['shopper_interaction'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'shopper_interaction', must be one of '%s'",
                $this->container['shopper_interaction'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['source_payment_method'] === null) {
            $invalidProperties[] = "'source_payment_method' can't be null";
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
     * Gets merchant_account
     *
     * @return string
     */
    public function getMerchantAccount()
    {
        return $this->container['merchant_account'];
    }

    /**
     * Sets merchant_account
     *
     * @param string $merchant_account The merchant account identifier, with which you want to process the transaction.
     *
     * @return self
     */
    public function setMerchantAccount($merchant_account)
    {
        if (is_null($merchant_account)) {
            throw new \InvalidArgumentException('non-nullable merchant_account cannot be null');
        }
        $this->container['merchant_account'] = $merchant_account;

        return $this;
    }

    /**
     * Gets payment_method
     *
     * @return array<string,string>
     */
    public function getPaymentMethod()
    {
        return $this->container['payment_method'];
    }

    /**
     * Sets payment_method
     *
     * @param array<string,string> $payment_method The collection that contains the type of the payment method and its specific information if available
     *
     * @return self
     */
    public function setPaymentMethod($payment_method)
    {
        if (is_null($payment_method)) {
            throw new \InvalidArgumentException('non-nullable payment_method cannot be null');
        }
        $this->container['payment_method'] = $payment_method;

        return $this;
    }

    /**
     * Gets recurring_detail_reference
     *
     * @return string|null
     */
    public function getRecurringDetailReference()
    {
        return $this->container['recurring_detail_reference'];
    }

    /**
     * Sets recurring_detail_reference
     *
     * @param string|null $recurring_detail_reference recurring_detail_reference
     *
     * @return self
     */
    public function setRecurringDetailReference($recurring_detail_reference)
    {
        if (is_null($recurring_detail_reference)) {
            throw new \InvalidArgumentException('non-nullable recurring_detail_reference cannot be null');
        }
        $this->container['recurring_detail_reference'] = $recurring_detail_reference;

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
     * Gets shopper_interaction
     *
     * @return string|null
     */
    public function getShopperInteraction()
    {
        return $this->container['shopper_interaction'];
    }

    /**
     * Sets shopper_interaction
     *
     * @param string|null $shopper_interaction Specifies the sales channel, through which the shopper gives their card details, and whether the shopper is a returning customer. For the web service API, Adyen assumes Ecommerce shopper interaction by default.  This field has the following possible values: * `Ecommerce` - Online transactions where the cardholder is present (online). For better authorisation rates, we recommend sending the card security code (CSC) along with the request. * `ContAuth` - Card on file and/or subscription transactions, where the cardholder is known to the merchant (returning customer). If the shopper is present (online), you can supply also the CSC to improve authorisation (one-click payment). * `Moto` - Mail-order and telephone-order transactions where the shopper is in contact with the merchant via email or telephone. * `POS` - Point-of-sale transactions where the shopper is physically present to make a payment using a secure payment terminal.
     *
     * @return self
     */
    public function setShopperInteraction($shopper_interaction)
    {
        if (is_null($shopper_interaction)) {
            throw new \InvalidArgumentException('non-nullable shopper_interaction cannot be null');
        }
        $allowedValues = $this->getShopperInteractionAllowableValues();
        if (!in_array($shopper_interaction, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'shopper_interaction', must be one of '%s'",
                    $shopper_interaction,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['shopper_interaction'] = $shopper_interaction;

        return $this;
    }

    /**
     * Gets shopper_reference
     *
     * @return string|null
     */
    public function getShopperReference()
    {
        return $this->container['shopper_reference'];
    }

    /**
     * Sets shopper_reference
     *
     * @param string|null $shopper_reference shopper_reference
     *
     * @return self
     */
    public function setShopperReference($shopper_reference)
    {
        if (is_null($shopper_reference)) {
            throw new \InvalidArgumentException('non-nullable shopper_reference cannot be null');
        }
        $this->container['shopper_reference'] = $shopper_reference;

        return $this;
    }

    /**
     * Gets source_payment_method
     *
     * @return array<string,string>
     */
    public function getSourcePaymentMethod()
    {
        return $this->container['source_payment_method'];
    }

    /**
     * Sets source_payment_method
     *
     * @param array<string,string> $source_payment_method The collection that contains the source payment method and its specific information if available. Note that type should not be included since it is inferred from the (target) payment method
     *
     * @return self
     */
    public function setSourcePaymentMethod($source_payment_method)
    {
        if (is_null($source_payment_method)) {
            throw new \InvalidArgumentException('non-nullable source_payment_method cannot be null');
        }
        $this->container['source_payment_method'] = $source_payment_method;

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
