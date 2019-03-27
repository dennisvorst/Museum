<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PhotosTest extends TestCase
{
    public function testClassPhotosExists()
    {
        $this->assertTrue(class_exists("Photos"));
    }
}
?>