<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CompetitionViewTest extends TestCase
{
    public function testClassCompetitionView()
    {
        $this->assertTrue(class_exists("CompetitionView"));
    }
}
?>