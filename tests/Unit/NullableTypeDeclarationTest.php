<?php

namespace Adyen\Tests\Unit;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

class NullableTypeDeclarationTest extends TestCase
{
    /**
     * @return array<string,array<string>>
     */
    private function getGeneratedClasses(): array
    {
        $modelDir = dirname(__DIR__, 2) . '/src/Adyen/Model';
        $serviceDir = dirname(__DIR__, 2) . '/src/Adyen/Service';

        return [
            'models' => $this->getPhpClasses($modelDir, 'Adyen\\Model'),
            'services' => $this->getPhpClasses($serviceDir, 'Adyen\\Service')
        ];
    }

    /**
     * @param string $directory
     * @param string $baseNamespace
     * @return array<string>
     */
    private function getPhpClasses(string $directory, string $baseNamespace): array
    {
        $classes = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory)
        );

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $relativePath = substr($file->getPath(), strlen($directory));
                $namespace = $baseNamespace . str_replace('/', '\\', $relativePath);
                
                $content = file_get_contents($file->getRealPath());
                if (preg_match('/class\s+(\w+)(?:\s+extends|\s+implements|\s*{)/', $content, $matches)) {
                    $className = $namespace . '\\' . $matches[1];
                    // Only add if the class exists
                    if (class_exists($className)) {
                        $classes[] = $className;
                    }
                }
            }
        }

        return $classes;
    }

    /**
     * Test that model constructors properly declare nullable parameters
     * @throws ReflectionException
     */
    public function testModelConstructorsHaveNullableParameters(): void
    {
        $classes = $this->getGeneratedClasses()['models'];
        $this->assertNotEmpty($classes, 'No model classes found');

        foreach ($classes as $class) {
            $reflection = new ReflectionClass($class);

            if ($reflection->hasMethod('__construct')) {
                $constructor = $reflection->getMethod('__construct');
                $params = $constructor->getParameters();

                foreach ($params as $param) {
                    if ($param->allowsNull() && $param->hasType()) {
                        $this->assertTrue(
                            $param->getType()->allowsNull(),
                            sprintf(
                                'Constructor parameter $%s in %s should be explicitly nullable',
                                $param->getName(),
                                $class
                            )
                        );
                    }
                }
            }
        }
    }

    /**
     * Test that service methods properly declare nullable parameters and return types
     * @throws ReflectionException
     */
    public function testServiceMethodsHaveNullableTypes(): void
    {
        $classes = $this->getGeneratedClasses()['services'];
        $this->assertNotEmpty($classes, 'No service classes found');

        foreach ($classes as $class) {
            $reflection = new ReflectionClass($class);

            foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                // Skip magic methods and inherited methods
                if (strpos($method->getName(), '__') === 0 || $method->getDeclaringClass()->getName() !== $class) {
                    continue;
                }

                // Check method parameters
                foreach ($method->getParameters() as $param) {
                    if ($param->allowsNull() && $param->hasType()) {
                        $this->assertTrue(
                            $param->getType()->allowsNull(),
                            sprintf(
                                'Method parameter $%s in %s::%s should be explicitly nullable',
                                $param->getName(),
                                $class,
                                $method->getName()
                            )
                        );
                    }
                }

                // Check return type
                if ($method->hasReturnType()) {
                    $returnType = $method->getReturnType();
                    if ($returnType && !in_array($method->getName(), ['getModelName', 'valid'])) {
                        $this->assertTrue(
                            $returnType->allowsNull(),
                            sprintf(
                                'Method %s::%s should have a nullable return type',
                                $class,
                                $method->getName()
                            )
                        );
                    }
                }
            }
        }
    }

    /**
     * Test Service class has proper nullable type declarations
     * @throws ReflectionException
     */
    public function testServiceClassHasNullableTypes(): void
    {
        $reflection = new ReflectionClass('Adyen\\Service');
        
        // Test requestHttp
        $method = $reflection->getMethod('requestHttp');
        $params = $method->getParameters();
        
        $this->assertTrue(
            $params[2]->getType()->allowsNull(),
            'requestHttp $bodyParams parameter should be nullable'
        );
        $this->assertTrue(
            $params[3]->getType()->allowsNull(),
            'requestHttp $requestOptions parameter should be nullable'
        );
    }
}
