<?php

/**
 * Adyen Checkout API
 *
 * Adyen Checkout API provides a simple and flexible way to initiate and authorise online payments. You can use the same integration for payments made with cards (including 3D Secure), mobile wallets, and local payment methods (for example, iDEAL and Sofort).  This API reference provides information on available endpoints and how to interact with them. To learn more about the API, visit [online payments documentation](https://docs.adyen.com/online-payments).  ## Authentication Each request to Checkout API must be signed with an API key. For this, [get your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) from your Customer Area, and set this key to the `X-API-Key` header value, for example:  ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ``` ## Versioning Checkout API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://checkout-test.adyen.com/v70/payments ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account, for example: ``` https://{PREFIX}-checkout-live.adyenpayments.com/checkout/v70/payments ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.  When preparing to do live transactions with Checkout API, follow the [go-live checklist](https://docs.adyen.com/online-payments/go-live-checklist) to make sure you've got all the required configuration in place.  ## Release notes Have a look at the [release notes](https://docs.adyen.com/online-payments/release-notes?integration_type=api&version=70) to find out what changed in this version!
 *
 * The version of the OpenAPI document: 70
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.3.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Model\Checkout;

use \ArrayAccess;
use \Adyen\Model\Checkout\ObjectSerializer;

/**
 * Recurring Class Doc Comment
 *
 * @category Class
 * @package  Adyen\Model\Checkout
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Recurring implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Recurring';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'contract' => 'string',
        'recurring_detail_name' => 'string',
        'recurring_expiry' => '\DateTime',
        'recurring_frequency' => 'string',
        'token_service' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'contract' => null,
        'recurring_detail_name' => null,
        'recurring_expiry' => 'date-time',
        'recurring_frequency' => null,
        'token_service' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'contract' => false,
		'recurring_detail_name' => false,
		'recurring_expiry' => false,
		'recurring_frequency' => false,
		'token_service' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

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
        'contract' => 'contract',
        'recurring_detail_name' => 'recurringDetailName',
        'recurring_expiry' => 'recurringExpiry',
        'recurring_frequency' => 'recurringFrequency',
        'token_service' => 'tokenService'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'contract' => 'setContract',
        'recurring_detail_name' => 'setRecurringDetailName',
        'recurring_expiry' => 'setRecurringExpiry',
        'recurring_frequency' => 'setRecurringFrequency',
        'token_service' => 'setTokenService'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'contract' => 'getContract',
        'recurring_detail_name' => 'getRecurringDetailName',
        'recurring_expiry' => 'getRecurringExpiry',
        'recurring_frequency' => 'getRecurringFrequency',
        'token_service' => 'getTokenService'
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

    public const CONTRACT_ONECLICK = 'ONECLICK';
    public const CONTRACT_RECURRING = 'RECURRING';
    public const CONTRACT_PAYOUT = 'PAYOUT';
    public const TOKEN_SERVICE_VISATOKENSERVICE = 'VISATOKENSERVICE';
    public const TOKEN_SERVICE_MCTOKENSERVICE = 'MCTOKENSERVICE';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getContractAllowableValues()
    {
        return [
            self::CONTRACT_ONECLICK,
            self::CONTRACT_RECURRING,
            self::CONTRACT_PAYOUT,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTokenServiceAllowableValues()
    {
        return [
            self::TOKEN_SERVICE_VISATOKENSERVICE,
            self::TOKEN_SERVICE_MCTOKENSERVICE,
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
        $this->setIfExists('contract', $data ?? [], null);
        $this->setIfExists('recurring_detail_name', $data ?? [], null);
        $this->setIfExists('recurring_expiry', $data ?? [], null);
        $this->setIfExists('recurring_frequency', $data ?? [], null);
        $this->setIfExists('token_service', $data ?? [], null);
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

        $allowedValues = $this->getContractAllowableValues();
        if (!is_null($this->container['contract']) && !in_array($this->container['contract'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'contract', must be one of '%s'",
                $this->container['contract'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getTokenServiceAllowableValues();
        if (!is_null($this->container['token_service']) && !in_array($this->container['token_service'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'token_service', must be one of '%s'",
                $this->container['token_service'],
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
     * Gets contract
     *
     * @return string|null
     */
    public function getContract()
    {
        return $this->container['contract'];
    }

    /**
     * Sets contract
     *
     * @param string|null $contract The type of recurring contract to be used. Possible values: * `ONECLICK` – Payment details can be used to initiate a one-click payment, where the shopper enters the [card security code (CVC/CVV)](https://docs.adyen.com/payments-fundamentals/payment-glossary#card-security-code-cvc-cvv-cid). * `RECURRING` – Payment details can be used without the card security code to initiate [card-not-present transactions](https://docs.adyen.com/payments-fundamentals/payment-glossary#card-not-present-cnp). * `ONECLICK,RECURRING` – Payment details can be used regardless of whether the shopper is on your site or not. * `PAYOUT` – Payment details can be used to [make a payout](https://docs.adyen.com/online-payments/online-payouts).
     *
     * @return self
     */
    public function setContract($contract)
    {
        if (is_null($contract)) {
            throw new \InvalidArgumentException('non-nullable contract cannot be null');
        }
        $allowedValues = $this->getContractAllowableValues();
        if (!in_array($contract, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'contract', must be one of '%s'",
                    $contract,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['contract'] = $contract;

        return $this;
    }

    /**
     * Gets recurring_detail_name
     *
     * @return string|null
     */
    public function getRecurringDetailName()
    {
        return $this->container['recurring_detail_name'];
    }

    /**
     * Sets recurring_detail_name
     *
     * @param string|null $recurring_detail_name A descriptive name for this detail.
     *
     * @return self
     */
    public function setRecurringDetailName($recurring_detail_name)
    {
        if (is_null($recurring_detail_name)) {
            throw new \InvalidArgumentException('non-nullable recurring_detail_name cannot be null');
        }
        $this->container['recurring_detail_name'] = $recurring_detail_name;

        return $this;
    }

    /**
     * Gets recurring_expiry
     *
     * @return \DateTime|null
     */
    public function getRecurringExpiry()
    {
        return $this->container['recurring_expiry'];
    }

    /**
     * Sets recurring_expiry
     *
     * @param \DateTime|null $recurring_expiry Date after which no further authorisations shall be performed. Only for 3D Secure 2.
     *
     * @return self
     */
    public function setRecurringExpiry($recurring_expiry)
    {
        if (is_null($recurring_expiry)) {
            throw new \InvalidArgumentException('non-nullable recurring_expiry cannot be null');
        }
        $this->container['recurring_expiry'] = $recurring_expiry;

        return $this;
    }

    /**
     * Gets recurring_frequency
     *
     * @return string|null
     */
    public function getRecurringFrequency()
    {
        return $this->container['recurring_frequency'];
    }

    /**
     * Sets recurring_frequency
     *
     * @param string|null $recurring_frequency Minimum number of days between authorisations. Only for 3D Secure 2.
     *
     * @return self
     */
    public function setRecurringFrequency($recurring_frequency)
    {
        if (is_null($recurring_frequency)) {
            throw new \InvalidArgumentException('non-nullable recurring_frequency cannot be null');
        }
        $this->container['recurring_frequency'] = $recurring_frequency;

        return $this;
    }

    /**
     * Gets token_service
     *
     * @return string|null
     */
    public function getTokenService()
    {
        return $this->container['token_service'];
    }

    /**
     * Sets token_service
     *
     * @param string|null $token_service The name of the token service.
     *
     * @return self
     */
    public function setTokenService($token_service)
    {
        if (is_null($token_service)) {
            throw new \InvalidArgumentException('non-nullable token_service cannot be null');
        }
        $allowedValues = $this->getTokenServiceAllowableValues();
        if (!in_array($token_service, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'token_service', must be one of '%s'",
                    $token_service,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['token_service'] = $token_service;

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

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


