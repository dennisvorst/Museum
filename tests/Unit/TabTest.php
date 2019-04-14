<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class TabTest extends TestCase
{
	public function testClassTabExists()
	{
		$this->assertTrue(class_exists("Tab"));
	}

	public function testReferenceIsMandatory(){
		$this->assertTrue(false);
	}
	public function testTitleIsMandatory(){
		$this->assertTrue(false);
	}
	public function testContentIsMandatory(){
		$this->assertTrue(false);
	}
	public function testReferenceCannnotBeNumeric(){
		$this->assertTrue(false);
	}
	public function testTabButtonIsReturned(){
		$this->assertTrue(false);
	}
	public function testContentIsReturned(){
		$this->assertTrue(false);
	}
}
?>