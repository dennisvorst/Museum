<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ClubViewTest extends TestCase
{
    public function testClassClubView()
    {
        $this->assertTrue(class_exists("ClubView"));
    }

    public function testClassClubViewCanBeInstatiated()
    {
      $club['id'] = 1;
      $club['name'] = "Oakland Athletics";

      $club['club'] = $club;

  		$object = new ClubView($club);
	  	$this->assertInstanceOf(ClubView::class, $object);	
    }

    public function testEmptyClubThrowsException()
    {
      $this->expectException(InvalidArgumentException::class);

      $object = new ClubView([]);
      $this->assertInstanceOf(ClubView::class, $object);	
    }
}
?>