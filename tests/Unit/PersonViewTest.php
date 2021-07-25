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

	/** _getMugshotPhoto */
	public function testFunctionGetMugshotPhotoWithoutAnyPhotosThrowsException()
	{
		/** empty halloffame photo and empty collections */
		$this->expectException(Exception::class);
		$object = new PersonView($this->_row);
		$actual = $object->getMugshotPhoto();
	}


	public function testFunctionGetMugshotPhotoWithoutAnyMugshotThrowsException()
	{
		$this->expectException(Exception::class);
	
		/** empty halloffame photo and collections with a photo that is not a mugshot */
		$photo['photo']['id'] = 2;
		$photo['photo']['isMugshot'] = false;

		$row['person']['id'] = 1;
		$row['person']['firstName'] = "Hank";
		$row['person']['lastName'] = "Aaron";
		$row['photos'][] = $photo;

		$object = new PersonView($row);
		$actual = $object->getMugshotPhoto();
	}


	public function testFunctionGetMugshotPhoto()
	{
		/** returns hallof fame photo when halloffame photo is provided  */
		/** Arrange */ 
		$row['person']['id'] = 1;
		$row['person']['firstName'] = "Hank";
		$row['person']['lastName'] = "Aaron";
		$row['person']['lastName'] = "Aaron";
		$row['hallOfFame']['photo']['id'] = 1;
		$row['hallOfFame']['date'] = "20202002";

		/** Act */
		$object = new PersonView($row);
		$actual = $object->getMugshotPhoto();

		/** assert of type PhotoView */
		$this->assertInstanceOf(PhotoView::class, $actual);

		/** Assert */
		$actual = $actual->showPhoto();
		$expected = "<img src='./images/photos/1.jpg' class='rounded'>";
		$this->assertEquals($actual, $expected);

		/** returns first photo when no hall of fame photo is provided and the first itemin the collection is of type mugshot */
		/** Arrange */ 
		unset($row['hallOfFame']);
		$photo['photo']['id'] = 2;
		$photo['photo']['isMugshot'] = true;
		$row['photos'][] = $photo;

		/** Act */
		$object = new PersonView($row);
		$actual = $object->getMugshotPhoto();

		/** assert of type PhotoView */
		$actual = $actual->showPhoto();
		$expected = "<img src='./images/photos/2.jpg' class='rounded'>";
		$this->assertEquals($actual, $expected);

		// /** returns second photo when no hall of fame photo is provided and the first item in the collection is not of type mugshot but the second is */
		// /** Arrange */ 
		// unset($row['photos']);
		// $photo['photo']['id'] = 2;
		// $photo['photo']['isMugshot'] = false;
		// $row['photos'][] = $photo;
		// $photo['photo']['id'] = 3;
		// $photo['photo']['isMugshot'] = true;
		// $row['photos'][] = $photo;

		// /** Act */
		// $object = new PersonView($row);
		// $actual = $object->getMugshotPhoto();

		// /** assert of type PhotoView */
		// $actual = $actual->showPhoto();
		// $expected = "<img src='./images/photos/3.jpg' class='rounded'>";
		// $this->assertEquals($actual, $expected);
		
	}
}
?>