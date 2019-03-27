<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class VideosTest extends TestCase
{
    public function testClassVideosExists()
    {
        $this->assertTrue(class_exists("Videos"));
    }
}
?>