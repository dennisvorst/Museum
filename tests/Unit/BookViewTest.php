<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class BookViewTest extends TestCase
{
	protected $_row;

    protected function setUp() : void
    {
		$book['id'] = 1;

		$this->_row['book'] = $book;
    }

	public function testClassBookViewExists()
    {
        $this->assertTrue(class_exists("BookView"));
    }

    public function testClassBookViewCanBeInstatiated()
    {
		$object = new BookView($this->_row);
		$this->assertInstanceOf(BookView::class, $object);	
    }

    public function testEmptyArrayThrowsException()
    {
		$this->expectException(InvalidArgumentException::class);
		$object = new BookView([]);
	}

    public function testEmptyBookThrowsException()
    {
		$this->expectException(InvalidArgumentException::class);
		$row['book'] = [];
		$object = new BookView($row);
    }

	/** show */
	public function testFunctionShowReturnsString()
	{
		$object = new BookView($this->_row);
		$actual = $object->show();
		$this->assertIsString($actual);	
	}

	/** thumbnail */
	public function testFunctionShowThumbnailReturnsString()
	{
		$object = new BookView($this->_row);
		$actual = $object->showThumbnail();
		$this->assertIsString($actual);	
	}
}
?>