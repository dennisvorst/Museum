<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CompetitionTest extends TestCase
{
    public function testClassCompetitionExists()
    {
        $this->assertTrue(class_exists("Competition"));
    }
}
?>