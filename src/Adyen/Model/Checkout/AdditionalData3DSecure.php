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
 * AdditionalData3DSecure Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AdditionalData3DSecure implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AdditionalData3DSecure';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'allow3_ds2' => 'string',
        'challenge_window_size' => 'string',
        'execute_three_d' => 'string',
        'mpi_implementation_type' => 'string',
        'sca_exemption' => 'string',
        'three_ds_version' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'allow3_ds2' => null,
        'challenge_window_size' => null,
        'execute_three_d' => null,
        'mpi_implementation_type' => null,
        'sca_exemption' => null,
        'three_ds_version' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'allow3_ds2' => false,
        'challenge_window_size' => false,
        'execute_three_d' => false,
        'mpi_implementation_type' => false,
        'sca_exemption' => false,
        'three_ds_version' => false
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
        'allow3_ds2' => 'allow3DS2',
        'challenge_window_size' => 'challengeWindowSize',
        'execute_three_d' => 'executeThreeD',
        'mpi_implementation_type' => 'mpiImplementationType',
        'sca_exemption' => 'scaExemption',
        'three_ds_version' => 'threeDSVersion'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'allow3_ds2' => 'setAllow3Ds2',
        'challenge_window_size' => 'setChallengeWindowSize',
        'execute_three_d' => 'setExecuteThreeD',
        'mpi_implementation_type' => 'setMpiImplementationType',
        'sca_exemption' => 'setScaExemption',
        'three_ds_version' => 'setThreeDsVersion'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'allow3_ds2' => 'getAllow3Ds2',
        'challenge_window_size' => 'getChallengeWindowSize',
        'execute_three_d' => 'getExecuteThreeD',
        'mpi_implementation_type' => 'getMpiImplementationType',
        'sca_exemption' => 'getScaExemption',
        'three_ds_version' => 'getThreeDsVersion'
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

    public const CHALLENGE_WINDOW_SIZE__01 = '01';
    public const CHALLENGE_WINDOW_SIZE__02 = '02';
    public const CHALLENGE_WINDOW_SIZE__03 = '03';
    public const CHALLENGE_WINDOW_SIZE__04 = '04';
    public const CHALLENGE_WINDOW_SIZE__05 = '05';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getChallengeWindowSizeAllowableValues()
    {
        return [
            self::CHALLENGE_WINDOW_SIZE__01,
            self::CHALLENGE_WINDOW_SIZE__02,
            self::CHALLENGE_WINDOW_SIZE__03,
            self::CHALLENGE_WINDOW_SIZE__04,
            self::CHALLENGE_WINDOW_SIZE__05,
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
        $this->setIfExists('allow3_ds2', $data ?? [], null);
        $this->setIfExists('challenge_window_size', $data ?? [], null);
        $this->setIfExists('execute_three_d', $data ?? [], null);
        $this->setIfExists('mpi_implementation_type', $data ?? [], null);
        $this->setIfExists('sca_exemption', $data ?? [], null);
        $this->setIfExists('three_ds_version', $data ?? [], null);
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

        $allowedValues = $this->getChallengeWindowSizeAllowableValues();
        if (!is_null($this->container['challenge_window_size']) && !in_array($this->container['challenge_window_size'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'challenge_window_size', must be one of '%s'",
                $this->container['challenge_window_size'],
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
     * Gets allow3_ds2
     *
     * @return string|null
     * @deprecated
     */
    public function getAllow3Ds2()
    {
        return $this->container['allow3_ds2'];
    }

    /**
     * Sets allow3_ds2
     *
     * @param string|null $allow3_ds2 Indicates if you are able to process 3D Secure 2 transactions natively on your payment page. Send this parameter when you are using `/payments` endpoint with any of our [native 3D Secure 2 solutions](https://docs.adyen.com/online-payments/3d-secure/native-3ds2).   > This parameter only indicates readiness to support native 3D Secure 2 authentication. To specify if you _want_ to perform 3D Secure, use [Dynamic 3D Secure](/risk-management/dynamic-3d-secure) or send the `executeThreeD` parameter.  Possible values: * **true** - Ready to support native 3D Secure 2 authentication. Setting this to true does not mean always applying 3D Secure 2. Adyen still selects the version of 3D Secure based on configuration to optimize authorisation rates and improve the shopper's experience. * **false** – Not ready to support native 3D Secure 2 authentication. Adyen will not offer 3D Secure 2 to your shopper regardless of your configuration.
     *
     * @return self
     * @deprecated
     */
    public function setAllow3Ds2($allow3_ds2)
    {
        if (is_null($allow3_ds2)) {
            throw new \InvalidArgumentException('non-nullable allow3_ds2 cannot be null');
        }
        $this->container['allow3_ds2'] = $allow3_ds2;

        return $this;
    }

    /**
     * Gets challenge_window_size
     *
     * @return string|null
     */
    public function getChallengeWindowSize()
    {
        return $this->container['challenge_window_size'];
    }

    /**
     * Sets challenge_window_size
     *
     * @param string|null $challenge_window_size Dimensions of the 3DS2 challenge window to be displayed to the cardholder.  Possible values:  * **01** - size of 250x400  * **02** - size of 390x400 * **03** - size of 500x600 * **04** - size of 600x400 * **05** - Fullscreen
     *
     * @return self
     */
    public function setChallengeWindowSize($challenge_window_size)
    {
        if (is_null($challenge_window_size)) {
            throw new \InvalidArgumentException('non-nullable challenge_window_size cannot be null');
        }
        $allowedValues = $this->getChallengeWindowSizeAllowableValues();
        if (!in_array($challenge_window_size, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'challenge_window_size', must be one of '%s'",
                    $challenge_window_size,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['challenge_window_size'] = $challenge_window_size;

        return $this;
    }

    /**
     * Gets execute_three_d
     *
     * @return string|null
     * @deprecated
     */
    public function getExecuteThreeD()
    {
        return $this->container['execute_three_d'];
    }

    /**
     * Sets execute_three_d
     *
     * @param string|null $execute_three_d Indicates if you want to perform 3D Secure authentication on a transaction.   > Alternatively, you can use [Dynamic 3D Secure](/risk-management/dynamic-3d-secure) to configure rules for applying 3D Secure.  Possible values: * **true** – Perform 3D Secure authentication. * **false** – Don't perform 3D Secure authentication. Note that this setting results in refusals if the issuer mandates 3D Secure because of the PSD2 directive  or other, national regulations.
     *
     * @return self
     * @deprecated
     */
    public function setExecuteThreeD($execute_three_d)
    {
        if (is_null($execute_three_d)) {
            throw new \InvalidArgumentException('non-nullable execute_three_d cannot be null');
        }
        $this->container['execute_three_d'] = $execute_three_d;

        return $this;
    }

    /**
     * Gets mpi_implementation_type
     *
     * @return string|null
     */
    public function getMpiImplementationType()
    {
        return $this->container['mpi_implementation_type'];
    }

    /**
     * Sets mpi_implementation_type
     *
     * @param string|null $mpi_implementation_type In case of Secure+, this field must be set to **CUPSecurePlus**.
     *
     * @return self
     */
    public function setMpiImplementationType($mpi_implementation_type)
    {
        if (is_null($mpi_implementation_type)) {
            throw new \InvalidArgumentException('non-nullable mpi_implementation_type cannot be null');
        }
        $this->container['mpi_implementation_type'] = $mpi_implementation_type;

        return $this;
    }

    /**
     * Gets sca_exemption
     *
     * @return string|null
     */
    public function getScaExemption()
    {
        return $this->container['sca_exemption'];
    }

    /**
     * Sets sca_exemption
     *
     * @param string|null $sca_exemption Indicates the [exemption type](https://docs.adyen.com/payments-fundamentals/psd2-sca-compliance-and-implementation-guide#specifypreferenceinyourapirequest) that you want to request for the transaction.   Possible values: * **lowValue**  * **secureCorporate**  * **trustedBeneficiary**  * **transactionRiskAnalysis**
     *
     * @return self
     */
    public function setScaExemption($sca_exemption)
    {
        if (is_null($sca_exemption)) {
            throw new \InvalidArgumentException('non-nullable sca_exemption cannot be null');
        }
        $this->container['sca_exemption'] = $sca_exemption;

        return $this;
    }

    /**
     * Gets three_ds_version
     *
     * @return string|null
     */
    public function getThreeDsVersion()
    {
        return $this->container['three_ds_version'];
    }

    /**
     * Sets three_ds_version
     *
     * @param string|null $three_ds_version Indicates your preference for the 3D Secure version.  > If you use this parameter, you override the checks from Adyen's Authentication Engine. We recommend to use this field only if you have an extensive knowledge of 3D Secure.  Possible values: * **1.0.2**: Apply 3D Secure version 1.0.2.  * **2.1.0**: Apply 3D Secure version 2.1.0.  * **2.2.0**: Apply 3D Secure version 2.2.0. If the issuer does not support version 2.2.0, we will fall back to 2.1.0.  The following rules apply: * If you prefer 2.1.0 or 2.2.0 but we receive a negative `transStatus` in the `ARes`, we will apply the fallback policy configured in your account. For example, if the configuration is to fall back to 3D Secure 1, we will apply version 1.0.2. * If you prefer 2.1.0 or 2.2.0 but the BIN is not enrolled, you will receive an error.
     *
     * @return self
     */
    public function setThreeDsVersion($three_ds_version)
    {
        if (is_null($three_ds_version)) {
            throw new \InvalidArgumentException('non-nullable three_ds_version cannot be null');
        }
        $this->container['three_ds_version'] = $three_ds_version;

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
