<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CompetitionsViewTest extends TestCase
{
    public function testClassCompetitionsView()
    {
        $this->assertTrue(class_exists("CompetitionsView"));
    }

    public function testClassCompetitionsViewCanBeInstatiated()
    {
      $object = new CompetitionsView([]);
      $this->assertInstanceOf(CompetitionsView::class, $object);	
    }
}
?>