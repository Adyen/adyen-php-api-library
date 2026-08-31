<?php
namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Model\Transfers\CashOutInfo;
use Adyen\Service\Transfers\CashOutApi;

class CashOutApiTest extends TestCaseMock
{

    /**
     * @throws AdyenException
     */
    public function testInitiateCashout()
    {
        $client = $this->createMockClientUrl('tests/Resources/Tranfers/initiate-cashout.json');
        $service = new CashOutApi($client);
        $response = $service->initiateCashout(new CashOutInfo());

        $this->assertEquals('CO00000000000000000000001', $response->getId());
        $this->assertEquals('BA00000000000000000000001', $response->getInstructingBalanceAccountId());
        $this->assertEquals('Cashout to bank account', $response->getDescription());
        $this->assertEquals('CASHOUT-REF-001', $response->getReferenceForBeneficiary());

        $this->assertEquals('EUR', $response->getAmount()->getCurrency());
        $this->assertEquals(50000, $response->getAmount()->getValue());

        $this->assertEquals('SE00000000000000000000001', $response->getCounterparty()->getTransferInstrumentId());

        $this->assertEquals(500, $response->getFee()->getAmount()->getValue());

        $transfers = $response->getTransfers();
        $this->assertCount(2, $transfers);

        $this->assertEquals('400F6060JMB1I0AB', $transfers[0]->getId());
        $this->assertEquals('cashoutRepayment', $transfers[0]->getType());
        $this->assertEquals(50500, $transfers[0]->getAmount()->getValue());

        $this->assertEquals('400F6060JMB1I0AA', $transfers[1]->getId());
        $this->assertEquals('cashoutFee', $transfers[1]->getType());
        $this->assertEquals(500, $transfers[1]->getAmount()->getValue());
    }
}
