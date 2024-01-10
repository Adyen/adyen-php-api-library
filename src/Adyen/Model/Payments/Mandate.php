<?php

/**
 * Adyen Payment API
 *
 * The version of the OpenAPI document: 68
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Payments;

use \ArrayAccess;
use Adyen\Model\Payments\ObjectSerializer;

/**
 * Mandate Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Mandate implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Mandate';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'amount' => 'string',
        'amountRule' => 'string',
        'billingAttemptsRule' => 'string',
        'billingDay' => 'string',
        'endsAt' => 'string',
        'frequency' => 'string',
        'remarks' => 'string',
        'startsAt' => 'string'
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
        'amountRule' => null,
        'billingAttemptsRule' => null,
        'billingDay' => null,
        'endsAt' => null,
        'frequency' => null,
        'remarks' => null,
        'startsAt' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'amount' => false,
        'amountRule' => false,
        'billingAttemptsRule' => false,
        'billingDay' => false,
        'endsAt' => false,
        'frequency' => false,
        'remarks' => false,
        'startsAt' => false
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
        'amountRule' => 'amountRule',
        'billingAttemptsRule' => 'billingAttemptsRule',
        'billingDay' => 'billingDay',
        'endsAt' => 'endsAt',
        'frequency' => 'frequency',
        'remarks' => 'remarks',
        'startsAt' => 'startsAt'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'amountRule' => 'setAmountRule',
        'billingAttemptsRule' => 'setBillingAttemptsRule',
        'billingDay' => 'setBillingDay',
        'endsAt' => 'setEndsAt',
        'frequency' => 'setFrequency',
        'remarks' => 'setRemarks',
        'startsAt' => 'setStartsAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'amountRule' => 'getAmountRule',
        'billingAttemptsRule' => 'getBillingAttemptsRule',
        'billingDay' => 'getBillingDay',
        'endsAt' => 'getEndsAt',
        'frequency' => 'getFrequency',
        'remarks' => 'getRemarks',
        'startsAt' => 'getStartsAt'
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

    public const AMOUNT_RULE_MAX = 'max';
    public const AMOUNT_RULE_EXACT = 'exact';
    public const BILLING_ATTEMPTS_RULE_ON = 'on';
    public const BILLING_ATTEMPTS_RULE_BEFORE = 'before';
    public const BILLING_ATTEMPTS_RULE_AFTER = 'after';
    public const FREQUENCY_ADHOC = 'adhoc';
    public const FREQUENCY_DAILY = 'daily';
    public const FREQUENCY_WEEKLY = 'weekly';
    public const FREQUENCY_BI_WEEKLY = 'biWeekly';
    public const FREQUENCY_MONTHLY = 'monthly';
    public const FREQUENCY_QUARTERLY = 'quarterly';
    public const FREQUENCY_HALF_YEARLY = 'halfYearly';
    public const FREQUENCY_YEARLY = 'yearly';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAmountRuleAllowableValues()
    {
        return [
            self::AMOUNT_RULE_MAX,
            self::AMOUNT_RULE_EXACT,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBillingAttemptsRuleAllowableValues()
    {
        return [
            self::BILLING_ATTEMPTS_RULE_ON,
            self::BILLING_ATTEMPTS_RULE_BEFORE,
            self::BILLING_ATTEMPTS_RULE_AFTER,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFrequencyAllowableValues()
    {
        return [
            self::FREQUENCY_ADHOC,
            self::FREQUENCY_DAILY,
            self::FREQUENCY_WEEKLY,
            self::FREQUENCY_BI_WEEKLY,
            self::FREQUENCY_MONTHLY,
            self::FREQUENCY_QUARTERLY,
            self::FREQUENCY_HALF_YEARLY,
            self::FREQUENCY_YEARLY,
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
        $this->setIfExists('amountRule', $data ?? [], null);
        $this->setIfExists('billingAttemptsRule', $data ?? [], null);
        $this->setIfExists('billingDay', $data ?? [], null);
        $this->setIfExists('endsAt', $data ?? [], null);
        $this->setIfExists('frequency', $data ?? [], null);
        $this->setIfExists('remarks', $data ?? [], null);
        $this->setIfExists('startsAt', $data ?? [], null);
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
        $allowedValues = $this->getAmountRuleAllowableValues();
        if (!is_null($this->container['amountRule']) && !in_array($this->container['amountRule'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'amountRule', must be one of '%s'",
                $this->container['amountRule'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getBillingAttemptsRuleAllowableValues();
        if (!is_null($this->container['billingAttemptsRule']) && !in_array($this->container['billingAttemptsRule'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'billingAttemptsRule', must be one of '%s'",
                $this->container['billingAttemptsRule'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['endsAt'] === null) {
            $invalidProperties[] = "'endsAt' can't be null";
        }
        if ($this->container['frequency'] === null) {
            $invalidProperties[] = "'frequency' can't be null";
        }
        $allowedValues = $this->getFrequencyAllowableValues();
        if (!is_null($this->container['frequency']) && !in_array($this->container['frequency'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'frequency', must be one of '%s'",
                $this->container['frequency'],
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
     * @return string
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param string $amount The billing amount (in minor units) of the recurring transactions.
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
     * Gets amountRule
     *
     * @return string|null
     */
    public function getAmountRule()
    {
        return $this->container['amountRule'];
    }

    /**
     * Sets amountRule
     *
     * @param string|null $amountRule The limitation rule of the billing amount.  Possible values:  * **max**: The transaction amount can not exceed the `amount`.   * **exact**: The transaction amount should be the same as the `amount`.
     *
     * @return self
     */
    public function setAmountRule($amountRule)
    {
        if (is_null($amountRule)) {
            throw new \InvalidArgumentException('non-nullable amountRule cannot be null');
        }
        $allowedValues = $this->getAmountRuleAllowableValues();
        if (!in_array($amountRule, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'amountRule', must be one of '%s'",
                    $amountRule,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['amountRule'] = $amountRule;

        return $this;
    }

    /**
     * Gets billingAttemptsRule
     *
     * @return string|null
     */
    public function getBillingAttemptsRule()
    {
        return $this->container['billingAttemptsRule'];
    }

    /**
     * Sets billingAttemptsRule
     *
     * @param string|null $billingAttemptsRule The rule to specify the period, within which the recurring debit can happen, relative to the mandate recurring date.  Possible values:   * **on**: On a specific date.   * **before**:  Before and on a specific date.   * **after**: On and after a specific date.
     *
     * @return self
     */
    public function setBillingAttemptsRule($billingAttemptsRule)
    {
        if (is_null($billingAttemptsRule)) {
            throw new \InvalidArgumentException('non-nullable billingAttemptsRule cannot be null');
        }
        $allowedValues = $this->getBillingAttemptsRuleAllowableValues();
        if (!in_array($billingAttemptsRule, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'billingAttemptsRule', must be one of '%s'",
                    $billingAttemptsRule,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['billingAttemptsRule'] = $billingAttemptsRule;

        return $this;
    }

    /**
     * Gets billingDay
     *
     * @return string|null
     */
    public function getBillingDay()
    {
        return $this->container['billingDay'];
    }

    /**
     * Sets billingDay
     *
     * @param string|null $billingDay The number of the day, on which the recurring debit can happen. Should be within the same calendar month as the mandate recurring date.  Possible values: 1-31 based on the `frequency`.
     *
     * @return self
     */
    public function setBillingDay($billingDay)
    {
        if (is_null($billingDay)) {
            throw new \InvalidArgumentException('non-nullable billingDay cannot be null');
        }
        $this->container['billingDay'] = $billingDay;

        return $this;
    }

    /**
     * Gets endsAt
     *
     * @return string
     */
    public function getEndsAt()
    {
        return $this->container['endsAt'];
    }

    /**
     * Sets endsAt
     *
     * @param string $endsAt End date of the billing plan, in YYYY-MM-DD format.
     *
     * @return self
     */
    public function setEndsAt($endsAt)
    {
        if (is_null($endsAt)) {
            throw new \InvalidArgumentException('non-nullable endsAt cannot be null');
        }
        $this->container['endsAt'] = $endsAt;

        return $this;
    }

    /**
     * Gets frequency
     *
     * @return string
     */
    public function getFrequency()
    {
        return $this->container['frequency'];
    }

    /**
     * Sets frequency
     *
     * @param string $frequency The frequency with which a shopper should be charged.  Possible values: **daily**, **weekly**, **biWeekly**, **monthly**, **quarterly**, **halfYearly**, **yearly**.
     *
     * @return self
     */
    public function setFrequency($frequency)
    {
        if (is_null($frequency)) {
            throw new \InvalidArgumentException('non-nullable frequency cannot be null');
        }
        $allowedValues = $this->getFrequencyAllowableValues();
        if (!in_array($frequency, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'frequency', must be one of '%s'",
                    $frequency,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['frequency'] = $frequency;

        return $this;
    }

    /**
     * Gets remarks
     *
     * @return string|null
     */
    public function getRemarks()
    {
        return $this->container['remarks'];
    }

    /**
     * Sets remarks
     *
     * @param string|null $remarks The message shown by UPI to the shopper on the approval screen.
     *
     * @return self
     */
    public function setRemarks($remarks)
    {
        if (is_null($remarks)) {
            throw new \InvalidArgumentException('non-nullable remarks cannot be null');
        }
        $this->container['remarks'] = $remarks;

        return $this;
    }

    /**
     * Gets startsAt
     *
     * @return string|null
     */
    public function getStartsAt()
    {
        return $this->container['startsAt'];
    }

    /**
     * Sets startsAt
     *
     * @param string|null $startsAt Start date of the billing plan, in YYYY-MM-DD format. By default, the transaction date.
     *
     * @return self
     */
    public function setStartsAt($startsAt)
    {
        if (is_null($startsAt)) {
            throw new \InvalidArgumentException('non-nullable startsAt cannot be null');
        }
        $this->container['startsAt'] = $startsAt;

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
