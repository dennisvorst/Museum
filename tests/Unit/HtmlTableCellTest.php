<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlTableCellTest extends TestCase
{
    public function testClassHtmlTableCell()
    {
        $this->assertTrue(class_exists("HtmlTableCell"));
    }
}
?>