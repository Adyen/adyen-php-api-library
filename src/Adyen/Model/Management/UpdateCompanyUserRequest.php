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
 * UpdateCompanyUserRequest Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class UpdateCompanyUserRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'UpdateCompanyUserRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'account_groups' => 'string[]',
        'active' => 'bool',
        'associated_merchant_accounts' => 'string[]',
        'authn_apps_to_add' => 'string[]',
        'authn_apps_to_remove' => 'string[]',
        'email' => 'string',
        'name' => '\Adyen\Model\Management\Name2',
        'roles' => 'string[]',
        'time_zone_code' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'account_groups' => null,
        'active' => null,
        'associated_merchant_accounts' => null,
        'authn_apps_to_add' => null,
        'authn_apps_to_remove' => null,
        'email' => null,
        'name' => null,
        'roles' => null,
        'time_zone_code' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'account_groups' => false,
		'active' => false,
		'associated_merchant_accounts' => false,
		'authn_apps_to_add' => false,
		'authn_apps_to_remove' => false,
		'email' => false,
		'name' => false,
		'roles' => false,
		'time_zone_code' => false
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
        'account_groups' => 'accountGroups',
        'active' => 'active',
        'associated_merchant_accounts' => 'associatedMerchantAccounts',
        'authn_apps_to_add' => 'authnAppsToAdd',
        'authn_apps_to_remove' => 'authnAppsToRemove',
        'email' => 'email',
        'name' => 'name',
        'roles' => 'roles',
        'time_zone_code' => 'timeZoneCode'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account_groups' => 'setAccountGroups',
        'active' => 'setActive',
        'associated_merchant_accounts' => 'setAssociatedMerchantAccounts',
        'authn_apps_to_add' => 'setAuthnAppsToAdd',
        'authn_apps_to_remove' => 'setAuthnAppsToRemove',
        'email' => 'setEmail',
        'name' => 'setName',
        'roles' => 'setRoles',
        'time_zone_code' => 'setTimeZoneCode'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account_groups' => 'getAccountGroups',
        'active' => 'getActive',
        'associated_merchant_accounts' => 'getAssociatedMerchantAccounts',
        'authn_apps_to_add' => 'getAuthnAppsToAdd',
        'authn_apps_to_remove' => 'getAuthnAppsToRemove',
        'email' => 'getEmail',
        'name' => 'getName',
        'roles' => 'getRoles',
        'time_zone_code' => 'getTimeZoneCode'
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
        $this->setIfExists('account_groups', $data ?? [], null);
        $this->setIfExists('active', $data ?? [], null);
        $this->setIfExists('associated_merchant_accounts', $data ?? [], null);
        $this->setIfExists('authn_apps_to_add', $data ?? [], null);
        $this->setIfExists('authn_apps_to_remove', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('roles', $data ?? [], null);
        $this->setIfExists('time_zone_code', $data ?? [], null);
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
     * Gets account_groups
     *
     * @return string[]|null
     */
    public function getAccountGroups()
    {
        return $this->container['account_groups'];
    }

    /**
     * Sets account_groups
     *
     * @param string[]|null $account_groups The list of [account groups](https://docs.adyen.com/account/account-structure#account-groups) associated with this user.
     *
     * @return self
     */
    public function setAccountGroups($account_groups)
    {
        if (is_null($account_groups)) {
            throw new \InvalidArgumentException('non-nullable account_groups cannot be null');
        }
        $this->container['account_groups'] = $account_groups;

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
     * Gets associated_merchant_accounts
     *
     * @return string[]|null
     */
    public function getAssociatedMerchantAccounts()
    {
        return $this->container['associated_merchant_accounts'];
    }

    /**
     * Sets associated_merchant_accounts
     *
     * @param string[]|null $associated_merchant_accounts The list of [merchant accounts](https://docs.adyen.com/account/account-structure#merchant-accounts) to associate the user with.
     *
     * @return self
     */
    public function setAssociatedMerchantAccounts($associated_merchant_accounts)
    {
        if (is_null($associated_merchant_accounts)) {
            throw new \InvalidArgumentException('non-nullable associated_merchant_accounts cannot be null');
        }
        $this->container['associated_merchant_accounts'] = $associated_merchant_accounts;

        return $this;
    }

    /**
     * Gets authn_apps_to_add
     *
     * @return string[]|null
     */
    public function getAuthnAppsToAdd()
    {
        return $this->container['authn_apps_to_add'];
    }

    /**
     * Sets authn_apps_to_add
     *
     * @param string[]|null $authn_apps_to_add Set of authn apps to add to this user
     *
     * @return self
     */
    public function setAuthnAppsToAdd($authn_apps_to_add)
    {
        if (is_null($authn_apps_to_add)) {
            throw new \InvalidArgumentException('non-nullable authn_apps_to_add cannot be null');
        }
        $this->container['authn_apps_to_add'] = $authn_apps_to_add;

        return $this;
    }

    /**
     * Gets authn_apps_to_remove
     *
     * @return string[]|null
     */
    public function getAuthnAppsToRemove()
    {
        return $this->container['authn_apps_to_remove'];
    }

    /**
     * Sets authn_apps_to_remove
     *
     * @param string[]|null $authn_apps_to_remove Set of authn apps to remove from this user
     *
     * @return self
     */
    public function setAuthnAppsToRemove($authn_apps_to_remove)
    {
        if (is_null($authn_apps_to_remove)) {
            throw new \InvalidArgumentException('non-nullable authn_apps_to_remove cannot be null');
        }
        $this->container['authn_apps_to_remove'] = $authn_apps_to_remove;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email The email address of the user.
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
     * Gets name
     *
     * @return \Adyen\Model\Management\Name2|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param \Adyen\Model\Management\Name2|null $name name
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
     * @return string[]|null
     */
    public function getRoles()
    {
        return $this->container['roles'];
    }

    /**
     * Sets roles
     *
     * @param string[]|null $roles The list of [roles](https://docs.adyen.com/account/user-roles) for this user.
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
     * Gets time_zone_code
     *
     * @return string|null
     */
    public function getTimeZoneCode()
    {
        return $this->container['time_zone_code'];
    }

    /**
     * Sets time_zone_code
     *
     * @param string|null $time_zone_code The [tz database name](https://en.wikipedia.org/wiki/List_of_tz_database_time_zones) of the time zone of the user. For example, **Europe/Amsterdam**.
     *
     * @return self
     */
    public function setTimeZoneCode($time_zone_code)
    {
        if (is_null($time_zone_code)) {
            throw new \InvalidArgumentException('non-nullable time_zone_code cannot be null');
        }
        $this->container['time_zone_code'] = $time_zone_code;

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
