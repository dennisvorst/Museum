<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class BootstrapGridTest extends TestCase
{
    public function testClassBootstrapGrid()
    {
        $this->assertTrue(class_exists("BootstrapGrid"));
    }
}
?>