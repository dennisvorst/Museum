<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class MediaViewTest extends TestCase
{
    public function testClassMediaView()
    {
        $this->assertTrue(class_exists("MediaView"));
    }
}
?>