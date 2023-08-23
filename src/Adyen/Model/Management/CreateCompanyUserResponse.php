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
 * CreateCompanyUserResponse Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateCompanyUserResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreateCompanyUserResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'links' => '\Adyen\Model\Management\Links',
        'accountGroups' => 'string[]',
        'active' => 'bool',
        'apps' => 'string[]',
        'associatedMerchantAccounts' => 'string[]',
        'email' => 'string',
        'id' => 'string',
        'name' => '\Adyen\Model\Management\Name',
        'roles' => 'string[]',
        'timeZoneCode' => 'string',
        'username' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'links' => null,
        'accountGroups' => null,
        'active' => null,
        'apps' => null,
        'associatedMerchantAccounts' => null,
        'email' => null,
        'id' => null,
        'name' => null,
        'roles' => null,
        'timeZoneCode' => null,
        'username' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'links' => false,
        'accountGroups' => false,
        'active' => false,
        'apps' => false,
        'associatedMerchantAccounts' => false,
        'email' => false,
        'id' => false,
        'name' => false,
        'roles' => false,
        'timeZoneCode' => false,
        'username' => false
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
        'links' => '_links',
        'accountGroups' => 'accountGroups',
        'active' => 'active',
        'apps' => 'apps',
        'associatedMerchantAccounts' => 'associatedMerchantAccounts',
        'email' => 'email',
        'id' => 'id',
        'name' => 'name',
        'roles' => 'roles',
        'timeZoneCode' => 'timeZoneCode',
        'username' => 'username'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'links' => 'setLinks',
        'accountGroups' => 'setAccountGroups',
        'active' => 'setActive',
        'apps' => 'setApps',
        'associatedMerchantAccounts' => 'setAssociatedMerchantAccounts',
        'email' => 'setEmail',
        'id' => 'setId',
        'name' => 'setName',
        'roles' => 'setRoles',
        'timeZoneCode' => 'setTimeZoneCode',
        'username' => 'setUsername'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'links' => 'getLinks',
        'accountGroups' => 'getAccountGroups',
        'active' => 'getActive',
        'apps' => 'getApps',
        'associatedMerchantAccounts' => 'getAssociatedMerchantAccounts',
        'email' => 'getEmail',
        'id' => 'getId',
        'name' => 'getName',
        'roles' => 'getRoles',
        'timeZoneCode' => 'getTimeZoneCode',
        'username' => 'getUsername'
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
        $this->setIfExists('links', $data ?? [], null);
        $this->setIfExists('accountGroups', $data ?? [], null);
        $this->setIfExists('active', $data ?? [], null);
        $this->setIfExists('apps', $data ?? [], null);
        $this->setIfExists('associatedMerchantAccounts', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('roles', $data ?? [], null);
        $this->setIfExists('timeZoneCode', $data ?? [], null);
        $this->setIfExists('username', $data ?? [], null);
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

        if ($this->container['email'] === null) {
            $invalidProperties[] = "'email' can't be null";
        }
        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['roles'] === null) {
            $invalidProperties[] = "'roles' can't be null";
        }
        if ($this->container['timeZoneCode'] === null) {
            $invalidProperties[] = "'timeZoneCode' can't be null";
        }
        if ($this->container['username'] === null) {
            $invalidProperties[] = "'username' can't be null";
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
     * Gets links
     *
     * @return \Adyen\Model\Management\Links|null
     */
    public function getLinks()
    {
        return $this->container['links'];
    }

    /**
     * Sets links
     *
     * @param \Adyen\Model\Management\Links|null $links links
     *
     * @return self
     */
    public function setLinks($links)
    {
        if (is_null($links)) {
            throw new \InvalidArgumentException('non-nullable links cannot be null');
        }
        $this->container['links'] = $links;

        return $this;
    }

    /**
     * Gets accountGroups
     *
     * @return string[]|null
     */
    public function getAccountGroups()
    {
        return $this->container['accountGroups'];
    }

    /**
     * Sets accountGroups
     *
     * @param string[]|null $accountGroups The list of [account groups](https://docs.adyen.com/account/account-structure#account-groups) associated with this user.
     *
     * @return self
     */
    public function setAccountGroups($accountGroups)
    {
        if (is_null($accountGroups)) {
            throw new \InvalidArgumentException('non-nullable accountGroups cannot be null');
        }
        $this->container['accountGroups'] = $accountGroups;

        return $this;
    }

    /**
     * Gets active
     *
     * @return bool|null
     */
    public function getActive()
    {
        return $this->container['active'];
    }

    /**
     * Sets active
     *
     * @param bool|null $active Indicates whether this user is active.
     *
     * @return self
     */
    public function setActive($active)
    {
        if (is_null($active)) {
            throw new \InvalidArgumentException('non-nullable active cannot be null');
        }
        $this->container['active'] = $active;

        return $this;
    }

    /**
     * Gets apps
     *
     * @return string[]|null
     */
    public function getApps()
    {
        return $this->container['apps'];
    }

    /**
     * Sets apps
     *
     * @param string[]|null $apps Set of apps available to this user
     *
     * @return self
     */
    public function setApps($apps)
    {
        if (is_null($apps)) {
            throw new \InvalidArgumentException('non-nullable apps cannot be null');
        }
        $this->container['apps'] = $apps;

        return $this;
    }

    /**
     * Gets associatedMerchantAccounts
     *
     * @return string[]|null
     */
    public function getAssociatedMerchantAccounts()
    {
        return $this->container['associatedMerchantAccounts'];
    }

    /**
     * Sets associatedMerchantAccounts
     *
     * @param string[]|null $associatedMerchantAccounts The list of [merchant accounts](https://docs.adyen.com/account/account-structure#merchant-accounts) associated with this user.
     *
     * @return self
     */
    public function setAssociatedMerchantAccounts($associatedMerchantAccounts)
    {
        if (is_null($associatedMerchantAccounts)) {
            throw new \InvalidArgumentException('non-nullable associatedMerchantAccounts cannot be null');
        }
        $this->container['associatedMerchantAccounts'] = $associatedMerchantAccounts;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email The email address of the user.
     *
     * @return self
     */
    public function setEmail($email)
    {
        if (is_null($email)) {
            throw new \InvalidArgumentException('non-nullable email cannot be null');
        }
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id The unique identifier of the user.
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
     * Gets name
     *
     * @return \Adyen\Model\Management\Name|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param \Adyen\Model\Management\Name|null $name name
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
     * Gets roles
     *
     * @return string[]
     */
    public function getRoles()
    {
        return $this->container['roles'];
    }

    /**
     * Sets roles
     *
     * @param string[] $roles The list of [roles](https://docs.adyen.com/account/user-roles) for this user.
     *
     * @return self
     */
    public function setRoles($roles)
    {
        if (is_null($roles)) {
            throw new \InvalidArgumentException('non-nullable roles cannot be null');
        }
        $this->container['roles'] = $roles;

        return $this;
    }

    /**
     * Gets timeZoneCode
     *
     * @return string
     */
    public function getTimeZoneCode()
    {
        return $this->container['timeZoneCode'];
    }

    /**
     * Sets timeZoneCode
     *
     * @param string $timeZoneCode The [tz database name](https://en.wikipedia.org/wiki/List_of_tz_database_time_zones) of the time zone of the user. For example, **Europe/Amsterdam**.
     *
     * @return self
     */
    public function setTimeZoneCode($timeZoneCode)
    {
        if (is_null($timeZoneCode)) {
            throw new \InvalidArgumentException('non-nullable timeZoneCode cannot be null');
        }
        $this->container['timeZoneCode'] = $timeZoneCode;

        return $this;
    }

    /**
     * Gets username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->container['username'];
    }

    /**
     * Sets username
     *
     * @param string $username The username for this user.
     *
     * @return self
     */
    public function setUsername($username)
    {
        if (is_null($username)) {
            throw new \InvalidArgumentException('non-nullable username cannot be null');
        }
        $this->container['username'] = $username;

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
