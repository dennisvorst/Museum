<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PitchersModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassPitchersModel()
    {
        $this->assertTrue(class_exists("PitchersModel"));
    }

    public function testClassPitchersModelCanBeInstatiated()
    {
		$object = new PitchersModel($this->_db, $this->_log);
		$this->assertInstanceOf(PitchersModel::class, $object);	
    }
}
?>