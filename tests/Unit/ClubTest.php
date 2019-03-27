<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ClubTest extends TestCase
{
    public function testClassClubExists()
    {
        $this->assertTrue(class_exists("Club"));
    }
}
?>