<?php

/**
 * Adyen Checkout API
 *
 * The version of the OpenAPI document: 70
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

/**
 * StoredPaymentMethod Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class StoredPaymentMethod implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'StoredPaymentMethod';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'brand' => 'string',
        'expiryMonth' => 'string',
        'expiryYear' => 'string',
        'holderName' => 'string',
        'iban' => 'string',
        'id' => 'string',
        'lastFour' => 'string',
        'name' => 'string',
        'networkTxReference' => 'string',
        'ownerName' => 'string',
        'shopperEmail' => 'string',
        'supportedRecurringProcessingModels' => 'string[]',
        'supportedShopperInteractions' => 'string[]',
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
        'brand' => null,
        'expiryMonth' => null,
        'expiryYear' => null,
        'holderName' => null,
        'iban' => null,
        'id' => null,
        'lastFour' => null,
        'name' => null,
        'networkTxReference' => null,
        'ownerName' => null,
        'shopperEmail' => null,
        'supportedRecurringProcessingModels' => null,
        'supportedShopperInteractions' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'brand' => false,
        'expiryMonth' => false,
        'expiryYear' => false,
        'holderName' => false,
        'iban' => false,
        'id' => false,
        'lastFour' => false,
        'name' => false,
        'networkTxReference' => false,
        'ownerName' => false,
        'shopperEmail' => false,
        'supportedRecurringProcessingModels' => false,
        'supportedShopperInteractions' => false,
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
        'brand' => 'brand',
        'expiryMonth' => 'expiryMonth',
        'expiryYear' => 'expiryYear',
        'holderName' => 'holderName',
        'iban' => 'iban',
        'id' => 'id',
        'lastFour' => 'lastFour',
        'name' => 'name',
        'networkTxReference' => 'networkTxReference',
        'ownerName' => 'ownerName',
        'shopperEmail' => 'shopperEmail',
        'supportedRecurringProcessingModels' => 'supportedRecurringProcessingModels',
        'supportedShopperInteractions' => 'supportedShopperInteractions',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'brand' => 'setBrand',
        'expiryMonth' => 'setExpiryMonth',
        'expiryYear' => 'setExpiryYear',
        'holderName' => 'setHolderName',
        'iban' => 'setIban',
        'id' => 'setId',
        'lastFour' => 'setLastFour',
        'name' => 'setName',
        'networkTxReference' => 'setNetworkTxReference',
        'ownerName' => 'setOwnerName',
        'shopperEmail' => 'setShopperEmail',
        'supportedRecurringProcessingModels' => 'setSupportedRecurringProcessingModels',
        'supportedShopperInteractions' => 'setSupportedShopperInteractions',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'brand' => 'getBrand',
        'expiryMonth' => 'getExpiryMonth',
        'expiryYear' => 'getExpiryYear',
        'holderName' => 'getHolderName',
        'iban' => 'getIban',
        'id' => 'getId',
        'lastFour' => 'getLastFour',
        'name' => 'getName',
        'networkTxReference' => 'getNetworkTxReference',
        'ownerName' => 'getOwnerName',
        'shopperEmail' => 'getShopperEmail',
        'supportedRecurringProcessingModels' => 'getSupportedRecurringProcessingModels',
        'supportedShopperInteractions' => 'getSupportedShopperInteractions',
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
        $this->setIfExists('brand', $data ?? [], null);
        $this->setIfExists('expiryMonth', $data ?? [], null);
        $this->setIfExists('expiryYear', $data ?? [], null);
        $this->setIfExists('holderName', $data ?? [], null);
        $this->setIfExists('iban', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('lastFour', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('networkTxReference', $data ?? [], null);
        $this->setIfExists('ownerName', $data ?? [], null);
        $this->setIfExists('shopperEmail', $data ?? [], null);
        $this->setIfExists('supportedRecurringProcessingModels', $data ?? [], null);
        $this->setIfExists('supportedShopperInteractions', $data ?? [], null);
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
     * Gets brand
     *
     * @return string|null
     */
    public function getBrand()
    {
        return $this->container['brand'];
    }

    /**
     * Sets brand
     *
     * @param string|null $brand The brand of the card.
     *
     * @return self
     */
    public function setBrand($brand)
    {
        if (is_null($brand)) {
            throw new \InvalidArgumentException('non-nullable brand cannot be null');
        }
        $this->container['brand'] = $brand;

        return $this;
    }

    /**
     * Gets expiryMonth
     *
     * @return string|null
     */
    public function getExpiryMonth()
    {
        return $this->container['expiryMonth'];
    }

    /**
     * Sets expiryMonth
     *
     * @param string|null $expiryMonth The month the card expires.
     *
     * @return self
     */
    public function setExpiryMonth($expiryMonth)
    {
        if (is_null($expiryMonth)) {
            throw new \InvalidArgumentException('non-nullable expiryMonth cannot be null');
        }
        $this->container['expiryMonth'] = $expiryMonth;

        return $this;
    }

    /**
     * Gets expiryYear
     *
     * @return string|null
     */
    public function getExpiryYear()
    {
        return $this->container['expiryYear'];
    }

    /**
     * Sets expiryYear
     *
     * @param string|null $expiryYear The last two digits of the year the card expires. For example, **22** for the year 2022.
     *
     * @return self
     */
    public function setExpiryYear($expiryYear)
    {
        if (is_null($expiryYear)) {
            throw new \InvalidArgumentException('non-nullable expiryYear cannot be null');
        }
        $this->container['expiryYear'] = $expiryYear;

        return $this;
    }

    /**
     * Gets holderName
     *
     * @return string|null
     */
    public function getHolderName()
    {
        return $this->container['holderName'];
    }

    /**
     * Sets holderName
     *
     * @param string|null $holderName The unique payment method code.
     *
     * @return self
     */
    public function setHolderName($holderName)
    {
        if (is_null($holderName)) {
            throw new \InvalidArgumentException('non-nullable holderName cannot be null');
        }
        $this->container['holderName'] = $holderName;

        return $this;
    }

    /**
     * Gets iban
     *
     * @return string|null
     */
    public function getIban()
    {
        return $this->container['iban'];
    }

    /**
     * Sets iban
     *
     * @param string|null $iban The IBAN of the bank account.
     *
     * @return self
     */
    public function setIban($iban)
    {
        if (is_null($iban)) {
            throw new \InvalidArgumentException('non-nullable iban cannot be null');
        }
        $this->container['iban'] = $iban;

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
     * @param string|null $id A unique identifier of this stored payment method.
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets lastFour
     *
     * @return string|null
     */
    public function getLastFour()
    {
        return $this->container['lastFour'];
    }

    /**
     * Sets lastFour
     *
     * @param string|null $lastFour The last four digits of the PAN.
     *
     * @return self
     */
    public function setLastFour($lastFour)
    {
        if (is_null($lastFour)) {
            throw new \InvalidArgumentException('non-nullable lastFour cannot be null');
        }
        $this->container['lastFour'] = $lastFour;

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
     * @param string|null $name The display name of the stored payment method.
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
     * Gets networkTxReference
     *
     * @return string|null
     */
    public function getNetworkTxReference()
    {
        return $this->container['networkTxReference'];
    }

    /**
     * Sets networkTxReference
     *
     * @param string|null $networkTxReference Returned in the response if you are not tokenizing with Adyen and are using the Merchant-initiated transactions (MIT) framework from Mastercard or Visa.  This contains either the Mastercard Trace ID or the Visa Transaction ID.
     *
     * @return self
     */
    public function setNetworkTxReference($networkTxReference)
    {
        if (is_null($networkTxReference)) {
            throw new \InvalidArgumentException('non-nullable networkTxReference cannot be null');
        }
        $this->container['networkTxReference'] = $networkTxReference;

        return $this;
    }

    /**
     * Gets ownerName
     *
     * @return string|null
     */
    public function getOwnerName()
    {
        return $this->container['ownerName'];
    }

    /**
     * Sets ownerName
     *
     * @param string|null $ownerName The name of the bank account holder.
     *
     * @return self
     */
    public function setOwnerName($ownerName)
    {
        if (is_null($ownerName)) {
            throw new \InvalidArgumentException('non-nullable ownerName cannot be null');
        }
        $this->container['ownerName'] = $ownerName;

        return $this;
    }

    /**
     * Gets shopperEmail
     *
     * @return string|null
     */
    public function getShopperEmail()
    {
        return $this->container['shopperEmail'];
    }

    /**
     * Sets shopperEmail
     *
     * @param string|null $shopperEmail The shopper’s email address.
     *
     * @return self
     */
    public function setShopperEmail($shopperEmail)
    {
        if (is_null($shopperEmail)) {
            throw new \InvalidArgumentException('non-nullable shopperEmail cannot be null');
        }
        $this->container['shopperEmail'] = $shopperEmail;

        return $this;
    }

    /**
     * Gets supportedRecurringProcessingModels
     *
     * @return string[]|null
     */
    public function getSupportedRecurringProcessingModels()
    {
        return $this->container['supportedRecurringProcessingModels'];
    }

    /**
     * Sets supportedRecurringProcessingModels
     *
     * @param string[]|null $supportedRecurringProcessingModels The supported recurring processing models for this stored payment method.
     *
     * @return self
     */
    public function setSupportedRecurringProcessingModels($supportedRecurringProcessingModels)
    {
        if (is_null($supportedRecurringProcessingModels)) {
            throw new \InvalidArgumentException('non-nullable supportedRecurringProcessingModels cannot be null');
        }
        $this->container['supportedRecurringProcessingModels'] = $supportedRecurringProcessingModels;

        return $this;
    }

    /**
     * Gets supportedShopperInteractions
     *
     * @return string[]|null
     */
    public function getSupportedShopperInteractions()
    {
        return $this->container['supportedShopperInteractions'];
    }

    /**
     * Sets supportedShopperInteractions
     *
     * @param string[]|null $supportedShopperInteractions The supported shopper interactions for this stored payment method.
     *
     * @return self
     */
    public function setSupportedShopperInteractions($supportedShopperInteractions)
    {
        if (is_null($supportedShopperInteractions)) {
            throw new \InvalidArgumentException('non-nullable supportedShopperInteractions cannot be null');
        }
        $this->container['supportedShopperInteractions'] = $supportedShopperInteractions;

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
     * @param string|null $type The type of payment method.
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
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
