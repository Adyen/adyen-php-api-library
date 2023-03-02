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
 * ResponseAdditionalDataCard Class Doc Comment
 *
 * @category Class
 * @package  Adyen\Model\Checkout
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ResponseAdditionalDataCard implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ResponseAdditionalDataCard';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'card_bin' => 'string',
        'card_holder_name' => 'string',
        'card_issuing_bank' => 'string',
        'card_issuing_country' => 'string',
        'card_issuing_currency' => 'string',
        'card_payment_method' => 'string',
        'card_summary' => 'string',
        'issuer_bin' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'card_bin' => null,
        'card_holder_name' => null,
        'card_issuing_bank' => null,
        'card_issuing_country' => null,
        'card_issuing_currency' => null,
        'card_payment_method' => null,
        'card_summary' => null,
        'issuer_bin' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'card_bin' => false,
        'card_holder_name' => false,
        'card_issuing_bank' => false,
        'card_issuing_country' => false,
        'card_issuing_currency' => false,
        'card_payment_method' => false,
        'card_summary' => false,
        'issuer_bin' => false
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
        'card_bin' => 'cardBin',
        'card_holder_name' => 'cardHolderName',
        'card_issuing_bank' => 'cardIssuingBank',
        'card_issuing_country' => 'cardIssuingCountry',
        'card_issuing_currency' => 'cardIssuingCurrency',
        'card_payment_method' => 'cardPaymentMethod',
        'card_summary' => 'cardSummary',
        'issuer_bin' => 'issuerBin'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'card_bin' => 'setCardBin',
        'card_holder_name' => 'setCardHolderName',
        'card_issuing_bank' => 'setCardIssuingBank',
        'card_issuing_country' => 'setCardIssuingCountry',
        'card_issuing_currency' => 'setCardIssuingCurrency',
        'card_payment_method' => 'setCardPaymentMethod',
        'card_summary' => 'setCardSummary',
        'issuer_bin' => 'setIssuerBin'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'card_bin' => 'getCardBin',
        'card_holder_name' => 'getCardHolderName',
        'card_issuing_bank' => 'getCardIssuingBank',
        'card_issuing_country' => 'getCardIssuingCountry',
        'card_issuing_currency' => 'getCardIssuingCurrency',
        'card_payment_method' => 'getCardPaymentMethod',
        'card_summary' => 'getCardSummary',
        'issuer_bin' => 'getIssuerBin'
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
        $this->setIfExists('card_bin', $data ?? [], null);
        $this->setIfExists('card_holder_name', $data ?? [], null);
        $this->setIfExists('card_issuing_bank', $data ?? [], null);
        $this->setIfExists('card_issuing_country', $data ?? [], null);
        $this->setIfExists('card_issuing_currency', $data ?? [], null);
        $this->setIfExists('card_payment_method', $data ?? [], null);
        $this->setIfExists('card_summary', $data ?? [], null);
        $this->setIfExists('issuer_bin', $data ?? [], null);
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
     * Gets card_bin
     *
     * @return string|null
     */
    public function getCardBin()
    {
        return $this->container['card_bin'];
    }

    /**
     * Sets card_bin
     *
     * @param string|null $card_bin The first six digits of the card number.  This is the [Bank Identification Number (BIN)](https://docs.adyen.com/get-started-with-adyen/payment-glossary#bank-identification-number-bin) for card numbers with a six-digit BIN.  Example: 521234
     *
     * @return self
     */
    public function setCardBin($card_bin)
    {
        if (is_null($card_bin)) {
            throw new \InvalidArgumentException('non-nullable card_bin cannot be null');
        }
        $this->container['card_bin'] = $card_bin;

        return $this;
    }

    /**
     * Gets card_holder_name
     *
     * @return string|null
     */
    public function getCardHolderName()
    {
        return $this->container['card_holder_name'];
    }

    /**
     * Sets card_holder_name
     *
     * @param string|null $card_holder_name The cardholder name passed in the payment request.
     *
     * @return self
     */
    public function setCardHolderName($card_holder_name)
    {
        if (is_null($card_holder_name)) {
            throw new \InvalidArgumentException('non-nullable card_holder_name cannot be null');
        }
        $this->container['card_holder_name'] = $card_holder_name;

        return $this;
    }

    /**
     * Gets card_issuing_bank
     *
     * @return string|null
     */
    public function getCardIssuingBank()
    {
        return $this->container['card_issuing_bank'];
    }

    /**
     * Sets card_issuing_bank
     *
     * @param string|null $card_issuing_bank The bank or the financial institution granting lines of credit through card association branded payment cards. This information can be included when available.
     *
     * @return self
     */
    public function setCardIssuingBank($card_issuing_bank)
    {
        if (is_null($card_issuing_bank)) {
            throw new \InvalidArgumentException('non-nullable card_issuing_bank cannot be null');
        }
        $this->container['card_issuing_bank'] = $card_issuing_bank;

        return $this;
    }

    /**
     * Gets card_issuing_country
     *
     * @return string|null
     */
    public function getCardIssuingCountry()
    {
        return $this->container['card_issuing_country'];
    }

    /**
     * Sets card_issuing_country
     *
     * @param string|null $card_issuing_country The country where the card was issued.  Example: US
     *
     * @return self
     */
    public function setCardIssuingCountry($card_issuing_country)
    {
        if (is_null($card_issuing_country)) {
            throw new \InvalidArgumentException('non-nullable card_issuing_country cannot be null');
        }
        $this->container['card_issuing_country'] = $card_issuing_country;

        return $this;
    }

    /**
     * Gets card_issuing_currency
     *
     * @return string|null
     */
    public function getCardIssuingCurrency()
    {
        return $this->container['card_issuing_currency'];
    }

    /**
     * Sets card_issuing_currency
     *
     * @param string|null $card_issuing_currency The currency in which the card is issued, if this information is available. Provided as the currency code or currency number from the ISO-4217 standard.   Example: USD
     *
     * @return self
     */
    public function setCardIssuingCurrency($card_issuing_currency)
    {
        if (is_null($card_issuing_currency)) {
            throw new \InvalidArgumentException('non-nullable card_issuing_currency cannot be null');
        }
        $this->container['card_issuing_currency'] = $card_issuing_currency;

        return $this;
    }

    /**
     * Gets card_payment_method
     *
     * @return string|null
     */
    public function getCardPaymentMethod()
    {
        return $this->container['card_payment_method'];
    }

    /**
     * Sets card_payment_method
     *
     * @param string|null $card_payment_method The card payment method used for the transaction.  Example: amex
     *
     * @return self
     */
    public function setCardPaymentMethod($card_payment_method)
    {
        if (is_null($card_payment_method)) {
            throw new \InvalidArgumentException('non-nullable card_payment_method cannot be null');
        }
        $this->container['card_payment_method'] = $card_payment_method;

        return $this;
    }

    /**
     * Gets card_summary
     *
     * @return string|null
     */
    public function getCardSummary()
    {
        return $this->container['card_summary'];
    }

    /**
     * Sets card_summary
     *
     * @param string|null $card_summary The last four digits of a card number.  > Returned only in case of a card payment.
     *
     * @return self
     */
    public function setCardSummary($card_summary)
    {
        if (is_null($card_summary)) {
            throw new \InvalidArgumentException('non-nullable card_summary cannot be null');
        }
        $this->container['card_summary'] = $card_summary;

        return $this;
    }

    /**
     * Gets issuer_bin
     *
     * @return string|null
     */
    public function getIssuerBin()
    {
        return $this->container['issuer_bin'];
    }

    /**
     * Sets issuer_bin
     *
     * @param string|null $issuer_bin The first eight digits of the card number. Only returned if the card number is 16 digits or more.  This is the [Bank Identification Number (BIN)](https://docs.adyen.com/get-started-with-adyen/payment-glossary#bank-identification-number-bin) for card numbers with an eight-digit BIN.  Example: 52123423
     *
     * @return self
     */
    public function setIssuerBin($issuer_bin)
    {
        if (is_null($issuer_bin)) {
            throw new \InvalidArgumentException('non-nullable issuer_bin cannot be null');
        }
        $this->container['issuer_bin'] = $issuer_bin;

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
