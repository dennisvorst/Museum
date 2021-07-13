<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CompetitionViewTest extends TestCase
{
    public function testClassCompetitionView()
    {
        $this->assertTrue(class_exists("CompetitionView"));
    }

    public function testClassCompetitionViewCanBeInstatiated()
    {
      $competition['id'] = 1;
      $competition['name'] = "Major League";
      $competition['sub'] = "Baseball";

      $competition['competition'] = $competition;

      $object = new CompetitionView($competition);
      $this->assertInstanceOf(CompetitionView::class, $object);	
    }

    public function testEmptyCompetitionThrowsException()
    {
      $this->expectException(InvalidArgumentException::class);

      $object = new CompetitionView([]);
      $this->assertInstanceOf(CompetitionView::class, $object);	
    }
}
?>