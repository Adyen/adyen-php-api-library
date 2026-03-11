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
        $this->assertEquals('verificationCode', $headers['Adyen-Requested-Verification-Code']);
        $this->assertEquals('CustomValue', $headers['Custom-Header']);
    }
}
