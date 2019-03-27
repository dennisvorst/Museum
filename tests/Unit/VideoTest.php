<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase
{
    public function testClassVideoExists()
    {
        $this->assertTrue(class_exists("Videos"));
    }
}
?>