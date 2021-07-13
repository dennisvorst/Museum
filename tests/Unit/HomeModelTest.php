<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HomeModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassHomeModel()
    {
        $this->assertTrue(class_exists("HomeModel"));
    }

    public function testClassHomeModelCanBeInstatiated()
    {
		$object = new HomeModel($this->_db, $this->_log);
		$this->assertInstanceOf(HomeModel::class, $object);	
    }
}
?>