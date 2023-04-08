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
 * Organization Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Organization implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Organization';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'date_of_incorporation' => 'string',
        'description' => 'string',
        'doing_business_as' => 'string',
        'email' => 'string',
        'legal_name' => 'string',
        'phone' => '\Adyen\Model\LegalEntityManagement\PhoneNumber',
        'principal_place_of_business' => '\Adyen\Model\LegalEntityManagement\Address',
        'registered_address' => '\Adyen\Model\LegalEntityManagement\Address',
        'registration_number' => 'string',
        'stock_data' => '\Adyen\Model\LegalEntityManagement\StockData',
        'tax_information' => '\Adyen\Model\LegalEntityManagement\TaxInformation[]',
        'tax_reporting_classification' => '\Adyen\Model\LegalEntityManagement\TaxReportingClassification',
        'type' => 'string',
        'vat_absence_reason' => 'string',
        'vat_number' => 'string',
        'web_data' => '\Adyen\Model\LegalEntityManagement\WebData'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'date_of_incorporation' => null,
        'description' => null,
        'doing_business_as' => null,
        'email' => null,
        'legal_name' => null,
        'phone' => null,
        'principal_place_of_business' => null,
        'registered_address' => null,
        'registration_number' => null,
        'stock_data' => null,
        'tax_information' => null,
        'tax_reporting_classification' => null,
        'type' => null,
        'vat_absence_reason' => null,
        'vat_number' => null,
        'web_data' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'date_of_incorporation' => false,
        'description' => false,
        'doing_business_as' => false,
        'email' => false,
        'legal_name' => false,
        'phone' => false,
        'principal_place_of_business' => false,
        'registered_address' => false,
        'registration_number' => false,
        'stock_data' => false,
        'tax_information' => false,
        'tax_reporting_classification' => false,
        'type' => false,
        'vat_absence_reason' => false,
        'vat_number' => false,
        'web_data' => false
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
        'date_of_incorporation' => 'dateOfIncorporation',
        'description' => 'description',
        'doing_business_as' => 'doingBusinessAs',
        'email' => 'email',
        'legal_name' => 'legalName',
        'phone' => 'phone',
        'principal_place_of_business' => 'principalPlaceOfBusiness',
        'registered_address' => 'registeredAddress',
        'registration_number' => 'registrationNumber',
        'stock_data' => 'stockData',
        'tax_information' => 'taxInformation',
        'tax_reporting_classification' => 'taxReportingClassification',
        'type' => 'type',
        'vat_absence_reason' => 'vatAbsenceReason',
        'vat_number' => 'vatNumber',
        'web_data' => 'webData'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'date_of_incorporation' => 'setDateOfIncorporation',
        'description' => 'setDescription',
        'doing_business_as' => 'setDoingBusinessAs',
        'email' => 'setEmail',
        'legal_name' => 'setLegalName',
        'phone' => 'setPhone',
        'principal_place_of_business' => 'setPrincipalPlaceOfBusiness',
        'registered_address' => 'setRegisteredAddress',
        'registration_number' => 'setRegistrationNumber',
        'stock_data' => 'setStockData',
        'tax_information' => 'setTaxInformation',
        'tax_reporting_classification' => 'setTaxReportingClassification',
        'type' => 'setType',
        'vat_absence_reason' => 'setVatAbsenceReason',
        'vat_number' => 'setVatNumber',
        'web_data' => 'setWebData'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'date_of_incorporation' => 'getDateOfIncorporation',
        'description' => 'getDescription',
        'doing_business_as' => 'getDoingBusinessAs',
        'email' => 'getEmail',
        'legal_name' => 'getLegalName',
        'phone' => 'getPhone',
        'principal_place_of_business' => 'getPrincipalPlaceOfBusiness',
        'registered_address' => 'getRegisteredAddress',
        'registration_number' => 'getRegistrationNumber',
        'stock_data' => 'getStockData',
        'tax_information' => 'getTaxInformation',
        'tax_reporting_classification' => 'getTaxReportingClassification',
        'type' => 'getType',
        'vat_absence_reason' => 'getVatAbsenceReason',
        'vat_number' => 'getVatNumber',
        'web_data' => 'getWebData'
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

    public const TYPE_ASSOCIATION_INCORPORATED = 'associationIncorporated';
    public const TYPE_GOVERNMENTAL_ORGANIZATION = 'governmentalOrganization';
    public const TYPE_LISTED_PUBLIC_COMPANY = 'listedPublicCompany';
    public const TYPE_NON_PROFIT = 'nonProfit';
    public const TYPE_PARTNERSHIP_INCORPORATED = 'partnershipIncorporated';
    public const TYPE_PRIVATE_COMPANY = 'privateCompany';
    public const VAT_ABSENCE_REASON_INDUSTRY_EXEMPTION = 'industryExemption';
    public const VAT_ABSENCE_REASON_BELOW_TAX_THRESHOLD = 'belowTaxThreshold';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_ASSOCIATION_INCORPORATED,
            self::TYPE_GOVERNMENTAL_ORGANIZATION,
            self::TYPE_LISTED_PUBLIC_COMPANY,
            self::TYPE_NON_PROFIT,
            self::TYPE_PARTNERSHIP_INCORPORATED,
            self::TYPE_PRIVATE_COMPANY,
        ];
    }
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
        $this->setIfExists('date_of_incorporation', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('doing_business_as', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('legal_name', $data ?? [], null);
        $this->setIfExists('phone', $data ?? [], null);
        $this->setIfExists('principal_place_of_business', $data ?? [], null);
        $this->setIfExists('registered_address', $data ?? [], null);
        $this->setIfExists('registration_number', $data ?? [], null);
        $this->setIfExists('stock_data', $data ?? [], null);
        $this->setIfExists('tax_information', $data ?? [], null);
        $this->setIfExists('tax_reporting_classification', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('vat_absence_reason', $data ?? [], null);
        $this->setIfExists('vat_number', $data ?? [], null);
        $this->setIfExists('web_data', $data ?? [], null);
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

        if ($this->container['legal_name'] === null) {
            $invalidProperties[] = "'legal_name' can't be null";
        }
        if ($this->container['registered_address'] === null) {
            $invalidProperties[] = "'registered_address' can't be null";
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
                implode("', '", $allowedValues)
            );
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
     * @param string|null $date_of_incorporation The date when the organization was incorporated in YYYY-MM-DD format.
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
     * @param string|null $description Your description for the organization.
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
     * @param string|null $doing_business_as The organization's trading name, if different from the registered legal name.
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
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email The email address of the legal entity.
     *
     * @return self
     */
    public function setEmail($email)
    {
        if (is_null($email)) {
            throw new \InvalidArgumentException('non-nullable email cannot be null');
        }
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets legal_name
     *
     * @return string
     */
    public function getLegalName()
    {
        return $this->container['legal_name'];
    }

    /**
     * Sets legal_name
     *
     * @param string $legal_name The organization's legal name.
     *
     * @return self
     */
    public function setLegalName($legal_name)
    {
        if (is_null($legal_name)) {
            throw new \InvalidArgumentException('non-nullable legal_name cannot be null');
        }
        $this->container['legal_name'] = $legal_name;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return \Adyen\Model\LegalEntityManagement\PhoneNumber|null
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param \Adyen\Model\LegalEntityManagement\PhoneNumber|null $phone phone
     *
     * @return self
     */
    public function setPhone($phone)
    {
        if (is_null($phone)) {
            throw new \InvalidArgumentException('non-nullable phone cannot be null');
        }
        $this->container['phone'] = $phone;

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
     * @param string|null $registration_number The organization's registration number.
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
     * Gets stock_data
     *
     * @return \Adyen\Model\LegalEntityManagement\StockData|null
     */
    public function getStockData()
    {
        return $this->container['stock_data'];
    }

    /**
     * Sets stock_data
     *
     * @param \Adyen\Model\LegalEntityManagement\StockData|null $stock_data stock_data
     *
     * @return self
     */
    public function setStockData($stock_data)
    {
        if (is_null($stock_data)) {
            throw new \InvalidArgumentException('non-nullable stock_data cannot be null');
        }
        $this->container['stock_data'] = $stock_data;

        return $this;
    }

    /**
     * Gets tax_information
     *
     * @return \Adyen\Model\LegalEntityManagement\TaxInformation[]|null
     */
    public function getTaxInformation()
    {
        return $this->container['tax_information'];
    }

    /**
     * Sets tax_information
     *
     * @param \Adyen\Model\LegalEntityManagement\TaxInformation[]|null $tax_information The tax information of the organization.
     *
     * @return self
     */
    public function setTaxInformation($tax_information)
    {
        if (is_null($tax_information)) {
            throw new \InvalidArgumentException('non-nullable tax_information cannot be null');
        }
        $this->container['tax_information'] = $tax_information;

        return $this;
    }

    /**
     * Gets tax_reporting_classification
     *
     * @return \Adyen\Model\LegalEntityManagement\TaxReportingClassification|null
     */
    public function getTaxReportingClassification()
    {
        return $this->container['tax_reporting_classification'];
    }

    /**
     * Sets tax_reporting_classification
     *
     * @param \Adyen\Model\LegalEntityManagement\TaxReportingClassification|null $tax_reporting_classification tax_reporting_classification
     *
     * @return self
     */
    public function setTaxReportingClassification($tax_reporting_classification)
    {
        if (is_null($tax_reporting_classification)) {
            throw new \InvalidArgumentException('non-nullable tax_reporting_classification cannot be null');
        }
        $this->container['tax_reporting_classification'] = $tax_reporting_classification;

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
     * @param string|null $type Type of organization.   Possible values: **associationIncorporated**, **governmentalOrganization**, **listedPublicCompany**, **nonProfit**, **partnershipIncorporated**, **privateCompany**.
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
     * @param string|null $vat_absence_reason The reason the organization has not provided a VAT number.  Possible values: **industryExemption**, **belowTaxThreshold**.
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
     * @param string|null $vat_number The organization's VAT number.
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
     * Gets web_data
     *
     * @return \Adyen\Model\LegalEntityManagement\WebData|null
     */
    public function getWebData()
    {
        return $this->container['web_data'];
    }

    /**
     * Sets web_data
     *
     * @param \Adyen\Model\LegalEntityManagement\WebData|null $web_data web_data
     *
     * @return self
     */
    public function setWebData($web_data)
    {
        if (is_null($web_data)) {
            throw new \InvalidArgumentException('non-nullable web_data cannot be null');
        }
        $this->container['web_data'] = $web_data;

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
