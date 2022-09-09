<?php

namespace Adyen;

class Region
{
    const EU = "eu";
    const US = "us";
    const AU = "au";

    const TERMINAL_API_ENDPOINTS_MAPPING = [
        self::EU => Client::ENDPOINT_TERMINAL_CLOUD_LIVE,
        self::US => Client::ENDPOINT_TERMINAL_CLOUD_US_LIVE,
        self::AU => Client::ENDPOINT_TERMINAL_CLOUD_AU_LIVE,
    ];
}
