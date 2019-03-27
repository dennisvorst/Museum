<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    public function testClassContactExists()
    {
        $this->assertTrue(class_exists("Contact"));
    }
}
?>