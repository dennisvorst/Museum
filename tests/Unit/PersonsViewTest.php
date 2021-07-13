<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PersonsViewTest extends TestCase
{
    public function testClassPersonsView()
    {
        $this->assertTrue(class_exists("PersonsView"));
    }

    public function testClassPersonsViewCanBeInstatiated()
    {
		$object = new PersonsView([]);
		$this->assertInstanceOf(PersonsView::class, $object);	
    }
}
?>