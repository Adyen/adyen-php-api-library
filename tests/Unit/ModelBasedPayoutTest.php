<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\Payout\ModifyRequest;
use Adyen\Model\Payout\PayoutRequest;
use Adyen\Model\Payout\PayoutResponse;
use Adyen\Model\Payout\StoreDetailRequest;
use Adyen\Service\Payout\InitializationApi;
use Adyen\Service\Payout\InstantPayoutsApi;
use Adyen\Service\Payout\ReviewingApi;

class ModelBasedPayoutTest extends TestCaseMock
{
    public function testInstantCardPayout()
    {
        // create Checkout client
        $client = $this->createMockClientUrl('tests/Resources/Payouts/instant-payout.json');

        // initialize service
        $service = new InstantPayoutsApi($client);

        $result = $service->makeInstantCardPayout(new PayoutRequest());
        $this->assertEquals(PayoutResponse::RESULT_CODE_AUTHENTICATION_FINISHED, $result->getResultCode());
    }

    public function testConfirmThirdParty()
    {
        // create Checkout client
        $client = $this->createMockClientUrl('tests/Resources/Payouts/confirm-third-party.json');

        // initialize service
        $service = new ReviewingApi($client);

        $result = $service->confirmPayout(new ModifyRequest());
        $this->assertEquals('[payout-confirm-received]', $result->getResponse());
    }

    public function testStorePayoutDetails()
    {
        // create Checkout client
        $client = $this->createMockClientUrl('tests/Resources/Payouts/store-detail.json');

        // initialize service
        $service = new InitializationApi($client);

        $result = $service->storePayoutDetails(new StoreDetailRequest());
        $this->assertEquals('Success', $result->getResultCode());
    }
}
