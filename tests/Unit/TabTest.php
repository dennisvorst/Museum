<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class TabTest extends TestCase
{
    public function testClassTabExists()
    {
        $this->assertTrue(class_exists("Tab"));
    }
}
?>