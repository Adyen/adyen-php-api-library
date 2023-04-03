<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\Transfers\Transaction;
use Adyen\Model\Transfers\Transfer;
use Adyen\Model\Transfers\TransferInfo;
use Adyen\Service\Transfers\TransactionsApi;
use Adyen\Service\Transfers\TransfersApi;
use function PHPUnit\Framework\assertEquals;

class TransfersTest extends TestCaseMock
{
    function testTransferFunds()
    {
        $client = $this->createMockClientUrl('tests/Resources/Tranfers/transfer-funds.json', 200);
        $service = new TransfersApi($client);
        $response = $service->transferFunds(new TransferInfo());
        assertEquals('1W1UG35U8A9J5ZLG', $response->getId());
        assertEquals(Transfer::STATUS_AUTHORISED, $response->getStatus());
        assertEquals('https://balanceplatform-api-test.adyen.com/btl/v3/transfers', $this->requestUrl);
    }

    function testGetAllTransactions()
    {
        $client = $this->createMockClientUrl('tests/Resources/Tranfers/all-transactions-get.json', 200);
        $service = new TransactionsApi($client);
        $response = $service->getAllTransactions(array('createdSince' => '2021-05-30T15:07:40Z', 'balancePlatform' =>
        'balancePlatform', 'accountHolderId' => 'accountHolderId'));
        assertEquals(Transaction::CATEGORY_INTERNAL, $response->getData()[0]->getCategory());
        assertEquals(
            'https://balanceplatform-api-test.adyen.com/btl/v3/transactions?createdSince=2021-05-30T15%3A07%3A40Z&balancePlatform=balancePlatform&accountHolderId=accountHolderId',
            $this->requestUrl
        );
    }
}
