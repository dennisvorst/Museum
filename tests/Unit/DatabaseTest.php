<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testClassDatabaseExists()
    {
        $this->assertTrue(class_exists("MysqlDatabase"));
    }
}
?>