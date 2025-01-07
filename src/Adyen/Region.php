<?php

namespace Adyen;

class Region
{
    /**
     * European Union region
    */
    const EU = "eu";
    
    /**
     * Australia region
     */
    const AU = "au";

    /**
     * United States region
     */
    const US = "us";

    /**
     * India region
     */
    const IN = "in";

    /**
     * Asia-Pacific, South East region
     */
    const APSE = "apse";

    /**
     * Maps regions to their respective Terminal API endpoints.
     * @var array<string, string>
     */
    const TERMINAL_API_ENDPOINTS_MAPPING = [
        self::EU => Client::ENDPOINT_TERMINAL_CLOUD_LIVE,
        self::AU => Client::ENDPOINT_TERMINAL_CLOUD_AU_LIVE,
        self::US => Client::ENDPOINT_TERMINAL_CLOUD_US_LIVE,
        self::APSE => Client::ENDPOINT_TERMINAL_CLOUD_APSE_LIVE,
    ];
}
