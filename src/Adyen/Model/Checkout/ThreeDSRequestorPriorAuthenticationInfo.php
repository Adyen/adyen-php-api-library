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
 * ThreeDSRequestorPriorAuthenticationInfo Class Doc Comment
 *
 * @category Class
 * @package  Adyen\Model\Checkout
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ThreeDSRequestorPriorAuthenticationInfo implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ThreeDSRequestorPriorAuthenticationInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'three_ds_req_prior_auth_data' => 'string',
        'three_ds_req_prior_auth_method' => 'string',
        'three_ds_req_prior_auth_timestamp' => 'string',
        'three_ds_req_prior_ref' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'three_ds_req_prior_auth_data' => null,
        'three_ds_req_prior_auth_method' => null,
        'three_ds_req_prior_auth_timestamp' => null,
        'three_ds_req_prior_ref' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'three_ds_req_prior_auth_data' => false,
        'three_ds_req_prior_auth_method' => false,
        'three_ds_req_prior_auth_timestamp' => false,
        'three_ds_req_prior_ref' => false
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
        'three_ds_req_prior_auth_data' => 'threeDSReqPriorAuthData',
        'three_ds_req_prior_auth_method' => 'threeDSReqPriorAuthMethod',
        'three_ds_req_prior_auth_timestamp' => 'threeDSReqPriorAuthTimestamp',
        'three_ds_req_prior_ref' => 'threeDSReqPriorRef'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'three_ds_req_prior_auth_data' => 'setThreeDsReqPriorAuthData',
        'three_ds_req_prior_auth_method' => 'setThreeDsReqPriorAuthMethod',
        'three_ds_req_prior_auth_timestamp' => 'setThreeDsReqPriorAuthTimestamp',
        'three_ds_req_prior_ref' => 'setThreeDsReqPriorRef'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'three_ds_req_prior_auth_data' => 'getThreeDsReqPriorAuthData',
        'three_ds_req_prior_auth_method' => 'getThreeDsReqPriorAuthMethod',
        'three_ds_req_prior_auth_timestamp' => 'getThreeDsReqPriorAuthTimestamp',
        'three_ds_req_prior_ref' => 'getThreeDsReqPriorRef'
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

    public const THREE_DS_REQ_PRIOR_AUTH_METHOD__01 = '01';
    public const THREE_DS_REQ_PRIOR_AUTH_METHOD__02 = '02';
    public const THREE_DS_REQ_PRIOR_AUTH_METHOD__03 = '03';
    public const THREE_DS_REQ_PRIOR_AUTH_METHOD__04 = '04';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getThreeDsReqPriorAuthMethodAllowableValues()
    {
        return [
            self::THREE_DS_REQ_PRIOR_AUTH_METHOD__01,
            self::THREE_DS_REQ_PRIOR_AUTH_METHOD__02,
            self::THREE_DS_REQ_PRIOR_AUTH_METHOD__03,
            self::THREE_DS_REQ_PRIOR_AUTH_METHOD__04,
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
        $this->setIfExists('three_ds_req_prior_auth_data', $data ?? [], null);
        $this->setIfExists('three_ds_req_prior_auth_method', $data ?? [], null);
        $this->setIfExists('three_ds_req_prior_auth_timestamp', $data ?? [], null);
        $this->setIfExists('three_ds_req_prior_ref', $data ?? [], null);
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

        $allowedValues = $this->getThreeDsReqPriorAuthMethodAllowableValues();
        if (!is_null($this->container['three_ds_req_prior_auth_method']) && !in_array($this->container['three_ds_req_prior_auth_method'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'three_ds_req_prior_auth_method', must be one of '%s'",
                $this->container['three_ds_req_prior_auth_method'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['three_ds_req_prior_auth_method']) && (mb_strlen($this->container['three_ds_req_prior_auth_method']) > 2)) {
            $invalidProperties[] = "invalid value for 'three_ds_req_prior_auth_method', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['three_ds_req_prior_auth_method']) && (mb_strlen($this->container['three_ds_req_prior_auth_method']) < 2)) {
            $invalidProperties[] = "invalid value for 'three_ds_req_prior_auth_method', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['three_ds_req_prior_auth_timestamp']) && (mb_strlen($this->container['three_ds_req_prior_auth_timestamp']) > 12)) {
            $invalidProperties[] = "invalid value for 'three_ds_req_prior_auth_timestamp', the character length must be smaller than or equal to 12.";
        }

        if (!is_null($this->container['three_ds_req_prior_auth_timestamp']) && (mb_strlen($this->container['three_ds_req_prior_auth_timestamp']) < 12)) {
            $invalidProperties[] = "invalid value for 'three_ds_req_prior_auth_timestamp', the character length must be bigger than or equal to 12.";
        }

        if (!is_null($this->container['three_ds_req_prior_ref']) && (mb_strlen($this->container['three_ds_req_prior_ref']) > 36)) {
            $invalidProperties[] = "invalid value for 'three_ds_req_prior_ref', the character length must be smaller than or equal to 36.";
        }

        if (!is_null($this->container['three_ds_req_prior_ref']) && (mb_strlen($this->container['three_ds_req_prior_ref']) < 36)) {
            $invalidProperties[] = "invalid value for 'three_ds_req_prior_ref', the character length must be bigger than or equal to 36.";
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
     * Gets three_ds_req_prior_auth_data
     *
     * @return string|null
     */
    public function getThreeDsReqPriorAuthData()
    {
        return $this->container['three_ds_req_prior_auth_data'];
    }

    /**
     * Sets three_ds_req_prior_auth_data
     *
     * @param string|null $three_ds_req_prior_auth_data Data that documents and supports a specific authentication process. Maximum length: 2048 bytes.
     *
     * @return self
     */
    public function setThreeDsReqPriorAuthData($three_ds_req_prior_auth_data)
    {
        if (is_null($three_ds_req_prior_auth_data)) {
            throw new \InvalidArgumentException('non-nullable three_ds_req_prior_auth_data cannot be null');
        }
        $this->container['three_ds_req_prior_auth_data'] = $three_ds_req_prior_auth_data;

        return $this;
    }

    /**
     * Gets three_ds_req_prior_auth_method
     *
     * @return string|null
     */
    public function getThreeDsReqPriorAuthMethod()
    {
        return $this->container['three_ds_req_prior_auth_method'];
    }

    /**
     * Sets three_ds_req_prior_auth_method
     *
     * @param string|null $three_ds_req_prior_auth_method Mechanism used by the Cardholder to previously authenticate to the 3DS Requestor. Allowed values: * **01** — Frictionless authentication occurred by ACS. * **02** — Cardholder challenge occurred by ACS. * **03** — AVS verified. * **04** — Other issuer methods.
     *
     * @return self
     */
    public function setThreeDsReqPriorAuthMethod($three_ds_req_prior_auth_method)
    {
        if (is_null($three_ds_req_prior_auth_method)) {
            throw new \InvalidArgumentException('non-nullable three_ds_req_prior_auth_method cannot be null');
        }
        $allowedValues = $this->getThreeDsReqPriorAuthMethodAllowableValues();
        if (!in_array($three_ds_req_prior_auth_method, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'three_ds_req_prior_auth_method', must be one of '%s'",
                    $three_ds_req_prior_auth_method,
                    implode("', '", $allowedValues)
                )
            );
        }
        if ((mb_strlen($three_ds_req_prior_auth_method) > 2)) {
            throw new \InvalidArgumentException('invalid length for $three_ds_req_prior_auth_method when calling ThreeDSRequestorPriorAuthenticationInfo., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($three_ds_req_prior_auth_method) < 2)) {
            throw new \InvalidArgumentException('invalid length for $three_ds_req_prior_auth_method when calling ThreeDSRequestorPriorAuthenticationInfo., must be bigger than or equal to 2.');
        }

        $this->container['three_ds_req_prior_auth_method'] = $three_ds_req_prior_auth_method;

        return $this;
    }

    /**
     * Gets three_ds_req_prior_auth_timestamp
     *
     * @return string|null
     */
    public function getThreeDsReqPriorAuthTimestamp()
    {
        return $this->container['three_ds_req_prior_auth_timestamp'];
    }

    /**
     * Sets three_ds_req_prior_auth_timestamp
     *
     * @param string|null $three_ds_req_prior_auth_timestamp Date and time in UTC of the prior cardholder authentication. Format: YYYYMMDDHHMM
     *
     * @return self
     */
    public function setThreeDsReqPriorAuthTimestamp($three_ds_req_prior_auth_timestamp)
    {
        if (is_null($three_ds_req_prior_auth_timestamp)) {
            throw new \InvalidArgumentException('non-nullable three_ds_req_prior_auth_timestamp cannot be null');
        }
        if ((mb_strlen($three_ds_req_prior_auth_timestamp) > 12)) {
            throw new \InvalidArgumentException('invalid length for $three_ds_req_prior_auth_timestamp when calling ThreeDSRequestorPriorAuthenticationInfo., must be smaller than or equal to 12.');
        }
        if ((mb_strlen($three_ds_req_prior_auth_timestamp) < 12)) {
            throw new \InvalidArgumentException('invalid length for $three_ds_req_prior_auth_timestamp when calling ThreeDSRequestorPriorAuthenticationInfo., must be bigger than or equal to 12.');
        }

        $this->container['three_ds_req_prior_auth_timestamp'] = $three_ds_req_prior_auth_timestamp;

        return $this;
    }

    /**
     * Gets three_ds_req_prior_ref
     *
     * @return string|null
     */
    public function getThreeDsReqPriorRef()
    {
        return $this->container['three_ds_req_prior_ref'];
    }

    /**
     * Sets three_ds_req_prior_ref
     *
     * @param string|null $three_ds_req_prior_ref This data element provides additional information to the ACS to determine the best approach for handing a request. This data element contains an ACS Transaction ID for a prior authenticated transaction. For example, the first recurring transaction that was authenticated with the cardholder. Length: 30 characters.
     *
     * @return self
     */
    public function setThreeDsReqPriorRef($three_ds_req_prior_ref)
    {
        if (is_null($three_ds_req_prior_ref)) {
            throw new \InvalidArgumentException('non-nullable three_ds_req_prior_ref cannot be null');
        }
        if ((mb_strlen($three_ds_req_prior_ref) > 36)) {
            throw new \InvalidArgumentException('invalid length for $three_ds_req_prior_ref when calling ThreeDSRequestorPriorAuthenticationInfo., must be smaller than or equal to 36.');
        }
        if ((mb_strlen($three_ds_req_prior_ref) < 36)) {
            throw new \InvalidArgumentException('invalid length for $three_ds_req_prior_ref when calling ThreeDSRequestorPriorAuthenticationInfo., must be bigger than or equal to 36.');
        }

        $this->container['three_ds_req_prior_ref'] = $three_ds_req_prior_ref;

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
