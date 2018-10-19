<?php

namespace Adyen;

class AbstractResourceTest extends TestCase
{
	/**
	 * @var string
	 */
	private $className = "Adyen\Service\AbstractResource";

	/**
	 * If the allowApplicationInfo is false the applicationInfo key should be removed from the params
	 *
	 * @covers \Adyen\Service\AbstractResource::handleApplicationInfoInRequest
	 */
	public function testHandleApplicationInfoInRequestShouldRemoveApplicationInfoFromParams()
	{
		$params = array(
			"applicationInfo" => array(
				"adyenLibrary" => array(
					"name" => "test",
            		"version" => "test"
				)
			)
		);

		// Mock client without the Test ini settings
		$mockedClient = $this->createClientWithoutTestIni();

		// Mock abstract class with mocked client and $paramsToFilter parameters
		$mockedClass = $this->getMockForAbstractClass($this->className, array((new \Adyen\Service($mockedClient)), "", false));

		// Get private method as testable public method
		$method = $this->getMethod($this->className, "handleApplicationInfoInRequest");

		// Test against function
		$result = $method->invokeArgs($mockedClass, array($params));
		$this->assertArrayNotHasKey("applicationInfo", $result);
	}

	/**
	 * If the allowApplicationInfo is true the applicationInfo Adyen Library should be overwritten with the real values
	 *
	 * @covers \Adyen\Service\AbstractResource::handleApplicationInfoInRequest
	 */
	public function testHandleApplicationInfoInRequestShouldOverwriteApplicationInfoAdyenLibraryParams()
	{
		$params = array(
			"applicationInfo" => array(
				"adyenLibrary" => array(
					"name" => "test",
					"version" => "test"
				)
			)
		);

		// Mock client without the Test ini settings
		$mockedClient = $this->createClientWithoutTestIni();

		// Mock abstract class with mocked client and $paramsToFilter parameters
		$mockedClass = $this->getMockForAbstractClass($this->className, array((new \Adyen\Service($mockedClient)), "", true));

		// Get private method as testable public method
		$method = $this->getMethod($this->className, "handleApplicationInfoInRequest");

		// Test against function
		$result = $method->invokeArgs($mockedClass, array($params));
		$this->assertSame($mockedClient->getLibraryName(), $result['applicationInfo']['adyenLibrary']['name']);
		$this->assertSame($mockedClient->getLibraryVersion(), $result['applicationInfo']['adyenLibrary']['version']);
	}

	/**
	 * If the config adyenPaymentSource is set the applicationInfo adyenPaymentSource should be added to the params
	 * If the config externalPlatform is not set the applicationInfo externalPlatform should not be added to the params
	 *
	 * @covers \Adyen\Service\AbstractResource::handleApplicationInfoInRequest
	 */
	public function testHandleApplicationInfoInRequestShouldAddApplicationInfoAdyenPaymentSourceToParams()
	{
		$params = array();

		$expectedArraySubset = array(
			"applicationInfo" => array(
				"adyenPaymentSource" => array(
					"name" => "name-test",
					"version" => "version-test"
				)
			)
		);

		// Mock client without the Test ini settings
		$mockedClient = $this->createClientWithoutTestIni();

		$mockedClient->setAdyenPaymentSource("name-test", "version-test");

		// Mock abstract class with mocked client and $paramsToFilter parameters
		$mockedClass = $this->getMockForAbstractClass($this->className, array((new \Adyen\Service($mockedClient)), "", true));

		// Get private method as testable public method
		$method = $this->getMethod($this->className, "handleApplicationInfoInRequest");

		// Test against function
		$result = $method->invokeArgs($mockedClass, array($params));

		$this->assertArrayHasKey("applicationInfo", $result);
		$this->assertArraySubset($expectedArraySubset, $result);
	}

	/**
	 * If the config adyenPaymentSource integrator is set, the applicationInfo adyenPaymentSource integrator should be
	 * added to the params.
	 *
	 * @covers \Adyen\Service\AbstractResource::handleApplicationInfoInRequest
	 */
	public function testHandleApplicationInfoInRequestShouldAddApplicationInfoAdyenPaymentSourceIntegratorToParams()
	{
		$params = array();

		// Mock client without the Test ini settings
		$mockedClient = $this->createClientWithoutTestIni();

		$mockedClient->setExternalPlatform("name-test", "version-test", "integrator-test");

		// Mock abstract class with mocked client and $paramsToFilter parameters
		$mockedClass = $this->getMockForAbstractClass($this->className, array((new \Adyen\Service($mockedClient)), "", true));

		// Get private method as testable public method
		$method = $this->getMethod($this->className, "handleApplicationInfoInRequest");

		// Test against function
		$result = $method->invokeArgs($mockedClass, array($params));

		$this->assertArrayHasKey("applicationInfo", $result);
		$this->assertArrayHasKey("externalPlatform", $result["applicationInfo"]);
		$this->assertArrayHasKey("integrator", $result["applicationInfo"]["externalPlatform"]);
	}

	/**
	 * If the config adyenPaymentSource integrator is not set, the applicationInfo adyenPaymentSource integrator should
	 * not be added to the params.
	 *
	 * @covers \Adyen\Service\AbstractResource::handleApplicationInfoInRequest
	 */
	public function testHandleApplicationInfoInRequestShouldNotAddApplicationInfoAdyenPaymentSourceIntegratorToParams()
	{
		$params = array();

		// Mock client without the Test ini settings
		$mockedClient = $this->createClientWithoutTestIni();

		$mockedClient->setExternalPlatform("name-test", "version-test");

		// Mock abstract class with mocked client and $paramsToFilter parameters
		$mockedClass = $this->getMockForAbstractClass($this->className, array((new \Adyen\Service($mockedClient)), "", true));

		// Get private method as testable public method
		$method = $this->getMethod($this->className, "handleApplicationInfoInRequest");

		// Test against function
		$result = $method->invokeArgs($mockedClass, array($params));

		$this->assertArrayHasKey("applicationInfo", $result);
		$this->assertArrayHasKey("externalPlatform", $result["applicationInfo"]);
		$this->assertArrayNotHasKey("integrator", $result["applicationInfo"]["externalPlatform"]);
	}
}
