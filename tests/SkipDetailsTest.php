<?php
/**
 * Created by PhpStorm.
 * User: rikt
 * Date: 11/6/15
 * Time: 2:53 PM
 */

namespace Adyen;


use Adyen\Util\Util;

class SkipDetailsTest extends TestCase
{
    public function testGetSandboxSkipDetailsUrl()
    {
        $client = $this->createClient();
        $this->assertEquals( "https://test.adyen.com/hpp/skipDetails.shtml", $client->getSkipDetailsUrl());
    }

    public function testGetLiveSkipDetailsUrl()
    {
        $client = $this->createClient();
        $client->setEnvironment(\Adyen\Environment::LIVE);
        $this->assertEquals( "https://live.adyen.com/hpp/skipDetails.shtml", $client->getSkipDetailsUrl());
    }
}
