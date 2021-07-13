<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PageViewTest extends TestCase
{
    public function testClassPageView()
    {
        $this->assertTrue(class_exists("PageView"));
    }

    public function testClassPageViewCanBeInstatiated()
    {
		$object = new PageView([]);
		$this->assertInstanceOf(PageView::class, $object);	
    }
}
?>