<?php

namespace Adyen;

class Region
{
    /**
     * European Union region
    */
    const EU = "eu";
    
    /**
     * United States region
     */
    const US = "us";

    /**
     * Australia region
     */
    const AU = "au";
    
    /**
     * India region
     */
    const IN = "in";

    /**
     * Asia-Pacific, South East region
     */
    const APSE = "apse";

   /**
     * List of all valid regions
     * @var array<int,string>
     */
    const VALID_REGIONS = [
        self::EU,
        self::US,
        self::AU,
        self::IN,
        self::APSE
    ];

    /**
     * Maps regions to their respective Terminal API endpoints.
     * @var array<string, string>
     */
    const TERMINAL_API_ENDPOINTS_MAPPING = [
        self::EU => Client::ENDPOINT_TERMINAL_CLOUD_LIVE,
        self::US => Client::ENDPOINT_TERMINAL_CLOUD_US_LIVE,
        self::AU => Client::ENDPOINT_TERMINAL_CLOUD_AU_LIVE,
        self::APSE => Client::ENDPOINT_TERMINAL_CLOUD_APSE_LIVE,
    ];
}
