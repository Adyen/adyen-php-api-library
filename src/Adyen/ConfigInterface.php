<?php

namespace Adyen;

Interface ConfigInterface {

    public function getUsername();
    public function getPassword();
    public function getXApiKey();
    public function get($param);
    public function getInputType();
    public function getOutputType();
    public function getMerchantAccount();
    public function getTimeout();
}