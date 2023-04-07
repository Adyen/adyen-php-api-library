<?php

/**
 * Adyen Payment API
 *
 * The version of the OpenAPI document: 68
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Payments;

use \ArrayAccess;
use Adyen\Model\Payments\ObjectSerializer;

/**
 * TechnicalCancelRequest Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class TechnicalCancelRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'TechnicalCancelRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'additional_data' => 'array<string,string>',
        'merchant_account' => 'string',
        'modification_amount' => '\Adyen\Model\Payments\Amount',
        'mpi_data' => '\Adyen\Model\Payments\ThreeDSecureData',
        'original_merchant_reference' => 'string',
        'platform_chargeback_logic' => '\Adyen\Model\Payments\PlatformChargebackLogic',
        'reference' => 'string',
        'splits' => '\Adyen\Model\Payments\Split[]',
        'tender_reference' => 'string',
        'unique_terminal_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'additional_data' => null,
        'merchant_account' => null,
        'modification_amount' => null,
        'mpi_data' => null,
        'original_merchant_reference' => null,
        'platform_chargeback_logic' => null,
        'reference' => null,
        'splits' => null,
        'tender_reference' => null,
        'unique_terminal_id' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'additional_data' => false,
        'merchant_account' => false,
        'modification_amount' => false,
        'mpi_data' => false,
        'original_merchant_reference' => false,
        'platform_chargeback_logic' => false,
        'reference' => false,
        'splits' => false,
        'tender_reference' => false,
        'unique_terminal_id' => false
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
        'additional_data' => 'additionalData',
        'merchant_account' => 'merchantAccount',
        'modification_amount' => 'modificationAmount',
        'mpi_data' => 'mpiData',
        'original_merchant_reference' => 'originalMerchantReference',
        'platform_chargeback_logic' => 'platformChargebackLogic',
        'reference' => 'reference',
        'splits' => 'splits',
        'tender_reference' => 'tenderReference',
        'unique_terminal_id' => 'uniqueTerminalId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'additional_data' => 'setAdditionalData',
        'merchant_account' => 'setMerchantAccount',
        'modification_amount' => 'setModificationAmount',
        'mpi_data' => 'setMpiData',
        'original_merchant_reference' => 'setOriginalMerchantReference',
        'platform_chargeback_logic' => 'setPlatformChargebackLogic',
        'reference' => 'setReference',
        'splits' => 'setSplits',
        'tender_reference' => 'setTenderReference',
        'unique_terminal_id' => 'setUniqueTerminalId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'additional_data' => 'getAdditionalData',
        'merchant_account' => 'getMerchantAccount',
        'modification_amount' => 'getModificationAmount',
        'mpi_data' => 'getMpiData',
        'original_merchant_reference' => 'getOriginalMerchantReference',
        'platform_chargeback_logic' => 'getPlatformChargebackLogic',
        'reference' => 'getReference',
        'splits' => 'getSplits',
        'tender_reference' => 'getTenderReference',
        'unique_terminal_id' => 'getUniqueTerminalId'
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
        $this->setIfExists('additional_data', $data ?? [], null);
        $this->setIfExists('merchant_account', $data ?? [], null);
        $this->setIfExists('modification_amount', $data ?? [], null);
        $this->setIfExists('mpi_data', $data ?? [], null);
        $this->setIfExists('original_merchant_reference', $data ?? [], null);
        $this->setIfExists('platform_chargeback_logic', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('splits', $data ?? [], null);
        $this->setIfExists('tender_reference', $data ?? [], null);
        $this->setIfExists('unique_terminal_id', $data ?? [], null);
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

        if ($this->container['merchant_account'] === null) {
            $invalidProperties[] = "'merchant_account' can't be null";
        }
        if ($this->container['original_merchant_reference'] === null) {
            $invalidProperties[] = "'original_merchant_reference' can't be null";
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
     * Gets additional_data
     *
     * @return array<string,string>|null
     */
    public function getAdditionalData()
    {
        return $this->container['additional_data'];
    }

    /**
     * Sets additional_data
     *
     * @param array<string,string>|null $additional_data This field contains additional data, which may be required for a particular modification request.  The additionalData object consists of entries, each of which includes the key and value.
     *
     * @return self
     */
    public function setAdditionalData($additional_data)
    {
        if (is_null($additional_data)) {
            throw new \InvalidArgumentException('non-nullable additional_data cannot be null');
        }
        $this->container['additional_data'] = $additional_data;

        return $this;
    }

    /**
     * Gets merchant_account
     *
     * @return string
     */
    public function getMerchantAccount()
    {
        return $this->container['merchant_account'];
    }

    /**
     * Sets merchant_account
     *
     * @param string $merchant_account The merchant account that is used to process the payment.
     *
     * @return self
     */
    public function setMerchantAccount($merchant_account)
    {
        if (is_null($merchant_account)) {
            throw new \InvalidArgumentException('non-nullable merchant_account cannot be null');
        }
        $this->container['merchant_account'] = $merchant_account;

        return $this;
    }

    /**
     * Gets modification_amount
     *
     * @return \Adyen\Model\Payments\Amount|null
     */
    public function getModificationAmount()
    {
        return $this->container['modification_amount'];
    }

    /**
     * Sets modification_amount
     *
     * @param \Adyen\Model\Payments\Amount|null $modification_amount modification_amount
     *
     * @return self
     */
    public function setModificationAmount($modification_amount)
    {
        if (is_null($modification_amount)) {
            throw new \InvalidArgumentException('non-nullable modification_amount cannot be null');
        }
        $this->container['modification_amount'] = $modification_amount;

        return $this;
    }

    /**
     * Gets mpi_data
     *
     * @return \Adyen\Model\Payments\ThreeDSecureData|null
     */
    public function getMpiData()
    {
        return $this->container['mpi_data'];
    }

    /**
     * Sets mpi_data
     *
     * @param \Adyen\Model\Payments\ThreeDSecureData|null $mpi_data mpi_data
     *
     * @return self
     */
    public function setMpiData($mpi_data)
    {
        if (is_null($mpi_data)) {
            throw new \InvalidArgumentException('non-nullable mpi_data cannot be null');
        }
        $this->container['mpi_data'] = $mpi_data;

        return $this;
    }

    /**
     * Gets original_merchant_reference
     *
     * @return string
     */
    public function getOriginalMerchantReference()
    {
        return $this->container['original_merchant_reference'];
    }

    /**
     * Sets original_merchant_reference
     *
     * @param string $original_merchant_reference The original merchant reference to cancel.
     *
     * @return self
     */
    public function setOriginalMerchantReference($original_merchant_reference)
    {
        if (is_null($original_merchant_reference)) {
            throw new \InvalidArgumentException('non-nullable original_merchant_reference cannot be null');
        }
        $this->container['original_merchant_reference'] = $original_merchant_reference;

        return $this;
    }

    /**
     * Gets platform_chargeback_logic
     *
     * @return \Adyen\Model\Payments\PlatformChargebackLogic|null
     */
    public function getPlatformChargebackLogic()
    {
        return $this->container['platform_chargeback_logic'];
    }

    /**
     * Sets platform_chargeback_logic
     *
     * @param \Adyen\Model\Payments\PlatformChargebackLogic|null $platform_chargeback_logic platform_chargeback_logic
     *
     * @return self
     */
    public function setPlatformChargebackLogic($platform_chargeback_logic)
    {
        if (is_null($platform_chargeback_logic)) {
            throw new \InvalidArgumentException('non-nullable platform_chargeback_logic cannot be null');
        }
        $this->container['platform_chargeback_logic'] = $platform_chargeback_logic;

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
     * @param string|null $reference Your reference for the payment modification. This reference is visible in Customer Area and in reports. Maximum length: 80 characters.
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
     * Gets splits
     *
     * @return \Adyen\Model\Payments\Split[]|null
     */
    public function getSplits()
    {
        return $this->container['splits'];
    }

    /**
     * Sets splits
     *
     * @param \Adyen\Model\Payments\Split[]|null $splits An array of objects specifying how the amount should be split between accounts when using Adyen for Platforms. For details, refer to [Providing split information](https://docs.adyen.com/marketplaces-and-platforms/processing-payments#providing-split-information).
     *
     * @return self
     */
    public function setSplits($splits)
    {
        if (is_null($splits)) {
            throw new \InvalidArgumentException('non-nullable splits cannot be null');
        }
        $this->container['splits'] = $splits;

        return $this;
    }

    /**
     * Gets tender_reference
     *
     * @return string|null
     */
    public function getTenderReference()
    {
        return $this->container['tender_reference'];
    }

    /**
     * Sets tender_reference
     *
     * @param string|null $tender_reference The transaction reference provided by the PED. For point-of-sale integrations only.
     *
     * @return self
     */
    public function setTenderReference($tender_reference)
    {
        if (is_null($tender_reference)) {
            throw new \InvalidArgumentException('non-nullable tender_reference cannot be null');
        }
        $this->container['tender_reference'] = $tender_reference;

        return $this;
    }

    /**
     * Gets unique_terminal_id
     *
     * @return string|null
     */
    public function getUniqueTerminalId()
    {
        return $this->container['unique_terminal_id'];
    }

    /**
     * Sets unique_terminal_id
     *
     * @param string|null $unique_terminal_id Unique terminal ID for the PED that originally processed the request. For point-of-sale integrations only.
     *
     * @return self
     */
    public function setUniqueTerminalId($unique_terminal_id)
    {
        if (is_null($unique_terminal_id)) {
            throw new \InvalidArgumentException('non-nullable unique_terminal_id cannot be null');
        }
        $this->container['unique_terminal_id'] = $unique_terminal_id;

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
