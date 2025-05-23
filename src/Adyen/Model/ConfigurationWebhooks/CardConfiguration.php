<?php

/**
 * Configuration webhooks
 *
 * The version of the OpenAPI document: 2
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\ConfigurationWebhooks;

use \ArrayAccess;
use Adyen\Model\ConfigurationWebhooks\ObjectSerializer;

/**
 * CardConfiguration Class Doc Comment
 *
 * @package  Adyen
 * @implements \ArrayAccess<string, mixed>
 */
class CardConfiguration implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CardConfiguration';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'activation' => 'string',
        'activationUrl' => 'string',
        'bulkAddress' => '\Adyen\Model\ConfigurationWebhooks\BulkAddress',
        'cardImageId' => 'string',
        'carrier' => 'string',
        'carrierImageId' => 'string',
        'configurationProfileId' => 'string',
        'currency' => 'string',
        'envelope' => 'string',
        'insert' => 'string',
        'language' => 'string',
        'logoImageId' => 'string',
        'pinMailer' => 'string',
        'shipmentMethod' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'activation' => null,
        'activationUrl' => null,
        'bulkAddress' => null,
        'cardImageId' => null,
        'carrier' => null,
        'carrierImageId' => null,
        'configurationProfileId' => null,
        'currency' => null,
        'envelope' => null,
        'insert' => null,
        'language' => null,
        'logoImageId' => null,
        'pinMailer' => null,
        'shipmentMethod' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'activation' => false,
        'activationUrl' => false,
        'bulkAddress' => false,
        'cardImageId' => false,
        'carrier' => false,
        'carrierImageId' => false,
        'configurationProfileId' => false,
        'currency' => false,
        'envelope' => false,
        'insert' => false,
        'language' => false,
        'logoImageId' => false,
        'pinMailer' => false,
        'shipmentMethod' => false
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
        'activation' => 'activation',
        'activationUrl' => 'activationUrl',
        'bulkAddress' => 'bulkAddress',
        'cardImageId' => 'cardImageId',
        'carrier' => 'carrier',
        'carrierImageId' => 'carrierImageId',
        'configurationProfileId' => 'configurationProfileId',
        'currency' => 'currency',
        'envelope' => 'envelope',
        'insert' => 'insert',
        'language' => 'language',
        'logoImageId' => 'logoImageId',
        'pinMailer' => 'pinMailer',
        'shipmentMethod' => 'shipmentMethod'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'activation' => 'setActivation',
        'activationUrl' => 'setActivationUrl',
        'bulkAddress' => 'setBulkAddress',
        'cardImageId' => 'setCardImageId',
        'carrier' => 'setCarrier',
        'carrierImageId' => 'setCarrierImageId',
        'configurationProfileId' => 'setConfigurationProfileId',
        'currency' => 'setCurrency',
        'envelope' => 'setEnvelope',
        'insert' => 'setInsert',
        'language' => 'setLanguage',
        'logoImageId' => 'setLogoImageId',
        'pinMailer' => 'setPinMailer',
        'shipmentMethod' => 'setShipmentMethod'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'activation' => 'getActivation',
        'activationUrl' => 'getActivationUrl',
        'bulkAddress' => 'getBulkAddress',
        'cardImageId' => 'getCardImageId',
        'carrier' => 'getCarrier',
        'carrierImageId' => 'getCarrierImageId',
        'configurationProfileId' => 'getConfigurationProfileId',
        'currency' => 'getCurrency',
        'envelope' => 'getEnvelope',
        'insert' => 'getInsert',
        'language' => 'getLanguage',
        'logoImageId' => 'getLogoImageId',
        'pinMailer' => 'getPinMailer',
        'shipmentMethod' => 'getShipmentMethod'
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
        $this->setIfExists('activation', $data ?? [], null);
        $this->setIfExists('activationUrl', $data ?? [], null);
        $this->setIfExists('bulkAddress', $data ?? [], null);
        $this->setIfExists('cardImageId', $data ?? [], null);
        $this->setIfExists('carrier', $data ?? [], null);
        $this->setIfExists('carrierImageId', $data ?? [], null);
        $this->setIfExists('configurationProfileId', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('envelope', $data ?? [], null);
        $this->setIfExists('insert', $data ?? [], null);
        $this->setIfExists('language', $data ?? [], null);
        $this->setIfExists('logoImageId', $data ?? [], null);
        $this->setIfExists('pinMailer', $data ?? [], null);
        $this->setIfExists('shipmentMethod', $data ?? [], null);
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

        if ($this->container['configurationProfileId'] === null) {
            $invalidProperties[] = "'configurationProfileId' can't be null";
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
     * Gets activation
     *
     * @return string|null
     */
    public function getActivation()
    {
        return $this->container['activation'];
    }

    /**
     * Sets activation
     *
     * @param string|null $activation Overrides the activation label design ID defined in the `configurationProfileId`. The activation label is attached to the card and contains the activation instructions.
     *
     * @return self
     */
    public function setActivation($activation)
    {
        $this->container['activation'] = $activation;

        return $this;
    }

    /**
     * Gets activationUrl
     *
     * @return string|null
     */
    public function getActivationUrl()
    {
        return $this->container['activationUrl'];
    }

    /**
     * Sets activationUrl
     *
     * @param string|null $activationUrl Your app's URL, if you want to activate cards through your app. For example, **my-app://ref1236a7d**. A QR code is created based on this URL, and is included in the carrier. Before you use this field, reach out to your Adyen contact to set up the QR code process.   Maximum length: 255 characters.
     *
     * @return self
     */
    public function setActivationUrl($activationUrl)
    {
        $this->container['activationUrl'] = $activationUrl;

        return $this;
    }

    /**
     * Gets bulkAddress
     *
     * @return \Adyen\Model\ConfigurationWebhooks\BulkAddress|null
     */
    public function getBulkAddress()
    {
        return $this->container['bulkAddress'];
    }

    /**
     * Sets bulkAddress
     *
     * @param \Adyen\Model\ConfigurationWebhooks\BulkAddress|null $bulkAddress bulkAddress
     *
     * @return self
     */
    public function setBulkAddress($bulkAddress)
    {
        $this->container['bulkAddress'] = $bulkAddress;

        return $this;
    }

    /**
     * Gets cardImageId
     *
     * @return string|null
     */
    public function getCardImageId()
    {
        return $this->container['cardImageId'];
    }

    /**
     * Sets cardImageId
     *
     * @param string|null $cardImageId The ID of the card image. This is the image that will be printed on the full front of the card.
     *
     * @return self
     */
    public function setCardImageId($cardImageId)
    {
        $this->container['cardImageId'] = $cardImageId;

        return $this;
    }

    /**
     * Gets carrier
     *
     * @return string|null
     */
    public function getCarrier()
    {
        return $this->container['carrier'];
    }

    /**
     * Sets carrier
     *
     * @param string|null $carrier Overrides the carrier design ID defined in the `configurationProfileId`. The carrier is the letter or packaging to which the card is attached.
     *
     * @return self
     */
    public function setCarrier($carrier)
    {
        $this->container['carrier'] = $carrier;

        return $this;
    }

    /**
     * Gets carrierImageId
     *
     * @return string|null
     */
    public function getCarrierImageId()
    {
        return $this->container['carrierImageId'];
    }

    /**
     * Sets carrierImageId
     *
     * @param string|null $carrierImageId The ID of the carrier image. This is the image that will printed on the letter to which the card is attached.
     *
     * @return self
     */
    public function setCarrierImageId($carrierImageId)
    {
        $this->container['carrierImageId'] = $carrierImageId;

        return $this;
    }

    /**
     * Gets configurationProfileId
     *
     * @return string
     */
    public function getConfigurationProfileId()
    {
        return $this->container['configurationProfileId'];
    }

    /**
     * Sets configurationProfileId
     *
     * @param string $configurationProfileId The ID of the card configuration profile that contains the settings of the card. For example, the envelope and PIN mailer designs or the logistics company handling the shipment. All the settings in the profile are applied to the card, unless you provide other fields to override them.  For example, send the `shipmentMethod` to override the logistics company defined in the card configuration profile.
     *
     * @return self
     */
    public function setConfigurationProfileId($configurationProfileId)
    {
        $this->container['configurationProfileId'] = $configurationProfileId;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string|null $currency The three-letter [ISO-4217](https://en.wikipedia.org/wiki/ISO_4217) currency code of the card. For example, **EUR**.
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets envelope
     *
     * @return string|null
     */
    public function getEnvelope()
    {
        return $this->container['envelope'];
    }

    /**
     * Sets envelope
     *
     * @param string|null $envelope Overrides the envelope design ID defined in the `configurationProfileId`.
     *
     * @return self
     */
    public function setEnvelope($envelope)
    {
        $this->container['envelope'] = $envelope;

        return $this;
    }

    /**
     * Gets insert
     *
     * @return string|null
     */
    public function getInsert()
    {
        return $this->container['insert'];
    }

    /**
     * Sets insert
     *
     * @param string|null $insert Overrides the insert design ID defined in the `configurationProfileId`. An insert is any additional material, such as marketing materials, that are shipped together with the card.
     *
     * @return self
     */
    public function setInsert($insert)
    {
        $this->container['insert'] = $insert;

        return $this;
    }

    /**
     * Gets language
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string|null $language The two-letter [ISO-639-1](https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes) language code of the card. For example, **en**.
     *
     * @return self
     */
    public function setLanguage($language)
    {
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets logoImageId
     *
     * @return string|null
     */
    public function getLogoImageId()
    {
        return $this->container['logoImageId'];
    }

    /**
     * Sets logoImageId
     *
     * @param string|null $logoImageId The ID of the logo image. This is the image that will be printed on the partial front of the card, such as a logo on the upper right corner.
     *
     * @return self
     */
    public function setLogoImageId($logoImageId)
    {
        $this->container['logoImageId'] = $logoImageId;

        return $this;
    }

    /**
     * Gets pinMailer
     *
     * @return string|null
     */
    public function getPinMailer()
    {
        return $this->container['pinMailer'];
    }

    /**
     * Sets pinMailer
     *
     * @param string|null $pinMailer Overrides the PIN mailer design ID defined in the `configurationProfileId`. The PIN mailer is the letter on which the PIN is printed.
     *
     * @return self
     */
    public function setPinMailer($pinMailer)
    {
        $this->container['pinMailer'] = $pinMailer;

        return $this;
    }

    /**
     * Gets shipmentMethod
     *
     * @return string|null
     */
    public function getShipmentMethod()
    {
        return $this->container['shipmentMethod'];
    }

    /**
     * Sets shipmentMethod
     *
     * @param string|null $shipmentMethod Overrides the logistics company defined in the `configurationProfileId`.
     *
     * @return self
     */
    public function setShipmentMethod($shipmentMethod)
    {
        $this->container['shipmentMethod'] = $shipmentMethod;

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
