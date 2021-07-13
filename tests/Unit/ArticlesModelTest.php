<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ArticlesModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassArticlesModel()
    {
        $this->assertTrue(class_exists("ArticlesModel"));
    }

    public function testClassArticlesModelCanBeInstatiated()
    {
		$object = new ArticlesModel($this->_db, $this->_log, 1);
		$this->assertInstanceOf(ArticlesModel::class, $object);	
    }
}
?>