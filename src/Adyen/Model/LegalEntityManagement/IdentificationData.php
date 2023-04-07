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
 * IdentificationData Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class IdentificationData implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'IdentificationData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'card_number' => 'string',
        'expiry_date' => 'string',
        'issuer_country' => 'string',
        'issuer_state' => 'string',
        'national_id_exempt' => 'bool',
        'number' => 'string',
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
        'card_number' => null,
        'expiry_date' => null,
        'issuer_country' => null,
        'issuer_state' => null,
        'national_id_exempt' => null,
        'number' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'card_number' => false,
        'expiry_date' => false,
        'issuer_country' => false,
        'issuer_state' => false,
        'national_id_exempt' => false,
        'number' => false,
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
        'card_number' => 'cardNumber',
        'expiry_date' => 'expiryDate',
        'issuer_country' => 'issuerCountry',
        'issuer_state' => 'issuerState',
        'national_id_exempt' => 'nationalIdExempt',
        'number' => 'number',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'card_number' => 'setCardNumber',
        'expiry_date' => 'setExpiryDate',
        'issuer_country' => 'setIssuerCountry',
        'issuer_state' => 'setIssuerState',
        'national_id_exempt' => 'setNationalIdExempt',
        'number' => 'setNumber',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'card_number' => 'getCardNumber',
        'expiry_date' => 'getExpiryDate',
        'issuer_country' => 'getIssuerCountry',
        'issuer_state' => 'getIssuerState',
        'national_id_exempt' => 'getNationalIdExempt',
        'number' => 'getNumber',
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

    public const TYPE_BANK_STATEMENT = 'bankStatement';
    public const TYPE_DRIVERS_LICENSE = 'driversLicense';
    public const TYPE_IDENTITY_CARD = 'identityCard';
    public const TYPE_NATIONAL_ID_NUMBER = 'nationalIdNumber';
    public const TYPE_PASSPORT = 'passport';
    public const TYPE_PROOF_OF_ADDRESS = 'proofOfAddress';
    public const TYPE_PROOF_OF_NATIONAL_ID_NUMBER = 'proofOfNationalIdNumber';
    public const TYPE_PROOF_OF_RESIDENCY = 'proofOfResidency';
    public const TYPE_REGISTRATION_DOCUMENT = 'registrationDocument';
    public const TYPE_VAT_DOCUMENT = 'vatDocument';
    public const TYPE_PROOF_OF_ORGANIZATION_TAX_INFO = 'proofOfOrganizationTaxInfo';
    public const TYPE_PROOF_OF_INDUSTRY = 'proofOfIndustry';
    public const TYPE_CONSTITUTIONAL_DOCUMENT = 'constitutionalDocument';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_BANK_STATEMENT,
            self::TYPE_DRIVERS_LICENSE,
            self::TYPE_IDENTITY_CARD,
            self::TYPE_NATIONAL_ID_NUMBER,
            self::TYPE_PASSPORT,
            self::TYPE_PROOF_OF_ADDRESS,
            self::TYPE_PROOF_OF_NATIONAL_ID_NUMBER,
            self::TYPE_PROOF_OF_RESIDENCY,
            self::TYPE_REGISTRATION_DOCUMENT,
            self::TYPE_VAT_DOCUMENT,
            self::TYPE_PROOF_OF_ORGANIZATION_TAX_INFO,
            self::TYPE_PROOF_OF_INDUSTRY,
            self::TYPE_CONSTITUTIONAL_DOCUMENT,
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
        $this->setIfExists('card_number', $data ?? [], null);
        $this->setIfExists('expiry_date', $data ?? [], null);
        $this->setIfExists('issuer_country', $data ?? [], null);
        $this->setIfExists('issuer_state', $data ?? [], null);
        $this->setIfExists('national_id_exempt', $data ?? [], null);
        $this->setIfExists('number', $data ?? [], null);
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

        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
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
     * Gets card_number
     *
     * @return string|null
     */
    public function getCardNumber()
    {
        return $this->container['card_number'];
    }

    /**
     * Sets card_number
     *
     * @param string|null $card_number The card number of the document that was issued (AU only).
     *
     * @return self
     */
    public function setCardNumber($card_number)
    {
        if (is_null($card_number)) {
            throw new \InvalidArgumentException('non-nullable card_number cannot be null');
        }
        $this->container['card_number'] = $card_number;

        return $this;
    }

    /**
     * Gets expiry_date
     *
     * @return string|null
     * @deprecated
     */
    public function getExpiryDate()
    {
        return $this->container['expiry_date'];
    }

    /**
     * Sets expiry_date
     *
     * @param string|null $expiry_date The expiry date of the document, in YYYY-MM-DD format.
     *
     * @return self
     * @deprecated
     */
    public function setExpiryDate($expiry_date)
    {
        if (is_null($expiry_date)) {
            throw new \InvalidArgumentException('non-nullable expiry_date cannot be null');
        }
        $this->container['expiry_date'] = $expiry_date;

        return $this;
    }

    /**
     * Gets issuer_country
     *
     * @return string|null
     * @deprecated
     */
    public function getIssuerCountry()
    {
        return $this->container['issuer_country'];
    }

    /**
     * Sets issuer_country
     *
     * @param string|null $issuer_country The two-character [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) country code where the document was issued. For example, **US**.
     *
     * @return self
     * @deprecated
     */
    public function setIssuerCountry($issuer_country)
    {
        if (is_null($issuer_country)) {
            throw new \InvalidArgumentException('non-nullable issuer_country cannot be null');
        }
        $this->container['issuer_country'] = $issuer_country;

        return $this;
    }

    /**
     * Gets issuer_state
     *
     * @return string|null
     */
    public function getIssuerState()
    {
        return $this->container['issuer_state'];
    }

    /**
     * Sets issuer_state
     *
     * @param string|null $issuer_state The state or province where the document was issued (AU only).
     *
     * @return self
     */
    public function setIssuerState($issuer_state)
    {
        if (is_null($issuer_state)) {
            throw new \InvalidArgumentException('non-nullable issuer_state cannot be null');
        }
        $this->container['issuer_state'] = $issuer_state;

        return $this;
    }

    /**
     * Gets national_id_exempt
     *
     * @return bool|null
     */
    public function getNationalIdExempt()
    {
        return $this->container['national_id_exempt'];
    }

    /**
     * Sets national_id_exempt
     *
     * @param bool|null $national_id_exempt Applies only to individuals in the US. Set to **true** if the individual does not have an SSN. To verify their identity, Adyen will require them to upload an ID document.
     *
     * @return self
     */
    public function setNationalIdExempt($national_id_exempt)
    {
        if (is_null($national_id_exempt)) {
            throw new \InvalidArgumentException('non-nullable national_id_exempt cannot be null');
        }
        $this->container['national_id_exempt'] = $national_id_exempt;

        return $this;
    }

    /**
     * Gets number
     *
     * @return string|null
     */
    public function getNumber()
    {
        return $this->container['number'];
    }

    /**
     * Sets number
     *
     * @param string|null $number The number in the document.
     *
     * @return self
     */
    public function setNumber($number)
    {
        if (is_null($number)) {
            throw new \InvalidArgumentException('non-nullable number cannot be null');
        }
        $this->container['number'] = $number;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type Type of document, used when providing an ID number or uploading a document. The possible values depend on the legal entity type.  When providing ID numbers: * For **individual**, the `type` values can be **driversLicense**, **identityCard**, **nationalIdNumber**, or **passport**.  When uploading photo IDs: * For **individual**, the `type` values can be **identityCard**, **driversLicense**, or **passport**.  When uploading other documents: * For **organization**, the `type` values can be **proofOfAddress**, **registrationDocument**, **vatDocument**, **proofOfOrganizationTaxInfo**, **proofOfOwnership**, or **proofOfIndustry**.   * For **individual**, the `type` values can be **identityCard**, **driversLicense**, **passport**, **proofOfNationalIdNumber**, **proofOfResidency**, **proofOfIndustry**, or **proofOfIndividualTaxId**.  * For **soleProprietorship**, the `type` values can be **constitutionalDocument**, **proofOfAddress**, or **proofOfIndustry**.  * Use **bankStatement** to upload documents for a [transfer instrument](https://docs.adyen.com/api-explorer/#/legalentity/latest/post/transferInstruments__resParam_id).
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