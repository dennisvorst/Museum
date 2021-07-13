<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PersonModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassPersonModel()
    {
        $this->assertTrue(class_exists("PersonModel"));
    }

    public function testClassPersonModelCanBeInstatiated()
    {
		$object = new PersonModel($this->_db, $this->_log, 1);
		$this->assertInstanceOf(PersonModel::class, $object);	
    }
}
?>