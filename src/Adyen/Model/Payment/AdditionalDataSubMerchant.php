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


namespace Adyen\Model\Payment;

use \ArrayAccess;
use Adyen\Model\Payment\ObjectSerializer;

/**
 * AdditionalDataSubMerchant Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AdditionalDataSubMerchant implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AdditionalDataSubMerchant';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'subMerchantNumberOfSubSellers' => 'string',
        'subMerchantSubSellerSubSellerNrCity' => 'string',
        'subMerchantSubSellerSubSellerNrCountry' => 'string',
        'subMerchantSubSellerSubSellerNrId' => 'string',
        'subMerchantSubSellerSubSellerNrMcc' => 'string',
        'subMerchantSubSellerSubSellerNrName' => 'string',
        'subMerchantSubSellerSubSellerNrPostalCode' => 'string',
        'subMerchantSubSellerSubSellerNrState' => 'string',
        'subMerchantSubSellerSubSellerNrStreet' => 'string',
        'subMerchantSubSellerSubSellerNrTaxId' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'subMerchantNumberOfSubSellers' => null,
        'subMerchantSubSellerSubSellerNrCity' => null,
        'subMerchantSubSellerSubSellerNrCountry' => null,
        'subMerchantSubSellerSubSellerNrId' => null,
        'subMerchantSubSellerSubSellerNrMcc' => null,
        'subMerchantSubSellerSubSellerNrName' => null,
        'subMerchantSubSellerSubSellerNrPostalCode' => null,
        'subMerchantSubSellerSubSellerNrState' => null,
        'subMerchantSubSellerSubSellerNrStreet' => null,
        'subMerchantSubSellerSubSellerNrTaxId' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'subMerchantNumberOfSubSellers' => false,
        'subMerchantSubSellerSubSellerNrCity' => false,
        'subMerchantSubSellerSubSellerNrCountry' => false,
        'subMerchantSubSellerSubSellerNrId' => false,
        'subMerchantSubSellerSubSellerNrMcc' => false,
        'subMerchantSubSellerSubSellerNrName' => false,
        'subMerchantSubSellerSubSellerNrPostalCode' => false,
        'subMerchantSubSellerSubSellerNrState' => false,
        'subMerchantSubSellerSubSellerNrStreet' => false,
        'subMerchantSubSellerSubSellerNrTaxId' => false
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
        'subMerchantNumberOfSubSellers' => 'subMerchant.numberOfSubSellers',
        'subMerchantSubSellerSubSellerNrCity' => 'subMerchant.subSeller[subSellerNr].city',
        'subMerchantSubSellerSubSellerNrCountry' => 'subMerchant.subSeller[subSellerNr].country',
        'subMerchantSubSellerSubSellerNrId' => 'subMerchant.subSeller[subSellerNr].id',
        'subMerchantSubSellerSubSellerNrMcc' => 'subMerchant.subSeller[subSellerNr].mcc',
        'subMerchantSubSellerSubSellerNrName' => 'subMerchant.subSeller[subSellerNr].name',
        'subMerchantSubSellerSubSellerNrPostalCode' => 'subMerchant.subSeller[subSellerNr].postalCode',
        'subMerchantSubSellerSubSellerNrState' => 'subMerchant.subSeller[subSellerNr].state',
        'subMerchantSubSellerSubSellerNrStreet' => 'subMerchant.subSeller[subSellerNr].street',
        'subMerchantSubSellerSubSellerNrTaxId' => 'subMerchant.subSeller[subSellerNr].taxId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'subMerchantNumberOfSubSellers' => 'setSubMerchantNumberOfSubSellers',
        'subMerchantSubSellerSubSellerNrCity' => 'setSubMerchantSubSellerSubSellerNrCity',
        'subMerchantSubSellerSubSellerNrCountry' => 'setSubMerchantSubSellerSubSellerNrCountry',
        'subMerchantSubSellerSubSellerNrId' => 'setSubMerchantSubSellerSubSellerNrId',
        'subMerchantSubSellerSubSellerNrMcc' => 'setSubMerchantSubSellerSubSellerNrMcc',
        'subMerchantSubSellerSubSellerNrName' => 'setSubMerchantSubSellerSubSellerNrName',
        'subMerchantSubSellerSubSellerNrPostalCode' => 'setSubMerchantSubSellerSubSellerNrPostalCode',
        'subMerchantSubSellerSubSellerNrState' => 'setSubMerchantSubSellerSubSellerNrState',
        'subMerchantSubSellerSubSellerNrStreet' => 'setSubMerchantSubSellerSubSellerNrStreet',
        'subMerchantSubSellerSubSellerNrTaxId' => 'setSubMerchantSubSellerSubSellerNrTaxId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'subMerchantNumberOfSubSellers' => 'getSubMerchantNumberOfSubSellers',
        'subMerchantSubSellerSubSellerNrCity' => 'getSubMerchantSubSellerSubSellerNrCity',
        'subMerchantSubSellerSubSellerNrCountry' => 'getSubMerchantSubSellerSubSellerNrCountry',
        'subMerchantSubSellerSubSellerNrId' => 'getSubMerchantSubSellerSubSellerNrId',
        'subMerchantSubSellerSubSellerNrMcc' => 'getSubMerchantSubSellerSubSellerNrMcc',
        'subMerchantSubSellerSubSellerNrName' => 'getSubMerchantSubSellerSubSellerNrName',
        'subMerchantSubSellerSubSellerNrPostalCode' => 'getSubMerchantSubSellerSubSellerNrPostalCode',
        'subMerchantSubSellerSubSellerNrState' => 'getSubMerchantSubSellerSubSellerNrState',
        'subMerchantSubSellerSubSellerNrStreet' => 'getSubMerchantSubSellerSubSellerNrStreet',
        'subMerchantSubSellerSubSellerNrTaxId' => 'getSubMerchantSubSellerSubSellerNrTaxId'
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
        $this->setIfExists('subMerchantNumberOfSubSellers', $data ?? [], null);
        $this->setIfExists('subMerchantSubSellerSubSellerNrCity', $data ?? [], null);
        $this->setIfExists('subMerchantSubSellerSubSellerNrCountry', $data ?? [], null);
        $this->setIfExists('subMerchantSubSellerSubSellerNrId', $data ?? [], null);
        $this->setIfExists('subMerchantSubSellerSubSellerNrMcc', $data ?? [], null);
        $this->setIfExists('subMerchantSubSellerSubSellerNrName', $data ?? [], null);
        $this->setIfExists('subMerchantSubSellerSubSellerNrPostalCode', $data ?? [], null);
        $this->setIfExists('subMerchantSubSellerSubSellerNrState', $data ?? [], null);
        $this->setIfExists('subMerchantSubSellerSubSellerNrStreet', $data ?? [], null);
        $this->setIfExists('subMerchantSubSellerSubSellerNrTaxId', $data ?? [], null);
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
     * Gets subMerchantNumberOfSubSellers
     *
     * @return string|null
     */
    public function getSubMerchantNumberOfSubSellers()
    {
        return $this->container['subMerchantNumberOfSubSellers'];
    }

    /**
     * Sets subMerchantNumberOfSubSellers
     *
     * @param string|null $subMerchantNumberOfSubSellers Required for transactions performed by registered payment facilitators. Indicates the number of sub-merchants contained in the request. For example, **3**.
     *
     * @return self
     */
    public function setSubMerchantNumberOfSubSellers($subMerchantNumberOfSubSellers)
    {
        if (is_null($subMerchantNumberOfSubSellers)) {
            throw new \InvalidArgumentException('non-nullable subMerchantNumberOfSubSellers cannot be null');
        }
        $this->container['subMerchantNumberOfSubSellers'] = $subMerchantNumberOfSubSellers;

        return $this;
    }

    /**
     * Gets subMerchantSubSellerSubSellerNrCity
     *
     * @return string|null
     */
    public function getSubMerchantSubSellerSubSellerNrCity()
    {
        return $this->container['subMerchantSubSellerSubSellerNrCity'];
    }

    /**
     * Sets subMerchantSubSellerSubSellerNrCity
     *
     * @param string|null $subMerchantSubSellerSubSellerNrCity Required for transactions performed by registered payment facilitators. The city of the sub-merchant's address. * Format: Alphanumeric * Maximum length: 13 characters
     *
     * @return self
     */
    public function setSubMerchantSubSellerSubSellerNrCity($subMerchantSubSellerSubSellerNrCity)
    {
        if (is_null($subMerchantSubSellerSubSellerNrCity)) {
            throw new \InvalidArgumentException('non-nullable subMerchantSubSellerSubSellerNrCity cannot be null');
        }
        $this->container['subMerchantSubSellerSubSellerNrCity'] = $subMerchantSubSellerSubSellerNrCity;

        return $this;
    }

    /**
     * Gets subMerchantSubSellerSubSellerNrCountry
     *
     * @return string|null
     */
    public function getSubMerchantSubSellerSubSellerNrCountry()
    {
        return $this->container['subMerchantSubSellerSubSellerNrCountry'];
    }

    /**
     * Sets subMerchantSubSellerSubSellerNrCountry
     *
     * @param string|null $subMerchantSubSellerSubSellerNrCountry Required for transactions performed by registered payment facilitators. The three-letter country code of the sub-merchant's address. For example, **BRA** for Brazil.  * Format: [ISO 3166-1 alpha-3](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-3) * Fixed length: 3 characters
     *
     * @return self
     */
    public function setSubMerchantSubSellerSubSellerNrCountry($subMerchantSubSellerSubSellerNrCountry)
    {
        if (is_null($subMerchantSubSellerSubSellerNrCountry)) {
            throw new \InvalidArgumentException('non-nullable subMerchantSubSellerSubSellerNrCountry cannot be null');
        }
        $this->container['subMerchantSubSellerSubSellerNrCountry'] = $subMerchantSubSellerSubSellerNrCountry;

        return $this;
    }

    /**
     * Gets subMerchantSubSellerSubSellerNrId
     *
     * @return string|null
     */
    public function getSubMerchantSubSellerSubSellerNrId()
    {
        return $this->container['subMerchantSubSellerSubSellerNrId'];
    }

    /**
     * Sets subMerchantSubSellerSubSellerNrId
     *
     * @param string|null $subMerchantSubSellerSubSellerNrId Required for transactions performed by registered payment facilitators. A unique identifier that you create for the sub-merchant, used by schemes to identify the sub-merchant.  * Format: Alphanumeric * Maximum length: 15 characters
     *
     * @return self
     */
    public function setSubMerchantSubSellerSubSellerNrId($subMerchantSubSellerSubSellerNrId)
    {
        if (is_null($subMerchantSubSellerSubSellerNrId)) {
            throw new \InvalidArgumentException('non-nullable subMerchantSubSellerSubSellerNrId cannot be null');
        }
        $this->container['subMerchantSubSellerSubSellerNrId'] = $subMerchantSubSellerSubSellerNrId;

        return $this;
    }

    /**
     * Gets subMerchantSubSellerSubSellerNrMcc
     *
     * @return string|null
     */
    public function getSubMerchantSubSellerSubSellerNrMcc()
    {
        return $this->container['subMerchantSubSellerSubSellerNrMcc'];
    }

    /**
     * Sets subMerchantSubSellerSubSellerNrMcc
     *
     * @param string|null $subMerchantSubSellerSubSellerNrMcc Required for transactions performed by registered payment facilitators. The sub-merchant's 4-digit Merchant Category Code (MCC).  * Format: Numeric * Fixed length: 4 digits
     *
     * @return self
     */
    public function setSubMerchantSubSellerSubSellerNrMcc($subMerchantSubSellerSubSellerNrMcc)
    {
        if (is_null($subMerchantSubSellerSubSellerNrMcc)) {
            throw new \InvalidArgumentException('non-nullable subMerchantSubSellerSubSellerNrMcc cannot be null');
        }
        $this->container['subMerchantSubSellerSubSellerNrMcc'] = $subMerchantSubSellerSubSellerNrMcc;

        return $this;
    }

    /**
     * Gets subMerchantSubSellerSubSellerNrName
     *
     * @return string|null
     */
    public function getSubMerchantSubSellerSubSellerNrName()
    {
        return $this->container['subMerchantSubSellerSubSellerNrName'];
    }

    /**
     * Sets subMerchantSubSellerSubSellerNrName
     *
     * @param string|null $subMerchantSubSellerSubSellerNrName Required for transactions performed by registered payment facilitators. The name of the sub-merchant. Based on scheme specifications, this value will overwrite the shopper statement  that will appear in the card statement. * Format: Alphanumeric * Maximum length: 22 characters
     *
     * @return self
     */
    public function setSubMerchantSubSellerSubSellerNrName($subMerchantSubSellerSubSellerNrName)
    {
        if (is_null($subMerchantSubSellerSubSellerNrName)) {
            throw new \InvalidArgumentException('non-nullable subMerchantSubSellerSubSellerNrName cannot be null');
        }
        $this->container['subMerchantSubSellerSubSellerNrName'] = $subMerchantSubSellerSubSellerNrName;

        return $this;
    }

    /**
     * Gets subMerchantSubSellerSubSellerNrPostalCode
     *
     * @return string|null
     */
    public function getSubMerchantSubSellerSubSellerNrPostalCode()
    {
        return $this->container['subMerchantSubSellerSubSellerNrPostalCode'];
    }

    /**
     * Sets subMerchantSubSellerSubSellerNrPostalCode
     *
     * @param string|null $subMerchantSubSellerSubSellerNrPostalCode Required for transactions performed by registered payment facilitators. The postal code of the sub-merchant's address, without dashes. * Format: Numeric * Fixed length: 8 digits
     *
     * @return self
     */
    public function setSubMerchantSubSellerSubSellerNrPostalCode($subMerchantSubSellerSubSellerNrPostalCode)
    {
        if (is_null($subMerchantSubSellerSubSellerNrPostalCode)) {
            throw new \InvalidArgumentException('non-nullable subMerchantSubSellerSubSellerNrPostalCode cannot be null');
        }
        $this->container['subMerchantSubSellerSubSellerNrPostalCode'] = $subMerchantSubSellerSubSellerNrPostalCode;

        return $this;
    }

    /**
     * Gets subMerchantSubSellerSubSellerNrState
     *
     * @return string|null
     */
    public function getSubMerchantSubSellerSubSellerNrState()
    {
        return $this->container['subMerchantSubSellerSubSellerNrState'];
    }

    /**
     * Sets subMerchantSubSellerSubSellerNrState
     *
     * @param string|null $subMerchantSubSellerSubSellerNrState Required for transactions performed by registered payment facilitators. The state code of the sub-merchant's address, if applicable to the country. * Format: Alphanumeric * Maximum length: 2 characters
     *
     * @return self
     */
    public function setSubMerchantSubSellerSubSellerNrState($subMerchantSubSellerSubSellerNrState)
    {
        if (is_null($subMerchantSubSellerSubSellerNrState)) {
            throw new \InvalidArgumentException('non-nullable subMerchantSubSellerSubSellerNrState cannot be null');
        }
        $this->container['subMerchantSubSellerSubSellerNrState'] = $subMerchantSubSellerSubSellerNrState;

        return $this;
    }

    /**
     * Gets subMerchantSubSellerSubSellerNrStreet
     *
     * @return string|null
     */
    public function getSubMerchantSubSellerSubSellerNrStreet()
    {
        return $this->container['subMerchantSubSellerSubSellerNrStreet'];
    }

    /**
     * Sets subMerchantSubSellerSubSellerNrStreet
     *
     * @param string|null $subMerchantSubSellerSubSellerNrStreet Required for transactions performed by registered payment facilitators. The street name and house number of the sub-merchant's address. * Format: Alphanumeric * Maximum length: 60 characters
     *
     * @return self
     */
    public function setSubMerchantSubSellerSubSellerNrStreet($subMerchantSubSellerSubSellerNrStreet)
    {
        if (is_null($subMerchantSubSellerSubSellerNrStreet)) {
            throw new \InvalidArgumentException('non-nullable subMerchantSubSellerSubSellerNrStreet cannot be null');
        }
        $this->container['subMerchantSubSellerSubSellerNrStreet'] = $subMerchantSubSellerSubSellerNrStreet;

        return $this;
    }

    /**
     * Gets subMerchantSubSellerSubSellerNrTaxId
     *
     * @return string|null
     */
    public function getSubMerchantSubSellerSubSellerNrTaxId()
    {
        return $this->container['subMerchantSubSellerSubSellerNrTaxId'];
    }

    /**
     * Sets subMerchantSubSellerSubSellerNrTaxId
     *
     * @param string|null $subMerchantSubSellerSubSellerNrTaxId Required for transactions performed by registered payment facilitators. The tax ID of the sub-merchant. * Format: Numeric * Fixed length: 11 digits for the CPF or 14 digits for the CNPJ
     *
     * @return self
     */
    public function setSubMerchantSubSellerSubSellerNrTaxId($subMerchantSubSellerSubSellerNrTaxId)
    {
        if (is_null($subMerchantSubSellerSubSellerNrTaxId)) {
            throw new \InvalidArgumentException('non-nullable subMerchantSubSellerSubSellerNrTaxId cannot be null');
        }
        $this->container['subMerchantSubSellerSubSellerNrTaxId'] = $subMerchantSubSellerSubSellerNrTaxId;

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
