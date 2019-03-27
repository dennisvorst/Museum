<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PhotoTest extends TestCase
{
    public function testClassPhotoExists()
    {
        $this->assertTrue(class_exists("Photo"));
    }
}
?>