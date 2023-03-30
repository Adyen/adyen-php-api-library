<?php

/**
 * Adyen Payment API
 *
 * A set of API endpoints that allow you to initiate, settle, and modify payments on the Adyen payments platform. You can use the API to accept card payments (including One-Click and 3D Secure), bank transfers, ewallets, and many other payment methods.  To learn more about the API, visit [Classic integration](https://docs.adyen.com/classic-integration).  ## Authentication You need an [API credential](https://docs.adyen.com/development-resources/api-credentials) to authenticate to the API.  If using an API key, add an `X-API-Key` header with the API key as the value, for example:   ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ```  Alternatively, you can use the username and password to connect to the API using basic authentication, for example:  ``` curl -U \"ws@Company.YOUR_COMPANY_ACCOUNT\":\"YOUR_BASIC_AUTHENTICATION_PASSWORD\" \\ -H \"Content-Type: application/json\" \\ ... ```  ## Versioning Payments API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://pal-test.adyen.com/pal/servlet/Payment/v68/authorise ```  ## Going live  To authenticate to the live endpoints, you need an [API credential](https://docs.adyen.com/development-resources/api-credentials) from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account: ```  https://{PREFIX}-pal-live.adyenpayments.com/pal/servlet/Payment/v68/authorise ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.
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
 * AdditionalDataCarRental Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AdditionalDataCarRental implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AdditionalDataCarRental';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'car_rental_check_out_date' => 'string',
        'car_rental_customer_service_toll_free_number' => 'string',
        'car_rental_days_rented' => 'string',
        'car_rental_fuel_charges' => 'string',
        'car_rental_insurance_charges' => 'string',
        'car_rental_location_city' => 'string',
        'car_rental_location_country' => 'string',
        'car_rental_location_state_province' => 'string',
        'car_rental_no_show_indicator' => 'string',
        'car_rental_one_way_drop_off_charges' => 'string',
        'car_rental_rate' => 'string',
        'car_rental_rate_indicator' => 'string',
        'car_rental_rental_agreement_number' => 'string',
        'car_rental_rental_class_id' => 'string',
        'car_rental_renter_name' => 'string',
        'car_rental_return_city' => 'string',
        'car_rental_return_country' => 'string',
        'car_rental_return_date' => 'string',
        'car_rental_return_location_id' => 'string',
        'car_rental_return_state_province' => 'string',
        'car_rental_tax_exempt_indicator' => 'string',
        'travel_entertainment_auth_data_duration' => 'string',
        'travel_entertainment_auth_data_market' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'car_rental_check_out_date' => null,
        'car_rental_customer_service_toll_free_number' => null,
        'car_rental_days_rented' => null,
        'car_rental_fuel_charges' => null,
        'car_rental_insurance_charges' => null,
        'car_rental_location_city' => null,
        'car_rental_location_country' => null,
        'car_rental_location_state_province' => null,
        'car_rental_no_show_indicator' => null,
        'car_rental_one_way_drop_off_charges' => null,
        'car_rental_rate' => null,
        'car_rental_rate_indicator' => null,
        'car_rental_rental_agreement_number' => null,
        'car_rental_rental_class_id' => null,
        'car_rental_renter_name' => null,
        'car_rental_return_city' => null,
        'car_rental_return_country' => null,
        'car_rental_return_date' => null,
        'car_rental_return_location_id' => null,
        'car_rental_return_state_province' => null,
        'car_rental_tax_exempt_indicator' => null,
        'travel_entertainment_auth_data_duration' => null,
        'travel_entertainment_auth_data_market' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'car_rental_check_out_date' => false,
        'car_rental_customer_service_toll_free_number' => false,
        'car_rental_days_rented' => false,
        'car_rental_fuel_charges' => false,
        'car_rental_insurance_charges' => false,
        'car_rental_location_city' => false,
        'car_rental_location_country' => false,
        'car_rental_location_state_province' => false,
        'car_rental_no_show_indicator' => false,
        'car_rental_one_way_drop_off_charges' => false,
        'car_rental_rate' => false,
        'car_rental_rate_indicator' => false,
        'car_rental_rental_agreement_number' => false,
        'car_rental_rental_class_id' => false,
        'car_rental_renter_name' => false,
        'car_rental_return_city' => false,
        'car_rental_return_country' => false,
        'car_rental_return_date' => false,
        'car_rental_return_location_id' => false,
        'car_rental_return_state_province' => false,
        'car_rental_tax_exempt_indicator' => false,
        'travel_entertainment_auth_data_duration' => false,
        'travel_entertainment_auth_data_market' => false
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
        'car_rental_check_out_date' => 'carRental.checkOutDate',
        'car_rental_customer_service_toll_free_number' => 'carRental.customerServiceTollFreeNumber',
        'car_rental_days_rented' => 'carRental.daysRented',
        'car_rental_fuel_charges' => 'carRental.fuelCharges',
        'car_rental_insurance_charges' => 'carRental.insuranceCharges',
        'car_rental_location_city' => 'carRental.locationCity',
        'car_rental_location_country' => 'carRental.locationCountry',
        'car_rental_location_state_province' => 'carRental.locationStateProvince',
        'car_rental_no_show_indicator' => 'carRental.noShowIndicator',
        'car_rental_one_way_drop_off_charges' => 'carRental.oneWayDropOffCharges',
        'car_rental_rate' => 'carRental.rate',
        'car_rental_rate_indicator' => 'carRental.rateIndicator',
        'car_rental_rental_agreement_number' => 'carRental.rentalAgreementNumber',
        'car_rental_rental_class_id' => 'carRental.rentalClassId',
        'car_rental_renter_name' => 'carRental.renterName',
        'car_rental_return_city' => 'carRental.returnCity',
        'car_rental_return_country' => 'carRental.returnCountry',
        'car_rental_return_date' => 'carRental.returnDate',
        'car_rental_return_location_id' => 'carRental.returnLocationId',
        'car_rental_return_state_province' => 'carRental.returnStateProvince',
        'car_rental_tax_exempt_indicator' => 'carRental.taxExemptIndicator',
        'travel_entertainment_auth_data_duration' => 'travelEntertainmentAuthData.duration',
        'travel_entertainment_auth_data_market' => 'travelEntertainmentAuthData.market'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'car_rental_check_out_date' => 'setCarRentalCheckOutDate',
        'car_rental_customer_service_toll_free_number' => 'setCarRentalCustomerServiceTollFreeNumber',
        'car_rental_days_rented' => 'setCarRentalDaysRented',
        'car_rental_fuel_charges' => 'setCarRentalFuelCharges',
        'car_rental_insurance_charges' => 'setCarRentalInsuranceCharges',
        'car_rental_location_city' => 'setCarRentalLocationCity',
        'car_rental_location_country' => 'setCarRentalLocationCountry',
        'car_rental_location_state_province' => 'setCarRentalLocationStateProvince',
        'car_rental_no_show_indicator' => 'setCarRentalNoShowIndicator',
        'car_rental_one_way_drop_off_charges' => 'setCarRentalOneWayDropOffCharges',
        'car_rental_rate' => 'setCarRentalRate',
        'car_rental_rate_indicator' => 'setCarRentalRateIndicator',
        'car_rental_rental_agreement_number' => 'setCarRentalRentalAgreementNumber',
        'car_rental_rental_class_id' => 'setCarRentalRentalClassId',
        'car_rental_renter_name' => 'setCarRentalRenterName',
        'car_rental_return_city' => 'setCarRentalReturnCity',
        'car_rental_return_country' => 'setCarRentalReturnCountry',
        'car_rental_return_date' => 'setCarRentalReturnDate',
        'car_rental_return_location_id' => 'setCarRentalReturnLocationId',
        'car_rental_return_state_province' => 'setCarRentalReturnStateProvince',
        'car_rental_tax_exempt_indicator' => 'setCarRentalTaxExemptIndicator',
        'travel_entertainment_auth_data_duration' => 'setTravelEntertainmentAuthDataDuration',
        'travel_entertainment_auth_data_market' => 'setTravelEntertainmentAuthDataMarket'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'car_rental_check_out_date' => 'getCarRentalCheckOutDate',
        'car_rental_customer_service_toll_free_number' => 'getCarRentalCustomerServiceTollFreeNumber',
        'car_rental_days_rented' => 'getCarRentalDaysRented',
        'car_rental_fuel_charges' => 'getCarRentalFuelCharges',
        'car_rental_insurance_charges' => 'getCarRentalInsuranceCharges',
        'car_rental_location_city' => 'getCarRentalLocationCity',
        'car_rental_location_country' => 'getCarRentalLocationCountry',
        'car_rental_location_state_province' => 'getCarRentalLocationStateProvince',
        'car_rental_no_show_indicator' => 'getCarRentalNoShowIndicator',
        'car_rental_one_way_drop_off_charges' => 'getCarRentalOneWayDropOffCharges',
        'car_rental_rate' => 'getCarRentalRate',
        'car_rental_rate_indicator' => 'getCarRentalRateIndicator',
        'car_rental_rental_agreement_number' => 'getCarRentalRentalAgreementNumber',
        'car_rental_rental_class_id' => 'getCarRentalRentalClassId',
        'car_rental_renter_name' => 'getCarRentalRenterName',
        'car_rental_return_city' => 'getCarRentalReturnCity',
        'car_rental_return_country' => 'getCarRentalReturnCountry',
        'car_rental_return_date' => 'getCarRentalReturnDate',
        'car_rental_return_location_id' => 'getCarRentalReturnLocationId',
        'car_rental_return_state_province' => 'getCarRentalReturnStateProvince',
        'car_rental_tax_exempt_indicator' => 'getCarRentalTaxExemptIndicator',
        'travel_entertainment_auth_data_duration' => 'getTravelEntertainmentAuthDataDuration',
        'travel_entertainment_auth_data_market' => 'getTravelEntertainmentAuthDataMarket'
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
        $this->setIfExists('car_rental_check_out_date', $data ?? [], null);
        $this->setIfExists('car_rental_customer_service_toll_free_number', $data ?? [], null);
        $this->setIfExists('car_rental_days_rented', $data ?? [], null);
        $this->setIfExists('car_rental_fuel_charges', $data ?? [], null);
        $this->setIfExists('car_rental_insurance_charges', $data ?? [], null);
        $this->setIfExists('car_rental_location_city', $data ?? [], null);
        $this->setIfExists('car_rental_location_country', $data ?? [], null);
        $this->setIfExists('car_rental_location_state_province', $data ?? [], null);
        $this->setIfExists('car_rental_no_show_indicator', $data ?? [], null);
        $this->setIfExists('car_rental_one_way_drop_off_charges', $data ?? [], null);
        $this->setIfExists('car_rental_rate', $data ?? [], null);
        $this->setIfExists('car_rental_rate_indicator', $data ?? [], null);
        $this->setIfExists('car_rental_rental_agreement_number', $data ?? [], null);
        $this->setIfExists('car_rental_rental_class_id', $data ?? [], null);
        $this->setIfExists('car_rental_renter_name', $data ?? [], null);
        $this->setIfExists('car_rental_return_city', $data ?? [], null);
        $this->setIfExists('car_rental_return_country', $data ?? [], null);
        $this->setIfExists('car_rental_return_date', $data ?? [], null);
        $this->setIfExists('car_rental_return_location_id', $data ?? [], null);
        $this->setIfExists('car_rental_return_state_province', $data ?? [], null);
        $this->setIfExists('car_rental_tax_exempt_indicator', $data ?? [], null);
        $this->setIfExists('travel_entertainment_auth_data_duration', $data ?? [], null);
        $this->setIfExists('travel_entertainment_auth_data_market', $data ?? [], null);
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
     * Gets car_rental_check_out_date
     *
     * @return string|null
     */
    public function getCarRentalCheckOutDate()
    {
        return $this->container['car_rental_check_out_date'];
    }

    /**
     * Sets car_rental_check_out_date
     *
     * @param string|null $car_rental_check_out_date Pick-up date. * Date format: `yyyyMMdd`
     *
     * @return self
     */
    public function setCarRentalCheckOutDate($car_rental_check_out_date)
    {
        if (is_null($car_rental_check_out_date)) {
            throw new \InvalidArgumentException('non-nullable car_rental_check_out_date cannot be null');
        }
        $this->container['car_rental_check_out_date'] = $car_rental_check_out_date;

        return $this;
    }

    /**
     * Gets car_rental_customer_service_toll_free_number
     *
     * @return string|null
     */
    public function getCarRentalCustomerServiceTollFreeNumber()
    {
        return $this->container['car_rental_customer_service_toll_free_number'];
    }

    /**
     * Sets car_rental_customer_service_toll_free_number
     *
     * @param string|null $car_rental_customer_service_toll_free_number The customer service phone number of the car rental company. * Format: Alphanumeric * maxLength: 17
     *
     * @return self
     */
    public function setCarRentalCustomerServiceTollFreeNumber($car_rental_customer_service_toll_free_number)
    {
        if (is_null($car_rental_customer_service_toll_free_number)) {
            throw new \InvalidArgumentException('non-nullable car_rental_customer_service_toll_free_number cannot be null');
        }
        $this->container['car_rental_customer_service_toll_free_number'] = $car_rental_customer_service_toll_free_number;

        return $this;
    }

    /**
     * Gets car_rental_days_rented
     *
     * @return string|null
     */
    public function getCarRentalDaysRented()
    {
        return $this->container['car_rental_days_rented'];
    }

    /**
     * Sets car_rental_days_rented
     *
     * @param string|null $car_rental_days_rented Number of days for which the car is being rented. * Format: Numeric * maxLength: 19
     *
     * @return self
     */
    public function setCarRentalDaysRented($car_rental_days_rented)
    {
        if (is_null($car_rental_days_rented)) {
            throw new \InvalidArgumentException('non-nullable car_rental_days_rented cannot be null');
        }
        $this->container['car_rental_days_rented'] = $car_rental_days_rented;

        return $this;
    }

    /**
     * Gets car_rental_fuel_charges
     *
     * @return string|null
     */
    public function getCarRentalFuelCharges()
    {
        return $this->container['car_rental_fuel_charges'];
    }

    /**
     * Sets car_rental_fuel_charges
     *
     * @param string|null $car_rental_fuel_charges Any fuel charges associated with the rental. * Format: Numeric * maxLength: 12
     *
     * @return self
     */
    public function setCarRentalFuelCharges($car_rental_fuel_charges)
    {
        if (is_null($car_rental_fuel_charges)) {
            throw new \InvalidArgumentException('non-nullable car_rental_fuel_charges cannot be null');
        }
        $this->container['car_rental_fuel_charges'] = $car_rental_fuel_charges;

        return $this;
    }

    /**
     * Gets car_rental_insurance_charges
     *
     * @return string|null
     */
    public function getCarRentalInsuranceCharges()
    {
        return $this->container['car_rental_insurance_charges'];
    }

    /**
     * Sets car_rental_insurance_charges
     *
     * @param string|null $car_rental_insurance_charges Any insurance charges associated with the rental. * Format: Numeric * maxLength: 12
     *
     * @return self
     */
    public function setCarRentalInsuranceCharges($car_rental_insurance_charges)
    {
        if (is_null($car_rental_insurance_charges)) {
            throw new \InvalidArgumentException('non-nullable car_rental_insurance_charges cannot be null');
        }
        $this->container['car_rental_insurance_charges'] = $car_rental_insurance_charges;

        return $this;
    }

    /**
     * Gets car_rental_location_city
     *
     * @return string|null
     */
    public function getCarRentalLocationCity()
    {
        return $this->container['car_rental_location_city'];
    }

    /**
     * Sets car_rental_location_city
     *
     * @param string|null $car_rental_location_city The city from which the car is rented. * Format: Alphanumeric * maxLength: 18
     *
     * @return self
     */
    public function setCarRentalLocationCity($car_rental_location_city)
    {
        if (is_null($car_rental_location_city)) {
            throw new \InvalidArgumentException('non-nullable car_rental_location_city cannot be null');
        }
        $this->container['car_rental_location_city'] = $car_rental_location_city;

        return $this;
    }

    /**
     * Gets car_rental_location_country
     *
     * @return string|null
     */
    public function getCarRentalLocationCountry()
    {
        return $this->container['car_rental_location_country'];
    }

    /**
     * Sets car_rental_location_country
     *
     * @param string|null $car_rental_location_country The country from which the car is rented. * Format: Alphanumeric * maxLength: 2
     *
     * @return self
     */
    public function setCarRentalLocationCountry($car_rental_location_country)
    {
        if (is_null($car_rental_location_country)) {
            throw new \InvalidArgumentException('non-nullable car_rental_location_country cannot be null');
        }
        $this->container['car_rental_location_country'] = $car_rental_location_country;

        return $this;
    }

    /**
     * Gets car_rental_location_state_province
     *
     * @return string|null
     */
    public function getCarRentalLocationStateProvince()
    {
        return $this->container['car_rental_location_state_province'];
    }

    /**
     * Sets car_rental_location_state_province
     *
     * @param string|null $car_rental_location_state_province The state or province from where the car is rented. * Format: Alphanumeric * maxLength: 3
     *
     * @return self
     */
    public function setCarRentalLocationStateProvince($car_rental_location_state_province)
    {
        if (is_null($car_rental_location_state_province)) {
            throw new \InvalidArgumentException('non-nullable car_rental_location_state_province cannot be null');
        }
        $this->container['car_rental_location_state_province'] = $car_rental_location_state_province;

        return $this;
    }

    /**
     * Gets car_rental_no_show_indicator
     *
     * @return string|null
     */
    public function getCarRentalNoShowIndicator()
    {
        return $this->container['car_rental_no_show_indicator'];
    }

    /**
     * Sets car_rental_no_show_indicator
     *
     * @param string|null $car_rental_no_show_indicator Indicates if the customer was a \"no-show\" (neither keeps nor cancels their booking). * Y - Customer was a no show. * N - Not applicable.
     *
     * @return self
     */
    public function setCarRentalNoShowIndicator($car_rental_no_show_indicator)
    {
        if (is_null($car_rental_no_show_indicator)) {
            throw new \InvalidArgumentException('non-nullable car_rental_no_show_indicator cannot be null');
        }
        $this->container['car_rental_no_show_indicator'] = $car_rental_no_show_indicator;

        return $this;
    }

    /**
     * Gets car_rental_one_way_drop_off_charges
     *
     * @return string|null
     */
    public function getCarRentalOneWayDropOffCharges()
    {
        return $this->container['car_rental_one_way_drop_off_charges'];
    }

    /**
     * Sets car_rental_one_way_drop_off_charges
     *
     * @param string|null $car_rental_one_way_drop_off_charges Charge associated with not returning a vehicle to the original rental location.
     *
     * @return self
     */
    public function setCarRentalOneWayDropOffCharges($car_rental_one_way_drop_off_charges)
    {
        if (is_null($car_rental_one_way_drop_off_charges)) {
            throw new \InvalidArgumentException('non-nullable car_rental_one_way_drop_off_charges cannot be null');
        }
        $this->container['car_rental_one_way_drop_off_charges'] = $car_rental_one_way_drop_off_charges;

        return $this;
    }

    /**
     * Gets car_rental_rate
     *
     * @return string|null
     */
    public function getCarRentalRate()
    {
        return $this->container['car_rental_rate'];
    }

    /**
     * Sets car_rental_rate
     *
     * @param string|null $car_rental_rate Daily rental rate. * Format: Alphanumeric * maxLength: 12
     *
     * @return self
     */
    public function setCarRentalRate($car_rental_rate)
    {
        if (is_null($car_rental_rate)) {
            throw new \InvalidArgumentException('non-nullable car_rental_rate cannot be null');
        }
        $this->container['car_rental_rate'] = $car_rental_rate;

        return $this;
    }

    /**
     * Gets car_rental_rate_indicator
     *
     * @return string|null
     */
    public function getCarRentalRateIndicator()
    {
        return $this->container['car_rental_rate_indicator'];
    }

    /**
     * Sets car_rental_rate_indicator
     *
     * @param string|null $car_rental_rate_indicator Specifies whether the given rate is applied daily or weekly. * D - Daily rate. * W - Weekly rate.
     *
     * @return self
     */
    public function setCarRentalRateIndicator($car_rental_rate_indicator)
    {
        if (is_null($car_rental_rate_indicator)) {
            throw new \InvalidArgumentException('non-nullable car_rental_rate_indicator cannot be null');
        }
        $this->container['car_rental_rate_indicator'] = $car_rental_rate_indicator;

        return $this;
    }

    /**
     * Gets car_rental_rental_agreement_number
     *
     * @return string|null
     */
    public function getCarRentalRentalAgreementNumber()
    {
        return $this->container['car_rental_rental_agreement_number'];
    }

    /**
     * Sets car_rental_rental_agreement_number
     *
     * @param string|null $car_rental_rental_agreement_number The rental agreement number associated with this car rental. * Format: Alphanumeric * maxLength: 9
     *
     * @return self
     */
    public function setCarRentalRentalAgreementNumber($car_rental_rental_agreement_number)
    {
        if (is_null($car_rental_rental_agreement_number)) {
            throw new \InvalidArgumentException('non-nullable car_rental_rental_agreement_number cannot be null');
        }
        $this->container['car_rental_rental_agreement_number'] = $car_rental_rental_agreement_number;

        return $this;
    }

    /**
     * Gets car_rental_rental_class_id
     *
     * @return string|null
     */
    public function getCarRentalRentalClassId()
    {
        return $this->container['car_rental_rental_class_id'];
    }

    /**
     * Sets car_rental_rental_class_id
     *
     * @param string|null $car_rental_rental_class_id Daily rental rate. * Format: Alphanumeric * maxLength: 12
     *
     * @return self
     */
    public function setCarRentalRentalClassId($car_rental_rental_class_id)
    {
        if (is_null($car_rental_rental_class_id)) {
            throw new \InvalidArgumentException('non-nullable car_rental_rental_class_id cannot be null');
        }
        $this->container['car_rental_rental_class_id'] = $car_rental_rental_class_id;

        return $this;
    }

    /**
     * Gets car_rental_renter_name
     *
     * @return string|null
     */
    public function getCarRentalRenterName()
    {
        return $this->container['car_rental_renter_name'];
    }

    /**
     * Sets car_rental_renter_name
     *
     * @param string|null $car_rental_renter_name The name of the person renting the car. * Format: Alphanumeric * maxLength: 26
     *
     * @return self
     */
    public function setCarRentalRenterName($car_rental_renter_name)
    {
        if (is_null($car_rental_renter_name)) {
            throw new \InvalidArgumentException('non-nullable car_rental_renter_name cannot be null');
        }
        $this->container['car_rental_renter_name'] = $car_rental_renter_name;

        return $this;
    }

    /**
     * Gets car_rental_return_city
     *
     * @return string|null
     */
    public function getCarRentalReturnCity()
    {
        return $this->container['car_rental_return_city'];
    }

    /**
     * Sets car_rental_return_city
     *
     * @param string|null $car_rental_return_city The city where the car must be returned. * Format: Alphanumeric * maxLength: 18
     *
     * @return self
     */
    public function setCarRentalReturnCity($car_rental_return_city)
    {
        if (is_null($car_rental_return_city)) {
            throw new \InvalidArgumentException('non-nullable car_rental_return_city cannot be null');
        }
        $this->container['car_rental_return_city'] = $car_rental_return_city;

        return $this;
    }

    /**
     * Gets car_rental_return_country
     *
     * @return string|null
     */
    public function getCarRentalReturnCountry()
    {
        return $this->container['car_rental_return_country'];
    }

    /**
     * Sets car_rental_return_country
     *
     * @param string|null $car_rental_return_country The country where the car must be returned. * Format: Alphanumeric * maxLength: 2
     *
     * @return self
     */
    public function setCarRentalReturnCountry($car_rental_return_country)
    {
        if (is_null($car_rental_return_country)) {
            throw new \InvalidArgumentException('non-nullable car_rental_return_country cannot be null');
        }
        $this->container['car_rental_return_country'] = $car_rental_return_country;

        return $this;
    }

    /**
     * Gets car_rental_return_date
     *
     * @return string|null
     */
    public function getCarRentalReturnDate()
    {
        return $this->container['car_rental_return_date'];
    }

    /**
     * Sets car_rental_return_date
     *
     * @param string|null $car_rental_return_date The last date to return the car by. * Date format: `yyyyMMdd`
     *
     * @return self
     */
    public function setCarRentalReturnDate($car_rental_return_date)
    {
        if (is_null($car_rental_return_date)) {
            throw new \InvalidArgumentException('non-nullable car_rental_return_date cannot be null');
        }
        $this->container['car_rental_return_date'] = $car_rental_return_date;

        return $this;
    }

    /**
     * Gets car_rental_return_location_id
     *
     * @return string|null
     */
    public function getCarRentalReturnLocationId()
    {
        return $this->container['car_rental_return_location_id'];
    }

    /**
     * Sets car_rental_return_location_id
     *
     * @param string|null $car_rental_return_location_id Agency code, phone number, or address abbreviation * Format: Alphanumeric * maxLength: 10
     *
     * @return self
     */
    public function setCarRentalReturnLocationId($car_rental_return_location_id)
    {
        if (is_null($car_rental_return_location_id)) {
            throw new \InvalidArgumentException('non-nullable car_rental_return_location_id cannot be null');
        }
        $this->container['car_rental_return_location_id'] = $car_rental_return_location_id;

        return $this;
    }

    /**
     * Gets car_rental_return_state_province
     *
     * @return string|null
     */
    public function getCarRentalReturnStateProvince()
    {
        return $this->container['car_rental_return_state_province'];
    }

    /**
     * Sets car_rental_return_state_province
     *
     * @param string|null $car_rental_return_state_province The state or province where the car must be returned. * Format: Alphanumeric * maxLength: 3
     *
     * @return self
     */
    public function setCarRentalReturnStateProvince($car_rental_return_state_province)
    {
        if (is_null($car_rental_return_state_province)) {
            throw new \InvalidArgumentException('non-nullable car_rental_return_state_province cannot be null');
        }
        $this->container['car_rental_return_state_province'] = $car_rental_return_state_province;

        return $this;
    }

    /**
     * Gets car_rental_tax_exempt_indicator
     *
     * @return string|null
     */
    public function getCarRentalTaxExemptIndicator()
    {
        return $this->container['car_rental_tax_exempt_indicator'];
    }

    /**
     * Sets car_rental_tax_exempt_indicator
     *
     * @param string|null $car_rental_tax_exempt_indicator Indicates whether the goods or services were tax-exempt, or tax was not collected.  Values: * Y - Goods or services were tax exempt * N - Tax was not collected
     *
     * @return self
     */
    public function setCarRentalTaxExemptIndicator($car_rental_tax_exempt_indicator)
    {
        if (is_null($car_rental_tax_exempt_indicator)) {
            throw new \InvalidArgumentException('non-nullable car_rental_tax_exempt_indicator cannot be null');
        }
        $this->container['car_rental_tax_exempt_indicator'] = $car_rental_tax_exempt_indicator;

        return $this;
    }

    /**
     * Gets travel_entertainment_auth_data_duration
     *
     * @return string|null
     */
    public function getTravelEntertainmentAuthDataDuration()
    {
        return $this->container['travel_entertainment_auth_data_duration'];
    }

    /**
     * Sets travel_entertainment_auth_data_duration
     *
     * @param string|null $travel_entertainment_auth_data_duration Number of nights.  This should be included in the auth message. * Format: Numeric * maxLength: 2
     *
     * @return self
     */
    public function setTravelEntertainmentAuthDataDuration($travel_entertainment_auth_data_duration)
    {
        if (is_null($travel_entertainment_auth_data_duration)) {
            throw new \InvalidArgumentException('non-nullable travel_entertainment_auth_data_duration cannot be null');
        }
        $this->container['travel_entertainment_auth_data_duration'] = $travel_entertainment_auth_data_duration;

        return $this;
    }

    /**
     * Gets travel_entertainment_auth_data_market
     *
     * @return string|null
     */
    public function getTravelEntertainmentAuthDataMarket()
    {
        return $this->container['travel_entertainment_auth_data_market'];
    }

    /**
     * Sets travel_entertainment_auth_data_market
     *
     * @param string|null $travel_entertainment_auth_data_market Indicates what market-specific dataset will be submitted or is being submitted. Value should be \"A\" for Car rental. This should be included in the auth message. * Format: Alphanumeric * maxLength: 1
     *
     * @return self
     */
    public function setTravelEntertainmentAuthDataMarket($travel_entertainment_auth_data_market)
    {
        if (is_null($travel_entertainment_auth_data_market)) {
            throw new \InvalidArgumentException('non-nullable travel_entertainment_auth_data_market cannot be null');
        }
        $this->container['travel_entertainment_auth_data_market'] = $travel_entertainment_auth_data_market;

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
