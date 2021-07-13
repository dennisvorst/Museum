<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class BooksControllerTest extends TestCase
{
    public function testClassBooksController()
    {
        $this->assertTrue(class_exists("BooksController"));
    }
}
?>