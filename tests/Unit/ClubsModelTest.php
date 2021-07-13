<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ClubsModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassClubsModel()
    {
        $this->assertTrue(class_exists("ClubsModel"));
    }

    public function testClassClubsModelCanBeInstatiated()
    {
		$object = new ClubsModel($this->_db, $this->_log);
		$this->assertInstanceOf(ClubsModel::class, $object);	
    }
}
?>