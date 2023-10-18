<?php

use Adyen\Tests\Unit\TestCaseMock;

class DisputesTest extends TestCaseMock
{
    /**
     * @throws AdyenException
     * @throws \Adyen\AdyenException
     */
    public function testAcceptDispute()
    {
        $client = $this->createMockClientUrl("tests/Resources/Disputes/generic-200.json");
        // initialize service
        $service = new \Adyen\Service\DisputesApi($client);
        $response = $service->acceptDispute(new \Adyen\Model\Disputes\AcceptDisputeRequest(
            json_decode('{
                "disputePspReference": "DZ4DPSHB4WD2WN82",
                "merchantAccountCode": "YOUR_MERCHANT_ACCOUNT"
                }', true)
        ));

        $this->assertNotEmpty(json_encode($response->jsonSerialize()));
        $this->assertEquals("AcceptDisputeResponse", $response->getModelName());
        $this->assertTrue($response->getDisputeServiceResult()->getSuccess());
        $this->assertEquals(
            'https://ca-test.adyen.com/ca/services/DisputeService/v30/acceptDispute',
            $this->requestUrl
        );
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\AdyenException
     */
    public function testDefendDispute()
    {
        $client = $this->createMockClientUrl("tests/Resources/Disputes/generic-200.json");
        // initialize service
        $service = new \Adyen\Service\DisputesApi($client);
        $response = $service->defendDispute(new \Adyen\Model\Disputes\DefendDisputeRequest(
            json_decode('{
                "defenseReasonCode": "SupplyDefenseMaterial",
                "disputePspReference": "DZ4DPSHB4WD2WN82",
                "merchantAccountCode": "YOUR_MERCHANT_ACCOUNT"
                }', true)
        ));

        $this->assertNotEmpty(json_encode($response->jsonSerialize()));
        $this->assertEquals("DefendDisputeResponse", $response->getModelName());
        $this->assertTrue($response->getDisputeServiceResult()->getSuccess());
        $this->assertEquals(
            'https://ca-test.adyen.com/ca/services/DisputeService/v30/defendDispute',
            $this->requestUrl
        );
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\AdyenException
     */
    public function testSupplyDefenseDocuments()
    {
        $client = $this->createMockClientUrl("tests/Resources/Disputes/generic-200.json");
        // initialize service
        $service = new \Adyen\Service\DisputesApi($client);
        $response = $service->supplyDefenseDocument(new \Adyen\Model\Disputes\SupplyDefenseDocumentRequest(
            json_decode('{
              "defenseDocuments": [
                {
                  "content": "JVBERi0xLjQKJcOkw7zDtsOfCjIgMCBv+f/ub0j6JPRX+E3EmC==",
                  "contentType": "application/pdf",
                  "defenseDocumentTypeCode": "DefenseMaterial"
                }
              ],
              "disputePspReference": "DZ4DPSHB4WD2WN82",
              "merchantAccountCode": "YOUR_MERCHANT_ACCOUNT"
            }', true)
        ));

        $this->assertNotEmpty(json_encode($response->jsonSerialize()));
        $this->assertTrue($response->getDisputeServiceResult()->getSuccess());
        $this->assertEquals(
            'https://ca-test.adyen.com/ca/services/DisputeService/v30/supplyDefenseDocument',
            $this->requestUrl
        );
    }
}
