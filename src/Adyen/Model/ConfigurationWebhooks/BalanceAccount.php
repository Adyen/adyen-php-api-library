<?php

/**
 * Configuration webhooks
 *
 * The version of the OpenAPI document: 1
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\ConfigurationWebhooks;

use \ArrayAccess;
use Adyen\Model\ConfigurationWebhooks\ObjectSerializer;

/**
 * BalanceAccount Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class BalanceAccount implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'BalanceAccount';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'accountHolderId' => 'string',
        'balances' => '\Adyen\Model\ConfigurationWebhooks\Balance[]',
        'defaultCurrencyCode' => 'string',
        'description' => 'string',
        'id' => 'string',
        'metadata' => 'array<string,string>',
        'migratedAccountCode' => 'string',
        'paymentInstruments' => '\Adyen\Model\ConfigurationWebhooks\PaymentInstrumentReference[]',
        'platformPaymentConfiguration' => '\Adyen\Model\ConfigurationWebhooks\PlatformPaymentConfiguration',
        'reference' => 'string',
        'status' => 'string',
        'timeZone' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'accountHolderId' => null,
        'balances' => null,
        'defaultCurrencyCode' => null,
        'description' => null,
        'id' => null,
        'metadata' => null,
        'migratedAccountCode' => null,
        'paymentInstruments' => null,
        'platformPaymentConfiguration' => null,
        'reference' => null,
        'status' => null,
        'timeZone' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'accountHolderId' => false,
        'balances' => false,
        'defaultCurrencyCode' => false,
        'description' => false,
        'id' => false,
        'metadata' => false,
        'migratedAccountCode' => false,
        'paymentInstruments' => false,
        'platformPaymentConfiguration' => false,
        'reference' => false,
        'status' => false,
        'timeZone' => false
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
        'accountHolderId' => 'accountHolderId',
        'balances' => 'balances',
        'defaultCurrencyCode' => 'defaultCurrencyCode',
        'description' => 'description',
        'id' => 'id',
        'metadata' => 'metadata',
        'migratedAccountCode' => 'migratedAccountCode',
        'paymentInstruments' => 'paymentInstruments',
        'platformPaymentConfiguration' => 'platformPaymentConfiguration',
        'reference' => 'reference',
        'status' => 'status',
        'timeZone' => 'timeZone'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accountHolderId' => 'setAccountHolderId',
        'balances' => 'setBalances',
        'defaultCurrencyCode' => 'setDefaultCurrencyCode',
        'description' => 'setDescription',
        'id' => 'setId',
        'metadata' => 'setMetadata',
        'migratedAccountCode' => 'setMigratedAccountCode',
        'paymentInstruments' => 'setPaymentInstruments',
        'platformPaymentConfiguration' => 'setPlatformPaymentConfiguration',
        'reference' => 'setReference',
        'status' => 'setStatus',
        'timeZone' => 'setTimeZone'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accountHolderId' => 'getAccountHolderId',
        'balances' => 'getBalances',
        'defaultCurrencyCode' => 'getDefaultCurrencyCode',
        'description' => 'getDescription',
        'id' => 'getId',
        'metadata' => 'getMetadata',
        'migratedAccountCode' => 'getMigratedAccountCode',
        'paymentInstruments' => 'getPaymentInstruments',
        'platformPaymentConfiguration' => 'getPlatformPaymentConfiguration',
        'reference' => 'getReference',
        'status' => 'getStatus',
        'timeZone' => 'getTimeZone'
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

    public const STATUS_ACTIVE = 'Active';
    public const STATUS_CLOSED = 'Closed';
    public const STATUS_INACTIVE = 'Inactive';
    public const STATUS_SUSPENDED = 'Suspended';

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
        $this->setIfExists('accountHolderId', $data ?? [], null);
        $this->setIfExists('balances', $data ?? [], null);
        $this->setIfExists('defaultCurrencyCode', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('metadata', $data ?? [], null);
        $this->setIfExists('migratedAccountCode', $data ?? [], null);
        $this->setIfExists('paymentInstruments', $data ?? [], null);
        $this->setIfExists('platformPaymentConfiguration', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('timeZone', $data ?? [], null);
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

        if ($this->container['accountHolderId'] === null) {
            $invalidProperties[] = "'accountHolderId' can't be null";
        }
        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
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
     * Gets accountHolderId
     *
     * @return string
     */
    public function getAccountHolderId()
    {
        return $this->container['accountHolderId'];
    }

    /**
     * Sets accountHolderId
     *
     * @param string $accountHolderId The unique identifier of the [account holder](https://docs.adyen.com/api-explorer/#/balanceplatform/latest/post/accountHolders__resParam_id) associated with the balance account.
     *
     * @return self
     */
    public function setAccountHolderId($accountHolderId)
    {
        if (is_null($accountHolderId)) {
            throw new \InvalidArgumentException('non-nullable accountHolderId cannot be null');
        }
        $this->container['accountHolderId'] = $accountHolderId;

        return $this;
    }

    /**
     * Gets balances
     *
     * @return \Adyen\Model\ConfigurationWebhooks\Balance[]|null
     */
    public function getBalances()
    {
        return $this->container['balances'];
    }

    /**
     * Sets balances
     *
     * @param \Adyen\Model\ConfigurationWebhooks\Balance[]|null $balances List of balances with the amount and currency.
     *
     * @return self
     */
    public function setBalances($balances)
    {
        if (is_null($balances)) {
            throw new \InvalidArgumentException('non-nullable balances cannot be null');
        }
        $this->container['balances'] = $balances;

        return $this;
    }

    /**
     * Gets defaultCurrencyCode
     *
     * @return string|null
     */
    public function getDefaultCurrencyCode()
    {
        return $this->container['defaultCurrencyCode'];
    }

    /**
     * Sets defaultCurrencyCode
     *
     * @param string|null $defaultCurrencyCode The default three-character [ISO currency code](https://docs.adyen.com/development-resources/currency-codes) of the balance account. The default value is **EUR**. > After a balance account is created, you cannot change its default currency.
     *
     * @return self
     */
    public function setDefaultCurrencyCode($defaultCurrencyCode)
    {
        if (is_null($defaultCurrencyCode)) {
            throw new \InvalidArgumentException('non-nullable defaultCurrencyCode cannot be null');
        }
        $this->container['defaultCurrencyCode'] = $defaultCurrencyCode;

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
     * @param string|null $description A human-readable description of the balance account, maximum 300 characters. You can use this parameter to distinguish between multiple balance accounts under an account holder.
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
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
     * @param string $id The unique identifier of the balance account.
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets metadata
     *
     * @return array<string,string>|null
     */
    public function getMetadata()
    {
        return $this->container['metadata'];
    }

    /**
     * Sets metadata
     *
     * @param array<string,string>|null $metadata A set of key and value pairs for general use. The keys do not have specific names and may be used for storing miscellaneous data as desired. > Note that during an update of metadata, the omission of existing key-value pairs will result in the deletion of those key-value pairs.
     *
     * @return self
     */
    public function setMetadata($metadata)
    {
        if (is_null($metadata)) {
            throw new \InvalidArgumentException('non-nullable metadata cannot be null');
        }
        $this->container['metadata'] = $metadata;

        return $this;
    }

    /**
     * Gets migratedAccountCode
     *
     * @return string|null
     */
    public function getMigratedAccountCode()
    {
        return $this->container['migratedAccountCode'];
    }

    /**
     * Sets migratedAccountCode
     *
     * @param string|null $migratedAccountCode The unique identifier of the account of the migrated account holder in the classic integration.
     *
     * @return self
     */
    public function setMigratedAccountCode($migratedAccountCode)
    {
        if (is_null($migratedAccountCode)) {
            throw new \InvalidArgumentException('non-nullable migratedAccountCode cannot be null');
        }
        $this->container['migratedAccountCode'] = $migratedAccountCode;

        return $this;
    }

    /**
     * Gets paymentInstruments
     *
     * @return \Adyen\Model\ConfigurationWebhooks\PaymentInstrumentReference[]|null
     */
    public function getPaymentInstruments()
    {
        return $this->container['paymentInstruments'];
    }

    /**
     * Sets paymentInstruments
     *
     * @param \Adyen\Model\ConfigurationWebhooks\PaymentInstrumentReference[]|null $paymentInstruments List of [payment instruments](https://docs.adyen.com/api-explorer/#/balanceplatform/latest/post/paymentInstruments) associated with the balance account.
     *
     * @return self
     */
    public function setPaymentInstruments($paymentInstruments)
    {
        if (is_null($paymentInstruments)) {
            throw new \InvalidArgumentException('non-nullable paymentInstruments cannot be null');
        }
        $this->container['paymentInstruments'] = $paymentInstruments;

        return $this;
    }

    /**
     * Gets platformPaymentConfiguration
     *
     * @return \Adyen\Model\ConfigurationWebhooks\PlatformPaymentConfiguration|null
     */
    public function getPlatformPaymentConfiguration()
    {
        return $this->container['platformPaymentConfiguration'];
    }

    /**
     * Sets platformPaymentConfiguration
     *
     * @param \Adyen\Model\ConfigurationWebhooks\PlatformPaymentConfiguration|null $platformPaymentConfiguration platformPaymentConfiguration
     *
     * @return self
     */
    public function setPlatformPaymentConfiguration($platformPaymentConfiguration)
    {
        if (is_null($platformPaymentConfiguration)) {
            throw new \InvalidArgumentException('non-nullable platformPaymentConfiguration cannot be null');
        }
        $this->container['platformPaymentConfiguration'] = $platformPaymentConfiguration;

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
     * @param string|null $reference Your reference for the balance account, maximum 150 characters.
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
     * @param string|null $status The status of the balance account, set to **Active** by default.
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
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
     * Gets timeZone
     *
     * @return string|null
     */
    public function getTimeZone()
    {
        return $this->container['timeZone'];
    }

    /**
     * Sets timeZone
     *
     * @param string|null $timeZone The time zone of the balance account. For example, **Europe/Amsterdam**. Defaults to the time zone of the account holder if no time zone is set. For possible values, see the [list of time zone codes](https://en.wikipedia.org/wiki/List_of_tz_database_time_zones).
     *
     * @return self
     */
    public function setTimeZone($timeZone)
    {
        if (is_null($timeZone)) {
            throw new \InvalidArgumentException('non-nullable timeZone cannot be null');
        }
        $this->container['timeZone'] = $timeZone;

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
