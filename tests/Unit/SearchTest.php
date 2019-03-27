<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    public function testClassSearchExists()
    {
        $this->assertTrue(class_exists("Search"));
    }
}
?>