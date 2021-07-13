<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GamesViewTest extends TestCase
{
    public function testClassGamesView()
    {
        $this->assertTrue(class_exists("GamesView"));
    }
}
?>