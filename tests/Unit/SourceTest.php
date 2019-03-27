<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class SourceTest extends TestCase
{
    public function testClassSourceExists()
    {
        $this->assertTrue(class_exists("Source"));
    }
}
?>