<?php
/**
 *                       ######
 *                       ######
 * ############    ####( ######  #####. ######  ############   ############
 * #############  #####( ######  #####. ######  #############  #############
 *        ######  #####( ######  #####. ######  #####  ######  #####  ######
 * ###### ######  #####( ######  #####. ######  #####  #####   #####  ######
 * ###### ######  #####( ######  #####. ######  #####          #####  ######
 * #############  #############  #############  #############  #####  ######
 *  ############   ############  #############   ############  #####  ######
 *                                      ######
 *                               #############
 *                               ############
 *
 * Adyen API Library for PHP
 *
 * Copyright (c) 2020 Adyen N.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Service;

use Adyen\Exception\GenericLoggedException;
use Adyen\Exception\MissingDataException;

class Crypto
{
    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * @var string
     */
    private $method;

    public function __construct(Configuration $configuration) //TODO Configuration class?
    {
        $this->method = 'aes-256-ctr';
        $this->configuration = $configuration;
    }

    public function encrypt($data)
    {
        // Generate an initialization vector
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->method));
        // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
        return bin2hex($iv) . openssl_encrypt(
                $data,
                $this->method,
                $this->configuration->sslEncryptionKey,
                0,
                $iv
            );
    }
}