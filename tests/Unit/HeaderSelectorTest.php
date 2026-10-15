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

    /**
     * Additional Content-Type values replace the default regardless of header casing.
     */
    public function testAdditionalContentTypeOverridesRegardlessOfCasing(): void
    {
        $headerSelector = new HeaderSelector();

        foreach (['Content-Type', 'content-type', 'cOnTeNt-TyPe'] as $headerName) {
            $options = new RequestOptions(['additionalHeaders' => [$headerName => 'text/plain']]);
            $headers = $headerSelector->selectHeaders(['application/json'], 'application/json', false, $options);

            self::assertSame('text/plain', $headers['Content-Type'], $headerName);
            self::assertCount(2, $headers);
        }
    }

    /**
     * Additional Idempotency-Key values replace the dedicated option regardless of header casing.
     */
    public function testAdditionalIdempotencyKeyOverridesRegardlessOfCasing(): void
    {
        $headerSelector = new HeaderSelector();

        foreach (['Idempotency-Key', 'idempotency-key', 'iDeMpOtEnCy-KeY'] as $headerName) {
            $options = new RequestOptions([
                'idempotencyKey' => 'default-key',
                'additionalHeaders' => [$headerName => 'custom-key'],
            ]);
            $headers = $headerSelector->selectHeaders(['application/json'], 'application/json', false, $options);

            self::assertSame('custom-key', $headers['Idempotency-Key'], $headerName);
            self::assertCount(3, $headers);
        }
    }

    /**
     * Later values win across header sets, without changing the first spelling or flattening array values.
     */
    public function testMergeHeadersReplacesDuplicateNamesRegardlessOfCasing(): void
    {
        $headers = (new HeaderSelector())->mergeHeaders(
            ['Content-Type' => 'application/json', 'X-Custom-Header' => ['first', 'second']],
            ['content-type' => 'text/plain', 'x-custom-header' => ['third']],
            ['CONTENT-TYPE' => 'application/json; charset=utf-8', 'X-CUSTOM-HEADER' => ['last']]
        );

        self::assertSame([
            'Content-Type' => 'application/json; charset=utf-8',
            'X-Custom-Header' => ['last'],
        ], $headers);
    }

    public function testSelectHeadersSkipsEmptyIdempotencyKey()
    {
        $headerSelector = new HeaderSelector();
        $requestOptions = new RequestOptions();
        $requestOptions->setIdempotencyKey('');

        $headers = $headerSelector->selectHeaders(['application/json'], 'application/json', false, $requestOptions);

        $this->assertArrayNotHasKey('Idempotency-Key', $headers);
    }

    /**
     * empty() would treat the string "0" as empty and silently drop the header.
     */
    public function testSelectHeadersKeepsZeroStringIdempotencyKey()
    {
        $headerSelector = new HeaderSelector();
        $requestOptions = new RequestOptions(['idempotencyKey' => '0']);

        $headers = $headerSelector->selectHeaders(['application/json'], 'application/json', false, $requestOptions);

        $this->assertSame('0', $headers['Idempotency-Key']);
    }
}
