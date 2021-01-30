<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PitchingTest extends TestCase
{
	protected $_log;
	protected $_db;
	protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassPitchingExists()
    {
        $this->assertTrue(class_exists("Pitching"));
	}
	
	public function testClassPitchingCanBeInstatiated()
    {
		$object = new Pitching($this->_db, $this->_log);
		$this->assertInstanceOf(Pitching::class, $object);	
    }


	
}


