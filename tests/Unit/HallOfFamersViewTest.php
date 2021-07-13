<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HallOfFamersViewTest extends TestCase
{
    public function testClassHallOfFamersView()
    {
        $this->assertTrue(class_exists("HallOfFamersView"));
    }
}
?>