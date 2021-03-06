<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class VideosViewTest extends TestCase
{
    public function testClassVideosView()
    {
        $this->assertTrue(class_exists("VideosView"));
    }

    public function testClassVideosViewCanBeInstatiated()
    {
		$object = new VideosView([]);
		$this->assertInstanceOf(VideosView::class, $object);	
    }
}
?>