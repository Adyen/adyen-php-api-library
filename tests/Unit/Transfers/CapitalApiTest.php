<?php

namespace Adyen\Tests\Unit\Transfers;

use Adyen\Exception\AdyenException;
use Adyen\Model\Transfers\Amount;
use Adyen\Model\Transfers\CapitalBalance;
use Adyen\Model\Transfers\CapitalGrant;
use Adyen\Model\Transfers\CapitalGrantInfo;
use Adyen\Model\Transfers\CapitalGrants;
use Adyen\Model\Transfers\Fee;
use Adyen\Model\Transfers\GrantCounterparty;
use Adyen\Model\Transfers\GrantInfoCounterparty;
use Adyen\Model\Transfers\Repayment;
use Adyen\Model\Transfers\RepaymentTerm;
use Adyen\Model\Transfers\ThresholdRepayment;
use Adyen\Service\Transfers\CapitalApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Promise\PromiseInterface;

class CapitalApiTest extends BaseTest
{
    public function testGetCapitalAccountSuccessOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/capital-grants-success.json',
            200,
            $container
        );
        $service = new CapitalApi($this->createConfiguration(), $client);

        $response = $service->getCapitalAccount(counterpartyAccountHolderId: 'AHA1B2C3D4E5F6G7H8I9J0');

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/grants',
            (string) $request->getUri()->withQuery('')
        );
        parse_str($request->getUri()->getQuery(), $query);
        self::assertEquals($this->getCapitalAccountQueryData(), $query);
        self::assertInstanceOf(CapitalGrants::class, $response);
        self::assertCount(1, $response->getGrants());
        $capitalGrant0 = $response->getGrants()[0];
        self::assertInstanceOf(CapitalGrant::class, $capitalGrant0);
        self::assertSame('GRANT_01', $capitalGrant0->getId());
        self::assertSame('GRANT_ACCOUNT_01', $capitalGrant0->getGrantAccountId());
        self::assertSame('GRANT_OFFER_01', $capitalGrant0->getGrantOfferId());
        $amount = $capitalGrant0->getAmount();
        self::assertInstanceOf(Amount::class, $amount);
        self::assertSame('EUR', $amount->getCurrency());
        self::assertSame(10000, $amount->getValue());
        $fee = $capitalGrant0->getFee();
        self::assertInstanceOf(Fee::class, $fee);
        $amount1 = $fee->getAmount();
        self::assertInstanceOf(Amount::class, $amount1);
        self::assertSame('EUR', $amount1->getCurrency());
        self::assertSame(500, $amount1->getValue());
        $balances = $capitalGrant0->getBalances();
        self::assertInstanceOf(CapitalBalance::class, $balances);
        self::assertSame('EUR', $balances->getCurrency());
        self::assertSame(500, $balances->getFee());
        self::assertSame(10000, $balances->getPrincipal());
        self::assertSame(10500, $balances->getTotal());
        $counterparty = $capitalGrant0->getCounterparty();
        self::assertInstanceOf(GrantCounterparty::class, $counterparty);
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $counterparty->getAccountHolderId());
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $counterparty->getBalanceAccountId());
        $repayment = $capitalGrant0->getRepayment();
        self::assertInstanceOf(Repayment::class, $repayment);
        self::assertSame(1000, $repayment->getBasisPoints());
        $term = $repayment->getTerm();
        self::assertInstanceOf(RepaymentTerm::class, $term);
        self::assertSame(90, $term->getEstimatedDays());
        self::assertSame(180, $term->getMaximumDays());
        $threshold = $repayment->getThreshold();
        self::assertInstanceOf(ThresholdRepayment::class, $threshold);
        $amount2 = $threshold->getAmount();
        self::assertInstanceOf(Amount::class, $amount2);
        self::assertSame('EUR', $amount2->getCurrency());
        self::assertSame(100, $amount2->getValue());
        self::assertSame(CapitalGrant::STATUS_ACTIVE, $capitalGrant0->getStatus());

        self::assertCount(1, $response['grants']);
        $arrayCapitalGrant0 = $response['grants'][0];
        self::assertSame('GRANT_01', $arrayCapitalGrant0['id']);
        self::assertSame('GRANT_ACCOUNT_01', $arrayCapitalGrant0['grantAccountId']);
        self::assertSame('GRANT_OFFER_01', $arrayCapitalGrant0['grantOfferId']);
        $arrayAmount = $arrayCapitalGrant0['amount'];
        self::assertSame('EUR', $arrayAmount['currency']);
        self::assertSame(10000, $arrayAmount['value']);
        $arrayFee = $arrayCapitalGrant0['fee'];
        $arrayAmount1 = $arrayFee['amount'];
        self::assertSame('EUR', $arrayAmount1['currency']);
        self::assertSame(500, $arrayAmount1['value']);
        $arrayBalances = $arrayCapitalGrant0['balances'];
        self::assertSame('EUR', $arrayBalances['currency']);
        self::assertSame(500, $arrayBalances['fee']);
        self::assertSame(10000, $arrayBalances['principal']);
        self::assertSame(10500, $arrayBalances['total']);
        $arrayCounterparty = $arrayCapitalGrant0['counterparty'];
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $arrayCounterparty['accountHolderId']);
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $arrayCounterparty['balanceAccountId']);
        $arrayRepayment = $arrayCapitalGrant0['repayment'];
        self::assertSame(1000, $arrayRepayment['basisPoints']);
        $arrayTerm = $arrayRepayment['term'];
        self::assertSame(90, $arrayTerm['estimatedDays']);
        self::assertSame(180, $arrayTerm['maximumDays']);
        $arrayThreshold = $arrayRepayment['threshold'];
        $arrayAmount2 = $arrayThreshold['amount'];
        self::assertSame('EUR', $arrayAmount2['currency']);
        self::assertSame(100, $arrayAmount2['value']);
        self::assertSame(CapitalGrant::STATUS_ACTIVE, $arrayCapitalGrant0['status']);

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertCount(1, $resultArray['grants']);
        $dataCapitalGrant0 = $resultArray['grants'][0];
        self::assertSame('GRANT_01', $dataCapitalGrant0['id']);
        self::assertSame('GRANT_ACCOUNT_01', $dataCapitalGrant0['grantAccountId']);
        self::assertSame('GRANT_OFFER_01', $dataCapitalGrant0['grantOfferId']);
        $dataAmount = $dataCapitalGrant0['amount'];
        self::assertSame('EUR', $dataAmount['currency']);
        self::assertSame(10000, $dataAmount['value']);
        $dataFee = $dataCapitalGrant0['fee'];
        $dataAmount1 = $dataFee['amount'];
        self::assertSame('EUR', $dataAmount1['currency']);
        self::assertSame(500, $dataAmount1['value']);
        $dataBalances = $dataCapitalGrant0['balances'];
        self::assertSame('EUR', $dataBalances['currency']);
        self::assertSame(500, $dataBalances['fee']);
        self::assertSame(10000, $dataBalances['principal']);
        self::assertSame(10500, $dataBalances['total']);
        $dataCounterparty = $dataCapitalGrant0['counterparty'];
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $dataCounterparty['accountHolderId']);
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $dataCounterparty['balanceAccountId']);
        $dataRepayment = $dataCapitalGrant0['repayment'];
        self::assertSame(1000, $dataRepayment['basisPoints']);
        $dataTerm = $dataRepayment['term'];
        self::assertSame(90, $dataTerm['estimatedDays']);
        self::assertSame(180, $dataTerm['maximumDays']);
        $dataThreshold = $dataRepayment['threshold'];
        $dataAmount2 = $dataThreshold['amount'];
        self::assertSame('EUR', $dataAmount2['currency']);
        self::assertSame(100, $dataAmount2['value']);
        self::assertSame(CapitalGrant::STATUS_ACTIVE, $dataCapitalGrant0['status']);
    }

    public function testGetCapitalAccountSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/capital-grants-success.json',
            200,
            $container
        );
        $service = new CapitalApi($this->createLiveConfiguration(), $client);

        $service->getCapitalAccount(counterpartyAccountHolderId: 'AHA1B2C3D4E5F6G7H8I9J0');

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-live.adyen.com/btl/v4/grants',
            (string) $request->getUri()->withQuery('')
        );
        parse_str($request->getUri()->getQuery(), $query);
        self::assertEquals($this->getCapitalAccountQueryData(), $query);
    }

    public function testGetCapitalAccountOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new CapitalApi($this->createConfiguration(), $client);

        try {
            $service->getCapitalAccount(counterpartyAccountHolderId: 'AHA1B2C3D4E5F6G7H8I9J0');
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    private function getCapitalAccountQueryData(): array
    {
        return [
            'counterpartyAccountHolderId' => 'AHA1B2C3D4E5F6G7H8I9J0',
        ];
    }

    public function testGetGrantReferenceDetailsSuccessOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/capital-grant-success.json',
            200,
            $container
        );
        $service = new CapitalApi($this->createConfiguration(), $client);

        $response = $service->getGrantReferenceDetails('GRANT_01');

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/btl/v4/grants/GRANT_01',
            (string) $request->getUri()
        );
        self::assertInstanceOf(CapitalGrant::class, $response);
        self::assertSame('GRANT_01', $response->getId());
        self::assertSame('GRANT_ACCOUNT_01', $response->getGrantAccountId());
        self::assertSame('GRANT_OFFER_01', $response->getGrantOfferId());
        $amount = $response->getAmount();
        self::assertInstanceOf(Amount::class, $amount);
        self::assertSame('EUR', $amount->getCurrency());
        self::assertSame(10000, $amount->getValue());
        $fee = $response->getFee();
        self::assertInstanceOf(Fee::class, $fee);
        $amount1 = $fee->getAmount();
        self::assertInstanceOf(Amount::class, $amount1);
        self::assertSame('EUR', $amount1->getCurrency());
        self::assertSame(500, $amount1->getValue());
        $balances = $response->getBalances();
        self::assertInstanceOf(CapitalBalance::class, $balances);
        self::assertSame('EUR', $balances->getCurrency());
        self::assertSame(500, $balances->getFee());
        self::assertSame(10000, $balances->getPrincipal());
        self::assertSame(10500, $balances->getTotal());
        $counterparty = $response->getCounterparty();
        self::assertInstanceOf(GrantCounterparty::class, $counterparty);
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $counterparty->getAccountHolderId());
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $counterparty->getBalanceAccountId());
        $repayment = $response->getRepayment();
        self::assertInstanceOf(Repayment::class, $repayment);
        self::assertSame(1000, $repayment->getBasisPoints());
        $term = $repayment->getTerm();
        self::assertInstanceOf(RepaymentTerm::class, $term);
        self::assertSame(90, $term->getEstimatedDays());
        self::assertSame(180, $term->getMaximumDays());
        $threshold = $repayment->getThreshold();
        self::assertInstanceOf(ThresholdRepayment::class, $threshold);
        $amount2 = $threshold->getAmount();
        self::assertInstanceOf(Amount::class, $amount2);
        self::assertSame('EUR', $amount2->getCurrency());
        self::assertSame(100, $amount2->getValue());
        self::assertSame(CapitalGrant::STATUS_ACTIVE, $response->getStatus());

        self::assertSame('GRANT_01', $response['id']);
        self::assertSame('GRANT_ACCOUNT_01', $response['grantAccountId']);
        self::assertSame('GRANT_OFFER_01', $response['grantOfferId']);
        $arrayAmount = $response['amount'];
        self::assertSame('EUR', $arrayAmount['currency']);
        self::assertSame(10000, $arrayAmount['value']);
        $arrayFee = $response['fee'];
        $arrayAmount1 = $arrayFee['amount'];
        self::assertSame('EUR', $arrayAmount1['currency']);
        self::assertSame(500, $arrayAmount1['value']);
        $arrayBalances = $response['balances'];
        self::assertSame('EUR', $arrayBalances['currency']);
        self::assertSame(500, $arrayBalances['fee']);
        self::assertSame(10000, $arrayBalances['principal']);
        self::assertSame(10500, $arrayBalances['total']);
        $arrayCounterparty = $response['counterparty'];
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $arrayCounterparty['accountHolderId']);
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $arrayCounterparty['balanceAccountId']);
        $arrayRepayment = $response['repayment'];
        self::assertSame(1000, $arrayRepayment['basisPoints']);
        $arrayTerm = $arrayRepayment['term'];
        self::assertSame(90, $arrayTerm['estimatedDays']);
        self::assertSame(180, $arrayTerm['maximumDays']);
        $arrayThreshold = $arrayRepayment['threshold'];
        $arrayAmount2 = $arrayThreshold['amount'];
        self::assertSame('EUR', $arrayAmount2['currency']);
        self::assertSame(100, $arrayAmount2['value']);
        self::assertSame(CapitalGrant::STATUS_ACTIVE, $response['status']);

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('GRANT_01', $resultArray['id']);
        self::assertSame('GRANT_ACCOUNT_01', $resultArray['grantAccountId']);
        self::assertSame('GRANT_OFFER_01', $resultArray['grantOfferId']);
        $dataAmount = $resultArray['amount'];
        self::assertSame('EUR', $dataAmount['currency']);
        self::assertSame(10000, $dataAmount['value']);
        $dataFee = $resultArray['fee'];
        $dataAmount1 = $dataFee['amount'];
        self::assertSame('EUR', $dataAmount1['currency']);
        self::assertSame(500, $dataAmount1['value']);
        $dataBalances = $resultArray['balances'];
        self::assertSame('EUR', $dataBalances['currency']);
        self::assertSame(500, $dataBalances['fee']);
        self::assertSame(10000, $dataBalances['principal']);
        self::assertSame(10500, $dataBalances['total']);
        $dataCounterparty = $resultArray['counterparty'];
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $dataCounterparty['accountHolderId']);
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $dataCounterparty['balanceAccountId']);
        $dataRepayment = $resultArray['repayment'];
        self::assertSame(1000, $dataRepayment['basisPoints']);
        $dataTerm = $dataRepayment['term'];
        self::assertSame(90, $dataTerm['estimatedDays']);
        self::assertSame(180, $dataTerm['maximumDays']);
        $dataThreshold = $dataRepayment['threshold'];
        $dataAmount2 = $dataThreshold['amount'];
        self::assertSame('EUR', $dataAmount2['currency']);
        self::assertSame(100, $dataAmount2['value']);
        self::assertSame(CapitalGrant::STATUS_ACTIVE, $resultArray['status']);
    }

    public function testGetGrantReferenceDetailsSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/capital-grant-success.json',
            200,
            $container
        );
        $service = new CapitalApi($this->createLiveConfiguration(), $client);

        $service->getGrantReferenceDetails('GRANT_01');

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-live.adyen.com/btl/v4/grants/GRANT_01',
            (string) $request->getUri()
        );
    }

    public function testGetGrantReferenceDetailsOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new CapitalApi($this->createConfiguration(), $client);

        try {
            $service->getGrantReferenceDetails('GRANT_01');
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    public function testRequestGrantPayoutSuccessOnTest(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/capital-grant-success.json',
            200,
            $container
        );
        $service = new CapitalApi($this->createConfiguration(), $client);

        $requestModel = (new CapitalGrantInfo())
            ->setCounterparty((new GrantInfoCounterparty())
                ->setBalanceAccountId('BAB8B2C3D4E5F6G7H8D9J6GD4'))
            ->setGrantAccountId('GRANT_ACCOUNT_01')
            ->setGrantOfferId('GRANT_OFFER_01');

        [$response, $statusCode, $headers] = $service->requestGrantPayoutWithHttpInfo($requestModel);

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame('https://balanceplatform-api-test.adyen.com/btl/v4/grants', (string) $request->getUri());
        self::assertJsonStringEqualsJsonString(
            json_encode($this->requestGrantPayoutRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame(200, $statusCode);
        self::assertEmpty($headers);
        self::assertInstanceOf(CapitalGrant::class, $response);
        self::assertSame('GRANT_01', $response->getId());
        self::assertSame('GRANT_ACCOUNT_01', $response->getGrantAccountId());
        self::assertSame('GRANT_OFFER_01', $response->getGrantOfferId());
        $amount = $response->getAmount();
        self::assertInstanceOf(Amount::class, $amount);
        self::assertSame('EUR', $amount->getCurrency());
        self::assertSame(10000, $amount->getValue());
        $fee = $response->getFee();
        self::assertInstanceOf(Fee::class, $fee);
        $amount1 = $fee->getAmount();
        self::assertInstanceOf(Amount::class, $amount1);
        self::assertSame('EUR', $amount1->getCurrency());
        self::assertSame(500, $amount1->getValue());
        $balances = $response->getBalances();
        self::assertInstanceOf(CapitalBalance::class, $balances);
        self::assertSame('EUR', $balances->getCurrency());
        self::assertSame(500, $balances->getFee());
        self::assertSame(10000, $balances->getPrincipal());
        self::assertSame(10500, $balances->getTotal());
        $counterparty = $response->getCounterparty();
        self::assertInstanceOf(GrantCounterparty::class, $counterparty);
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $counterparty->getAccountHolderId());
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $counterparty->getBalanceAccountId());
        $repayment = $response->getRepayment();
        self::assertInstanceOf(Repayment::class, $repayment);
        self::assertSame(1000, $repayment->getBasisPoints());
        $term = $repayment->getTerm();
        self::assertInstanceOf(RepaymentTerm::class, $term);
        self::assertSame(90, $term->getEstimatedDays());
        self::assertSame(180, $term->getMaximumDays());
        $threshold = $repayment->getThreshold();
        self::assertInstanceOf(ThresholdRepayment::class, $threshold);
        $amount2 = $threshold->getAmount();
        self::assertInstanceOf(Amount::class, $amount2);
        self::assertSame('EUR', $amount2->getCurrency());
        self::assertSame(100, $amount2->getValue());
        self::assertSame(CapitalGrant::STATUS_ACTIVE, $response->getStatus());
    }

    public function testRequestGrantPayoutSendsExpectedUrlOnLive(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/capital-grant-success.json',
            200,
            $container
        );
        $service = new CapitalApi($this->createLiveConfiguration(), $client);

        $service->requestGrantPayout(new CapitalGrantInfo($this->requestGrantPayoutRequestData()));

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame('https://balanceplatform-api-live.adyen.com/btl/v4/grants', (string) $request->getUri());
    }

    public function testRequestGrantPayoutOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new CapitalApi($this->createConfiguration(), $client);

        try {
            $service->requestGrantPayout(new CapitalGrantInfo($this->requestGrantPayoutRequestData()));
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    public function testRequestGrantPayoutSuccessWithArray(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/capital-grant-success.json',
            200,
            $container
        );
        $service = new CapitalApi($this->createConfiguration(), $client);

        $params = $this->requestGrantPayoutRequestData();

        $response = $service->requestGrantPayout(new CapitalGrantInfo($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('GRANT_01', $response['id']);
        self::assertSame('GRANT_ACCOUNT_01', $response['grantAccountId']);
        self::assertSame('GRANT_OFFER_01', $response['grantOfferId']);
        $arrayAmount = $response['amount'];
        self::assertSame('EUR', $arrayAmount['currency']);
        self::assertSame(10000, $arrayAmount['value']);
        $arrayFee = $response['fee'];
        $arrayAmount1 = $arrayFee['amount'];
        self::assertSame('EUR', $arrayAmount1['currency']);
        self::assertSame(500, $arrayAmount1['value']);
        $arrayBalances = $response['balances'];
        self::assertSame('EUR', $arrayBalances['currency']);
        self::assertSame(500, $arrayBalances['fee']);
        self::assertSame(10000, $arrayBalances['principal']);
        self::assertSame(10500, $arrayBalances['total']);
        $arrayCounterparty = $response['counterparty'];
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $arrayCounterparty['accountHolderId']);
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $arrayCounterparty['balanceAccountId']);
        $arrayRepayment = $response['repayment'];
        self::assertSame(1000, $arrayRepayment['basisPoints']);
        $arrayTerm = $arrayRepayment['term'];
        self::assertSame(90, $arrayTerm['estimatedDays']);
        self::assertSame(180, $arrayTerm['maximumDays']);
        $arrayThreshold = $arrayRepayment['threshold'];
        $arrayAmount2 = $arrayThreshold['amount'];
        self::assertSame('EUR', $arrayAmount2['currency']);
        self::assertSame(100, $arrayAmount2['value']);
        self::assertSame(CapitalGrant::STATUS_ACTIVE, $response['status']);

        $resultArray = $response->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('GRANT_01', $resultArray['id']);
        self::assertSame('GRANT_ACCOUNT_01', $resultArray['grantAccountId']);
        self::assertSame('GRANT_OFFER_01', $resultArray['grantOfferId']);
        $dataAmount = $resultArray['amount'];
        self::assertSame('EUR', $dataAmount['currency']);
        self::assertSame(10000, $dataAmount['value']);
        $dataFee = $resultArray['fee'];
        $dataAmount1 = $dataFee['amount'];
        self::assertSame('EUR', $dataAmount1['currency']);
        self::assertSame(500, $dataAmount1['value']);
        $dataBalances = $resultArray['balances'];
        self::assertSame('EUR', $dataBalances['currency']);
        self::assertSame(500, $dataBalances['fee']);
        self::assertSame(10000, $dataBalances['principal']);
        self::assertSame(10500, $dataBalances['total']);
        $dataCounterparty = $resultArray['counterparty'];
        self::assertSame('AHA1B2C3D4E5F6G7H8I9J0', $dataCounterparty['accountHolderId']);
        self::assertSame('BAB8B2C3D4E5F6G7H8D9J6GD4', $dataCounterparty['balanceAccountId']);
        $dataRepayment = $resultArray['repayment'];
        self::assertSame(1000, $dataRepayment['basisPoints']);
        $dataTerm = $dataRepayment['term'];
        self::assertSame(90, $dataTerm['estimatedDays']);
        self::assertSame(180, $dataTerm['maximumDays']);
        $dataThreshold = $dataRepayment['threshold'];
        $dataAmount2 = $dataThreshold['amount'];
        self::assertSame('EUR', $dataAmount2['currency']);
        self::assertSame(100, $dataAmount2['value']);
        self::assertSame(CapitalGrant::STATUS_ACTIVE, $resultArray['status']);
    }

    private function requestGrantPayoutRequestData(): array
    {
        return [
            'counterparty' => [
                'balanceAccountId' => 'BAB8B2C3D4E5F6G7H8D9J6GD4',
            ],
            'grantAccountId' => 'GRANT_ACCOUNT_01',
            'grantOfferId' => 'GRANT_OFFER_01',
        ];
    }

    public function testRequestGrantPayoutAsyncSuccessWithHttpInfo(): void
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/capital-grant-success.json',
            200,
            $container
        );
        $service = new CapitalApi($this->createConfiguration(), $client);

        $promise = $service->requestGrantPayoutAsyncWithHttpInfo(
            new CapitalGrantInfo($this->requestGrantPayoutRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertSame(200, $statusCode);
        self::assertEmpty($headers);
        self::assertInstanceOf(CapitalGrant::class, $response);
        self::assertSame('GRANT_01', $response->getId());
        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame('https://balanceplatform-api-test.adyen.com/btl/v4/grants', (string) $request->getUri());
        self::assertJsonStringEqualsJsonString(
            json_encode($this->requestGrantPayoutRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
    }

    public function testGetGrantReferenceDetailsAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Transfers/transfers-403-error.json',
            403
        );
        $service = new CapitalApi($this->createConfiguration(), $client);

        try {
            $service->getGrantReferenceDetailsAsync('GRANT_01')->wait();
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
