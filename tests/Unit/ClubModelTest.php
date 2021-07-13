<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ClubModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassClubModel()
    {
        $this->assertTrue(class_exists("ClubModel"));
    }

    public function testClassArticleModelCanBeInstatiated()
    {
		$object = new ClubModel($this->_db, $this->_log, 1);
		$this->assertInstanceOf(ClubModel::class, $object);	
    }
}
?>