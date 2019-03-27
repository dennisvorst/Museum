<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ClubsTest extends TestCase
{
    public function testClassClubsExists()
    {
        $this->assertTrue(class_exists("Clubs"));
    }
}
?>