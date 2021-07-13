<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class MenuTest extends TestCase
{
    public function testClassMenu()
    {
        $this->assertTrue(class_exists("Menu"));
    }
}
?>