<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HomeViewTest extends TestCase
{
    public function testClassHomeView()
    {
        $this->assertTrue(class_exists("HomeView"));
    }
}
?>