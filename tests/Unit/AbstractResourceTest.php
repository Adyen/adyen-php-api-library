<?php

namespace Adyen;

class AbstractResourceTest extends TestCase
{
	/**
	 * @var string
	 */
	private $className = "Adyen\Service\AbstractResource";

	/**
	 * @var \Adyen\Client
	 */
	private $mockedClient;

	/**
	 * Create mock \Adyen|Client
	 *
	 * @author attilak
	 */
	public function setUp()
	{
		$this->mockedClient = $this->createClientWithoutTestIni();
	}

	/**
	 * In case of empty $paramsToFilter array the function should not filter the $params array
	 *
	 * @author attilak
	 * @covers \Adyen\Service\AbstractResource::filterParams
	 */
	public function testFilterParamsNoFilter()
	{
		$paramsToFilter = array();

		$params = array(
			"topLevelKey" => array(
				"secondLevelKey" => array(
					"thirdLevelKey"
				),
				"secondLevelKey2"
			),
			"topLevelKey2"
		);

		$expectedParamsAfterFilter = array(
			"topLevelKey" => array(
				"secondLevelKey" => array(
					"thirdLevelKey"
				),
				"secondLevelKey2"
			),
			"topLevelKey2"
		);

		// Mock abstract class with mocked client and $paramsToFilter parameters
		$mockedClass = $this->getMockForAbstractClass($this->className, array((new \Adyen\Service($this->mockedClient)), "", $paramsToFilter));

		// Get private method as testable public method
		$method = $this->getMethod($this->className, "filterParams");

		// Test against function
		$result = $method->invokeArgs($mockedClass, array($params));
		$this->assertSame($expectedParamsAfterFilter, $result);
	}

	/**
	 * Test top level filtering
	 * The test supposed to filter out only the keys (and optionally their values) if they are present in the $paramsToFilter
	 * variable
	 *
	 * @author attilak
	 * @covers \Adyen\Service\AbstractResource::filterParams
	 */
	public function testFilterParamsFilterTopLevel()
	{
		$paramsToFilter = array(
			"topLevelKey2"
		);

		$params = array(
			"topLevelKey" => array(
				"secondLevelKey" => array(
					"thirdLevelKey" => 'text',
					"thirdLevelKey2"  => 'text2'
				),
				"secondLevelKey2"  => 'text2'
			),
			"topLevelKey2"  => 'text2'
		);

		$expectedParamsAfterFilter = array(
			"topLevelKey" => array(
				"secondLevelKey" => array(
					"thirdLevelKey" => 'text',
					"thirdLevelKey2"  => 'text2'
				),
				"secondLevelKey2"  => 'text2'
			)
		);

		// Mock abstract class with mocked client and paramsToSend parameters
		$mockedClass = $this->getMockForAbstractClass($this->className, array((new \Adyen\Service($this->mockedClient)), "", $paramsToFilter));

		// Get private method as testable public method
		$method = $this->getMethod($this->className, "filterParams");

		// Test against function
		$result = $method->invokeArgs($mockedClass, array($params));
		$this->assertSame($expectedParamsAfterFilter, $result);
	}

	/**
	 * Test multilevel filtering
	 * The test supposed to filter out only the keys (and optionally their values) if they are present in the $paramsToFilter
	 * variable
	 *
	 * @author attilak
	 * @covers \Adyen\Service\AbstractResource::filterParams
	 */
	public function testFilterParamsFilterMultiLevel()
	{
		$paramsToFilter = array(
			"topLevelKey" => array(
				"secondLevelKey" => array(
					"thirdLevelKey2"
				)
			)
		);

		$params = array(
			"topLevelKey" => array(
				"secondLevelKey" => array(
					"thirdLevelKey" => 'text',
					"thirdLevelKey2"  => 'text2'
				),
				"secondLevelKey2"  => 'text2'
			),
			"topLevelKey2"  => 'text2'
		);

		$expectedParamsAfterFilter = array(
			"topLevelKey" => array(
				"secondLevelKey" => array(
					"thirdLevelKey" => 'text'
				),
				"secondLevelKey2"  => 'text2'
			),
			"topLevelKey2"  => 'text2'
		);

		// Mock abstract class with mocked client and paramsToSend parameters
		$mockedClass = $this->getMockForAbstractClass($this->className, array((new \Adyen\Service($this->mockedClient)), "", $paramsToFilter));

		// Get private method as testable public method
		$method = $this->getMethod($this->className, "filterParams");

		// Test against function
		$result = $method->invokeArgs($mockedClass, array($params));
		$this->assertSame($expectedParamsAfterFilter, $result);
	}

	/**
	 * The function should not modify the existing parameters to the default ones
	 *
	 * @author attilak
	 * @covers \Adyen\Service\AbstractResource::addDefaultParametersToRequest
	 */
	public function testAddDefaultParametersToRequestWithExistingKey()
	{
		$params = array(
			"topLevelKey" => array(
				"secondLevelKey" => array(
					"thirdLevelKey" => 'text'
				),
				"secondLevelKey2"  => 'text2'
			),
			"merchantAccount"  => 'already existing param',
			"applicationInfo" => array(
				"adyenLibrary" => "already existing param"
			)
		);

		$expectedParamsAfterFilter = array(
			"topLevelKey" => array(
				"secondLevelKey" => array(
					"thirdLevelKey" => 'text'
				),
				"secondLevelKey2"  => 'text2'
			),
			"merchantAccount"  => 'already existing param',
			"applicationInfo" => array(
				"adyenLibrary" => "already existing param"
			)
		);

		// Mock abstract class with mocked client and paramsToSend parameters
		$mockedClass = $this->getMockForAbstractClass($this->className, array((new \Adyen\Service($this->mockedClient)), ""));

		// Get private method as testable public method
		$method = $this->getMethod($this->className, "addDefaultParametersToRequest");

		// Test against function
		$result = $method->invokeArgs($mockedClass, array($params));
		$this->assertSame($expectedParamsAfterFilter, $result);
	}

	/**
	 * The function should add the non existing parameters to the array
	 *
	 * @author attilak
	 * @covers \Adyen\Service\AbstractResource::addDefaultParametersToRequest
	 */
	public function testAddDefaultParametersToRequestWithNonExistingKey()
	{
		$params = array(
			"topLevelKey" => array(
				"secondLevelKey" => array(
					"thirdLevelKey" => 'text'
				),
				"secondLevelKey2"  => 'text2'
			),
			"applicationInfo" => array()
		);

		// Mock abstract class with mocked client and paramsToSend parameters
		$mockedClass = $this->getMockForAbstractClass($this->className, array((new \Adyen\Service($this->mockedClient)), ""));

		// Get private method as testable public method
		$method = $this->getMethod($this->className, "addDefaultParametersToRequest");

		// Test against function
		$result = $method->invokeArgs($mockedClass, array($params));

		$this->assertArrayHasKey("adyenLibrary", $result["applicationInfo"]);
	}
}
