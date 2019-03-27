<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class StatTest extends TestCase
{
    public function testClassStatExists()
    {
        $this->assertTrue(class_exists("Stat"));
    }
}
?>