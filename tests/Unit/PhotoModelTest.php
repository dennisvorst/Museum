<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PhotoModelTest extends TestCase
{
	protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassPhotoModel()
    {
        $this->assertTrue(class_exists("PhotoModel"));
    }

    public function testClassPhotoModelCanBeInstatiated()
    {
		$object = new PhotoModel($this->_db, $this->_log, 1);
		$this->assertInstanceOf(PhotoModel::class, $object);	
    }
}
?>