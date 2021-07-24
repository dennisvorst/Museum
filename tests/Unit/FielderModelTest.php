<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FieldersModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassFieldersModel()
    {
        $this->assertTrue(class_exists("FieldersModel"));
    }

    public function testClassFieldersModelCanBeInstatiated()
    {
		$object = new FieldersModel($this->_db, $this->_log);
		$this->assertInstanceOf(FieldersModel::class, $object);
    }
}
?>