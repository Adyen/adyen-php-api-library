<?php

namespace Adyen;

Interface ConfigInterface {

    public function getUsername();
    public function getPassword();
    public function get($param);
    public function getInputType();
    public function getOutputType();
    public function getMerchantAccount();

}