<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class SingleItemPageTest extends TestCase
{
    public function testClassSingleItemPageExists()
    {
        $this->assertTrue(class_exists("SingleItemPage"));
    }
}
?>