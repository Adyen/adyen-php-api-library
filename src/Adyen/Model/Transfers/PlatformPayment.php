<?php

/**
 * Transfers API
 *
 * The version of the OpenAPI document: 4
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Transfers;

use \ArrayAccess;
use Adyen\Model\Transfers\ObjectSerializer;

/**
 * PlatformPayment Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PlatformPayment implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PlatformPayment';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'modificationMerchantReference' => 'string',
        'modificationPspReference' => 'string',
        'paymentMerchantReference' => 'string',
        'platformPaymentType' => 'string',
        'pspPaymentReference' => 'string',
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
        'modificationMerchantReference' => null,
        'modificationPspReference' => null,
        'paymentMerchantReference' => null,
        'platformPaymentType' => null,
        'pspPaymentReference' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'modificationMerchantReference' => false,
        'modificationPspReference' => false,
        'paymentMerchantReference' => false,
        'platformPaymentType' => false,
        'pspPaymentReference' => false,
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
        'modificationMerchantReference' => 'modificationMerchantReference',
        'modificationPspReference' => 'modificationPspReference',
        'paymentMerchantReference' => 'paymentMerchantReference',
        'platformPaymentType' => 'platformPaymentType',
        'pspPaymentReference' => 'pspPaymentReference',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'modificationMerchantReference' => 'setModificationMerchantReference',
        'modificationPspReference' => 'setModificationPspReference',
        'paymentMerchantReference' => 'setPaymentMerchantReference',
        'platformPaymentType' => 'setPlatformPaymentType',
        'pspPaymentReference' => 'setPspPaymentReference',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'modificationMerchantReference' => 'getModificationMerchantReference',
        'modificationPspReference' => 'getModificationPspReference',
        'paymentMerchantReference' => 'getPaymentMerchantReference',
        'platformPaymentType' => 'getPlatformPaymentType',
        'pspPaymentReference' => 'getPspPaymentReference',
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

    public const PLATFORM_PAYMENT_TYPE_ACQUIRING_FEES = 'AcquiringFees';
    public const PLATFORM_PAYMENT_TYPE_ADYEN_COMMISSION = 'AdyenCommission';
    public const PLATFORM_PAYMENT_TYPE_ADYEN_FEES = 'AdyenFees';
    public const PLATFORM_PAYMENT_TYPE_ADYEN_MARKUP = 'AdyenMarkup';
    public const PLATFORM_PAYMENT_TYPE_BALANCE_ACCOUNT = 'BalanceAccount';
    public const PLATFORM_PAYMENT_TYPE_COMMISSION = 'Commission';
    public const PLATFORM_PAYMENT_TYPE__DEFAULT = 'Default';
    public const PLATFORM_PAYMENT_TYPE_INTERCHANGE = 'Interchange';
    public const PLATFORM_PAYMENT_TYPE_PAYMENT_FEE = 'PaymentFee';
    public const PLATFORM_PAYMENT_TYPE_REMAINDER = 'Remainder';
    public const PLATFORM_PAYMENT_TYPE_SCHEME_FEE = 'SchemeFee';
    public const PLATFORM_PAYMENT_TYPE_SURCHARGE = 'Surcharge';
    public const PLATFORM_PAYMENT_TYPE_TIP = 'Tip';
    public const PLATFORM_PAYMENT_TYPE_TOP_UP = 'TopUp';
    public const PLATFORM_PAYMENT_TYPE_VAT = 'VAT';
    public const TYPE_PLATFORM_PAYMENT = 'platformPayment';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPlatformPaymentTypeAllowableValues()
    {
        return [
            self::PLATFORM_PAYMENT_TYPE_ACQUIRING_FEES,
            self::PLATFORM_PAYMENT_TYPE_ADYEN_COMMISSION,
            self::PLATFORM_PAYMENT_TYPE_ADYEN_FEES,
            self::PLATFORM_PAYMENT_TYPE_ADYEN_MARKUP,
            self::PLATFORM_PAYMENT_TYPE_BALANCE_ACCOUNT,
            self::PLATFORM_PAYMENT_TYPE_COMMISSION,
            self::PLATFORM_PAYMENT_TYPE__DEFAULT,
            self::PLATFORM_PAYMENT_TYPE_INTERCHANGE,
            self::PLATFORM_PAYMENT_TYPE_PAYMENT_FEE,
            self::PLATFORM_PAYMENT_TYPE_REMAINDER,
            self::PLATFORM_PAYMENT_TYPE_SCHEME_FEE,
            self::PLATFORM_PAYMENT_TYPE_SURCHARGE,
            self::PLATFORM_PAYMENT_TYPE_TIP,
            self::PLATFORM_PAYMENT_TYPE_TOP_UP,
            self::PLATFORM_PAYMENT_TYPE_VAT,
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
            self::TYPE_PLATFORM_PAYMENT,
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
        $this->setIfExists('modificationMerchantReference', $data ?? [], null);
        $this->setIfExists('modificationPspReference', $data ?? [], null);
        $this->setIfExists('paymentMerchantReference', $data ?? [], null);
        $this->setIfExists('platformPaymentType', $data ?? [], null);
        $this->setIfExists('pspPaymentReference', $data ?? [], null);
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

        $allowedValues = $this->getPlatformPaymentTypeAllowableValues();
        if (!is_null($this->container['platformPaymentType']) && !in_array($this->container['platformPaymentType'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'platformPaymentType', must be one of '%s'",
                $this->container['platformPaymentType'],
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
     * Gets modificationMerchantReference
     *
     * @return string|null
     */
    public function getModificationMerchantReference()
    {
        return $this->container['modificationMerchantReference'];
    }

    /**
     * Sets modificationMerchantReference
     *
     * @param string|null $modificationMerchantReference The capture's merchant reference included in the transfer.
     *
     * @return self
     */
    public function setModificationMerchantReference($modificationMerchantReference)
    {
        if (is_null($modificationMerchantReference)) {
            throw new \InvalidArgumentException('non-nullable modificationMerchantReference cannot be null');
        }
        $this->container['modificationMerchantReference'] = $modificationMerchantReference;

        return $this;
    }

    /**
     * Gets modificationPspReference
     *
     * @return string|null
     */
    public function getModificationPspReference()
    {
        return $this->container['modificationPspReference'];
    }

    /**
     * Sets modificationPspReference
     *
     * @param string|null $modificationPspReference The capture reference included in the transfer.
     *
     * @return self
     */
    public function setModificationPspReference($modificationPspReference)
    {
        if (is_null($modificationPspReference)) {
            throw new \InvalidArgumentException('non-nullable modificationPspReference cannot be null');
        }
        $this->container['modificationPspReference'] = $modificationPspReference;

        return $this;
    }

    /**
     * Gets paymentMerchantReference
     *
     * @return string|null
     */
    public function getPaymentMerchantReference()
    {
        return $this->container['paymentMerchantReference'];
    }

    /**
     * Sets paymentMerchantReference
     *
     * @param string|null $paymentMerchantReference The payment's merchant reference included in the transfer.
     *
     * @return self
     */
    public function setPaymentMerchantReference($paymentMerchantReference)
    {
        if (is_null($paymentMerchantReference)) {
            throw new \InvalidArgumentException('non-nullable paymentMerchantReference cannot be null');
        }
        $this->container['paymentMerchantReference'] = $paymentMerchantReference;

        return $this;
    }

    /**
     * Gets platformPaymentType
     *
     * @return string|null
     */
    public function getPlatformPaymentType()
    {
        return $this->container['platformPaymentType'];
    }

    /**
     * Sets platformPaymentType
     *
     * @param string|null $platformPaymentType The type of the related split.
     *
     * @return self
     */
    public function setPlatformPaymentType($platformPaymentType)
    {
        if (is_null($platformPaymentType)) {
            throw new \InvalidArgumentException('non-nullable platformPaymentType cannot be null');
        }
        $allowedValues = $this->getPlatformPaymentTypeAllowableValues();
        if (!in_array($platformPaymentType, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'platformPaymentType', must be one of '%s'",
                    $platformPaymentType,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['platformPaymentType'] = $platformPaymentType;

        return $this;
    }

    /**
     * Gets pspPaymentReference
     *
     * @return string|null
     */
    public function getPspPaymentReference()
    {
        return $this->container['pspPaymentReference'];
    }

    /**
     * Sets pspPaymentReference
     *
     * @param string|null $pspPaymentReference The payment reference included in the transfer.
     *
     * @return self
     */
    public function setPspPaymentReference($pspPaymentReference)
    {
        if (is_null($pspPaymentReference)) {
            throw new \InvalidArgumentException('non-nullable pspPaymentReference cannot be null');
        }
        $this->container['pspPaymentReference'] = $pspPaymentReference;

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
     * @param string|null $type **platformPayment**
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
