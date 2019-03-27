<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlGridTest extends TestCase
{
    public function testClassHtmlGridExists()
    {
        $this->assertTrue(class_exists("HtmlGrid"));
    }
}
?>