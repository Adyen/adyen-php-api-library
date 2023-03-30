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
        'bluetooth_ip' => 'string',
        'bluetooth_mac' => 'string',
        'city' => 'string',
        'company_account' => 'string',
        'country_code' => 'string',
        'device_model' => 'string',
        'ethernet_ip' => 'string',
        'ethernet_mac' => 'string',
        'firmware_version' => 'string',
        'iccid' => 'string',
        'id' => 'string',
        'last_activity_date_time' => '\DateTime',
        'last_transaction_date_time' => '\DateTime',
        'link_negotiation' => 'string',
        'serial_number' => 'string',
        'sim_status' => 'string',
        'status' => 'string',
        'store_status' => 'string',
        'wifi_ip' => 'string',
        'wifi_mac' => 'string',
        'wifi_ssid' => 'string'
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
        'bluetooth_ip' => null,
        'bluetooth_mac' => null,
        'city' => null,
        'company_account' => null,
        'country_code' => null,
        'device_model' => null,
        'ethernet_ip' => null,
        'ethernet_mac' => null,
        'firmware_version' => null,
        'iccid' => null,
        'id' => null,
        'last_activity_date_time' => 'date-time',
        'last_transaction_date_time' => 'date-time',
        'link_negotiation' => null,
        'serial_number' => null,
        'sim_status' => null,
        'status' => null,
        'store_status' => null,
        'wifi_ip' => null,
        'wifi_mac' => null,
        'wifi_ssid' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'assigned' => false,
        'bluetooth_ip' => false,
        'bluetooth_mac' => false,
        'city' => false,
        'company_account' => false,
        'country_code' => false,
        'device_model' => false,
        'ethernet_ip' => false,
        'ethernet_mac' => false,
        'firmware_version' => false,
        'iccid' => false,
        'id' => false,
        'last_activity_date_time' => false,
        'last_transaction_date_time' => false,
        'link_negotiation' => false,
        'serial_number' => false,
        'sim_status' => false,
        'status' => false,
        'store_status' => false,
        'wifi_ip' => false,
        'wifi_mac' => false,
        'wifi_ssid' => false
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
        'bluetooth_ip' => 'bluetoothIp',
        'bluetooth_mac' => 'bluetoothMac',
        'city' => 'city',
        'company_account' => 'companyAccount',
        'country_code' => 'countryCode',
        'device_model' => 'deviceModel',
        'ethernet_ip' => 'ethernetIp',
        'ethernet_mac' => 'ethernetMac',
        'firmware_version' => 'firmwareVersion',
        'iccid' => 'iccid',
        'id' => 'id',
        'last_activity_date_time' => 'lastActivityDateTime',
        'last_transaction_date_time' => 'lastTransactionDateTime',
        'link_negotiation' => 'linkNegotiation',
        'serial_number' => 'serialNumber',
        'sim_status' => 'simStatus',
        'status' => 'status',
        'store_status' => 'storeStatus',
        'wifi_ip' => 'wifiIp',
        'wifi_mac' => 'wifiMac',
        'wifi_ssid' => 'wifiSsid'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'assigned' => 'setAssigned',
        'bluetooth_ip' => 'setBluetoothIp',
        'bluetooth_mac' => 'setBluetoothMac',
        'city' => 'setCity',
        'company_account' => 'setCompanyAccount',
        'country_code' => 'setCountryCode',
        'device_model' => 'setDeviceModel',
        'ethernet_ip' => 'setEthernetIp',
        'ethernet_mac' => 'setEthernetMac',
        'firmware_version' => 'setFirmwareVersion',
        'iccid' => 'setIccid',
        'id' => 'setId',
        'last_activity_date_time' => 'setLastActivityDateTime',
        'last_transaction_date_time' => 'setLastTransactionDateTime',
        'link_negotiation' => 'setLinkNegotiation',
        'serial_number' => 'setSerialNumber',
        'sim_status' => 'setSimStatus',
        'status' => 'setStatus',
        'store_status' => 'setStoreStatus',
        'wifi_ip' => 'setWifiIp',
        'wifi_mac' => 'setWifiMac',
        'wifi_ssid' => 'setWifiSsid'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'assigned' => 'getAssigned',
        'bluetooth_ip' => 'getBluetoothIp',
        'bluetooth_mac' => 'getBluetoothMac',
        'city' => 'getCity',
        'company_account' => 'getCompanyAccount',
        'country_code' => 'getCountryCode',
        'device_model' => 'getDeviceModel',
        'ethernet_ip' => 'getEthernetIp',
        'ethernet_mac' => 'getEthernetMac',
        'firmware_version' => 'getFirmwareVersion',
        'iccid' => 'getIccid',
        'id' => 'getId',
        'last_activity_date_time' => 'getLastActivityDateTime',
        'last_transaction_date_time' => 'getLastTransactionDateTime',
        'link_negotiation' => 'getLinkNegotiation',
        'serial_number' => 'getSerialNumber',
        'sim_status' => 'getSimStatus',
        'status' => 'getStatus',
        'store_status' => 'getStoreStatus',
        'wifi_ip' => 'getWifiIp',
        'wifi_mac' => 'getWifiMac',
        'wifi_ssid' => 'getWifiSsid'
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
        $this->setIfExists('bluetooth_ip', $data ?? [], null);
        $this->setIfExists('bluetooth_mac', $data ?? [], null);
        $this->setIfExists('city', $data ?? [], null);
        $this->setIfExists('company_account', $data ?? [], null);
        $this->setIfExists('country_code', $data ?? [], null);
        $this->setIfExists('device_model', $data ?? [], null);
        $this->setIfExists('ethernet_ip', $data ?? [], null);
        $this->setIfExists('ethernet_mac', $data ?? [], null);
        $this->setIfExists('firmware_version', $data ?? [], null);
        $this->setIfExists('iccid', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('last_activity_date_time', $data ?? [], null);
        $this->setIfExists('last_transaction_date_time', $data ?? [], null);
        $this->setIfExists('link_negotiation', $data ?? [], null);
        $this->setIfExists('serial_number', $data ?? [], null);
        $this->setIfExists('sim_status', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('store_status', $data ?? [], null);
        $this->setIfExists('wifi_ip', $data ?? [], null);
        $this->setIfExists('wifi_mac', $data ?? [], null);
        $this->setIfExists('wifi_ssid', $data ?? [], null);
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
     * Gets bluetooth_ip
     *
     * @return string|null
     */
    public function getBluetoothIp()
    {
        return $this->container['bluetooth_ip'];
    }

    /**
     * Sets bluetooth_ip
     *
     * @param string|null $bluetooth_ip The Bluetooth IP address of the terminal.
     *
     * @return self
     */
    public function setBluetoothIp($bluetooth_ip)
    {
        if (is_null($bluetooth_ip)) {
            throw new \InvalidArgumentException('non-nullable bluetooth_ip cannot be null');
        }
        $this->container['bluetooth_ip'] = $bluetooth_ip;

        return $this;
    }

    /**
     * Gets bluetooth_mac
     *
     * @return string|null
     */
    public function getBluetoothMac()
    {
        return $this->container['bluetooth_mac'];
    }

    /**
     * Sets bluetooth_mac
     *
     * @param string|null $bluetooth_mac The Bluetooth MAC address of the terminal.
     *
     * @return self
     */
    public function setBluetoothMac($bluetooth_mac)
    {
        if (is_null($bluetooth_mac)) {
            throw new \InvalidArgumentException('non-nullable bluetooth_mac cannot be null');
        }
        $this->container['bluetooth_mac'] = $bluetooth_mac;

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
     * Gets company_account
     *
     * @return string|null
     */
    public function getCompanyAccount()
    {
        return $this->container['company_account'];
    }

    /**
     * Sets company_account
     *
     * @param string|null $company_account The company account that the terminal is associated with. If this is the only account level shown in the response, the terminal is assigned to the inventory of the company account.
     *
     * @return self
     */
    public function setCompanyAccount($company_account)
    {
        if (is_null($company_account)) {
            throw new \InvalidArgumentException('non-nullable company_account cannot be null');
        }
        $this->container['company_account'] = $company_account;

        return $this;
    }

    /**
     * Gets country_code
     *
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->container['country_code'];
    }

    /**
     * Sets country_code
     *
     * @param string|null $country_code The country code of the country where the terminal is located.
     *
     * @return self
     */
    public function setCountryCode($country_code)
    {
        if (is_null($country_code)) {
            throw new \InvalidArgumentException('non-nullable country_code cannot be null');
        }
        $this->container['country_code'] = $country_code;

        return $this;
    }

    /**
     * Gets device_model
     *
     * @return string|null
     */
    public function getDeviceModel()
    {
        return $this->container['device_model'];
    }

    /**
     * Sets device_model
     *
     * @param string|null $device_model The model name of the terminal.
     *
     * @return self
     */
    public function setDeviceModel($device_model)
    {
        if (is_null($device_model)) {
            throw new \InvalidArgumentException('non-nullable device_model cannot be null');
        }
        $this->container['device_model'] = $device_model;

        return $this;
    }

    /**
     * Gets ethernet_ip
     *
     * @return string|null
     */
    public function getEthernetIp()
    {
        return $this->container['ethernet_ip'];
    }

    /**
     * Sets ethernet_ip
     *
     * @param string|null $ethernet_ip The ethernet IP address of the terminal.
     *
     * @return self
     */
    public function setEthernetIp($ethernet_ip)
    {
        if (is_null($ethernet_ip)) {
            throw new \InvalidArgumentException('non-nullable ethernet_ip cannot be null');
        }
        $this->container['ethernet_ip'] = $ethernet_ip;

        return $this;
    }

    /**
     * Gets ethernet_mac
     *
     * @return string|null
     */
    public function getEthernetMac()
    {
        return $this->container['ethernet_mac'];
    }

    /**
     * Sets ethernet_mac
     *
     * @param string|null $ethernet_mac The ethernet MAC address of the terminal.
     *
     * @return self
     */
    public function setEthernetMac($ethernet_mac)
    {
        if (is_null($ethernet_mac)) {
            throw new \InvalidArgumentException('non-nullable ethernet_mac cannot be null');
        }
        $this->container['ethernet_mac'] = $ethernet_mac;

        return $this;
    }

    /**
     * Gets firmware_version
     *
     * @return string|null
     */
    public function getFirmwareVersion()
    {
        return $this->container['firmware_version'];
    }

    /**
     * Sets firmware_version
     *
     * @param string|null $firmware_version The software release currently in use on the terminal.
     *
     * @return self
     */
    public function setFirmwareVersion($firmware_version)
    {
        if (is_null($firmware_version)) {
            throw new \InvalidArgumentException('non-nullable firmware_version cannot be null');
        }
        $this->container['firmware_version'] = $firmware_version;

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
     * Gets last_activity_date_time
     *
     * @return \DateTime|null
     */
    public function getLastActivityDateTime()
    {
        return $this->container['last_activity_date_time'];
    }

    /**
     * Sets last_activity_date_time
     *
     * @param \DateTime|null $last_activity_date_time Date and time of the last activity on the terminal. Not included when the last activity was more than 14 days ago.
     *
     * @return self
     */
    public function setLastActivityDateTime($last_activity_date_time)
    {
        if (is_null($last_activity_date_time)) {
            throw new \InvalidArgumentException('non-nullable last_activity_date_time cannot be null');
        }
        $this->container['last_activity_date_time'] = $last_activity_date_time;

        return $this;
    }

    /**
     * Gets last_transaction_date_time
     *
     * @return \DateTime|null
     */
    public function getLastTransactionDateTime()
    {
        return $this->container['last_transaction_date_time'];
    }

    /**
     * Sets last_transaction_date_time
     *
     * @param \DateTime|null $last_transaction_date_time Date and time of the last transaction on the terminal. Not included when the last transaction was more than 14 days ago.
     *
     * @return self
     */
    public function setLastTransactionDateTime($last_transaction_date_time)
    {
        if (is_null($last_transaction_date_time)) {
            throw new \InvalidArgumentException('non-nullable last_transaction_date_time cannot be null');
        }
        $this->container['last_transaction_date_time'] = $last_transaction_date_time;

        return $this;
    }

    /**
     * Gets link_negotiation
     *
     * @return string|null
     */
    public function getLinkNegotiation()
    {
        return $this->container['link_negotiation'];
    }

    /**
     * Sets link_negotiation
     *
     * @param string|null $link_negotiation The Ethernet link negotiation that the terminal uses:  - `auto`: Auto-negotiation  - `100full`: 100 Mbps full duplex
     *
     * @return self
     */
    public function setLinkNegotiation($link_negotiation)
    {
        if (is_null($link_negotiation)) {
            throw new \InvalidArgumentException('non-nullable link_negotiation cannot be null');
        }
        $this->container['link_negotiation'] = $link_negotiation;

        return $this;
    }

    /**
     * Gets serial_number
     *
     * @return string|null
     */
    public function getSerialNumber()
    {
        return $this->container['serial_number'];
    }

    /**
     * Sets serial_number
     *
     * @param string|null $serial_number The serial number of the terminal.
     *
     * @return self
     */
    public function setSerialNumber($serial_number)
    {
        if (is_null($serial_number)) {
            throw new \InvalidArgumentException('non-nullable serial_number cannot be null');
        }
        $this->container['serial_number'] = $serial_number;

        return $this;
    }

    /**
     * Gets sim_status
     *
     * @return string|null
     */
    public function getSimStatus()
    {
        return $this->container['sim_status'];
    }

    /**
     * Sets sim_status
     *
     * @param string|null $sim_status On a terminal that supports 3G or 4G connectivity, indicates the status of the SIM card in the terminal: ACTIVE or INVENTORY.
     *
     * @return self
     */
    public function setSimStatus($sim_status)
    {
        if (is_null($sim_status)) {
            throw new \InvalidArgumentException('non-nullable sim_status cannot be null');
        }
        $this->container['sim_status'] = $sim_status;

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
     * Gets store_status
     *
     * @return string|null
     */
    public function getStoreStatus()
    {
        return $this->container['store_status'];
    }

    /**
     * Sets store_status
     *
     * @param string|null $store_status The status of the store that the terminal is assigned to.
     *
     * @return self
     */
    public function setStoreStatus($store_status)
    {
        if (is_null($store_status)) {
            throw new \InvalidArgumentException('non-nullable store_status cannot be null');
        }
        $this->container['store_status'] = $store_status;

        return $this;
    }

    /**
     * Gets wifi_ip
     *
     * @return string|null
     */
    public function getWifiIp()
    {
        return $this->container['wifi_ip'];
    }

    /**
     * Sets wifi_ip
     *
     * @param string|null $wifi_ip The terminal's IP address in your Wi-Fi network.
     *
     * @return self
     */
    public function setWifiIp($wifi_ip)
    {
        if (is_null($wifi_ip)) {
            throw new \InvalidArgumentException('non-nullable wifi_ip cannot be null');
        }
        $this->container['wifi_ip'] = $wifi_ip;

        return $this;
    }

    /**
     * Gets wifi_mac
     *
     * @return string|null
     */
    public function getWifiMac()
    {
        return $this->container['wifi_mac'];
    }

    /**
     * Sets wifi_mac
     *
     * @param string|null $wifi_mac The terminal's MAC address in your Wi-Fi network.
     *
     * @return self
     */
    public function setWifiMac($wifi_mac)
    {
        if (is_null($wifi_mac)) {
            throw new \InvalidArgumentException('non-nullable wifi_mac cannot be null');
        }
        $this->container['wifi_mac'] = $wifi_mac;

        return $this;
    }

    /**
     * Gets wifi_ssid
     *
     * @return string|null
     */
    public function getWifiSsid()
    {
        return $this->container['wifi_ssid'];
    }

    /**
     * Sets wifi_ssid
     *
     * @param string|null $wifi_ssid The SSID of the Wi-Fi network that your terminal is connected to.
     *
     * @return self
     */
    public function setWifiSsid($wifi_ssid)
    {
        if (is_null($wifi_ssid)) {
            throw new \InvalidArgumentException('non-nullable wifi_ssid cannot be null');
        }
        $this->container['wifi_ssid'] = $wifi_ssid;

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
