<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\StoredValue\StoredValueStatusChangeRequest;
use Adyen\Model\StoredValue\StoredValueStatusChangeResponse;
use Adyen\Model\StoredValue\StoredValueVoidRequest;
use Adyen\Model\StoredValue\StoredValueVoidResponse;
use Adyen\Service\StoredValueApi;

class StoredValueTest extends TestCaseMock
{
    public function testChangeStatus()
    {
        $client = $this->createMockClientUrl('tests/Resources/StoredValue/change-status.json');
        $service = new StoredValueApi($client);
        $response = $service->changeStatus(new StoredValueStatusChangeRequest());
        self::assertEquals(StoredValueStatusChangeResponse::RESULT_CODE_SUCCESS, $response->getResultCode());
        self::assertEquals(
            'https://pal-test.adyen.com/pal/servlet/StoredValue/v46/changeStatus',
            $this->requestUrl
        );
    }

    public function testVoidTransaction()
    {
        $client = $this->createMockClientUrl('tests/Resources/StoredValue/void-transaction.json');
        $service = new StoredValueApi($client);
        $response = $service->voidTransaction(new StoredValueVoidRequest());
        self::assertEquals(
            StoredValueVoidResponse::RESULT_CODE_NOT_ENOUGH_BALANCE,
            $response->getResultCode()
        );
        self::assertEquals(
            'https://pal-test.adyen.com/pal/servlet/StoredValue/v46/voidTransaction',
            $this->requestUrl
        );
    }
}
