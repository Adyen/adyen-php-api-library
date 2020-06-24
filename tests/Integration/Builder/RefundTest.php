<?php


namespace Adyen\Tests\Integration\Builder;


use Adyen\Service\Builder\Refund;
use Adyen\TestCase;

class RefundTest extends TestCase
{
    public function testBuildRefundRequest()
    {
        $expectedResult = array(
            'originalReference' => '812345679',
            'modificationAmount' => array(
                'value' => 10000,
                'currency' => "EUR"
            ),
            'reference' => "12345",
            'merchantAccount' => "TestMerchantAccount"
        );

        $refund = new Refund();
        $result = $refund->buildRefundRequest(
            100,
            "12345",
            "812345679",
            "EUR",
            "TestMerchantAccount"
        );
        $this->assertEquals($result, $expectedResult);
    }
}