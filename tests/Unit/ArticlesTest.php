<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ArticlesTest extends TestCase
{
    public function testClassArticlesExists()
    {
        $this->assertTrue(class_exists("Articles"));
    }
}
?>