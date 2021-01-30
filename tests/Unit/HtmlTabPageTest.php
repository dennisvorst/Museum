<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlTabPageTest extends TestCase
{
    public function testClassHtmlTabPageExists()
    {
        $this->assertTrue(class_exists("HtmlTabPage"));
    }

    /**
     * @expectException ArgumentCountError
     */
    public function testIdCannotBeOmitted()
    {
        $this->expectException('ArgumentCountError');
        $object = new HtmlTabPage();
    }

    /**
     * @expectException InvalidArgumentException
     */
    public function testIdCannotBeNull()
    {
        $this->expectException('TypeError');

        /** mock the database */
        $db = $this->createMock(MysqlDatabase::class);
		$log = $this->createMock(Log::class);

        $object = new HtmlTabPage($db, $log, null);
    }

    /**
     * @expectException InvalidArgumentException
     */
    public function testIdCannotBeEmpty()
    {
        $this->expectException('TypeError');

        /** mock the database */
        $db = $this->createMock(MysqlDatabase::class);
		$log = $this->createMock(Log::class);

        $object = new HtmlTabPage($db, $log, "");
    }

    /**
     * @expectException InvalidArgumentException
     */
    public function testIdCannotBeNegative()
    {
        $this->expectException('InvalidArgumentException');

        /** mock the database */
        $db = $this->createMock(MysqlDatabase::class);
		$log = $this->createMock(Log::class);
        
        $object = new HtmlTabPage($db, $log, -1);
    }

    /**
     * @expectException InvalidArgumentException
     */
    public function testIdCannotBeString()
    {
        $this->expectException('TypeError');

        /** mock the database */
        $db = $this->createMock(MysqlDatabase::class);
		$log = $this->createMock(Log::class);

        $object = new HtmlTabPage($db, $log, "foobar");
    }

    public function testIdCanBeInteger()
    {
        /** mock the database */
        $db = $this->createMock(MysqlDatabase::class);
		$log = $this->createMock(Log::class);

        $object = new HtmlTabPage($db, $log, 1);
        $this->assertInstanceOf('HtmlTabPage', $object);
    }

    /**
     * @expectException Exception
     */
    public function testTabsWithSameReferenceCannotBeAdded()
    {
        $this->expectException('Exception');

        /** mock the database */
        $db = $this->createMock(MysqlDatabase::class);
		$log = $this->createMock(Log::class);

        $object = new HtmlTabPage($db, $log, 1);
        $object->addTab("one", "One", "First content");
        $object->addTab("one", "One", "First content");    
    }

    public function testTabsWithDifferentReferenceCanBeAdded()
    {
        /** mock the database */
        $db = $this->createMock(MysqlDatabase::class);
		$log = $this->createMock(Log::class);

        $object = new HtmlTabPage($db, $log, 1);
        $object->addTab("one", "One", "First content");
        $object->addTab("two", "One", "First content");    
        $object->addTab("three", "three", "Third content");
        $this->assertEquals(3, $object->countTabs());
    }

    /**
     * @expectException Exception
     */
    public function testOneTabMustBeActive()
    {
        $this->expectException('Exception');

        /** mock the database */
        $db = $this->createMock(MysqlDatabase::class);
		$log = $this->createMock(Log::class);

        $object = new HtmlTabPage($db, $log, 1);
        $object->addTab("one", "One", "First content", true);
        $object->addTab("two", "Two", "Second content", true);
    }
}
?>