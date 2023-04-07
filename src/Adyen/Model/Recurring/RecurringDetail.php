<?php

/**
 * Adyen Recurring API
 *
 * The version of the OpenAPI document: 68
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Recurring;

use \ArrayAccess;
use Adyen\Model\Recurring\ObjectSerializer;

/**
 * RecurringDetail Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class RecurringDetail implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'RecurringDetail';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'additional_data' => 'array<string,string>',
        'alias' => 'string',
        'alias_type' => 'string',
        'bank' => '\Adyen\Model\Recurring\BankAccount',
        'billing_address' => '\Adyen\Model\Recurring\Address',
        'card' => '\Adyen\Model\Recurring\Card',
        'contract_types' => 'string[]',
        'creation_date' => '\DateTime',
        'first_psp_reference' => 'string',
        'name' => 'string',
        'network_tx_reference' => 'string',
        'payment_method_variant' => 'string',
        'recurring_detail_reference' => 'string',
        'shopper_name' => '\Adyen\Model\Recurring\Name',
        'social_security_number' => 'string',
        'token_details' => '\Adyen\Model\Recurring\TokenDetails',
        'variant' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'additional_data' => null,
        'alias' => null,
        'alias_type' => null,
        'bank' => null,
        'billing_address' => null,
        'card' => null,
        'contract_types' => null,
        'creation_date' => 'date-time',
        'first_psp_reference' => null,
        'name' => null,
        'network_tx_reference' => null,
        'payment_method_variant' => null,
        'recurring_detail_reference' => null,
        'shopper_name' => null,
        'social_security_number' => null,
        'token_details' => null,
        'variant' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'additional_data' => false,
        'alias' => false,
        'alias_type' => false,
        'bank' => false,
        'billing_address' => false,
        'card' => false,
        'contract_types' => false,
        'creation_date' => false,
        'first_psp_reference' => false,
        'name' => false,
        'network_tx_reference' => false,
        'payment_method_variant' => false,
        'recurring_detail_reference' => false,
        'shopper_name' => false,
        'social_security_number' => false,
        'token_details' => false,
        'variant' => false
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
        'additional_data' => 'additionalData',
        'alias' => 'alias',
        'alias_type' => 'aliasType',
        'bank' => 'bank',
        'billing_address' => 'billingAddress',
        'card' => 'card',
        'contract_types' => 'contractTypes',
        'creation_date' => 'creationDate',
        'first_psp_reference' => 'firstPspReference',
        'name' => 'name',
        'network_tx_reference' => 'networkTxReference',
        'payment_method_variant' => 'paymentMethodVariant',
        'recurring_detail_reference' => 'recurringDetailReference',
        'shopper_name' => 'shopperName',
        'social_security_number' => 'socialSecurityNumber',
        'token_details' => 'tokenDetails',
        'variant' => 'variant'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'additional_data' => 'setAdditionalData',
        'alias' => 'setAlias',
        'alias_type' => 'setAliasType',
        'bank' => 'setBank',
        'billing_address' => 'setBillingAddress',
        'card' => 'setCard',
        'contract_types' => 'setContractTypes',
        'creation_date' => 'setCreationDate',
        'first_psp_reference' => 'setFirstPspReference',
        'name' => 'setName',
        'network_tx_reference' => 'setNetworkTxReference',
        'payment_method_variant' => 'setPaymentMethodVariant',
        'recurring_detail_reference' => 'setRecurringDetailReference',
        'shopper_name' => 'setShopperName',
        'social_security_number' => 'setSocialSecurityNumber',
        'token_details' => 'setTokenDetails',
        'variant' => 'setVariant'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'additional_data' => 'getAdditionalData',
        'alias' => 'getAlias',
        'alias_type' => 'getAliasType',
        'bank' => 'getBank',
        'billing_address' => 'getBillingAddress',
        'card' => 'getCard',
        'contract_types' => 'getContractTypes',
        'creation_date' => 'getCreationDate',
        'first_psp_reference' => 'getFirstPspReference',
        'name' => 'getName',
        'network_tx_reference' => 'getNetworkTxReference',
        'payment_method_variant' => 'getPaymentMethodVariant',
        'recurring_detail_reference' => 'getRecurringDetailReference',
        'shopper_name' => 'getShopperName',
        'social_security_number' => 'getSocialSecurityNumber',
        'token_details' => 'getTokenDetails',
        'variant' => 'getVariant'
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
        $this->setIfExists('additional_data', $data ?? [], null);
        $this->setIfExists('alias', $data ?? [], null);
        $this->setIfExists('alias_type', $data ?? [], null);
        $this->setIfExists('bank', $data ?? [], null);
        $this->setIfExists('billing_address', $data ?? [], null);
        $this->setIfExists('card', $data ?? [], null);
        $this->setIfExists('contract_types', $data ?? [], null);
        $this->setIfExists('creation_date', $data ?? [], null);
        $this->setIfExists('first_psp_reference', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('network_tx_reference', $data ?? [], null);
        $this->setIfExists('payment_method_variant', $data ?? [], null);
        $this->setIfExists('recurring_detail_reference', $data ?? [], null);
        $this->setIfExists('shopper_name', $data ?? [], null);
        $this->setIfExists('social_security_number', $data ?? [], null);
        $this->setIfExists('token_details', $data ?? [], null);
        $this->setIfExists('variant', $data ?? [], null);
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

        if ($this->container['recurring_detail_reference'] === null) {
            $invalidProperties[] = "'recurring_detail_reference' can't be null";
        }
        if ($this->container['variant'] === null) {
            $invalidProperties[] = "'variant' can't be null";
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
     * Gets additional_data
     *
     * @return array<string,string>|null
     */
    public function getAdditionalData()
    {
        return $this->container['additional_data'];
    }

    /**
     * Sets additional_data
     *
     * @param array<string,string>|null $additional_data This field contains additional data, which may be returned in a particular response.  The additionalData object consists of entries, each of which includes the key and value.
     *
     * @return self
     */
    public function setAdditionalData($additional_data)
    {
        if (is_null($additional_data)) {
            throw new \InvalidArgumentException('non-nullable additional_data cannot be null');
        }
        $this->container['additional_data'] = $additional_data;

        return $this;
    }

    /**
     * Gets alias
     *
     * @return string|null
     */
    public function getAlias()
    {
        return $this->container['alias'];
    }

    /**
     * Sets alias
     *
     * @param string|null $alias The alias of the credit card number.  Applies only to recurring contracts storing credit card details
     *
     * @return self
     */
    public function setAlias($alias)
    {
        if (is_null($alias)) {
            throw new \InvalidArgumentException('non-nullable alias cannot be null');
        }
        $this->container['alias'] = $alias;

        return $this;
    }

    /**
     * Gets alias_type
     *
     * @return string|null
     */
    public function getAliasType()
    {
        return $this->container['alias_type'];
    }

    /**
     * Sets alias_type
     *
     * @param string|null $alias_type The alias type of the credit card number.  Applies only to recurring contracts storing credit card details.
     *
     * @return self
     */
    public function setAliasType($alias_type)
    {
        if (is_null($alias_type)) {
            throw new \InvalidArgumentException('non-nullable alias_type cannot be null');
        }
        $this->container['alias_type'] = $alias_type;

        return $this;
    }

    /**
     * Gets bank
     *
     * @return \Adyen\Model\Recurring\BankAccount|null
     */
    public function getBank()
    {
        return $this->container['bank'];
    }

    /**
     * Sets bank
     *
     * @param \Adyen\Model\Recurring\BankAccount|null $bank bank
     *
     * @return self
     */
    public function setBank($bank)
    {
        if (is_null($bank)) {
            throw new \InvalidArgumentException('non-nullable bank cannot be null');
        }
        $this->container['bank'] = $bank;

        return $this;
    }

    /**
     * Gets billing_address
     *
     * @return \Adyen\Model\Recurring\Address|null
     */
    public function getBillingAddress()
    {
        return $this->container['billing_address'];
    }

    /**
     * Sets billing_address
     *
     * @param \Adyen\Model\Recurring\Address|null $billing_address billing_address
     *
     * @return self
     */
    public function setBillingAddress($billing_address)
    {
        if (is_null($billing_address)) {
            throw new \InvalidArgumentException('non-nullable billing_address cannot be null');
        }
        $this->container['billing_address'] = $billing_address;

        return $this;
    }

    /**
     * Gets card
     *
     * @return \Adyen\Model\Recurring\Card|null
     */
    public function getCard()
    {
        return $this->container['card'];
    }

    /**
     * Sets card
     *
     * @param \Adyen\Model\Recurring\Card|null $card card
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
     * Gets contract_types
     *
     * @return string[]|null
     */
    public function getContractTypes()
    {
        return $this->container['contract_types'];
    }

    /**
     * Sets contract_types
     *
     * @param string[]|null $contract_types Types of recurring contracts.
     *
     * @return self
     */
    public function setContractTypes($contract_types)
    {
        if (is_null($contract_types)) {
            throw new \InvalidArgumentException('non-nullable contract_types cannot be null');
        }
        $this->container['contract_types'] = $contract_types;

        return $this;
    }

    /**
     * Gets creation_date
     *
     * @return \DateTime|null
     */
    public function getCreationDate()
    {
        return $this->container['creation_date'];
    }

    /**
     * Sets creation_date
     *
     * @param \DateTime|null $creation_date The date when the recurring details were created.
     *
     * @return self
     */
    public function setCreationDate($creation_date)
    {
        if (is_null($creation_date)) {
            throw new \InvalidArgumentException('non-nullable creation_date cannot be null');
        }
        $this->container['creation_date'] = $creation_date;

        return $this;
    }

    /**
     * Gets first_psp_reference
     *
     * @return string|null
     */
    public function getFirstPspReference()
    {
        return $this->container['first_psp_reference'];
    }

    /**
     * Sets first_psp_reference
     *
     * @param string|null $first_psp_reference The `pspReference` of the first recurring payment that created the recurring detail.
     *
     * @return self
     */
    public function setFirstPspReference($first_psp_reference)
    {
        if (is_null($first_psp_reference)) {
            throw new \InvalidArgumentException('non-nullable first_psp_reference cannot be null');
        }
        $this->container['first_psp_reference'] = $first_psp_reference;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name An optional descriptive name for this recurring detail.
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets network_tx_reference
     *
     * @return string|null
     */
    public function getNetworkTxReference()
    {
        return $this->container['network_tx_reference'];
    }

    /**
     * Sets network_tx_reference
     *
     * @param string|null $network_tx_reference Returned in the response if you are not tokenizing with Adyen and are using the Merchant-initiated transactions (MIT) framework from Mastercard or Visa.  This contains either the Mastercard Trace ID or the Visa Transaction ID.
     *
     * @return self
     */
    public function setNetworkTxReference($network_tx_reference)
    {
        if (is_null($network_tx_reference)) {
            throw new \InvalidArgumentException('non-nullable network_tx_reference cannot be null');
        }
        $this->container['network_tx_reference'] = $network_tx_reference;

        return $this;
    }

    /**
     * Gets payment_method_variant
     *
     * @return string|null
     */
    public function getPaymentMethodVariant()
    {
        return $this->container['payment_method_variant'];
    }

    /**
     * Sets payment_method_variant
     *
     * @param string|null $payment_method_variant The  type or sub-brand of a payment method used, e.g. Visa Debit, Visa Corporate, etc. For more information, refer to [PaymentMethodVariant](https://docs.adyen.com/development-resources/paymentmethodvariant).
     *
     * @return self
     */
    public function setPaymentMethodVariant($payment_method_variant)
    {
        if (is_null($payment_method_variant)) {
            throw new \InvalidArgumentException('non-nullable payment_method_variant cannot be null');
        }
        $this->container['payment_method_variant'] = $payment_method_variant;

        return $this;
    }

    /**
     * Gets recurring_detail_reference
     *
     * @return string
     */
    public function getRecurringDetailReference()
    {
        return $this->container['recurring_detail_reference'];
    }

    /**
     * Sets recurring_detail_reference
     *
     * @param string $recurring_detail_reference The reference that uniquely identifies the recurring detail.
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
     * Gets shopper_name
     *
     * @return \Adyen\Model\Recurring\Name|null
     */
    public function getShopperName()
    {
        return $this->container['shopper_name'];
    }

    /**
     * Sets shopper_name
     *
     * @param \Adyen\Model\Recurring\Name|null $shopper_name shopper_name
     *
     * @return self
     */
    public function setShopperName($shopper_name)
    {
        if (is_null($shopper_name)) {
            throw new \InvalidArgumentException('non-nullable shopper_name cannot be null');
        }
        $this->container['shopper_name'] = $shopper_name;

        return $this;
    }

    /**
     * Gets social_security_number
     *
     * @return string|null
     */
    public function getSocialSecurityNumber()
    {
        return $this->container['social_security_number'];
    }

    /**
     * Sets social_security_number
     *
     * @param string|null $social_security_number A shopper's social security number (only in countries where it is legal to collect).
     *
     * @return self
     */
    public function setSocialSecurityNumber($social_security_number)
    {
        if (is_null($social_security_number)) {
            throw new \InvalidArgumentException('non-nullable social_security_number cannot be null');
        }
        $this->container['social_security_number'] = $social_security_number;

        return $this;
    }

    /**
     * Gets token_details
     *
     * @return \Adyen\Model\Recurring\TokenDetails|null
     */
    public function getTokenDetails()
    {
        return $this->container['token_details'];
    }

    /**
     * Sets token_details
     *
     * @param \Adyen\Model\Recurring\TokenDetails|null $token_details token_details
     *
     * @return self
     */
    public function setTokenDetails($token_details)
    {
        if (is_null($token_details)) {
            throw new \InvalidArgumentException('non-nullable token_details cannot be null');
        }
        $this->container['token_details'] = $token_details;

        return $this;
    }

    /**
     * Gets variant
     *
     * @return string
     */
    public function getVariant()
    {
        return $this->container['variant'];
    }

    /**
     * Sets variant
     *
     * @param string $variant The payment method, such as “mc\", \"visa\", \"ideal\", \"paypal\".
     *
     * @return self
     */
    public function setVariant($variant)
    {
        if (is_null($variant)) {
            throw new \InvalidArgumentException('non-nullable variant cannot be null');
        }
        $this->container['variant'] = $variant;

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