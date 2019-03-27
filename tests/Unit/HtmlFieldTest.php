<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlFieldTest extends TestCase
{
    public function testClassHtmlFieldExists()
    {
        $this->assertTrue(class_exists("HtmlField"));
    }
}
?>