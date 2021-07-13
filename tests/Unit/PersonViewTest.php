<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PersonViewTest extends TestCase
{
    public function testClassPersonView()
    {
        $this->assertTrue(class_exists("PersonView"));
    }
}
?>