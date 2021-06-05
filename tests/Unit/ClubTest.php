<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ClubTest extends TestCase
{
    public function testClassClubExists()
    {
        $this->assertTrue(class_exists("Club"));
    }

    public function testClassHasFunctionGetPhotoCollectionExists()
    {
        $this->assertTrue(method_exists("Club", '_getPhotoCollection'));
    }

    /** testing private classes  */
    public function invokeMethod(&$object, $methodName, array $parameters = [])
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
    
        return $method->invokeArgs($object, $parameters);
    }    
}
?>