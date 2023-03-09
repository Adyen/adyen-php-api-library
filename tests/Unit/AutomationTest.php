<?php

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Environment;
use Adyen\Model\Checkout\Amount;
use Adyen\Model\Checkout\CreateCheckoutSessionRequest;
use Adyen\Model\Checkout\CreatePaymentLinkRequest;
use Adyen\Model\Checkout\PaymentDonationRequestPaymentMethod;
use Adyen\Model\Checkout\PaymentRequest;
use Adyen\Model\Checkout\UpdatePaymentLinkRequest;
use Adyen\Service\Checkout;
use PHPUnit\Framework\Assert;

class AutomationTest extends TestCaseMock
{

    public function testSessions()
    {
        $client = new \Adyen\Client();
        $client->setXApiKey(getenv("APIKEY"));
        $client->setEnvironment(Environment::TEST);
        $service = new Checkout\PaymentsApi($client);
        $request = new CreateCheckoutSessionRequest();
        $request->setMerchantAccount("TestMerchantAccount")
        ->setAmount(new Amount(["value"=>100, "currency"=>"EUR"]))
        ->setReference("019783450134")
        ->setReturnUrl("https://your-company.com/checkout?shopperOrder=12xy..")
        ->setCountryCode("NL");
        $response = $service->sessions($request, array("idempotency"=>"0702834511302870513"));
        Assert::assertEquals($response->getReference(), "019783450134");
        $this->markTestSkipped("Integration");
    }

    public function testPaymentLinks()
    {
        $client = new \Adyen\Client();
        $client->setXApiKey(getenv("APIKEY"));
        $client->setEnvironment(Environment::TEST);
        $service = new Checkout\PaymentLinksApi($client);
        $request = new CreatePaymentLinkRequest();
        $request->setMerchantAccount("TestMerchantAccount")
            ->setAmount(new Amount(["value"=>100, "currency"=>"EUR"]))
            ->setReference("019783450134")
            ->setReturnUrl("https://your-company.com/checkout?shopperOrder=12xy..")
            ->setCountryCode("NL");
        $response = $service->createPaymentLink($request);

        $response2 = $service->getPaymentLink($response->getId());

        $response3 = $service->updatePaymentLink($response->getId(), new UpdatePaymentLinkRequest(["status"=>"expired"]));
        Assert::assertEquals($response3->getStatus(), "expired");
        $this->markTestSkipped("Integration");
    }

    public function testRecurringPayment()
    {
        $client = new \Adyen\Client();
        $client->setXApiKey(getenv("APIKEY"));
        $client->setEnvironment(Environment::TEST);
        $service = new Checkout\PaymentsApi($client);
        $request = new CreateCheckoutSessionRequest();
        $request->setMerchantAccount("TestMerchantAccount")
            ->setAmount(new Amount(["value"=>100, "currency"=>"EUR"]))
            ->setReference("019783450134")
            ->setReturnUrl("https://your-company.com/checkout?shopperOrder=12xy..")
            ->setCountryCode("NL")
            ->setStorePaymentMethod(true)
            ->setShopperReference("23740513703124")
            ->setShopperInteraction("Ecommerce")
            ->setRecurringProcessingModel("CardOnFile");
        $session = $service->sessions($request);
        $service = new Checkout\RecurringApi($client);
        $response = $service->getTokensForStoredPaymentDetails(array("merchantAccount"=>"TestMerchantAccount",
            "shopperReference"=> "23740513703124"));
        self::assertEquals($response->getShopperReference(), "23740513703124");
        $this->markTestSkipped("Integration");
    }
}
