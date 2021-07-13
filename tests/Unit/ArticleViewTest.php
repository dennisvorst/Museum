<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ArticleViewTest extends TestCase
{
    public function testClassArticleView()
    {
        $this->assertTrue(class_exists("ArticleView"));
    }
}
?>