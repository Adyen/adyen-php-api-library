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
 * ScheduleTerminalActionsRequestActionDetails Class Doc Comment
 *
 * @category Class
 * @description Information about the action to take.
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ScheduleTerminalActionsRequestActionDetails implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ScheduleTerminalActionsRequest_actionDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'app_id' => 'string',
        'type' => 'string',
        'certificate_id' => 'string',
        'update_at_first_maintenance_call' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'app_id' => null,
        'type' => null,
        'certificate_id' => null,
        'update_at_first_maintenance_call' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'app_id' => false,
        'type' => false,
        'certificate_id' => false,
        'update_at_first_maintenance_call' => false
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
        'app_id' => 'appId',
        'type' => 'type',
        'certificate_id' => 'certificateId',
        'update_at_first_maintenance_call' => 'updateAtFirstMaintenanceCall'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'app_id' => 'setAppId',
        'type' => 'setType',
        'certificate_id' => 'setCertificateId',
        'update_at_first_maintenance_call' => 'setUpdateAtFirstMaintenanceCall'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'app_id' => 'getAppId',
        'type' => 'getType',
        'certificate_id' => 'getCertificateId',
        'update_at_first_maintenance_call' => 'getUpdateAtFirstMaintenanceCall'
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
        $this->setIfExists('app_id', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], 'UninstallAndroidCertificate');
        $this->setIfExists('certificate_id', $data ?? [], null);
        $this->setIfExists('update_at_first_maintenance_call', $data ?? [], null);
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
     * Gets app_id
     *
     * @return string|null
     */
    public function getAppId()
    {
        return $this->container['app_id'];
    }

    /**
     * Sets app_id
     *
     * @param string|null $app_id The unique identifier of the app to be uninstalled.
     *
     * @return self
     */
    public function setAppId($app_id)
    {
        if (is_null($app_id)) {
            throw new \InvalidArgumentException('non-nullable app_id cannot be null');
        }
        $this->container['app_id'] = $app_id;

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
     * @param string|null $type Type of terminal action: Uninstall an Android certificate.
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
     * Gets certificate_id
     *
     * @return string|null
     */
    public function getCertificateId()
    {
        return $this->container['certificate_id'];
    }

    /**
     * Sets certificate_id
     *
     * @param string|null $certificate_id The unique identifier of the certificate to be uninstalled.
     *
     * @return self
     */
    public function setCertificateId($certificate_id)
    {
        if (is_null($certificate_id)) {
            throw new \InvalidArgumentException('non-nullable certificate_id cannot be null');
        }
        $this->container['certificate_id'] = $certificate_id;

        return $this;
    }

    /**
     * Gets update_at_first_maintenance_call
     *
     * @return bool|null
     */
    public function getUpdateAtFirstMaintenanceCall()
    {
        return $this->container['update_at_first_maintenance_call'];
    }

    /**
     * Sets update_at_first_maintenance_call
     *
     * @param bool|null $update_at_first_maintenance_call Boolean flag that tells if the terminal should update at the first next maintenance call. If false, terminal will update on its configured reboot time.
     *
     * @return self
     */
    public function setUpdateAtFirstMaintenanceCall($update_at_first_maintenance_call)
    {
        if (is_null($update_at_first_maintenance_call)) {
            throw new \InvalidArgumentException('non-nullable update_at_first_maintenance_call cannot be null');
        }
        $this->container['update_at_first_maintenance_call'] = $update_at_first_maintenance_call;

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
