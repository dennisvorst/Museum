<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlSelectTest extends TestCase
{
    public function testClassHtmlSelectExists()
    {
        $this->assertTrue(class_exists("HtmlSelect"));
    }
}
?>