<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CheckBoxTest extends TestCase
{
    public function testClassCheckBoxExists()
    {
        $this->assertTrue(class_exists("CheckBox"));
    }
}
?>