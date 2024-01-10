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
 * AdditionalDataTemporaryServices Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AdditionalDataTemporaryServices implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AdditionalDataTemporaryServices';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'enhancedSchemeDataCustomerReference' => 'string',
        'enhancedSchemeDataEmployeeName' => 'string',
        'enhancedSchemeDataJobDescription' => 'string',
        'enhancedSchemeDataRegularHoursRate' => 'string',
        'enhancedSchemeDataRegularHoursWorked' => 'string',
        'enhancedSchemeDataRequestName' => 'string',
        'enhancedSchemeDataTempStartDate' => 'string',
        'enhancedSchemeDataTempWeekEnding' => 'string',
        'enhancedSchemeDataTotalTaxAmount' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'enhancedSchemeDataCustomerReference' => null,
        'enhancedSchemeDataEmployeeName' => null,
        'enhancedSchemeDataJobDescription' => null,
        'enhancedSchemeDataRegularHoursRate' => null,
        'enhancedSchemeDataRegularHoursWorked' => null,
        'enhancedSchemeDataRequestName' => null,
        'enhancedSchemeDataTempStartDate' => null,
        'enhancedSchemeDataTempWeekEnding' => null,
        'enhancedSchemeDataTotalTaxAmount' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'enhancedSchemeDataCustomerReference' => false,
        'enhancedSchemeDataEmployeeName' => false,
        'enhancedSchemeDataJobDescription' => false,
        'enhancedSchemeDataRegularHoursRate' => false,
        'enhancedSchemeDataRegularHoursWorked' => false,
        'enhancedSchemeDataRequestName' => false,
        'enhancedSchemeDataTempStartDate' => false,
        'enhancedSchemeDataTempWeekEnding' => false,
        'enhancedSchemeDataTotalTaxAmount' => false
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
        'enhancedSchemeDataCustomerReference' => 'enhancedSchemeData.customerReference',
        'enhancedSchemeDataEmployeeName' => 'enhancedSchemeData.employeeName',
        'enhancedSchemeDataJobDescription' => 'enhancedSchemeData.jobDescription',
        'enhancedSchemeDataRegularHoursRate' => 'enhancedSchemeData.regularHoursRate',
        'enhancedSchemeDataRegularHoursWorked' => 'enhancedSchemeData.regularHoursWorked',
        'enhancedSchemeDataRequestName' => 'enhancedSchemeData.requestName',
        'enhancedSchemeDataTempStartDate' => 'enhancedSchemeData.tempStartDate',
        'enhancedSchemeDataTempWeekEnding' => 'enhancedSchemeData.tempWeekEnding',
        'enhancedSchemeDataTotalTaxAmount' => 'enhancedSchemeData.totalTaxAmount'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'enhancedSchemeDataCustomerReference' => 'setEnhancedSchemeDataCustomerReference',
        'enhancedSchemeDataEmployeeName' => 'setEnhancedSchemeDataEmployeeName',
        'enhancedSchemeDataJobDescription' => 'setEnhancedSchemeDataJobDescription',
        'enhancedSchemeDataRegularHoursRate' => 'setEnhancedSchemeDataRegularHoursRate',
        'enhancedSchemeDataRegularHoursWorked' => 'setEnhancedSchemeDataRegularHoursWorked',
        'enhancedSchemeDataRequestName' => 'setEnhancedSchemeDataRequestName',
        'enhancedSchemeDataTempStartDate' => 'setEnhancedSchemeDataTempStartDate',
        'enhancedSchemeDataTempWeekEnding' => 'setEnhancedSchemeDataTempWeekEnding',
        'enhancedSchemeDataTotalTaxAmount' => 'setEnhancedSchemeDataTotalTaxAmount'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'enhancedSchemeDataCustomerReference' => 'getEnhancedSchemeDataCustomerReference',
        'enhancedSchemeDataEmployeeName' => 'getEnhancedSchemeDataEmployeeName',
        'enhancedSchemeDataJobDescription' => 'getEnhancedSchemeDataJobDescription',
        'enhancedSchemeDataRegularHoursRate' => 'getEnhancedSchemeDataRegularHoursRate',
        'enhancedSchemeDataRegularHoursWorked' => 'getEnhancedSchemeDataRegularHoursWorked',
        'enhancedSchemeDataRequestName' => 'getEnhancedSchemeDataRequestName',
        'enhancedSchemeDataTempStartDate' => 'getEnhancedSchemeDataTempStartDate',
        'enhancedSchemeDataTempWeekEnding' => 'getEnhancedSchemeDataTempWeekEnding',
        'enhancedSchemeDataTotalTaxAmount' => 'getEnhancedSchemeDataTotalTaxAmount'
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
        $this->setIfExists('enhancedSchemeDataCustomerReference', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataEmployeeName', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataJobDescription', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataRegularHoursRate', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataRegularHoursWorked', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataRequestName', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataTempStartDate', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataTempWeekEnding', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataTotalTaxAmount', $data ?? [], null);
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
     * Gets enhancedSchemeDataCustomerReference
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataCustomerReference()
    {
        return $this->container['enhancedSchemeDataCustomerReference'];
    }

    /**
     * Sets enhancedSchemeDataCustomerReference
     *
     * @param string|null $enhancedSchemeDataCustomerReference The customer code, if supplied by a customer. * Encoding: ASCII * maxLength: 25
     *
     * @return self
     */
    public function setEnhancedSchemeDataCustomerReference($enhancedSchemeDataCustomerReference)
    {
        if (is_null($enhancedSchemeDataCustomerReference)) {
            throw new \InvalidArgumentException('non-nullable enhancedSchemeDataCustomerReference cannot be null');
        }
        $this->container['enhancedSchemeDataCustomerReference'] = $enhancedSchemeDataCustomerReference;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataEmployeeName
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataEmployeeName()
    {
        return $this->container['enhancedSchemeDataEmployeeName'];
    }

    /**
     * Sets enhancedSchemeDataEmployeeName
     *
     * @param string|null $enhancedSchemeDataEmployeeName The name or ID of the person working in a temporary capacity. * maxLength: 40.   * Must not be all spaces.  *Must not be all zeros.
     *
     * @return self
     */
    public function setEnhancedSchemeDataEmployeeName($enhancedSchemeDataEmployeeName)
    {
        if (is_null($enhancedSchemeDataEmployeeName)) {
            throw new \InvalidArgumentException('non-nullable enhancedSchemeDataEmployeeName cannot be null');
        }
        $this->container['enhancedSchemeDataEmployeeName'] = $enhancedSchemeDataEmployeeName;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataJobDescription
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataJobDescription()
    {
        return $this->container['enhancedSchemeDataJobDescription'];
    }

    /**
     * Sets enhancedSchemeDataJobDescription
     *
     * @param string|null $enhancedSchemeDataJobDescription The job description of the person working in a temporary capacity. * maxLength: 40  * Must not be all spaces.  *Must not be all zeros.
     *
     * @return self
     */
    public function setEnhancedSchemeDataJobDescription($enhancedSchemeDataJobDescription)
    {
        if (is_null($enhancedSchemeDataJobDescription)) {
            throw new \InvalidArgumentException('non-nullable enhancedSchemeDataJobDescription cannot be null');
        }
        $this->container['enhancedSchemeDataJobDescription'] = $enhancedSchemeDataJobDescription;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataRegularHoursRate
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataRegularHoursRate()
    {
        return $this->container['enhancedSchemeDataRegularHoursRate'];
    }

    /**
     * Sets enhancedSchemeDataRegularHoursRate
     *
     * @param string|null $enhancedSchemeDataRegularHoursRate The amount paid for regular hours worked, [minor units](https://docs.adyen.com/development-resources/currency-codes). * maxLength: 7 * Must not be empty * Can be all zeros
     *
     * @return self
     */
    public function setEnhancedSchemeDataRegularHoursRate($enhancedSchemeDataRegularHoursRate)
    {
        if (is_null($enhancedSchemeDataRegularHoursRate)) {
            throw new \InvalidArgumentException('non-nullable enhancedSchemeDataRegularHoursRate cannot be null');
        }
        $this->container['enhancedSchemeDataRegularHoursRate'] = $enhancedSchemeDataRegularHoursRate;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataRegularHoursWorked
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataRegularHoursWorked()
    {
        return $this->container['enhancedSchemeDataRegularHoursWorked'];
    }

    /**
     * Sets enhancedSchemeDataRegularHoursWorked
     *
     * @param string|null $enhancedSchemeDataRegularHoursWorked The hours worked. * maxLength: 7 * Must not be empty * Can be all zeros
     *
     * @return self
     */
    public function setEnhancedSchemeDataRegularHoursWorked($enhancedSchemeDataRegularHoursWorked)
    {
        if (is_null($enhancedSchemeDataRegularHoursWorked)) {
            throw new \InvalidArgumentException('non-nullable enhancedSchemeDataRegularHoursWorked cannot be null');
        }
        $this->container['enhancedSchemeDataRegularHoursWorked'] = $enhancedSchemeDataRegularHoursWorked;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataRequestName
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataRequestName()
    {
        return $this->container['enhancedSchemeDataRequestName'];
    }

    /**
     * Sets enhancedSchemeDataRequestName
     *
     * @param string|null $enhancedSchemeDataRequestName The name of the person requesting temporary services. * maxLength: 40 * Must not be all zeros * Must not be all spaces
     *
     * @return self
     */
    public function setEnhancedSchemeDataRequestName($enhancedSchemeDataRequestName)
    {
        if (is_null($enhancedSchemeDataRequestName)) {
            throw new \InvalidArgumentException('non-nullable enhancedSchemeDataRequestName cannot be null');
        }
        $this->container['enhancedSchemeDataRequestName'] = $enhancedSchemeDataRequestName;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataTempStartDate
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataTempStartDate()
    {
        return $this->container['enhancedSchemeDataTempStartDate'];
    }

    /**
     * Sets enhancedSchemeDataTempStartDate
     *
     * @param string|null $enhancedSchemeDataTempStartDate The billing period start date. * Format: ddMMyy * maxLength: 6
     *
     * @return self
     */
    public function setEnhancedSchemeDataTempStartDate($enhancedSchemeDataTempStartDate)
    {
        if (is_null($enhancedSchemeDataTempStartDate)) {
            throw new \InvalidArgumentException('non-nullable enhancedSchemeDataTempStartDate cannot be null');
        }
        $this->container['enhancedSchemeDataTempStartDate'] = $enhancedSchemeDataTempStartDate;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataTempWeekEnding
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataTempWeekEnding()
    {
        return $this->container['enhancedSchemeDataTempWeekEnding'];
    }

    /**
     * Sets enhancedSchemeDataTempWeekEnding
     *
     * @param string|null $enhancedSchemeDataTempWeekEnding The billing period end date. * Format: ddMMyy * maxLength: 6
     *
     * @return self
     */
    public function setEnhancedSchemeDataTempWeekEnding($enhancedSchemeDataTempWeekEnding)
    {
        if (is_null($enhancedSchemeDataTempWeekEnding)) {
            throw new \InvalidArgumentException('non-nullable enhancedSchemeDataTempWeekEnding cannot be null');
        }
        $this->container['enhancedSchemeDataTempWeekEnding'] = $enhancedSchemeDataTempWeekEnding;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataTotalTaxAmount
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataTotalTaxAmount()
    {
        return $this->container['enhancedSchemeDataTotalTaxAmount'];
    }

    /**
     * Sets enhancedSchemeDataTotalTaxAmount
     *
     * @param string|null $enhancedSchemeDataTotalTaxAmount The total tax amount, in [minor units](https://docs.adyen.com/development-resources/currency-codes). For example, 2000 means USD 20.00 * maxLength: 12
     *
     * @return self
     */
    public function setEnhancedSchemeDataTotalTaxAmount($enhancedSchemeDataTotalTaxAmount)
    {
        if (is_null($enhancedSchemeDataTotalTaxAmount)) {
            throw new \InvalidArgumentException('non-nullable enhancedSchemeDataTotalTaxAmount cannot be null');
        }
        $this->container['enhancedSchemeDataTotalTaxAmount'] = $enhancedSchemeDataTotalTaxAmount;

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
