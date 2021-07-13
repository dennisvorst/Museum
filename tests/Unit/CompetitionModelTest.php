<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CompetitionModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassCompetitionModel()
    {
        $this->assertTrue(class_exists("CompetitionModel"));
    }

    public function testClassCompetitionModelCanBeInstatiated()
    {
		$object = new CompetitionModel($this->_db, $this->_log, 1);
		$this->assertInstanceOf(CompetitionModel::class, $object);	
    }
}
?>