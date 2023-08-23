<?php

/**
 * Adyen Payment API
 *
 * The version of the OpenAPI document: 68
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Payments;

use \ArrayAccess;
use Adyen\Model\Payments\ObjectSerializer;

/**
 * Recurring Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Recurring implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Recurring';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'contract' => 'string',
        'recurringDetailName' => 'string',
        'recurringExpiry' => '\DateTime',
        'recurringFrequency' => 'string',
        'tokenService' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'contract' => null,
        'recurringDetailName' => null,
        'recurringExpiry' => 'date-time',
        'recurringFrequency' => null,
        'tokenService' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'contract' => false,
        'recurringDetailName' => false,
        'recurringExpiry' => false,
        'recurringFrequency' => false,
        'tokenService' => false
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
        'contract' => 'contract',
        'recurringDetailName' => 'recurringDetailName',
        'recurringExpiry' => 'recurringExpiry',
        'recurringFrequency' => 'recurringFrequency',
        'tokenService' => 'tokenService'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'contract' => 'setContract',
        'recurringDetailName' => 'setRecurringDetailName',
        'recurringExpiry' => 'setRecurringExpiry',
        'recurringFrequency' => 'setRecurringFrequency',
        'tokenService' => 'setTokenService'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'contract' => 'getContract',
        'recurringDetailName' => 'getRecurringDetailName',
        'recurringExpiry' => 'getRecurringExpiry',
        'recurringFrequency' => 'getRecurringFrequency',
        'tokenService' => 'getTokenService'
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

    public const CONTRACT_ONECLICK = 'ONECLICK';
    public const CONTRACT_RECURRING = 'RECURRING';
    public const CONTRACT_PAYOUT = 'PAYOUT';
    public const TOKEN_SERVICE_VISATOKENSERVICE = 'VISATOKENSERVICE';
    public const TOKEN_SERVICE_MCTOKENSERVICE = 'MCTOKENSERVICE';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getContractAllowableValues()
    {
        return [
            self::CONTRACT_ONECLICK,
            self::CONTRACT_RECURRING,
            self::CONTRACT_PAYOUT,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTokenServiceAllowableValues()
    {
        return [
            self::TOKEN_SERVICE_VISATOKENSERVICE,
            self::TOKEN_SERVICE_MCTOKENSERVICE,
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
        $this->setIfExists('contract', $data ?? [], null);
        $this->setIfExists('recurringDetailName', $data ?? [], null);
        $this->setIfExists('recurringExpiry', $data ?? [], null);
        $this->setIfExists('recurringFrequency', $data ?? [], null);
        $this->setIfExists('tokenService', $data ?? [], null);
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

        $allowedValues = $this->getContractAllowableValues();
        if (!is_null($this->container['contract']) && !in_array($this->container['contract'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'contract', must be one of '%s'",
                $this->container['contract'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getTokenServiceAllowableValues();
        if (!is_null($this->container['tokenService']) && !in_array($this->container['tokenService'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'tokenService', must be one of '%s'",
                $this->container['tokenService'],
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
     * Gets contract
     *
     * @return string|null
     */
    public function getContract()
    {
        return $this->container['contract'];
    }

    /**
     * Sets contract
     *
     * @param string|null $contract The type of recurring contract to be used. Possible values: * `ONECLICK` – Payment details can be used to initiate a one-click payment, where the shopper enters the [card security code (CVC/CVV)](https://docs.adyen.com/payments-fundamentals/payment-glossary#card-security-code-cvc-cvv-cid). * `RECURRING` – Payment details can be used without the card security code to initiate [card-not-present transactions](https://docs.adyen.com/payments-fundamentals/payment-glossary#card-not-present-cnp). * `ONECLICK,RECURRING` – Payment details can be used regardless of whether the shopper is on your site or not. * `PAYOUT` – Payment details can be used to [make a payout](https://docs.adyen.com/online-payments/online-payouts).
     *
     * @return self
     */
    public function setContract($contract)
    {
        if (is_null($contract)) {
            throw new \InvalidArgumentException('non-nullable contract cannot be null');
        }
        $allowedValues = $this->getContractAllowableValues();
        if (!in_array($contract, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'contract', must be one of '%s'",
                    $contract,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['contract'] = $contract;

        return $this;
    }

    /**
     * Gets recurringDetailName
     *
     * @return string|null
     */
    public function getRecurringDetailName()
    {
        return $this->container['recurringDetailName'];
    }

    /**
     * Sets recurringDetailName
     *
     * @param string|null $recurringDetailName A descriptive name for this detail.
     *
     * @return self
     */
    public function setRecurringDetailName($recurringDetailName)
    {
        if (is_null($recurringDetailName)) {
            throw new \InvalidArgumentException('non-nullable recurringDetailName cannot be null');
        }
        $this->container['recurringDetailName'] = $recurringDetailName;

        return $this;
    }

    /**
     * Gets recurringExpiry
     *
     * @return \DateTime|null
     */
    public function getRecurringExpiry()
    {
        return $this->container['recurringExpiry'];
    }

    /**
     * Sets recurringExpiry
     *
     * @param \DateTime|null $recurringExpiry Date after which no further authorisations shall be performed. Only for 3D Secure 2.
     *
     * @return self
     */
    public function setRecurringExpiry($recurringExpiry)
    {
        if (is_null($recurringExpiry)) {
            throw new \InvalidArgumentException('non-nullable recurringExpiry cannot be null');
        }
        $this->container['recurringExpiry'] = $recurringExpiry;

        return $this;
    }

    /**
     * Gets recurringFrequency
     *
     * @return string|null
     */
    public function getRecurringFrequency()
    {
        return $this->container['recurringFrequency'];
    }

    /**
     * Sets recurringFrequency
     *
     * @param string|null $recurringFrequency Minimum number of days between authorisations. Only for 3D Secure 2.
     *
     * @return self
     */
    public function setRecurringFrequency($recurringFrequency)
    {
        if (is_null($recurringFrequency)) {
            throw new \InvalidArgumentException('non-nullable recurringFrequency cannot be null');
        }
        $this->container['recurringFrequency'] = $recurringFrequency;

        return $this;
    }

    /**
     * Gets tokenService
     *
     * @return string|null
     */
    public function getTokenService()
    {
        return $this->container['tokenService'];
    }

    /**
     * Sets tokenService
     *
     * @param string|null $tokenService The name of the token service.
     *
     * @return self
     */
    public function setTokenService($tokenService)
    {
        if (is_null($tokenService)) {
            throw new \InvalidArgumentException('non-nullable tokenService cannot be null');
        }
        $allowedValues = $this->getTokenServiceAllowableValues();
        if (!in_array($tokenService, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'tokenService', must be one of '%s'",
                    $tokenService,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['tokenService'] = $tokenService;

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
