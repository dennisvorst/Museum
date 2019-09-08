<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlTableRowTest extends TestCase
{
    public function testClassHtmlTableRowExists()
    {
        $this->assertTrue(class_exists("HtmlTableRow"));
    }
}
?>