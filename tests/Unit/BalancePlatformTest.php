<?php

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Environment;
use Adyen\Model\BalancePlatform\AccountHolder;
use Adyen\Model\BalancePlatform\BankAccountIdentificationValidationRequest;
use Adyen\Model\BalancePlatform\PaymentInstrumentGroupInfo;
use Adyen\Service\BalancePlatform\AccountHoldersApi;
use Adyen\Service\BalancePlatform\BalanceAccountsApi;
use Adyen\Service\BalancePlatform\BankAccountValidationApi;
use Adyen\Service\BalancePlatform\PaymentInstrumentGroupsApi;
use Adyen\Service\BalancePlatform\PlatformApi;

class BalancePlatformTest extends TestCaseMock
{
    /**
     * @throws AdyenException
     */
    public function testgetAllAccountHolders()
    {
        // create Checkout client
        $client = $this->createMockClient('tests/Resources/BalancePlatform/get-all-account-holders.json', 200);
        $service = new PlatformApi($client);
        $response = $service->getAllAccountHoldersUnderBalancePlatform("id", array(''=> 100));
        $accountHolder = $response->getAccountHolders()[0];
        self::assertEquals('LE3227C223222D5D8S5S33M4M', $accountHolder->getLegalEntityId());
        self::assertEquals(AccountHolder::STATUS_ACTIVE, $accountHolder->getStatus());
    }

    /**
     * @throws AdyenException
     */
    public function testPaymentInstrumentGroups()
    {
        // create Checkout client
        $client = $this->createMockClient('tests/Resources/BalancePlatform/payment-instruments-groups.json', 200);
        $service = new PaymentInstrumentGroupsApi($client);
        $response = $service->createPaymentInstrumentGroup(new PaymentInstrumentGroupInfo());
        self::assertEquals('LE3227C223222D5D8S5S33M4M', $response->getId());
        self::assertEquals('balancePlatform', $response->getBalancePlatform());
    }

    /**
     * @throws AdyenException
     */
    public function testUpdateAccountHolder()
    {
        // create Checkout client
        $client = $this->createMockClient('tests/Resources/BalancePlatform/update-accountholder.json', 200);
        $service = new AccountHoldersApi($client);
        $response = $service->updateAccountHolder("id", new AccountHolder());
        self::assertEquals('AH3227C223222C5GKR23686TF', $response->getId());
        self::assertEquals('LE322JV223222F5GKQZZ9DS99', $response->getLegalEntityId());
        self::assertEquals(AccountHolder::STATUS_ACTIVE, $response->getStatus());
    }

    /**
     * @throws AdyenException
     */
    public function testValidateBankAccount()
    {
        // create Checkout client
        $client = $this->createMockClient('tests/Resources/BalancePlatform/update-accountholder.json', 200);
        $service = new BankAccountValidationApi($client);
        $service->validateBankAccountIdentification(new BankAccountIdentificationValidationRequest());
        $this->assertTrue(true);
    }

    /**
     * @throws AdyenException
     */
    public function testDeleteSweep()
    {
        // create Checkout client
        $client = $this->createMockClient('tests/Resources/BalancePlatform/update-accountholder.json', 200);
        $service = new BalanceAccountsApi($client);
        $service->deleteSweep("balanceAccountId", "sweepId");
        $this->assertTrue(true);
    }

    public function testGetSweepUrlCheckTest()
    {
        $client = new Client();
        $client->setEnvironment(Environment::TEST);
        $urlclient = new UrlCheckClient();
        $client->setHttpClient($urlclient);
        $service = new BalanceAccountsApi($client);
        $service->getSweep('balanceAccountId', 'sweepId');
        self::assertEquals('https://balanceplatform-api-test.adyen.com/bcl/v2/balanceAccounts/balanceAccountId/sweeps/sweepId', $urlclient->url);
    }

    public function testGetSweepUrlCheckLive()
    {
        $client = new Client();
        $client->setEnvironment(Environment::LIVE);
        $urlclient = new UrlCheckClient();
        $client->setHttpClient($urlclient);
        $service = new BalanceAccountsApi($client);
        $service->getSweep('balanceAccountId', 'sweepId');
        self::assertEquals('https://balanceplatform-api-live.adyen.com/bcl/v2/balanceAccounts/balanceAccountId/sweeps/sweepId', $urlclient->url);
    }
}
