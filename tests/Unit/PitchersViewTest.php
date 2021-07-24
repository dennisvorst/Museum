<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PitchersViewTest extends TestCase
{
    public function testClassPitchersView()
    {
        $this->assertTrue(class_exists("PitchersView"));
    }

    public function testClassPitchersViewCanBeInstatiated()
    {
		$object = new PitchersView([]);
		$this->assertInstanceOf(PitchersView::class, $object);	
    }
}
?>