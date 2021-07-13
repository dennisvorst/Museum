<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    public function testClassDate()
    {
        $this->assertTrue(class_exists("Date"));
    }
}
?>