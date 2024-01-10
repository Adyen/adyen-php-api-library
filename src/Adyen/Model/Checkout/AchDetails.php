<?php

/**
 * Adyen Checkout API
 *
 * The version of the OpenAPI document: 71
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

/**
 * AchDetails Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AchDetails implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AchDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'bankAccountNumber' => 'string',
        'bankAccountType' => 'string',
        'bankLocationId' => 'string',
        'checkoutAttemptId' => 'string',
        'encryptedBankAccountNumber' => 'string',
        'encryptedBankLocationId' => 'string',
        'ownerName' => 'string',
        'recurringDetailReference' => 'string',
        'storedPaymentMethodId' => 'string',
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
        'bankAccountNumber' => null,
        'bankAccountType' => null,
        'bankLocationId' => null,
        'checkoutAttemptId' => null,
        'encryptedBankAccountNumber' => null,
        'encryptedBankLocationId' => null,
        'ownerName' => null,
        'recurringDetailReference' => null,
        'storedPaymentMethodId' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'bankAccountNumber' => false,
        'bankAccountType' => false,
        'bankLocationId' => false,
        'checkoutAttemptId' => false,
        'encryptedBankAccountNumber' => false,
        'encryptedBankLocationId' => false,
        'ownerName' => false,
        'recurringDetailReference' => false,
        'storedPaymentMethodId' => false,
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
        'bankAccountNumber' => 'bankAccountNumber',
        'bankAccountType' => 'bankAccountType',
        'bankLocationId' => 'bankLocationId',
        'checkoutAttemptId' => 'checkoutAttemptId',
        'encryptedBankAccountNumber' => 'encryptedBankAccountNumber',
        'encryptedBankLocationId' => 'encryptedBankLocationId',
        'ownerName' => 'ownerName',
        'recurringDetailReference' => 'recurringDetailReference',
        'storedPaymentMethodId' => 'storedPaymentMethodId',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'bankAccountNumber' => 'setBankAccountNumber',
        'bankAccountType' => 'setBankAccountType',
        'bankLocationId' => 'setBankLocationId',
        'checkoutAttemptId' => 'setCheckoutAttemptId',
        'encryptedBankAccountNumber' => 'setEncryptedBankAccountNumber',
        'encryptedBankLocationId' => 'setEncryptedBankLocationId',
        'ownerName' => 'setOwnerName',
        'recurringDetailReference' => 'setRecurringDetailReference',
        'storedPaymentMethodId' => 'setStoredPaymentMethodId',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'bankAccountNumber' => 'getBankAccountNumber',
        'bankAccountType' => 'getBankAccountType',
        'bankLocationId' => 'getBankLocationId',
        'checkoutAttemptId' => 'getCheckoutAttemptId',
        'encryptedBankAccountNumber' => 'getEncryptedBankAccountNumber',
        'encryptedBankLocationId' => 'getEncryptedBankLocationId',
        'ownerName' => 'getOwnerName',
        'recurringDetailReference' => 'getRecurringDetailReference',
        'storedPaymentMethodId' => 'getStoredPaymentMethodId',
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

    public const BANK_ACCOUNT_TYPE_BALANCE = 'balance';
    public const BANK_ACCOUNT_TYPE_CHECKING = 'checking';
    public const BANK_ACCOUNT_TYPE_DEPOSIT = 'deposit';
    public const BANK_ACCOUNT_TYPE_GENERAL = 'general';
    public const BANK_ACCOUNT_TYPE_OTHER = 'other';
    public const BANK_ACCOUNT_TYPE_PAYMENT = 'payment';
    public const BANK_ACCOUNT_TYPE_SAVINGS = 'savings';
    public const TYPE_ACH = 'ach';
    public const TYPE_ACH_PLAID = 'ach_plaid';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBankAccountTypeAllowableValues()
    {
        return [
            self::BANK_ACCOUNT_TYPE_BALANCE,
            self::BANK_ACCOUNT_TYPE_CHECKING,
            self::BANK_ACCOUNT_TYPE_DEPOSIT,
            self::BANK_ACCOUNT_TYPE_GENERAL,
            self::BANK_ACCOUNT_TYPE_OTHER,
            self::BANK_ACCOUNT_TYPE_PAYMENT,
            self::BANK_ACCOUNT_TYPE_SAVINGS,
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
            self::TYPE_ACH,
            self::TYPE_ACH_PLAID,
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
        $this->setIfExists('bankAccountNumber', $data ?? [], null);
        $this->setIfExists('bankAccountType', $data ?? [], null);
        $this->setIfExists('bankLocationId', $data ?? [], null);
        $this->setIfExists('checkoutAttemptId', $data ?? [], null);
        $this->setIfExists('encryptedBankAccountNumber', $data ?? [], null);
        $this->setIfExists('encryptedBankLocationId', $data ?? [], null);
        $this->setIfExists('ownerName', $data ?? [], null);
        $this->setIfExists('recurringDetailReference', $data ?? [], null);
        $this->setIfExists('storedPaymentMethodId', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], 'ach');
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

        if ($this->container['bankAccountNumber'] === null) {
            $invalidProperties[] = "'bankAccountNumber' can't be null";
        }
        $allowedValues = $this->getBankAccountTypeAllowableValues();
        if (!is_null($this->container['bankAccountType']) && !in_array($this->container['bankAccountType'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'bankAccountType', must be one of '%s'",
                $this->container['bankAccountType'],
                implode("', '", $allowedValues)
            );
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
     * Gets bankAccountNumber
     *
     * @return string
     */
    public function getBankAccountNumber()
    {
        return $this->container['bankAccountNumber'];
    }

    /**
     * Sets bankAccountNumber
     *
     * @param string $bankAccountNumber The bank account number (without separators).
     *
     * @return self
     */
    public function setBankAccountNumber($bankAccountNumber)
    {
        if (is_null($bankAccountNumber)) {
            throw new \InvalidArgumentException('non-nullable bankAccountNumber cannot be null');
        }
        $this->container['bankAccountNumber'] = $bankAccountNumber;

        return $this;
    }

    /**
     * Gets bankAccountType
     *
     * @return string|null
     */
    public function getBankAccountType()
    {
        return $this->container['bankAccountType'];
    }

    /**
     * Sets bankAccountType
     *
     * @param string|null $bankAccountType The bank account type (checking, savings...).
     *
     * @return self
     */
    public function setBankAccountType($bankAccountType)
    {
        if (is_null($bankAccountType)) {
            throw new \InvalidArgumentException('non-nullable bankAccountType cannot be null');
        }
        $allowedValues = $this->getBankAccountTypeAllowableValues();
        if (!in_array($bankAccountType, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'bankAccountType', must be one of '%s'",
                    $bankAccountType,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['bankAccountType'] = $bankAccountType;

        return $this;
    }

    /**
     * Gets bankLocationId
     *
     * @return string|null
     */
    public function getBankLocationId()
    {
        return $this->container['bankLocationId'];
    }

    /**
     * Sets bankLocationId
     *
     * @param string|null $bankLocationId The bank routing number of the account. The field value is `nil` in most cases.
     *
     * @return self
     */
    public function setBankLocationId($bankLocationId)
    {
        if (is_null($bankLocationId)) {
            throw new \InvalidArgumentException('non-nullable bankLocationId cannot be null');
        }
        $this->container['bankLocationId'] = $bankLocationId;

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
     * Gets encryptedBankAccountNumber
     *
     * @return string|null
     */
    public function getEncryptedBankAccountNumber()
    {
        return $this->container['encryptedBankAccountNumber'];
    }

    /**
     * Sets encryptedBankAccountNumber
     *
     * @param string|null $encryptedBankAccountNumber Encrypted bank account number. The bank account number (without separators).
     *
     * @return self
     */
    public function setEncryptedBankAccountNumber($encryptedBankAccountNumber)
    {
        if (is_null($encryptedBankAccountNumber)) {
            throw new \InvalidArgumentException('non-nullable encryptedBankAccountNumber cannot be null');
        }
        $this->container['encryptedBankAccountNumber'] = $encryptedBankAccountNumber;

        return $this;
    }

    /**
     * Gets encryptedBankLocationId
     *
     * @return string|null
     */
    public function getEncryptedBankLocationId()
    {
        return $this->container['encryptedBankLocationId'];
    }

    /**
     * Sets encryptedBankLocationId
     *
     * @param string|null $encryptedBankLocationId Encrypted location id. The bank routing number of the account. The field value is `nil` in most cases.
     *
     * @return self
     */
    public function setEncryptedBankLocationId($encryptedBankLocationId)
    {
        if (is_null($encryptedBankLocationId)) {
            throw new \InvalidArgumentException('non-nullable encryptedBankLocationId cannot be null');
        }
        $this->container['encryptedBankLocationId'] = $encryptedBankLocationId;

        return $this;
    }

    /**
     * Gets ownerName
     *
     * @return string|null
     */
    public function getOwnerName()
    {
        return $this->container['ownerName'];
    }

    /**
     * Sets ownerName
     *
     * @param string|null $ownerName The name of the bank account holder. If you submit a name with non-Latin characters, we automatically replace some of them with corresponding Latin characters to meet the FATF recommendations. For example: * χ12 is converted to ch12. * üA is converted to euA. * Peter Møller is converted to Peter Mller, because banks don't accept 'ø'. After replacement, the ownerName must have at least three alphanumeric characters (A-Z, a-z, 0-9), and at least one of them must be a valid Latin character (A-Z, a-z). For example: * John17 - allowed. * J17 - allowed. * 171 - not allowed. * John-7 - allowed. > If provided details don't match the required format, the response returns the error message: 203 'Invalid bank account holder name'.
     *
     * @return self
     */
    public function setOwnerName($ownerName)
    {
        if (is_null($ownerName)) {
            throw new \InvalidArgumentException('non-nullable ownerName cannot be null');
        }
        $this->container['ownerName'] = $ownerName;

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
     * Gets type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string|null $type **ach**
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
