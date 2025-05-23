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
 * SplitConfigurationRule Class Doc Comment
 *
 * @package  Adyen
 * @implements \ArrayAccess<string, mixed>
 */
class SplitConfigurationRule implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SplitConfigurationRule';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'currency' => 'string',
        'fundingSource' => 'string',
        'paymentMethod' => 'string',
        'ruleId' => 'string',
        'shopperInteraction' => 'string',
        'splitLogic' => '\Adyen\Model\Management\SplitConfigurationLogic'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'currency' => null,
        'fundingSource' => null,
        'paymentMethod' => null,
        'ruleId' => null,
        'shopperInteraction' => null,
        'splitLogic' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'currency' => false,
        'fundingSource' => false,
        'paymentMethod' => false,
        'ruleId' => false,
        'shopperInteraction' => false,
        'splitLogic' => false
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
        'currency' => 'currency',
        'fundingSource' => 'fundingSource',
        'paymentMethod' => 'paymentMethod',
        'ruleId' => 'ruleId',
        'shopperInteraction' => 'shopperInteraction',
        'splitLogic' => 'splitLogic'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'currency' => 'setCurrency',
        'fundingSource' => 'setFundingSource',
        'paymentMethod' => 'setPaymentMethod',
        'ruleId' => 'setRuleId',
        'shopperInteraction' => 'setShopperInteraction',
        'splitLogic' => 'setSplitLogic'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'currency' => 'getCurrency',
        'fundingSource' => 'getFundingSource',
        'paymentMethod' => 'getPaymentMethod',
        'ruleId' => 'getRuleId',
        'shopperInteraction' => 'getShopperInteraction',
        'splitLogic' => 'getSplitLogic'
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

    public const FUNDING_SOURCE_CHARGED = 'charged';
    public const FUNDING_SOURCE_CREDIT = 'credit';
    public const FUNDING_SOURCE_DEBIT = 'debit';
    public const FUNDING_SOURCE_DEFERRED_DEBIT = 'deferred_debit';
    public const FUNDING_SOURCE_PREPAID = 'prepaid';
    public const FUNDING_SOURCE_ANY = 'ANY';
    public const SHOPPER_INTERACTION_ECOMMERCE = 'Ecommerce';
    public const SHOPPER_INTERACTION_CONT_AUTH = 'ContAuth';
    public const SHOPPER_INTERACTION_MOTO = 'Moto';
    public const SHOPPER_INTERACTION_POS = 'POS';
    public const SHOPPER_INTERACTION_ANY = 'ANY';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFundingSourceAllowableValues()
    {
        return [
            self::FUNDING_SOURCE_CHARGED,
            self::FUNDING_SOURCE_CREDIT,
            self::FUNDING_SOURCE_DEBIT,
            self::FUNDING_SOURCE_DEFERRED_DEBIT,
            self::FUNDING_SOURCE_PREPAID,
            self::FUNDING_SOURCE_ANY,
        ];
    }
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
            self::SHOPPER_INTERACTION_ANY,
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
    public function __construct(?array $data = null)
    {
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('fundingSource', $data ?? [], null);
        $this->setIfExists('paymentMethod', $data ?? [], null);
        $this->setIfExists('ruleId', $data ?? [], null);
        $this->setIfExists('shopperInteraction', $data ?? [], null);
        $this->setIfExists('splitLogic', $data ?? [], null);
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

        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        $allowedValues = $this->getFundingSourceAllowableValues();
        if (!is_null($this->container['fundingSource']) && !in_array($this->container['fundingSource'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'fundingSource', must be one of '%s'",
                $this->container['fundingSource'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['paymentMethod'] === null) {
            $invalidProperties[] = "'paymentMethod' can't be null";
        }
        if ($this->container['shopperInteraction'] === null) {
            $invalidProperties[] = "'shopperInteraction' can't be null";
        }
        $allowedValues = $this->getShopperInteractionAllowableValues();
        if (!is_null($this->container['shopperInteraction']) && !in_array($this->container['shopperInteraction'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'shopperInteraction', must be one of '%s'",
                $this->container['shopperInteraction'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['splitLogic'] === null) {
            $invalidProperties[] = "'splitLogic' can't be null";
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
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency The currency condition that defines whether the split logic applies. Its value must be a three-character [ISO currency code](https://en.wikipedia.org/wiki/ISO_4217).
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets fundingSource
     *
     * @return string|null
     */
    public function getFundingSource()
    {
        return $this->container['fundingSource'];
    }

    /**
     * Sets fundingSource
     *
     * @param string|null $fundingSource The funding source of the payment method. This only applies to card transactions.  Possible values: * **credit** * **debit** * **prepaid** * **deferred_debit** * **charged** * **ANY**
     *
     * @return self
     */
    public function setFundingSource($fundingSource)
    {
        $allowedValues = $this->getFundingSourceAllowableValues();
        if (!in_array($fundingSource, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'fundingSource', must be one of '%s'",
                    $fundingSource,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['fundingSource'] = $fundingSource;

        return $this;
    }

    /**
     * Gets paymentMethod
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->container['paymentMethod'];
    }

    /**
     * Sets paymentMethod
     *
     * @param string $paymentMethod The payment method condition that defines whether the split logic applies.  Possible values: * [Payment method variant](https://docs.adyen.com/development-resources/paymentmethodvariant): Apply the split logic for a specific payment method. * **ANY**: Apply the split logic for all available payment methods.
     *
     * @return self
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->container['paymentMethod'] = $paymentMethod;

        return $this;
    }

    /**
     * Gets ruleId
     *
     * @return string|null
     */
    public function getRuleId()
    {
        return $this->container['ruleId'];
    }

    /**
     * Sets ruleId
     *
     * @param string|null $ruleId The unique identifier of the split configuration rule.
     *
     * @return self
     */
    public function setRuleId($ruleId)
    {
        $this->container['ruleId'] = $ruleId;

        return $this;
    }

    /**
     * Gets shopperInteraction
     *
     * @return string
     */
    public function getShopperInteraction()
    {
        return $this->container['shopperInteraction'];
    }

    /**
     * Sets shopperInteraction
     *
     * @param string $shopperInteraction The sales channel condition that defines whether the split logic applies.  Possible values: * **Ecommerce**: Online transactions where the cardholder is present. * **ContAuth**: Card on file and/or subscription transactions, where the cardholder is known to the merchant (returning customer). * **Moto**: Mail-order and telephone-order transactions where the customer is in contact with the merchant via email or telephone. * **POS**: Point-of-sale transactions where the customer is physically present to make a payment using a secure payment terminal. * **ANY**: All sales channels.
     *
     * @return self
     */
    public function setShopperInteraction($shopperInteraction)
    {
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
     * Gets splitLogic
     *
     * @return \Adyen\Model\Management\SplitConfigurationLogic
     */
    public function getSplitLogic()
    {
        return $this->container['splitLogic'];
    }

    /**
     * Sets splitLogic
     *
     * @param \Adyen\Model\Management\SplitConfigurationLogic $splitLogic splitLogic
     *
     * @return self
     */
    public function setSplitLogic($splitLogic)
    {
        $this->container['splitLogic'] = $splitLogic;

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
