<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testClassArticleExists()
    {
        $this->assertTrue(class_exists("Article"));
    }
}
?>