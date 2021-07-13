<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ListViewTest extends TestCase
{
    public function testClassListView()
    {
        $this->assertTrue(class_exists("ListView"));
    }
}
?>