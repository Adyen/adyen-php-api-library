<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\BalanceControl\BalanceTransferRequest;
use Adyen\Model\BalanceControl\BalanceTransferResponse;
use Adyen\Service\BalanceControlApi;

//this is a test class
class BalanceControlTest extends TestCaseMock
{
    public function testBalanceTransfer()
    {
        $client = $this->createMockClientUrl('tests/Resources/BalanceControl/balance.json');
        $service = new BalanceControlApi($client);
        $response = $service->balanceTransfer(new BalanceTransferRequest());
        self::assertEquals(new \DateTime('2022-01-24T14:59:11+01:00'), $response->getCreatedAt());
        self::assertEquals(BalanceTransferResponse::STATUS_TRANSFERRED, $response->getStatus());
        self::assertEquals(BalanceTransferResponse::TYPE_DEBIT, $response->getType());
    }
}
