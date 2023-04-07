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
 * BrowserInfo Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
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
        'accept_header' => 'string',
        'color_depth' => 'int',
        'java_enabled' => 'bool',
        'java_script_enabled' => 'bool',
        'language' => 'string',
        'screen_height' => 'int',
        'screen_width' => 'int',
        'time_zone_offset' => 'int',
        'user_agent' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'accept_header' => null,
        'color_depth' => 'int32',
        'java_enabled' => null,
        'java_script_enabled' => null,
        'language' => null,
        'screen_height' => 'int32',
        'screen_width' => 'int32',
        'time_zone_offset' => 'int32',
        'user_agent' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'accept_header' => false,
        'color_depth' => true,
        'java_enabled' => false,
        'java_script_enabled' => false,
        'language' => false,
        'screen_height' => true,
        'screen_width' => true,
        'time_zone_offset' => true,
        'user_agent' => false
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
        'accept_header' => 'acceptHeader',
        'color_depth' => 'colorDepth',
        'java_enabled' => 'javaEnabled',
        'java_script_enabled' => 'javaScriptEnabled',
        'language' => 'language',
        'screen_height' => 'screenHeight',
        'screen_width' => 'screenWidth',
        'time_zone_offset' => 'timeZoneOffset',
        'user_agent' => 'userAgent'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accept_header' => 'setAcceptHeader',
        'color_depth' => 'setColorDepth',
        'java_enabled' => 'setJavaEnabled',
        'java_script_enabled' => 'setJavaScriptEnabled',
        'language' => 'setLanguage',
        'screen_height' => 'setScreenHeight',
        'screen_width' => 'setScreenWidth',
        'time_zone_offset' => 'setTimeZoneOffset',
        'user_agent' => 'setUserAgent'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accept_header' => 'getAcceptHeader',
        'color_depth' => 'getColorDepth',
        'java_enabled' => 'getJavaEnabled',
        'java_script_enabled' => 'getJavaScriptEnabled',
        'language' => 'getLanguage',
        'screen_height' => 'getScreenHeight',
        'screen_width' => 'getScreenWidth',
        'time_zone_offset' => 'getTimeZoneOffset',
        'user_agent' => 'getUserAgent'
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
        $this->setIfExists('accept_header', $data ?? [], null);
        $this->setIfExists('color_depth', $data ?? [], null);
        $this->setIfExists('java_enabled', $data ?? [], null);
        $this->setIfExists('java_script_enabled', $data ?? [], true);
        $this->setIfExists('language', $data ?? [], null);
        $this->setIfExists('screen_height', $data ?? [], null);
        $this->setIfExists('screen_width', $data ?? [], null);
        $this->setIfExists('time_zone_offset', $data ?? [], null);
        $this->setIfExists('user_agent', $data ?? [], null);
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

        if ($this->container['accept_header'] === null) {
            $invalidProperties[] = "'accept_header' can't be null";
        }
        if ($this->container['color_depth'] === null) {
            $invalidProperties[] = "'color_depth' can't be null";
        }
        if ($this->container['java_enabled'] === null) {
            $invalidProperties[] = "'java_enabled' can't be null";
        }
        if ($this->container['language'] === null) {
            $invalidProperties[] = "'language' can't be null";
        }
        if ($this->container['screen_height'] === null) {
            $invalidProperties[] = "'screen_height' can't be null";
        }
        if ($this->container['screen_width'] === null) {
            $invalidProperties[] = "'screen_width' can't be null";
        }
        if ($this->container['time_zone_offset'] === null) {
            $invalidProperties[] = "'time_zone_offset' can't be null";
        }
        if ($this->container['user_agent'] === null) {
            $invalidProperties[] = "'user_agent' can't be null";
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
     * Gets accept_header
     *
     * @return string
     */
    public function getAcceptHeader()
    {
        return $this->container['accept_header'];
    }

    /**
     * Sets accept_header
     *
     * @param string $accept_header The accept header value of the shopper's browser.
     *
     * @return self
     */
    public function setAcceptHeader($accept_header)
    {
        if (is_null($accept_header)) {
            throw new \InvalidArgumentException('non-nullable accept_header cannot be null');
        }
        $this->container['accept_header'] = $accept_header;

        return $this;
    }

    /**
     * Gets color_depth
     *
     * @return int
     */
    public function getColorDepth()
    {
        return $this->container['color_depth'];
    }

    /**
     * Sets color_depth
     *
     * @param int $color_depth The color depth of the shopper's browser in bits per pixel. This should be obtained by using the browser's `screen.colorDepth` property. Accepted values: 1, 4, 8, 15, 16, 24, 30, 32 or 48 bit color depth.
     *
     * @return self
     */
    public function setColorDepth($color_depth)
    {
        // Do nothing for nullable integers
        $this->container['color_depth'] = $color_depth;

        return $this;
    }

    /**
     * Gets java_enabled
     *
     * @return bool
     */
    public function getJavaEnabled()
    {
        return $this->container['java_enabled'];
    }

    /**
     * Sets java_enabled
     *
     * @param bool $java_enabled Boolean value indicating if the shopper's browser is able to execute Java.
     *
     * @return self
     */
    public function setJavaEnabled($java_enabled)
    {
        if (is_null($java_enabled)) {
            throw new \InvalidArgumentException('non-nullable java_enabled cannot be null');
        }
        $this->container['java_enabled'] = $java_enabled;

        return $this;
    }

    /**
     * Gets java_script_enabled
     *
     * @return bool|null
     */
    public function getJavaScriptEnabled()
    {
        return $this->container['java_script_enabled'];
    }

    /**
     * Sets java_script_enabled
     *
     * @param bool|null $java_script_enabled Boolean value indicating if the shopper's browser is able to execute JavaScript. A default 'true' value is assumed if the field is not present.
     *
     * @return self
     */
    public function setJavaScriptEnabled($java_script_enabled)
    {
        if (is_null($java_script_enabled)) {
            throw new \InvalidArgumentException('non-nullable java_script_enabled cannot be null');
        }
        $this->container['java_script_enabled'] = $java_script_enabled;

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
        if (is_null($language)) {
            throw new \InvalidArgumentException('non-nullable language cannot be null');
        }
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets screen_height
     *
     * @return int
     */
    public function getScreenHeight()
    {
        return $this->container['screen_height'];
    }

    /**
     * Sets screen_height
     *
     * @param int $screen_height The total height of the shopper's device screen in pixels.
     *
     * @return self
     */
    public function setScreenHeight($screen_height)
    {
        // Do nothing for nullable integers
        $this->container['screen_height'] = $screen_height;

        return $this;
    }

    /**
     * Gets screen_width
     *
     * @return int
     */
    public function getScreenWidth()
    {
        return $this->container['screen_width'];
    }

    /**
     * Sets screen_width
     *
     * @param int $screen_width The total width of the shopper's device screen in pixels.
     *
     * @return self
     */
    public function setScreenWidth($screen_width)
    {
        // Do nothing for nullable integers
        $this->container['screen_width'] = $screen_width;

        return $this;
    }

    /**
     * Gets time_zone_offset
     *
     * @return int
     */
    public function getTimeZoneOffset()
    {
        return $this->container['time_zone_offset'];
    }

    /**
     * Sets time_zone_offset
     *
     * @param int $time_zone_offset Time difference between UTC time and the shopper's browser local time, in minutes.
     *
     * @return self
     */
    public function setTimeZoneOffset($time_zone_offset)
    {
        // Do nothing for nullable integers
        $this->container['time_zone_offset'] = $time_zone_offset;

        return $this;
    }

    /**
     * Gets user_agent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->container['user_agent'];
    }

    /**
     * Sets user_agent
     *
     * @param string $user_agent The user agent value of the shopper's browser.
     *
     * @return self
     */
    public function setUserAgent($user_agent)
    {
        if (is_null($user_agent)) {
            throw new \InvalidArgumentException('non-nullable user_agent cannot be null');
        }
        $this->container['user_agent'] = $user_agent;

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
