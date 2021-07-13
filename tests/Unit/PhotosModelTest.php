<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PhotosModelTest extends TestCase
{
	protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassPhotosModel()
    {
        $this->assertTrue(class_exists("PhotosModel"));
    }

    public function testClassPhotosModelCanBeInstatiated()
    {
		$object = new PhotosModel($this->_db, $this->_log);
		$this->assertInstanceOf(PhotosModel::class, $object);	
    }
}
?>