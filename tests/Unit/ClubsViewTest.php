<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ClubsViewTest extends TestCase
{
    public function testClassClubsView()
    {
        $this->assertTrue(class_exists("ClubsView"));
    }
}
?>