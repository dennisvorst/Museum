<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GamesTest extends TestCase
{
    public function testClassGamesExists()
    {
        $this->assertTrue(class_exists("Games"));
    }
}
?>