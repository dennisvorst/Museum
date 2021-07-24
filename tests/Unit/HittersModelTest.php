<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HittersModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassHittersModel()
    {
        $this->assertTrue(class_exists("HittersModel"));
    }

    public function testClassHittersModelCanBeInstatiated()
    {
		$object = new HittersModel($this->_db, $this->_log);
		$this->assertInstanceOf(HittersModel::class, $object);	
    }
}
?>