<?php

/**
 * Adyen Payout API
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


namespace Adyen\Model\Payout;

use \ArrayAccess;
use Adyen\Model\Payout\ObjectSerializer;

/**
 * StoreDetailAndSubmitRequest Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class StoreDetailAndSubmitRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'StoreDetailAndSubmitRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'additional_data' => 'array<string,string>',
        'amount' => '\Adyen\Model\Payout\Amount',
        'bank' => '\Adyen\Model\Payout\BankAccount',
        'billing_address' => '\Adyen\Model\Payout\Address',
        'card' => '\Adyen\Model\Payout\Card',
        'date_of_birth' => '\DateTime',
        'entity_type' => 'string',
        'fraud_offset' => 'int',
        'merchant_account' => 'string',
        'nationality' => 'string',
        'recurring' => '\Adyen\Model\Payout\Recurring',
        'reference' => 'string',
        'selected_brand' => 'string',
        'shopper_email' => 'string',
        'shopper_name' => '\Adyen\Model\Payout\Name',
        'shopper_reference' => 'string',
        'shopper_statement' => 'string',
        'social_security_number' => 'string',
        'telephone_number' => 'string'
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
        'amount' => null,
        'bank' => null,
        'billing_address' => null,
        'card' => null,
        'date_of_birth' => 'date-time',
        'entity_type' => null,
        'fraud_offset' => 'int32',
        'merchant_account' => null,
        'nationality' => null,
        'recurring' => null,
        'reference' => null,
        'selected_brand' => null,
        'shopper_email' => null,
        'shopper_name' => null,
        'shopper_reference' => null,
        'shopper_statement' => null,
        'social_security_number' => null,
        'telephone_number' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'additional_data' => false,
        'amount' => false,
        'bank' => false,
        'billing_address' => false,
        'card' => false,
        'date_of_birth' => false,
        'entity_type' => false,
        'fraud_offset' => true,
        'merchant_account' => false,
        'nationality' => false,
        'recurring' => false,
        'reference' => false,
        'selected_brand' => false,
        'shopper_email' => false,
        'shopper_name' => false,
        'shopper_reference' => false,
        'shopper_statement' => false,
        'social_security_number' => false,
        'telephone_number' => false
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
        'amount' => 'amount',
        'bank' => 'bank',
        'billing_address' => 'billingAddress',
        'card' => 'card',
        'date_of_birth' => 'dateOfBirth',
        'entity_type' => 'entityType',
        'fraud_offset' => 'fraudOffset',
        'merchant_account' => 'merchantAccount',
        'nationality' => 'nationality',
        'recurring' => 'recurring',
        'reference' => 'reference',
        'selected_brand' => 'selectedBrand',
        'shopper_email' => 'shopperEmail',
        'shopper_name' => 'shopperName',
        'shopper_reference' => 'shopperReference',
        'shopper_statement' => 'shopperStatement',
        'social_security_number' => 'socialSecurityNumber',
        'telephone_number' => 'telephoneNumber'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'additional_data' => 'setAdditionalData',
        'amount' => 'setAmount',
        'bank' => 'setBank',
        'billing_address' => 'setBillingAddress',
        'card' => 'setCard',
        'date_of_birth' => 'setDateOfBirth',
        'entity_type' => 'setEntityType',
        'fraud_offset' => 'setFraudOffset',
        'merchant_account' => 'setMerchantAccount',
        'nationality' => 'setNationality',
        'recurring' => 'setRecurring',
        'reference' => 'setReference',
        'selected_brand' => 'setSelectedBrand',
        'shopper_email' => 'setShopperEmail',
        'shopper_name' => 'setShopperName',
        'shopper_reference' => 'setShopperReference',
        'shopper_statement' => 'setShopperStatement',
        'social_security_number' => 'setSocialSecurityNumber',
        'telephone_number' => 'setTelephoneNumber'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'additional_data' => 'getAdditionalData',
        'amount' => 'getAmount',
        'bank' => 'getBank',
        'billing_address' => 'getBillingAddress',
        'card' => 'getCard',
        'date_of_birth' => 'getDateOfBirth',
        'entity_type' => 'getEntityType',
        'fraud_offset' => 'getFraudOffset',
        'merchant_account' => 'getMerchantAccount',
        'nationality' => 'getNationality',
        'recurring' => 'getRecurring',
        'reference' => 'getReference',
        'selected_brand' => 'getSelectedBrand',
        'shopper_email' => 'getShopperEmail',
        'shopper_name' => 'getShopperName',
        'shopper_reference' => 'getShopperReference',
        'shopper_statement' => 'getShopperStatement',
        'social_security_number' => 'getSocialSecurityNumber',
        'telephone_number' => 'getTelephoneNumber'
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

    public const ENTITY_TYPE_NATURAL_PERSON = 'NaturalPerson';
    public const ENTITY_TYPE_COMPANY = 'Company';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getEntityTypeAllowableValues()
    {
        return [
            self::ENTITY_TYPE_NATURAL_PERSON,
            self::ENTITY_TYPE_COMPANY,
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
        $this->setIfExists('additional_data', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('bank', $data ?? [], null);
        $this->setIfExists('billing_address', $data ?? [], null);
        $this->setIfExists('card', $data ?? [], null);
        $this->setIfExists('date_of_birth', $data ?? [], null);
        $this->setIfExists('entity_type', $data ?? [], null);
        $this->setIfExists('fraud_offset', $data ?? [], null);
        $this->setIfExists('merchant_account', $data ?? [], null);
        $this->setIfExists('nationality', $data ?? [], null);
        $this->setIfExists('recurring', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('selected_brand', $data ?? [], null);
        $this->setIfExists('shopper_email', $data ?? [], null);
        $this->setIfExists('shopper_name', $data ?? [], null);
        $this->setIfExists('shopper_reference', $data ?? [], null);
        $this->setIfExists('shopper_statement', $data ?? [], null);
        $this->setIfExists('social_security_number', $data ?? [], null);
        $this->setIfExists('telephone_number', $data ?? [], null);
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
        if ($this->container['date_of_birth'] === null) {
            $invalidProperties[] = "'date_of_birth' can't be null";
        }
        if ($this->container['entity_type'] === null) {
            $invalidProperties[] = "'entity_type' can't be null";
        }
        $allowedValues = $this->getEntityTypeAllowableValues();
        if (!is_null($this->container['entity_type']) && !in_array($this->container['entity_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'entity_type', must be one of '%s'",
                $this->container['entity_type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['merchant_account'] === null) {
            $invalidProperties[] = "'merchant_account' can't be null";
        }
        if ($this->container['nationality'] === null) {
            $invalidProperties[] = "'nationality' can't be null";
        }
        if ($this->container['recurring'] === null) {
            $invalidProperties[] = "'recurring' can't be null";
        }
        if ($this->container['reference'] === null) {
            $invalidProperties[] = "'reference' can't be null";
        }
        if ($this->container['shopper_email'] === null) {
            $invalidProperties[] = "'shopper_email' can't be null";
        }
        if ($this->container['shopper_reference'] === null) {
            $invalidProperties[] = "'shopper_reference' can't be null";
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
     * @param array<string,string>|null $additional_data This field contains additional data, which may be required for a particular request.
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
     * Gets amount
     *
     * @return \Adyen\Model\Payout\Amount
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param \Adyen\Model\Payout\Amount $amount amount
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
     * Gets bank
     *
     * @return \Adyen\Model\Payout\BankAccount|null
     */
    public function getBank()
    {
        return $this->container['bank'];
    }

    /**
     * Sets bank
     *
     * @param \Adyen\Model\Payout\BankAccount|null $bank bank
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
     * @return \Adyen\Model\Payout\Address|null
     */
    public function getBillingAddress()
    {
        return $this->container['billing_address'];
    }

    /**
     * Sets billing_address
     *
     * @param \Adyen\Model\Payout\Address|null $billing_address billing_address
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
     * @return \Adyen\Model\Payout\Card|null
     */
    public function getCard()
    {
        return $this->container['card'];
    }

    /**
     * Sets card
     *
     * @param \Adyen\Model\Payout\Card|null $card card
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
     * Gets date_of_birth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->container['date_of_birth'];
    }

    /**
     * Sets date_of_birth
     *
     * @param \DateTime $date_of_birth The date of birth. Format: [ISO-8601](https://www.w3.org/TR/NOTE-datetime); example: YYYY-MM-DD For Paysafecard it must be the same as used when registering the Paysafecard account. > This field is mandatory for natural persons.
     *
     * @return self
     */
    public function setDateOfBirth($date_of_birth)
    {
        if (is_null($date_of_birth)) {
            throw new \InvalidArgumentException('non-nullable date_of_birth cannot be null');
        }
        $this->container['date_of_birth'] = $date_of_birth;

        return $this;
    }

    /**
     * Gets entity_type
     *
     * @return string
     */
    public function getEntityType()
    {
        return $this->container['entity_type'];
    }

    /**
     * Sets entity_type
     *
     * @param string $entity_type The type of the entity the payout is processed for.
     *
     * @return self
     */
    public function setEntityType($entity_type)
    {
        if (is_null($entity_type)) {
            throw new \InvalidArgumentException('non-nullable entity_type cannot be null');
        }
        $allowedValues = $this->getEntityTypeAllowableValues();
        if (!in_array($entity_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'entity_type', must be one of '%s'",
                    $entity_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['entity_type'] = $entity_type;

        return $this;
    }

    /**
     * Gets fraud_offset
     *
     * @return int|null
     */
    public function getFraudOffset()
    {
        return $this->container['fraud_offset'];
    }

    /**
     * Sets fraud_offset
     *
     * @param int|null $fraud_offset An integer value that is added to the normal fraud score. The value can be either positive or negative.
     *
     * @return self
     */
    public function setFraudOffset($fraud_offset)
    {
        // Do nothing for nullable integers
        $this->container['fraud_offset'] = $fraud_offset;

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
     * Gets nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->container['nationality'];
    }

    /**
     * Sets nationality
     *
     * @param string $nationality The shopper's nationality.  A valid value is an ISO 2-character country code (e.g. 'NL').
     *
     * @return self
     */
    public function setNationality($nationality)
    {
        if (is_null($nationality)) {
            throw new \InvalidArgumentException('non-nullable nationality cannot be null');
        }
        $this->container['nationality'] = $nationality;

        return $this;
    }

    /**
     * Gets recurring
     *
     * @return \Adyen\Model\Payout\Recurring
     */
    public function getRecurring()
    {
        return $this->container['recurring'];
    }

    /**
     * Sets recurring
     *
     * @param \Adyen\Model\Payout\Recurring $recurring recurring
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
     * @param string $reference The merchant reference for this payment. This reference will be used in all communication to the merchant about the status of the payout. Although it is a good idea to make sure it is unique, this is not a requirement.
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
     * Gets selected_brand
     *
     * @return string|null
     */
    public function getSelectedBrand()
    {
        return $this->container['selected_brand'];
    }

    /**
     * Sets selected_brand
     *
     * @param string|null $selected_brand The name of the brand to make a payout to.  For Paysafecard it must be set to `paysafecard`.
     *
     * @return self
     */
    public function setSelectedBrand($selected_brand)
    {
        if (is_null($selected_brand)) {
            throw new \InvalidArgumentException('non-nullable selected_brand cannot be null');
        }
        $this->container['selected_brand'] = $selected_brand;

        return $this;
    }

    /**
     * Gets shopper_email
     *
     * @return string
     */
    public function getShopperEmail()
    {
        return $this->container['shopper_email'];
    }

    /**
     * Sets shopper_email
     *
     * @param string $shopper_email The shopper's email address.
     *
     * @return self
     */
    public function setShopperEmail($shopper_email)
    {
        if (is_null($shopper_email)) {
            throw new \InvalidArgumentException('non-nullable shopper_email cannot be null');
        }
        $this->container['shopper_email'] = $shopper_email;

        return $this;
    }

    /**
     * Gets shopper_name
     *
     * @return \Adyen\Model\Payout\Name|null
     */
    public function getShopperName()
    {
        return $this->container['shopper_name'];
    }

    /**
     * Sets shopper_name
     *
     * @param \Adyen\Model\Payout\Name|null $shopper_name shopper_name
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
     * Gets shopper_reference
     *
     * @return string
     */
    public function getShopperReference()
    {
        return $this->container['shopper_reference'];
    }

    /**
     * Sets shopper_reference
     *
     * @param string $shopper_reference The shopper's reference for the payment transaction.
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
     * Gets shopper_statement
     *
     * @return string|null
     */
    public function getShopperStatement()
    {
        return $this->container['shopper_statement'];
    }

    /**
     * Sets shopper_statement
     *
     * @param string|null $shopper_statement The description of this payout. This description is shown on the bank statement of the shopper (if this is supported by the chosen payment method).
     *
     * @return self
     */
    public function setShopperStatement($shopper_statement)
    {
        if (is_null($shopper_statement)) {
            throw new \InvalidArgumentException('non-nullable shopper_statement cannot be null');
        }
        $this->container['shopper_statement'] = $shopper_statement;

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
     * @param string|null $social_security_number The shopper's social security number.
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
     * Gets telephone_number
     *
     * @return string|null
     */
    public function getTelephoneNumber()
    {
        return $this->container['telephone_number'];
    }

    /**
     * Sets telephone_number
     *
     * @param string|null $telephone_number The shopper's phone number.
     *
     * @return self
     */
    public function setTelephoneNumber($telephone_number)
    {
        if (is_null($telephone_number)) {
            throw new \InvalidArgumentException('non-nullable telephone_number cannot be null');
        }
        $this->container['telephone_number'] = $telephone_number;

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