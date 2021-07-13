<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlTableTest extends TestCase
{
    public function testClassHtmlTable()
    {
        $this->assertTrue(class_exists("HtmlTable"));
    }
}
?>