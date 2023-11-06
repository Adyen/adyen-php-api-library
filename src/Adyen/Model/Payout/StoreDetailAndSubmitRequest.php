<?php

/**
 * Adyen Payout API
 *
 * The version of the OpenAPI document: 68
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
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
        'additionalData' => 'array<string,string>',
        'amount' => '\Adyen\Model\Payout\Amount',
        'bank' => '\Adyen\Model\Payout\BankAccount',
        'billingAddress' => '\Adyen\Model\Payout\Address',
        'card' => '\Adyen\Model\Payout\Card',
        'dateOfBirth' => '\DateTime',
        'entityType' => 'string',
        'fraudOffset' => 'int',
        'merchantAccount' => 'string',
        'nationality' => 'string',
        'recurring' => '\Adyen\Model\Payout\Recurring',
        'reference' => 'string',
        'selectedBrand' => 'string',
        'shopperEmail' => 'string',
        'shopperName' => '\Adyen\Model\Payout\Name',
        'shopperReference' => 'string',
        'shopperStatement' => 'string',
        'socialSecurityNumber' => 'string',
        'telephoneNumber' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'additionalData' => null,
        'amount' => null,
        'bank' => null,
        'billingAddress' => null,
        'card' => null,
        'dateOfBirth' => 'date',
        'entityType' => null,
        'fraudOffset' => 'int32',
        'merchantAccount' => null,
        'nationality' => null,
        'recurring' => null,
        'reference' => null,
        'selectedBrand' => null,
        'shopperEmail' => null,
        'shopperName' => null,
        'shopperReference' => null,
        'shopperStatement' => null,
        'socialSecurityNumber' => null,
        'telephoneNumber' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'additionalData' => false,
        'amount' => false,
        'bank' => false,
        'billingAddress' => false,
        'card' => false,
        'dateOfBirth' => false,
        'entityType' => false,
        'fraudOffset' => true,
        'merchantAccount' => false,
        'nationality' => false,
        'recurring' => false,
        'reference' => false,
        'selectedBrand' => false,
        'shopperEmail' => false,
        'shopperName' => false,
        'shopperReference' => false,
        'shopperStatement' => false,
        'socialSecurityNumber' => false,
        'telephoneNumber' => false
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
        'additionalData' => 'additionalData',
        'amount' => 'amount',
        'bank' => 'bank',
        'billingAddress' => 'billingAddress',
        'card' => 'card',
        'dateOfBirth' => 'dateOfBirth',
        'entityType' => 'entityType',
        'fraudOffset' => 'fraudOffset',
        'merchantAccount' => 'merchantAccount',
        'nationality' => 'nationality',
        'recurring' => 'recurring',
        'reference' => 'reference',
        'selectedBrand' => 'selectedBrand',
        'shopperEmail' => 'shopperEmail',
        'shopperName' => 'shopperName',
        'shopperReference' => 'shopperReference',
        'shopperStatement' => 'shopperStatement',
        'socialSecurityNumber' => 'socialSecurityNumber',
        'telephoneNumber' => 'telephoneNumber'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'additionalData' => 'setAdditionalData',
        'amount' => 'setAmount',
        'bank' => 'setBank',
        'billingAddress' => 'setBillingAddress',
        'card' => 'setCard',
        'dateOfBirth' => 'setDateOfBirth',
        'entityType' => 'setEntityType',
        'fraudOffset' => 'setFraudOffset',
        'merchantAccount' => 'setMerchantAccount',
        'nationality' => 'setNationality',
        'recurring' => 'setRecurring',
        'reference' => 'setReference',
        'selectedBrand' => 'setSelectedBrand',
        'shopperEmail' => 'setShopperEmail',
        'shopperName' => 'setShopperName',
        'shopperReference' => 'setShopperReference',
        'shopperStatement' => 'setShopperStatement',
        'socialSecurityNumber' => 'setSocialSecurityNumber',
        'telephoneNumber' => 'setTelephoneNumber'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'additionalData' => 'getAdditionalData',
        'amount' => 'getAmount',
        'bank' => 'getBank',
        'billingAddress' => 'getBillingAddress',
        'card' => 'getCard',
        'dateOfBirth' => 'getDateOfBirth',
        'entityType' => 'getEntityType',
        'fraudOffset' => 'getFraudOffset',
        'merchantAccount' => 'getMerchantAccount',
        'nationality' => 'getNationality',
        'recurring' => 'getRecurring',
        'reference' => 'getReference',
        'selectedBrand' => 'getSelectedBrand',
        'shopperEmail' => 'getShopperEmail',
        'shopperName' => 'getShopperName',
        'shopperReference' => 'getShopperReference',
        'shopperStatement' => 'getShopperStatement',
        'socialSecurityNumber' => 'getSocialSecurityNumber',
        'telephoneNumber' => 'getTelephoneNumber'
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
        $this->setIfExists('additionalData', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('bank', $data ?? [], null);
        $this->setIfExists('billingAddress', $data ?? [], null);
        $this->setIfExists('card', $data ?? [], null);
        $this->setIfExists('dateOfBirth', $data ?? [], null);
        $this->setIfExists('entityType', $data ?? [], null);
        $this->setIfExists('fraudOffset', $data ?? [], null);
        $this->setIfExists('merchantAccount', $data ?? [], null);
        $this->setIfExists('nationality', $data ?? [], null);
        $this->setIfExists('recurring', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('selectedBrand', $data ?? [], null);
        $this->setIfExists('shopperEmail', $data ?? [], null);
        $this->setIfExists('shopperName', $data ?? [], null);
        $this->setIfExists('shopperReference', $data ?? [], null);
        $this->setIfExists('shopperStatement', $data ?? [], null);
        $this->setIfExists('socialSecurityNumber', $data ?? [], null);
        $this->setIfExists('telephoneNumber', $data ?? [], null);
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
        if ($this->container['dateOfBirth'] === null) {
            $invalidProperties[] = "'dateOfBirth' can't be null";
        }
        if ($this->container['entityType'] === null) {
            $invalidProperties[] = "'entityType' can't be null";
        }
        $allowedValues = $this->getEntityTypeAllowableValues();
        if (!is_null($this->container['entityType']) && !in_array($this->container['entityType'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'entityType', must be one of '%s'",
                $this->container['entityType'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['merchantAccount'] === null) {
            $invalidProperties[] = "'merchantAccount' can't be null";
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
        if ($this->container['shopperEmail'] === null) {
            $invalidProperties[] = "'shopperEmail' can't be null";
        }
        if ($this->container['shopperReference'] === null) {
            $invalidProperties[] = "'shopperReference' can't be null";
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
     * Gets additionalData
     *
     * @return array<string,string>|null
     */
    public function getAdditionalData()
    {
        return $this->container['additionalData'];
    }

    /**
     * Sets additionalData
     *
     * @param array<string,string>|null $additionalData This field contains additional data, which may be required for a particular request.
     *
     * @return self
     */
    public function setAdditionalData($additionalData)
    {
        if (is_null($additionalData)) {
            throw new \InvalidArgumentException('non-nullable additionalData cannot be null');
        }
        $this->container['additionalData'] = $additionalData;

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
     * Gets billingAddress
     *
     * @return \Adyen\Model\Payout\Address|null
     */
    public function getBillingAddress()
    {
        return $this->container['billingAddress'];
    }

    /**
     * Sets billingAddress
     *
     * @param \Adyen\Model\Payout\Address|null $billingAddress billingAddress
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
     * Gets dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->container['dateOfBirth'];
    }

    /**
     * Sets dateOfBirth
     *
     * @param \DateTime $dateOfBirth The date of birth. Format: [ISO-8601](https://www.w3.org/TR/NOTE-datetime); example: YYYY-MM-DD For Paysafecard it must be the same as used when registering the Paysafecard account. > This field is mandatory for natural persons.
     *
     * @return self
     */
    public function setDateOfBirth($dateOfBirth)
    {
        if (is_null($dateOfBirth)) {
            throw new \InvalidArgumentException('non-nullable dateOfBirth cannot be null');
        }
        $this->container['dateOfBirth'] = $dateOfBirth;

        return $this;
    }

    /**
     * Gets entityType
     *
     * @return string
     */
    public function getEntityType()
    {
        return $this->container['entityType'];
    }

    /**
     * Sets entityType
     *
     * @param string $entityType The type of the entity the payout is processed for.
     *
     * @return self
     */
    public function setEntityType($entityType)
    {
        if (is_null($entityType)) {
            throw new \InvalidArgumentException('non-nullable entityType cannot be null');
        }
        $allowedValues = $this->getEntityTypeAllowableValues();
        if (!in_array($entityType, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'entityType', must be one of '%s'",
                    $entityType,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['entityType'] = $entityType;

        return $this;
    }

    /**
     * Gets fraudOffset
     *
     * @return int|null
     */
    public function getFraudOffset()
    {
        return $this->container['fraudOffset'];
    }

    /**
     * Sets fraudOffset
     *
     * @param int|null $fraudOffset An integer value that is added to the normal fraud score. The value can be either positive or negative.
     *
     * @return self
     */
    public function setFraudOffset($fraudOffset)
    {
        // Do nothing for nullable integers
        $this->container['fraudOffset'] = $fraudOffset;

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
     * Gets selectedBrand
     *
     * @return string|null
     */
    public function getSelectedBrand()
    {
        return $this->container['selectedBrand'];
    }

    /**
     * Sets selectedBrand
     *
     * @param string|null $selectedBrand The name of the brand to make a payout to.  For Paysafecard it must be set to `paysafecard`.
     *
     * @return self
     */
    public function setSelectedBrand($selectedBrand)
    {
        if (is_null($selectedBrand)) {
            throw new \InvalidArgumentException('non-nullable selectedBrand cannot be null');
        }
        $this->container['selectedBrand'] = $selectedBrand;

        return $this;
    }

    /**
     * Gets shopperEmail
     *
     * @return string
     */
    public function getShopperEmail()
    {
        return $this->container['shopperEmail'];
    }

    /**
     * Sets shopperEmail
     *
     * @param string $shopperEmail The shopper's email address.
     *
     * @return self
     */
    public function setShopperEmail($shopperEmail)
    {
        if (is_null($shopperEmail)) {
            throw new \InvalidArgumentException('non-nullable shopperEmail cannot be null');
        }
        $this->container['shopperEmail'] = $shopperEmail;

        return $this;
    }

    /**
     * Gets shopperName
     *
     * @return \Adyen\Model\Payout\Name|null
     */
    public function getShopperName()
    {
        return $this->container['shopperName'];
    }

    /**
     * Sets shopperName
     *
     * @param \Adyen\Model\Payout\Name|null $shopperName shopperName
     *
     * @return self
     */
    public function setShopperName($shopperName)
    {
        if (is_null($shopperName)) {
            throw new \InvalidArgumentException('non-nullable shopperName cannot be null');
        }
        $this->container['shopperName'] = $shopperName;

        return $this;
    }

    /**
     * Gets shopperReference
     *
     * @return string
     */
    public function getShopperReference()
    {
        return $this->container['shopperReference'];
    }

    /**
     * Sets shopperReference
     *
     * @param string $shopperReference The shopper's reference for the payment transaction.
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
     * Gets shopperStatement
     *
     * @return string|null
     */
    public function getShopperStatement()
    {
        return $this->container['shopperStatement'];
    }

    /**
     * Sets shopperStatement
     *
     * @param string|null $shopperStatement The description of this payout. This description is shown on the bank statement of the shopper (if this is supported by the chosen payment method).
     *
     * @return self
     */
    public function setShopperStatement($shopperStatement)
    {
        if (is_null($shopperStatement)) {
            throw new \InvalidArgumentException('non-nullable shopperStatement cannot be null');
        }
        $this->container['shopperStatement'] = $shopperStatement;

        return $this;
    }

    /**
     * Gets socialSecurityNumber
     *
     * @return string|null
     */
    public function getSocialSecurityNumber()
    {
        return $this->container['socialSecurityNumber'];
    }

    /**
     * Sets socialSecurityNumber
     *
     * @param string|null $socialSecurityNumber The shopper's social security number.
     *
     * @return self
     */
    public function setSocialSecurityNumber($socialSecurityNumber)
    {
        if (is_null($socialSecurityNumber)) {
            throw new \InvalidArgumentException('non-nullable socialSecurityNumber cannot be null');
        }
        $this->container['socialSecurityNumber'] = $socialSecurityNumber;

        return $this;
    }

    /**
     * Gets telephoneNumber
     *
     * @return string|null
     */
    public function getTelephoneNumber()
    {
        return $this->container['telephoneNumber'];
    }

    /**
     * Sets telephoneNumber
     *
     * @param string|null $telephoneNumber The shopper's phone number.
     *
     * @return self
     */
    public function setTelephoneNumber($telephoneNumber)
    {
        if (is_null($telephoneNumber)) {
            throw new \InvalidArgumentException('non-nullable telephoneNumber cannot be null');
        }
        $this->container['telephoneNumber'] = $telephoneNumber;

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
