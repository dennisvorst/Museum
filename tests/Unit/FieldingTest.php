<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FieldingTest extends TestCase
{
	protected $_log;
	protected $_db;
	protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassFieldingExists()
    {
        $this->assertTrue(class_exists("Fielding"));
	}
	
	public function testClassFieldingCanBeInstatiated()
    {
		$object = new Fielding($this->_db, $this->_log);
		$this->assertInstanceOf(Fielding::class, $object);	
	}
	

	/** test the protected functions */
	protected static function getMethod($name) {
		$class = new ReflectionClass('Fielding');
		$method = $class->getMethod($name);
		/** make the method public */
		$method->setAccessible(true);
		return $method;
	}
	  
	/** when the input array is empty the result is empty */
	public function testFieldingPercentageReturnsEmpty_1() {
		$row = [];

		$foo = self::getMethod('_calcfieldingPercentage');
		$obj = new Fielding($this->_db, $this->_log);
		/** https://www.php.net/manual/en/reflectionmethod.invokeargs.php */
		$foo->invokeArgs($obj, [$row]);

		$this->assertTrue(empty($row));
	}	

	/** if any of the mandatory values is not set an exception is thrown */
	public function testFieldingPercentageWithMissingRowElement() {

		$row['nrpo'] = 0;
		$row['nra'] = 1;
		//$row['nre']
		$expected = "---";

		$foo = self::getMethod('_calcfieldingPercentage');
		$obj = new Fielding($this->_db, $this->_log);
		/** https://www.php.net/manual/en/reflectionmethod.invokeargs.php */
		$row = $foo->invokeArgs($obj, [$row]);
		$actual = $row['nrfldperc'];

		$this->assertEquals($expected, $actual);
	}	

	public function testFieldingPercentageWithActualResult() {

		$row['nrpo'] = 1;
		$row['nra'] = 1;
		$row['nre'] = 1;
		$expected = "0.667";

		$foo = self::getMethod('_calcfieldingPercentage');
		$obj = new Fielding($this->_db, $this->_log);
		/** https://www.php.net/manual/en/reflectionmethod.invokeargs.php */
		$row = $foo->invokeArgs($obj, [$row]);
		$actual = $row['nrfldperc'];

		$this->assertEquals($expected, $actual);
	}	

	public function testFieldingPercentageWithPointFiveResult() {

		$row['nrpo'] = 0;
		$row['nra'] = 1;
		$row['nre'] = 1;
		$expected = "0.500";

		$foo = self::getMethod('_calcfieldingPercentage');
		$obj = new Fielding($this->_db, $this->_log);
		/** https://www.php.net/manual/en/reflectionmethod.invokeargs.php */
		$row = $foo->invokeArgs($obj, [$row]);
		$actual = $row['nrfldperc'];

		$this->assertEquals($expected, $actual);
	}	

	public function testFieldingPercentageWithPerfectResult() {

		$row['nrpo'] = 1;
		$row['nra'] = 1;
		$row['nre'] = 0;
		$expected = "1.000";

		$foo = self::getMethod('_calcfieldingPercentage');
		$obj = new Fielding($this->_db, $this->_log);
		/** https://www.php.net/manual/en/reflectionmethod.invokeargs.php */
		$row = $foo->invokeArgs($obj, [$row]);
		$actual = $row['nrfldperc'];

		$this->assertEquals($expected, $actual);
	}	
}


