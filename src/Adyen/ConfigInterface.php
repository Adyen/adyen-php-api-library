<?php

namespace Adyen;

/**
 * Interface ConfigInterface
 * @deprecated Please do not use your own interface as we will deprecate this in the
 *             future for improvements on the library
 * @package Adyen
 */
interface ConfigInterface
{
    public function getUsername();

    public function getPassword();

    public function getXApiKey();

    public function get($param);

    public function getInputType();

    public function getOutputType();

    public function getMerchantAccount();

    public function getTimeout();
}
