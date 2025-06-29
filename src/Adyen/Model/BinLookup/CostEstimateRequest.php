<?php

/**
 * Adyen BinLookup API
 *
 * The version of the OpenAPI document: 54
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\BinLookup;

use \ArrayAccess;
use Adyen\Model\BinLookup\ObjectSerializer;

/**
 * CostEstimateRequest Class Doc Comment
 *
 * @package  Adyen
 * @implements \ArrayAccess<string, mixed>
 */
class CostEstimateRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CostEstimateRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'amount' => '\Adyen\Model\BinLookup\Amount',
        'assumptions' => '\Adyen\Model\BinLookup\CostEstimateAssumptions',
        'cardNumber' => 'string',
        'encryptedCardNumber' => 'string',
        'merchantAccount' => 'string',
        'merchantDetails' => '\Adyen\Model\BinLookup\MerchantDetails',
        'recurring' => '\Adyen\Model\BinLookup\Recurring',
        'selectedRecurringDetailReference' => 'string',
        'shopperInteraction' => 'string',
        'shopperReference' => 'string'
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
        'assumptions' => null,
        'cardNumber' => null,
        'encryptedCardNumber' => null,
        'merchantAccount' => null,
        'merchantDetails' => null,
        'recurring' => null,
        'selectedRecurringDetailReference' => null,
        'shopperInteraction' => null,
        'shopperReference' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'amount' => false,
        'assumptions' => false,
        'cardNumber' => false,
        'encryptedCardNumber' => false,
        'merchantAccount' => false,
        'merchantDetails' => false,
        'recurring' => false,
        'selectedRecurringDetailReference' => false,
        'shopperInteraction' => false,
        'shopperReference' => false
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
        'assumptions' => 'assumptions',
        'cardNumber' => 'cardNumber',
        'encryptedCardNumber' => 'encryptedCardNumber',
        'merchantAccount' => 'merchantAccount',
        'merchantDetails' => 'merchantDetails',
        'recurring' => 'recurring',
        'selectedRecurringDetailReference' => 'selectedRecurringDetailReference',
        'shopperInteraction' => 'shopperInteraction',
        'shopperReference' => 'shopperReference'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'assumptions' => 'setAssumptions',
        'cardNumber' => 'setCardNumber',
        'encryptedCardNumber' => 'setEncryptedCardNumber',
        'merchantAccount' => 'setMerchantAccount',
        'merchantDetails' => 'setMerchantDetails',
        'recurring' => 'setRecurring',
        'selectedRecurringDetailReference' => 'setSelectedRecurringDetailReference',
        'shopperInteraction' => 'setShopperInteraction',
        'shopperReference' => 'setShopperReference'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'assumptions' => 'getAssumptions',
        'cardNumber' => 'getCardNumber',
        'encryptedCardNumber' => 'getEncryptedCardNumber',
        'merchantAccount' => 'getMerchantAccount',
        'merchantDetails' => 'getMerchantDetails',
        'recurring' => 'getRecurring',
        'selectedRecurringDetailReference' => 'getSelectedRecurringDetailReference',
        'shopperInteraction' => 'getShopperInteraction',
        'shopperReference' => 'getShopperReference'
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
    public function __construct(?array $data = null)
    {
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('assumptions', $data ?? [], null);
        $this->setIfExists('cardNumber', $data ?? [], null);
        $this->setIfExists('encryptedCardNumber', $data ?? [], null);
        $this->setIfExists('merchantAccount', $data ?? [], null);
        $this->setIfExists('merchantDetails', $data ?? [], null);
        $this->setIfExists('recurring', $data ?? [], null);
        $this->setIfExists('selectedRecurringDetailReference', $data ?? [], null);
        $this->setIfExists('shopperInteraction', $data ?? [], null);
        $this->setIfExists('shopperReference', $data ?? [], null);
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

        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        if ($this->container['merchantAccount'] === null) {
            $invalidProperties[] = "'merchantAccount' can't be null";
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
     * @return \Adyen\Model\BinLookup\Amount
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param \Adyen\Model\BinLookup\Amount $amount amount
     *
     * @return self
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets assumptions
     *
     * @return \Adyen\Model\BinLookup\CostEstimateAssumptions|null
     */
    public function getAssumptions()
    {
        return $this->container['assumptions'];
    }

    /**
     * Sets assumptions
     *
     * @param \Adyen\Model\BinLookup\CostEstimateAssumptions|null $assumptions assumptions
     *
     * @return self
     */
    public function setAssumptions($assumptions)
    {
        $this->container['assumptions'] = $assumptions;

        return $this;
    }

    /**
     * Gets cardNumber
     *
     * @return string|null
     */
    public function getCardNumber()
    {
        return $this->container['cardNumber'];
    }

    /**
     * Sets cardNumber
     *
     * @param string|null $cardNumber The card number (4-19 characters) for PCI compliant use cases. Do not use any separators.  > Either the `cardNumber` or `encryptedCardNumber` field must be provided in a payment request.
     *
     * @return self
     */
    public function setCardNumber($cardNumber)
    {
        $this->container['cardNumber'] = $cardNumber;

        return $this;
    }

    /**
     * Gets encryptedCardNumber
     *
     * @return string|null
     */
    public function getEncryptedCardNumber()
    {
        return $this->container['encryptedCardNumber'];
    }

    /**
     * Sets encryptedCardNumber
     *
     * @param string|null $encryptedCardNumber Encrypted data that stores card information for non PCI-compliant use cases. The encrypted data must be created with the Checkout Card Component or Secured Fields Component, and must contain the `encryptedCardNumber` field.  > Either the `cardNumber` or `encryptedCardNumber` field must be provided in a payment request.
     *
     * @return self
     */
    public function setEncryptedCardNumber($encryptedCardNumber)
    {
        $this->container['encryptedCardNumber'] = $encryptedCardNumber;

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
     * @param string $merchantAccount The merchant account identifier you want to process the (transaction) request with.
     *
     * @return self
     */
    public function setMerchantAccount($merchantAccount)
    {
        $this->container['merchantAccount'] = $merchantAccount;

        return $this;
    }

    /**
     * Gets merchantDetails
     *
     * @return \Adyen\Model\BinLookup\MerchantDetails|null
     */
    public function getMerchantDetails()
    {
        return $this->container['merchantDetails'];
    }

    /**
     * Sets merchantDetails
     *
     * @param \Adyen\Model\BinLookup\MerchantDetails|null $merchantDetails merchantDetails
     *
     * @return self
     */
    public function setMerchantDetails($merchantDetails)
    {
        $this->container['merchantDetails'] = $merchantDetails;

        return $this;
    }

    /**
     * Gets recurring
     *
     * @return \Adyen\Model\BinLookup\Recurring|null
     */
    public function getRecurring()
    {
        return $this->container['recurring'];
    }

    /**
     * Sets recurring
     *
     * @param \Adyen\Model\BinLookup\Recurring|null $recurring recurring
     *
     * @return self
     */
    public function setRecurring($recurring)
    {
        $this->container['recurring'] = $recurring;

        return $this;
    }

    /**
     * Gets selectedRecurringDetailReference
     *
     * @return string|null
     */
    public function getSelectedRecurringDetailReference()
    {
        return $this->container['selectedRecurringDetailReference'];
    }

    /**
     * Sets selectedRecurringDetailReference
     *
     * @param string|null $selectedRecurringDetailReference The `recurringDetailReference` you want to use for this cost estimate. The value `LATEST` can be used to select the most recently stored recurring detail.
     *
     * @return self
     */
    public function setSelectedRecurringDetailReference($selectedRecurringDetailReference)
    {
        $this->container['selectedRecurringDetailReference'] = $selectedRecurringDetailReference;

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
     * @param string|null $shopperInteraction Specifies the sales channel, through which the shopper gives their card details, and whether the shopper is a returning customer. For the web service API, Adyen assumes Ecommerce shopper interaction by default.  This field has the following possible values: * `Ecommerce` - Online transactions where the cardholder is present (online). For better authorisation rates, we recommend sending the card security code (CSC) along with the request. * `ContAuth` - Card on file and/or subscription transactions, where the card holder is known to the merchant (returning customer). If the shopper is present (online), you can supply also the CSC to improve authorisation (one-click payment). * `Moto` - Mail-order and telephone-order transactions where the shopper is in contact with the merchant via email or telephone. * `POS` - Point-of-sale transactions where the shopper is physically present to make a payment using a secure payment terminal.
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
     * @param string|null $shopperReference Required for recurring payments.  Your reference to uniquely identify this shopper, for example user ID or account ID. The value is case-sensitive and must be at least three characters. > Your reference must not include personally identifiable information (PII) such as name or email address.
     *
     * @return self
     */
    public function setShopperReference($shopperReference)
    {
        $this->container['shopperReference'] = $shopperReference;

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
