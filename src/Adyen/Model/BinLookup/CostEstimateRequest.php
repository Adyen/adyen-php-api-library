<?php

/**
 * Adyen BinLookup API
 *
 * The version of the OpenAPI document: 54
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
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
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
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
        'card_number' => 'string',
        'encrypted_card_number' => 'string',
        'merchant_account' => 'string',
        'merchant_details' => '\Adyen\Model\BinLookup\MerchantDetails',
        'recurring' => '\Adyen\Model\BinLookup\Recurring',
        'selected_recurring_detail_reference' => 'string',
        'shopper_interaction' => 'string',
        'shopper_reference' => 'string'
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
        'card_number' => null,
        'encrypted_card_number' => null,
        'merchant_account' => null,
        'merchant_details' => null,
        'recurring' => null,
        'selected_recurring_detail_reference' => null,
        'shopper_interaction' => null,
        'shopper_reference' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'amount' => false,
        'assumptions' => false,
        'card_number' => false,
        'encrypted_card_number' => false,
        'merchant_account' => false,
        'merchant_details' => false,
        'recurring' => false,
        'selected_recurring_detail_reference' => false,
        'shopper_interaction' => false,
        'shopper_reference' => false
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
        'card_number' => 'cardNumber',
        'encrypted_card_number' => 'encryptedCardNumber',
        'merchant_account' => 'merchantAccount',
        'merchant_details' => 'merchantDetails',
        'recurring' => 'recurring',
        'selected_recurring_detail_reference' => 'selectedRecurringDetailReference',
        'shopper_interaction' => 'shopperInteraction',
        'shopper_reference' => 'shopperReference'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'assumptions' => 'setAssumptions',
        'card_number' => 'setCardNumber',
        'encrypted_card_number' => 'setEncryptedCardNumber',
        'merchant_account' => 'setMerchantAccount',
        'merchant_details' => 'setMerchantDetails',
        'recurring' => 'setRecurring',
        'selected_recurring_detail_reference' => 'setSelectedRecurringDetailReference',
        'shopper_interaction' => 'setShopperInteraction',
        'shopper_reference' => 'setShopperReference'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'assumptions' => 'getAssumptions',
        'card_number' => 'getCardNumber',
        'encrypted_card_number' => 'getEncryptedCardNumber',
        'merchant_account' => 'getMerchantAccount',
        'merchant_details' => 'getMerchantDetails',
        'recurring' => 'getRecurring',
        'selected_recurring_detail_reference' => 'getSelectedRecurringDetailReference',
        'shopper_interaction' => 'getShopperInteraction',
        'shopper_reference' => 'getShopperReference'
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
        $this->setIfExists('assumptions', $data ?? [], null);
        $this->setIfExists('card_number', $data ?? [], null);
        $this->setIfExists('encrypted_card_number', $data ?? [], null);
        $this->setIfExists('merchant_account', $data ?? [], null);
        $this->setIfExists('merchant_details', $data ?? [], null);
        $this->setIfExists('recurring', $data ?? [], null);
        $this->setIfExists('selected_recurring_detail_reference', $data ?? [], null);
        $this->setIfExists('shopper_interaction', $data ?? [], null);
        $this->setIfExists('shopper_reference', $data ?? [], null);
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
        if ($this->container['merchant_account'] === null) {
            $invalidProperties[] = "'merchant_account' can't be null";
        }
        $allowedValues = $this->getShopperInteractionAllowableValues();
        if (!is_null($this->container['shopper_interaction']) && !in_array($this->container['shopper_interaction'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'shopper_interaction', must be one of '%s'",
                $this->container['shopper_interaction'],
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
        if (is_null($amount)) {
            throw new \InvalidArgumentException('non-nullable amount cannot be null');
        }
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
        if (is_null($assumptions)) {
            throw new \InvalidArgumentException('non-nullable assumptions cannot be null');
        }
        $this->container['assumptions'] = $assumptions;

        return $this;
    }

    /**
     * Gets card_number
     *
     * @return string|null
     */
    public function getCardNumber()
    {
        return $this->container['card_number'];
    }

    /**
     * Sets card_number
     *
     * @param string|null $card_number The card number (4-19 characters) for PCI compliant use cases. Do not use any separators.  > Either the `cardNumber` or `encryptedCardNumber` field must be provided in a payment request.
     *
     * @return self
     */
    public function setCardNumber($card_number)
    {
        if (is_null($card_number)) {
            throw new \InvalidArgumentException('non-nullable card_number cannot be null');
        }
        $this->container['card_number'] = $card_number;

        return $this;
    }

    /**
     * Gets encrypted_card_number
     *
     * @return string|null
     */
    public function getEncryptedCardNumber()
    {
        return $this->container['encrypted_card_number'];
    }

    /**
     * Sets encrypted_card_number
     *
     * @param string|null $encrypted_card_number Encrypted data that stores card information for non PCI-compliant use cases. The encrypted data must be created with the Checkout Card Component or Secured Fields Component, and must contain the `encryptedCardNumber` field.  > Either the `cardNumber` or `encryptedCardNumber` field must be provided in a payment request.
     *
     * @return self
     */
    public function setEncryptedCardNumber($encrypted_card_number)
    {
        if (is_null($encrypted_card_number)) {
            throw new \InvalidArgumentException('non-nullable encrypted_card_number cannot be null');
        }
        $this->container['encrypted_card_number'] = $encrypted_card_number;

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
     * @param string $merchant_account The merchant account identifier you want to process the (transaction) request with.
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
     * Gets merchant_details
     *
     * @return \Adyen\Model\BinLookup\MerchantDetails|null
     */
    public function getMerchantDetails()
    {
        return $this->container['merchant_details'];
    }

    /**
     * Sets merchant_details
     *
     * @param \Adyen\Model\BinLookup\MerchantDetails|null $merchant_details merchant_details
     *
     * @return self
     */
    public function setMerchantDetails($merchant_details)
    {
        if (is_null($merchant_details)) {
            throw new \InvalidArgumentException('non-nullable merchant_details cannot be null');
        }
        $this->container['merchant_details'] = $merchant_details;

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
        if (is_null($recurring)) {
            throw new \InvalidArgumentException('non-nullable recurring cannot be null');
        }
        $this->container['recurring'] = $recurring;

        return $this;
    }

    /**
     * Gets selected_recurring_detail_reference
     *
     * @return string|null
     */
    public function getSelectedRecurringDetailReference()
    {
        return $this->container['selected_recurring_detail_reference'];
    }

    /**
     * Sets selected_recurring_detail_reference
     *
     * @param string|null $selected_recurring_detail_reference The `recurringDetailReference` you want to use for this cost estimate. The value `LATEST` can be used to select the most recently stored recurring detail.
     *
     * @return self
     */
    public function setSelectedRecurringDetailReference($selected_recurring_detail_reference)
    {
        if (is_null($selected_recurring_detail_reference)) {
            throw new \InvalidArgumentException('non-nullable selected_recurring_detail_reference cannot be null');
        }
        $this->container['selected_recurring_detail_reference'] = $selected_recurring_detail_reference;

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
     * @param string|null $shopper_interaction Specifies the sales channel, through which the shopper gives their card details, and whether the shopper is a returning customer. For the web service API, Adyen assumes Ecommerce shopper interaction by default.  This field has the following possible values: * `Ecommerce` - Online transactions where the cardholder is present (online). For better authorisation rates, we recommend sending the card security code (CSC) along with the request. * `ContAuth` - Card on file and/or subscription transactions, where the card holder is known to the merchant (returning customer). If the shopper is present (online), you can supply also the CSC to improve authorisation (one-click payment). * `Moto` - Mail-order and telephone-order transactions where the shopper is in contact with the merchant via email or telephone. * `POS` - Point-of-sale transactions where the shopper is physically present to make a payment using a secure payment terminal.
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
     * @param string|null $shopper_reference Required for recurring payments.  Your reference to uniquely identify this shopper, for example user ID or account ID. Minimum length: 3 characters. > Your reference must not include personally identifiable information (PII), for example name or email address.
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