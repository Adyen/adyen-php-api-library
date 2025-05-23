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
 * GetAcceptedTermsOfServiceDocumentResponse Class Doc Comment
 *
 * @package  Adyen
 * @implements \ArrayAccess<string, mixed>
 */
class GetAcceptedTermsOfServiceDocumentResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'GetAcceptedTermsOfServiceDocumentResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'document' => 'string',
        'id' => 'string',
        'termsOfServiceAcceptanceReference' => 'string',
        'termsOfServiceDocumentFormat' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'document' => 'byte',
        'id' => null,
        'termsOfServiceAcceptanceReference' => null,
        'termsOfServiceDocumentFormat' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'document' => false,
        'id' => false,
        'termsOfServiceAcceptanceReference' => false,
        'termsOfServiceDocumentFormat' => false
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
        'document' => 'document',
        'id' => 'id',
        'termsOfServiceAcceptanceReference' => 'termsOfServiceAcceptanceReference',
        'termsOfServiceDocumentFormat' => 'termsOfServiceDocumentFormat'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'document' => 'setDocument',
        'id' => 'setId',
        'termsOfServiceAcceptanceReference' => 'setTermsOfServiceAcceptanceReference',
        'termsOfServiceDocumentFormat' => 'setTermsOfServiceDocumentFormat'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'document' => 'getDocument',
        'id' => 'getId',
        'termsOfServiceAcceptanceReference' => 'getTermsOfServiceAcceptanceReference',
        'termsOfServiceDocumentFormat' => 'getTermsOfServiceDocumentFormat'
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

    public const TERMS_OF_SERVICE_DOCUMENT_FORMAT_JSON = 'JSON';
    public const TERMS_OF_SERVICE_DOCUMENT_FORMAT_PDF = 'PDF';
    public const TERMS_OF_SERVICE_DOCUMENT_FORMAT_TXT = 'TXT';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTermsOfServiceDocumentFormatAllowableValues()
    {
        return [
            self::TERMS_OF_SERVICE_DOCUMENT_FORMAT_JSON,
            self::TERMS_OF_SERVICE_DOCUMENT_FORMAT_PDF,
            self::TERMS_OF_SERVICE_DOCUMENT_FORMAT_TXT,
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
        $this->setIfExists('document', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('termsOfServiceAcceptanceReference', $data ?? [], null);
        $this->setIfExists('termsOfServiceDocumentFormat', $data ?? [], null);
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

        $allowedValues = $this->getTermsOfServiceDocumentFormatAllowableValues();
        if (!is_null($this->container['termsOfServiceDocumentFormat']) && !in_array($this->container['termsOfServiceDocumentFormat'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'termsOfServiceDocumentFormat', must be one of '%s'",
                $this->container['termsOfServiceDocumentFormat'],
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
     * Gets document
     *
     * @return string|null
     */
    public function getDocument()
    {
        return $this->container['document'];
    }

    /**
     * Sets document
     *
     * @param string|null $document The accepted Terms of Service document in the requested format represented as a Base64-encoded bytes array.
     *
     * @return self
     */
    public function setDocument($document)
    {
        $this->container['document'] = $document;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id The unique identifier of the legal entity.
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets termsOfServiceAcceptanceReference
     *
     * @return string|null
     */
    public function getTermsOfServiceAcceptanceReference()
    {
        return $this->container['termsOfServiceAcceptanceReference'];
    }

    /**
     * Sets termsOfServiceAcceptanceReference
     *
     * @param string|null $termsOfServiceAcceptanceReference An Adyen-generated reference for the accepted Terms of Service.
     *
     * @return self
     */
    public function setTermsOfServiceAcceptanceReference($termsOfServiceAcceptanceReference)
    {
        $this->container['termsOfServiceAcceptanceReference'] = $termsOfServiceAcceptanceReference;

        return $this;
    }

    /**
     * Gets termsOfServiceDocumentFormat
     *
     * @return string|null
     */
    public function getTermsOfServiceDocumentFormat()
    {
        return $this->container['termsOfServiceDocumentFormat'];
    }

    /**
     * Sets termsOfServiceDocumentFormat
     *
     * @param string|null $termsOfServiceDocumentFormat The format of the Terms of Service document.
     *
     * @return self
     */
    public function setTermsOfServiceDocumentFormat($termsOfServiceDocumentFormat)
    {
        $allowedValues = $this->getTermsOfServiceDocumentFormatAllowableValues();
        if (!in_array($termsOfServiceDocumentFormat, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'termsOfServiceDocumentFormat', must be one of '%s'",
                    $termsOfServiceDocumentFormat,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['termsOfServiceDocumentFormat'] = $termsOfServiceDocumentFormat;

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
