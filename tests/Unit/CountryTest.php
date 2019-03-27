<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    public function testClassCountryExists()
    {
        $this->assertTrue(class_exists("Country"));
    }
}
?>