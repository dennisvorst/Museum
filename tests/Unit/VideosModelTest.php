<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class VideosModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassVideosModel()
    {
        $this->assertTrue(class_exists("VideosModel"));
    }

    public function testClassVideosModelCanBeInstatiated()
    {
		$object = new VideosModel($this->_db, $this->_log);
		$this->assertInstanceOf(VideosModel::class, $object);	
    }
}
?>