<?php

/**
 * Management API
 *
 * The version of the OpenAPI document: 1
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
 * Profile Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Profile implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Profile';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'authType' => 'string',
        'autoWifi' => 'bool',
        'bssType' => 'string',
        'channel' => 'int',
        'defaultProfile' => 'bool',
        'eap' => 'string',
        'eapCaCert' => '\Adyen\Model\Management\File',
        'eapClientCert' => '\Adyen\Model\Management\File',
        'eapClientKey' => '\Adyen\Model\Management\File',
        'eapClientPwd' => 'string',
        'eapIdentity' => 'string',
        'eapIntermediateCert' => '\Adyen\Model\Management\File',
        'eapPwd' => 'string',
        'hiddenSsid' => 'bool',
        'name' => 'string',
        'psk' => 'string',
        'ssid' => 'string',
        'wsec' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'authType' => null,
        'autoWifi' => null,
        'bssType' => null,
        'channel' => 'int32',
        'defaultProfile' => null,
        'eap' => null,
        'eapCaCert' => null,
        'eapClientCert' => null,
        'eapClientKey' => null,
        'eapClientPwd' => null,
        'eapIdentity' => null,
        'eapIntermediateCert' => null,
        'eapPwd' => null,
        'hiddenSsid' => null,
        'name' => null,
        'psk' => null,
        'ssid' => null,
        'wsec' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'authType' => false,
		'autoWifi' => false,
		'bssType' => false,
		'channel' => true,
		'defaultProfile' => false,
		'eap' => false,
		'eapCaCert' => false,
		'eapClientCert' => false,
		'eapClientKey' => false,
		'eapClientPwd' => false,
		'eapIdentity' => false,
		'eapIntermediateCert' => false,
		'eapPwd' => false,
		'hiddenSsid' => false,
		'name' => false,
		'psk' => false,
		'ssid' => false,
		'wsec' => false
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
        'authType' => 'authType',
        'autoWifi' => 'autoWifi',
        'bssType' => 'bssType',
        'channel' => 'channel',
        'defaultProfile' => 'defaultProfile',
        'eap' => 'eap',
        'eapCaCert' => 'eapCaCert',
        'eapClientCert' => 'eapClientCert',
        'eapClientKey' => 'eapClientKey',
        'eapClientPwd' => 'eapClientPwd',
        'eapIdentity' => 'eapIdentity',
        'eapIntermediateCert' => 'eapIntermediateCert',
        'eapPwd' => 'eapPwd',
        'hiddenSsid' => 'hiddenSsid',
        'name' => 'name',
        'psk' => 'psk',
        'ssid' => 'ssid',
        'wsec' => 'wsec'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'authType' => 'setAuthType',
        'autoWifi' => 'setAutoWifi',
        'bssType' => 'setBssType',
        'channel' => 'setChannel',
        'defaultProfile' => 'setDefaultProfile',
        'eap' => 'setEap',
        'eapCaCert' => 'setEapCaCert',
        'eapClientCert' => 'setEapClientCert',
        'eapClientKey' => 'setEapClientKey',
        'eapClientPwd' => 'setEapClientPwd',
        'eapIdentity' => 'setEapIdentity',
        'eapIntermediateCert' => 'setEapIntermediateCert',
        'eapPwd' => 'setEapPwd',
        'hiddenSsid' => 'setHiddenSsid',
        'name' => 'setName',
        'psk' => 'setPsk',
        'ssid' => 'setSsid',
        'wsec' => 'setWsec'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'authType' => 'getAuthType',
        'autoWifi' => 'getAutoWifi',
        'bssType' => 'getBssType',
        'channel' => 'getChannel',
        'defaultProfile' => 'getDefaultProfile',
        'eap' => 'getEap',
        'eapCaCert' => 'getEapCaCert',
        'eapClientCert' => 'getEapClientCert',
        'eapClientKey' => 'getEapClientKey',
        'eapClientPwd' => 'getEapClientPwd',
        'eapIdentity' => 'getEapIdentity',
        'eapIntermediateCert' => 'getEapIntermediateCert',
        'eapPwd' => 'getEapPwd',
        'hiddenSsid' => 'getHiddenSsid',
        'name' => 'getName',
        'psk' => 'getPsk',
        'ssid' => 'getSsid',
        'wsec' => 'getWsec'
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
        $this->setIfExists('authType', $data ?? [], null);
        $this->setIfExists('autoWifi', $data ?? [], null);
        $this->setIfExists('bssType', $data ?? [], null);
        $this->setIfExists('channel', $data ?? [], null);
        $this->setIfExists('defaultProfile', $data ?? [], null);
        $this->setIfExists('eap', $data ?? [], null);
        $this->setIfExists('eapCaCert', $data ?? [], null);
        $this->setIfExists('eapClientCert', $data ?? [], null);
        $this->setIfExists('eapClientKey', $data ?? [], null);
        $this->setIfExists('eapClientPwd', $data ?? [], null);
        $this->setIfExists('eapIdentity', $data ?? [], null);
        $this->setIfExists('eapIntermediateCert', $data ?? [], null);
        $this->setIfExists('eapPwd', $data ?? [], null);
        $this->setIfExists('hiddenSsid', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('psk', $data ?? [], null);
        $this->setIfExists('ssid', $data ?? [], null);
        $this->setIfExists('wsec', $data ?? [], null);
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

        if ($this->container['authType'] === null) {
            $invalidProperties[] = "'authType' can't be null";
        }
        if ($this->container['bssType'] === null) {
            $invalidProperties[] = "'bssType' can't be null";
        }
        if ($this->container['ssid'] === null) {
            $invalidProperties[] = "'ssid' can't be null";
        }
        if ($this->container['wsec'] === null) {
            $invalidProperties[] = "'wsec' can't be null";
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
     * Gets authType
     *
     * @return string
     */
    public function getAuthType()
    {
        return $this->container['authType'];
    }

    /**
     * Sets authType
     *
     * @param string $authType The type of Wi-Fi network. Possible values: **wpa-psk**, **wpa2-psk**, **wpa-eap**, **wpa2-eap**.
     *
     * @return self
     */
    public function setAuthType($authType)
    {
        if (is_null($authType)) {
            throw new \InvalidArgumentException('non-nullable authType cannot be null');
        }
        $this->container['authType'] = $authType;

        return $this;
    }

    /**
     * Gets autoWifi
     *
     * @return bool|null
     */
    public function getAutoWifi()
    {
        return $this->container['autoWifi'];
    }

    /**
     * Sets autoWifi
     *
     * @param bool|null $autoWifi Indicates whether to automatically select the best authentication method available. Does not work on older terminal models.
     *
     * @return self
     */
    public function setAutoWifi($autoWifi)
    {
        if (is_null($autoWifi)) {
            throw new \InvalidArgumentException('non-nullable autoWifi cannot be null');
        }
        $this->container['autoWifi'] = $autoWifi;

        return $this;
    }

    /**
     * Gets bssType
     *
     * @return string
     */
    public function getBssType()
    {
        return $this->container['bssType'];
    }

    /**
     * Sets bssType
     *
     * @param string $bssType Use **infra** for infrastructure-based networks. This applies to most networks. Use **adhoc** only if the communication is p2p-based between base stations.
     *
     * @return self
     */
    public function setBssType($bssType)
    {
        if (is_null($bssType)) {
            throw new \InvalidArgumentException('non-nullable bssType cannot be null');
        }
        $this->container['bssType'] = $bssType;

        return $this;
    }

    /**
     * Gets channel
     *
     * @return int|null
     */
    public function getChannel()
    {
        return $this->container['channel'];
    }

    /**
     * Sets channel
     *
     * @param int|null $channel The channel number of the Wi-Fi network. The recommended setting is **0** for automatic channel selection.
     *
     * @return self
     */
    public function setChannel($channel)
    {
        // Do nothing for nullable integers
        $this->container['channel'] = $channel;

        return $this;
    }

    /**
     * Gets defaultProfile
     *
     * @return bool|null
     */
    public function getDefaultProfile()
    {
        return $this->container['defaultProfile'];
    }

    /**
     * Sets defaultProfile
     *
     * @param bool|null $defaultProfile Indicates whether this is your preferred wireless network. If **true**, the terminal will try connecting to this network first.
     *
     * @return self
     */
    public function setDefaultProfile($defaultProfile)
    {
        if (is_null($defaultProfile)) {
            throw new \InvalidArgumentException('non-nullable defaultProfile cannot be null');
        }
        $this->container['defaultProfile'] = $defaultProfile;

        return $this;
    }

    /**
     * Gets eap
     *
     * @return string|null
     */
    public function getEap()
    {
        return $this->container['eap'];
    }

    /**
     * Sets eap
     *
     * @param string|null $eap For `authType` **wpa-eap** or **wpa2-eap**. Possible values: **tls**, **peap**, **leap**, **fast**
     *
     * @return self
     */
    public function setEap($eap)
    {
        if (is_null($eap)) {
            throw new \InvalidArgumentException('non-nullable eap cannot be null');
        }
        $this->container['eap'] = $eap;

        return $this;
    }

    /**
     * Gets eapCaCert
     *
     * @return \Adyen\Model\Management\File|null
     */
    public function getEapCaCert()
    {
        return $this->container['eapCaCert'];
    }

    /**
     * Sets eapCaCert
     *
     * @param \Adyen\Model\Management\File|null $eapCaCert eapCaCert
     *
     * @return self
     */
    public function setEapCaCert($eapCaCert)
    {
        if (is_null($eapCaCert)) {
            throw new \InvalidArgumentException('non-nullable eapCaCert cannot be null');
        }
        $this->container['eapCaCert'] = $eapCaCert;

        return $this;
    }

    /**
     * Gets eapClientCert
     *
     * @return \Adyen\Model\Management\File|null
     */
    public function getEapClientCert()
    {
        return $this->container['eapClientCert'];
    }

    /**
     * Sets eapClientCert
     *
     * @param \Adyen\Model\Management\File|null $eapClientCert eapClientCert
     *
     * @return self
     */
    public function setEapClientCert($eapClientCert)
    {
        if (is_null($eapClientCert)) {
            throw new \InvalidArgumentException('non-nullable eapClientCert cannot be null');
        }
        $this->container['eapClientCert'] = $eapClientCert;

        return $this;
    }

    /**
     * Gets eapClientKey
     *
     * @return \Adyen\Model\Management\File|null
     */
    public function getEapClientKey()
    {
        return $this->container['eapClientKey'];
    }

    /**
     * Sets eapClientKey
     *
     * @param \Adyen\Model\Management\File|null $eapClientKey eapClientKey
     *
     * @return self
     */
    public function setEapClientKey($eapClientKey)
    {
        if (is_null($eapClientKey)) {
            throw new \InvalidArgumentException('non-nullable eapClientKey cannot be null');
        }
        $this->container['eapClientKey'] = $eapClientKey;

        return $this;
    }

    /**
     * Gets eapClientPwd
     *
     * @return string|null
     */
    public function getEapClientPwd()
    {
        return $this->container['eapClientPwd'];
    }

    /**
     * Sets eapClientPwd
     *
     * @param string|null $eapClientPwd For `eap` **tls**. The password of the RSA key file, if that file is password-protected.
     *
     * @return self
     */
    public function setEapClientPwd($eapClientPwd)
    {
        if (is_null($eapClientPwd)) {
            throw new \InvalidArgumentException('non-nullable eapClientPwd cannot be null');
        }
        $this->container['eapClientPwd'] = $eapClientPwd;

        return $this;
    }

    /**
     * Gets eapIdentity
     *
     * @return string|null
     */
    public function getEapIdentity()
    {
        return $this->container['eapIdentity'];
    }

    /**
     * Sets eapIdentity
     *
     * @param string|null $eapIdentity For `authType` **wpa-eap** or **wpa2-eap**. The EAP-PEAP username from your MS-CHAP account. Must match the configuration of your RADIUS server.
     *
     * @return self
     */
    public function setEapIdentity($eapIdentity)
    {
        if (is_null($eapIdentity)) {
            throw new \InvalidArgumentException('non-nullable eapIdentity cannot be null');
        }
        $this->container['eapIdentity'] = $eapIdentity;

        return $this;
    }

    /**
     * Gets eapIntermediateCert
     *
     * @return \Adyen\Model\Management\File|null
     */
    public function getEapIntermediateCert()
    {
        return $this->container['eapIntermediateCert'];
    }

    /**
     * Sets eapIntermediateCert
     *
     * @param \Adyen\Model\Management\File|null $eapIntermediateCert eapIntermediateCert
     *
     * @return self
     */
    public function setEapIntermediateCert($eapIntermediateCert)
    {
        if (is_null($eapIntermediateCert)) {
            throw new \InvalidArgumentException('non-nullable eapIntermediateCert cannot be null');
        }
        $this->container['eapIntermediateCert'] = $eapIntermediateCert;

        return $this;
    }

    /**
     * Gets eapPwd
     *
     * @return string|null
     */
    public function getEapPwd()
    {
        return $this->container['eapPwd'];
    }

    /**
     * Sets eapPwd
     *
     * @param string|null $eapPwd For `eap` **peap**. The EAP-PEAP password from your MS-CHAP account. Must match the configuration of your RADIUS server.
     *
     * @return self
     */
    public function setEapPwd($eapPwd)
    {
        if (is_null($eapPwd)) {
            throw new \InvalidArgumentException('non-nullable eapPwd cannot be null');
        }
        $this->container['eapPwd'] = $eapPwd;

        return $this;
    }

    /**
     * Gets hiddenSsid
     *
     * @return bool|null
     */
    public function getHiddenSsid()
    {
        return $this->container['hiddenSsid'];
    }

    /**
     * Sets hiddenSsid
     *
     * @param bool|null $hiddenSsid Indicates if the network doesn't broadcast its SSID. Mandatory for Android terminals, because these terminals rely on this setting to be able to connect to any network.
     *
     * @return self
     */
    public function setHiddenSsid($hiddenSsid)
    {
        if (is_null($hiddenSsid)) {
            throw new \InvalidArgumentException('non-nullable hiddenSsid cannot be null');
        }
        $this->container['hiddenSsid'] = $hiddenSsid;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name Your name for the Wi-Fi profile.
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets psk
     *
     * @return string|null
     */
    public function getPsk()
    {
        return $this->container['psk'];
    }

    /**
     * Sets psk
     *
     * @param string|null $psk For `authType` **wpa-psk or **wpa2-psk**. The password to the wireless network.
     *
     * @return self
     */
    public function setPsk($psk)
    {
        if (is_null($psk)) {
            throw new \InvalidArgumentException('non-nullable psk cannot be null');
        }
        $this->container['psk'] = $psk;

        return $this;
    }

    /**
     * Gets ssid
     *
     * @return string
     */
    public function getSsid()
    {
        return $this->container['ssid'];
    }

    /**
     * Sets ssid
     *
     * @param string $ssid The name of the wireless network.
     *
     * @return self
     */
    public function setSsid($ssid)
    {
        if (is_null($ssid)) {
            throw new \InvalidArgumentException('non-nullable ssid cannot be null');
        }
        $this->container['ssid'] = $ssid;

        return $this;
    }

    /**
     * Gets wsec
     *
     * @return string
     */
    public function getWsec()
    {
        return $this->container['wsec'];
    }

    /**
     * Sets wsec
     *
     * @param string $wsec The type of encryption. Possible values: **auto**, **ccmp** (recommended), **tkip**
     *
     * @return self
     */
    public function setWsec($wsec)
    {
        if (is_null($wsec)) {
            throw new \InvalidArgumentException('non-nullable wsec cannot be null');
        }
        $this->container['wsec'] = $wsec;

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
