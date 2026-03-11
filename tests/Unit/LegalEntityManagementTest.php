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
use Adyen\Environment;
use Adyen\Model\LegalEntityManagement\LegalEntityInfoRequiredType;
use Adyen\Model\LegalEntityManagement\Individual;
use Adyen\Model\LegalEntityManagement\Name;
use Adyen\Model\LegalEntityManagement\Address;
use Adyen\Model\LegalEntityManagement\IdentificationData;
use Adyen\Model\LegalEntityManagement\BirthData;
use Adyen\Model\LegalEntityManagement\LegalEntityInfo;
use Adyen\Model\LegalEntityManagement\LegalEntityAssociation;

class LegalEntityManagementTest extends TestCaseMock
{
    public function testGetAllBusinessLinesUnderLegalEntity()
    {
        $client = $this->createMockClientUrl(
            'tests/Resources/LegalEntityManagement/business-lines-under-entity.json'
        );
        $service = new LegalEntitiesApi($client);
        $response = $service->getAllBusinessLinesUnderLegalEntity('Id');
        self::assertEquals(
            'https://kyc-test.adyen.com/lem/v4/legalEntities/Id/businessLines',
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
            'tests/Resources/LegalEntityManagement/business-lines-under-entity.json'
        );
        $service = new DocumentsApi($client);
        $service->deleteDocument('Id');
        self::assertEquals(
            'https://kyc-test.adyen.com/lem/v4/documents/Id',
            $this->requestUrl
        );
    }

    public function testGetTermsOfServiceDocument()
    {
        $client = $this->createMockClientUrl(
            'tests/Resources/LegalEntityManagement/terms-of-service-document-post.json'
        );
        $service = new TermsOfServiceApi($client);
        $response = $service->getTermsOfServiceDocument('id', new GetTermsOfServiceDocumentRequest());
        self::assertEquals('JVBERi0xLjQKJcOkw7zDtsOfCjIgMCBv+f/ub0j6JPRX+E3EmC==', $response->getDocument());
        self::assertEquals(GetTermsOfServiceDocumentResponse::TYPE_ADYEN_ISSUING, $response->getType());
        self::assertEquals(
            'https://kyc-test.adyen.com/lem/v4/legalEntities/id/termsOfService',
            $this->requestUrl
        );
    }

    public function testUpdateTransferInstrument()
    {
        $client = $this->createMockClientUrl(
            'tests/Resources/LegalEntityManagement/transfer-instrument-patch.json'
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

    public function testRequestPeriodicReview()
    {
        $client = $this->createMockClientUrl(null, Environment::TEST);
        $service = new LegalEntitiesApi($client);
        $service->requestPeriodicReview('LE322JV223222F5GVGMLNB83F');
        self::assertEquals(
            'https://kyc-test.adyen.com/lem/v4/legalEntities/LE322JV223222F5GVGMLNB83F/requestPeriodicReview',
            $this->requestUrl
        );
    }

    public function testCreateLegalEntity()
    {
        $client = $this->createMockClient('tests/Resources/LegalEntityManagement/create-legal-entity-response.json', 200);

        $service = new LegalEntitiesApi($client);

        // Individual Name
        $name = new Name();
        $name->setFirstName('Shelly');
        $name->setLastName('Eller');

        // Individual Residential Address
        $residentialAddress = new Address();
        $residentialAddress->setCity('Sydney');
        $residentialAddress->setCountry('AU');
        $residentialAddress->setPostalCode('1122');
        $residentialAddress->setStateOrProvince('NSW');
        $residentialAddress->setStreet('Winfield Avenue');
        $residentialAddress->setStreet2('12');

        // Individual Identification Data
        $identificationData = new IdentificationData();
        $identificationData->setIssuerState('NSW');
        $identificationData->setNumber('1234567891');
        $identificationData->setType(IdentificationData::TYPE_DRIVERS_LICENSE);
        $identificationData->setCardNumber('112327');

        // Individual Birth Data
        $birthData = new BirthData();
        $birthData->setDateOfBirth('1991-01-01');

        // Individual
        $individual = new Individual();
        $individual->setName($name);
        $individual->setResidentialAddress($residentialAddress);
        $individual->setIdentificationData($identificationData);
        $individual->setBirthData($birthData);
        $individual->setEmail('s.hopper @example.com');

        // LegalEntityInfoRequiredType
        $legalEntityInfoRequiredType = new LegalEntityInfoRequiredType();
        $legalEntityInfoRequiredType->setType(LegalEntityInfoRequiredType::TYPE_INDIVIDUAL);
        $legalEntityInfoRequiredType->setIndividual($individual);

        $response = $service->createLegalEntity($legalEntityInfoRequiredType);

        self::assertEquals('LE00000000000000000000001', $response->getId());
        self::assertEquals('individual', $response->getType());
        self::assertEquals('s.hopper @example.com', $response->getIndividual()->getEmail());
        self::assertEquals('Sydney', $response->getIndividual()->getResidentialAddress()->getCity());
        self::assertEquals('Shelly', $response->getIndividual()->getName()->getFirstName());
    }

    public function testUpdateLegalEntity()
    {
        $client = $this->createMockClient('tests/Resources/LegalEntityManagement/update-legal-entity-response.json', 200);

        $service = new LegalEntitiesApi($client);

        // LegalEntityAssociation
        $legalEntityAssociation = new LegalEntityAssociation();
        $legalEntityAssociation->setLegalEntityId('LE00000000000000000000002');
        $legalEntityAssociation->setType(LegalEntityAssociation::TYPE_SETTLOR);
        $legalEntityAssociation->setEntityType('individual');
        $legalEntityAssociation->setSettlorExemptionReason([
            'deceased',
            'professionalServiceProvider'
        ]);

        // LegalEntityInfo
        $legalEntityInfo = new LegalEntityInfo();
        $legalEntityInfo->setEntityAssociations([$legalEntityAssociation]);

        $response = $service->updateLegalEntity('LE00000000000000000000001', $legalEntityInfo);

        self::assertEquals('LE00000000000000000000001', $response->getId());
        self::assertEquals('trust', $response->getType());
        self::assertCount(1, $response->getEntityAssociations());
        self::assertEquals('LE00000000000000000000002', $response->getEntityAssociations()[0]->getLegalEntityId());
        self::assertEquals('settlor', $response->getEntityAssociations()[0]->getType());
    }
}
