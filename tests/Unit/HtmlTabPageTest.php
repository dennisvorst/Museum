<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HtmlTabPageTest extends TestCase
{
    private $_db;
    private $_log;

    protected function setUp() : void
    {
        /** mock the database and the log file  */
        $this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
    }

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

        $object = new HtmlTabPage($this->_db, $this->_log, null);
    }

    /**
     * @expectException InvalidArgumentException
     */
    public function testIdCannotBeEmpty()
    {
        $this->expectException('TypeError');

        $object = new HtmlTabPage($this->_db, $this->_log, "");
    }

    /**
     * @expectException InvalidArgumentException
     */
    public function testIdCannotBeNegative()
    {
        $this->expectException('InvalidArgumentException');

        $object = new HtmlTabPage($this->_db, $this->_log, -1);
    }

    /**
     * @expectException InvalidArgumentException
     */
    public function testIdCannotBeString()
    {
        $this->expectException('TypeError');

        $object = new HtmlTabPage($this->_db, $this->_log, "foobar");
    }

    public function testIdCanBeInteger()
    {
        $object = new HtmlTabPage($this->_db, $this->_log, 1);
        $this->assertInstanceOf('HtmlTabPage', $object);
    }

    /**
     * @expectException Exception
     */
    public function testTabsWithSameReferenceCannotBeAdded()
    {
        $this->expectException('Exception');

        $object = new HtmlTabPage($this->_db, $this->_log, 1);
        $object->addTab("one", "One", "First content");
        $object->addTab("one", "One", "First content");    
    }

    public function testTabsWithDifferentReferenceCanBeAdded()
    {
        $object = new HtmlTabPage($this->_db, $this->_log, 1);
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

        $object = new HtmlTabPage($this->_db, $this->_log, 1);
        $object->addTab("one", "One", "First content", true);
        $object->addTab("two", "Two", "Second content", true);
    }
}
?>