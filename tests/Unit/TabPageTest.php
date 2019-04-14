<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class TabPageTest extends TestCase
{
    public function testClassTabPageExists()
    {
        $this->assertTrue(class_exists("TabPage"));
    }
    public function testOneTabMustBeActive()
    {
        $this->assertTrue(false);
    }
}
?>