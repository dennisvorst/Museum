<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ListPageTest extends TestCase
{
    public function testClassListPageExists()
    {
        $this->assertTrue(class_exists("ListPage"));
    }
}
?>