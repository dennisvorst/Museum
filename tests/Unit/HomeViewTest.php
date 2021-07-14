<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HomeViewTest extends TestCase
{
	protected $_row;

    protected function setUp() : void
    {
		$home['articles'] = [];
		$home['clubs'] = [];
		$home['persons'] = [];
		$home['photos'] = [];
		$home['videos'] = [];
  
		$this->_row = $home;
    }
	
    public function testClassHomeView()
    {
        $this->assertTrue(class_exists("HomeView"));
    }

    public function testClassHomeViewCanBeInstatiated()
    {
		$object = new HomeView($this->_row);
	  	$this->assertInstanceOf(HomeView::class, $object);	
    }

    public function testEmptyHomeThrowsException()
    {
		$this->expectException(InvalidArgumentException::class);
		$object = new HomeView([]);
	}
}
?>