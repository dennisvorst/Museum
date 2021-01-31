<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HallOfFamersTest extends TestCase
{
	protected $_log;
	protected $_db;
	protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}
    
    public function testClassHallOfFamersExists()
    {
        $this->assertTrue(class_exists("HallOfFamers"));
    }

    public function testClassHallOfFamersCanBeInstantiated()
    {
        $object= new HallOfFamers($this->_db, $this->_log);
        $this->assertInstanceOf(HallOfFamers::class, $object);	
    }
  
}
?>