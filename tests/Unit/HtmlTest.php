<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlTest extends TestCase
{
    public function testClassHtml()
    {
        $this->assertTrue(class_exists("Html"));
    }
}
?>