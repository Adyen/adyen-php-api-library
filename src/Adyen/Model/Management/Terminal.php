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
 * Terminal Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Terminal implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Terminal';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'assigned' => 'bool',
        'bluetoothIp' => 'string',
        'bluetoothMac' => 'string',
        'city' => 'string',
        'companyAccount' => 'string',
        'countryCode' => 'string',
        'deviceModel' => 'string',
        'ethernetIp' => 'string',
        'ethernetMac' => 'string',
        'firmwareVersion' => 'string',
        'iccid' => 'string',
        'id' => 'string',
        'lastActivityDateTime' => '\DateTime',
        'lastTransactionDateTime' => '\DateTime',
        'linkNegotiation' => 'string',
        'serialNumber' => 'string',
        'simStatus' => 'string',
        'status' => 'string',
        'storeStatus' => 'string',
        'wifiIp' => 'string',
        'wifiMac' => 'string',
        'wifiSsid' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'assigned' => null,
        'bluetoothIp' => null,
        'bluetoothMac' => null,
        'city' => null,
        'companyAccount' => null,
        'countryCode' => null,
        'deviceModel' => null,
        'ethernetIp' => null,
        'ethernetMac' => null,
        'firmwareVersion' => null,
        'iccid' => null,
        'id' => null,
        'lastActivityDateTime' => 'date-time',
        'lastTransactionDateTime' => 'date-time',
        'linkNegotiation' => null,
        'serialNumber' => null,
        'simStatus' => null,
        'status' => null,
        'storeStatus' => null,
        'wifiIp' => null,
        'wifiMac' => null,
        'wifiSsid' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'assigned' => false,
		'bluetoothIp' => false,
		'bluetoothMac' => false,
		'city' => false,
		'companyAccount' => false,
		'countryCode' => false,
		'deviceModel' => false,
		'ethernetIp' => false,
		'ethernetMac' => false,
		'firmwareVersion' => false,
		'iccid' => false,
		'id' => false,
		'lastActivityDateTime' => false,
		'lastTransactionDateTime' => false,
		'linkNegotiation' => false,
		'serialNumber' => false,
		'simStatus' => false,
		'status' => false,
		'storeStatus' => false,
		'wifiIp' => false,
		'wifiMac' => false,
		'wifiSsid' => false
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
        'assigned' => 'assigned',
        'bluetoothIp' => 'bluetoothIp',
        'bluetoothMac' => 'bluetoothMac',
        'city' => 'city',
        'companyAccount' => 'companyAccount',
        'countryCode' => 'countryCode',
        'deviceModel' => 'deviceModel',
        'ethernetIp' => 'ethernetIp',
        'ethernetMac' => 'ethernetMac',
        'firmwareVersion' => 'firmwareVersion',
        'iccid' => 'iccid',
        'id' => 'id',
        'lastActivityDateTime' => 'lastActivityDateTime',
        'lastTransactionDateTime' => 'lastTransactionDateTime',
        'linkNegotiation' => 'linkNegotiation',
        'serialNumber' => 'serialNumber',
        'simStatus' => 'simStatus',
        'status' => 'status',
        'storeStatus' => 'storeStatus',
        'wifiIp' => 'wifiIp',
        'wifiMac' => 'wifiMac',
        'wifiSsid' => 'wifiSsid'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'assigned' => 'setAssigned',
        'bluetoothIp' => 'setBluetoothIp',
        'bluetoothMac' => 'setBluetoothMac',
        'city' => 'setCity',
        'companyAccount' => 'setCompanyAccount',
        'countryCode' => 'setCountryCode',
        'deviceModel' => 'setDeviceModel',
        'ethernetIp' => 'setEthernetIp',
        'ethernetMac' => 'setEthernetMac',
        'firmwareVersion' => 'setFirmwareVersion',
        'iccid' => 'setIccid',
        'id' => 'setId',
        'lastActivityDateTime' => 'setLastActivityDateTime',
        'lastTransactionDateTime' => 'setLastTransactionDateTime',
        'linkNegotiation' => 'setLinkNegotiation',
        'serialNumber' => 'setSerialNumber',
        'simStatus' => 'setSimStatus',
        'status' => 'setStatus',
        'storeStatus' => 'setStoreStatus',
        'wifiIp' => 'setWifiIp',
        'wifiMac' => 'setWifiMac',
        'wifiSsid' => 'setWifiSsid'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'assigned' => 'getAssigned',
        'bluetoothIp' => 'getBluetoothIp',
        'bluetoothMac' => 'getBluetoothMac',
        'city' => 'getCity',
        'companyAccount' => 'getCompanyAccount',
        'countryCode' => 'getCountryCode',
        'deviceModel' => 'getDeviceModel',
        'ethernetIp' => 'getEthernetIp',
        'ethernetMac' => 'getEthernetMac',
        'firmwareVersion' => 'getFirmwareVersion',
        'iccid' => 'getIccid',
        'id' => 'getId',
        'lastActivityDateTime' => 'getLastActivityDateTime',
        'lastTransactionDateTime' => 'getLastTransactionDateTime',
        'linkNegotiation' => 'getLinkNegotiation',
        'serialNumber' => 'getSerialNumber',
        'simStatus' => 'getSimStatus',
        'status' => 'getStatus',
        'storeStatus' => 'getStoreStatus',
        'wifiIp' => 'getWifiIp',
        'wifiMac' => 'getWifiMac',
        'wifiSsid' => 'getWifiSsid'
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
        $this->setIfExists('assigned', $data ?? [], null);
        $this->setIfExists('bluetoothIp', $data ?? [], null);
        $this->setIfExists('bluetoothMac', $data ?? [], null);
        $this->setIfExists('city', $data ?? [], null);
        $this->setIfExists('companyAccount', $data ?? [], null);
        $this->setIfExists('countryCode', $data ?? [], null);
        $this->setIfExists('deviceModel', $data ?? [], null);
        $this->setIfExists('ethernetIp', $data ?? [], null);
        $this->setIfExists('ethernetMac', $data ?? [], null);
        $this->setIfExists('firmwareVersion', $data ?? [], null);
        $this->setIfExists('iccid', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('lastActivityDateTime', $data ?? [], null);
        $this->setIfExists('lastTransactionDateTime', $data ?? [], null);
        $this->setIfExists('linkNegotiation', $data ?? [], null);
        $this->setIfExists('serialNumber', $data ?? [], null);
        $this->setIfExists('simStatus', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('storeStatus', $data ?? [], null);
        $this->setIfExists('wifiIp', $data ?? [], null);
        $this->setIfExists('wifiMac', $data ?? [], null);
        $this->setIfExists('wifiSsid', $data ?? [], null);
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
     * Gets assigned
     *
     * @return bool|null
     */
    public function getAssigned()
    {
        return $this->container['assigned'];
    }

    /**
     * Sets assigned
     *
     * @param bool|null $assigned The [assignment status](https://docs.adyen.com/point-of-sale/automating-terminal-management/assign-terminals-api) of the terminal. If true, the terminal is assigned. If false, the terminal is in inventory and can't be boarded.
     *
     * @return self
     */
    public function setAssigned($assigned)
    {
        if (is_null($assigned)) {
            throw new \InvalidArgumentException('non-nullable assigned cannot be null');
        }
        $this->container['assigned'] = $assigned;

        return $this;
    }

    /**
     * Gets bluetoothIp
     *
     * @return string|null
     */
    public function getBluetoothIp()
    {
        return $this->container['bluetoothIp'];
    }

    /**
     * Sets bluetoothIp
     *
     * @param string|null $bluetoothIp The Bluetooth IP address of the terminal.
     *
     * @return self
     */
    public function setBluetoothIp($bluetoothIp)
    {
        if (is_null($bluetoothIp)) {
            throw new \InvalidArgumentException('non-nullable bluetoothIp cannot be null');
        }
        $this->container['bluetoothIp'] = $bluetoothIp;

        return $this;
    }

    /**
     * Gets bluetoothMac
     *
     * @return string|null
     */
    public function getBluetoothMac()
    {
        return $this->container['bluetoothMac'];
    }

    /**
     * Sets bluetoothMac
     *
     * @param string|null $bluetoothMac The Bluetooth MAC address of the terminal.
     *
     * @return self
     */
    public function setBluetoothMac($bluetoothMac)
    {
        if (is_null($bluetoothMac)) {
            throw new \InvalidArgumentException('non-nullable bluetoothMac cannot be null');
        }
        $this->container['bluetoothMac'] = $bluetoothMac;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string|null
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string|null $city The city where the terminal is located.
     *
     * @return self
     */
    public function setCity($city)
    {
        if (is_null($city)) {
            throw new \InvalidArgumentException('non-nullable city cannot be null');
        }
        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets companyAccount
     *
     * @return string|null
     */
    public function getCompanyAccount()
    {
        return $this->container['companyAccount'];
    }

    /**
     * Sets companyAccount
     *
     * @param string|null $companyAccount The company account that the terminal is associated with. If this is the only account level shown in the response, the terminal is assigned to the inventory of the company account.
     *
     * @return self
     */
    public function setCompanyAccount($companyAccount)
    {
        if (is_null($companyAccount)) {
            throw new \InvalidArgumentException('non-nullable companyAccount cannot be null');
        }
        $this->container['companyAccount'] = $companyAccount;

        return $this;
    }

    /**
     * Gets countryCode
     *
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->container['countryCode'];
    }

    /**
     * Sets countryCode
     *
     * @param string|null $countryCode The country code of the country where the terminal is located.
     *
     * @return self
     */
    public function setCountryCode($countryCode)
    {
        if (is_null($countryCode)) {
            throw new \InvalidArgumentException('non-nullable countryCode cannot be null');
        }
        $this->container['countryCode'] = $countryCode;

        return $this;
    }

    /**
     * Gets deviceModel
     *
     * @return string|null
     */
    public function getDeviceModel()
    {
        return $this->container['deviceModel'];
    }

    /**
     * Sets deviceModel
     *
     * @param string|null $deviceModel The model name of the terminal.
     *
     * @return self
     */
    public function setDeviceModel($deviceModel)
    {
        if (is_null($deviceModel)) {
            throw new \InvalidArgumentException('non-nullable deviceModel cannot be null');
        }
        $this->container['deviceModel'] = $deviceModel;

        return $this;
    }

    /**
     * Gets ethernetIp
     *
     * @return string|null
     */
    public function getEthernetIp()
    {
        return $this->container['ethernetIp'];
    }

    /**
     * Sets ethernetIp
     *
     * @param string|null $ethernetIp The ethernet IP address of the terminal.
     *
     * @return self
     */
    public function setEthernetIp($ethernetIp)
    {
        if (is_null($ethernetIp)) {
            throw new \InvalidArgumentException('non-nullable ethernetIp cannot be null');
        }
        $this->container['ethernetIp'] = $ethernetIp;

        return $this;
    }

    /**
     * Gets ethernetMac
     *
     * @return string|null
     */
    public function getEthernetMac()
    {
        return $this->container['ethernetMac'];
    }

    /**
     * Sets ethernetMac
     *
     * @param string|null $ethernetMac The ethernet MAC address of the terminal.
     *
     * @return self
     */
    public function setEthernetMac($ethernetMac)
    {
        if (is_null($ethernetMac)) {
            throw new \InvalidArgumentException('non-nullable ethernetMac cannot be null');
        }
        $this->container['ethernetMac'] = $ethernetMac;

        return $this;
    }

    /**
     * Gets firmwareVersion
     *
     * @return string|null
     */
    public function getFirmwareVersion()
    {
        return $this->container['firmwareVersion'];
    }

    /**
     * Sets firmwareVersion
     *
     * @param string|null $firmwareVersion The software release currently in use on the terminal.
     *
     * @return self
     */
    public function setFirmwareVersion($firmwareVersion)
    {
        if (is_null($firmwareVersion)) {
            throw new \InvalidArgumentException('non-nullable firmwareVersion cannot be null');
        }
        $this->container['firmwareVersion'] = $firmwareVersion;

        return $this;
    }

    /**
     * Gets iccid
     *
     * @return string|null
     */
    public function getIccid()
    {
        return $this->container['iccid'];
    }

    /**
     * Sets iccid
     *
     * @param string|null $iccid The integrated circuit card identifier (ICCID) of the SIM card in the terminal.
     *
     * @return self
     */
    public function setIccid($iccid)
    {
        if (is_null($iccid)) {
            throw new \InvalidArgumentException('non-nullable iccid cannot be null');
        }
        $this->container['iccid'] = $iccid;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id The unique identifier of the terminal.
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets lastActivityDateTime
     *
     * @return \DateTime|null
     */
    public function getLastActivityDateTime()
    {
        return $this->container['lastActivityDateTime'];
    }

    /**
     * Sets lastActivityDateTime
     *
     * @param \DateTime|null $lastActivityDateTime Date and time of the last activity on the terminal. Not included when the last activity was more than 14 days ago.
     *
     * @return self
     */
    public function setLastActivityDateTime($lastActivityDateTime)
    {
        if (is_null($lastActivityDateTime)) {
            throw new \InvalidArgumentException('non-nullable lastActivityDateTime cannot be null');
        }
        $this->container['lastActivityDateTime'] = $lastActivityDateTime;

        return $this;
    }

    /**
     * Gets lastTransactionDateTime
     *
     * @return \DateTime|null
     */
    public function getLastTransactionDateTime()
    {
        return $this->container['lastTransactionDateTime'];
    }

    /**
     * Sets lastTransactionDateTime
     *
     * @param \DateTime|null $lastTransactionDateTime Date and time of the last transaction on the terminal. Not included when the last transaction was more than 14 days ago.
     *
     * @return self
     */
    public function setLastTransactionDateTime($lastTransactionDateTime)
    {
        if (is_null($lastTransactionDateTime)) {
            throw new \InvalidArgumentException('non-nullable lastTransactionDateTime cannot be null');
        }
        $this->container['lastTransactionDateTime'] = $lastTransactionDateTime;

        return $this;
    }

    /**
     * Gets linkNegotiation
     *
     * @return string|null
     */
    public function getLinkNegotiation()
    {
        return $this->container['linkNegotiation'];
    }

    /**
     * Sets linkNegotiation
     *
     * @param string|null $linkNegotiation The Ethernet link negotiation that the terminal uses:  - `auto`: Auto-negotiation  - `100full`: 100 Mbps full duplex
     *
     * @return self
     */
    public function setLinkNegotiation($linkNegotiation)
    {
        if (is_null($linkNegotiation)) {
            throw new \InvalidArgumentException('non-nullable linkNegotiation cannot be null');
        }
        $this->container['linkNegotiation'] = $linkNegotiation;

        return $this;
    }

    /**
     * Gets serialNumber
     *
     * @return string|null
     */
    public function getSerialNumber()
    {
        return $this->container['serialNumber'];
    }

    /**
     * Sets serialNumber
     *
     * @param string|null $serialNumber The serial number of the terminal.
     *
     * @return self
     */
    public function setSerialNumber($serialNumber)
    {
        if (is_null($serialNumber)) {
            throw new \InvalidArgumentException('non-nullable serialNumber cannot be null');
        }
        $this->container['serialNumber'] = $serialNumber;

        return $this;
    }

    /**
     * Gets simStatus
     *
     * @return string|null
     */
    public function getSimStatus()
    {
        return $this->container['simStatus'];
    }

    /**
     * Sets simStatus
     *
     * @param string|null $simStatus On a terminal that supports 3G or 4G connectivity, indicates the status of the SIM card in the terminal: ACTIVE or INVENTORY.
     *
     * @return self
     */
    public function setSimStatus($simStatus)
    {
        if (is_null($simStatus)) {
            throw new \InvalidArgumentException('non-nullable simStatus cannot be null');
        }
        $this->container['simStatus'] = $simStatus;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status Indicates when the terminal was last online, whether the terminal is being reassigned, or whether the terminal is turned off. If the terminal was last online more that a week ago, it is also shown as turned off.
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets storeStatus
     *
     * @return string|null
     */
    public function getStoreStatus()
    {
        return $this->container['storeStatus'];
    }

    /**
     * Sets storeStatus
     *
     * @param string|null $storeStatus The status of the store that the terminal is assigned to.
     *
     * @return self
     */
    public function setStoreStatus($storeStatus)
    {
        if (is_null($storeStatus)) {
            throw new \InvalidArgumentException('non-nullable storeStatus cannot be null');
        }
        $this->container['storeStatus'] = $storeStatus;

        return $this;
    }

    /**
     * Gets wifiIp
     *
     * @return string|null
     */
    public function getWifiIp()
    {
        return $this->container['wifiIp'];
    }

    /**
     * Sets wifiIp
     *
     * @param string|null $wifiIp The terminal's IP address in your Wi-Fi network.
     *
     * @return self
     */
    public function setWifiIp($wifiIp)
    {
        if (is_null($wifiIp)) {
            throw new \InvalidArgumentException('non-nullable wifiIp cannot be null');
        }
        $this->container['wifiIp'] = $wifiIp;

        return $this;
    }

    /**
     * Gets wifiMac
     *
     * @return string|null
     */
    public function getWifiMac()
    {
        return $this->container['wifiMac'];
    }

    /**
     * Sets wifiMac
     *
     * @param string|null $wifiMac The terminal's MAC address in your Wi-Fi network.
     *
     * @return self
     */
    public function setWifiMac($wifiMac)
    {
        if (is_null($wifiMac)) {
            throw new \InvalidArgumentException('non-nullable wifiMac cannot be null');
        }
        $this->container['wifiMac'] = $wifiMac;

        return $this;
    }

    /**
     * Gets wifiSsid
     *
     * @return string|null
     */
    public function getWifiSsid()
    {
        return $this->container['wifiSsid'];
    }

    /**
     * Sets wifiSsid
     *
     * @param string|null $wifiSsid The SSID of the Wi-Fi network that your terminal is connected to.
     *
     * @return self
     */
    public function setWifiSsid($wifiSsid)
    {
        if (is_null($wifiSsid)) {
            throw new \InvalidArgumentException('non-nullable wifiSsid cannot be null');
        }
        $this->container['wifiSsid'] = $wifiSsid;

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
