<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ArticlesTest extends TestCase
{
    protected $_log;
	protected $_db;
	protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
    }

    public function testClassArticlesExists()
    {
        $this->assertTrue(class_exists("Articles"));
    }

    public function testClassFieldingCanBeInstatiated()
    {
		$object = new Articles($this->_db, $this->_log);
		$this->assertInstanceOf(Articles::class, $object);	
    }

    
}
?>