<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\LegalEntityManagement\BusinessLine;
use Adyen\Model\LegalEntityManagement\GetTermsOfServiceDocumentRequest;
use Adyen\Model\LegalEntityManagement\GetTermsOfServiceDocumentResponse;
use Adyen\Model\LegalEntityManagement\TransferInstrumentInfo;
use Adyen\Service\LegalEntityManagement\DocumentsApi;
use Adyen\Service\LegalEntityManagement\LegalEntitiesApi;
use Adyen\Service\LegalEntityManagement\TermsOfServiceApi;
use Adyen\Service\LegalEntityManagement\TransferInstrumentsApi;
use function PHPUnit\Framework\assertEquals;

class LegalEntityManagementTest extends TestCaseMock
{
    public function testGetAllBusinessLinesUnderLegalEntity()
    {
        $client = $this->createMockClientUrl(
            'tests/Resources/LegalEntityManagement/business-lines-under-entity.json',
            200
        );
        $service = new LegalEntitiesApi($client);
        $response = $service->getAllBusinessLinesUnderLegalEntity('Id');
        self::assertEquals(
            'https://kyc-test.adyen.com/lem/v3/legalEntities/Id/businessLines',
            $this->requestUrl
        );
        self::assertEquals('SE322JV223222F5GVGMLNB83F', $response->getBusinessLines()[0]->getId());
        self::assertEquals(
            BusinessLine::SERVICE_PAYMENT_PROCESSING,
            $response->getBusinessLines()[1]->getService()
        );
    }

    public function testDeleteDocuments()
    {
        $client = $this->createMockClientUrl(
            'tests/Resources/LegalEntityManagement/business-lines-under-entity.json',
            200
        );
        $service = new DocumentsApi($client);
        $service->deleteDocument('Id');
        self::assertEquals(
            'https://kyc-test.adyen.com/lem/v3/documents/Id',
            $this->requestUrl
        );
    }

    public function testGetTermsOfServiceDocument()
    {
        $client = $this->createMockClientUrl(
            'tests/Resources/LegalEntityManagement/terms-of-service-document-post.json',
            200
        );
        $service = new TermsOfServiceApi($client);
        $response = $service->getTermsOfServiceDocument('id', new GetTermsOfServiceDocumentRequest());
        self::assertEquals('JVBERi0xLjQKJcOkw7zDtsOfCjIgMCBv+f/ub0j6JPRX+E3EmC==', $response->getDocument());
        self::assertEquals(GetTermsOfServiceDocumentResponse::TYPE_ADYEN_ISSUING, $response->getType());
        self::assertEquals(
            'https://kyc-test.adyen.com/lem/v3/legalEntities/id/termsOfService',
            $this->requestUrl
        );
    }

    public function testUpdateTransferInstrument()
    {
        $client = $this->createMockClientUrl(
            'tests/Resources/LegalEntityManagement/transfer-instrument-patch.json',
            200
        );
        $service = new TransferInstrumentsApi($client);
        $response = $service->updateTransferInstrument('id', new TransferInstrumentInfo());
        self::assertEquals('SE322JV223222F5GVGMLNB83F', $response->getId());
        self::assertEquals(
            new \DateTime('2023-04-03T09:46:26.482Z'),
            $response->getDocumentDetails()[0]->getModificationDate()
        );
        assertEquals('auLocal', $response->getBankAccount()->getAccountIdentification()->getType());
    }
}
