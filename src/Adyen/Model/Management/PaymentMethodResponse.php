<?php

/**
 * Management API
 *
 * Configure and manage your Adyen company and merchant accounts, stores, and payment terminals. ## Authentication Each request to the Management API must be signed with an API key. [Generate your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) in the Customer Area and then set this key to the `X-API-Key` header value.  To access the live endpoints, you need to generate a new API key in your live Customer Area. ## Versioning  Management API handles versioning as part of the endpoint URL. For example, to send a request to version 1 of the `/companies/{companyId}/webhooks` endpoint, use:  ```text https://management-test.adyen.com/v1/companies/{companyId}/webhooks ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area. Use this API key to make requests to:  ```text https://management-live.adyen.com/v1 ```
 *
 * The version of the OpenAPI document: 1
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Management;

use \ArrayAccess;
use Adyen\Model\Management\ObjectSerializer;

/**
 * PaymentMethodResponse Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentMethodResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentMethodResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        '_links' => '\Adyen\Model\Management\PaginationLinks',
        'data' => '\Adyen\Model\Management\PaymentMethod[]',
        'items_total' => 'int',
        'pages_total' => 'int',
        'types_with_errors' => 'string[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        '_links' => null,
        'data' => null,
        'items_total' => 'int32',
        'pages_total' => 'int32',
        'types_with_errors' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        '_links' => false,
		'data' => false,
		'items_total' => true,
		'pages_total' => true,
		'types_with_errors' => false
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
        '_links' => '_links',
        'data' => 'data',
        'items_total' => 'itemsTotal',
        'pages_total' => 'pagesTotal',
        'types_with_errors' => 'typesWithErrors'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        '_links' => 'setLinks',
        'data' => 'setData',
        'items_total' => 'setItemsTotal',
        'pages_total' => 'setPagesTotal',
        'types_with_errors' => 'setTypesWithErrors'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        '_links' => 'getLinks',
        'data' => 'getData',
        'items_total' => 'getItemsTotal',
        'pages_total' => 'getPagesTotal',
        'types_with_errors' => 'getTypesWithErrors'
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

    public const TYPES_WITH_ERRORS_AFTERPAYTOUCH = 'afterpaytouch';
    public const TYPES_WITH_ERRORS_ALIPAY = 'alipay';
    public const TYPES_WITH_ERRORS_ALIPAY_HK = 'alipay_hk';
    public const TYPES_WITH_ERRORS_AMEX = 'amex';
    public const TYPES_WITH_ERRORS_APPLEPAY = 'applepay';
    public const TYPES_WITH_ERRORS_BCMC = 'bcmc';
    public const TYPES_WITH_ERRORS_BLIK = 'blik';
    public const TYPES_WITH_ERRORS_CARTEBANCAIRE = 'cartebancaire';
    public const TYPES_WITH_ERRORS_CLEARPAY = 'clearpay';
    public const TYPES_WITH_ERRORS_CUP = 'cup';
    public const TYPES_WITH_ERRORS_DINERS = 'diners';
    public const TYPES_WITH_ERRORS_DIRECT_EBANKING = 'directEbanking';
    public const TYPES_WITH_ERRORS_DIRECTDEBIT_GB = 'directdebit_GB';
    public const TYPES_WITH_ERRORS_DISCOVER = 'discover';
    public const TYPES_WITH_ERRORS_EBANKING_FI = 'ebanking_FI';
    public const TYPES_WITH_ERRORS_EFTPOS_AUSTRALIA = 'eftpos_australia';
    public const TYPES_WITH_ERRORS_ELO = 'elo';
    public const TYPES_WITH_ERRORS_ELOCREDIT = 'elocredit';
    public const TYPES_WITH_ERRORS_ELODEBIT = 'elodebit';
    public const TYPES_WITH_ERRORS_GIROCARD = 'girocard';
    public const TYPES_WITH_ERRORS_GIROPAY = 'giropay';
    public const TYPES_WITH_ERRORS_GOOGLEPAY = 'googlepay';
    public const TYPES_WITH_ERRORS_HIPER = 'hiper';
    public const TYPES_WITH_ERRORS_HIPERCARD = 'hipercard';
    public const TYPES_WITH_ERRORS_IDEAL = 'ideal';
    public const TYPES_WITH_ERRORS_INTERAC_CARD = 'interac_card';
    public const TYPES_WITH_ERRORS_JCB = 'jcb';
    public const TYPES_WITH_ERRORS_KLARNA = 'klarna';
    public const TYPES_WITH_ERRORS_KLARNA_ACCOUNT = 'klarna_account';
    public const TYPES_WITH_ERRORS_KLARNA_PAYNOW = 'klarna_paynow';
    public const TYPES_WITH_ERRORS_MAESTRO = 'maestro';
    public const TYPES_WITH_ERRORS_MBWAY = 'mbway';
    public const TYPES_WITH_ERRORS_MC = 'mc';
    public const TYPES_WITH_ERRORS_MCDEBIT = 'mcdebit';
    public const TYPES_WITH_ERRORS_MEAL_VOUCHER_FR = 'mealVoucher_FR';
    public const TYPES_WITH_ERRORS_MOBILEPAY = 'mobilepay';
    public const TYPES_WITH_ERRORS_MULTIBANCO = 'multibanco';
    public const TYPES_WITH_ERRORS_ONLINE_BANKING_PL = 'onlineBanking_PL';
    public const TYPES_WITH_ERRORS_PAYPAL = 'paypal';
    public const TYPES_WITH_ERRORS_PAYSHOP = 'payshop';
    public const TYPES_WITH_ERRORS_SWISH = 'swish';
    public const TYPES_WITH_ERRORS_TRUSTLY = 'trustly';
    public const TYPES_WITH_ERRORS_VIPPS = 'vipps';
    public const TYPES_WITH_ERRORS_VISA = 'visa';
    public const TYPES_WITH_ERRORS_VISADEBIT = 'visadebit';
    public const TYPES_WITH_ERRORS_VPAY = 'vpay';
    public const TYPES_WITH_ERRORS_WECHATPAY = 'wechatpay';
    public const TYPES_WITH_ERRORS_WECHATPAY_POS = 'wechatpay_pos';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypesWithErrorsAllowableValues()
    {
        return [
            self::TYPES_WITH_ERRORS_AFTERPAYTOUCH,
            self::TYPES_WITH_ERRORS_ALIPAY,
            self::TYPES_WITH_ERRORS_ALIPAY_HK,
            self::TYPES_WITH_ERRORS_AMEX,
            self::TYPES_WITH_ERRORS_APPLEPAY,
            self::TYPES_WITH_ERRORS_BCMC,
            self::TYPES_WITH_ERRORS_BLIK,
            self::TYPES_WITH_ERRORS_CARTEBANCAIRE,
            self::TYPES_WITH_ERRORS_CLEARPAY,
            self::TYPES_WITH_ERRORS_CUP,
            self::TYPES_WITH_ERRORS_DINERS,
            self::TYPES_WITH_ERRORS_DIRECT_EBANKING,
            self::TYPES_WITH_ERRORS_DIRECTDEBIT_GB,
            self::TYPES_WITH_ERRORS_DISCOVER,
            self::TYPES_WITH_ERRORS_EBANKING_FI,
            self::TYPES_WITH_ERRORS_EFTPOS_AUSTRALIA,
            self::TYPES_WITH_ERRORS_ELO,
            self::TYPES_WITH_ERRORS_ELOCREDIT,
            self::TYPES_WITH_ERRORS_ELODEBIT,
            self::TYPES_WITH_ERRORS_GIROCARD,
            self::TYPES_WITH_ERRORS_GIROPAY,
            self::TYPES_WITH_ERRORS_GOOGLEPAY,
            self::TYPES_WITH_ERRORS_HIPER,
            self::TYPES_WITH_ERRORS_HIPERCARD,
            self::TYPES_WITH_ERRORS_IDEAL,
            self::TYPES_WITH_ERRORS_INTERAC_CARD,
            self::TYPES_WITH_ERRORS_JCB,
            self::TYPES_WITH_ERRORS_KLARNA,
            self::TYPES_WITH_ERRORS_KLARNA_ACCOUNT,
            self::TYPES_WITH_ERRORS_KLARNA_PAYNOW,
            self::TYPES_WITH_ERRORS_MAESTRO,
            self::TYPES_WITH_ERRORS_MBWAY,
            self::TYPES_WITH_ERRORS_MC,
            self::TYPES_WITH_ERRORS_MCDEBIT,
            self::TYPES_WITH_ERRORS_MEAL_VOUCHER_FR,
            self::TYPES_WITH_ERRORS_MOBILEPAY,
            self::TYPES_WITH_ERRORS_MULTIBANCO,
            self::TYPES_WITH_ERRORS_ONLINE_BANKING_PL,
            self::TYPES_WITH_ERRORS_PAYPAL,
            self::TYPES_WITH_ERRORS_PAYSHOP,
            self::TYPES_WITH_ERRORS_SWISH,
            self::TYPES_WITH_ERRORS_TRUSTLY,
            self::TYPES_WITH_ERRORS_VIPPS,
            self::TYPES_WITH_ERRORS_VISA,
            self::TYPES_WITH_ERRORS_VISADEBIT,
            self::TYPES_WITH_ERRORS_VPAY,
            self::TYPES_WITH_ERRORS_WECHATPAY,
            self::TYPES_WITH_ERRORS_WECHATPAY_POS,
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
        $this->setIfExists('_links', $data ?? [], null);
        $this->setIfExists('data', $data ?? [], null);
        $this->setIfExists('items_total', $data ?? [], null);
        $this->setIfExists('pages_total', $data ?? [], null);
        $this->setIfExists('types_with_errors', $data ?? [], null);
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

        if ($this->container['items_total'] === null) {
            $invalidProperties[] = "'items_total' can't be null";
        }
        if ($this->container['pages_total'] === null) {
            $invalidProperties[] = "'pages_total' can't be null";
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
     * Gets _links
     *
     * @return \Adyen\Model\Management\PaginationLinks|null
     */
    public function getLinks()
    {
        return $this->container['_links'];
    }

    /**
     * Sets _links
     *
     * @param \Adyen\Model\Management\PaginationLinks|null $_links _links
     *
     * @return self
     */
    public function setLinks($_links)
    {
        if (is_null($_links)) {
            throw new \InvalidArgumentException('non-nullable _links cannot be null');
        }
        $this->container['_links'] = $_links;

        return $this;
    }

    /**
     * Gets data
     *
     * @return \Adyen\Model\Management\PaymentMethod[]|null
     */
    public function getData()
    {
        return $this->container['data'];
    }

    /**
     * Sets data
     *
     * @param \Adyen\Model\Management\PaymentMethod[]|null $data Payment methods details.
     *
     * @return self
     */
    public function setData($data)
    {
        if (is_null($data)) {
            throw new \InvalidArgumentException('non-nullable data cannot be null');
        }
        $this->container['data'] = $data;

        return $this;
    }

    /**
     * Gets items_total
     *
     * @return int
     */
    public function getItemsTotal()
    {
        return $this->container['items_total'];
    }

    /**
     * Sets items_total
     *
     * @param int $items_total Total number of items.
     *
     * @return self
     */
    public function setItemsTotal($items_total)
    {
        // Do nothing for nullable integers
        $this->container['items_total'] = $items_total;

        return $this;
    }

    /**
     * Gets pages_total
     *
     * @return int
     */
    public function getPagesTotal()
    {
        return $this->container['pages_total'];
    }

    /**
     * Sets pages_total
     *
     * @param int $pages_total Total number of pages.
     *
     * @return self
     */
    public function setPagesTotal($pages_total)
    {
        // Do nothing for nullable integers
        $this->container['pages_total'] = $pages_total;

        return $this;
    }

    /**
     * Gets types_with_errors
     *
     * @return string[]|null
     */
    public function getTypesWithErrors()
    {
        return $this->container['types_with_errors'];
    }

    /**
     * Sets types_with_errors
     *
     * @param string[]|null $types_with_errors Payment method types with errors.
     *
     * @return self
     */
    public function setTypesWithErrors($types_with_errors)
    {
        if (is_null($types_with_errors)) {
            throw new \InvalidArgumentException('non-nullable types_with_errors cannot be null');
        }
        $allowedValues = $this->getTypesWithErrorsAllowableValues();
        if (array_diff($types_with_errors, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'types_with_errors', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['types_with_errors'] = $types_with_errors;

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
