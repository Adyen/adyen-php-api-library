<?php

namespace Adyen\Tests\Unit;

use Adyen\Exception\AdyenException;
use PHPUnit\Framework\TestCase;

class AdyenExceptionTest extends TestCase
{
    public function testCreatesExceptionFromLegacyResponse(): void
    {
        $body = json_encode([
            'status' => 422,
            'errorCode' => '130',
            'message' => 'Invalid data provided',
            'errorType' => 'validation',
            'pspReference' => '8515131751004953',
        ]);
        $headers = ['Content-Type' => ['application/json']];

        $exception = AdyenException::fromResponse(422, $headers, $body);
        $error = $exception->getError();

        $this->assertSame(422, $exception->getStatusCode());
        $this->assertSame(422, $exception->getCode());
        $this->assertSame('Invalid data provided', $exception->getMessage());
        $this->assertSame($headers, $exception->getResponseHeaders());
        $this->assertSame($body, $exception->getResponseBody());
        $this->assertNotNull($error);
        $this->assertSame($error, $exception->getResponseObject());
        $this->assertSame($body, json_encode($exception->getResponseObject()));
        $this->assertSame('Invalid data provided', $error->getMessage());
        $this->assertSame('validation', $error->getErrorType());
        $this->assertSame('8515131751004953', $error->getPspReference());
        $this->assertSame('130', $error->getErrorCode());
    }

    public function testCreatesExceptionFromRfc7807Response(): void
    {
        $payload = [
            'type' => 'https://docs.adyen.com/errors/validation',
            'title' => 'Invalid request',
            'status' => 422,
            'detail' => 'Amount is required',
            'instance' => '/requests/123',
            'errorCode' => '29_001',
            'requestId' => '1234567890',
            'invalidFields' => [],
        ];
        $body = json_encode($payload);

        $exception = AdyenException::fromResponse(422, [], $body);
        $error = $exception->getError();

        $this->assertNotNull($error);
        $this->assertSame('Invalid request: Amount is required', $exception->getMessage());
        $this->assertSame('Amount is required', $error->getMessage());
        $this->assertSame('https://docs.adyen.com/errors/validation', $error->getErrorType());
        $this->assertSame('29_001', $error->getErrorCode());
        $this->assertSame('Invalid request', $error->getTitle());
        $this->assertSame('Amount is required', $error->getDetail());
        $this->assertSame('https://docs.adyen.com/errors/validation', $error->getType());
        $this->assertSame($payload, $error->getRawData());
    }

    public function testPreservesMalformedResponseBody(): void
    {
        $body = '<html>Service unavailable</html>';

        $exception = AdyenException::fromResponse(503, [], $body);

        $this->assertSame(503, $exception->getStatusCode());
        $this->assertSame($body, $exception->getMessage());
        $this->assertSame($body, $exception->getResponseBody());
        $this->assertNull($exception->getError());
        $this->assertNull($exception->getResponseObject());
    }

    public function testHandlesEmptyResponseBody(): void
    {
        $exception = AdyenException::fromResponse(500);

        $this->assertSame('HTTP request failed with status 500', $exception->getMessage());
        $this->assertNull($exception->getResponseBody());
        $this->assertNull($exception->getError());
        $this->assertSame(500, $exception->getStatusCode());
    }

    public function testPreservesPreviousException(): void
    {
        $previous = new \RuntimeException('Transport failure');

        $exception = AdyenException::fromResponse(0, [], null, $previous);

        $this->assertSame($previous, $exception->getPrevious());
        $this->assertSame('HTTP request failed with status 0', $exception->getMessage());
    }

    public function testExistingConstructorRemainsCompatible(): void
    {
        $headers = ['Content-Type' => ['application/json']];
        $exception = new AdyenException('Existing message', 400, $headers, '{}');

        $this->assertSame('Existing message', $exception->getMessage());
        $this->assertSame(400, $exception->getCode());
        $this->assertSame($headers, $exception->getResponseHeaders());
        $this->assertSame('{}', $exception->getResponseBody());
        $this->assertNull($exception->getError());
    }
}
