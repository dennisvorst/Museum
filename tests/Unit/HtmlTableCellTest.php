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
	public function testConstructAcceptsOnlyOneParameter()
	{
		$htmlCell = new HtmlTableCell("");
		$actual = $htmlCell->getCell();
		$expected = "<td></td>";
		$this->assertEquals($expected, $actual);
	}

	public function testConstructAcceptsTwoParameters()
	{
		$htmlCell = new HtmlTableCell("", "");
		$actual = $htmlCell->getCell();
		$expected = "<td></td>";
		$this->assertEquals($expected, $actual);
	}

	public function testConstructAcceptsThreeParameters()
	{
		$htmlCell = new HtmlTableCell("", "", False);
		$actual = $htmlCell->getCell();
		$expected = "<td></td>";
		$this->assertEquals($expected, $actual);
	}

	/* reguilar cell tests */
	public function testRegularCellCanBeEmpty()
	{
		$htmlCell = new HtmlTableCell("");
		$actual = $htmlCell->getCell();
		$expected = "<td></td>";
		$this->assertEquals($expected, $actual);
	}

	public function testRegularCellCanCanContainValue()
	{
		$htmlCell = new HtmlTableCell("Value");
		$actual = $htmlCell->getCell();
		$expected = "<td>Value</td>";
		$this->assertEquals($expected, $actual);
	}

	/* header cell tests */
	public function testHeaderCellCanBeEmpty()
	{
		$htmlCell = new HtmlTableCell("", null, true);
		$actual = $htmlCell->getCell();
		$expected = "<th></th>";
		$this->assertEquals($expected, $actual);
	}

	public function testHeaderCellCanCanContainValue()
	{
		$htmlCell = new HtmlTableCell("Value", null, true);
		$actual = $htmlCell->getCell();
		$expected = "<th>Value</th>";
		$this->assertEquals($expected, $actual);
	}
}
?>