<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HallOfFamersViewTest extends TestCase
{
    public function testClassHallOfFamersView()
    {
        $this->assertTrue(class_exists("HallOfFamersView"));
    }

    public function testClassHallOfFamersViewCanBeInstatiated()
    {
		$object = new HallOfFamersView([]);
		$this->assertInstanceOf(HallOfFamersView::class, $object);	
    }
}
?>