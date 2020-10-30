<?php

namespace Adyen\Unit;

class RiskManagementTest extends TestCaseMock
{
    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successSubmitReferralsWithDataProvider
     * @throws \Adyen\AdyenException
     */
    public function testRefundWithDataSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $service = new \Adyen\Service\RiskManagement($client);

        $params = json_decode(
            '{
                "accountCode":"TestMerchant",
                "referralType":"shopperemail",
                "action":"block",
                "referrals":[
                    {
                        "referralContainer":
                        {
                            "referral":"johnsmith@example.com"
                        }
                    },
                    {
                        "referralContainer":
                        {
                            "referral":"jsmith_example.com"
                        }
                    }
                ],
                "reason":"test behaviour"
            }',
            true
        );

        $result = $service->submitReferrals($params);
        $this->assertEquals(true, $result['referralServiceResult']['success']);
    }

    public static function successSubmitReferralsWithDataProvider()
    {
        return array(
            array('tests/Resources/RiskManagement/submitReferralsWithData-success.json', 200),
        );
    }
}
