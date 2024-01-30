<?php

/**
 * Configuration API
 *
 * The version of the OpenAPI document: 2
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\BalancePlatform;

use \ArrayAccess;
use Adyen\Model\BalancePlatform\ObjectSerializer;

/**
 * BankAccountIdentificationValidationRequestAccountIdentification Class Doc Comment
 *
 * @category Class
 * @description Bank account identification.
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class BankAccountIdentificationValidationRequestAccountIdentification implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'BankAccountIdentificationValidationRequest_accountIdentification';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'accountNumber' => 'string',
        'bsbCode' => 'string',
        'type' => 'string',
        'bankCode' => 'string',
        'branchNumber' => 'string',
        'accountType' => 'string',
        'institutionNumber' => 'string',
        'transitNumber' => 'string',
        'clearingCode' => 'string',
        'iban' => 'string',
        'additionalBankIdentification' => '\Adyen\Model\BalancePlatform\AdditionalBankIdentification',
        'bic' => 'string',
        'clearingNumber' => 'string',
        'sortCode' => 'string',
        'routingNumber' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'accountNumber' => null,
        'bsbCode' => null,
        'type' => null,
        'bankCode' => null,
        'branchNumber' => null,
        'accountType' => null,
        'institutionNumber' => null,
        'transitNumber' => null,
        'clearingCode' => null,
        'iban' => null,
        'additionalBankIdentification' => null,
        'bic' => null,
        'clearingNumber' => null,
        'sortCode' => null,
        'routingNumber' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'accountNumber' => false,
        'bsbCode' => false,
        'type' => false,
        'bankCode' => false,
        'branchNumber' => false,
        'accountType' => false,
        'institutionNumber' => false,
        'transitNumber' => false,
        'clearingCode' => false,
        'iban' => false,
        'additionalBankIdentification' => false,
        'bic' => false,
        'clearingNumber' => false,
        'sortCode' => false,
        'routingNumber' => false
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
        'accountNumber' => 'accountNumber',
        'bsbCode' => 'bsbCode',
        'type' => 'type',
        'bankCode' => 'bankCode',
        'branchNumber' => 'branchNumber',
        'accountType' => 'accountType',
        'institutionNumber' => 'institutionNumber',
        'transitNumber' => 'transitNumber',
        'clearingCode' => 'clearingCode',
        'iban' => 'iban',
        'additionalBankIdentification' => 'additionalBankIdentification',
        'bic' => 'bic',
        'clearingNumber' => 'clearingNumber',
        'sortCode' => 'sortCode',
        'routingNumber' => 'routingNumber'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accountNumber' => 'setAccountNumber',
        'bsbCode' => 'setBsbCode',
        'type' => 'setType',
        'bankCode' => 'setBankCode',
        'branchNumber' => 'setBranchNumber',
        'accountType' => 'setAccountType',
        'institutionNumber' => 'setInstitutionNumber',
        'transitNumber' => 'setTransitNumber',
        'clearingCode' => 'setClearingCode',
        'iban' => 'setIban',
        'additionalBankIdentification' => 'setAdditionalBankIdentification',
        'bic' => 'setBic',
        'clearingNumber' => 'setClearingNumber',
        'sortCode' => 'setSortCode',
        'routingNumber' => 'setRoutingNumber'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accountNumber' => 'getAccountNumber',
        'bsbCode' => 'getBsbCode',
        'type' => 'getType',
        'bankCode' => 'getBankCode',
        'branchNumber' => 'getBranchNumber',
        'accountType' => 'getAccountType',
        'institutionNumber' => 'getInstitutionNumber',
        'transitNumber' => 'getTransitNumber',
        'clearingCode' => 'getClearingCode',
        'iban' => 'getIban',
        'additionalBankIdentification' => 'getAdditionalBankIdentification',
        'bic' => 'getBic',
        'clearingNumber' => 'getClearingNumber',
        'sortCode' => 'getSortCode',
        'routingNumber' => 'getRoutingNumber'
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
        $this->setIfExists('accountNumber', $data ?? [], null);
        $this->setIfExists('bsbCode', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('bankCode', $data ?? [], null);
        $this->setIfExists('branchNumber', $data ?? [], null);
        $this->setIfExists('accountType', $data ?? [], null);
        $this->setIfExists('institutionNumber', $data ?? [], null);
        $this->setIfExists('transitNumber', $data ?? [], null);
        $this->setIfExists('clearingCode', $data ?? [], null);
        $this->setIfExists('iban', $data ?? [], null);
        $this->setIfExists('additionalBankIdentification', $data ?? [], null);
        $this->setIfExists('bic', $data ?? [], null);
        $this->setIfExists('clearingNumber', $data ?? [], null);
        $this->setIfExists('sortCode', $data ?? [], null);
        $this->setIfExists('routingNumber', $data ?? [], null);
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

        if ($this->container['accountNumber'] === null) {
            $invalidProperties[] = "'accountNumber' can't be null";
        }
        if ($this->container['bsbCode'] === null) {
            $invalidProperties[] = "'bsbCode' can't be null";
        }
        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }

        if ($this->container['bankCode'] === null) {
            $invalidProperties[] = "'bankCode' can't be null";
        }
        if ($this->container['branchNumber'] === null) {
            $invalidProperties[] = "'branchNumber' can't be null";
        }

        if ($this->container['institutionNumber'] === null) {
            $invalidProperties[] = "'institutionNumber' can't be null";
        }
        if ($this->container['transitNumber'] === null) {
            $invalidProperties[] = "'transitNumber' can't be null";
        }
        if ($this->container['clearingCode'] === null) {
            $invalidProperties[] = "'clearingCode' can't be null";
        }
        if ($this->container['iban'] === null) {
            $invalidProperties[] = "'iban' can't be null";
        }
        if ($this->container['bic'] === null) {
            $invalidProperties[] = "'bic' can't be null";
        }
        if ($this->container['clearingNumber'] === null) {
            $invalidProperties[] = "'clearingNumber' can't be null";
        }
        if ($this->container['sortCode'] === null) {
            $invalidProperties[] = "'sortCode' can't be null";
        }
        if ($this->container['routingNumber'] === null) {
            $invalidProperties[] = "'routingNumber' can't be null";
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
     * Gets accountNumber
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->container['accountNumber'];
    }

    /**
     * Sets accountNumber
     *
     * @param string $accountNumber The bank account number, without separators or whitespace.
     *
     * @return self
     */
    public function setAccountNumber($accountNumber)
    {
        if (is_null($accountNumber)) {
            throw new \InvalidArgumentException('non-nullable accountNumber cannot be null');
        }
        $this->container['accountNumber'] = $accountNumber;

        return $this;
    }

    /**
     * Gets bsbCode
     *
     * @return string
     */
    public function getBsbCode()
    {
        return $this->container['bsbCode'];
    }

    /**
     * Sets bsbCode
     *
     * @param string $bsbCode The 6-digit [Bank State Branch (BSB) code](https://en.wikipedia.org/wiki/Bank_state_branch), without separators or whitespace.
     *
     * @return self
     */
    public function setBsbCode($bsbCode)
    {
        if (is_null($bsbCode)) {
            throw new \InvalidArgumentException('non-nullable bsbCode cannot be null');
        }
        $this->container['bsbCode'] = $bsbCode;

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
     * @param string $type **usLocal**
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
     * Gets bankCode
     *
     * @return string
     */
    public function getBankCode()
    {
        return $this->container['bankCode'];
    }

    /**
     * Sets bankCode
     *
     * @param string $bankCode The 4-digit bank code (Registreringsnummer) (without separators or whitespace).
     *
     * @return self
     */
    public function setBankCode($bankCode)
    {
        if (is_null($bankCode)) {
            throw new \InvalidArgumentException('non-nullable bankCode cannot be null');
        }
        $this->container['bankCode'] = $bankCode;

        return $this;
    }

    /**
     * Gets branchNumber
     *
     * @return string
     */
    public function getBranchNumber()
    {
        return $this->container['branchNumber'];
    }

    /**
     * Sets branchNumber
     *
     * @param string $branchNumber The bank account branch number, without separators or whitespace.
     *
     * @return self
     */
    public function setBranchNumber($branchNumber)
    {
        if (is_null($branchNumber)) {
            throw new \InvalidArgumentException('non-nullable branchNumber cannot be null');
        }
        $this->container['branchNumber'] = $branchNumber;

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
     * @param string|null $accountType The bank account type.  Possible values: **checking** or **savings**. Defaults to **checking**.
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
     * Gets institutionNumber
     *
     * @return string
     */
    public function getInstitutionNumber()
    {
        return $this->container['institutionNumber'];
    }

    /**
     * Sets institutionNumber
     *
     * @param string $institutionNumber The 3-digit institution number, without separators or whitespace.
     *
     * @return self
     */
    public function setInstitutionNumber($institutionNumber)
    {
        if (is_null($institutionNumber)) {
            throw new \InvalidArgumentException('non-nullable institutionNumber cannot be null');
        }
        $this->container['institutionNumber'] = $institutionNumber;

        return $this;
    }

    /**
     * Gets transitNumber
     *
     * @return string
     */
    public function getTransitNumber()
    {
        return $this->container['transitNumber'];
    }

    /**
     * Sets transitNumber
     *
     * @param string $transitNumber The 5-digit transit number, without separators or whitespace.
     *
     * @return self
     */
    public function setTransitNumber($transitNumber)
    {
        if (is_null($transitNumber)) {
            throw new \InvalidArgumentException('non-nullable transitNumber cannot be null');
        }
        $this->container['transitNumber'] = $transitNumber;

        return $this;
    }

    /**
     * Gets clearingCode
     *
     * @return string
     */
    public function getClearingCode()
    {
        return $this->container['clearingCode'];
    }

    /**
     * Sets clearingCode
     *
     * @param string $clearingCode The 3-digit clearing code, without separators or whitespace.
     *
     * @return self
     */
    public function setClearingCode($clearingCode)
    {
        if (is_null($clearingCode)) {
            throw new \InvalidArgumentException('non-nullable clearingCode cannot be null');
        }
        $this->container['clearingCode'] = $clearingCode;

        return $this;
    }

    /**
     * Gets iban
     *
     * @return string
     */
    public function getIban()
    {
        return $this->container['iban'];
    }

    /**
     * Sets iban
     *
     * @param string $iban The international bank account number as defined in the [ISO-13616](https://www.iso.org/standard/81090.html) standard.
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
     * Gets additionalBankIdentification
     *
     * @return \Adyen\Model\BalancePlatform\AdditionalBankIdentification|null
     */
    public function getAdditionalBankIdentification()
    {
        return $this->container['additionalBankIdentification'];
    }

    /**
     * Sets additionalBankIdentification
     *
     * @param \Adyen\Model\BalancePlatform\AdditionalBankIdentification|null $additionalBankIdentification additionalBankIdentification
     *
     * @return self
     */
    public function setAdditionalBankIdentification($additionalBankIdentification)
    {
        if (is_null($additionalBankIdentification)) {
            throw new \InvalidArgumentException('non-nullable additionalBankIdentification cannot be null');
        }
        $this->container['additionalBankIdentification'] = $additionalBankIdentification;

        return $this;
    }

    /**
     * Gets bic
     *
     * @return string
     */
    public function getBic()
    {
        return $this->container['bic'];
    }

    /**
     * Sets bic
     *
     * @param string $bic The bank's 8- or 11-character BIC or SWIFT code.
     *
     * @return self
     */
    public function setBic($bic)
    {
        if (is_null($bic)) {
            throw new \InvalidArgumentException('non-nullable bic cannot be null');
        }
        $this->container['bic'] = $bic;

        return $this;
    }

    /**
     * Gets clearingNumber
     *
     * @return string
     */
    public function getClearingNumber()
    {
        return $this->container['clearingNumber'];
    }

    /**
     * Sets clearingNumber
     *
     * @param string $clearingNumber The 4- to 5-digit clearing number ([Clearingnummer](https://sv.wikipedia.org/wiki/Clearingnummer)), without separators or whitespace.
     *
     * @return self
     */
    public function setClearingNumber($clearingNumber)
    {
        if (is_null($clearingNumber)) {
            throw new \InvalidArgumentException('non-nullable clearingNumber cannot be null');
        }
        $this->container['clearingNumber'] = $clearingNumber;

        return $this;
    }

    /**
     * Gets sortCode
     *
     * @return string
     */
    public function getSortCode()
    {
        return $this->container['sortCode'];
    }

    /**
     * Sets sortCode
     *
     * @param string $sortCode The 6-digit [sort code](https://en.wikipedia.org/wiki/Sort_code), without separators or whitespace.
     *
     * @return self
     */
    public function setSortCode($sortCode)
    {
        if (is_null($sortCode)) {
            throw new \InvalidArgumentException('non-nullable sortCode cannot be null');
        }
        $this->container['sortCode'] = $sortCode;

        return $this;
    }

    /**
     * Gets routingNumber
     *
     * @return string
     */
    public function getRoutingNumber()
    {
        return $this->container['routingNumber'];
    }

    /**
     * Sets routingNumber
     *
     * @param string $routingNumber The 9-digit [routing number](https://en.wikipedia.org/wiki/ABA_routing_transit_number), without separators or whitespace.
     *
     * @return self
     */
    public function setRoutingNumber($routingNumber)
    {
        if (is_null($routingNumber)) {
            throw new \InvalidArgumentException('non-nullable routingNumber cannot be null');
        }
        $this->container['routingNumber'] = $routingNumber;

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
