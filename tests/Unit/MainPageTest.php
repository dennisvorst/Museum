<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class MainPageTest extends TestCase
{
    public function testClassMainPageExists()
    {
        $this->assertTrue(class_exists("MainPage"));
    }
}
?>