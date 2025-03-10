<?php

/**
 * Legal Entity Management API
 *
 * The version of the OpenAPI document: 3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\LegalEntityManagement;

use \ArrayAccess;
use Adyen\Model\LegalEntityManagement\ObjectSerializer;

/**
 * SoleProprietorship Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class SoleProprietorship implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SoleProprietorship';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'countryOfGoverningLaw' => 'string',
        'dateOfIncorporation' => 'string',
        'doingBusinessAs' => 'string',
        'financialReports' => '\Adyen\Model\LegalEntityManagement\FinancialReport[]',
        'name' => 'string',
        'principalPlaceOfBusiness' => '\Adyen\Model\LegalEntityManagement\Address',
        'registeredAddress' => '\Adyen\Model\LegalEntityManagement\Address',
        'registrationNumber' => 'string',
        'taxAbsent' => 'bool',
        'taxInformation' => '\Adyen\Model\LegalEntityManagement\TaxInformation[]',
        'vatAbsenceReason' => 'string',
        'vatNumber' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'countryOfGoverningLaw' => null,
        'dateOfIncorporation' => null,
        'doingBusinessAs' => null,
        'financialReports' => null,
        'name' => null,
        'principalPlaceOfBusiness' => null,
        'registeredAddress' => null,
        'registrationNumber' => null,
        'taxAbsent' => null,
        'taxInformation' => null,
        'vatAbsenceReason' => null,
        'vatNumber' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'countryOfGoverningLaw' => false,
        'dateOfIncorporation' => false,
        'doingBusinessAs' => false,
        'financialReports' => false,
        'name' => false,
        'principalPlaceOfBusiness' => false,
        'registeredAddress' => false,
        'registrationNumber' => false,
        'taxAbsent' => true,
        'taxInformation' => false,
        'vatAbsenceReason' => false,
        'vatNumber' => false
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
        'countryOfGoverningLaw' => 'countryOfGoverningLaw',
        'dateOfIncorporation' => 'dateOfIncorporation',
        'doingBusinessAs' => 'doingBusinessAs',
        'financialReports' => 'financialReports',
        'name' => 'name',
        'principalPlaceOfBusiness' => 'principalPlaceOfBusiness',
        'registeredAddress' => 'registeredAddress',
        'registrationNumber' => 'registrationNumber',
        'taxAbsent' => 'taxAbsent',
        'taxInformation' => 'taxInformation',
        'vatAbsenceReason' => 'vatAbsenceReason',
        'vatNumber' => 'vatNumber'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'countryOfGoverningLaw' => 'setCountryOfGoverningLaw',
        'dateOfIncorporation' => 'setDateOfIncorporation',
        'doingBusinessAs' => 'setDoingBusinessAs',
        'financialReports' => 'setFinancialReports',
        'name' => 'setName',
        'principalPlaceOfBusiness' => 'setPrincipalPlaceOfBusiness',
        'registeredAddress' => 'setRegisteredAddress',
        'registrationNumber' => 'setRegistrationNumber',
        'taxAbsent' => 'setTaxAbsent',
        'taxInformation' => 'setTaxInformation',
        'vatAbsenceReason' => 'setVatAbsenceReason',
        'vatNumber' => 'setVatNumber'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'countryOfGoverningLaw' => 'getCountryOfGoverningLaw',
        'dateOfIncorporation' => 'getDateOfIncorporation',
        'doingBusinessAs' => 'getDoingBusinessAs',
        'financialReports' => 'getFinancialReports',
        'name' => 'getName',
        'principalPlaceOfBusiness' => 'getPrincipalPlaceOfBusiness',
        'registeredAddress' => 'getRegisteredAddress',
        'registrationNumber' => 'getRegistrationNumber',
        'taxAbsent' => 'getTaxAbsent',
        'taxInformation' => 'getTaxInformation',
        'vatAbsenceReason' => 'getVatAbsenceReason',
        'vatNumber' => 'getVatNumber'
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

    public const VAT_ABSENCE_REASON_INDUSTRY_EXEMPTION = 'industryExemption';
    public const VAT_ABSENCE_REASON_BELOW_TAX_THRESHOLD = 'belowTaxThreshold';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getVatAbsenceReasonAllowableValues()
    {
        return [
            self::VAT_ABSENCE_REASON_INDUSTRY_EXEMPTION,
            self::VAT_ABSENCE_REASON_BELOW_TAX_THRESHOLD,
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
        $this->setIfExists('countryOfGoverningLaw', $data ?? [], null);
        $this->setIfExists('dateOfIncorporation', $data ?? [], null);
        $this->setIfExists('doingBusinessAs', $data ?? [], null);
        $this->setIfExists('financialReports', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('principalPlaceOfBusiness', $data ?? [], null);
        $this->setIfExists('registeredAddress', $data ?? [], null);
        $this->setIfExists('registrationNumber', $data ?? [], null);
        $this->setIfExists('taxAbsent', $data ?? [], null);
        $this->setIfExists('taxInformation', $data ?? [], null);
        $this->setIfExists('vatAbsenceReason', $data ?? [], null);
        $this->setIfExists('vatNumber', $data ?? [], null);
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

        if ($this->container['countryOfGoverningLaw'] === null) {
            $invalidProperties[] = "'countryOfGoverningLaw' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['registeredAddress'] === null) {
            $invalidProperties[] = "'registeredAddress' can't be null";
        }
        $allowedValues = $this->getVatAbsenceReasonAllowableValues();
        if (!is_null($this->container['vatAbsenceReason']) && !in_array($this->container['vatAbsenceReason'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'vatAbsenceReason', must be one of '%s'",
                $this->container['vatAbsenceReason'],
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
     * Gets countryOfGoverningLaw
     *
     * @return string
     */
    public function getCountryOfGoverningLaw()
    {
        return $this->container['countryOfGoverningLaw'];
    }

    /**
     * Sets countryOfGoverningLaw
     *
     * @param string $countryOfGoverningLaw The two-character [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) country code of the governing country.
     *
     * @return self
     */
    public function setCountryOfGoverningLaw($countryOfGoverningLaw)
    {
        $this->container['countryOfGoverningLaw'] = $countryOfGoverningLaw;

        return $this;
    }

    /**
     * Gets dateOfIncorporation
     *
     * @return string|null
     */
    public function getDateOfIncorporation()
    {
        return $this->container['dateOfIncorporation'];
    }

    /**
     * Sets dateOfIncorporation
     *
     * @param string|null $dateOfIncorporation The date when the legal arrangement was incorporated in YYYY-MM-DD format.
     *
     * @return self
     */
    public function setDateOfIncorporation($dateOfIncorporation)
    {
        $this->container['dateOfIncorporation'] = $dateOfIncorporation;

        return $this;
    }

    /**
     * Gets doingBusinessAs
     *
     * @return string|null
     */
    public function getDoingBusinessAs()
    {
        return $this->container['doingBusinessAs'];
    }

    /**
     * Sets doingBusinessAs
     *
     * @param string|null $doingBusinessAs The registered name, if different from the `name`.
     *
     * @return self
     */
    public function setDoingBusinessAs($doingBusinessAs)
    {
        $this->container['doingBusinessAs'] = $doingBusinessAs;

        return $this;
    }

    /**
     * Gets financialReports
     *
     * @return \Adyen\Model\LegalEntityManagement\FinancialReport[]|null
     */
    public function getFinancialReports()
    {
        return $this->container['financialReports'];
    }

    /**
     * Sets financialReports
     *
     * @param \Adyen\Model\LegalEntityManagement\FinancialReport[]|null $financialReports The information from the financial report of the sole proprietorship.
     *
     * @return self
     */
    public function setFinancialReports($financialReports)
    {
        $this->container['financialReports'] = $financialReports;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name The legal name.
     *
     * @return self
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets principalPlaceOfBusiness
     *
     * @return \Adyen\Model\LegalEntityManagement\Address|null
     */
    public function getPrincipalPlaceOfBusiness()
    {
        return $this->container['principalPlaceOfBusiness'];
    }

    /**
     * Sets principalPlaceOfBusiness
     *
     * @param \Adyen\Model\LegalEntityManagement\Address|null $principalPlaceOfBusiness principalPlaceOfBusiness
     *
     * @return self
     */
    public function setPrincipalPlaceOfBusiness($principalPlaceOfBusiness)
    {
        $this->container['principalPlaceOfBusiness'] = $principalPlaceOfBusiness;

        return $this;
    }

    /**
     * Gets registeredAddress
     *
     * @return \Adyen\Model\LegalEntityManagement\Address
     */
    public function getRegisteredAddress()
    {
        return $this->container['registeredAddress'];
    }

    /**
     * Sets registeredAddress
     *
     * @param \Adyen\Model\LegalEntityManagement\Address $registeredAddress registeredAddress
     *
     * @return self
     */
    public function setRegisteredAddress($registeredAddress)
    {
        $this->container['registeredAddress'] = $registeredAddress;

        return $this;
    }

    /**
     * Gets registrationNumber
     *
     * @return string|null
     */
    public function getRegistrationNumber()
    {
        return $this->container['registrationNumber'];
    }

    /**
     * Sets registrationNumber
     *
     * @param string|null $registrationNumber The registration number.
     *
     * @return self
     */
    public function setRegistrationNumber($registrationNumber)
    {
        $this->container['registrationNumber'] = $registrationNumber;

        return $this;
    }

    /**
     * Gets taxAbsent
     *
     * @return bool|null
     */
    public function getTaxAbsent()
    {
        return $this->container['taxAbsent'];
    }

    /**
     * Sets taxAbsent
     *
     * @param bool|null $taxAbsent The tax information is absent.
     *
     * @return self
     */
    public function setTaxAbsent($taxAbsent)
    {
        if (is_null($taxAbsent)) {
            array_push($this->openAPINullablesSetToNull, 'taxAbsent');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('taxAbsent', $nullablesSetToNull);
            if ($index !== false) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['taxAbsent'] = $taxAbsent;

        return $this;
    }

    /**
     * Gets taxInformation
     *
     * @return \Adyen\Model\LegalEntityManagement\TaxInformation[]|null
     */
    public function getTaxInformation()
    {
        return $this->container['taxInformation'];
    }

    /**
     * Sets taxInformation
     *
     * @param \Adyen\Model\LegalEntityManagement\TaxInformation[]|null $taxInformation The tax information of the entity.
     *
     * @return self
     */
    public function setTaxInformation($taxInformation)
    {
        $this->container['taxInformation'] = $taxInformation;

        return $this;
    }

    /**
     * Gets vatAbsenceReason
     *
     * @return string|null
     */
    public function getVatAbsenceReason()
    {
        return $this->container['vatAbsenceReason'];
    }

    /**
     * Sets vatAbsenceReason
     *
     * @param string|null $vatAbsenceReason The reason for not providing a VAT number.  Possible values: **industryExemption**, **belowTaxThreshold**.
     *
     * @return self
     */
    public function setVatAbsenceReason($vatAbsenceReason)
    {
        $allowedValues = $this->getVatAbsenceReasonAllowableValues();
        if (!in_array($vatAbsenceReason, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'vatAbsenceReason', must be one of '%s'",
                    $vatAbsenceReason,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['vatAbsenceReason'] = $vatAbsenceReason;

        return $this;
    }

    /**
     * Gets vatNumber
     *
     * @return string|null
     */
    public function getVatNumber()
    {
        return $this->container['vatNumber'];
    }

    /**
     * Sets vatNumber
     *
     * @param string|null $vatNumber The VAT number.
     *
     * @return self
     */
    public function setVatNumber($vatNumber)
    {
        $this->container['vatNumber'] = $vatNumber;

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
