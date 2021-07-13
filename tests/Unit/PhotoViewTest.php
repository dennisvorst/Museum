<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PhotoViewTest extends TestCase
{
    public function testClassPhotoView()
    {
        $this->assertTrue(class_exists("PhotoView"));
    }

    public function testClassPhotoViewCanBeInstatiated()
    {
      $photo['id'] = 1;

      $photo['photo'] = $photo;
  		$object = new PhotoView($photo);
  		$this->assertInstanceOf(PhotoView::class, $object);	
    }

    public function testEmptyPhotoThrowsException()
    {
      $this->expectException(InvalidArgumentException::class);

      $object = new PhotoView([]);
    }
}
?>