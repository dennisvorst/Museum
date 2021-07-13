<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PhotosViewTest extends TestCase
{
    public function testClassPhotosView()
    {
        $this->assertTrue(class_exists("PhotosView"));
    }

    public function testClassPhotosViewCanBeInstatiated()
    {
		$object = new PhotosView([]);
		$this->assertInstanceOf(PhotosView::class, $object);	
    }
}
?>