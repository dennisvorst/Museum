<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ParticipantsModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassParticipantsModel()
    {
        $this->assertTrue(class_exists("ParticipantsModel"));
    }

    public function testClassParticipantsModelCanBeInstatiated()
    {
		$object = new ParticipantsModel($this->_db, $this->_log);
		$this->assertInstanceOf(ParticipantsModel::class, $object);	
    }
}
?>