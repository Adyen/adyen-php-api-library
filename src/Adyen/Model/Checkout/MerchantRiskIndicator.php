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
 * MerchantRiskIndicator Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class MerchantRiskIndicator implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'MerchantRiskIndicator';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'address_match' => 'bool',
        'delivery_address_indicator' => 'string',
        'delivery_email' => 'string',
        'delivery_email_address' => 'string',
        'delivery_timeframe' => 'string',
        'gift_card_amount' => '\Adyen\Model\Checkout\Amount',
        'gift_card_count' => 'int',
        'gift_card_curr' => 'string',
        'pre_order_date' => '\DateTime',
        'pre_order_purchase' => 'bool',
        'pre_order_purchase_ind' => 'string',
        'reorder_items' => 'bool',
        'reorder_items_ind' => 'string',
        'ship_indicator' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'address_match' => null,
        'delivery_address_indicator' => null,
        'delivery_email' => null,
        'delivery_email_address' => null,
        'delivery_timeframe' => null,
        'gift_card_amount' => null,
        'gift_card_count' => 'int32',
        'gift_card_curr' => null,
        'pre_order_date' => 'date-time',
        'pre_order_purchase' => null,
        'pre_order_purchase_ind' => null,
        'reorder_items' => null,
        'reorder_items_ind' => null,
        'ship_indicator' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'address_match' => false,
		'delivery_address_indicator' => false,
		'delivery_email' => false,
		'delivery_email_address' => false,
		'delivery_timeframe' => false,
		'gift_card_amount' => false,
		'gift_card_count' => true,
		'gift_card_curr' => false,
		'pre_order_date' => false,
		'pre_order_purchase' => false,
		'pre_order_purchase_ind' => false,
		'reorder_items' => false,
		'reorder_items_ind' => false,
		'ship_indicator' => false
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
        'address_match' => 'addressMatch',
        'delivery_address_indicator' => 'deliveryAddressIndicator',
        'delivery_email' => 'deliveryEmail',
        'delivery_email_address' => 'deliveryEmailAddress',
        'delivery_timeframe' => 'deliveryTimeframe',
        'gift_card_amount' => 'giftCardAmount',
        'gift_card_count' => 'giftCardCount',
        'gift_card_curr' => 'giftCardCurr',
        'pre_order_date' => 'preOrderDate',
        'pre_order_purchase' => 'preOrderPurchase',
        'pre_order_purchase_ind' => 'preOrderPurchaseInd',
        'reorder_items' => 'reorderItems',
        'reorder_items_ind' => 'reorderItemsInd',
        'ship_indicator' => 'shipIndicator'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'address_match' => 'setAddressMatch',
        'delivery_address_indicator' => 'setDeliveryAddressIndicator',
        'delivery_email' => 'setDeliveryEmail',
        'delivery_email_address' => 'setDeliveryEmailAddress',
        'delivery_timeframe' => 'setDeliveryTimeframe',
        'gift_card_amount' => 'setGiftCardAmount',
        'gift_card_count' => 'setGiftCardCount',
        'gift_card_curr' => 'setGiftCardCurr',
        'pre_order_date' => 'setPreOrderDate',
        'pre_order_purchase' => 'setPreOrderPurchase',
        'pre_order_purchase_ind' => 'setPreOrderPurchaseInd',
        'reorder_items' => 'setReorderItems',
        'reorder_items_ind' => 'setReorderItemsInd',
        'ship_indicator' => 'setShipIndicator'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'address_match' => 'getAddressMatch',
        'delivery_address_indicator' => 'getDeliveryAddressIndicator',
        'delivery_email' => 'getDeliveryEmail',
        'delivery_email_address' => 'getDeliveryEmailAddress',
        'delivery_timeframe' => 'getDeliveryTimeframe',
        'gift_card_amount' => 'getGiftCardAmount',
        'gift_card_count' => 'getGiftCardCount',
        'gift_card_curr' => 'getGiftCardCurr',
        'pre_order_date' => 'getPreOrderDate',
        'pre_order_purchase' => 'getPreOrderPurchase',
        'pre_order_purchase_ind' => 'getPreOrderPurchaseInd',
        'reorder_items' => 'getReorderItems',
        'reorder_items_ind' => 'getReorderItemsInd',
        'ship_indicator' => 'getShipIndicator'
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

    public const DELIVERY_ADDRESS_INDICATOR_SHIP_TO_BILLING_ADDRESS = 'shipToBillingAddress';
    public const DELIVERY_ADDRESS_INDICATOR_SHIP_TO_VERIFIED_ADDRESS = 'shipToVerifiedAddress';
    public const DELIVERY_ADDRESS_INDICATOR_SHIP_TO_NEW_ADDRESS = 'shipToNewAddress';
    public const DELIVERY_ADDRESS_INDICATOR_SHIP_TO_STORE = 'shipToStore';
    public const DELIVERY_ADDRESS_INDICATOR_DIGITAL_GOODS = 'digitalGoods';
    public const DELIVERY_ADDRESS_INDICATOR_GOODS_NOT_SHIPPED = 'goodsNotShipped';
    public const DELIVERY_ADDRESS_INDICATOR_OTHER = 'other';
    public const DELIVERY_TIMEFRAME_ELECTRONIC_DELIVERY = 'electronicDelivery';
    public const DELIVERY_TIMEFRAME_SAME_DAY_SHIPPING = 'sameDayShipping';
    public const DELIVERY_TIMEFRAME_OVERNIGHT_SHIPPING = 'overnightShipping';
    public const DELIVERY_TIMEFRAME_TWO_OR_MORE_DAYS_SHIPPING = 'twoOrMoreDaysShipping';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDeliveryAddressIndicatorAllowableValues()
    {
        return [
            self::DELIVERY_ADDRESS_INDICATOR_SHIP_TO_BILLING_ADDRESS,
            self::DELIVERY_ADDRESS_INDICATOR_SHIP_TO_VERIFIED_ADDRESS,
            self::DELIVERY_ADDRESS_INDICATOR_SHIP_TO_NEW_ADDRESS,
            self::DELIVERY_ADDRESS_INDICATOR_SHIP_TO_STORE,
            self::DELIVERY_ADDRESS_INDICATOR_DIGITAL_GOODS,
            self::DELIVERY_ADDRESS_INDICATOR_GOODS_NOT_SHIPPED,
            self::DELIVERY_ADDRESS_INDICATOR_OTHER,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDeliveryTimeframeAllowableValues()
    {
        return [
            self::DELIVERY_TIMEFRAME_ELECTRONIC_DELIVERY,
            self::DELIVERY_TIMEFRAME_SAME_DAY_SHIPPING,
            self::DELIVERY_TIMEFRAME_OVERNIGHT_SHIPPING,
            self::DELIVERY_TIMEFRAME_TWO_OR_MORE_DAYS_SHIPPING,
        ];
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
        $this->setIfExists('address_match', $data ?? [], null);
        $this->setIfExists('delivery_address_indicator', $data ?? [], null);
        $this->setIfExists('delivery_email', $data ?? [], null);
        $this->setIfExists('delivery_email_address', $data ?? [], null);
        $this->setIfExists('delivery_timeframe', $data ?? [], null);
        $this->setIfExists('gift_card_amount', $data ?? [], null);
        $this->setIfExists('gift_card_count', $data ?? [], null);
        $this->setIfExists('gift_card_curr', $data ?? [], null);
        $this->setIfExists('pre_order_date', $data ?? [], null);
        $this->setIfExists('pre_order_purchase', $data ?? [], null);
        $this->setIfExists('pre_order_purchase_ind', $data ?? [], null);
        $this->setIfExists('reorder_items', $data ?? [], null);
        $this->setIfExists('reorder_items_ind', $data ?? [], null);
        $this->setIfExists('ship_indicator', $data ?? [], null);
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

        $allowedValues = $this->getDeliveryAddressIndicatorAllowableValues();
        if (!is_null($this->container['delivery_address_indicator']) && !in_array($this->container['delivery_address_indicator'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'delivery_address_indicator', must be one of '%s'",
                $this->container['delivery_address_indicator'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getDeliveryTimeframeAllowableValues();
        if (!is_null($this->container['delivery_timeframe']) && !in_array($this->container['delivery_timeframe'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'delivery_timeframe', must be one of '%s'",
                $this->container['delivery_timeframe'],
                implode("', '", $allowedValues)
            );
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
     * Gets address_match
     *
     * @return bool|null
     */
    public function getAddressMatch()
    {
        return $this->container['address_match'];
    }

    /**
     * Sets address_match
     *
     * @param bool|null $address_match Whether the chosen delivery address is identical to the billing address.
     *
     * @return self
     */
    public function setAddressMatch($address_match)
    {
        if (is_null($address_match)) {
            throw new \InvalidArgumentException('non-nullable address_match cannot be null');
        }
        $this->container['address_match'] = $address_match;

        return $this;
    }

    /**
     * Gets delivery_address_indicator
     *
     * @return string|null
     */
    public function getDeliveryAddressIndicator()
    {
        return $this->container['delivery_address_indicator'];
    }

    /**
     * Sets delivery_address_indicator
     *
     * @param string|null $delivery_address_indicator Indicator regarding the delivery address. Allowed values: * `shipToBillingAddress` * `shipToVerifiedAddress` * `shipToNewAddress` * `shipToStore` * `digitalGoods` * `goodsNotShipped` * `other`
     *
     * @return self
     */
    public function setDeliveryAddressIndicator($delivery_address_indicator)
    {
        if (is_null($delivery_address_indicator)) {
            throw new \InvalidArgumentException('non-nullable delivery_address_indicator cannot be null');
        }
        $allowedValues = $this->getDeliveryAddressIndicatorAllowableValues();
        if (!in_array($delivery_address_indicator, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'delivery_address_indicator', must be one of '%s'",
                    $delivery_address_indicator,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['delivery_address_indicator'] = $delivery_address_indicator;

        return $this;
    }

    /**
     * Gets delivery_email
     *
     * @return string|null
     * @deprecated
     */
    public function getDeliveryEmail()
    {
        return $this->container['delivery_email'];
    }

    /**
     * Sets delivery_email
     *
     * @param string|null $delivery_email The delivery email address (for digital goods).
     *
     * @return self
     * @deprecated
     */
    public function setDeliveryEmail($delivery_email)
    {
        if (is_null($delivery_email)) {
            throw new \InvalidArgumentException('non-nullable delivery_email cannot be null');
        }
        $this->container['delivery_email'] = $delivery_email;

        return $this;
    }

    /**
     * Gets delivery_email_address
     *
     * @return string|null
     */
    public function getDeliveryEmailAddress()
    {
        return $this->container['delivery_email_address'];
    }

    /**
     * Sets delivery_email_address
     *
     * @param string|null $delivery_email_address For Electronic delivery, the email address to which the merchandise was delivered. Maximum length: 254 characters.
     *
     * @return self
     */
    public function setDeliveryEmailAddress($delivery_email_address)
    {
        if (is_null($delivery_email_address)) {
            throw new \InvalidArgumentException('non-nullable delivery_email_address cannot be null');
        }
        $this->container['delivery_email_address'] = $delivery_email_address;

        return $this;
    }

    /**
     * Gets delivery_timeframe
     *
     * @return string|null
     */
    public function getDeliveryTimeframe()
    {
        return $this->container['delivery_timeframe'];
    }

    /**
     * Sets delivery_timeframe
     *
     * @param string|null $delivery_timeframe The estimated delivery time for the shopper to receive the goods. Allowed values: * `electronicDelivery` * `sameDayShipping` * `overnightShipping` * `twoOrMoreDaysShipping`
     *
     * @return self
     */
    public function setDeliveryTimeframe($delivery_timeframe)
    {
        if (is_null($delivery_timeframe)) {
            throw new \InvalidArgumentException('non-nullable delivery_timeframe cannot be null');
        }
        $allowedValues = $this->getDeliveryTimeframeAllowableValues();
        if (!in_array($delivery_timeframe, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'delivery_timeframe', must be one of '%s'",
                    $delivery_timeframe,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['delivery_timeframe'] = $delivery_timeframe;

        return $this;
    }

    /**
     * Gets gift_card_amount
     *
     * @return \Adyen\Model\Checkout\Amount|null
     */
    public function getGiftCardAmount()
    {
        return $this->container['gift_card_amount'];
    }

    /**
     * Sets gift_card_amount
     *
     * @param \Adyen\Model\Checkout\Amount|null $gift_card_amount gift_card_amount
     *
     * @return self
     */
    public function setGiftCardAmount($gift_card_amount)
    {
        if (is_null($gift_card_amount)) {
            throw new \InvalidArgumentException('non-nullable gift_card_amount cannot be null');
        }
        $this->container['gift_card_amount'] = $gift_card_amount;

        return $this;
    }

    /**
     * Gets gift_card_count
     *
     * @return int|null
     */
    public function getGiftCardCount()
    {
        return $this->container['gift_card_count'];
    }

    /**
     * Sets gift_card_count
     *
     * @param int|null $gift_card_count For prepaid or gift card purchase, total count of individual prepaid or gift cards/codes purchased.
     *
     * @return self
     */
    public function setGiftCardCount($gift_card_count)
    {
        // Do nothing for nullable integers
        $this->container['gift_card_count'] = $gift_card_count;

        return $this;
    }

    /**
     * Gets gift_card_curr
     *
     * @return string|null
     */
    public function getGiftCardCurr()
    {
        return $this->container['gift_card_curr'];
    }

    /**
     * Sets gift_card_curr
     *
     * @param string|null $gift_card_curr For prepaid or gift card purchase, [ISO 4217](https://www.iso.org/iso-4217-currency-codes.html) three-digit currency code of the gift card, other than those listed in Table A.5 of the EMVCo 3D Secure Protocol and Core Functions Specification.
     *
     * @return self
     */
    public function setGiftCardCurr($gift_card_curr)
    {
        if (is_null($gift_card_curr)) {
            throw new \InvalidArgumentException('non-nullable gift_card_curr cannot be null');
        }
        $this->container['gift_card_curr'] = $gift_card_curr;

        return $this;
    }

    /**
     * Gets pre_order_date
     *
     * @return \DateTime|null
     */
    public function getPreOrderDate()
    {
        return $this->container['pre_order_date'];
    }

    /**
     * Sets pre_order_date
     *
     * @param \DateTime|null $pre_order_date For pre-order purchases, the expected date this product will be available to the shopper.
     *
     * @return self
     */
    public function setPreOrderDate($pre_order_date)
    {
        if (is_null($pre_order_date)) {
            throw new \InvalidArgumentException('non-nullable pre_order_date cannot be null');
        }
        $this->container['pre_order_date'] = $pre_order_date;

        return $this;
    }

    /**
     * Gets pre_order_purchase
     *
     * @return bool|null
     */
    public function getPreOrderPurchase()
    {
        return $this->container['pre_order_purchase'];
    }

    /**
     * Sets pre_order_purchase
     *
     * @param bool|null $pre_order_purchase Indicator for whether this transaction is for pre-ordering a product.
     *
     * @return self
     */
    public function setPreOrderPurchase($pre_order_purchase)
    {
        if (is_null($pre_order_purchase)) {
            throw new \InvalidArgumentException('non-nullable pre_order_purchase cannot be null');
        }
        $this->container['pre_order_purchase'] = $pre_order_purchase;

        return $this;
    }

    /**
     * Gets pre_order_purchase_ind
     *
     * @return string|null
     */
    public function getPreOrderPurchaseInd()
    {
        return $this->container['pre_order_purchase_ind'];
    }

    /**
     * Sets pre_order_purchase_ind
     *
     * @param string|null $pre_order_purchase_ind Indicates whether Cardholder is placing an order for merchandise with a future availability or release date.
     *
     * @return self
     */
    public function setPreOrderPurchaseInd($pre_order_purchase_ind)
    {
        if (is_null($pre_order_purchase_ind)) {
            throw new \InvalidArgumentException('non-nullable pre_order_purchase_ind cannot be null');
        }
        $this->container['pre_order_purchase_ind'] = $pre_order_purchase_ind;

        return $this;
    }

    /**
     * Gets reorder_items
     *
     * @return bool|null
     */
    public function getReorderItems()
    {
        return $this->container['reorder_items'];
    }

    /**
     * Sets reorder_items
     *
     * @param bool|null $reorder_items Indicator for whether the shopper has already purchased the same items in the past.
     *
     * @return self
     */
    public function setReorderItems($reorder_items)
    {
        if (is_null($reorder_items)) {
            throw new \InvalidArgumentException('non-nullable reorder_items cannot be null');
        }
        $this->container['reorder_items'] = $reorder_items;

        return $this;
    }

    /**
     * Gets reorder_items_ind
     *
     * @return string|null
     */
    public function getReorderItemsInd()
    {
        return $this->container['reorder_items_ind'];
    }

    /**
     * Sets reorder_items_ind
     *
     * @param string|null $reorder_items_ind Indicates whether the cardholder is reordering previously purchased merchandise.
     *
     * @return self
     */
    public function setReorderItemsInd($reorder_items_ind)
    {
        if (is_null($reorder_items_ind)) {
            throw new \InvalidArgumentException('non-nullable reorder_items_ind cannot be null');
        }
        $this->container['reorder_items_ind'] = $reorder_items_ind;

        return $this;
    }

    /**
     * Gets ship_indicator
     *
     * @return string|null
     */
    public function getShipIndicator()
    {
        return $this->container['ship_indicator'];
    }

    /**
     * Sets ship_indicator
     *
     * @param string|null $ship_indicator Indicates shipping method chosen for the transaction.
     *
     * @return self
     */
    public function setShipIndicator($ship_indicator)
    {
        if (is_null($ship_indicator)) {
            throw new \InvalidArgumentException('non-nullable ship_indicator cannot be null');
        }
        $this->container['ship_indicator'] = $ship_indicator;

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
