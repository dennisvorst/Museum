<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ArticlesViewTest extends TestCase
{
    public function testClassArticlesView()
    {
        $this->assertTrue(class_exists("ArticlesView"));
    }
}
?>