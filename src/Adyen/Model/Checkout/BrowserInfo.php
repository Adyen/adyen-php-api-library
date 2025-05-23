<?php

/**
 * Adyen Checkout API
 *
 * The version of the OpenAPI document: 71
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

/**
 * BrowserInfo Class Doc Comment
 *
 * @package  Adyen
 * @implements \ArrayAccess<string, mixed>
 */
class BrowserInfo implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'BrowserInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'acceptHeader' => 'string',
        'colorDepth' => 'int',
        'javaEnabled' => 'bool',
        'javaScriptEnabled' => 'bool',
        'language' => 'string',
        'screenHeight' => 'int',
        'screenWidth' => 'int',
        'timeZoneOffset' => 'int',
        'userAgent' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'acceptHeader' => null,
        'colorDepth' => 'int32',
        'javaEnabled' => null,
        'javaScriptEnabled' => null,
        'language' => null,
        'screenHeight' => 'int32',
        'screenWidth' => 'int32',
        'timeZoneOffset' => 'int32',
        'userAgent' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'acceptHeader' => false,
        'colorDepth' => true,
        'javaEnabled' => false,
        'javaScriptEnabled' => false,
        'language' => false,
        'screenHeight' => true,
        'screenWidth' => true,
        'timeZoneOffset' => true,
        'userAgent' => false
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
        'acceptHeader' => 'acceptHeader',
        'colorDepth' => 'colorDepth',
        'javaEnabled' => 'javaEnabled',
        'javaScriptEnabled' => 'javaScriptEnabled',
        'language' => 'language',
        'screenHeight' => 'screenHeight',
        'screenWidth' => 'screenWidth',
        'timeZoneOffset' => 'timeZoneOffset',
        'userAgent' => 'userAgent'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'acceptHeader' => 'setAcceptHeader',
        'colorDepth' => 'setColorDepth',
        'javaEnabled' => 'setJavaEnabled',
        'javaScriptEnabled' => 'setJavaScriptEnabled',
        'language' => 'setLanguage',
        'screenHeight' => 'setScreenHeight',
        'screenWidth' => 'setScreenWidth',
        'timeZoneOffset' => 'setTimeZoneOffset',
        'userAgent' => 'setUserAgent'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'acceptHeader' => 'getAcceptHeader',
        'colorDepth' => 'getColorDepth',
        'javaEnabled' => 'getJavaEnabled',
        'javaScriptEnabled' => 'getJavaScriptEnabled',
        'language' => 'getLanguage',
        'screenHeight' => 'getScreenHeight',
        'screenWidth' => 'getScreenWidth',
        'timeZoneOffset' => 'getTimeZoneOffset',
        'userAgent' => 'getUserAgent'
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
    public function __construct(?array $data = null)
    {
        $this->setIfExists('acceptHeader', $data ?? [], null);
        $this->setIfExists('colorDepth', $data ?? [], null);
        $this->setIfExists('javaEnabled', $data ?? [], null);
        $this->setIfExists('javaScriptEnabled', $data ?? [], null);
        $this->setIfExists('language', $data ?? [], null);
        $this->setIfExists('screenHeight', $data ?? [], null);
        $this->setIfExists('screenWidth', $data ?? [], null);
        $this->setIfExists('timeZoneOffset', $data ?? [], null);
        $this->setIfExists('userAgent', $data ?? [], null);
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

        if ($this->container['acceptHeader'] === null) {
            $invalidProperties[] = "'acceptHeader' can't be null";
        }
        if ($this->container['colorDepth'] === null) {
            $invalidProperties[] = "'colorDepth' can't be null";
        }
        if ($this->container['javaEnabled'] === null) {
            $invalidProperties[] = "'javaEnabled' can't be null";
        }
        if ($this->container['language'] === null) {
            $invalidProperties[] = "'language' can't be null";
        }
        if ($this->container['screenHeight'] === null) {
            $invalidProperties[] = "'screenHeight' can't be null";
        }
        if ($this->container['screenWidth'] === null) {
            $invalidProperties[] = "'screenWidth' can't be null";
        }
        if ($this->container['timeZoneOffset'] === null) {
            $invalidProperties[] = "'timeZoneOffset' can't be null";
        }
        if ($this->container['userAgent'] === null) {
            $invalidProperties[] = "'userAgent' can't be null";
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
     * Gets acceptHeader
     *
     * @return string
     */
    public function getAcceptHeader()
    {
        return $this->container['acceptHeader'];
    }

    /**
     * Sets acceptHeader
     *
     * @param string $acceptHeader The accept header value of the shopper's browser.
     *
     * @return self
     */
    public function setAcceptHeader($acceptHeader)
    {
        $this->container['acceptHeader'] = $acceptHeader;

        return $this;
    }

    /**
     * Gets colorDepth
     *
     * @return int
     */
    public function getColorDepth()
    {
        return $this->container['colorDepth'];
    }

    /**
     * Sets colorDepth
     *
     * @param int $colorDepth The color depth of the shopper's browser in bits per pixel. This should be obtained by using the browser's `screen.colorDepth` property. Accepted values: 1, 4, 8, 15, 16, 24, 30, 32 or 48 bit color depth.
     *
     * @return self
     */
    public function setColorDepth($colorDepth)
    {
        $this->container['colorDepth'] = $colorDepth;

        return $this;
    }

    /**
     * Gets javaEnabled
     *
     * @return bool
     */
    public function getJavaEnabled()
    {
        return $this->container['javaEnabled'];
    }

    /**
     * Sets javaEnabled
     *
     * @param bool $javaEnabled Boolean value indicating if the shopper's browser is able to execute Java.
     *
     * @return self
     */
    public function setJavaEnabled($javaEnabled)
    {
        $this->container['javaEnabled'] = $javaEnabled;

        return $this;
    }

    /**
     * Gets javaScriptEnabled
     *
     * @return bool|null
     */
    public function getJavaScriptEnabled()
    {
        return $this->container['javaScriptEnabled'];
    }

    /**
     * Sets javaScriptEnabled
     *
     * @param bool|null $javaScriptEnabled Boolean value indicating if the shopper's browser is able to execute JavaScript. A default 'true' value is assumed if the field is not present.
     *
     * @return self
     */
    public function setJavaScriptEnabled($javaScriptEnabled)
    {
        $this->container['javaScriptEnabled'] = $javaScriptEnabled;

        return $this;
    }

    /**
     * Gets language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string $language The `navigator.language` value of the shopper's browser (as defined in IETF BCP 47).
     *
     * @return self
     */
    public function setLanguage($language)
    {
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets screenHeight
     *
     * @return int
     */
    public function getScreenHeight()
    {
        return $this->container['screenHeight'];
    }

    /**
     * Sets screenHeight
     *
     * @param int $screenHeight The total height of the shopper's device screen in pixels.
     *
     * @return self
     */
    public function setScreenHeight($screenHeight)
    {
        $this->container['screenHeight'] = $screenHeight;

        return $this;
    }

    /**
     * Gets screenWidth
     *
     * @return int
     */
    public function getScreenWidth()
    {
        return $this->container['screenWidth'];
    }

    /**
     * Sets screenWidth
     *
     * @param int $screenWidth The total width of the shopper's device screen in pixels.
     *
     * @return self
     */
    public function setScreenWidth($screenWidth)
    {
        $this->container['screenWidth'] = $screenWidth;

        return $this;
    }

    /**
     * Gets timeZoneOffset
     *
     * @return int
     */
    public function getTimeZoneOffset()
    {
        return $this->container['timeZoneOffset'];
    }

    /**
     * Sets timeZoneOffset
     *
     * @param int $timeZoneOffset Time difference between UTC time and the shopper's browser local time, in minutes.
     *
     * @return self
     */
    public function setTimeZoneOffset($timeZoneOffset)
    {
        $this->container['timeZoneOffset'] = $timeZoneOffset;

        return $this;
    }

    /**
     * Gets userAgent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->container['userAgent'];
    }

    /**
     * Sets userAgent
     *
     * @param string $userAgent The user agent value of the shopper's browser.
     *
     * @return self
     */
    public function setUserAgent($userAgent)
    {
        $this->container['userAgent'] = $userAgent;

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

    public function toArray(): array
    {
        $array = [];
        foreach (self::$openAPITypes as $propertyName => $propertyType) {
            $propertyValue = $this[$propertyName];
            if ($propertyValue !== null) {
                // Check if the property value is an object and has a toArray() method
                if (is_object($propertyValue) && method_exists($propertyValue, 'toArray')) {
                    $array[$propertyName] = $propertyValue->toArray();
                // Check if it's type datetime
                } elseif ($propertyValue instanceof \DateTime) {
                    $array[$propertyName] = $propertyValue->format(DATE_ATOM);
                // If it's an array type we should check whether it contains objects and if so call toArray method
                } elseif (is_array($propertyValue)) {
                    $array[$propertyName] = array_map(function ($item) {
                        return $item instanceof ModelInterface ? $item->toArray() : $item;
                    }, $propertyValue);
                } else {
                    // Otherwise, directly assign the property value to the array
                    $array[$propertyName] = $propertyValue;
                }
            }
        }
        return $array;
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
