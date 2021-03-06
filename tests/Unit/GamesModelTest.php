<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GamesModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassGamesModelExists()
    {
        $this->assertTrue(class_exists("GamesModel"));
    }

    public function testClassGamesModelCanBeInstatiated()
    {
		$object = new GamesModel($this->_db, $this->_log, 1);
		$this->assertInstanceOf(GamesModel::class, $object);	
    }
}
?>