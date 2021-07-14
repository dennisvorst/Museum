<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ClubViewTest extends TestCase
{
	protected $_row;

	protected function setUp() : void
    {
		$club['id'] = 1;
		$club['name'] = "Oakland Athletics";
  
		$this->_row['club'] = $club;
	}

	public function testClassClubView()
    {
        $this->assertTrue(class_exists("ClubView"));
    }

    public function testClassClubViewCanBeInstatiated()
    {
  		$object = new ClubView($this->_row);
	  	$this->assertInstanceOf(ClubView::class, $object);	
    }

    public function testEmptyClubThrowsException()
    {
      $this->expectException(InvalidArgumentException::class);
      $object = new ClubView([]);
    }

	/** show */
	public function testFunctionShowReturnsString()
	{
		$object = new clubView($this->_row);
		$actual = $object->show();
		$this->assertIsString($actual);	
	}

	/** thumbnail */
	public function testFunctionShowThumbnailReturnsString()
	{
		$object = new ClubView($this->_row);
		$actual = $object->showThumbnail();
		$this->assertIsString($actual);	
	}
}
?>