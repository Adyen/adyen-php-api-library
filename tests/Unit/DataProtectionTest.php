<?php declare(strict_types=1);

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Config;
use Adyen\Environment;
use Adyen\HttpClient\ClientInterface;
use Adyen\Model\DataProtection\SubjectErasureByPspReferenceRequest;
use Adyen\Model\DataProtection\SubjectErasureResponse;
use Adyen\Service\DataProtectionApi;

class DataProtectionTest extends TestCaseMock
{
    /**
     * @throws AdyenException
     */
    public function testRequestSubjectErasureSuccess()
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

    public function testRequestSubjectErasureAuthorizationError()
    {
        $this->expectException(AdyenException::class);
        $this->expectExceptionCode(403);
        $this->expectExceptionMessage('Not allowed');
        $client = $this->createMockClient(
            'tests/Resources/DataProtection/authorization-error.json',
            403
        );
        $service = new DataProtectionApi($client);
        $request = new SubjectErasureByPspReferenceRequest();
        $request->setMerchantAccount("NOT_YOUR_MERCHANT_ACCOUNT");
        $request->setPspReference("9915520502347613");

        $service->requestSubjectErasure($request);
    }

    /**
     * @throws AdyenException
     */
    public function testRequestSubjectErasureTestEndpoint()
    {
        $client = new Client(new Config());
        $client->setEnvironment(Environment::TEST);
        $http = $this->createMock(ClientInterface::class);
        $client->setHttpClient($http);
        $service = new DataProtectionApi($client);
        $http->expects($this->once())
            ->method('requestHttp')
            ->with(
                $service,
                'https://ca-test.adyen.com/ca/services/DataProtectionService/v1/requestSubjectErasure',
                [
                    'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
                    'forceErasure' => false
                ],
                'post',
                null
            )
            ->willReturn([]);
        $request = new SubjectErasureByPspReferenceRequest();
        $request->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $request->setForceErasure(false);

        $service->requestSubjectErasure($request);
    }

    /**
     * @throws AdyenException
     */
    public function testRequestSubjectErasureLiveEndpoint()
    {
        $client = new Client(new Config());
        $client->setEnvironment(Environment::LIVE);
        $http = $this->createMock(ClientInterface::class);
        $client->setHttpClient($http);
        $service = new DataProtectionApi($client);
        $http->expects($this->once())
            ->method('requestHttp')
            ->with(
                $service,
                'https://ca-live.adyen.com/ca/services/DataProtectionService/v1/requestSubjectErasure',
                [],
                'post',
                null
            )
            ->willReturn([]);
        $request = new SubjectErasureByPspReferenceRequest();

        $service->requestSubjectErasure($request);
    }
}
