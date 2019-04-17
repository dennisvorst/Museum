<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlTabElementTest extends TestCase
{
	public function testClassHtmlTabElementExists()
	{
		$this->assertTrue(class_exists("HtmlTabElement"));
	}

    /**
     * @expectException TypeError
     */
	public function testReferenceParameterCannotBeNull(){
		$this->expectException('TypeError');
		$object = new HtmlTabElement(null, "title", "content");
	}

    /**
     * @expectException InvalidArgumentException	
     */
	public function testReferenceParameterCannotBeEmptyString()
	{
		$this->expectException('InvalidArgumentException');
		$object = new HtmlTabElement("", "title", "content");
	}

	/** setActive tests  */
	public function testSetActiveMakesTrue()
	{
		$object = new HtmlTabElement("reference", "title", "content", false);
		$object->setActive();
		$this->assertTrue($object->isActive());
	}

	/** setInactive tests  */
	public function testSetInactiveMakesTrue()
	{
		$object = new HtmlTabElement("reference", "title", "content", true);
		$object->setInactive();
		$this->assertFalse($object->isActive());
	}
}
?>