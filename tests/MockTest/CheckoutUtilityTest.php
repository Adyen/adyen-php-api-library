<?php

namespace Adyen\MockTest;


class CheckoutUtilityTest extends TestCaseMock
{
    /**
     * @param $jsonFile
     * @param $httpStatus
     *
     * @dataProvider successOriginKeysProvider
     *
     */
    public function testOriginKeysSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\CheckoutUtility($client);

        $params = array(
            "originDomains" => array(
                "https://www.your-domain1.com",
                "https://www.your-domain2.com",
                "https://www.your-domain3.com"
            )
        );

        $result = $service->originKeys($params);

        $this->assertArrayHasKey('originKeys', $result);

    }

    public static function successOriginKeysProvider()
    {
        return array(
            array('tests/Resources/CheckoutUtility/origin-keys-success.json', 200)
        );
    }
}