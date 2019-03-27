<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testClassPersonExists()
    {
        $this->assertTrue(class_exists("Person"));
    }
}
?>