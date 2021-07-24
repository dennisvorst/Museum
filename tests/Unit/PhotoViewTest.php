<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PhotoViewTest extends TestCase
{
	protected $_row;

    protected function setUp() : void
    {
		$photo['id'] = 1;
		$photo['photo'] = $photo;

		$this->_row['photo'] = $photo;
    }

    public function testClassPhotoViewExists()
    {
        $this->assertTrue(class_exists("PhotoView"));
    }

    public function testClassPhotoViewCanBeInstatiated()
    {
  		$object = new PhotoView($this->_row);
  		$this->assertInstanceOf(PhotoView::class, $object);	
    }

    public function testEmptyPhotoThrowsException()
    {
      $this->expectException(InvalidArgumentException::class);
      $object = new PhotoView([]);
    }

	/** show */
	public function testFunctionShowReturnsString()
	{
		$object = new PhotoView($this->_row);
		$actual = $object->show("some text");
		$this->assertIsString($actual);	
	}

	/** thumbnail */
	public function testFunctionShowThumbnailReturnsString()
	{
		$object = new PhotoView($this->_row);
		$actual = $object->showThumbnail();
		$this->assertIsString($actual);	
	}
}
?>