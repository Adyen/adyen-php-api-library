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
 * ForexQuote Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ForexQuote implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ForexQuote';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'account' => 'string',
        'accountType' => 'string',
        'baseAmount' => '\Adyen\Model\Payment\Amount',
        'basePoints' => 'int',
        'buy' => '\Adyen\Model\Payment\Amount',
        'interbank' => '\Adyen\Model\Payment\Amount',
        'reference' => 'string',
        'sell' => '\Adyen\Model\Payment\Amount',
        'signature' => 'string',
        'source' => 'string',
        'type' => 'string',
        'validTill' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'account' => null,
        'accountType' => null,
        'baseAmount' => null,
        'basePoints' => 'int32',
        'buy' => null,
        'interbank' => null,
        'reference' => null,
        'sell' => null,
        'signature' => null,
        'source' => null,
        'type' => null,
        'validTill' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'account' => false,
        'accountType' => false,
        'baseAmount' => false,
        'basePoints' => true,
        'buy' => false,
        'interbank' => false,
        'reference' => false,
        'sell' => false,
        'signature' => false,
        'source' => false,
        'type' => false,
        'validTill' => false
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
        'account' => 'account',
        'accountType' => 'accountType',
        'baseAmount' => 'baseAmount',
        'basePoints' => 'basePoints',
        'buy' => 'buy',
        'interbank' => 'interbank',
        'reference' => 'reference',
        'sell' => 'sell',
        'signature' => 'signature',
        'source' => 'source',
        'type' => 'type',
        'validTill' => 'validTill'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account' => 'setAccount',
        'accountType' => 'setAccountType',
        'baseAmount' => 'setBaseAmount',
        'basePoints' => 'setBasePoints',
        'buy' => 'setBuy',
        'interbank' => 'setInterbank',
        'reference' => 'setReference',
        'sell' => 'setSell',
        'signature' => 'setSignature',
        'source' => 'setSource',
        'type' => 'setType',
        'validTill' => 'setValidTill'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account' => 'getAccount',
        'accountType' => 'getAccountType',
        'baseAmount' => 'getBaseAmount',
        'basePoints' => 'getBasePoints',
        'buy' => 'getBuy',
        'interbank' => 'getInterbank',
        'reference' => 'getReference',
        'sell' => 'getSell',
        'signature' => 'getSignature',
        'source' => 'getSource',
        'type' => 'getType',
        'validTill' => 'getValidTill'
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
        $this->setIfExists('account', $data ?? [], null);
        $this->setIfExists('accountType', $data ?? [], null);
        $this->setIfExists('baseAmount', $data ?? [], null);
        $this->setIfExists('basePoints', $data ?? [], null);
        $this->setIfExists('buy', $data ?? [], null);
        $this->setIfExists('interbank', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('sell', $data ?? [], null);
        $this->setIfExists('signature', $data ?? [], null);
        $this->setIfExists('source', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('validTill', $data ?? [], null);
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

        if ($this->container['basePoints'] === null) {
            $invalidProperties[] = "'basePoints' can't be null";
        }
        if ($this->container['validTill'] === null) {
            $invalidProperties[] = "'validTill' can't be null";
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
     * Gets account
     *
     * @return string|null
     */
    public function getAccount()
    {
        return $this->container['account'];
    }

    /**
     * Sets account
     *
     * @param string|null $account The account name.
     *
     * @return self
     */
    public function setAccount($account)
    {
        if (is_null($account)) {
            throw new \InvalidArgumentException('non-nullable account cannot be null');
        }
        $this->container['account'] = $account;

        return $this;
    }

    /**
     * Gets accountType
     *
     * @return string|null
     */
    public function getAccountType()
    {
        return $this->container['accountType'];
    }

    /**
     * Sets accountType
     *
     * @param string|null $accountType The account type.
     *
     * @return self
     */
    public function setAccountType($accountType)
    {
        if (is_null($accountType)) {
            throw new \InvalidArgumentException('non-nullable accountType cannot be null');
        }
        $this->container['accountType'] = $accountType;

        return $this;
    }

    /**
     * Gets baseAmount
     *
     * @return \Adyen\Model\Payment\Amount|null
     */
    public function getBaseAmount()
    {
        return $this->container['baseAmount'];
    }

    /**
     * Sets baseAmount
     *
     * @param \Adyen\Model\Payment\Amount|null $baseAmount baseAmount
     *
     * @return self
     */
    public function setBaseAmount($baseAmount)
    {
        if (is_null($baseAmount)) {
            throw new \InvalidArgumentException('non-nullable baseAmount cannot be null');
        }
        $this->container['baseAmount'] = $baseAmount;

        return $this;
    }

    /**
     * Gets basePoints
     *
     * @return int
     */
    public function getBasePoints()
    {
        return $this->container['basePoints'];
    }

    /**
     * Sets basePoints
     *
     * @param int $basePoints The base points.
     *
     * @return self
     */
    public function setBasePoints($basePoints)
    {
        // Do nothing for nullable integers
        $this->container['basePoints'] = $basePoints;

        return $this;
    }

    /**
     * Gets buy
     *
     * @return \Adyen\Model\Payment\Amount|null
     */
    public function getBuy()
    {
        return $this->container['buy'];
    }

    /**
     * Sets buy
     *
     * @param \Adyen\Model\Payment\Amount|null $buy buy
     *
     * @return self
     */
    public function setBuy($buy)
    {
        if (is_null($buy)) {
            throw new \InvalidArgumentException('non-nullable buy cannot be null');
        }
        $this->container['buy'] = $buy;

        return $this;
    }

    /**
     * Gets interbank
     *
     * @return \Adyen\Model\Payment\Amount|null
     */
    public function getInterbank()
    {
        return $this->container['interbank'];
    }

    /**
     * Sets interbank
     *
     * @param \Adyen\Model\Payment\Amount|null $interbank interbank
     *
     * @return self
     */
    public function setInterbank($interbank)
    {
        if (is_null($interbank)) {
            throw new \InvalidArgumentException('non-nullable interbank cannot be null');
        }
        $this->container['interbank'] = $interbank;

        return $this;
    }

    /**
     * Gets reference
     *
     * @return string|null
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string|null $reference The reference assigned to the forex quote request.
     *
     * @return self
     */
    public function setReference($reference)
    {
        if (is_null($reference)) {
            throw new \InvalidArgumentException('non-nullable reference cannot be null');
        }
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets sell
     *
     * @return \Adyen\Model\Payment\Amount|null
     */
    public function getSell()
    {
        return $this->container['sell'];
    }

    /**
     * Sets sell
     *
     * @param \Adyen\Model\Payment\Amount|null $sell sell
     *
     * @return self
     */
    public function setSell($sell)
    {
        if (is_null($sell)) {
            throw new \InvalidArgumentException('non-nullable sell cannot be null');
        }
        $this->container['sell'] = $sell;

        return $this;
    }

    /**
     * Gets signature
     *
     * @return string|null
     */
    public function getSignature()
    {
        return $this->container['signature'];
    }

    /**
     * Sets signature
     *
     * @param string|null $signature The signature to validate the integrity.
     *
     * @return self
     */
    public function setSignature($signature)
    {
        if (is_null($signature)) {
            throw new \InvalidArgumentException('non-nullable signature cannot be null');
        }
        $this->container['signature'] = $signature;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string|null $source The source of the forex quote.
     *
     * @return self
     */
    public function setSource($source)
    {
        if (is_null($source)) {
            throw new \InvalidArgumentException('non-nullable source cannot be null');
        }
        $this->container['source'] = $source;

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
     * @param string|null $type The type of forex.
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
     * Gets validTill
     *
     * @return \DateTime
     */
    public function getValidTill()
    {
        return $this->container['validTill'];
    }

    /**
     * Sets validTill
     *
     * @param \DateTime $validTill The date until which the forex quote is valid.
     *
     * @return self
     */
    public function setValidTill($validTill)
    {
        if (is_null($validTill)) {
            throw new \InvalidArgumentException('non-nullable validTill cannot be null');
        }
        $this->container['validTill'] = $validTill;

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
