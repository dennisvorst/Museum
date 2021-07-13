<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HomeViewTest extends TestCase
{
    public function testClassHomeView()
    {
        $this->assertTrue(class_exists("HomeView"));
    }

    public function testClassHomeViewCanBeInstatiated()
    {
      $home['articles'] = [];
      $home['clubs'] = [];
      $home['persons'] = [];
      $home['photos'] = [];
      $home['videos'] = [];

      $object = new HomeView($home);

	  	$this->assertInstanceOf(HomeView::class, $object);	
    }

    public function testEmptyHomeThrowsException()
    {
      $this->expectException(InvalidArgumentException::class);

      $object = new HomeView([]);
//      $this->assertInstanceOf(HomeView::class, $object);	
    }
}
?>