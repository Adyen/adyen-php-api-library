<?php declare(strict_types=1);

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Model\DataProtection\SubjectErasureByPspReferenceRequest;
use Adyen\Model\DataProtection\SubjectErasureResponse;
use Adyen\Service\DataProtectionApi;

class DataProtectionTest extends TestCaseMock
{
    /**
     * @throws AdyenException
     */
    public function testRequestSubjectErasure()
    {
        $client = $this->createMockClient(
            'tests/Resources/DataProtection/post-request-subject-erasure-success.json',
            200
        );
        $service = new DataProtectionApi($client);
        $request = new SubjectErasureByPspReferenceRequest();
        $request->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $request->setPspReference("9915520502347613");
        $request->setForceErasure(true);

        $response = $service->requestSubjectErasure($request);

        $this->assertSame(SubjectErasureResponse::RESULT_SUCCESS, $response->getResult());
    }
}
