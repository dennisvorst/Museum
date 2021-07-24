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
		$actual = $object->show();
		$this->assertIsString($actual);	
	}

	/** thumbnail */
	public function testFunctionShowThumbnailReturnsString()
	{
		$object = new PhotoView($this->_row);
		$actual = $object->showThumbnail();
		$this->assertIsString($actual);	
	}

	/** showPhoto */
	public function testFunctionShowPhotoReturnsString()
	{
		$object = new PhotoView($this->_row);

		/** without alternative text */
		$actual = $object->showPhoto();
		$this->assertIsString($actual);	

		$expected = "<img src='./images/photos/1.jpg' class='rounded'>"; 
		$this->assertEquals($actual, $expected);	

		/** with alternative text */
		$object = new PhotoView($this->_row);
		$actual = $object->showPhoto("some text");
		$this->assertIsString($actual);	

		$expected = "<img src='./images/photos/1.jpg' class='rounded' alt='some text'>"; 
		$this->assertEquals($actual, $expected);	
	}


	/** showThumbnailPhoto */
	public function testFunctionShowThumbnailPhotoReturnsString()
	{
		/** without alternative text */
		$object = new PhotoView($this->_row);
		$actual = $object->showThumbnailPhoto();
		$this->assertIsString($actual);	

		$expected = "<img src='./images/thumbnails/1.jpg' class='rounded'>"; 
		$this->assertEquals($actual, $expected);	

		/** with alternative text */
		$object = new PhotoView($this->_row);
		$actual = $object->showThumbnailPhoto("some text");
		$this->assertIsString($actual);	

		$expected = "<img src='./images/thumbnails/1.jpg' class='rounded' alt='some text'>"; 
		$this->assertEquals($actual, $expected);	
	}


}
?>