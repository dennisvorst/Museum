<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlTableCellTest extends TestCase
{
    public function testClassHtmlTableCellExists()
    {
        $this->assertTrue(class_exists("HtmlTableCell"));
    }

	/* function tests */
	public function testConstructAcceptsNoParameters()
	{
		$htmlCell = new HtmlTableCell();
		$actual = $htmlCell->getElement();
		$expected = "<td></td>";
		$this->assertEquals($expected, $actual);
	}

	public function testConstructAcceptsTwoParameters()
	{
		$htmlCell = new HtmlTableCell("", []);
		$actual = $htmlCell->getElement();
		$expected = "<td></td>";
		$this->assertEquals($expected, $actual);
	}

	public function testConstructAcceptsThreeParameters()
	{
		$htmlCell = new HtmlTableCell("", [], "");
		$actual = $htmlCell->getElement();
		$expected = "<td></td>";
		$this->assertEquals($expected, $actual);
	}

	/* reguilar cell tests */
	public function testRegularCellCanBeEmpty()
	{
		$htmlCell = new HtmlTableCell("");
		$actual = $htmlCell->getElement();
		$expected = "<td></td>";
		$this->assertEquals($expected, $actual);
	}

	public function testRegularCellCanContainValue()
	{
		$htmlCell = new HtmlTableCell("Value");
		$actual = $htmlCell->getElement();
		$expected = "<td>Value</td>";
		$this->assertEquals($expected, $actual);
	}

	public function testRegularCellCanContainValueAndAttributes()
	{
		$htmlCell = new HtmlTableCell("Value", ["colspan" => "2", "rowspan" => "3", "headers" => "someHeader", "class"  => "someClass", "Flupr" => "flarp"]);
		$actual = $htmlCell->getElement();
		$expected = "<td colspan='2' rowspan='3' headers='someHeader' class='someClass'>Value</td>";
		$this->assertEquals($expected, $actual);
	}

	/* header cell tests */
	public function testHeaderCellCanBeEmpty()
	{
		$htmlCell = new HtmlTableCell("", null, "H");
		$actual = $htmlCell->getElement();
		$expected = "<th></th>";
		$this->assertEquals($expected, $actual);
	}

	public function testHeaderCellCanCanContainValue()
	{
		$htmlCell = new HtmlTableCell("Value", null, "H");
		$actual = $htmlCell->getElement();
		$expected = "<th>Value</th>";
		$this->assertEquals($expected, $actual);
	}
}
?>