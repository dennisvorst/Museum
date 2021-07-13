<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PhotoViewTest extends TestCase
{
    public function testClassPhotoView()
    {
        $this->assertTrue(class_exists("PhotoView"));
    }
}
?>