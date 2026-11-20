<?php

namespace Adyen\Tests\Unit\Transfers;

use Adyen\Exception\AdyenException;
use Adyen\Model\Transfers\Amount;
use Adyen\Model\Transfers\CashOut;
use Adyen\Model\Transfers\CashOutInfo;
use Adyen\Model\Transfers\CashOutInfoCounterparty;
use Adyen\Model\Transfers\CashOutTransfer;
use Adyen\Model\Transfers\Fee;
use Adyen\Service\Transfers\CashOutApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Promise\PromiseInterface;

class CashOutApiTest extends BaseTest
{
    public function testInitiateCashoutSuccessOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/cashout-success.json',
            200,
            $container
        );
        $service = new CashOutApi($this->createConfiguration(), $client);

        $requestModel = (new CashOutInfo())
            ->setAmount((new Amount())
                ->setCurrency('EUR')
                ->setValue(1500))
            ->setCounterparty((new CashOutInfoCounterparty())
                ->setTransferInstrumentId('TRANSFER_INSTRUMENT_01'))
            ->setDescription('Cash out funds')
            ->setFee((new Fee())
                ->setAmount((new Amount())
                    ->setCurrency('EUR')
                    ->setValue(25)))
            ->setId('CASHOUT_01')
            ->setInstructingBalanceAccountId('BAB8B2C3D4E5F6G7H8D9J6GD4')
            ->setReferenceForBeneficiary('CASHOUT_REFERENCE')
            ->setTransferInstrumentId('TRANSFER_INSTRUMENT_01');

        [$response, $statusCode, $headers] = $service->initiateCashoutWithHttpInfo($requestModel);

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame('https://balanceplatform-api-test.adyen.com/btl/v4/cashouts', (string) $request->getUri());
        self::assertJsonStringEqualsJsonString(
            json_encode($this->initiateCashoutRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame(200, $statusCode);
        self::assertEmpty($headers);
        self::assertInstanceOf(CashOut::class, $response);
        self::assertSame('CASHOUT_01', $response->getId());
        $amount = $response->getAmount();
        self::assertInstanceOf(Amount::class, $amount);
        self::assertSame('EUR', $amount->getCurrency());
        self::assertSame(1500, $amount->getValue());
        $counterparty = $response->getCounterparty();
        self::assertInstanceOf(CashOutInfoCounterparty::class, $counterparty);
        self::assertSame('TRANSFER_INSTRUMENT_01', $counterparty->getTransferInstrumentId());
        self::assertSame('Cash out funds', $response->getDescription());
        $fee = $response->getFee();
        self::assertInstanceOf(Fee::class, $fee);
        $amount1 = $fee->getAmount();
        self::assertInstanceOf(Amount::class, $amount1);
        self::assertSame('EUR', $amount1->getCurrency());
        self::assertSame(25, $amount1->getValue());
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $response->getInstructingBalanceAccountId());
        self::assertSame('CASHOUT_REFERENCE', $response->getReferenceForBeneficiary());
        self::assertSame('TRANSFER_INSTRUMENT_01', $response->getTransferInstrumentId());
        self::assertCount(2, $response->getTransfers());
        $cashOutTransfer0 = $response->getTransfers()[0];
        self::assertInstanceOf(CashOutTransfer::class, $cashOutTransfer0);
        self::assertSame('CASHOUT_REPAYMENT_01', $cashOutTransfer0->getId());
        $amount2 = $cashOutTransfer0->getAmount();
        self::assertInstanceOf(Amount::class, $amount2);
        self::assertSame('EUR', $amount2->getCurrency());
        self::assertSame(1500, $amount2->getValue());
        self::assertSame(CashOutTransfer::TYPE_CASHOUT_REPAYMENT, $cashOutTransfer0->getType());
        $cashOutTransfer1 = $response->getTransfers()[1];
        self::assertInstanceOf(CashOutTransfer::class, $cashOutTransfer1);
        self::assertSame('CASHOUT_FEE_01', $cashOutTransfer1->getId());
        $amount3 = $cashOutTransfer1->getAmount();
        self::assertInstanceOf(Amount::class, $amount3);
        self::assertSame('EUR', $amount3->getCurrency());
        self::assertSame(25, $amount3->getValue());
        self::assertSame(CashOutTransfer::TYPE_CASHOUT_FEE, $cashOutTransfer1->getType());
    }

    public function testInitiateCashoutSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/cashout-success.json',
            200,
            $container
        );
        $service = new CashOutApi($this->createLiveConfiguration(), $client);

        $service->initiateCashout(new CashOutInfo($this->initiateCashoutRequestData()));

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame('https://balanceplatform-api-live.adyen.com/btl/v4/cashouts', (string) $request->getUri());
    }

    public function testInitiateCashoutOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new CashOutApi($this->createConfiguration(), $client);

        try {
            $service->initiateCashout(new CashOutInfo($this->initiateCashoutRequestData()));
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    public function testInitiateCashoutSuccessWithArray(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/cashout-success.json',
            200,
            $container
        );
        $service = new CashOutApi($this->createConfiguration(), $client);

        $params = $this->initiateCashoutRequestData();

        $response = $service->initiateCashout(new CashOutInfo($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('CASHOUT_01', $response['id']);
        $arrayAmount = $response['amount'];
        self::assertSame('EUR', $arrayAmount['currency']);
        self::assertSame(1500, $arrayAmount['value']);
        $arrayCounterparty = $response['counterparty'];
        self::assertSame('TRANSFER_INSTRUMENT_01', $arrayCounterparty['transferInstrumentId']);
        self::assertSame('Cash out funds', $response['description']);
        $arrayFee = $response['fee'];
        $arrayAmount1 = $arrayFee['amount'];
        self::assertSame('EUR', $arrayAmount1['currency']);
        self::assertSame(25, $arrayAmount1['value']);
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $response['instructingBalanceAccountId']);
        self::assertSame('CASHOUT_REFERENCE', $response['referenceForBeneficiary']);
        self::assertSame('TRANSFER_INSTRUMENT_01', $response['transferInstrumentId']);
        self::assertCount(2, $response['transfers']);
        $arrayCashOutTransfer0 = $response['transfers'][0];
        self::assertSame('CASHOUT_REPAYMENT_01', $arrayCashOutTransfer0['id']);
        $arrayAmount2 = $arrayCashOutTransfer0['amount'];
        self::assertSame('EUR', $arrayAmount2['currency']);
        self::assertSame(1500, $arrayAmount2['value']);
        self::assertSame(CashOutTransfer::TYPE_CASHOUT_REPAYMENT, $arrayCashOutTransfer0['type']);
        $arrayCashOutTransfer1 = $response['transfers'][1];
        self::assertSame('CASHOUT_FEE_01', $arrayCashOutTransfer1['id']);
        $arrayAmount3 = $arrayCashOutTransfer1['amount'];
        self::assertSame('EUR', $arrayAmount3['currency']);
        self::assertSame(25, $arrayAmount3['value']);
        self::assertSame(CashOutTransfer::TYPE_CASHOUT_FEE, $arrayCashOutTransfer1['type']);

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('CASHOUT_01', $resultArray['id']);
        $dataAmount = $resultArray['amount'];
        self::assertSame('EUR', $dataAmount['currency']);
        self::assertSame(1500, $dataAmount['value']);
        $dataCounterparty = $resultArray['counterparty'];
        self::assertSame('TRANSFER_INSTRUMENT_01', $dataCounterparty['transferInstrumentId']);
        self::assertSame('Cash out funds', $resultArray['description']);
        $dataFee = $resultArray['fee'];
        $dataAmount1 = $dataFee['amount'];
        self::assertSame('EUR', $dataAmount1['currency']);
        self::assertSame(25, $dataAmount1['value']);
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $resultArray['instructingBalanceAccountId']);
        self::assertSame('CASHOUT_REFERENCE', $resultArray['referenceForBeneficiary']);
        self::assertSame('TRANSFER_INSTRUMENT_01', $resultArray['transferInstrumentId']);
        self::assertCount(2, $resultArray['transfers']);
        $dataCashOutTransfer0 = $resultArray['transfers'][0];
        self::assertSame('CASHOUT_REPAYMENT_01', $dataCashOutTransfer0['id']);
        $dataAmount2 = $dataCashOutTransfer0['amount'];
        self::assertSame('EUR', $dataAmount2['currency']);
        self::assertSame(1500, $dataAmount2['value']);
        self::assertSame(CashOutTransfer::TYPE_CASHOUT_REPAYMENT, $dataCashOutTransfer0['type']);
        $dataCashOutTransfer1 = $resultArray['transfers'][1];
        self::assertSame('CASHOUT_FEE_01', $dataCashOutTransfer1['id']);
        $dataAmount3 = $dataCashOutTransfer1['amount'];
        self::assertSame('EUR', $dataAmount3['currency']);
        self::assertSame(25, $dataAmount3['value']);
        self::assertSame(CashOutTransfer::TYPE_CASHOUT_FEE, $dataCashOutTransfer1['type']);
    }

    private function initiateCashoutRequestData(): array
    {
        return [
            'amount' => [
                'currency' => 'EUR',
                'value' => 1500,
            ],
            'counterparty' => [
                'transferInstrumentId' => 'TRANSFER_INSTRUMENT_01',
            ],
            'description' => 'Cash out funds',
            'fee' => [
                'amount' => [
                    'currency' => 'EUR',
                    'value' => 25,
                ],
            ],
            'id' => 'CASHOUT_01',
            'instructingBalanceAccountId' => 'BAB8B2C3D4E5F6G7H8D9J6GD4',
            'referenceForBeneficiary' => 'CASHOUT_REFERENCE',
            'transferInstrumentId' => 'TRANSFER_INSTRUMENT_01',
        ];
    }

    public function testInitiateCashoutAsyncSuccessWithHttpInfo(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/cashout-success.json',
            200,
            $container
        );
        $service = new CashOutApi($this->createConfiguration(), $client);

        $promise = $service->initiateCashoutAsyncWithHttpInfo(new CashOutInfo($this->initiateCashoutRequestData()));

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertSame(200, $statusCode);
        self::assertEmpty($headers);
        self::assertInstanceOf(CashOut::class, $response);
        self::assertSame('CASHOUT_01', $response->getId());
        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame('https://balanceplatform-api-test.adyen.com/btl/v4/cashouts', (string) $request->getUri());
        self::assertJsonStringEqualsJsonString(
            json_encode($this->initiateCashoutRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
    }

    public function testInitiateCashoutAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new CashOutApi($this->createConfiguration(), $client);

        try {
            $service->initiateCashoutAsync(new CashOutInfo($this->initiateCashoutRequestData()))->wait();
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
