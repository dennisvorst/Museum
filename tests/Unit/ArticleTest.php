<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $_log;
	protected $_db;
	protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
    }

    public function testClassArticleExists()
    {
        $this->assertTrue(class_exists("Article"));
    }

    public function testClassFieldingCanBeInstatiated()
    {
		$object = new Article($this->_db, $this->_log);
		$this->assertInstanceOf(Article::class, $object);	
    }
}
?>