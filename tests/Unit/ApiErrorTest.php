<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\ApiError;
use PHPUnit\Framework\TestCase;

class ApiErrorTest extends TestCase
{
    public function testCreatesLegacyError(): void
    {
        $payload = [
            'status' => 422,
            'errorCode' => '130',
            'message' => 'Invalid data provided',
            'errorType' => 'validation',
            'pspReference' => '8515131751004953',
            'additionalData' => ['field' => 'value'],
            'unknownField' => 'preserved',
        ];

        $error = ApiError::fromArray($payload);

        $this->assertSame(422, $error->getStatus());
        $this->assertSame('130', $error->getErrorCode());
        $this->assertSame('Invalid data provided', $error->getMessage());
        $this->assertSame('validation', $error->getErrorType());
        $this->assertSame('8515131751004953', $error->getPspReference());
        $this->assertSame(['field' => 'value'], $error->getAdditionalData());
        $this->assertNull($error->getDetail());
        $this->assertNull($error->getType());
        $this->assertSame($payload, $error->getRawData());
        $this->assertSame($payload, json_decode(json_encode($error), true));
    }

    public function testCreatesRfc7807ErrorWithJavaStyleFallbacks(): void
    {
        $invalidFields = [
            [
                'name' => 'amount.value',
                'message' => 'must be greater than zero',
            ],
        ];
        $response = ['result' => 'rejected'];
        $payload = [
            'type' => 'https://docs.adyen.com/errors/validation',
            'title' => 'Invalid request',
            'status' => 422,
            'detail' => 'Amount is required',
            'instance' => '/requests/123',
            'errorCode' => '29_001',
            'requestId' => '1234567890',
            'invalidFields' => $invalidFields,
            'response' => $response,
        ];

        $error = ApiError::fromArray($payload);

        $this->assertSame('Amount is required', $error->getMessage());
        $this->assertSame('https://docs.adyen.com/errors/validation', $error->getErrorType());
        $this->assertSame('Invalid request', $error->getTitle());
        $this->assertSame('Amount is required', $error->getDetail());
        $this->assertSame('https://docs.adyen.com/errors/validation', $error->getType());
        $this->assertSame('/requests/123', $error->getInstance());
        $this->assertSame('29_001', $error->getErrorCode());
        $this->assertSame('1234567890', $error->getRequestId());
        $this->assertSame($invalidFields, $error->getInvalidFields());
        $this->assertSame($response, $error->getResponse());
        $this->assertSame($payload, $error->getRawData());
    }

    public function testExactLegacyFieldsTakePrecedenceOverFallbacks(): void
    {
        $error = ApiError::fromArray([
            'message' => 'Legacy message',
            'detail' => 'RFC detail',
            'errorType' => 'validation',
            'type' => 'https://docs.adyen.com/errors/validation',
        ]);

        $this->assertSame('Legacy message', $error->getMessage());
        $this->assertSame('RFC detail', $error->getDetail());
        $this->assertSame('validation', $error->getErrorType());
        $this->assertSame('https://docs.adyen.com/errors/validation', $error->getType());
    }

    public function testSupportsPartialErrorPayload(): void
    {
        $error = ApiError::fromArray([
            'status' => '400',
            'errorCode' => 123,
        ]);

        $this->assertSame(400, $error->getStatus());
        $this->assertSame('123', $error->getErrorCode());
        $this->assertNull($error->getMessage());
        $this->assertNull($error->getErrorType());
        $this->assertNull($error->getInvalidFields());
        $this->assertNull($error->getResponse());
    }
}
