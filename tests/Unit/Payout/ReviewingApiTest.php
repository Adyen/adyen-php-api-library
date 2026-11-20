<?php

namespace Adyen\Tests\Unit\Payout;

use Adyen\Exception\AdyenException;
use Adyen\Model\Payout\ModifyRequest;
use Adyen\Model\Payout\ModifyResponse;
use Adyen\Service\Payout\ReviewingApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Promise\PromiseInterface;

class ReviewingApiTest extends BaseTest
{
    /**
     * @dataProvider successConfirmThirdPartyProvider
     */
    public function testConfirmThirdPartySendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        $service->confirmThirdParty(new ModifyRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payout/v68/confirmThirdParty',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successConfirmThirdPartyProvider
     */
    public function testConfirmThirdPartySendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ReviewingApi($this->createLiveConfiguration(), $client);

        $service->confirmThirdParty(new ModifyRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payout/v68/confirmThirdParty',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successConfirmThirdPartyProvider
     */
    public function testConfirmThirdPartySuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ReviewingApi($this->createConfiguration(), $client);
        $request = (new ModifyRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setOriginalReference('8816080397613514');

        $response = $service->confirmThirdParty($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->confirmThirdPartyRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(ModifyResponse::class, $response);
        self::assertSame('[payout-confirm-received]', $response->getResponse());
        self::assertSame('991617894325358C', $response->getPspReference());
    }

    /**
     * @dataProvider successConfirmThirdPartyProvider
     */
    public function testConfirmThirdPartySuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ReviewingApi($this->createConfiguration(), $client);
        $params = $this->confirmThirdPartyRequestData();

        $response = $service->confirmThirdParty(new ModifyRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('[payout-confirm-received]', $response['response']);
        self::assertSame('991617894325358C', $response['pspReference']);
    }

    /**
     * @dataProvider successConfirmThirdPartyProvider
     */
    public function testConfirmThirdPartySuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        $resultArray = $service->confirmThirdParty(
            new ModifyRequest($this->confirmThirdPartyRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('[payout-confirm-received]', $resultArray['response']);
        self::assertSame('991617894325358C', $resultArray['pspReference']);
    }

    /**
     * @dataProvider successConfirmThirdPartyProvider
     */
    public function testConfirmThirdPartySuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->confirmThirdPartyWithHttpInfo(
            new ModifyRequest($this->confirmThirdPartyRequestData())
        );

        self::assertInstanceOf(ModifyResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('[payout-confirm-received]', $response->getResponse());
    }

    /**
     * @dataProvider successConfirmThirdPartyProvider
     */
    public function testConfirmThirdPartyAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        $promise = $service->confirmThirdPartyAsync(
            new ModifyRequest($this->confirmThirdPartyRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(ModifyResponse::class, $response);
        self::assertSame('[payout-confirm-received]', $response->getResponse());
    }

    /**
     * @dataProvider successConfirmThirdPartyProvider
     */
    public function testConfirmThirdPartyAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        $promise = $service->confirmThirdPartyAsyncWithHttpInfo(
            new ModifyRequest($this->confirmThirdPartyRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(ModifyResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('[payout-confirm-received]', $response->getResponse());
    }

    public function testConfirmThirdPartyOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Payouts/payout-401-error.json', 401);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        try {
            $service->confirmThirdParty(
                new ModifyRequest($this->confirmThirdPartyRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testConfirmThirdPartyAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Payouts/payout-401-error.json', 401);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        try {
            $service->confirmThirdPartyAsync(
                new ModifyRequest($this->confirmThirdPartyRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successConfirmThirdPartyProvider(): array
    {
        return [
            ['tests/Resources/Payouts/confirm-third-party.json', 200],
        ];
    }

    private function confirmThirdPartyRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'originalReference' => '8816080397613514',
        ];
    }

    /**
     * @dataProvider successDeclineThirdPartyProvider
     */
    public function testDeclineThirdPartySendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        $service->declineThirdParty(new ModifyRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payout/v68/declineThirdParty',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDeclineThirdPartyProvider
     */
    public function testDeclineThirdPartySendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ReviewingApi($this->createLiveConfiguration(), $client);

        $service->declineThirdParty(new ModifyRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payout/v68/declineThirdParty',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDeclineThirdPartyProvider
     */
    public function testDeclineThirdPartySuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ReviewingApi($this->createConfiguration(), $client);
        $request = (new ModifyRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setOriginalReference('8816080397613514');

        $response = $service->declineThirdParty($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->declineThirdPartyRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(ModifyResponse::class, $response);
        self::assertSame('[payout-decline-received]', $response->getResponse());
        self::assertSame('8816080397613516', $response->getPspReference());
    }

    /**
     * @dataProvider successDeclineThirdPartyProvider
     */
    public function testDeclineThirdPartySuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ReviewingApi($this->createConfiguration(), $client);
        $params = $this->declineThirdPartyRequestData();

        $response = $service->declineThirdParty(new ModifyRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('[payout-decline-received]', $response['response']);
        self::assertSame('8816080397613516', $response['pspReference']);
    }

    /**
     * @dataProvider successDeclineThirdPartyProvider
     */
    public function testDeclineThirdPartySuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        $resultArray = $service->declineThirdParty(
            new ModifyRequest($this->declineThirdPartyRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('[payout-decline-received]', $resultArray['response']);
        self::assertSame('8816080397613516', $resultArray['pspReference']);
    }

    /**
     * @dataProvider successDeclineThirdPartyProvider
     */
    public function testDeclineThirdPartySuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->declineThirdPartyWithHttpInfo(
            new ModifyRequest($this->declineThirdPartyRequestData())
        );

        self::assertInstanceOf(ModifyResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('[payout-decline-received]', $response->getResponse());
    }

    /**
     * @dataProvider successDeclineThirdPartyProvider
     */
    public function testDeclineThirdPartyAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        $promise = $service->declineThirdPartyAsync(
            new ModifyRequest($this->declineThirdPartyRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(ModifyResponse::class, $response);
        self::assertSame('[payout-decline-received]', $response->getResponse());
    }

    /**
     * @dataProvider successDeclineThirdPartyProvider
     */
    public function testDeclineThirdPartyAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        $promise = $service->declineThirdPartyAsyncWithHttpInfo(
            new ModifyRequest($this->declineThirdPartyRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(ModifyResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('[payout-decline-received]', $response->getResponse());
    }

    public function testDeclineThirdPartyOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Payouts/payout-401-error.json', 401);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        try {
            $service->declineThirdParty(
                new ModifyRequest($this->declineThirdPartyRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testDeclineThirdPartyAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Payouts/payout-401-error.json', 401);
        $service = new ReviewingApi($this->createConfiguration(), $client);

        try {
            $service->declineThirdPartyAsync(
                new ModifyRequest($this->declineThirdPartyRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successDeclineThirdPartyProvider(): array
    {
        return [
            ['tests/Resources/Payouts/decline-third-party.json', 200],
        ];
    }

    private function declineThirdPartyRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'originalReference' => '8816080397613514',
        ];
    }

    private function assertUnauthorizedException(AdyenException $exception): void
    {
        self::assertSame(401, $exception->getStatusCode());
        self::assertSame('Unauthorized client error', $exception->getMessage());
        self::assertNotNull($exception->getError());
        self::assertSame('000', $exception->getError()->getErrorCode());
        self::assertSame('security', $exception->getError()->getErrorType());
        self::assertSame('8816080397613514', $exception->getError()->getPspReference());
    }
}
