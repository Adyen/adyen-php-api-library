<?php

/**
 * Adyen Checkout API
 *
 * Adyen Checkout API provides a simple and flexible way to initiate and authorise online payments. You can use the same integration for payments made with cards (including 3D Secure), mobile wallets, and local payment methods (for example, iDEAL and Sofort).  This API reference provides information on available endpoints and how to interact with them. To learn more about the API, visit [online payments documentation](https://docs.adyen.com/online-payments).  ## Authentication Each request to Checkout API must be signed with an API key. For this, [get your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) from your Customer Area, and set this key to the `X-API-Key` header value, for example:  ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ``` ## Versioning Checkout API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://checkout-test.adyen.com/v70/payments ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account, for example: ``` https://{PREFIX}-checkout-live.adyenpayments.com/checkout/v70/payments ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.  When preparing to do live transactions with Checkout API, follow the [go-live checklist](https://docs.adyen.com/online-payments/go-live-checklist) to make sure you've got all the required configuration in place.  ## Release notes Have a look at the [release notes](https://docs.adyen.com/online-payments/release-notes?integration_type=api&version=70) to find out what changed in this version!
 *
 * The version of the OpenAPI document: 70
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

/**
 * LineItem Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class LineItem implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'LineItem';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'amount_excluding_tax' => 'int',
        'amount_including_tax' => 'int',
        'brand' => 'string',
        'color' => 'string',
        'description' => 'string',
        'id' => 'string',
        'image_url' => 'string',
        'item_category' => 'string',
        'manufacturer' => 'string',
        'product_url' => 'string',
        'quantity' => 'int',
        'receiver_email' => 'string',
        'size' => 'string',
        'sku' => 'string',
        'tax_amount' => 'int',
        'tax_percentage' => 'int',
        'upc' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'amount_excluding_tax' => 'int64',
        'amount_including_tax' => 'int64',
        'brand' => null,
        'color' => null,
        'description' => null,
        'id' => null,
        'image_url' => null,
        'item_category' => null,
        'manufacturer' => null,
        'product_url' => null,
        'quantity' => 'int64',
        'receiver_email' => null,
        'size' => null,
        'sku' => null,
        'tax_amount' => 'int64',
        'tax_percentage' => 'int64',
        'upc' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'amount_excluding_tax' => false,
		'amount_including_tax' => false,
		'brand' => false,
		'color' => false,
		'description' => false,
		'id' => false,
		'image_url' => false,
		'item_category' => false,
		'manufacturer' => false,
		'product_url' => false,
		'quantity' => false,
		'receiver_email' => false,
		'size' => false,
		'sku' => false,
		'tax_amount' => false,
		'tax_percentage' => false,
		'upc' => false
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
        'amount_excluding_tax' => 'amountExcludingTax',
        'amount_including_tax' => 'amountIncludingTax',
        'brand' => 'brand',
        'color' => 'color',
        'description' => 'description',
        'id' => 'id',
        'image_url' => 'imageUrl',
        'item_category' => 'itemCategory',
        'manufacturer' => 'manufacturer',
        'product_url' => 'productUrl',
        'quantity' => 'quantity',
        'receiver_email' => 'receiverEmail',
        'size' => 'size',
        'sku' => 'sku',
        'tax_amount' => 'taxAmount',
        'tax_percentage' => 'taxPercentage',
        'upc' => 'upc'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount_excluding_tax' => 'setAmountExcludingTax',
        'amount_including_tax' => 'setAmountIncludingTax',
        'brand' => 'setBrand',
        'color' => 'setColor',
        'description' => 'setDescription',
        'id' => 'setId',
        'image_url' => 'setImageUrl',
        'item_category' => 'setItemCategory',
        'manufacturer' => 'setManufacturer',
        'product_url' => 'setProductUrl',
        'quantity' => 'setQuantity',
        'receiver_email' => 'setReceiverEmail',
        'size' => 'setSize',
        'sku' => 'setSku',
        'tax_amount' => 'setTaxAmount',
        'tax_percentage' => 'setTaxPercentage',
        'upc' => 'setUpc'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount_excluding_tax' => 'getAmountExcludingTax',
        'amount_including_tax' => 'getAmountIncludingTax',
        'brand' => 'getBrand',
        'color' => 'getColor',
        'description' => 'getDescription',
        'id' => 'getId',
        'image_url' => 'getImageUrl',
        'item_category' => 'getItemCategory',
        'manufacturer' => 'getManufacturer',
        'product_url' => 'getProductUrl',
        'quantity' => 'getQuantity',
        'receiver_email' => 'getReceiverEmail',
        'size' => 'getSize',
        'sku' => 'getSku',
        'tax_amount' => 'getTaxAmount',
        'tax_percentage' => 'getTaxPercentage',
        'upc' => 'getUpc'
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
        $this->setIfExists('amount_excluding_tax', $data ?? [], null);
        $this->setIfExists('amount_including_tax', $data ?? [], null);
        $this->setIfExists('brand', $data ?? [], null);
        $this->setIfExists('color', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('image_url', $data ?? [], null);
        $this->setIfExists('item_category', $data ?? [], null);
        $this->setIfExists('manufacturer', $data ?? [], null);
        $this->setIfExists('product_url', $data ?? [], null);
        $this->setIfExists('quantity', $data ?? [], null);
        $this->setIfExists('receiver_email', $data ?? [], null);
        $this->setIfExists('size', $data ?? [], null);
        $this->setIfExists('sku', $data ?? [], null);
        $this->setIfExists('tax_amount', $data ?? [], null);
        $this->setIfExists('tax_percentage', $data ?? [], null);
        $this->setIfExists('upc', $data ?? [], null);
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
     * Gets amount_excluding_tax
     *
     * @return int|null
     */
    public function getAmountExcludingTax()
    {
        return $this->container['amount_excluding_tax'];
    }

    /**
     * Sets amount_excluding_tax
     *
     * @param int|null $amount_excluding_tax Item amount excluding the tax, in minor units.
     *
     * @return self
     */
    public function setAmountExcludingTax($amount_excluding_tax)
    {
        if (is_null($amount_excluding_tax)) {
            throw new \InvalidArgumentException('non-nullable amount_excluding_tax cannot be null');
        }
        $this->container['amount_excluding_tax'] = $amount_excluding_tax;

        return $this;
    }

    /**
     * Gets amount_including_tax
     *
     * @return int|null
     */
    public function getAmountIncludingTax()
    {
        return $this->container['amount_including_tax'];
    }

    /**
     * Sets amount_including_tax
     *
     * @param int|null $amount_including_tax Item amount including the tax, in minor units.
     *
     * @return self
     */
    public function setAmountIncludingTax($amount_including_tax)
    {
        if (is_null($amount_including_tax)) {
            throw new \InvalidArgumentException('non-nullable amount_including_tax cannot be null');
        }
        $this->container['amount_including_tax'] = $amount_including_tax;

        return $this;
    }

    /**
     * Gets brand
     *
     * @return string|null
     */
    public function getBrand()
    {
        return $this->container['brand'];
    }

    /**
     * Sets brand
     *
     * @param string|null $brand Brand of the item.
     *
     * @return self
     */
    public function setBrand($brand)
    {
        if (is_null($brand)) {
            throw new \InvalidArgumentException('non-nullable brand cannot be null');
        }
        $this->container['brand'] = $brand;

        return $this;
    }

    /**
     * Gets color
     *
     * @return string|null
     */
    public function getColor()
    {
        return $this->container['color'];
    }

    /**
     * Sets color
     *
     * @param string|null $color Color of the item.
     *
     * @return self
     */
    public function setColor($color)
    {
        if (is_null($color)) {
            throw new \InvalidArgumentException('non-nullable color cannot be null');
        }
        $this->container['color'] = $color;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description Description of the line item.
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
        $this->container['description'] = $description;

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
     * @param string|null $id ID of the line item.
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
     * Gets image_url
     *
     * @return string|null
     */
    public function getImageUrl()
    {
        return $this->container['image_url'];
    }

    /**
     * Sets image_url
     *
     * @param string|null $image_url Link to the picture of the purchased item.
     *
     * @return self
     */
    public function setImageUrl($image_url)
    {
        if (is_null($image_url)) {
            throw new \InvalidArgumentException('non-nullable image_url cannot be null');
        }
        $this->container['image_url'] = $image_url;

        return $this;
    }

    /**
     * Gets item_category
     *
     * @return string|null
     */
    public function getItemCategory()
    {
        return $this->container['item_category'];
    }

    /**
     * Sets item_category
     *
     * @param string|null $item_category Item category, used by the RatePay payment method.
     *
     * @return self
     */
    public function setItemCategory($item_category)
    {
        if (is_null($item_category)) {
            throw new \InvalidArgumentException('non-nullable item_category cannot be null');
        }
        $this->container['item_category'] = $item_category;

        return $this;
    }

    /**
     * Gets manufacturer
     *
     * @return string|null
     */
    public function getManufacturer()
    {
        return $this->container['manufacturer'];
    }

    /**
     * Sets manufacturer
     *
     * @param string|null $manufacturer Manufacturer of the item.
     *
     * @return self
     */
    public function setManufacturer($manufacturer)
    {
        if (is_null($manufacturer)) {
            throw new \InvalidArgumentException('non-nullable manufacturer cannot be null');
        }
        $this->container['manufacturer'] = $manufacturer;

        return $this;
    }

    /**
     * Gets product_url
     *
     * @return string|null
     */
    public function getProductUrl()
    {
        return $this->container['product_url'];
    }

    /**
     * Sets product_url
     *
     * @param string|null $product_url Link to the purchased item.
     *
     * @return self
     */
    public function setProductUrl($product_url)
    {
        if (is_null($product_url)) {
            throw new \InvalidArgumentException('non-nullable product_url cannot be null');
        }
        $this->container['product_url'] = $product_url;

        return $this;
    }

    /**
     * Gets quantity
     *
     * @return int|null
     */
    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    /**
     * Sets quantity
     *
     * @param int|null $quantity Number of items.
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        if (is_null($quantity)) {
            throw new \InvalidArgumentException('non-nullable quantity cannot be null');
        }
        $this->container['quantity'] = $quantity;

        return $this;
    }

    /**
     * Gets receiver_email
     *
     * @return string|null
     */
    public function getReceiverEmail()
    {
        return $this->container['receiver_email'];
    }

    /**
     * Sets receiver_email
     *
     * @param string|null $receiver_email Email associated with the given product in the basket (usually in electronic gift cards).
     *
     * @return self
     */
    public function setReceiverEmail($receiver_email)
    {
        if (is_null($receiver_email)) {
            throw new \InvalidArgumentException('non-nullable receiver_email cannot be null');
        }
        $this->container['receiver_email'] = $receiver_email;

        return $this;
    }

    /**
     * Gets size
     *
     * @return string|null
     */
    public function getSize()
    {
        return $this->container['size'];
    }

    /**
     * Sets size
     *
     * @param string|null $size Size of the item.
     *
     * @return self
     */
    public function setSize($size)
    {
        if (is_null($size)) {
            throw new \InvalidArgumentException('non-nullable size cannot be null');
        }
        $this->container['size'] = $size;

        return $this;
    }

    /**
     * Gets sku
     *
     * @return string|null
     */
    public function getSku()
    {
        return $this->container['sku'];
    }

    /**
     * Sets sku
     *
     * @param string|null $sku Stock keeping unit.
     *
     * @return self
     */
    public function setSku($sku)
    {
        if (is_null($sku)) {
            throw new \InvalidArgumentException('non-nullable sku cannot be null');
        }
        $this->container['sku'] = $sku;

        return $this;
    }

    /**
     * Gets tax_amount
     *
     * @return int|null
     */
    public function getTaxAmount()
    {
        return $this->container['tax_amount'];
    }

    /**
     * Sets tax_amount
     *
     * @param int|null $tax_amount Tax amount, in minor units.
     *
     * @return self
     */
    public function setTaxAmount($tax_amount)
    {
        if (is_null($tax_amount)) {
            throw new \InvalidArgumentException('non-nullable tax_amount cannot be null');
        }
        $this->container['tax_amount'] = $tax_amount;

        return $this;
    }

    /**
     * Gets tax_percentage
     *
     * @return int|null
     */
    public function getTaxPercentage()
    {
        return $this->container['tax_percentage'];
    }

    /**
     * Sets tax_percentage
     *
     * @param int|null $tax_percentage Tax percentage, in minor units.
     *
     * @return self
     */
    public function setTaxPercentage($tax_percentage)
    {
        if (is_null($tax_percentage)) {
            throw new \InvalidArgumentException('non-nullable tax_percentage cannot be null');
        }
        $this->container['tax_percentage'] = $tax_percentage;

        return $this;
    }

    /**
     * Gets upc
     *
     * @return string|null
     */
    public function getUpc()
    {
        return $this->container['upc'];
    }

    /**
     * Sets upc
     *
     * @param string|null $upc Universal Product Code.
     *
     * @return self
     */
    public function setUpc($upc)
    {
        if (is_null($upc)) {
            throw new \InvalidArgumentException('non-nullable upc cannot be null');
        }
        $this->container['upc'] = $upc;

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