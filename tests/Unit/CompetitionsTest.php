<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CompetitionsTest extends TestCase
{
    public function testClassCompetitionsExists()
    {
        $this->assertTrue(class_exists("Competitions"));
    }
}
?>