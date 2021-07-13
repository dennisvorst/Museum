<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ListViewTest extends TestCase
{
    public function testClassListView()
    {
        $this->assertTrue(class_exists("ListView"));
    }

    public function testClassListViewCanBeInstatiated()
    {
		$object = new ListView([]);
		$this->assertInstanceOf(ListView::class, $object);	
    }
}
?>