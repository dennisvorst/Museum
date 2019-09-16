<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlTableRowTest extends TestCase
{
    public function testClassHtmlTableRowExists()
    {
        $this->assertTrue(class_exists("HtmlTableRow"));
    }

    public function testClassHtmlTableRowAllowsOneParameter()
    {
        $object = new HtmlTableRow(["1", "2"]);

        $actual = $object->getElement();
        $expected = "<tr><td>1</td><td>2</td></tr>\n";
        $this->assertEquals($expected, $actual);
    }

    public function testClassHtmlTableAllowsMultipleParameters()
    {
        $object = new HtmlTableRow(["1", "2"], ["id" => "myRow"]);

        $actual = $object->getElement();
        $expected = "<tr id='myRow'><td>1</td><td>2</td></tr>\n";
        $this->assertEquals($expected, $actual);
    }
}
?>