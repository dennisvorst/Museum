<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CompetitionsModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassCompetitionsModel()
    {
        $this->assertTrue(class_exists("CompetitionsModel"));
    }

    public function testClassCompetitionsModelCanBeInstatiated()
    {
		$object = new CompetitionsModel($this->_db, $this->_log, 1);
		$this->assertInstanceOf(CompetitionsModel::class, $object);	
    }
}
?>