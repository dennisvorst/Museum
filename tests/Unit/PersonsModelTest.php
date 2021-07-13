<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PersonsModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassPersonsModel()
    {
        $this->assertTrue(class_exists("PersonsModel"));
    }

    public function testClassPersonsModelCanBeInstatiated()
    {
		$object = new PersonsModel($this->_db, $this->_log);
		$this->assertInstanceOf(PersonsModel::class, $object);	
    }
}
?>