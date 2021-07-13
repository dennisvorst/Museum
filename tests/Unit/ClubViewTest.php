<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ClubViewTest extends TestCase
{
    public function testClassClubView()
    {
        $this->assertTrue(class_exists("ClubView"));
    }
}
?>