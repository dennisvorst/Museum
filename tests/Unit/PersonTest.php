<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
	protected $_log;
	protected $_db;
	protected function setup() : void
	{
		/** mock the database and the log file  */
		$this->_db = $this->createMock(MysqlDatabase::class);
		$this->_log = $this->createMock(Log::class);
	}

    public function testClassPersonExists()
    {
        $this->assertTrue(class_exists("Person"));
    }

    public function testClassHallOfFamersCanBeInstantiated()
    {
        $object= new Person($this->_db, $this->_log);
        $this->assertInstanceOf(Person::class, $object);	
    }

    public function testClassHasFunctionGetPhotoCollection()
    {
        $this->assertTrue(method_exists("Person", 'getPhotoCollection'));
    }

   	/** test the protected functions */
	protected static function getMethod($name) {
		$class = new ReflectionClass('Person');
		$method = $class->getMethod($name);
		/** make the method public */
		$method->setAccessible(true);
		return $method;
	}

    /** _isHof() tests */
    public function testGetHofLineWithDate()
    {
        $date = "1985-07-31";
        $expected = "<i class='fas fa-star'></i> in de eregalerij sinds 31 juli 1985";
        
		$func = self::getMethod('_isHof');
        $object = new Person($this->_db, $this->_log);
        $object->setHofDate($date);
		/** https://www.php.net/manual/en/reflectionmethod.invokeargs.php */
		$actual = $func->invokeArgs($object, [$date]);

		$this->assertEquals($expected, $actual);
    }

    public function testGetHofLineWithoutDate()
    {
        $date = "";
        $expected = "";
        
		$func = self::getMethod('_isHof');
		$object = new Person($this->_db, $this->_log);
        $object->setHofDate($date);
		/** https://www.php.net/manual/en/reflectionmethod.invokeargs.php */
		$actual = $func->invokeArgs($object, [$date]);

		$this->assertEquals($actual, $expected);
    }

    /** getHofdate() tests */
    public function testRoundtripHofDateWithEmptyDate()
	{
        $expected = "";

        $object= new Person($this->_db, $this->_log);
        $object->setHofDate("");
        $actual = $object->getHofDate();
        $this->assertEquals($expected, $actual);
	}

    public function testRoundtripHofDateWithActualDate()
	{
        $expected = "2021-01-31";

        $object= new Person($this->_db, $this->_log);
        $object->setHofDate($expected);
        $actual = $object->getHofDate();
        $this->assertEquals($expected, $actual);
    }

    public function testRoundtripHofDateWithIllegalDateValue()
	{
        $expected = "";

        $object= new Person($this->_db, $this->_log);
        $object->setHofDate("9999-99-99");
        $actual = $object->getHofDate();
        $this->assertEquals($expected, $actual);
	}

}
?>