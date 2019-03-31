<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testClassPersonExists()
    {
        $this->assertTrue(class_exists("Person"));
    }

    public function testClassHasFunctionGetPhotoCollection()
    {
        $this->assertTrue(method_exists("Person", 'getPhotoCollection'));
    }

}
?>