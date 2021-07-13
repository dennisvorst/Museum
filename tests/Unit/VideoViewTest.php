<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class VideoViewTest extends TestCase
{
    public function testClassVideoView()
    {
        $this->assertTrue(class_exists("VideoView"));
    }
}
?>