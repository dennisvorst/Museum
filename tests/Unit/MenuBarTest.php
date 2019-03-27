<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class MenuBarTest extends TestCase
{
    public function testClassMenuBarExists()
    {
        $this->assertTrue(class_exists("MenuBar"));
    }
}
?>