<?php

/**
 * Adyen Payment API
 *
 * A set of API endpoints that allow you to initiate, settle, and modify payments on the Adyen payments platform. You can use the API to accept card payments (including One-Click and 3D Secure), bank transfers, ewallets, and many other payment methods.  To learn more about the API, visit [Classic integration](https://docs.adyen.com/classic-integration).  ## Authentication You need an [API credential](https://docs.adyen.com/development-resources/api-credentials) to authenticate to the API.  If using an API key, add an `X-API-Key` header with the API key as the value, for example:   ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ```  Alternatively, you can use the username and password to connect to the API using basic authentication, for example:  ``` curl -U \"ws@Company.YOUR_COMPANY_ACCOUNT\":\"YOUR_BASIC_AUTHENTICATION_PASSWORD\" \\ -H \"Content-Type: application/json\" \\ ... ```  ## Versioning Payments API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://pal-test.adyen.com/pal/servlet/Payment/v68/authorise ```  ## Going live  To authenticate to the live endpoints, you need an [API credential](https://docs.adyen.com/development-resources/api-credentials) from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account: ```  https://{PREFIX}-pal-live.adyenpayments.com/pal/servlet/Payment/v68/authorise ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.
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


namespace Adyen\Model\Payments;

use \ArrayAccess;
use Adyen\Model\Payments\ObjectSerializer;

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
        'enhanced_scheme_data_customer_reference' => 'string',
        'enhanced_scheme_data_employee_name' => 'string',
        'enhanced_scheme_data_job_description' => 'string',
        'enhanced_scheme_data_regular_hours_rate' => 'string',
        'enhanced_scheme_data_regular_hours_worked' => 'string',
        'enhanced_scheme_data_request_name' => 'string',
        'enhanced_scheme_data_temp_start_date' => 'string',
        'enhanced_scheme_data_temp_week_ending' => 'string',
        'enhanced_scheme_data_total_tax_amount' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'enhanced_scheme_data_customer_reference' => null,
        'enhanced_scheme_data_employee_name' => null,
        'enhanced_scheme_data_job_description' => null,
        'enhanced_scheme_data_regular_hours_rate' => null,
        'enhanced_scheme_data_regular_hours_worked' => null,
        'enhanced_scheme_data_request_name' => null,
        'enhanced_scheme_data_temp_start_date' => null,
        'enhanced_scheme_data_temp_week_ending' => null,
        'enhanced_scheme_data_total_tax_amount' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'enhanced_scheme_data_customer_reference' => false,
		'enhanced_scheme_data_employee_name' => false,
		'enhanced_scheme_data_job_description' => false,
		'enhanced_scheme_data_regular_hours_rate' => false,
		'enhanced_scheme_data_regular_hours_worked' => false,
		'enhanced_scheme_data_request_name' => false,
		'enhanced_scheme_data_temp_start_date' => false,
		'enhanced_scheme_data_temp_week_ending' => false,
		'enhanced_scheme_data_total_tax_amount' => false
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
        'enhanced_scheme_data_customer_reference' => 'enhancedSchemeData.customerReference',
        'enhanced_scheme_data_employee_name' => 'enhancedSchemeData.employeeName',
        'enhanced_scheme_data_job_description' => 'enhancedSchemeData.jobDescription',
        'enhanced_scheme_data_regular_hours_rate' => 'enhancedSchemeData.regularHoursRate',
        'enhanced_scheme_data_regular_hours_worked' => 'enhancedSchemeData.regularHoursWorked',
        'enhanced_scheme_data_request_name' => 'enhancedSchemeData.requestName',
        'enhanced_scheme_data_temp_start_date' => 'enhancedSchemeData.tempStartDate',
        'enhanced_scheme_data_temp_week_ending' => 'enhancedSchemeData.tempWeekEnding',
        'enhanced_scheme_data_total_tax_amount' => 'enhancedSchemeData.totalTaxAmount'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'enhanced_scheme_data_customer_reference' => 'setEnhancedSchemeDataCustomerReference',
        'enhanced_scheme_data_employee_name' => 'setEnhancedSchemeDataEmployeeName',
        'enhanced_scheme_data_job_description' => 'setEnhancedSchemeDataJobDescription',
        'enhanced_scheme_data_regular_hours_rate' => 'setEnhancedSchemeDataRegularHoursRate',
        'enhanced_scheme_data_regular_hours_worked' => 'setEnhancedSchemeDataRegularHoursWorked',
        'enhanced_scheme_data_request_name' => 'setEnhancedSchemeDataRequestName',
        'enhanced_scheme_data_temp_start_date' => 'setEnhancedSchemeDataTempStartDate',
        'enhanced_scheme_data_temp_week_ending' => 'setEnhancedSchemeDataTempWeekEnding',
        'enhanced_scheme_data_total_tax_amount' => 'setEnhancedSchemeDataTotalTaxAmount'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'enhanced_scheme_data_customer_reference' => 'getEnhancedSchemeDataCustomerReference',
        'enhanced_scheme_data_employee_name' => 'getEnhancedSchemeDataEmployeeName',
        'enhanced_scheme_data_job_description' => 'getEnhancedSchemeDataJobDescription',
        'enhanced_scheme_data_regular_hours_rate' => 'getEnhancedSchemeDataRegularHoursRate',
        'enhanced_scheme_data_regular_hours_worked' => 'getEnhancedSchemeDataRegularHoursWorked',
        'enhanced_scheme_data_request_name' => 'getEnhancedSchemeDataRequestName',
        'enhanced_scheme_data_temp_start_date' => 'getEnhancedSchemeDataTempStartDate',
        'enhanced_scheme_data_temp_week_ending' => 'getEnhancedSchemeDataTempWeekEnding',
        'enhanced_scheme_data_total_tax_amount' => 'getEnhancedSchemeDataTotalTaxAmount'
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
        $this->setIfExists('enhanced_scheme_data_customer_reference', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_employee_name', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_job_description', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_regular_hours_rate', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_regular_hours_worked', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_request_name', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_temp_start_date', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_temp_week_ending', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_total_tax_amount', $data ?? [], null);
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
     * Gets enhanced_scheme_data_customer_reference
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataCustomerReference()
    {
        return $this->container['enhanced_scheme_data_customer_reference'];
    }

    /**
     * Sets enhanced_scheme_data_customer_reference
     *
     * @param string|null $enhanced_scheme_data_customer_reference Customer code, if supplied by a customer. * Encoding: ASCII * maxLength: 25
     *
     * @return self
     */
    public function setEnhancedSchemeDataCustomerReference($enhanced_scheme_data_customer_reference)
    {
        if (is_null($enhanced_scheme_data_customer_reference)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_customer_reference cannot be null');
        }
        $this->container['enhanced_scheme_data_customer_reference'] = $enhanced_scheme_data_customer_reference;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_employee_name
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataEmployeeName()
    {
        return $this->container['enhanced_scheme_data_employee_name'];
    }

    /**
     * Sets enhanced_scheme_data_employee_name
     *
     * @param string|null $enhanced_scheme_data_employee_name Name or ID associated with the individual working in a temporary capacity. * maxLength: 40
     *
     * @return self
     */
    public function setEnhancedSchemeDataEmployeeName($enhanced_scheme_data_employee_name)
    {
        if (is_null($enhanced_scheme_data_employee_name)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_employee_name cannot be null');
        }
        $this->container['enhanced_scheme_data_employee_name'] = $enhanced_scheme_data_employee_name;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_job_description
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataJobDescription()
    {
        return $this->container['enhanced_scheme_data_job_description'];
    }

    /**
     * Sets enhanced_scheme_data_job_description
     *
     * @param string|null $enhanced_scheme_data_job_description Description of the job or task of the individual working in a temporary capacity. * maxLength: 40
     *
     * @return self
     */
    public function setEnhancedSchemeDataJobDescription($enhanced_scheme_data_job_description)
    {
        if (is_null($enhanced_scheme_data_job_description)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_job_description cannot be null');
        }
        $this->container['enhanced_scheme_data_job_description'] = $enhanced_scheme_data_job_description;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_regular_hours_rate
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataRegularHoursRate()
    {
        return $this->container['enhanced_scheme_data_regular_hours_rate'];
    }

    /**
     * Sets enhanced_scheme_data_regular_hours_rate
     *
     * @param string|null $enhanced_scheme_data_regular_hours_rate Amount paid per regular hours worked, minor units. * maxLength: 7
     *
     * @return self
     */
    public function setEnhancedSchemeDataRegularHoursRate($enhanced_scheme_data_regular_hours_rate)
    {
        if (is_null($enhanced_scheme_data_regular_hours_rate)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_regular_hours_rate cannot be null');
        }
        $this->container['enhanced_scheme_data_regular_hours_rate'] = $enhanced_scheme_data_regular_hours_rate;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_regular_hours_worked
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataRegularHoursWorked()
    {
        return $this->container['enhanced_scheme_data_regular_hours_worked'];
    }

    /**
     * Sets enhanced_scheme_data_regular_hours_worked
     *
     * @param string|null $enhanced_scheme_data_regular_hours_worked Amount of time worked during a normal operation for the task or job. * maxLength: 7
     *
     * @return self
     */
    public function setEnhancedSchemeDataRegularHoursWorked($enhanced_scheme_data_regular_hours_worked)
    {
        if (is_null($enhanced_scheme_data_regular_hours_worked)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_regular_hours_worked cannot be null');
        }
        $this->container['enhanced_scheme_data_regular_hours_worked'] = $enhanced_scheme_data_regular_hours_worked;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_request_name
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataRequestName()
    {
        return $this->container['enhanced_scheme_data_request_name'];
    }

    /**
     * Sets enhanced_scheme_data_request_name
     *
     * @param string|null $enhanced_scheme_data_request_name Name of the individual requesting temporary services. * maxLength: 40
     *
     * @return self
     */
    public function setEnhancedSchemeDataRequestName($enhanced_scheme_data_request_name)
    {
        if (is_null($enhanced_scheme_data_request_name)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_request_name cannot be null');
        }
        $this->container['enhanced_scheme_data_request_name'] = $enhanced_scheme_data_request_name;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_temp_start_date
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataTempStartDate()
    {
        return $this->container['enhanced_scheme_data_temp_start_date'];
    }

    /**
     * Sets enhanced_scheme_data_temp_start_date
     *
     * @param string|null $enhanced_scheme_data_temp_start_date Date for the beginning of the pay period. * Format: ddMMyy * maxLength: 6
     *
     * @return self
     */
    public function setEnhancedSchemeDataTempStartDate($enhanced_scheme_data_temp_start_date)
    {
        if (is_null($enhanced_scheme_data_temp_start_date)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_temp_start_date cannot be null');
        }
        $this->container['enhanced_scheme_data_temp_start_date'] = $enhanced_scheme_data_temp_start_date;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_temp_week_ending
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataTempWeekEnding()
    {
        return $this->container['enhanced_scheme_data_temp_week_ending'];
    }

    /**
     * Sets enhanced_scheme_data_temp_week_ending
     *
     * @param string|null $enhanced_scheme_data_temp_week_ending Date of the end of the billing cycle. * Format: ddMMyy * maxLength: 6
     *
     * @return self
     */
    public function setEnhancedSchemeDataTempWeekEnding($enhanced_scheme_data_temp_week_ending)
    {
        if (is_null($enhanced_scheme_data_temp_week_ending)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_temp_week_ending cannot be null');
        }
        $this->container['enhanced_scheme_data_temp_week_ending'] = $enhanced_scheme_data_temp_week_ending;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_total_tax_amount
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataTotalTaxAmount()
    {
        return $this->container['enhanced_scheme_data_total_tax_amount'];
    }

    /**
     * Sets enhanced_scheme_data_total_tax_amount
     *
     * @param string|null $enhanced_scheme_data_total_tax_amount Total tax amount, in minor units. For example, 2000 means USD 20.00 * maxLength: 12
     *
     * @return self
     */
    public function setEnhancedSchemeDataTotalTaxAmount($enhanced_scheme_data_total_tax_amount)
    {
        if (is_null($enhanced_scheme_data_total_tax_amount)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_total_tax_amount cannot be null');
        }
        $this->container['enhanced_scheme_data_total_tax_amount'] = $enhanced_scheme_data_total_tax_amount;

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
