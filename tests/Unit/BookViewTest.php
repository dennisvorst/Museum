<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class BookViewTest extends TestCase
{
    public function testClassBookView()
    {
        $this->assertTrue(class_exists("BookView"));
    }

    public function testClassBookViewCanBeInstatiated()
    {
		$object = new BookView([]);
		$this->assertInstanceOf(BookView::class, $object);	
    }
}
?>