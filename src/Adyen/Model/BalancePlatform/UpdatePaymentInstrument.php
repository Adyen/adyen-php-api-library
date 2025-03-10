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
 * UpdatePaymentInstrument Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class UpdatePaymentInstrument implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'UpdatePaymentInstrument';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'additionalBankAccountIdentifications' => '\Adyen\Model\BalancePlatform\PaymentInstrumentAdditionalBankAccountIdentificationsInner[]',
        'balanceAccountId' => 'string',
        'bankAccount' => '\Adyen\Model\BalancePlatform\BankAccountDetails',
        'card' => '\Adyen\Model\BalancePlatform\Card',
        'description' => 'string',
        'id' => 'string',
        'issuingCountryCode' => 'string',
        'paymentInstrumentGroupId' => 'string',
        'reference' => 'string',
        'status' => 'string',
        'statusComment' => 'string',
        'statusReason' => 'string',
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
        'additionalBankAccountIdentifications' => null,
        'balanceAccountId' => null,
        'bankAccount' => null,
        'card' => null,
        'description' => null,
        'id' => null,
        'issuingCountryCode' => null,
        'paymentInstrumentGroupId' => null,
        'reference' => null,
        'status' => null,
        'statusComment' => null,
        'statusReason' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'additionalBankAccountIdentifications' => false,
        'balanceAccountId' => false,
        'bankAccount' => false,
        'card' => false,
        'description' => false,
        'id' => false,
        'issuingCountryCode' => false,
        'paymentInstrumentGroupId' => false,
        'reference' => false,
        'status' => false,
        'statusComment' => false,
        'statusReason' => false,
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
        'additionalBankAccountIdentifications' => 'additionalBankAccountIdentifications',
        'balanceAccountId' => 'balanceAccountId',
        'bankAccount' => 'bankAccount',
        'card' => 'card',
        'description' => 'description',
        'id' => 'id',
        'issuingCountryCode' => 'issuingCountryCode',
        'paymentInstrumentGroupId' => 'paymentInstrumentGroupId',
        'reference' => 'reference',
        'status' => 'status',
        'statusComment' => 'statusComment',
        'statusReason' => 'statusReason',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'additionalBankAccountIdentifications' => 'setAdditionalBankAccountIdentifications',
        'balanceAccountId' => 'setBalanceAccountId',
        'bankAccount' => 'setBankAccount',
        'card' => 'setCard',
        'description' => 'setDescription',
        'id' => 'setId',
        'issuingCountryCode' => 'setIssuingCountryCode',
        'paymentInstrumentGroupId' => 'setPaymentInstrumentGroupId',
        'reference' => 'setReference',
        'status' => 'setStatus',
        'statusComment' => 'setStatusComment',
        'statusReason' => 'setStatusReason',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'additionalBankAccountIdentifications' => 'getAdditionalBankAccountIdentifications',
        'balanceAccountId' => 'getBalanceAccountId',
        'bankAccount' => 'getBankAccount',
        'card' => 'getCard',
        'description' => 'getDescription',
        'id' => 'getId',
        'issuingCountryCode' => 'getIssuingCountryCode',
        'paymentInstrumentGroupId' => 'getPaymentInstrumentGroupId',
        'reference' => 'getReference',
        'status' => 'getStatus',
        'statusComment' => 'getStatusComment',
        'statusReason' => 'getStatusReason',
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

    public const STATUS_ACTIVE = 'active';
    public const STATUS_CLOSED = 'closed';
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_SUSPENDED = 'suspended';
    public const STATUS_REASON_ACCOUNT_CLOSURE = 'accountClosure';
    public const STATUS_REASON_DAMAGED = 'damaged';
    public const STATUS_REASON_END_OF_LIFE = 'endOfLife';
    public const STATUS_REASON_EXPIRED = 'expired';
    public const STATUS_REASON_LOST = 'lost';
    public const STATUS_REASON_OTHER = 'other';
    public const STATUS_REASON_STOLEN = 'stolen';
    public const STATUS_REASON_SUSPECTED_FRAUD = 'suspectedFraud';
    public const STATUS_REASON_TRANSACTION_RULE = 'transactionRule';
    public const TYPE_BANK_ACCOUNT = 'bankAccount';
    public const TYPE_CARD = 'card';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_CLOSED,
            self::STATUS_INACTIVE,
            self::STATUS_SUSPENDED,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusReasonAllowableValues()
    {
        return [
            self::STATUS_REASON_ACCOUNT_CLOSURE,
            self::STATUS_REASON_DAMAGED,
            self::STATUS_REASON_END_OF_LIFE,
            self::STATUS_REASON_EXPIRED,
            self::STATUS_REASON_LOST,
            self::STATUS_REASON_OTHER,
            self::STATUS_REASON_STOLEN,
            self::STATUS_REASON_SUSPECTED_FRAUD,
            self::STATUS_REASON_TRANSACTION_RULE,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_BANK_ACCOUNT,
            self::TYPE_CARD,
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
        $this->setIfExists('additionalBankAccountIdentifications', $data ?? [], null);
        $this->setIfExists('balanceAccountId', $data ?? [], null);
        $this->setIfExists('bankAccount', $data ?? [], null);
        $this->setIfExists('card', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('issuingCountryCode', $data ?? [], null);
        $this->setIfExists('paymentInstrumentGroupId', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('statusComment', $data ?? [], null);
        $this->setIfExists('statusReason', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
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

        if ($this->container['balanceAccountId'] === null) {
            $invalidProperties[] = "'balanceAccountId' can't be null";
        }
        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['issuingCountryCode'] === null) {
            $invalidProperties[] = "'issuingCountryCode' can't be null";
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getStatusReasonAllowableValues();
        if (!is_null($this->container['statusReason']) && !in_array($this->container['statusReason'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'statusReason', must be one of '%s'",
                $this->container['statusReason'],
                implode("', '", $allowedValues)
            );
        }

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
     * Gets additionalBankAccountIdentifications
     *
     * @return \Adyen\Model\BalancePlatform\PaymentInstrumentAdditionalBankAccountIdentificationsInner[]|null
     * @deprecated since Configuration API v2. "Please use `bankAccount` object instead"
     */
    public function getAdditionalBankAccountIdentifications()
    {
        return $this->container['additionalBankAccountIdentifications'];
    }

    /**
     * Sets additionalBankAccountIdentifications
     *
     * @param \Adyen\Model\BalancePlatform\PaymentInstrumentAdditionalBankAccountIdentificationsInner[]|null $additionalBankAccountIdentifications Contains optional, additional business account details. Returned when you create a payment instrument with `type` **bankAccount**.
     *
     * @return self
     * @deprecated since Configuration API v2. "Please use `bankAccount` object instead"
     */
    public function setAdditionalBankAccountIdentifications($additionalBankAccountIdentifications)
    {
        $this->container['additionalBankAccountIdentifications'] = $additionalBankAccountIdentifications;

        return $this;
    }

    /**
     * Gets balanceAccountId
     *
     * @return string
     */
    public function getBalanceAccountId()
    {
        return $this->container['balanceAccountId'];
    }

    /**
     * Sets balanceAccountId
     *
     * @param string $balanceAccountId The unique identifier of the [balance account](https://docs.adyen.com/api-explorer/#/balanceplatform/v1/post/balanceAccounts__resParam_id) associated with the payment instrument.
     *
     * @return self
     */
    public function setBalanceAccountId($balanceAccountId)
    {
        $this->container['balanceAccountId'] = $balanceAccountId;

        return $this;
    }

    /**
     * Gets bankAccount
     *
     * @return \Adyen\Model\BalancePlatform\BankAccountDetails|null
     */
    public function getBankAccount()
    {
        return $this->container['bankAccount'];
    }

    /**
     * Sets bankAccount
     *
     * @param \Adyen\Model\BalancePlatform\BankAccountDetails|null $bankAccount bankAccount
     *
     * @return self
     */
    public function setBankAccount($bankAccount)
    {
        $this->container['bankAccount'] = $bankAccount;

        return $this;
    }

    /**
     * Gets card
     *
     * @return \Adyen\Model\BalancePlatform\Card|null
     */
    public function getCard()
    {
        return $this->container['card'];
    }

    /**
     * Sets card
     *
     * @param \Adyen\Model\BalancePlatform\Card|null $card card
     *
     * @return self
     */
    public function setCard($card)
    {
        $this->container['card'] = $card;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description Your description for the payment instrument, maximum 300 characters.
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id The unique identifier of the payment instrument.
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets issuingCountryCode
     *
     * @return string
     */
    public function getIssuingCountryCode()
    {
        return $this->container['issuingCountryCode'];
    }

    /**
     * Sets issuingCountryCode
     *
     * @param string $issuingCountryCode The two-character [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) country code where the payment instrument is issued. For example, **NL** or **US**.
     *
     * @return self
     */
    public function setIssuingCountryCode($issuingCountryCode)
    {
        $this->container['issuingCountryCode'] = $issuingCountryCode;

        return $this;
    }

    /**
     * Gets paymentInstrumentGroupId
     *
     * @return string|null
     */
    public function getPaymentInstrumentGroupId()
    {
        return $this->container['paymentInstrumentGroupId'];
    }

    /**
     * Sets paymentInstrumentGroupId
     *
     * @param string|null $paymentInstrumentGroupId The unique identifier of the [payment instrument group](https://docs.adyen.com/api-explorer/#/balanceplatform/v1/post/paymentInstrumentGroups__resParam_id) to which the payment instrument belongs.
     *
     * @return self
     */
    public function setPaymentInstrumentGroupId($paymentInstrumentGroupId)
    {
        $this->container['paymentInstrumentGroupId'] = $paymentInstrumentGroupId;

        return $this;
    }

    /**
     * Gets reference
     *
     * @return string|null
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string|null $reference Your reference for the payment instrument, maximum 150 characters.
     *
     * @return self
     */
    public function setReference($reference)
    {
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status The status of the payment instrument. If a status is not specified when creating a payment instrument, it is set to **active** by default. However, there can be exceptions for cards based on the `card.formFactor` and the `issuingCountryCode`. For example, when issuing physical cards in the US, the default status is **inactive**.  Possible values:    * **active**:  The payment instrument is active and can be used to make payments.    * **inactive**: The payment instrument is inactive and cannot be used to make payments.    * **suspended**: The payment instrument is suspended, either because it was stolen or lost.    * **closed**: The payment instrument is permanently closed. This action cannot be undone.
     *
     * @return self
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status', must be one of '%s'",
                    $status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets statusComment
     *
     * @return string|null
     */
    public function getStatusComment()
    {
        return $this->container['statusComment'];
    }

    /**
     * Sets statusComment
     *
     * @param string|null $statusComment Comment for the status of the payment instrument.  Required if `statusReason` is **other**.
     *
     * @return self
     */
    public function setStatusComment($statusComment)
    {
        $this->container['statusComment'] = $statusComment;

        return $this;
    }

    /**
     * Gets statusReason
     *
     * @return string|null
     */
    public function getStatusReason()
    {
        return $this->container['statusReason'];
    }

    /**
     * Sets statusReason
     *
     * @param string|null $statusReason The reason for the status of the payment instrument.  Possible values: **accountClosure**, **damaged**, **endOfLife**, **expired**, **lost**, **stolen**, **suspectedFraud**, **transactionRule**, **other**. If the reason is **other**, you must also send the `statusComment` parameter describing the status change.
     *
     * @return self
     */
    public function setStatusReason($statusReason)
    {
        $allowedValues = $this->getStatusReasonAllowableValues();
        if (!in_array($statusReason, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'statusReason', must be one of '%s'",
                    $statusReason,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['statusReason'] = $statusReason;

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
     * @param string $type The type of payment instrument.  Possible values: **card**, **bankAccount**.
     *
     * @return self
     */
    public function setType($type)
    {
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
