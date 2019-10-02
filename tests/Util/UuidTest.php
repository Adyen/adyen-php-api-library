<?php

namespace Adyen\Tests\Util;

use Adyen\Util\Uuid;

class UuidTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerateV4()
    {
        $generatedUuid = Uuid::generateV4();
        $UUIDv4 = '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';
        $result = preg_match($UUIDv4, $generatedUuid);
        self::assertEquals($result, 1);
    }
}
