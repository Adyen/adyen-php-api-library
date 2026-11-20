<?php

namespace Adyen\Tests\Unit\Transfers;

use Adyen\Exception\AdyenException;
use Adyen\Model\Transfers\Address;
use Adyen\Model\Transfers\Amount;
use Adyen\Model\Transfers\ApproveTransfersRequest;
use Adyen\Model\Transfers\BankAccountV3;
use Adyen\Model\Transfers\CancelTransfersRequest;
use Adyen\Model\Transfers\CounterpartyInfoV3;
use Adyen\Model\Transfers\CounterpartyV3;
use Adyen\Model\Transfers\FindTransfersResponse;
use Adyen\Model\Transfers\Link;
use Adyen\Model\Transfers\Links;
use Adyen\Model\Transfers\NumberAndBicAccountIdentification;
use Adyen\Model\Transfers\PartyIdentification;
use Adyen\Model\Transfers\ResourceReference;
use Adyen\Model\Transfers\ReturnTransferRequest;
use Adyen\Model\Transfers\ReturnTransferResponse;
use Adyen\Model\Transfers\Transfer;
use Adyen\Model\Transfers\TransferData;
use Adyen\Model\Transfers\TransferInfo;
use Adyen\RequestOptions;
use Adyen\Service\Transfers\TransfersApi;
use Adyen\Tests\Unit\BaseTest;
use DateTime;
use GuzzleHttp\Promise\PromiseInterface;

class TransfersApiTest extends BaseTest
{
    public function testApproveInitiatedTransfersSuccessOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            null,
            204,
            $container
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        $requestModel = (new ApproveTransfersRequest())
            ->setTransferIds(['1W1UG35U8A9J5ZLG', 'TRANSFER_02']);

        [$response, $statusCode, $headers] = $service->approveInitiatedTransfersWithHttpInfo($requestModel);

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transfers/approve',
            (string) $request->getUri()
        );
        self::assertJsonStringEqualsJsonString(
            json_encode($this->approveInitiatedTransfersRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame(204, $statusCode);
        self::assertEmpty($headers);
        self::assertNull($response);
    }

    public function testApproveInitiatedTransfersSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            null,
            204,
            $container
        );
        $service = new TransfersApi($this->createLiveConfiguration(), $client);

        $service->approveInitiatedTransfers(new ApproveTransfersRequest($this->approveInitiatedTransfersRequestData()));

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-live.adyen.com/btl/v4/transfers/approve',
            (string) $request->getUri()
        );
    }

    public function testApproveInitiatedTransfersOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        try {
            $service->approveInitiatedTransfers(
                new ApproveTransfersRequest($this->approveInitiatedTransfersRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    private function approveInitiatedTransfersRequestData(): array
    {
        return [
            'transferIds' => [
                '1W1UG35U8A9J5ZLG',
                'TRANSFER_02',
            ],
        ];
    }

    public function testCancelInitiatedTransfersSuccessOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            null,
            204,
            $container
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        $requestModel = (new CancelTransfersRequest())
            ->setTransferIds(['1W1UG35U8A9J5ZLG', 'TRANSFER_02']);

        [$response, $statusCode, $headers] = $service->cancelInitiatedTransfersWithHttpInfo($requestModel);

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transfers/cancel',
            (string) $request->getUri()
        );
        self::assertJsonStringEqualsJsonString(
            json_encode($this->cancelInitiatedTransfersRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame(204, $statusCode);
        self::assertEmpty($headers);
        self::assertNull($response);
    }

    public function testCancelInitiatedTransfersSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            null,
            204,
            $container
        );
        $service = new TransfersApi($this->createLiveConfiguration(), $client);

        $service->cancelInitiatedTransfers(new CancelTransfersRequest($this->cancelInitiatedTransfersRequestData()));

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-live.adyen.com/btl/v4/transfers/cancel',
            (string) $request->getUri()
        );
    }

    public function testCancelInitiatedTransfersOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        try {
            $service->cancelInitiatedTransfers(
                new CancelTransfersRequest($this->cancelInitiatedTransfersRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    private function cancelInitiatedTransfersRequestData(): array
    {
        return [
            'transferIds' => [
                '1W1UG35U8A9J5ZLG',
                'TRANSFER_02',
            ],
        ];
    }

    public function testGetAllTransfersSuccessOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/all-transfers-get.json',
            200,
            $container
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        $response = $service->getAllTransfers(
            new DateTime('2021-05-30T15:07:40Z'),
            new DateTime('2021-05-31T15:07:40Z'),
            balancePlatform: 'balancePlatform',
            accountHolderId: 'accountHolderId',
            balanceAccountId: 'balanceAccountId',
            paymentInstrumentId: 'paymentInstrumentId',
            reference: 'Transfer reference + 1',
            category: 'bank',
            sortOrder: 'asc',
            cursor: 'next/page+token',
            limit: 25
        );

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transfers',
            (string) $request->getUri()->withQuery('')
        );
        parse_str($request->getUri()->getQuery(), $query);
        self::assertEquals($this->getAllTransfersQueryData(), $query);
        self::assertStringContainsString(
            'createdSince=2021-05-30T15%3A07%3A40%2B00%3A00',
            $request->getUri()->getQuery()
        );
        self::assertInstanceOf(FindTransfersResponse::class, $response);
        self::assertCount(1, $response->getData());
        $transferData0 = $response->getData()[0];
        self::assertInstanceOf(TransferData::class, $transferData0);
        self::assertSame('1W1UG35U8A9J5ZLG', $transferData0->getId());
        $amount = $transferData0->getAmount();
        self::assertInstanceOf(Amount::class, $amount);
        self::assertSame('EUR', $amount->getCurrency());
        self::assertSame(110000, $amount->getValue());
        $accountHolder = $transferData0->getAccountHolder();
        self::assertInstanceOf(ResourceReference::class, $accountHolder);
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $accountHolder->getId());
        $balanceAccount = $transferData0->getBalanceAccount();
        self::assertInstanceOf(ResourceReference::class, $balanceAccount);
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $balanceAccount->getId());
        self::assertSame('YOUR_BALANCE_PLATFORM', $transferData0->getBalancePlatform());
        self::assertSame(TransferData::CATEGORY_BANK, $transferData0->getCategory());
        self::assertSame(TransferData::DIRECTION_OUTGOING, $transferData0->getDirection());
        self::assertInstanceOf(DateTime::class, $transferData0->getCreatedAt());
        self::assertEquals(new DateTime('2022-03-11T11:21:24+01:00'), $transferData0->getCreatedAt());
        self::assertInstanceOf(DateTime::class, $transferData0->getUpdatedAt());
        self::assertEquals(new DateTime('2022-03-11T11:22:24+01:00'), $transferData0->getUpdatedAt());
        self::assertSame('Your internal reference for the transfer', $transferData0->getReference());
        self::assertSame(TransferData::STATUS_AUTHORISED, $transferData0->getStatus());
        $links = $response->getLinks();
        self::assertInstanceOf(Links::class, $links);
        $next = $links->getNext();
        self::assertInstanceOf(Link::class, $next);
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transfers?cursor=next-page',
            $next->getHref()
        );

        self::assertCount(1, $response['data']);
        $arrayTransferData0 = $response['data'][0];
        self::assertSame('1W1UG35U8A9J5ZLG', $arrayTransferData0['id']);
        $arrayAmount = $arrayTransferData0['amount'];
        self::assertSame('EUR', $arrayAmount['currency']);
        self::assertSame(110000, $arrayAmount['value']);
        $arrayAccountHolder = $arrayTransferData0['accountHolder'];
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $arrayAccountHolder['id']);
        $arrayBalanceAccount = $arrayTransferData0['balanceAccount'];
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $arrayBalanceAccount['id']);
        self::assertSame('YOUR_BALANCE_PLATFORM', $arrayTransferData0['balancePlatform']);
        self::assertSame(TransferData::CATEGORY_BANK, $arrayTransferData0['category']);
        self::assertSame(TransferData::DIRECTION_OUTGOING, $arrayTransferData0['direction']);
        self::assertInstanceOf(DateTime::class, $arrayTransferData0['createdAt']);
        self::assertEquals(new DateTime('2022-03-11T11:21:24+01:00'), $arrayTransferData0['createdAt']);
        self::assertInstanceOf(DateTime::class, $arrayTransferData0['updatedAt']);
        self::assertEquals(new DateTime('2022-03-11T11:22:24+01:00'), $arrayTransferData0['updatedAt']);
        self::assertSame('Your internal reference for the transfer', $arrayTransferData0['reference']);
        self::assertSame(TransferData::STATUS_AUTHORISED, $arrayTransferData0['status']);
        $arrayLinks = $response['links'];
        $arrayNext = $arrayLinks['next'];
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transfers?cursor=next-page',
            $arrayNext['href']
        );

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertCount(1, $resultArray['data']);
        $dataTransferData0 = $resultArray['data'][0];
        self::assertSame('1W1UG35U8A9J5ZLG', $dataTransferData0['id']);
        $dataAmount = $dataTransferData0['amount'];
        self::assertSame('EUR', $dataAmount['currency']);
        self::assertSame(110000, $dataAmount['value']);
        $dataAccountHolder = $dataTransferData0['accountHolder'];
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $dataAccountHolder['id']);
        $dataBalanceAccount = $dataTransferData0['balanceAccount'];
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $dataBalanceAccount['id']);
        self::assertSame('YOUR_BALANCE_PLATFORM', $dataTransferData0['balancePlatform']);
        self::assertSame(TransferData::CATEGORY_BANK, $dataTransferData0['category']);
        self::assertSame(TransferData::DIRECTION_OUTGOING, $dataTransferData0['direction']);
        self::assertSame('2022-03-11T11:21:24+01:00', $dataTransferData0['createdAt']);
        self::assertSame('2022-03-11T11:22:24+01:00', $dataTransferData0['updatedAt']);
        self::assertSame('Your internal reference for the transfer', $dataTransferData0['reference']);
        self::assertSame(TransferData::STATUS_AUTHORISED, $dataTransferData0['status']);
        $dataLinks = $resultArray['links'];
        $dataNext = $dataLinks['next'];
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transfers?cursor=next-page',
            $dataNext['href']
        );
    }

    public function testGetAllTransfersSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/all-transfers-get.json',
            200,
            $container
        );
        $service = new TransfersApi($this->createLiveConfiguration(), $client);

        $service->getAllTransfers(
            new DateTime('2021-05-30T15:07:40Z'),
            new DateTime('2021-05-31T15:07:40Z'),
            balancePlatform: 'balancePlatform',
            accountHolderId: 'accountHolderId',
            balanceAccountId: 'balanceAccountId',
            paymentInstrumentId: 'paymentInstrumentId',
            reference: 'Transfer reference + 1',
            category: 'bank',
            sortOrder: 'asc',
            cursor: 'next/page+token',
            limit: 25
        );

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-live.adyen.com/btl/v4/transfers',
            (string) $request->getUri()->withQuery('')
        );
        parse_str($request->getUri()->getQuery(), $query);
        self::assertEquals($this->getAllTransfersQueryData(), $query);
        self::assertStringContainsString(
            'createdSince=2021-05-30T15%3A07%3A40%2B00%3A00',
            $request->getUri()->getQuery()
        );
    }

    public function testGetAllTransfersOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        try {
            $service->getAllTransfers(
                new DateTime('2021-05-30T15:07:40Z'),
                new DateTime('2021-05-31T15:07:40Z'),
                balancePlatform: 'balancePlatform',
                accountHolderId: 'accountHolderId',
                balanceAccountId: 'balanceAccountId',
                paymentInstrumentId: 'paymentInstrumentId',
                reference: 'Transfer reference + 1',
                category: 'bank',
                sortOrder: 'asc',
                cursor: 'next/page+token',
                limit: 25
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    private function getAllTransfersQueryData(): array
    {
        return [
            'balancePlatform' => 'balancePlatform',
            'accountHolderId' => 'accountHolderId',
            'balanceAccountId' => 'balanceAccountId',
            'paymentInstrumentId' => 'paymentInstrumentId',
            'reference' => 'Transfer reference + 1',
            'category' => 'bank',
            'createdSince' => '2021-05-30T15:07:40+00:00',
            'createdUntil' => '2021-05-31T15:07:40+00:00',
            'sortOrder' => 'asc',
            'cursor' => 'next/page+token',
            'limit' => '25',
        ];
    }

    public function testGetTransferSuccessOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfer-get.json',
            200,
            $container
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        $response = $service->getTransfer('1W1UG35U8A9J5ZLG');

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transfers/1W1UG35U8A9J5ZLG',
            (string) $request->getUri()
        );
        self::assertInstanceOf(TransferData::class, $response);
        self::assertSame('1W1UG35U8A9J5ZLG', $response->getId());
        $amount = $response->getAmount();
        self::assertInstanceOf(Amount::class, $amount);
        self::assertSame('EUR', $amount->getCurrency());
        self::assertSame(110000, $amount->getValue());
        $accountHolder = $response->getAccountHolder();
        self::assertInstanceOf(ResourceReference::class, $accountHolder);
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $accountHolder->getId());
        $balanceAccount = $response->getBalanceAccount();
        self::assertInstanceOf(ResourceReference::class, $balanceAccount);
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $balanceAccount->getId());
        self::assertSame('YOUR_BALANCE_PLATFORM', $response->getBalancePlatform());
        self::assertSame(TransferData::CATEGORY_BANK, $response->getCategory());
        self::assertSame(TransferData::DIRECTION_OUTGOING, $response->getDirection());
        self::assertInstanceOf(DateTime::class, $response->getCreatedAt());
        self::assertEquals(new DateTime('2022-03-11T11:21:24+01:00'), $response->getCreatedAt());
        self::assertInstanceOf(DateTime::class, $response->getUpdatedAt());
        self::assertEquals(new DateTime('2022-03-11T11:22:24+01:00'), $response->getUpdatedAt());
        self::assertSame('Your internal reference for the transfer', $response->getReference());
        self::assertSame(TransferData::STATUS_AUTHORISED, $response->getStatus());

        self::assertSame('1W1UG35U8A9J5ZLG', $response['id']);
        $arrayAmount = $response['amount'];
        self::assertSame('EUR', $arrayAmount['currency']);
        self::assertSame(110000, $arrayAmount['value']);
        $arrayAccountHolder = $response['accountHolder'];
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $arrayAccountHolder['id']);
        $arrayBalanceAccount = $response['balanceAccount'];
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $arrayBalanceAccount['id']);
        self::assertSame('YOUR_BALANCE_PLATFORM', $response['balancePlatform']);
        self::assertSame(TransferData::CATEGORY_BANK, $response['category']);
        self::assertSame(TransferData::DIRECTION_OUTGOING, $response['direction']);
        self::assertInstanceOf(DateTime::class, $response['createdAt']);
        self::assertEquals(new DateTime('2022-03-11T11:21:24+01:00'), $response['createdAt']);
        self::assertInstanceOf(DateTime::class, $response['updatedAt']);
        self::assertEquals(new DateTime('2022-03-11T11:22:24+01:00'), $response['updatedAt']);
        self::assertSame('Your internal reference for the transfer', $response['reference']);
        self::assertSame(TransferData::STATUS_AUTHORISED, $response['status']);

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('1W1UG35U8A9J5ZLG', $resultArray['id']);
        $dataAmount = $resultArray['amount'];
        self::assertSame('EUR', $dataAmount['currency']);
        self::assertSame(110000, $dataAmount['value']);
        $dataAccountHolder = $resultArray['accountHolder'];
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $dataAccountHolder['id']);
        $dataBalanceAccount = $resultArray['balanceAccount'];
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $dataBalanceAccount['id']);
        self::assertSame('YOUR_BALANCE_PLATFORM', $resultArray['balancePlatform']);
        self::assertSame(TransferData::CATEGORY_BANK, $resultArray['category']);
        self::assertSame(TransferData::DIRECTION_OUTGOING, $resultArray['direction']);
        self::assertSame('2022-03-11T11:21:24+01:00', $resultArray['createdAt']);
        self::assertSame('2022-03-11T11:22:24+01:00', $resultArray['updatedAt']);
        self::assertSame('Your internal reference for the transfer', $resultArray['reference']);
        self::assertSame(TransferData::STATUS_AUTHORISED, $resultArray['status']);
    }

    public function testGetTransferSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfer-get.json',
            200,
            $container
        );
        $service = new TransfersApi($this->createLiveConfiguration(), $client);

        $service->getTransfer('1W1UG35U8A9J5ZLG');

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-live.adyen.com/btl/v4/transfers/1W1UG35U8A9J5ZLG',
            (string) $request->getUri()
        );
    }

    public function testGetTransferOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        try {
            $service->getTransfer('1W1UG35U8A9J5ZLG');
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    public function testReturnTransferSuccessOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/return-transfer-success.json',
            200,
            $container
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        $requestModel = (new ReturnTransferRequest())
            ->setAmount((new Amount())
                ->setCurrency('EUR')
                ->setValue(1500))
            ->setReference('RETURN_REFERENCE');

        $response = $service->returnTransfer('1W1UG35U8A9J5ZLG', $requestModel);

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transfers/1W1UG35U8A9J5ZLG/returns',
            (string) $request->getUri()
        );
        self::assertJsonStringEqualsJsonString(
            json_encode($this->returnTransferRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(ReturnTransferResponse::class, $response);
        self::assertSame('RETURN_01', $response->getId());
        self::assertSame('RETURN_REFERENCE', $response->getReference());
        self::assertSame(ReturnTransferResponse::STATUS_AUTHORISED, $response->getStatus());
        self::assertSame('1W1UG35U8A9J5ZLG', $response->getTransferId());
    }

    public function testReturnTransferSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/return-transfer-success.json',
            200,
            $container
        );
        $service = new TransfersApi($this->createLiveConfiguration(), $client);

        $service->returnTransfer('1W1UG35U8A9J5ZLG', new ReturnTransferRequest($this->returnTransferRequestData()));

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-live.adyen.com/btl/v4/transfers/1W1UG35U8A9J5ZLG/returns',
            (string) $request->getUri()
        );
    }

    public function testReturnTransferOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        try {
            $service->returnTransfer('1W1UG35U8A9J5ZLG', new ReturnTransferRequest($this->returnTransferRequestData()));
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    public function testReturnTransferSuccessWithArray(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/return-transfer-success.json',
            200,
            $container
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        $params = $this->returnTransferRequestData();

        $response = $service->returnTransfer('1W1UG35U8A9J5ZLG', new ReturnTransferRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('RETURN_01', $response['id']);
        self::assertSame('RETURN_REFERENCE', $response['reference']);
        self::assertSame(ReturnTransferResponse::STATUS_AUTHORISED, $response['status']);
        self::assertSame('1W1UG35U8A9J5ZLG', $response['transferId']);

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('RETURN_01', $resultArray['id']);
        self::assertSame('RETURN_REFERENCE', $resultArray['reference']);
        self::assertSame(ReturnTransferResponse::STATUS_AUTHORISED, $resultArray['status']);
        self::assertSame('1W1UG35U8A9J5ZLG', $resultArray['transferId']);
    }

    private function returnTransferRequestData(): array
    {
        return [
            'amount' => [
                'currency' => 'EUR',
                'value' => 1500,
            ],
            'reference' => 'RETURN_REFERENCE',
        ];
    }

    public function testTransferFundsSuccessOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfer-funds.json',
            200,
            $container
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        $requestModel = (new TransferInfo())
            ->setAmount((new Amount())
                ->setCurrency('EUR')
                ->setValue(110000))
            ->setBalanceAccountId('BAB8B2C3D4E5F6G7H8D9J6GD4')
            ->setCategory(TransferInfo::CATEGORY_BANK)
            ->setCounterparty((new CounterpartyInfoV3())
                ->setTransferInstrumentId('TRANSFER_INSTRUMENT_01'))
            ->setDescription('Your description for the transfer')
            ->setPriority(TransferInfo::PRIORITY_WIRE)
            ->setReference('Your internal reference for the transfer')
            ->setReferenceForBeneficiary('Your reference sent to the beneficiary');

        [$response, $statusCode, $headers] = $service->transferFundsWithHttpInfo($requestModel);

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame('https://balanceplatform-api-test.adyen.com/btl/v4/transfers', (string) $request->getUri());
        self::assertJsonStringEqualsJsonString(
            json_encode($this->transferFundsRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame(200, $statusCode);
        self::assertEmpty($headers);
        self::assertInstanceOf(Transfer::class, $response);
        self::assertSame('1W1UG35U8A9J5ZLG', $response->getId());
        $amount = $response->getAmount();
        self::assertInstanceOf(Amount::class, $amount);
        self::assertSame(110000, $amount->getValue());
        self::assertSame('EUR', $amount->getCurrency());
        self::assertSame(Transfer::CATEGORY_BANK, $response->getCategory());
        $counterparty = $response->getCounterparty();
        self::assertInstanceOf(CounterpartyV3::class, $counterparty);
        $bankAccount = $counterparty->getBankAccount();
        self::assertInstanceOf(BankAccountV3::class, $bankAccount);
        $accountHolder = $bankAccount->getAccountHolder();
        self::assertInstanceOf(PartyIdentification::class, $accountHolder);
        self::assertSame('A. Klaassen', $accountHolder->getFullName());
        $address = $accountHolder->getAddress();
        self::assertInstanceOf(Address::class, $address);
        self::assertSame('San Francisco', $address->getCity());
        self::assertSame('US', $address->getCountry());
        self::assertSame('94678', $address->getPostalCode());
        self::assertSame('CA', $address->getStateOrProvince());
        $accountIdentification = $bankAccount->getAccountIdentification();
        self::assertInstanceOf(NumberAndBicAccountIdentification::class, $accountIdentification);
        self::assertSame(NumberAndBicAccountIdentification::TYPE_NUMBER_AND_BIC, $accountIdentification->getType());
        self::assertSame('123456789', $accountIdentification->getAccountNumber());
        self::assertSame('BOFAUS3NXXX', $accountIdentification->getBic());
        self::assertSame('Your reference sent to the beneficiary', $response->getReferenceForBeneficiary());
        self::assertSame('Your internal reference for the transfer', $response->getReference());
        self::assertSame('Your description for the transfer', $response->getDescription());
        self::assertSame(Transfer::DIRECTION_OUTGOING, $response->getDirection());
        self::assertSame(Transfer::REASON_APPROVED, $response->getReason());
        self::assertSame(Transfer::STATUS_AUTHORISED, $response->getStatus());

        // Preserve the original empty-request scenario alongside the populated request above.
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfer-funds.json',
            200,
            $container
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        $response = $service->transferFunds(new TransferInfo());

        self::assertSame('1W1UG35U8A9J5ZLG', $response->getId());
        self::assertSame(Transfer::STATUS_AUTHORISED, $response->getStatus());
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transfers',
            (string) $container[0]['request']->getUri()
        );
    }

    public function testTransferFundsSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfer-funds.json',
            200,
            $container
        );
        $service = new TransfersApi($this->createLiveConfiguration(), $client);

        $service->transferFunds(new TransferInfo($this->transferFundsRequestData()));

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame('https://balanceplatform-api-live.adyen.com/btl/v4/transfers', (string) $request->getUri());
    }

    public function testTransferFundsOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        try {
            $service->transferFunds(new TransferInfo($this->transferFundsRequestData()));
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    public function testTransferFundsForwardsIdempotencyKey(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfer-funds.json',
            200,
            $container
        );
        $service = new TransfersApi($this->createConfiguration(), $client);
        $requestOptions = (new RequestOptions())->idempotencyKey('transfer-funds-idempotency-key');

        $service->transferFunds(new TransferInfo($this->transferFundsRequestData()), $requestOptions);

        self::assertSame(
            'transfer-funds-idempotency-key',
            $container[0]['request']->getHeaderLine('Idempotency-Key')
        );
    }

    public function testTransferFundsSuccessWithArray(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfer-funds.json',
            200,
            $container
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        $params = $this->transferFundsRequestData();

        $response = $service->transferFunds(new TransferInfo($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('1W1UG35U8A9J5ZLG', $response['id']);
        $arrayAmount = $response['amount'];
        self::assertSame(110000, $arrayAmount['value']);
        self::assertSame('EUR', $arrayAmount['currency']);
        self::assertSame(Transfer::CATEGORY_BANK, $response['category']);
        $arrayCounterparty = $response['counterparty'];
        $arrayBankAccount = $arrayCounterparty['bankAccount'];
        $arrayAccountHolder = $arrayBankAccount['accountHolder'];
        self::assertSame('A. Klaassen', $arrayAccountHolder['fullName']);
        $arrayAddress = $arrayAccountHolder['address'];
        self::assertSame('San Francisco', $arrayAddress['city']);
        self::assertSame('US', $arrayAddress['country']);
        self::assertSame('94678', $arrayAddress['postalCode']);
        self::assertSame('CA', $arrayAddress['stateOrProvince']);
        $arrayAccountIdentification = $arrayBankAccount['accountIdentification'];
        self::assertSame(NumberAndBicAccountIdentification::TYPE_NUMBER_AND_BIC, $arrayAccountIdentification['type']);
        self::assertSame('123456789', $arrayAccountIdentification['accountNumber']);
        self::assertSame('BOFAUS3NXXX', $arrayAccountIdentification['bic']);
        self::assertSame('Your reference sent to the beneficiary', $response['referenceForBeneficiary']);
        self::assertSame('Your internal reference for the transfer', $response['reference']);
        self::assertSame('Your description for the transfer', $response['description']);
        self::assertSame(Transfer::DIRECTION_OUTGOING, $response['direction']);
        self::assertSame(Transfer::REASON_APPROVED, $response['reason']);
        self::assertSame(Transfer::STATUS_AUTHORISED, $response['status']);

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('1W1UG35U8A9J5ZLG', $resultArray['id']);
        $dataAmount = $resultArray['amount'];
        self::assertSame(110000, $dataAmount['value']);
        self::assertSame('EUR', $dataAmount['currency']);
        self::assertSame(Transfer::CATEGORY_BANK, $resultArray['category']);
        $dataCounterparty = $resultArray['counterparty'];
        $dataBankAccount = $dataCounterparty['bankAccount'];
        $dataAccountHolder = $dataBankAccount['accountHolder'];
        self::assertSame('A. Klaassen', $dataAccountHolder['fullName']);
        $dataAddress = $dataAccountHolder['address'];
        self::assertSame('San Francisco', $dataAddress['city']);
        self::assertSame('US', $dataAddress['country']);
        self::assertSame('94678', $dataAddress['postalCode']);
        self::assertSame('CA', $dataAddress['stateOrProvince']);
        $dataAccountIdentification = $dataBankAccount['accountIdentification'];
        self::assertSame(NumberAndBicAccountIdentification::TYPE_NUMBER_AND_BIC, $dataAccountIdentification['type']);
        self::assertSame('123456789', $dataAccountIdentification['accountNumber']);
        self::assertSame('BOFAUS3NXXX', $dataAccountIdentification['bic']);
        self::assertSame('Your reference sent to the beneficiary', $resultArray['referenceForBeneficiary']);
        self::assertSame('Your internal reference for the transfer', $resultArray['reference']);
        self::assertSame('Your description for the transfer', $resultArray['description']);
        self::assertSame(Transfer::DIRECTION_OUTGOING, $resultArray['direction']);
        self::assertSame(Transfer::REASON_APPROVED, $resultArray['reason']);
        self::assertSame(Transfer::STATUS_AUTHORISED, $resultArray['status']);
    }

    private function transferFundsRequestData(): array
    {
        return [
            'amount' => [
                'currency' => 'EUR',
                'value' => 110000,
            ],
            'balanceAccountId' => 'BAB8B2C3D4E5F6G7H8D9J6GD4',
            'category' => 'bank',
            'counterparty' => [
                'transferInstrumentId' => 'TRANSFER_INSTRUMENT_01',
            ],
            'description' => 'Your description for the transfer',
            'priority' => 'wire',
            'reference' => 'Your internal reference for the transfer',
            'referenceForBeneficiary' => 'Your reference sent to the beneficiary',
        ];
    }

    public function testApproveInitiatedTransfersAsyncSuccessWithHttpInfo(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            null,
            204,
            $container
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        $promise = $service->approveInitiatedTransfersAsyncWithHttpInfo(
            new ApproveTransfersRequest($this->approveInitiatedTransfersRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertSame(204, $statusCode);
        self::assertEmpty($headers);
        self::assertNull($response);
        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/transfers/approve',
            (string) $request->getUri()
        );
        self::assertJsonStringEqualsJsonString(
            json_encode($this->approveInitiatedTransfersRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
    }

    public function testReturnTransferAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new TransfersApi($this->createConfiguration(), $client);

        try {
            $service->returnTransferAsync(
                '1W1UG35U8A9J5ZLG',
                new ReturnTransferRequest($this->returnTransferRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
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
