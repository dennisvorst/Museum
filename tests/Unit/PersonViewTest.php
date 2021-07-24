<?php
/** todo mock all inner views */
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PersonViewTest extends TestCase
{
	protected $_row;

    protected function setUp() : void
    {
		$person['id'] = 1;
		$person['firstName'] = "Hank";
		$person['lastName'] = "Aaron";
  
		$this->_row['person'] = $person;
    }

	public function testClassPersonViewExists()
    {
        $this->assertTrue(class_exists("PersonView"));
    }

    public function testClassPersonViewCanBeInstatiated()
    {
		$object = new PersonView($this->_row);
		$this->assertInstanceOf(PersonView::class, $object);	
    }

    public function testEmptyPersonThrowsException()
    {
		$this->expectException(InvalidArgumentException::class);
		$object = new PersonView([]);
    }

	/** show */
	public function testFunctionShowReturnsString()
	{
		$object = new PersonView($this->_row);
		$actual = $object->show();
		$this->assertIsString($actual);	
	}

	/** thumbnail */
	public function testFunctionShowThumbnailReturnsString()
	{
		$object = new PersonView($this->_row);
		$actual = $object->showThumbnail();
		$this->assertIsString($actual);	
	}
}
?>