<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class MenuBarTest extends TestCase
{
    public function testClassMenuBar()
    {
        $this->assertTrue(class_exists("MenuBar"));
    }
}
?>