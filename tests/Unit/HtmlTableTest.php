<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlTableTest extends TestCase
{
    public function testClassHtmlTableExists()
    {
        $this->assertTrue(class_exists("HtmlTable"));
    }

    public function testClassHtmlTableAllowsNullParameters()
    {
        $object = new HtmlTable();
		$actual = $object->getElement();
        $expected = "<table></table>";
        $this->assertEquals($expected, $actual);
    }

    public function testClassHtmlTableAllowsMultipleParameters()
    {
        $object = new HtmlTable(["id" => "myTable", "style" => "someStyle"]);
		$actual = $object->getElement();
        $expected = "<table id='myTable' style='someStyle'></table>";
        $this->assertEquals($expected, $actual);
    }
}
?>