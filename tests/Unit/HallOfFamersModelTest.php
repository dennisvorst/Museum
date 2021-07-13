<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HallOfFamersModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassHallOfFamersModel()
    {
        $this->assertTrue(class_exists("HallOfFamersModel"));
    }

    public function testClassHallOfFamersModelCanBeInstatiated()
    {
		$object = new HallOfFamersModel($this->_db, $this->_log);
		$this->assertInstanceOf(HallOfFamersModel::class, $object);	
    }
}
?>