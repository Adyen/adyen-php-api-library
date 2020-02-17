<?php
/**
 *                       ######
 *                       ######
 * ############    ####( ######  #####. ######  ############   ############
 * #############  #####( ######  #####. ######  #############  #############
 *        ######  #####( ######  #####. ######  #####  ######  #####  ######
 * ###### ######  #####( ######  #####. ######  #####  #####   #####  ######
 * ###### ######  #####( ######  #####. ######  #####          #####  ######
 * #############  #############  #############  #############  #####  ######
 *  ############   ############  #############   ############  #####  ######
 *                                      ######
 *                               #############
 *                               ############
 *
 * Adyen API Library for PHP
 *
 * Copyright (c) 2020 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Unit;

class FundTest extends TestCaseMock
{
    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successAccountHolderBalanceProvider
     * @throws \Adyen\AdyenException
     */
    public function testAccountHolderBalanceSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Fund($client);

        $params = json_decode(
            '
            {
              "accountHolderCode": "TestAccountHolder877209"
            }',
            true
        );

        $result = $service->accountHolderBalance($params);

        $this->assertContains($result['resultCode'], array('Success'));
    }

    /**
     * @return array
     */
    public static function successAccountHolderBalanceProvider()
    {
        return array(
            array('tests/Resources/Fund/accountHolderBalance-success.json', 200),
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successAccountHolderTransactionListProvider
     * @throws \Adyen\AdyenException
     */
    public function testAccountHolderTransactionListSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Fund($client);

        $params = json_decode(
            '
            {
              "accountHolderCode": "TestAccountHolder423978",
              "transactionStatuses": [],
              "transactionListsPerAccount": []
            }',
            true
        );

        $result = $service->accountHolderTransactionList($params);

        $this->assertContains($result['resultCode'], array('Success'));
    }

    /**
     * @return array
     */
    public static function successAccountHolderTransactionListProvider()
    {
        return array(
            array('tests/Resources/Fund/accountHolderTransactionList-success.json', 200),
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successPayoutAccountHolderProvider
     * @throws \Adyen\AdyenException
     */
    public function testPayoutAccountHolderSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Fund($client);

        $params = json_decode(
            '
            {
              "accountCode": "118731451",
              "amount": {
                "currency": "EUR",
                "value": 99792
              },
              "accountHolderCode": "TestAccountHolder877209",
              "merchantReference": "myreference",
              "description": "12345 – Test",
              "bankAccountUUID": "000b81aa-ae7e-4492-aa7e-72b2129dce0c"
            }',
            true
        );

        $result = $service->payoutAccountHolder($params);

        $this->assertContains($result['bankAccountUUID'], array('000b81aa-ae7e-4492-aa7e-72b2129dce0c'));
    }

    public static function successPayoutAccountHolderProvider()
    {
        return array(
            array('tests/Resources/Fund/payoutAccountHolder-success.json', 200),
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successTransferFundsProvider
     * @throws \Adyen\AdyenException
     */
    public function testTransferFundsSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Fund($client);

        $params = json_decode(
            '
            {
              "sourceAccountCode": "189184578",
              "merchantReference": "myreference",
              "destinationAccountCode": "190324759",
              "amount": {
                "currency": "EUR",
                "value": 2000
              },
              "transferCode": "TransferCode_1"
            }',
            true
        );

        $result = $service->transferFunds($params);

        $this->assertContains($result['resultCode'], array('Success'));
    }

    /**
     * @return array
     */
    public static function successTransferFundsProvider()
    {
        return array(
            array('tests/Resources/Fund/transferFunds-success.json', 200),
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successSetupBeneficiaryProvider
     * @throws \Adyen\AdyenException
     */
    public function testSetupBeneficiarySuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Fund($client);

        $params = json_decode(
            '
            {
              "destinationAccountCode": "118731451",
              "merchantReference": "myreference",
              "sourceAccountCode": "189184578"
            }',
            true
        );

        $result = $service->setupBeneficiary($params);

        $this->assertContains($result['resultCode'], array('Success'));
    }

    public static function successSetupBeneficiaryProvider()
    {
        return array(
            array('tests/Resources/Fund/setupBeneficiary-success.json', 200),
        );
    }

    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successRefundNotPaidOutTransfersProvider
     * @throws \Adyen\AdyenException
     */
    public function testRefundNotPaidOutTransfersSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Fund($client);

        $params = json_decode(
            '
            {
              "accountHolderCode": "TestAccountHolder877210",
              "accountCode": "118731451"
            }',
            true
        );

        $result = $service->refundNotPaidOutTransfers($params);

        $this->assertContains($result['resultCode'], array('Success'));
    }

    /**
     * @return array
     */
    public static function successRefundNotPaidOutTransfersProvider()
    {
        return array(
            array('tests/Resources/Fund/refundNotPaidOutTransfers-success.json', 200),
        );
    }
}
