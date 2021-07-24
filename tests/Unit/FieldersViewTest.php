<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FieldersViewTest extends TestCase
{
    public function testClassFieldersView()
    {
        $this->assertTrue(class_exists("FieldersView"));
    }

    public function testClassFieldersViewCanBeInstatiated()
    {
		$object = new FieldersView([]);
		$this->assertInstanceOf(FieldersView::class, $object);	
    }
}
?>