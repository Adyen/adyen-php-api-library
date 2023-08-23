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
 * StoredPaymentMethodResource Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class StoredPaymentMethodResource implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'StoredPaymentMethodResource';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'brand' => 'string',
        'expiryMonth' => 'string',
        'expiryYear' => 'string',
        'externalResponseCode' => 'string',
        'externalTokenReference' => 'string',
        'holderName' => 'string',
        'iban' => 'string',
        'id' => 'string',
        'issuerName' => 'string',
        'lastFour' => 'string',
        'name' => 'string',
        'networkTxReference' => 'string',
        'ownerName' => 'string',
        'shopperEmail' => 'string',
        'shopperReference' => 'string',
        'supportedRecurringProcessingModels' => 'string[]',
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
        'externalResponseCode' => null,
        'externalTokenReference' => null,
        'holderName' => null,
        'iban' => null,
        'id' => null,
        'issuerName' => null,
        'lastFour' => null,
        'name' => null,
        'networkTxReference' => null,
        'ownerName' => null,
        'shopperEmail' => null,
        'shopperReference' => null,
        'supportedRecurringProcessingModels' => null,
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
        'externalResponseCode' => false,
        'externalTokenReference' => false,
        'holderName' => false,
        'iban' => false,
        'id' => false,
        'issuerName' => false,
        'lastFour' => false,
        'name' => false,
        'networkTxReference' => false,
        'ownerName' => false,
        'shopperEmail' => false,
        'shopperReference' => false,
        'supportedRecurringProcessingModels' => false,
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
        'externalResponseCode' => 'externalResponseCode',
        'externalTokenReference' => 'externalTokenReference',
        'holderName' => 'holderName',
        'iban' => 'iban',
        'id' => 'id',
        'issuerName' => 'issuerName',
        'lastFour' => 'lastFour',
        'name' => 'name',
        'networkTxReference' => 'networkTxReference',
        'ownerName' => 'ownerName',
        'shopperEmail' => 'shopperEmail',
        'shopperReference' => 'shopperReference',
        'supportedRecurringProcessingModels' => 'supportedRecurringProcessingModels',
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
        'externalResponseCode' => 'setExternalResponseCode',
        'externalTokenReference' => 'setExternalTokenReference',
        'holderName' => 'setHolderName',
        'iban' => 'setIban',
        'id' => 'setId',
        'issuerName' => 'setIssuerName',
        'lastFour' => 'setLastFour',
        'name' => 'setName',
        'networkTxReference' => 'setNetworkTxReference',
        'ownerName' => 'setOwnerName',
        'shopperEmail' => 'setShopperEmail',
        'shopperReference' => 'setShopperReference',
        'supportedRecurringProcessingModels' => 'setSupportedRecurringProcessingModels',
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
        'externalResponseCode' => 'getExternalResponseCode',
        'externalTokenReference' => 'getExternalTokenReference',
        'holderName' => 'getHolderName',
        'iban' => 'getIban',
        'id' => 'getId',
        'issuerName' => 'getIssuerName',
        'lastFour' => 'getLastFour',
        'name' => 'getName',
        'networkTxReference' => 'getNetworkTxReference',
        'ownerName' => 'getOwnerName',
        'shopperEmail' => 'getShopperEmail',
        'shopperReference' => 'getShopperReference',
        'supportedRecurringProcessingModels' => 'getSupportedRecurringProcessingModels',
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
        $this->setIfExists('externalResponseCode', $data ?? [], null);
        $this->setIfExists('externalTokenReference', $data ?? [], null);
        $this->setIfExists('holderName', $data ?? [], null);
        $this->setIfExists('iban', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('issuerName', $data ?? [], null);
        $this->setIfExists('lastFour', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('networkTxReference', $data ?? [], null);
        $this->setIfExists('ownerName', $data ?? [], null);
        $this->setIfExists('shopperEmail', $data ?? [], null);
        $this->setIfExists('shopperReference', $data ?? [], null);
        $this->setIfExists('supportedRecurringProcessingModels', $data ?? [], null);
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
     * Gets externalResponseCode
     *
     * @return string|null
     */
    public function getExternalResponseCode()
    {
        return $this->container['externalResponseCode'];
    }

    /**
     * Sets externalResponseCode
     *
     * @param string|null $externalResponseCode The response code returned by an external system (for example after a provisioning operation).
     *
     * @return self
     */
    public function setExternalResponseCode($externalResponseCode)
    {
        if (is_null($externalResponseCode)) {
            throw new \InvalidArgumentException('non-nullable externalResponseCode cannot be null');
        }
        $this->container['externalResponseCode'] = $externalResponseCode;

        return $this;
    }

    /**
     * Gets externalTokenReference
     *
     * @return string|null
     */
    public function getExternalTokenReference()
    {
        return $this->container['externalTokenReference'];
    }

    /**
     * Sets externalTokenReference
     *
     * @param string|null $externalTokenReference The token reference of a linked token in an external system (for example a network token reference).
     *
     * @return self
     */
    public function setExternalTokenReference($externalTokenReference)
    {
        if (is_null($externalTokenReference)) {
            throw new \InvalidArgumentException('non-nullable externalTokenReference cannot be null');
        }
        $this->container['externalTokenReference'] = $externalTokenReference;

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
     * Gets issuerName
     *
     * @return string|null
     */
    public function getIssuerName()
    {
        return $this->container['issuerName'];
    }

    /**
     * Sets issuerName
     *
     * @param string|null $issuerName The name of the issuer of token or card.
     *
     * @return self
     */
    public function setIssuerName($issuerName)
    {
        if (is_null($issuerName)) {
            throw new \InvalidArgumentException('non-nullable issuerName cannot be null');
        }
        $this->container['issuerName'] = $issuerName;

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
     * Gets shopperReference
     *
     * @return string|null
     */
    public function getShopperReference()
    {
        return $this->container['shopperReference'];
    }

    /**
     * Sets shopperReference
     *
     * @param string|null $shopperReference Your reference to uniquely identify this shopper, for example user ID or account ID. Minimum length: 3 characters. > Your reference must not include personally identifiable information (PII), for example name or email address.
     *
     * @return self
     */
    public function setShopperReference($shopperReference)
    {
        if (is_null($shopperReference)) {
            throw new \InvalidArgumentException('non-nullable shopperReference cannot be null');
        }
        $this->container['shopperReference'] = $shopperReference;

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
     * @param string[]|null $supportedRecurringProcessingModels Defines a recurring payment type. Allowed values: * `Subscription` – A transaction for a fixed or variable amount, which follows a fixed schedule. * `CardOnFile` – With a card-on-file (CoF) transaction, card details are stored to enable one-click or omnichannel journeys, or simply to streamline the checkout process. Any subscription not following a fixed schedule is also considered a card-on-file transaction. * `UnscheduledCardOnFile` – An unscheduled card-on-file (UCoF) transaction is a transaction that occurs on a non-fixed schedule and/or have variable amounts. For example, automatic top-ups when a cardholder's balance drops below a certain amount.
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
