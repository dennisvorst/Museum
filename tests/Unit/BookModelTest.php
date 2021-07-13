<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class BookModelTest extends TestCase
{
    protected $_log;
	protected $_db;

    protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassBookModel()
    {
        $this->assertTrue(class_exists("BookModel"));
    }

    public function testClassArticleModelCanBeInstatiated()
    {
		$object = new ArticleModel($this->_db, $this->_log, 1);
		$this->assertInstanceOf(ArticleModel::class, $object);	
    }
}
?>