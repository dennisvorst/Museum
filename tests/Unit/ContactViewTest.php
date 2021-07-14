<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ContactViewTest extends TestCase
{
	public function testClassContactViewExists()
	{
		$this->assertTrue(class_exists("ContactView"));
	}

	public function testClassContactViewCanBeInstatiated()
	{
		$object = new ContactView([]);
		$this->assertInstanceOf(ContactView::class, $object);	
	}

	/** show */
	public function testFunctionShowReturnsString()
	{
		$object = new ContactView();
		$actual = $object->show();
		$this->assertIsString($actual);	
	}

	/** thumbnail */
	public function testFunctionShowThumbnailReturnsString()
	{
		$this->expectException(Exception::class);
		$object = new ContactView();
		$actual = $object->showThumbnail();
	}	
}
?>