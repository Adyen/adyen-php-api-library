<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\Transfers\Transaction;
use Adyen\Model\Transfers\Transfer;
use Adyen\Model\Transfers\TransferInfo;
use Adyen\Service\Transfers\TransactionsApi;
use Adyen\Service\Transfers\TransfersApi;
use DateTime;
use function PHPUnit\Framework\assertEquals;

class TransfersTest extends TestCaseMock
{
    public function testTransferFunds()
    {
        $client = $this->createMockClientUrl('tests/Resources/Tranfers/transfer-funds.json');
        $service = new TransfersApi($client);
        $response = $service->transferFunds(new TransferInfo());
        assertEquals('1W1UG35U8A9J5ZLG', $response->getId());
        assertEquals(Transfer::STATUS_AUTHORISED, $response->getStatus());
        assertEquals('https://balanceplatform-api-test.adyen.com/btl/v4/transfers', $this->requestUrl);
    }

    public function testGetAllTransactions()
    {
        $client = $this->createMockClientUrl('tests/Resources/Tranfers/all-transactions-get.json');
        $service = new TransactionsApi($client);
        $response = $service->getAllTransactions(
            ['queryParams' =>
                array('createdSince' => '2021-05-30T15:07:40Z', 'balancePlatform' =>
            'balancePlatform',
            'accountHolderId' => 'accountHolderId')]
        );
        assertEquals(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transactions' .
            '?createdSince=2021-05-30T15%3A07%3A40Z&balancePlatform=balancePlatform&accountHolderId=accountHolderId',
            $this->requestUrl
        );
    }

    public function testGetAllTransactionsDateTime()
    {
        $client = $this->createMockClientUrl('tests/Resources/Tranfers/all-transactions-get.json');
        $service = new TransactionsApi($client);

        $date = new DateTime("2021-05-30T15:07:40Z");
        $queryPararms = ['queryParams' => array('createdSince' => $date, 'balancePlatform' =>
            'balancePlatform', 'accountHolderId' => 'accountHolderId')];

        $response = $service->getAllTransactions($queryPararms);
        assertEquals(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transactions' .
            '?createdSince=2021-05-30T15%3A07%3A40%2B00%3A00&' .
            'balancePlatform=balancePlatform&accountHolderId=accountHolderId',
            $this->requestUrl
        );
    }
}
