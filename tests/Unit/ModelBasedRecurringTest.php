<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\Recurring\NotifyShopperRequest;
use Adyen\Model\Recurring\ScheduleAccountUpdaterRequest;

class ModelBasedRecurringTest extends TestCaseMock
{
    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider notifyShopperDataProvider
     * @throws \Adyen\AdyenException
     */
    public function testNotifyShopperSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $service = new \Adyen\Service\RecurringApi($client);

        $result = $service->notifyShopper(new NotifyShopperRequest());
        $this->assertEquals('Example displayed reference', $result->getDisplayedReference());
        $this->assertEquals('Request processed successfully', $result->getMessage());
        $this->assertEquals('8516167336214570', $result->getPspReference());
        $this->assertEquals('Success', $result->getResultCode());
        $this->assertEquals('IA0F7500002462', $result->getShopperNotificationReference());
    }

    public static function notifyShopperDataProvider()
    {
        return array(
            array('tests/Resources/Recurring/notifyShopper-success.json', 200)
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider scheduleAccountUpdaterDataProvider
     * @throws \Adyen\AdyenException
     */
    public function testScheduleAccountUpdaterSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $service = new \Adyen\Service\RecurringApi($client);

        $result = $service->scheduleAccountUpdater(new ScheduleAccountUpdaterRequest());
        $this->assertEquals('8516167336214570', $result->getPspReference());
        $this->assertEquals('Success', $result->getResult());
    }

    public static function scheduleAccountUpdaterDataProvider()
    {
        return array(
            array('tests/Resources/Recurring/scheduleAccountUpdater-success.json', 200)
        );
    }
}
