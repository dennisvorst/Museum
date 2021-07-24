<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HittersViewTest extends TestCase
{
    public function testClassHittersView()
    {
        $this->assertTrue(class_exists("HittersView"));
    }

    public function testClassHittersViewCanBeInstatiated()
    {
		$object = new HittersView([]);
		$this->assertInstanceOf(HittersView::class, $object);	
    }
}
?>