<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class StatisticTest extends TestCase
{
    public function testClassStatExists()
    {
        $this->assertTrue(class_exists("Statistic"));
    }
}
?>