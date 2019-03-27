<?php

namespace Test\Miac;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;

class BaseTestCase extends TestCase
{
    /**
     * Get a protected or private method from given class
     *
     * @param string $helper
     * @param string $name
     * @return ReflectionMethod
     * @throws \ReflectionException
     */
    protected static function getMethod($helper, $name)
    {
        $method = new ReflectionMethod($helper, $name);
        $method->setAccessible(true);
        return $method;
    }

    /**
     * Get a protected or private property from given class
     *
     * @param string $helper
     * @param string $name
     * @return ReflectionProperty
     * @throws \ReflectionException
     */
    protected static function getProperty($helper, $name)
    {
        $property = new ReflectionProperty($helper, $name);
        $property->setAccessible(true);
        return $property;
    }

    /**
     * @param $fileName
     * @return string
     * @throws \ReflectionException
     */
    protected function getTestFile($fileName)
    {
        $reflector = new ReflectionClass(get_class($this));
        $path = dirname($reflector->getFileName());
        $fullPath = realpath($path . DIRECTORY_SEPARATOR . "testfiles" . DIRECTORY_SEPARATOR . $fileName);
        return file_get_contents($fullPath);
    }
    /**
     * @param $theArray
     * @param $theObject
     * @return bool
     */
    protected function assertArrayContainsSameObject($theArray, $theObject)
    {
        foreach($theArray as $arrayItem) {
            if($arrayItem == $theObject) {
                return true;
            }
        }
        return false;
    }
}