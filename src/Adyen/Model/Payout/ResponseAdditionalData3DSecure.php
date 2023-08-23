<?php

/**
 * Adyen Payout API
 *
 * The version of the OpenAPI document: 68
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Model\Payout;

use \ArrayAccess;
use Adyen\Model\Payout\ObjectSerializer;

/**
 * ResponseAdditionalData3DSecure Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ResponseAdditionalData3DSecure implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ResponseAdditionalData3DSecure';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'cardHolderInfo' => 'string',
        'cavv' => 'string',
        'cavvAlgorithm' => 'string',
        'scaExemptionRequested' => 'string',
        'threeds2CardEnrolled' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'cardHolderInfo' => null,
        'cavv' => null,
        'cavvAlgorithm' => null,
        'scaExemptionRequested' => null,
        'threeds2CardEnrolled' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'cardHolderInfo' => false,
        'cavv' => false,
        'cavvAlgorithm' => false,
        'scaExemptionRequested' => false,
        'threeds2CardEnrolled' => false
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
        'cardHolderInfo' => 'cardHolderInfo',
        'cavv' => 'cavv',
        'cavvAlgorithm' => 'cavvAlgorithm',
        'scaExemptionRequested' => 'scaExemptionRequested',
        'threeds2CardEnrolled' => 'threeds2.cardEnrolled'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cardHolderInfo' => 'setCardHolderInfo',
        'cavv' => 'setCavv',
        'cavvAlgorithm' => 'setCavvAlgorithm',
        'scaExemptionRequested' => 'setScaExemptionRequested',
        'threeds2CardEnrolled' => 'setThreeds2CardEnrolled'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cardHolderInfo' => 'getCardHolderInfo',
        'cavv' => 'getCavv',
        'cavvAlgorithm' => 'getCavvAlgorithm',
        'scaExemptionRequested' => 'getScaExemptionRequested',
        'threeds2CardEnrolled' => 'getThreeds2CardEnrolled'
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
        $this->setIfExists('cardHolderInfo', $data ?? [], null);
        $this->setIfExists('cavv', $data ?? [], null);
        $this->setIfExists('cavvAlgorithm', $data ?? [], null);
        $this->setIfExists('scaExemptionRequested', $data ?? [], null);
        $this->setIfExists('threeds2CardEnrolled', $data ?? [], null);
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
     * Gets cardHolderInfo
     *
     * @return string|null
     */
    public function getCardHolderInfo()
    {
        return $this->container['cardHolderInfo'];
    }

    /**
     * Sets cardHolderInfo
     *
     * @param string|null $cardHolderInfo Information provided by the issuer to the cardholder. If this field is present, you need to display this information to the cardholder.
     *
     * @return self
     */
    public function setCardHolderInfo($cardHolderInfo)
    {
        if (is_null($cardHolderInfo)) {
            throw new \InvalidArgumentException('non-nullable cardHolderInfo cannot be null');
        }
        $this->container['cardHolderInfo'] = $cardHolderInfo;

        return $this;
    }

    /**
     * Gets cavv
     *
     * @return string|null
     */
    public function getCavv()
    {
        return $this->container['cavv'];
    }

    /**
     * Sets cavv
     *
     * @param string|null $cavv The Cardholder Authentication Verification Value (CAVV) for the 3D Secure authentication session, as a Base64-encoded 20-byte array.
     *
     * @return self
     */
    public function setCavv($cavv)
    {
        if (is_null($cavv)) {
            throw new \InvalidArgumentException('non-nullable cavv cannot be null');
        }
        $this->container['cavv'] = $cavv;

        return $this;
    }

    /**
     * Gets cavvAlgorithm
     *
     * @return string|null
     */
    public function getCavvAlgorithm()
    {
        return $this->container['cavvAlgorithm'];
    }

    /**
     * Sets cavvAlgorithm
     *
     * @param string|null $cavvAlgorithm The CAVV algorithm used.
     *
     * @return self
     */
    public function setCavvAlgorithm($cavvAlgorithm)
    {
        if (is_null($cavvAlgorithm)) {
            throw new \InvalidArgumentException('non-nullable cavvAlgorithm cannot be null');
        }
        $this->container['cavvAlgorithm'] = $cavvAlgorithm;

        return $this;
    }

    /**
     * Gets scaExemptionRequested
     *
     * @return string|null
     */
    public function getScaExemptionRequested()
    {
        return $this->container['scaExemptionRequested'];
    }

    /**
     * Sets scaExemptionRequested
     *
     * @param string|null $scaExemptionRequested Shows the [exemption type](https://docs.adyen.com/payments-fundamentals/psd2-sca-compliance-and-implementation-guide#specifypreferenceinyourapirequest) that Adyen requested for the payment.   Possible values: * **lowValue**  * **secureCorporate**  * **trustedBeneficiary**  * **transactionRiskAnalysis**
     *
     * @return self
     */
    public function setScaExemptionRequested($scaExemptionRequested)
    {
        if (is_null($scaExemptionRequested)) {
            throw new \InvalidArgumentException('non-nullable scaExemptionRequested cannot be null');
        }
        $this->container['scaExemptionRequested'] = $scaExemptionRequested;

        return $this;
    }

    /**
     * Gets threeds2CardEnrolled
     *
     * @return bool|null
     */
    public function getThreeds2CardEnrolled()
    {
        return $this->container['threeds2CardEnrolled'];
    }

    /**
     * Sets threeds2CardEnrolled
     *
     * @param bool|null $threeds2CardEnrolled Indicates whether a card is enrolled for 3D Secure 2.
     *
     * @return self
     */
    public function setThreeds2CardEnrolled($threeds2CardEnrolled)
    {
        if (is_null($threeds2CardEnrolled)) {
            throw new \InvalidArgumentException('non-nullable threeds2CardEnrolled cannot be null');
        }
        $this->container['threeds2CardEnrolled'] = $threeds2CardEnrolled;

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
