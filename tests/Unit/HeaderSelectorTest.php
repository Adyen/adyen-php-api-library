<?php

namespace Adyen\Tests\Unit;

use Adyen\HeaderSelector;
use Adyen\RequestOptions;

class HeaderSelectorTest extends BaseTest
{
    public function testSelectHeadersWithDefaultOptions()
    {
        $headerSelector = new HeaderSelector();
        $accept = ['application/json'];
        $contentType = 'application/json';
        $isMultipart = false;

        $headers = $headerSelector->selectHeaders($accept, $contentType, $isMultipart);

        $this->assertEquals('application/json', $headers['Accept']);
        $this->assertEquals('application/json', $headers['Content-Type']);
    }

    public function testSelectHeadersWithEmptyContentType()
    {
        $headerSelector = new HeaderSelector();
        $accept = ['application/json'];
        $contentType = '';
        $isMultipart = false;

        $headers = $headerSelector->selectHeaders($accept, $contentType, $isMultipart);

        $this->assertEquals('application/json', $headers['Accept']);
        $this->assertEquals('application/json', $headers['Content-Type']);
    }

    public function testSelectHeadersWithMultipart()
    {
        $headerSelector = new HeaderSelector();
        $accept = ['application/json'];
        $contentType = 'multipart/form-data';
        $isMultipart = true;

        $headers = $headerSelector->selectHeaders($accept, $contentType, $isMultipart);

        $this->assertEquals('application/json', $headers['Accept']);
        $this->assertArrayNotHasKey('Content-Type', $headers);
    }

    public function testSelectHeadersWithRequestOptions()
    {
        $headerSelector = new HeaderSelector();
        $accept = ['application/json'];
        $contentType = 'application/json';
        $isMultipart = false;

        $requestOptions = new RequestOptions();
        $requestOptions->setIdempotencyKey('idempotencyKey');
        $requestOptions->setRequestedVerificationCodeHeader('verificationCode');
        $requestOptions->setAdditionalHeaders(['Custom-Header' => 'CustomValue']);

        $headers = $headerSelector->selectHeaders($accept, $contentType, $isMultipart, $requestOptions);

        $this->assertEquals('application/json', $headers['Accept']);
        $this->assertEquals('application/json', $headers['Content-Type']);
        $this->assertEquals('idempotencyKey', $headers['Idempotency-Key']);
        $this->assertEquals('verificationCode', $headers['x-requested-verification-code']);
        $this->assertEquals('CustomValue', $headers['Custom-Header']);
    }

    public function testSelectHeadersPreservesAdditionalApiKey(): void
    {
        $headerSelector = new HeaderSelector();
        $requestOptions = new RequestOptions();
        $requestOptions->setAdditionalHeaders(['x-api-key' => 'MerchantAPIKey']);

        $headers = $headerSelector->selectHeaders(['application/json'], 'application/json', false, $requestOptions);

        $this->assertSame('MerchantAPIKey', $headers['x-api-key']);
        $this->assertSame('application/json', $headers['Accept']);
        $this->assertSame('application/json', $headers['Content-Type']);
    }

    public function testSelectHeadersSkipsEmptyIdempotencyKey()
    {
        $headerSelector = new HeaderSelector();
        $requestOptions = new RequestOptions();
        $requestOptions->setIdempotencyKey('');

        $headers = $headerSelector->selectHeaders(['application/json'], 'application/json', false, $requestOptions);

        $this->assertArrayNotHasKey('Idempotency-Key', $headers);
    }
}
