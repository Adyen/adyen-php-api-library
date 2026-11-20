<?php

namespace Adyen\Tests\Unit\Transfers;

use Adyen\Exception\AdyenException;
use Adyen\Model\Transfers\Amount;
use Adyen\Model\Transfers\Link;
use Adyen\Model\Transfers\Links;
use Adyen\Model\Transfers\ResourceReference;
use Adyen\Model\Transfers\Transaction;
use Adyen\Model\Transfers\TransactionSearchResponse;
use Adyen\Model\Transfers\TransferView;
use Adyen\Service\Transfers\TransactionsApi;
use Adyen\Tests\Unit\BaseTest;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use GuzzleHttp\Promise\PromiseInterface;

class TransactionsApiTest extends BaseTest
{
    /**
     * @dataProvider transactionDatesProvider
     */
    public function testGetAllTransactionsSuccessOnTest(
        DateTimeInterface $createdSince,
        DateTimeInterface $createdUntil
    ): void {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/all-transactions-get.json',
            200,
            $container
        );
        $service = new TransactionsApi($this->createConfiguration(), $client);

        $response = $service->getAllTransactions(
            $createdSince,
            $createdUntil,
            balancePlatform: 'balancePlatform',
            paymentInstrumentId: 'paymentInstrumentId',
            accountHolderId: 'accountHolderId',
            balanceAccountId: 'balanceAccountId',
            cursor: 'next/page+token',
            sortOrder: 'asc',
            limit: 25
        );

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transactions',
            (string) $request->getUri()->withQuery('')
        );
        parse_str($request->getUri()->getQuery(), $query);
        self::assertEquals($this->getAllTransactionsQueryData(), $query);
        self::assertStringContainsString(
            'createdSince=2021-05-30T15%3A07%3A40%2B00%3A00',
            $request->getUri()->getQuery()
        );
        self::assertInstanceOf(TransactionSearchResponse::class, $response);
        self::assertCount(3, $response->getData());
        $transaction0 = $response->getData()[0];
        self::assertInstanceOf(Transaction::class, $transaction0);
        $amount = $transaction0->getAmount();
        self::assertInstanceOf(Amount::class, $amount);
        self::assertSame('EUR', $amount->getCurrency());
        self::assertSame(-9, $amount->getValue());
        self::assertSame('YOUR_BALANCE_PLATFORM', $transaction0->getBalancePlatform());
        self::assertInstanceOf(DateTime::class, $transaction0->getBookingDate());
        self::assertEquals(new DateTime('2022-03-11T11:21:24+01:00'), $transaction0->getBookingDate());
        self::assertSame('1VVF0D5U66PIUIVP', $transaction0->getId());
        self::assertSame(Transaction::STATUS_BOOKED, $transaction0->getStatus());
        self::assertInstanceOf(DateTime::class, $transaction0->getValueDate());
        self::assertEquals(new DateTime('2022-03-11T11:21:24+01:00'), $transaction0->getValueDate());
        $transaction1 = $response->getData()[1];
        self::assertInstanceOf(Transaction::class, $transaction1);
        $amount1 = $transaction1->getAmount();
        self::assertInstanceOf(Amount::class, $amount1);
        self::assertSame('EUR', $amount1->getCurrency());
        self::assertSame(-46, $amount1->getValue());
        self::assertSame('YOUR_BALANCE_PLATFORM', $transaction1->getBalancePlatform());
        self::assertInstanceOf(DateTime::class, $transaction1->getBookingDate());
        self::assertEquals(new DateTime('2022-03-12T14:22:52+01:00'), $transaction1->getBookingDate());
        self::assertSame('1WEPGD5U6MS1CFK3', $transaction1->getId());
        self::assertSame(Transaction::STATUS_BOOKED, $transaction1->getStatus());
        self::assertInstanceOf(DateTime::class, $transaction1->getValueDate());
        self::assertEquals(new DateTime('2022-03-12T14:22:52+01:00'), $transaction1->getValueDate());
        $transaction2 = $response->getData()[2];
        self::assertInstanceOf(Transaction::class, $transaction2);
        $amount2 = $transaction2->getAmount();
        self::assertInstanceOf(Amount::class, $amount2);
        self::assertSame('EUR', $amount2->getCurrency());
        self::assertSame(-8, $amount2->getValue());
        self::assertSame('YOUR_BALANCE_PLATFORM', $transaction2->getBalancePlatform());
        self::assertInstanceOf(DateTime::class, $transaction2->getBookingDate());
        self::assertEquals(new DateTime('2022-03-14T21:00:48+01:00'), $transaction2->getBookingDate());
        self::assertSame('YOUR_DESCRIPTION_2', $transaction2->getDescription());
        self::assertSame('2QP32A5U7IWC5WKG', $transaction2->getId());
        self::assertSame(Transaction::STATUS_BOOKED, $transaction2->getStatus());
        self::assertInstanceOf(DateTime::class, $transaction2->getValueDate());
        self::assertEquals(new DateTime('2022-03-14T21:00:48+01:00'), $transaction2->getValueDate());
        $links = $response->getLinks();
        self::assertInstanceOf(Links::class, $links);
        $next = $links->getNext();
        self::assertInstanceOf(Link::class, $next);
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v2/transactions?balancePlatform=Bastro' .
            'naut&createdUntil=2022-03-21T00%3A00%3A00Z&createdSince=2022-03-11T00%3A00%3A00Z&limi' .
            't=3&cursor=S2B-TSAjOkIrYlIlbjdqe0RreHRyM32lKRSxubXBHRkhHL2E32XitQQz5SfzpucD5HbHwpM1p6' .
            'NDR1eXVQLFF6MmY33J32sobDxQYT90MHIud1hwLnd6JitcX32xJ',
            $next->getHref()
        );

        self::assertCount(3, $response['data']);
        $arrayTransaction0 = $response['data'][0];
        $arrayAmount = $arrayTransaction0['amount'];
        self::assertSame('EUR', $arrayAmount['currency']);
        self::assertSame(-9, $arrayAmount['value']);
        self::assertSame('YOUR_BALANCE_PLATFORM', $arrayTransaction0['balancePlatform']);
        self::assertInstanceOf(DateTime::class, $arrayTransaction0['bookingDate']);
        self::assertEquals(new DateTime('2022-03-11T11:21:24+01:00'), $arrayTransaction0['bookingDate']);
        self::assertSame('1VVF0D5U66PIUIVP', $arrayTransaction0['id']);
        self::assertSame(Transaction::STATUS_BOOKED, $arrayTransaction0['status']);
        self::assertInstanceOf(DateTime::class, $arrayTransaction0['valueDate']);
        self::assertEquals(new DateTime('2022-03-11T11:21:24+01:00'), $arrayTransaction0['valueDate']);
        $arrayTransaction1 = $response['data'][1];
        $arrayAmount1 = $arrayTransaction1['amount'];
        self::assertSame('EUR', $arrayAmount1['currency']);
        self::assertSame(-46, $arrayAmount1['value']);
        self::assertSame('YOUR_BALANCE_PLATFORM', $arrayTransaction1['balancePlatform']);
        self::assertInstanceOf(DateTime::class, $arrayTransaction1['bookingDate']);
        self::assertEquals(new DateTime('2022-03-12T14:22:52+01:00'), $arrayTransaction1['bookingDate']);
        self::assertSame('1WEPGD5U6MS1CFK3', $arrayTransaction1['id']);
        self::assertSame(Transaction::STATUS_BOOKED, $arrayTransaction1['status']);
        self::assertInstanceOf(DateTime::class, $arrayTransaction1['valueDate']);
        self::assertEquals(new DateTime('2022-03-12T14:22:52+01:00'), $arrayTransaction1['valueDate']);
        $arrayTransaction2 = $response['data'][2];
        $arrayAmount2 = $arrayTransaction2['amount'];
        self::assertSame('EUR', $arrayAmount2['currency']);
        self::assertSame(-8, $arrayAmount2['value']);
        self::assertSame('YOUR_BALANCE_PLATFORM', $arrayTransaction2['balancePlatform']);
        self::assertInstanceOf(DateTime::class, $arrayTransaction2['bookingDate']);
        self::assertEquals(new DateTime('2022-03-14T21:00:48+01:00'), $arrayTransaction2['bookingDate']);
        self::assertSame('YOUR_DESCRIPTION_2', $arrayTransaction2['description']);
        self::assertSame('2QP32A5U7IWC5WKG', $arrayTransaction2['id']);
        self::assertSame(Transaction::STATUS_BOOKED, $arrayTransaction2['status']);
        self::assertInstanceOf(DateTime::class, $arrayTransaction2['valueDate']);
        self::assertEquals(new DateTime('2022-03-14T21:00:48+01:00'), $arrayTransaction2['valueDate']);
        $arrayLinks = $response['links'];
        $arrayNext = $arrayLinks['next'];
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v2/transactions?balancePlatform=Bastro' .
            'naut&createdUntil=2022-03-21T00%3A00%3A00Z&createdSince=2022-03-11T00%3A00%3A00Z&limi' .
            't=3&cursor=S2B-TSAjOkIrYlIlbjdqe0RreHRyM32lKRSxubXBHRkhHL2E32XitQQz5SfzpucD5HbHwpM1p6' .
            'NDR1eXVQLFF6MmY33J32sobDxQYT90MHIud1hwLnd6JitcX32xJ',
            $arrayNext['href']
        );

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertCount(3, $resultArray['data']);
        $dataTransaction0 = $resultArray['data'][0];
        $dataAmount = $dataTransaction0['amount'];
        self::assertSame('EUR', $dataAmount['currency']);
        self::assertSame(-9, $dataAmount['value']);
        self::assertSame('YOUR_BALANCE_PLATFORM', $dataTransaction0['balancePlatform']);
        self::assertSame('2022-03-11T11:21:24+01:00', $dataTransaction0['bookingDate']);
        self::assertSame('1VVF0D5U66PIUIVP', $dataTransaction0['id']);
        self::assertSame(Transaction::STATUS_BOOKED, $dataTransaction0['status']);
        self::assertSame('2022-03-11T11:21:24+01:00', $dataTransaction0['valueDate']);
        $dataTransaction1 = $resultArray['data'][1];
        $dataAmount1 = $dataTransaction1['amount'];
        self::assertSame('EUR', $dataAmount1['currency']);
        self::assertSame(-46, $dataAmount1['value']);
        self::assertSame('YOUR_BALANCE_PLATFORM', $dataTransaction1['balancePlatform']);
        self::assertSame('2022-03-12T14:22:52+01:00', $dataTransaction1['bookingDate']);
        self::assertSame('1WEPGD5U6MS1CFK3', $dataTransaction1['id']);
        self::assertSame(Transaction::STATUS_BOOKED, $dataTransaction1['status']);
        self::assertSame('2022-03-12T14:22:52+01:00', $dataTransaction1['valueDate']);
        $dataTransaction2 = $resultArray['data'][2];
        $dataAmount2 = $dataTransaction2['amount'];
        self::assertSame('EUR', $dataAmount2['currency']);
        self::assertSame(-8, $dataAmount2['value']);
        self::assertSame('YOUR_BALANCE_PLATFORM', $dataTransaction2['balancePlatform']);
        self::assertSame('2022-03-14T21:00:48+01:00', $dataTransaction2['bookingDate']);
        self::assertSame('YOUR_DESCRIPTION_2', $dataTransaction2['description']);
        self::assertSame('2QP32A5U7IWC5WKG', $dataTransaction2['id']);
        self::assertSame(Transaction::STATUS_BOOKED, $dataTransaction2['status']);
        self::assertSame('2022-03-14T21:00:48+01:00', $dataTransaction2['valueDate']);
        $dataLinks = $resultArray['links'];
        $dataNext = $dataLinks['next'];
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v2/transactions?balancePlatform=Bastro' .
            'naut&createdUntil=2022-03-21T00%3A00%3A00Z&createdSince=2022-03-11T00%3A00%3A00Z&limi' .
            't=3&cursor=S2B-TSAjOkIrYlIlbjdqe0RreHRyM32lKRSxubXBHRkhHL2E32XitQQz5SfzpucD5HbHwpM1p6' .
            'NDR1eXVQLFF6MmY33J32sobDxQYT90MHIud1hwLnd6JitcX32xJ',
            $dataNext['href']
        );
    }

    public function testGetAllTransactionsSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/all-transactions-get.json',
            200,
            $container
        );
        $service = new TransactionsApi($this->createLiveConfiguration(), $client);

        $service->getAllTransactions(
            new DateTime('2021-05-30T15:07:40Z'),
            new DateTime('2021-05-31T15:07:40Z'),
            balancePlatform: 'balancePlatform',
            paymentInstrumentId: 'paymentInstrumentId',
            accountHolderId: 'accountHolderId',
            balanceAccountId: 'balanceAccountId',
            cursor: 'next/page+token',
            sortOrder: 'asc',
            limit: 25
        );

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-live.adyen.com/btl/v4/transactions',
            (string) $request->getUri()->withQuery('')
        );
        parse_str($request->getUri()->getQuery(), $query);
        self::assertEquals($this->getAllTransactionsQueryData(), $query);
        self::assertStringContainsString(
            'createdSince=2021-05-30T15%3A07%3A40%2B00%3A00',
            $request->getUri()->getQuery()
        );
    }

    public function testGetAllTransactionsOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new TransactionsApi($this->createConfiguration(), $client);

        try {
            $service->getAllTransactions(
                new DateTime('2021-05-30T15:07:40Z'),
                new DateTime('2021-05-31T15:07:40Z'),
                balancePlatform: 'balancePlatform',
                paymentInstrumentId: 'paymentInstrumentId',
                accountHolderId: 'accountHolderId',
                balanceAccountId: 'balanceAccountId',
                cursor: 'next/page+token',
                sortOrder: 'asc',
                limit: 25
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    private function getAllTransactionsQueryData(): array
    {
        return [
            'balancePlatform' => 'balancePlatform',
            'paymentInstrumentId' => 'paymentInstrumentId',
            'accountHolderId' => 'accountHolderId',
            'balanceAccountId' => 'balanceAccountId',
            'cursor' => 'next/page+token',
            'createdSince' => '2021-05-30T15:07:40+00:00',
            'createdUntil' => '2021-05-31T15:07:40+00:00',
            'sortOrder' => 'asc',
            'limit' => '25',
        ];
    }

    public function testGetTransactionSuccessOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transaction-get.json',
            200,
            $container
        );
        $service = new TransactionsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->getTransactionWithHttpInfo('1VVF0D5U66PIUIVP');

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transactions/1VVF0D5U66PIUIVP',
            (string) $request->getUri()
        );
        self::assertSame(200, $statusCode);
        self::assertEmpty($headers);
        self::assertInstanceOf(Transaction::class, $response);
        self::assertSame('1VVF0D5U66PIUIVP', $response->getId());
        $amount = $response->getAmount();
        self::assertInstanceOf(Amount::class, $amount);
        self::assertSame('EUR', $amount->getCurrency());
        self::assertSame(-9, $amount->getValue());
        $accountHolder = $response->getAccountHolder();
        self::assertInstanceOf(ResourceReference::class, $accountHolder);
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $accountHolder->getId());
        $balanceAccount = $response->getBalanceAccount();
        self::assertInstanceOf(ResourceReference::class, $balanceAccount);
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $balanceAccount->getId());
        self::assertSame('YOUR_BALANCE_PLATFORM', $response->getBalancePlatform());
        self::assertInstanceOf(DateTime::class, $response->getBookingDate());
        self::assertEquals(new DateTime('2022-03-11T11:21:24+01:00'), $response->getBookingDate());
        self::assertInstanceOf(DateTime::class, $response->getCreationDate());
        self::assertEquals(new DateTime('2022-03-11T11:20:24+01:00'), $response->getCreationDate());
        self::assertInstanceOf(DateTime::class, $response->getValueDate());
        self::assertEquals(new DateTime('2022-03-11T11:21:24+01:00'), $response->getValueDate());
        self::assertSame('Transaction fee', $response->getDescription());
        self::assertSame('FEE_REFERENCE', $response->getReferenceForBeneficiary());
        self::assertSame(Transaction::STATUS_BOOKED, $response->getStatus());
        $transfer = $response->getTransfer();
        self::assertInstanceOf(TransferView::class, $transfer);
        self::assertSame('1VVF0D5U66PIUIVP', $transfer->getId());
        self::assertSame('REFERENCE_46e8c40e', $transfer->getReference());

        self::assertSame('1VVF0D5U66PIUIVP', $response['id']);
        $arrayAmount = $response['amount'];
        self::assertSame('EUR', $arrayAmount['currency']);
        self::assertSame(-9, $arrayAmount['value']);
        $arrayAccountHolder = $response['accountHolder'];
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $arrayAccountHolder['id']);
        $arrayBalanceAccount = $response['balanceAccount'];
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $arrayBalanceAccount['id']);
        self::assertSame('YOUR_BALANCE_PLATFORM', $response['balancePlatform']);
        self::assertInstanceOf(DateTime::class, $response['bookingDate']);
        self::assertEquals(new DateTime('2022-03-11T11:21:24+01:00'), $response['bookingDate']);
        self::assertInstanceOf(DateTime::class, $response['creationDate']);
        self::assertEquals(new DateTime('2022-03-11T11:20:24+01:00'), $response['creationDate']);
        self::assertInstanceOf(DateTime::class, $response['valueDate']);
        self::assertEquals(new DateTime('2022-03-11T11:21:24+01:00'), $response['valueDate']);
        self::assertSame('Transaction fee', $response['description']);
        self::assertSame('FEE_REFERENCE', $response['referenceForBeneficiary']);
        self::assertSame(Transaction::STATUS_BOOKED, $response['status']);
        $arrayTransfer = $response['transfer'];
        self::assertSame('1VVF0D5U66PIUIVP', $arrayTransfer['id']);
        self::assertSame('REFERENCE_46e8c40e', $arrayTransfer['reference']);

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('1VVF0D5U66PIUIVP', $resultArray['id']);
        $dataAmount = $resultArray['amount'];
        self::assertSame('EUR', $dataAmount['currency']);
        self::assertSame(-9, $dataAmount['value']);
        $dataAccountHolder = $resultArray['accountHolder'];
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $dataAccountHolder['id']);
        $dataBalanceAccount = $resultArray['balanceAccount'];
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $dataBalanceAccount['id']);
        self::assertSame('YOUR_BALANCE_PLATFORM', $resultArray['balancePlatform']);
        self::assertSame('2022-03-11T11:21:24+01:00', $resultArray['bookingDate']);
        self::assertSame('2022-03-11T11:20:24+01:00', $resultArray['creationDate']);
        self::assertSame('2022-03-11T11:21:24+01:00', $resultArray['valueDate']);
        self::assertSame('Transaction fee', $resultArray['description']);
        self::assertSame('FEE_REFERENCE', $resultArray['referenceForBeneficiary']);
        self::assertSame(Transaction::STATUS_BOOKED, $resultArray['status']);
        $dataTransfer = $resultArray['transfer'];
        self::assertSame('1VVF0D5U66PIUIVP', $dataTransfer['id']);
        self::assertSame('REFERENCE_46e8c40e', $dataTransfer['reference']);
    }

    public function testGetTransactionSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transaction-get.json',
            200,
            $container
        );
        $service = new TransactionsApi($this->createLiveConfiguration(), $client);

        $service->getTransaction('1VVF0D5U66PIUIVP');

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-live.adyen.com/btl/v4/transactions/1VVF0D5U66PIUIVP',
            (string) $request->getUri()
        );
    }

    public function testGetTransactionOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new TransactionsApi($this->createConfiguration(), $client);

        try {
            $service->getTransaction('1VVF0D5U66PIUIVP');
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    public function testGetAllTransactionsAsyncSuccessReturnsModel(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/all-transactions-get.json',
            200,
            $container
        );
        $service = new TransactionsApi($this->createConfiguration(), $client);

        $promise = $service->getAllTransactionsAsync(
            new DateTime('2021-05-30T15:07:40Z'),
            new DateTime('2021-05-31T15:07:40Z'),
            balancePlatform: 'balancePlatform',
            paymentInstrumentId: 'paymentInstrumentId',
            accountHolderId: 'accountHolderId',
            balanceAccountId: 'balanceAccountId',
            cursor: 'next/page+token',
            sortOrder: 'asc',
            limit: 25
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(TransactionSearchResponse::class, $response);
        self::assertCount(3, $response->getData());
        self::assertSame('1VVF0D5U66PIUIVP', $response->getData()[0]->getId());
        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transactions',
            (string) $request->getUri()->withQuery('')
        );
        parse_str($request->getUri()->getQuery(), $query);
        self::assertEquals($this->getAllTransactionsQueryData(), $query);
        self::assertStringContainsString(
            'createdSince=2021-05-30T15%3A07%3A40%2B00%3A00',
            $request->getUri()->getQuery()
        );
    }

    public function testGetTransactionAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new TransactionsApi($this->createConfiguration(), $client);

        try {
            $service->getTransactionAsync('1VVF0D5U66PIUIVP')->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    public static function transactionDatesProvider(): array
    {
        return [
            'legacy UTC string converted to typed dates' => [
                new DateTimeImmutable('2021-05-30T15:07:40Z'),
                new DateTimeImmutable('2021-05-31T15:07:40Z'),
            ],
            'legacy DateTime input' => [
                new DateTime('2021-05-30T15:07:40Z'),
                new DateTime('2021-05-31T15:07:40Z'),
            ],
        ];
    }

    private function assertForbiddenException(AdyenException $exception): void
    {
        self::assertSame(403, $exception->getStatusCode());
        self::assertSame('Invalid Merchant Account', $exception->getMessage());
        self::assertNotNull($exception->getError());
        self::assertSame(403, $exception->getError()->getStatus());
        self::assertSame('901', $exception->getError()->getErrorCode());
        self::assertSame('security', $exception->getError()->getErrorType());
    }
}
