<?php

namespace Adyen\Tests\Unit;

use Adyen\Exception\AdyenException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * Scenario builder for generated API exception tests.
 */
class ApiExceptionScenario
{
    private ?\Throwable $transportException = null;
    private ?AdyenException $exception = null;
    private ?object $service = null;

    /** @var callable(Client): object */
    private $serviceFactory;

    public function __construct(
        private TestCase $test,
        private string $requestMethod,
        private string $requestUrl,
        callable $serviceFactory
    ) {
        $this->serviceFactory = $serviceFactory;
    }

    public function givenConnectionException(): self
    {
        return $this->givenTransportException(
            new ConnectException('Connection refused', $this->request())
        );
    }

    public function givenRequestExceptionWithoutResponse(): self
    {
        return $this->givenTransportException(
            new RequestException('Request failed', $this->request())
        );
    }

    /**
     * @param array<string, string> $headers
     */
    public function givenRequestExceptionWithResponse(
        int $status,
        array $headers,
        string $body
    ): self {
        return $this->givenTransportException(
            new RequestException(
                'Request failed',
                $this->request(),
                new Response($status, $headers, $body)
            )
        );
    }

    /**
     * @param array<string, string> $headers
     */
    public function givenResponse(int $status, array $headers, string $body): self
    {
        $client = new Client([
            'handler' => HandlerStack::create(new MockHandler([
                new Response($status, $headers, $body)
            ]))
        ]);
        $this->service = ($this->serviceFactory)($client);

        return $this;
    }

    public function whenCalling(string $method, mixed ...$arguments): self
    {
        $this->call(function () use ($method, $arguments) {
            return $this->service->$method(...$arguments);
        });

        return $this;
    }

    public function whenCallingAsync(string $method, mixed ...$arguments): self
    {
        $this->test->assertNotNull($this->service);
        $promise = $this->service->$method(...$arguments);
        $this->test->assertInstanceOf(PromiseInterface::class, $promise);

        try {
            $promise->wait();
            $this->test->fail('Expected an AdyenException');
        } catch (AdyenException $exception) {
            $this->exception = $exception;
        }

        return $this;
    }

    public function expectStatus(int $status): self
    {
        $this->test->assertSame($status, $this->exception()->getStatusCode());

        return $this;
    }

    public function expectMessage(string $message): self
    {
        $this->test->assertSame($message, $this->exception()->getMessage());

        return $this;
    }

    public function expectMessageContains(string $message): self
    {
        $this->test->assertStringContainsString($message, $this->exception()->getMessage());

        return $this;
    }

    /**
     * @param array<string, string[]> $headers
     */
    public function expectResponse(array $headers, string $body): self
    {
        $exception = $this->exception();
        $this->test->assertSame($headers, $exception->getResponseHeaders());
        $this->test->assertSame($body, $exception->getResponseBody());

        return $this;
    }

    public function expectNoResponse(): self
    {
        $exception = $this->exception();
        $this->test->assertSame([], $exception->getResponseHeaders());
        $this->test->assertNull($exception->getResponseBody());

        return $this;
    }

    public function expectErrorCode(string $errorCode): self
    {
        $error = $this->exception()->getError();
        $this->test->assertNotNull($error);
        $this->test->assertSame($errorCode, $error->getErrorCode());

        return $this;
    }

    public function expectPreviousTransportException(): self
    {
        $this->test->assertSame(
            $this->transportException,
            $this->exception()->getPrevious()
        );

        return $this;
    }

    private function givenTransportException(\Throwable $exception): self
    {
        $this->transportException = $exception;
        $client = new Client([
            'handler' => HandlerStack::create(new MockHandler([$exception]))
        ]);
        $this->service = ($this->serviceFactory)($client);

        return $this;
    }

    private function request(): Request
    {
        return new Request($this->requestMethod, $this->requestUrl);
    }

    private function call(callable $call): void
    {
        $this->test->assertNotNull($this->service);

        try {
            $call();
            $this->test->fail('Expected an AdyenException');
        } catch (AdyenException $exception) {
            $this->exception = $exception;
        }
    }

    private function exception(): AdyenException
    {
        $this->test->assertNotNull($this->exception);

        return $this->exception;
    }
}
