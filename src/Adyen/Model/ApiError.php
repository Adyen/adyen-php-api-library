<?php

namespace Adyen\Model;

/**
 * Represents an API error response in either the legacy or RFC 7807 format.
 */
class ApiError implements \JsonSerializable
{
    private ?string $message;
    private ?string $errorType;
    private ?string $errorCode;
    private ?string $pspReference;
    private ?int $status;
    private ?string $title;
    private ?string $detail;
    private ?string $type;
    private ?string $instance;
    private ?string $requestId;
    private ?array $invalidFields;
    private ?array $additionalData;
    private $response;
    private array $rawData;

    /**
     * @param array<string, mixed> $payload
     */
    public function __construct(array $payload)
    {
        $this->detail = self::stringValue($payload, 'detail');
        $this->type = self::stringValue($payload, 'type');

        $this->message = self::stringValue($payload, 'message') ?? $this->detail;
        $this->errorType = self::stringValue($payload, 'errorType') ?? $this->type;
        $this->errorCode = self::stringValue($payload, 'errorCode');
        $this->pspReference = self::stringValue($payload, 'pspReference');
        $this->status = self::intValue($payload, 'status');
        $this->title = self::stringValue($payload, 'title');
        $this->instance = self::stringValue($payload, 'instance');
        $this->requestId = self::stringValue($payload, 'requestId');
        $this->invalidFields = self::arrayValue($payload, 'invalidFields');
        $this->additionalData = self::arrayValue($payload, 'additionalData');
        $this->response = $payload['response'] ?? null;
        $this->rawData = $payload;
    }

    /**
     * @param array<string, mixed> $payload
     */
    public static function fromArray(array $payload): self
    {
        return new self($payload);
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getErrorType(): ?string
    {
        return $this->errorType;
    }

    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    public function getPspReference(): ?string
    {
        return $this->pspReference;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getInstance(): ?string
    {
        return $this->instance;
    }

    public function getRequestId(): ?string
    {
        return $this->requestId;
    }

    /**
     * @return array<mixed>|null
     */
    public function getInvalidFields(): ?array
    {
        return $this->invalidFields;
    }

    /**
     * @return array<mixed>|null
     */
    public function getAdditionalData(): ?array
    {
        return $this->additionalData;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return array<string, mixed>
     */
    public function getRawData(): array
    {
        return $this->rawData;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return $this->rawData;
    }

    /**
     * @param array<string, mixed> $payload
     */
    private static function stringValue(array $payload, string $key): ?string
    {
        if (!array_key_exists($key, $payload) || $payload[$key] === null) {
            return null;
        }

        return is_scalar($payload[$key]) ? (string) $payload[$key] : null;
    }

    /**
     * @param array<string, mixed> $payload
     */
    private static function intValue(array $payload, string $key): ?int
    {
        if (!array_key_exists($key, $payload) || !is_numeric($payload[$key])) {
            return null;
        }

        return (int) $payload[$key];
    }

    /**
     * @param array<string, mixed> $payload
     * @return array<mixed>|null
     */
    private static function arrayValue(array $payload, string $key): ?array
    {
        if (!array_key_exists($key, $payload) || !is_array($payload[$key])) {
            return null;
        }

        return $payload[$key];
    }
}
