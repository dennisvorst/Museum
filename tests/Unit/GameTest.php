<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testClassExists()
    {
        $this->assertTrue(class_exists("Game"));
    }
}
?>