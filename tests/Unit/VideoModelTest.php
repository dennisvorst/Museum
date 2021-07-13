<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class VideoModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassVideoModel()
    {
        $this->assertTrue(class_exists("VideoModel"));
    }

    public function testClassVideoModelCanBeInstatiated()
    {
		$object = new VideoModel($this->_db, $this->_log, 1);
		$this->assertInstanceOf(VideoModel::class, $object);	
    }
}
?>