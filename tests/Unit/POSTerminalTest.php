<?php

namespace Adyen\Tests\Unit;

use Adyen\Environment;
use Adyen\Model\POSTerminalManagement\AssignTerminalsRequest;
use Adyen\Model\POSTerminalManagement\GetTerminalsUnderAccountRequest;
use Adyen\Service\POSTerminalManagementApi;
use function PHPUnit\Framework\assertEquals;

class POSTerminalTest extends TestCaseMock
{
    public function testAssignTerminals()
    {
        $client = $this->createMockClientUrl('tests/Resources/POSManagement/assign-terminals.json');
        $service = new POSTerminalManagementApi($client);

        $response = $service->assignTerminals(new AssignTerminalsRequest());
        assertEquals('RemoveConfigScheduled', $response->getResults()['P400Plus-275479597']);
    }

    public function testGetTerminalsUnderAccount()
    {
        $client = $this->createMockClientUrl('tests/Resources/POSManagement/terminals-under-account.json');
        $service = new POSTerminalManagementApi($client);

        $response = $service->getTerminalsUnderAccount(new GetTerminalsUnderAccountRequest());
        assertEquals('YOUR_COMPANY_ACCOUNT', $response->getCompanyAccount());
    }
}
