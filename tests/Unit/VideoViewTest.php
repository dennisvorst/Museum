<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class VideoViewTest extends TestCase
{
	protected $_row;

    protected function setUp() : void
    {
		$video['id'] = 1;
		$video['name'] = "Angels in the outfield";
		$video['url'] = "qwerty";
  
		$this->_row['video'] = $video;
    }

    public function testClassVideoView()
    {
        $this->assertTrue(class_exists("VideoView"));
    }

    public function testClassVideoViewCanBeInstatiated()
    {
 		$object = new VideoView($this->_row);
	  	$this->assertInstanceOf(VideoView::class, $object);	
    }

    public function testEmptyVideoThrowsException()
    {
		$this->expectException(InvalidArgumentException::class);
		$object = new VideoView([]);
    }

	/** show */
	public function testFunctionShowReturnsString()
	{
		$object = new VideoView($this->_row);
		$actual = $object->show();
		$this->assertIsString($actual);	
	}

	/** thumbnail */
	public function testFunctionShowThumbnailReturnsString()
	{
		$object = new VideoView($this->_row);
		$actual = $object->showThumbnail();
		$this->assertIsString($actual);	
	}
}
?>