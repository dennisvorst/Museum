<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class MenuTest extends TestCase
{
    public function testClassMenuExists()
    {
        $this->assertTrue(class_exists("Menu"));
    }
}
?>