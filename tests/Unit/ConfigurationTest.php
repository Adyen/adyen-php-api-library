<?php

namespace Adyen\Tests\Unit;

use Adyen\Configuration;
use Adyen\Tests\TestCase;

class ConfigurationTest extends TestCase
{
    /**
     * @covers \Adyen\Configuration::__construct
     */
    public function testInitialisationWithArray()
    {
        $params = [
            'environment' => 'live',
            'adyenApiKey' => 'my-api-key',
            'applicationName' => 'my-app',
            'username' => 'test-user',
            'password' => 'test-password',
            'debug' => true
        ];
        $configuration = new Configuration($params);
        $this->assertEquals('live', $configuration->getEnvironment());
        $this->assertEquals('my-api-key', $configuration->getAdyenApiKey());
        $this->assertEquals('my-app', $configuration->getApplicationName());
        $this->assertEquals('test-user', $configuration->getUsername());
        $this->assertEquals('test-password', $configuration->getPassword());
        $this->assertTrue($configuration->getDebug());
    }

    /**
     * @covers \Adyen\Configuration::__construct
     */
    public function testInitialisationWithNull()
    {
        $configuration = new Configuration(null);
        $this->assertEquals(sys_get_temp_dir(), $configuration->getTempFolderPath());
    }

    /**
     * @covers \Adyen\Configuration::__construct
     * @covers \Adyen\Configuration::getTempFolderPath
     */
    public function testConstructor()
    {
        $configuration = new Configuration();
        $this->assertEquals(sys_get_temp_dir(), $configuration->getTempFolderPath());
    }

    /**
     * @covers \Adyen\Configuration::setAccessToken
     * @covers \Adyen\Configuration::getAccessToken
     * @covers \Adyen\Configuration::setBooleanFormatForQueryString
     * @covers \Adyen\Configuration::getBooleanFormatForQueryString
     * @covers \Adyen\Configuration::setUsername
     * @covers \Adyen\Configuration::getUsername
     * @covers \Adyen\Configuration::setPassword
     * @covers \Adyen\Configuration::getPassword
     * @covers \Adyen\Configuration::setHost
     * @covers \Adyen\Configuration::getHost
     * @covers \Adyen\Configuration::setUserAgent
     * @covers \Adyen\Configuration::getUserAgent
     * @covers \Adyen\Configuration::setDebug
     * @covers \Adyen\Configuration::getDebug
     * @covers \Adyen\Configuration::setDebugFile
     * @covers \Adyen\Configuration::getDebugFile
     * @covers \Adyen\Configuration::setTempFolderPath
     * @covers \Adyen\Configuration::getTempFolderPath
     * @covers \Adyen\Configuration::setCertFile
     * @covers \Adyen\Configuration::getCertFile
     * @covers \Adyen\Configuration::setKeyFile
     * @covers \Adyen\Configuration::getKeyFile
     * @covers \Adyen\Configuration::setEnvironment
     * @covers \Adyen\Configuration::getEnvironment
     * @covers \Adyen\Configuration::setApplicationName
     * @covers \Adyen\Configuration::getApplicationName
     * @covers \Adyen\Configuration::setLiveEndpointUrlPrefix
     * @covers \Adyen\Configuration::getLiveEndpointUrlPrefix
     */
    public function testGettersAndSetters()
    {
        $configuration = new Configuration();

        $configuration->setAccessToken('token');
        $this->assertEquals('token', $configuration->getAccessToken());

        $configuration->setBooleanFormatForQueryString(Configuration::BOOLEAN_FORMAT_STRING);
        $this->assertEquals(Configuration::BOOLEAN_FORMAT_STRING, $configuration->getBooleanFormatForQueryString());

        $configuration->setUsername('user');
        $this->assertEquals('user', $configuration->getUsername());

        $configuration->setPassword('pass');
        $this->assertEquals('pass', $configuration->getPassword());

        $configuration->setHost('host');
        $this->assertEquals('host', $configuration->getHost());

        $configuration->setUserAgent('ua');
        $this->assertEquals('ua', $configuration->getUserAgent());

        $configuration->setDebug(true);
        $this->assertTrue($configuration->getDebug());

        $configuration->setDebugFile('file');
        $this->assertEquals('file', $configuration->getDebugFile());

        $configuration->setTempFolderPath('temp');
        $this->assertEquals('temp', $configuration->getTempFolderPath());

        $configuration->setCertFile('cert');
        $this->assertEquals('cert', $configuration->getCertFile());

        $configuration->setKeyFile('key');
        $this->assertEquals('key', $configuration->getKeyFile());

        $configuration->setEnvironment('env');
        $this->assertEquals('env', $configuration->getEnvironment());

        $configuration->setApplicationName('app');
        $this->assertEquals('app', $configuration->getApplicationName());

        $configuration->setLiveEndpointUrlPrefix('prefix');
        $this->assertEquals('prefix', $configuration->getLiveEndpointUrlPrefix());
    }

    /**
     * @covers \Adyen\Configuration::setAdyenApiKey
     * @covers \Adyen\Configuration::getAdyenApiKey
     * @covers \Adyen\Configuration::setApiKey
     * @covers \Adyen\Configuration::getApiKey
     */
    public function testApiKey()
    {
        $configuration = new Configuration();

        $configuration->setAdyenApiKey('apikey');
        $this->assertEquals('apikey', $configuration->getAdyenApiKey());
        $this->assertEquals('apikey', $configuration->getApiKey('X-API-Key'));

        $configuration->setApiKey('other', 'value');
        $this->assertEquals('value', $configuration->getApiKey('other'));
        $this->assertNull($configuration->getApiKey('nonexistent'));
    }

    /**
     * @covers \Adyen\Configuration::setApiKeyPrefix
     * @covers \Adyen\Configuration::getApiKeyPrefix
     * @covers \Adyen\Configuration::getApiKeyWithPrefix
     */
    public function testApiKeyPrefix()
    {
        $configuration = new Configuration();

        $configuration->setApiKeyPrefix('X-API-Key', 'Bearer');
        $this->assertEquals('Bearer', $configuration->getApiKeyPrefix('X-API-Key'));

        $configuration->setAdyenApiKey('apikey');
        $this->assertEquals('Bearer apikey', $configuration->getApiKeyWithPrefix('X-API-Key'));

        $configuration->setApiKeyPrefix('X-API-Key', '');
        $this->assertEquals('apikey', $configuration->getApiKeyWithPrefix('X-API-Key'));

        $this->assertNull($configuration->getApiKeyWithPrefix('nonexistent'));
    }

    /**
     * @covers \Adyen\Configuration::getDefaultConfiguration
     * @covers \Adyen\Configuration::setDefaultConfiguration
     */
    public function testDefaultConfiguration()
    {
        $config = new Configuration();
        Configuration::setDefaultConfiguration($config);
        $this->assertSame($config, Configuration::getDefaultConfiguration());
    }

    /**
     * @covers \Adyen\Configuration::toDebugReport
     */
    public function testToDebugReport()
    {
        $report = Configuration::toDebugReport();
        $this->assertStringContainsString('PHP SDK (Adyen) Debug Report:', $report);
        $this->assertStringContainsString('OS:', $report);
        $this->assertStringContainsString('PHP Version:', $report);
    }

    /**
     * @covers \Adyen\Configuration::getHostString
     */
    public function testGetHostString()
    {
        $hostSettings = [
            [
                'url' => 'https://{var}.adyen.com/{path}',
                'variables' => [
                    'var' => [
                        'default_value' => 'default',
                        'enum_values' => ['val1', 'val2']
                    ],
                    'path' => [
                        'default_value' => 'v1'
                    ]
                ]
            ]
        ];

        $url = Configuration::getHostString($hostSettings, 0, ['var' => 'val1', 'path' => 'v2']);
        $this->assertEquals('https://val1.adyen.com/v2', $url);

        $url = Configuration::getHostString($hostSettings, 0, []);
        $this->assertEquals('https://default.adyen.com/v1', $url);
    }

    /**
     * @covers \Adyen\Configuration::getHostString
     */
    public function testGetHostStringInvalidEnum()
    {
        $hostSettings = [
            [
                'url' => 'https://{var}.adyen.com',
                'variables' => [
                    'var' => [
                        'default_value' => 'default',
                        'enum_values' => ['val1', 'val2']
                    ]
                ]
            ]
        ];

        $this->expectException(\InvalidArgumentException::class);
        Configuration::getHostString($hostSettings, 0, ['var' => 'invalid']);
    }

}
