<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class StatsTest extends TestCase
{
    public function testClassStatsExists()
    {
        $this->assertTrue(class_exists("Stats"));
    }
}
?>