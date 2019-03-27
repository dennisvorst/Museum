<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PersonsTest extends TestCase
{
    public function testClassPersonsExists()
    {
        $this->assertTrue(class_exists("Persons"));
    }
}
?>