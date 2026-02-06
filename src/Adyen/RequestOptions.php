<?php

namespace Adyen;

/**
 * RequestOptions Class
 * Support adding custom headers to API requests.
 */
class RequestOptions
{
    private ?string $idempotencyKey = null;
    private ?string $requestedVerificationCodeHeader = null;
    private array $additionalHeaders = [];

    /**
     * Constructor to initialize the object from an associative array.
     * * @param array|null $data Associative array ['key' => 'value']
     */
    public function __construct(?array $data = null)
    {
        if ($data) {
            $this->idempotencyKey = $data['idempotencyKey'] ?? null;
            $this->requestedVerificationCodeHeader = $data['requestedVerificationCodeHeader'] ?? null;
            $this->additionalHeaders = $data['additionalHeaders'] ?? [];
        }
    }

    /**
     * Fluent setter for idempotencyKey
     */
    public function idempotencyKey(?string $idempotencyKey): self
    {
        $this->idempotencyKey = $idempotencyKey;
        return $this;
    }

    /**
     * Fluent setter for requestedVerificationCodeHeader
     */
    public function requestedVerificationCodeHeader(?string $requestedVerificationCodeHeader): self
    {
        $this->requestedVerificationCodeHeader = $requestedVerificationCodeHeader;
        return $this;
    }

    /**
     * Fluent setter for additionalHeaders
     * Equivalent to Java's HashMap<String, String>
     */
    public function additionalHeaders(array $additionalHeaders): self
    {
        $this->additionalHeaders = $additionalHeaders;
        return $this;
    }

    // Standard Getters and Setters

    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    public function setIdempotencyKey(?string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    public function getRequestedVerificationCodeHeader(): ?string
    {
        return $this->requestedVerificationCodeHeader;
    }

    public function setRequestedVerificationCodeHeader(?string $requestedVerificationCodeHeader): void
    {
        $this->requestedVerificationCodeHeader = $requestedVerificationCodeHeader;
    }

    public function getAdditionalHeaders(): array
    {
        return $this->additionalHeaders;
    }

    public function setAdditionalHeaders(array $additionalHeaders): void
    {
        $this->$additionalHeaders = $additionalHeaders;
    }

    /**
     * Replaces Java's @Override toString()
     */
    public function __toString(): string
    {
        return sprintf(
            "RequestOptions{idempotencyKey='%s', requestedVerificationCodeHeader='%s', additionalHeaders=%s}",
            $this->idempotencyKey,
            $this->requestedVerificationCodeHeader,
            json_encode($this->additionalHeaders)
        );
    }
}
