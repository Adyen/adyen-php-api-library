<?php

namespace Adyen\MockTest;

class ModificationTest extends TestCaseMock
{
    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successRefundWithDataProvider
     * @throws \Adyen\AdyenException
     */
    public function testRefundWithDataSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Modification($client);

        $params = json_decode('
             {
                "amount":{
                    "value":1500,
                    "currency":"GBP"
                },
                "selectedRecurringDetailReference":"8315535507322518",
                "shopperReference":"myshopperreference",
                "reference":"myreference",
                "merchantAccount":"mymerchantaccount",
                "recurring":{
                    "contract":"RECURRING"
                },
                "shopperInteraction":"ContAuth"
            }',
            true
        );

        $result = $service->refundWithData($params);

        $this->assertContains($result['resultCode'], array('Received'));
    }

    public static function successRefundWithDataProvider()
    {
        return array(
            array('tests/Resources/Modification/refundWithData-success.json', 200),
        );
    }
}
