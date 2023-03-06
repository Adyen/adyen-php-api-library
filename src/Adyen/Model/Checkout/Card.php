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
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

/**
 * Card Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Card implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Card';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'cvc' => 'string',
        'expiry_month' => 'string',
        'expiry_year' => 'string',
        'holder_name' => 'string',
        'issue_number' => 'string',
        'number' => 'string',
        'start_month' => 'string',
        'start_year' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'cvc' => null,
        'expiry_month' => null,
        'expiry_year' => null,
        'holder_name' => null,
        'issue_number' => null,
        'number' => null,
        'start_month' => null,
        'start_year' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'cvc' => false,
        'expiry_month' => false,
        'expiry_year' => false,
        'holder_name' => false,
        'issue_number' => false,
        'number' => false,
        'start_month' => false,
        'start_year' => false
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
        'cvc' => 'cvc',
        'expiry_month' => 'expiryMonth',
        'expiry_year' => 'expiryYear',
        'holder_name' => 'holderName',
        'issue_number' => 'issueNumber',
        'number' => 'number',
        'start_month' => 'startMonth',
        'start_year' => 'startYear'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cvc' => 'setCvc',
        'expiry_month' => 'setExpiryMonth',
        'expiry_year' => 'setExpiryYear',
        'holder_name' => 'setHolderName',
        'issue_number' => 'setIssueNumber',
        'number' => 'setNumber',
        'start_month' => 'setStartMonth',
        'start_year' => 'setStartYear'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cvc' => 'getCvc',
        'expiry_month' => 'getExpiryMonth',
        'expiry_year' => 'getExpiryYear',
        'holder_name' => 'getHolderName',
        'issue_number' => 'getIssueNumber',
        'number' => 'getNumber',
        'start_month' => 'getStartMonth',
        'start_year' => 'getStartYear'
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
        $this->setIfExists('cvc', $data ?? [], null);
        $this->setIfExists('expiry_month', $data ?? [], null);
        $this->setIfExists('expiry_year', $data ?? [], null);
        $this->setIfExists('holder_name', $data ?? [], null);
        $this->setIfExists('issue_number', $data ?? [], null);
        $this->setIfExists('number', $data ?? [], null);
        $this->setIfExists('start_month', $data ?? [], null);
        $this->setIfExists('start_year', $data ?? [], null);
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

        if (!is_null($this->container['cvc']) && (mb_strlen($this->container['cvc']) > 20)) {
            $invalidProperties[] = "invalid value for 'cvc', the character length must be smaller than or equal to 20.";
        }

        if (!is_null($this->container['cvc']) && (mb_strlen($this->container['cvc']) < 1)) {
            $invalidProperties[] = "invalid value for 'cvc', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['expiry_month']) && (mb_strlen($this->container['expiry_month']) > 2)) {
            $invalidProperties[] = "invalid value for 'expiry_month', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['expiry_month']) && (mb_strlen($this->container['expiry_month']) < 1)) {
            $invalidProperties[] = "invalid value for 'expiry_month', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['expiry_year'] === null) {
            $invalidProperties[] = "'expiry_year' can't be null";
        }
        if ((mb_strlen($this->container['expiry_year']) > 4)) {
            $invalidProperties[] = "invalid value for 'expiry_year', the character length must be smaller than or equal to 4.";
        }

        if ((mb_strlen($this->container['expiry_year']) < 4)) {
            $invalidProperties[] = "invalid value for 'expiry_year', the character length must be bigger than or equal to 4.";
        }

        if ($this->container['holder_name'] === null) {
            $invalidProperties[] = "'holder_name' can't be null";
        }
        if ((mb_strlen($this->container['holder_name']) > 50)) {
            $invalidProperties[] = "invalid value for 'holder_name', the character length must be smaller than or equal to 50.";
        }

        if ((mb_strlen($this->container['holder_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'holder_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['issue_number']) && (mb_strlen($this->container['issue_number']) > 2)) {
            $invalidProperties[] = "invalid value for 'issue_number', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['issue_number']) && (mb_strlen($this->container['issue_number']) < 1)) {
            $invalidProperties[] = "invalid value for 'issue_number', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['number']) && (mb_strlen($this->container['number']) > 19)) {
            $invalidProperties[] = "invalid value for 'number', the character length must be smaller than or equal to 19.";
        }

        if (!is_null($this->container['number']) && (mb_strlen($this->container['number']) < 4)) {
            $invalidProperties[] = "invalid value for 'number', the character length must be bigger than or equal to 4.";
        }

        if (!is_null($this->container['start_month']) && (mb_strlen($this->container['start_month']) > 2)) {
            $invalidProperties[] = "invalid value for 'start_month', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['start_month']) && (mb_strlen($this->container['start_month']) < 1)) {
            $invalidProperties[] = "invalid value for 'start_month', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['start_year']) && (mb_strlen($this->container['start_year']) > 4)) {
            $invalidProperties[] = "invalid value for 'start_year', the character length must be smaller than or equal to 4.";
        }

        if (!is_null($this->container['start_year']) && (mb_strlen($this->container['start_year']) < 4)) {
            $invalidProperties[] = "invalid value for 'start_year', the character length must be bigger than or equal to 4.";
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
     * Gets cvc
     *
     * @return string|null
     */
    public function getCvc()
    {
        return $this->container['cvc'];
    }

    /**
     * Sets cvc
     *
     * @param string|null $cvc The [card verification code](https://docs.adyen.com/payments-fundamentals/payment-glossary#card-security-code-cvc-cvv-cid) (1-20 characters). Depending on the card brand, it is known also as: * CVV2/CVC2 – length: 3 digits * CID – length: 4 digits > If you are using [Client-Side Encryption](https://docs.adyen.com/classic-integration/cse-integration-ecommerce), the CVC code is present in the encrypted data. You must never post the card details to the server. > This field must be always present in a [one-click payment request](https://docs.adyen.com/classic-integration/recurring-payments). > When this value is returned in a response, it is always empty because it is not stored.
     *
     * @return self
     */
    public function setCvc($cvc)
    {
        if (is_null($cvc)) {
            throw new \InvalidArgumentException('non-nullable cvc cannot be null');
        }
        if ((mb_strlen($cvc) > 20)) {
            throw new \InvalidArgumentException('invalid length for $cvc when calling Card., must be smaller than or equal to 20.');
        }
        if ((mb_strlen($cvc) < 1)) {
            throw new \InvalidArgumentException('invalid length for $cvc when calling Card., must be bigger than or equal to 1.');
        }

        $this->container['cvc'] = $cvc;

        return $this;
    }

    /**
     * Gets expiry_month
     *
     * @return string|null
     */
    public function getExpiryMonth()
    {
        return $this->container['expiry_month'];
    }

    /**
     * Sets expiry_month
     *
     * @param string|null $expiry_month The card expiry month. Format: 2 digits, zero-padded for single digits. For example: * 03 = March * 11 = November
     *
     * @return self
     */
    public function setExpiryMonth($expiry_month)
    {
        if (is_null($expiry_month)) {
            throw new \InvalidArgumentException('non-nullable expiry_month cannot be null');
        }
        if ((mb_strlen($expiry_month) > 2)) {
            throw new \InvalidArgumentException('invalid length for $expiry_month when calling Card., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($expiry_month) < 1)) {
            throw new \InvalidArgumentException('invalid length for $expiry_month when calling Card., must be bigger than or equal to 1.');
        }

        $this->container['expiry_month'] = $expiry_month;

        return $this;
    }

    /**
     * Gets expiry_year
     *
     * @return string
     */
    public function getExpiryYear()
    {
        return $this->container['expiry_year'];
    }

    /**
     * Sets expiry_year
     *
     * @param string $expiry_year The card expiry year. Format: 4 digits. For example: 2020
     *
     * @return self
     */
    public function setExpiryYear($expiry_year)
    {
        if (is_null($expiry_year)) {
            throw new \InvalidArgumentException('non-nullable expiry_year cannot be null');
        }
        if ((mb_strlen($expiry_year) > 4)) {
            throw new \InvalidArgumentException('invalid length for $expiry_year when calling Card., must be smaller than or equal to 4.');
        }
        if ((mb_strlen($expiry_year) < 4)) {
            throw new \InvalidArgumentException('invalid length for $expiry_year when calling Card., must be bigger than or equal to 4.');
        }

        $this->container['expiry_year'] = $expiry_year;

        return $this;
    }

    /**
     * Gets holder_name
     *
     * @return string
     */
    public function getHolderName()
    {
        return $this->container['holder_name'];
    }

    /**
     * Sets holder_name
     *
     * @param string $holder_name The name of the cardholder, as printed on the card.
     *
     * @return self
     */
    public function setHolderName($holder_name)
    {
        if (is_null($holder_name)) {
            throw new \InvalidArgumentException('non-nullable holder_name cannot be null');
        }
        if ((mb_strlen($holder_name) > 50)) {
            throw new \InvalidArgumentException('invalid length for $holder_name when calling Card., must be smaller than or equal to 50.');
        }
        if ((mb_strlen($holder_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $holder_name when calling Card., must be bigger than or equal to 1.');
        }

        $this->container['holder_name'] = $holder_name;

        return $this;
    }

    /**
     * Gets issue_number
     *
     * @return string|null
     */
    public function getIssueNumber()
    {
        return $this->container['issue_number'];
    }

    /**
     * Sets issue_number
     *
     * @param string|null $issue_number The issue number of the card (for some UK debit cards only).
     *
     * @return self
     */
    public function setIssueNumber($issue_number)
    {
        if (is_null($issue_number)) {
            throw new \InvalidArgumentException('non-nullable issue_number cannot be null');
        }
        if ((mb_strlen($issue_number) > 2)) {
            throw new \InvalidArgumentException('invalid length for $issue_number when calling Card., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($issue_number) < 1)) {
            throw new \InvalidArgumentException('invalid length for $issue_number when calling Card., must be bigger than or equal to 1.');
        }

        $this->container['issue_number'] = $issue_number;

        return $this;
    }

    /**
     * Gets number
     *
     * @return string|null
     */
    public function getNumber()
    {
        return $this->container['number'];
    }

    /**
     * Sets number
     *
     * @param string|null $number The card number (4-19 characters). Do not use any separators. When this value is returned in a response, only the last 4 digits of the card number are returned.
     *
     * @return self
     */
    public function setNumber($number)
    {
        if (is_null($number)) {
            throw new \InvalidArgumentException('non-nullable number cannot be null');
        }
        if ((mb_strlen($number) > 19)) {
            throw new \InvalidArgumentException('invalid length for $number when calling Card., must be smaller than or equal to 19.');
        }
        if ((mb_strlen($number) < 4)) {
            throw new \InvalidArgumentException('invalid length for $number when calling Card., must be bigger than or equal to 4.');
        }

        $this->container['number'] = $number;

        return $this;
    }

    /**
     * Gets start_month
     *
     * @return string|null
     */
    public function getStartMonth()
    {
        return $this->container['start_month'];
    }

    /**
     * Sets start_month
     *
     * @param string|null $start_month The month component of the start date (for some UK debit cards only).
     *
     * @return self
     */
    public function setStartMonth($start_month)
    {
        if (is_null($start_month)) {
            throw new \InvalidArgumentException('non-nullable start_month cannot be null');
        }
        if ((mb_strlen($start_month) > 2)) {
            throw new \InvalidArgumentException('invalid length for $start_month when calling Card., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($start_month) < 1)) {
            throw new \InvalidArgumentException('invalid length for $start_month when calling Card., must be bigger than or equal to 1.');
        }

        $this->container['start_month'] = $start_month;

        return $this;
    }

    /**
     * Gets start_year
     *
     * @return string|null
     */
    public function getStartYear()
    {
        return $this->container['start_year'];
    }

    /**
     * Sets start_year
     *
     * @param string|null $start_year The year component of the start date (for some UK debit cards only).
     *
     * @return self
     */
    public function setStartYear($start_year)
    {
        if (is_null($start_year)) {
            throw new \InvalidArgumentException('non-nullable start_year cannot be null');
        }
        if ((mb_strlen($start_year) > 4)) {
            throw new \InvalidArgumentException('invalid length for $start_year when calling Card., must be smaller than or equal to 4.');
        }
        if ((mb_strlen($start_year) < 4)) {
            throw new \InvalidArgumentException('invalid length for $start_year when calling Card., must be bigger than or equal to 4.');
        }

        $this->container['start_year'] = $start_year;

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
