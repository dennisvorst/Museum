<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CompetitionViewTest extends TestCase
{
	protected $_row;

    protected function setUp() : void
    {
		$competition['id'] = 1;
		$competition['name'] = "Major League";
		$competition['sub'] = "Baseball";
  
		$competition['competition'] = $competition;
  
		$this->_row['competition'] = $competition;
    }

    public function testClassCompetitionView()
    {
        $this->assertTrue(class_exists("CompetitionView"));
    }

    public function testClassCompetitionViewCanBeInstatiated()
    {

      $object = new CompetitionView($this->_row);
      $this->assertInstanceOf(CompetitionView::class, $object);	
    }

    public function testEmptyCompetitionThrowsException()
    {
      $this->expectException(InvalidArgumentException::class);
      $object = new CompetitionView([]);
    }

	/** show */
	public function testFunctionShowReturnsString()
	{
		$object = new CompetitionView($this->_row);
		$actual = $object->show();
		$this->assertIsString($actual);	
	}

	/** thumbnail */
	public function testFunctionShowThumbnailReturnsString()
	{
		$object = new CompetitionView($this->_row);
		$actual = $object->showThumbnail();
		$this->assertIsString($actual);	
	}
}
?>