<?php
/**
 * Adyen API Library for PHP
 *
 * Copyright (c) 2020 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Tests\Unit;

use Adyen\Configuration;
use Adyen\Model\Checkout\ObjectSerializer as CheckoutObjectSerializer;
use PHPUnit\Framework\TestCase;

/**
 * Checks shared serializer behavior using Checkout's generated implementation.
 */
class ObjectSerializerTest extends TestCase
{
    /**
     * The supplied configuration controls boolean query formatting instead of the global default.
     *
     * The global setting would send false as 0, but the supplied configuration
     * must send it as the string "false".
     */
    public function testSuppliedBooleanFormatOverridesGlobalDefault(): void
    {
        $originalGlobalConfig = Configuration::getDefaultConfiguration();

        $globalConfig = new Configuration();
        $globalConfig->setBooleanFormatForQueryString(Configuration::BOOLEAN_FORMAT_INT);

        $requestConfig = new Configuration();
        $requestConfig->setBooleanFormatForQueryString(Configuration::BOOLEAN_FORMAT_STRING);

        try {
            Configuration::setDefaultConfiguration($globalConfig);

            $queryParameter = CheckoutObjectSerializer::toQueryValue(
                value: false,
                paramName: 'enabled',
                openApiType: 'boolean',
                config: $requestConfig
            );
            $queryString = CheckoutObjectSerializer::buildQuery(
                params: ['enabled' => false],
                config: $requestConfig
            );

            self::assertSame(['enabled' => 'false'], $queryParameter);
            self::assertSame('enabled=false', $queryString);
        } finally {
            // Restore the default so this test does not affect other tests.
            Configuration::setDefaultConfiguration($originalGlobalConfig);
        }
    }

    /**
     * A downloaded file is stored in the supplied temp folder with its original contents.
     */
    public function testDownloadsUseTheSuppliedTempFolder(): void
    {
        $tempFolder = sys_get_temp_dir() . '/adyen-download-' . bin2hex(random_bytes(6));
        mkdir($tempFolder, 0700);
        $requestConfig = new Configuration();
        $requestConfig->setTempFolderPath($tempFolder);
        $downloadPath = null;

        try {
            $download = CheckoutObjectSerializer::deserialize(
                data: 'test download content',
                class: '\SplFileObject',
                config: $requestConfig
            );
            $downloadPath = $download->getPathname();

            self::assertSame(realpath($tempFolder), realpath(dirname($downloadPath)));
            self::assertSame('test download content', $download->fread($download->getSize()));
        } finally {
            unset($download);
            if ($downloadPath !== null) {
                unlink($downloadPath);
            }
            rmdir($tempFolder);
        }
    }
}
