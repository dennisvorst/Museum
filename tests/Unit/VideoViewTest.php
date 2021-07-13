<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class VideoViewTest extends TestCase
{
    public function testClassVideoView()
    {
        $this->assertTrue(class_exists("VideoView"));
    }

    public function testClassVideoViewCanBeInstatiated()
    {
      $video['id'] = 1;
      $video['name'] = "Angels in the outfield";
      $video['url'] = "qwerty";

      $video['video'] = $video;

  		$object = new VideoView($video);
	  	$this->assertInstanceOf(VideoView::class, $object);	
    }

    public function testEmptyVideoThrowsException()
    {
      $this->expectException(InvalidArgumentException::class);

      $object = new VideoView([]);
    }
}
?>