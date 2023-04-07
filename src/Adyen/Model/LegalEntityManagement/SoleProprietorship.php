<?php

/**
 * Legal Entity Management API
 *
 * The version of the OpenAPI document: 3
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
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
        'country_of_governing_law' => 'string',
        'date_of_incorporation' => 'string',
        'doing_business_as' => 'string',
        'name' => 'string',
        'principal_place_of_business' => '\Adyen\Model\LegalEntityManagement\Address',
        'registered_address' => '\Adyen\Model\LegalEntityManagement\Address',
        'registration_number' => 'string',
        'vat_absence_reason' => 'string',
        'vat_number' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'country_of_governing_law' => null,
        'date_of_incorporation' => null,
        'doing_business_as' => null,
        'name' => null,
        'principal_place_of_business' => null,
        'registered_address' => null,
        'registration_number' => null,
        'vat_absence_reason' => null,
        'vat_number' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'country_of_governing_law' => false,
        'date_of_incorporation' => false,
        'doing_business_as' => false,
        'name' => false,
        'principal_place_of_business' => false,
        'registered_address' => false,
        'registration_number' => false,
        'vat_absence_reason' => false,
        'vat_number' => false
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
        'country_of_governing_law' => 'countryOfGoverningLaw',
        'date_of_incorporation' => 'dateOfIncorporation',
        'doing_business_as' => 'doingBusinessAs',
        'name' => 'name',
        'principal_place_of_business' => 'principalPlaceOfBusiness',
        'registered_address' => 'registeredAddress',
        'registration_number' => 'registrationNumber',
        'vat_absence_reason' => 'vatAbsenceReason',
        'vat_number' => 'vatNumber'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'country_of_governing_law' => 'setCountryOfGoverningLaw',
        'date_of_incorporation' => 'setDateOfIncorporation',
        'doing_business_as' => 'setDoingBusinessAs',
        'name' => 'setName',
        'principal_place_of_business' => 'setPrincipalPlaceOfBusiness',
        'registered_address' => 'setRegisteredAddress',
        'registration_number' => 'setRegistrationNumber',
        'vat_absence_reason' => 'setVatAbsenceReason',
        'vat_number' => 'setVatNumber'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'country_of_governing_law' => 'getCountryOfGoverningLaw',
        'date_of_incorporation' => 'getDateOfIncorporation',
        'doing_business_as' => 'getDoingBusinessAs',
        'name' => 'getName',
        'principal_place_of_business' => 'getPrincipalPlaceOfBusiness',
        'registered_address' => 'getRegisteredAddress',
        'registration_number' => 'getRegistrationNumber',
        'vat_absence_reason' => 'getVatAbsenceReason',
        'vat_number' => 'getVatNumber'
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
    public function __construct(array $data = null)
    {
        $this->setIfExists('country_of_governing_law', $data ?? [], null);
        $this->setIfExists('date_of_incorporation', $data ?? [], null);
        $this->setIfExists('doing_business_as', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('principal_place_of_business', $data ?? [], null);
        $this->setIfExists('registered_address', $data ?? [], null);
        $this->setIfExists('registration_number', $data ?? [], null);
        $this->setIfExists('vat_absence_reason', $data ?? [], null);
        $this->setIfExists('vat_number', $data ?? [], null);
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

        if ($this->container['country_of_governing_law'] === null) {
            $invalidProperties[] = "'country_of_governing_law' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['registered_address'] === null) {
            $invalidProperties[] = "'registered_address' can't be null";
        }
        $allowedValues = $this->getVatAbsenceReasonAllowableValues();
        if (!is_null($this->container['vat_absence_reason']) && !in_array($this->container['vat_absence_reason'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'vat_absence_reason', must be one of '%s'",
                $this->container['vat_absence_reason'],
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
     * Gets country_of_governing_law
     *
     * @return string
     */
    public function getCountryOfGoverningLaw()
    {
        return $this->container['country_of_governing_law'];
    }

    /**
     * Sets country_of_governing_law
     *
     * @param string $country_of_governing_law The two-character [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) country code of the governing country.
     *
     * @return self
     */
    public function setCountryOfGoverningLaw($country_of_governing_law)
    {
        if (is_null($country_of_governing_law)) {
            throw new \InvalidArgumentException('non-nullable country_of_governing_law cannot be null');
        }
        $this->container['country_of_governing_law'] = $country_of_governing_law;

        return $this;
    }

    /**
     * Gets date_of_incorporation
     *
     * @return string|null
     */
    public function getDateOfIncorporation()
    {
        return $this->container['date_of_incorporation'];
    }

    /**
     * Sets date_of_incorporation
     *
     * @param string|null $date_of_incorporation The date when the legal arrangement was incorporated in YYYY-MM-DD format.
     *
     * @return self
     */
    public function setDateOfIncorporation($date_of_incorporation)
    {
        if (is_null($date_of_incorporation)) {
            throw new \InvalidArgumentException('non-nullable date_of_incorporation cannot be null');
        }
        $this->container['date_of_incorporation'] = $date_of_incorporation;

        return $this;
    }

    /**
     * Gets doing_business_as
     *
     * @return string|null
     */
    public function getDoingBusinessAs()
    {
        return $this->container['doing_business_as'];
    }

    /**
     * Sets doing_business_as
     *
     * @param string|null $doing_business_as The registered name, if different from the `name`.
     *
     * @return self
     */
    public function setDoingBusinessAs($doing_business_as)
    {
        if (is_null($doing_business_as)) {
            throw new \InvalidArgumentException('non-nullable doing_business_as cannot be null');
        }
        $this->container['doing_business_as'] = $doing_business_as;

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
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets principal_place_of_business
     *
     * @return \Adyen\Model\LegalEntityManagement\Address|null
     */
    public function getPrincipalPlaceOfBusiness()
    {
        return $this->container['principal_place_of_business'];
    }

    /**
     * Sets principal_place_of_business
     *
     * @param \Adyen\Model\LegalEntityManagement\Address|null $principal_place_of_business principal_place_of_business
     *
     * @return self
     */
    public function setPrincipalPlaceOfBusiness($principal_place_of_business)
    {
        if (is_null($principal_place_of_business)) {
            throw new \InvalidArgumentException('non-nullable principal_place_of_business cannot be null');
        }
        $this->container['principal_place_of_business'] = $principal_place_of_business;

        return $this;
    }

    /**
     * Gets registered_address
     *
     * @return \Adyen\Model\LegalEntityManagement\Address
     */
    public function getRegisteredAddress()
    {
        return $this->container['registered_address'];
    }

    /**
     * Sets registered_address
     *
     * @param \Adyen\Model\LegalEntityManagement\Address $registered_address registered_address
     *
     * @return self
     */
    public function setRegisteredAddress($registered_address)
    {
        if (is_null($registered_address)) {
            throw new \InvalidArgumentException('non-nullable registered_address cannot be null');
        }
        $this->container['registered_address'] = $registered_address;

        return $this;
    }

    /**
     * Gets registration_number
     *
     * @return string|null
     */
    public function getRegistrationNumber()
    {
        return $this->container['registration_number'];
    }

    /**
     * Sets registration_number
     *
     * @param string|null $registration_number The registration number.
     *
     * @return self
     */
    public function setRegistrationNumber($registration_number)
    {
        if (is_null($registration_number)) {
            throw new \InvalidArgumentException('non-nullable registration_number cannot be null');
        }
        $this->container['registration_number'] = $registration_number;

        return $this;
    }

    /**
     * Gets vat_absence_reason
     *
     * @return string|null
     */
    public function getVatAbsenceReason()
    {
        return $this->container['vat_absence_reason'];
    }

    /**
     * Sets vat_absence_reason
     *
     * @param string|null $vat_absence_reason The reason for not providing a VAT number.  Possible values: **industryExemption**, **belowTaxThreshold**.
     *
     * @return self
     */
    public function setVatAbsenceReason($vat_absence_reason)
    {
        if (is_null($vat_absence_reason)) {
            throw new \InvalidArgumentException('non-nullable vat_absence_reason cannot be null');
        }
        $allowedValues = $this->getVatAbsenceReasonAllowableValues();
        if (!in_array($vat_absence_reason, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'vat_absence_reason', must be one of '%s'",
                    $vat_absence_reason,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['vat_absence_reason'] = $vat_absence_reason;

        return $this;
    }

    /**
     * Gets vat_number
     *
     * @return string|null
     */
    public function getVatNumber()
    {
        return $this->container['vat_number'];
    }

    /**
     * Sets vat_number
     *
     * @param string|null $vat_number The VAT number.
     *
     * @return self
     */
    public function setVatNumber($vat_number)
    {
        if (is_null($vat_number)) {
            throw new \InvalidArgumentException('non-nullable vat_number cannot be null');
        }
        $this->container['vat_number'] = $vat_number;

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