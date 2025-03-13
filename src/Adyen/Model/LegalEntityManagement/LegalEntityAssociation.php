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
 * LegalEntityAssociation Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class LegalEntityAssociation implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'LegalEntityAssociation';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'associatorId' => 'string',
        'entityType' => 'string',
        'jobTitle' => 'string',
        'legalEntityId' => 'string',
        'name' => 'string',
        'nominee' => 'bool',
        'relationship' => 'string',
        'settlorExemptionReason' => 'string[]',
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
        'associatorId' => null,
        'entityType' => null,
        'jobTitle' => null,
        'legalEntityId' => null,
        'name' => null,
        'nominee' => null,
        'relationship' => null,
        'settlorExemptionReason' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'associatorId' => false,
        'entityType' => false,
        'jobTitle' => false,
        'legalEntityId' => false,
        'name' => false,
        'nominee' => false,
        'relationship' => false,
        'settlorExemptionReason' => false,
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
        'associatorId' => 'associatorId',
        'entityType' => 'entityType',
        'jobTitle' => 'jobTitle',
        'legalEntityId' => 'legalEntityId',
        'name' => 'name',
        'nominee' => 'nominee',
        'relationship' => 'relationship',
        'settlorExemptionReason' => 'settlorExemptionReason',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'associatorId' => 'setAssociatorId',
        'entityType' => 'setEntityType',
        'jobTitle' => 'setJobTitle',
        'legalEntityId' => 'setLegalEntityId',
        'name' => 'setName',
        'nominee' => 'setNominee',
        'relationship' => 'setRelationship',
        'settlorExemptionReason' => 'setSettlorExemptionReason',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'associatorId' => 'getAssociatorId',
        'entityType' => 'getEntityType',
        'jobTitle' => 'getJobTitle',
        'legalEntityId' => 'getLegalEntityId',
        'name' => 'getName',
        'nominee' => 'getNominee',
        'relationship' => 'getRelationship',
        'settlorExemptionReason' => 'getSettlorExemptionReason',
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

    public const TYPE_DEFINED_BENEFICIARY = 'definedBeneficiary';
    public const TYPE_DIRECTOR = 'director';
    public const TYPE_IMMEDIATE_PARENT_COMPANY = 'immediateParentCompany';
    public const TYPE_LEGAL_REPRESENTATIVE = 'legalRepresentative';
    public const TYPE_PCI_SIGNATORY = 'pciSignatory';
    public const TYPE_PROTECTOR = 'protector';
    public const TYPE_SECONDARY_PARTNER = 'secondaryPartner';
    public const TYPE_SECONDARY_TRUSTEE = 'secondaryTrustee';
    public const TYPE_SETTLOR = 'settlor';
    public const TYPE_SIGNATORY = 'signatory';
    public const TYPE_SOLE_PROPRIETORSHIP = 'soleProprietorship';
    public const TYPE_TRUST = 'trust';
    public const TYPE_TRUST_OWNERSHIP = 'trustOwnership';
    public const TYPE_UBO_THROUGH_CONTROL = 'uboThroughControl';
    public const TYPE_UBO_THROUGH_OWNERSHIP = 'uboThroughOwnership';
    public const TYPE_ULTIMATE_PARENT_COMPANY = 'ultimateParentCompany';
    public const TYPE_UNDEFINED_BENEFICIARY = 'undefinedBeneficiary';
    public const TYPE_UNINCORPORATED_PARTNERSHIP = 'unincorporatedPartnership';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_DEFINED_BENEFICIARY,
            self::TYPE_DIRECTOR,
            self::TYPE_IMMEDIATE_PARENT_COMPANY,
            self::TYPE_LEGAL_REPRESENTATIVE,
            self::TYPE_PCI_SIGNATORY,
            self::TYPE_PROTECTOR,
            self::TYPE_SECONDARY_PARTNER,
            self::TYPE_SECONDARY_TRUSTEE,
            self::TYPE_SETTLOR,
            self::TYPE_SIGNATORY,
            self::TYPE_SOLE_PROPRIETORSHIP,
            self::TYPE_TRUST,
            self::TYPE_TRUST_OWNERSHIP,
            self::TYPE_UBO_THROUGH_CONTROL,
            self::TYPE_UBO_THROUGH_OWNERSHIP,
            self::TYPE_ULTIMATE_PARENT_COMPANY,
            self::TYPE_UNDEFINED_BENEFICIARY,
            self::TYPE_UNINCORPORATED_PARTNERSHIP,
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
        $this->setIfExists('associatorId', $data ?? [], null);
        $this->setIfExists('entityType', $data ?? [], null);
        $this->setIfExists('jobTitle', $data ?? [], null);
        $this->setIfExists('legalEntityId', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('nominee', $data ?? [], null);
        $this->setIfExists('relationship', $data ?? [], null);
        $this->setIfExists('settlorExemptionReason', $data ?? [], null);
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

        if ($this->container['legalEntityId'] === null) {
            $invalidProperties[] = "'legalEntityId' can't be null";
        }
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
     * Gets associatorId
     *
     * @return string|null
     */
    public function getAssociatorId()
    {
        return $this->container['associatorId'];
    }

    /**
     * Sets associatorId
     *
     * @param string|null $associatorId The unique identifier of another legal entity with which the `legalEntityId` is associated. When the `legalEntityId` is associated to legal entities other than the current one, the response returns all the associations.
     *
     * @return self
     */
    public function setAssociatorId($associatorId)
    {
        $this->container['associatorId'] = $associatorId;

        return $this;
    }

    /**
     * Gets entityType
     *
     * @return string|null
     */
    public function getEntityType()
    {
        return $this->container['entityType'];
    }

    /**
     * Sets entityType
     *
     * @param string|null $entityType The legal entity type of associated legal entity.  For example, **organization**, **soleProprietorship** or **individual**.
     *
     * @return self
     */
    public function setEntityType($entityType)
    {
        $this->container['entityType'] = $entityType;

        return $this;
    }

    /**
     * Gets jobTitle
     *
     * @return string|null
     */
    public function getJobTitle()
    {
        return $this->container['jobTitle'];
    }

    /**
     * Sets jobTitle
     *
     * @param string|null $jobTitle The individual's job title if the `type` is **uboThroughControl** or **signatory**.
     *
     * @return self
     */
    public function setJobTitle($jobTitle)
    {
        $this->container['jobTitle'] = $jobTitle;

        return $this;
    }

    /**
     * Gets legalEntityId
     *
     * @return string
     */
    public function getLegalEntityId()
    {
        return $this->container['legalEntityId'];
    }

    /**
     * Sets legalEntityId
     *
     * @param string $legalEntityId The unique identifier of the associated [legal entity](https://docs.adyen.com/api-explorer/legalentity/latest/post/legalEntities#responses-200-id).
     *
     * @return self
     */
    public function setLegalEntityId($legalEntityId)
    {
        $this->container['legalEntityId'] = $legalEntityId;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name The name of the associated [legal entity](https://docs.adyen.com/api-explorer/legalentity/latest/post/legalEntities#responses-200-id).  - For **individual**, `name.firstName` and `name.lastName`. - For **organization**, `legalName`. - For **soleProprietorship**, `name`.
     *
     * @return self
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets nominee
     *
     * @return bool|null
     */
    public function getNominee()
    {
        return $this->container['nominee'];
    }

    /**
     * Sets nominee
     *
     * @param bool|null $nominee Default value: **false** Set to **true** if the entity association `type` **director**, **secondaryPartner** or **shareholder** is also a nominee. Only applicable to New Zealand.
     *
     * @return self
     */
    public function setNominee($nominee)
    {
        $this->container['nominee'] = $nominee;

        return $this;
    }

    /**
     * Gets relationship
     *
     * @return string|null
     */
    public function getRelationship()
    {
        return $this->container['relationship'];
    }

    /**
     * Sets relationship
     *
     * @param string|null $relationship The individual's relationship to a legal representative if the `type` is **legalRepresentative**. Possible values: **parent**, **guardian**.
     *
     * @return self
     */
    public function setRelationship($relationship)
    {
        $this->container['relationship'] = $relationship;

        return $this;
    }

    /**
     * Gets settlorExemptionReason
     *
     * @return string[]|null
     */
    public function getSettlorExemptionReason()
    {
        return $this->container['settlorExemptionReason'];
    }

    /**
     * Sets settlorExemptionReason
     *
     * @param string[]|null $settlorExemptionReason Defines the KYC exemption reason for a settlor associated with a trust. Only applicable to trusts in Australia.  For example, **professionalServiceProvider**, **deceased**, or **contributionBelowThreshold**.
     *
     * @return self
     */
    public function setSettlorExemptionReason($settlorExemptionReason)
    {
        $this->container['settlorExemptionReason'] = $settlorExemptionReason;

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
     * @param string $type Defines the relationship of the legal entity to the current legal entity.  Possible value for individuals: **legalRepresentative**.  Possible values for organizations: **director**, **signatory**, **trustOwnership**, **uboThroughOwnership**, **uboThroughControl**, or **ultimateParentCompany**.  Possible values for sole proprietorships: **soleProprietorship**.  Possible value for trusts: **trust**.  Possible values for trust members: **definedBeneficiary**, **protector**, **secondaryTrustee**, **settlor**, **uboThroughControl**, or **uboThroughOwnership**.  Possible value for unincorporated partnership: **unincorporatedPartnership**.  Possible values for unincorporated partnership members: **secondaryPartner**, **uboThroughControl**, **uboThroughOwnership**
     *
     * @return self
     */
    public function setType($type)
    {
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
