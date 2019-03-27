<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HallOfFamersTest extends TestCase
{
    public function testClassHallOfFamersExists()
    {
        $this->assertTrue(class_exists("HallOfFamers"));
    }
}
?>