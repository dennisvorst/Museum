<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ContactViewTest extends TestCase
{
    public function testClassContactView()
    {
        $this->assertTrue(class_exists("ContactView"));
    }

    public function testClassContactViewCanBeInstatiated()
    {
		$object = new ContactView([]);
		$this->assertInstanceOf(ContactView::class, $object);	
    }
}
?>