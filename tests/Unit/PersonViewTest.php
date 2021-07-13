<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PersonViewTest extends TestCase
{
    public function testClassPersonView()
    {
        $this->assertTrue(class_exists("PersonView"));
    }

    public function testClassPersonViewCanBeInstatiated()
    {
      $person['id'] = 1;
      $person['firstName'] = "Hank";
      $person['lastName'] = "Aaron";

      $person['person'] = $person;

      $object = new PersonView($person);
      $this->assertInstanceOf(PersonView::class, $object);	
    }

    public function testEmptyPersonThrowsException()
    {
      $this->expectException(InvalidArgumentException::class);

      $object = new PersonView([]);
    }
}
?>