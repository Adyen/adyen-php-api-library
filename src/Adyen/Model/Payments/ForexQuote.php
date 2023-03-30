<?php

/**
 * Adyen Payment API
 *
 * A set of API endpoints that allow you to initiate, settle, and modify payments on the Adyen payments platform. You can use the API to accept card payments (including One-Click and 3D Secure), bank transfers, ewallets, and many other payment methods.  To learn more about the API, visit [Classic integration](https://docs.adyen.com/classic-integration).  ## Authentication You need an [API credential](https://docs.adyen.com/development-resources/api-credentials) to authenticate to the API.  If using an API key, add an `X-API-Key` header with the API key as the value, for example:   ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ```  Alternatively, you can use the username and password to connect to the API using basic authentication, for example:  ``` curl -U \"ws@Company.YOUR_COMPANY_ACCOUNT\":\"YOUR_BASIC_AUTHENTICATION_PASSWORD\" \\ -H \"Content-Type: application/json\" \\ ... ```  ## Versioning Payments API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://pal-test.adyen.com/pal/servlet/Payment/v68/authorise ```  ## Going live  To authenticate to the live endpoints, you need an [API credential](https://docs.adyen.com/development-resources/api-credentials) from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account: ```  https://{PREFIX}-pal-live.adyenpayments.com/pal/servlet/Payment/v68/authorise ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.
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
        'account_type' => 'string',
        'base_amount' => '\Adyen\Model\Payments\Amount',
        'base_points' => 'int',
        'buy' => '\Adyen\Model\Payments\Amount',
        'interbank' => '\Adyen\Model\Payments\Amount',
        'reference' => 'string',
        'sell' => '\Adyen\Model\Payments\Amount',
        'signature' => 'string',
        'source' => 'string',
        'type' => 'string',
        'valid_till' => '\DateTime'
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
        'account_type' => null,
        'base_amount' => null,
        'base_points' => 'int32',
        'buy' => null,
        'interbank' => null,
        'reference' => null,
        'sell' => null,
        'signature' => null,
        'source' => null,
        'type' => null,
        'valid_till' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'account' => false,
		'account_type' => false,
		'base_amount' => false,
		'base_points' => true,
		'buy' => false,
		'interbank' => false,
		'reference' => false,
		'sell' => false,
		'signature' => false,
		'source' => false,
		'type' => false,
		'valid_till' => false
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
        'account_type' => 'accountType',
        'base_amount' => 'baseAmount',
        'base_points' => 'basePoints',
        'buy' => 'buy',
        'interbank' => 'interbank',
        'reference' => 'reference',
        'sell' => 'sell',
        'signature' => 'signature',
        'source' => 'source',
        'type' => 'type',
        'valid_till' => 'validTill'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account' => 'setAccount',
        'account_type' => 'setAccountType',
        'base_amount' => 'setBaseAmount',
        'base_points' => 'setBasePoints',
        'buy' => 'setBuy',
        'interbank' => 'setInterbank',
        'reference' => 'setReference',
        'sell' => 'setSell',
        'signature' => 'setSignature',
        'source' => 'setSource',
        'type' => 'setType',
        'valid_till' => 'setValidTill'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account' => 'getAccount',
        'account_type' => 'getAccountType',
        'base_amount' => 'getBaseAmount',
        'base_points' => 'getBasePoints',
        'buy' => 'getBuy',
        'interbank' => 'getInterbank',
        'reference' => 'getReference',
        'sell' => 'getSell',
        'signature' => 'getSignature',
        'source' => 'getSource',
        'type' => 'getType',
        'valid_till' => 'getValidTill'
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
        $this->setIfExists('account_type', $data ?? [], null);
        $this->setIfExists('base_amount', $data ?? [], null);
        $this->setIfExists('base_points', $data ?? [], null);
        $this->setIfExists('buy', $data ?? [], null);
        $this->setIfExists('interbank', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('sell', $data ?? [], null);
        $this->setIfExists('signature', $data ?? [], null);
        $this->setIfExists('source', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('valid_till', $data ?? [], null);
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

        if ($this->container['base_points'] === null) {
            $invalidProperties[] = "'base_points' can't be null";
        }
        if ($this->container['valid_till'] === null) {
            $invalidProperties[] = "'valid_till' can't be null";
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
     * Gets account_type
     *
     * @return string|null
     */
    public function getAccountType()
    {
        return $this->container['account_type'];
    }

    /**
     * Sets account_type
     *
     * @param string|null $account_type The account type.
     *
     * @return self
     */
    public function setAccountType($account_type)
    {
        if (is_null($account_type)) {
            throw new \InvalidArgumentException('non-nullable account_type cannot be null');
        }
        $this->container['account_type'] = $account_type;

        return $this;
    }

    /**
     * Gets base_amount
     *
     * @return \Adyen\Model\Payments\Amount|null
     */
    public function getBaseAmount()
    {
        return $this->container['base_amount'];
    }

    /**
     * Sets base_amount
     *
     * @param \Adyen\Model\Payments\Amount|null $base_amount base_amount
     *
     * @return self
     */
    public function setBaseAmount($base_amount)
    {
        if (is_null($base_amount)) {
            throw new \InvalidArgumentException('non-nullable base_amount cannot be null');
        }
        $this->container['base_amount'] = $base_amount;

        return $this;
    }

    /**
     * Gets base_points
     *
     * @return int
     */
    public function getBasePoints()
    {
        return $this->container['base_points'];
    }

    /**
     * Sets base_points
     *
     * @param int $base_points The base points.
     *
     * @return self
     */
    public function setBasePoints($base_points)
    {
        // Do nothing for nullable integers
        $this->container['base_points'] = $base_points;

        return $this;
    }

    /**
     * Gets buy
     *
     * @return \Adyen\Model\Payments\Amount|null
     */
    public function getBuy()
    {
        return $this->container['buy'];
    }

    /**
     * Sets buy
     *
     * @param \Adyen\Model\Payments\Amount|null $buy buy
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
     * @return \Adyen\Model\Payments\Amount|null
     */
    public function getInterbank()
    {
        return $this->container['interbank'];
    }

    /**
     * Sets interbank
     *
     * @param \Adyen\Model\Payments\Amount|null $interbank interbank
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
     * @return \Adyen\Model\Payments\Amount|null
     */
    public function getSell()
    {
        return $this->container['sell'];
    }

    /**
     * Sets sell
     *
     * @param \Adyen\Model\Payments\Amount|null $sell sell
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
     * Gets valid_till
     *
     * @return \DateTime
     */
    public function getValidTill()
    {
        return $this->container['valid_till'];
    }

    /**
     * Sets valid_till
     *
     * @param \DateTime $valid_till The date until which the forex quote is valid.
     *
     * @return self
     */
    public function setValidTill($valid_till)
    {
        if (is_null($valid_till)) {
            throw new \InvalidArgumentException('non-nullable valid_till cannot be null');
        }
        $this->container['valid_till'] = $valid_till;

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
