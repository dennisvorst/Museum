<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FielderViewTest extends TestCase
{
	protected $_row;

    protected function setUp() : void
    {
		$record['id'] = 1;
		$record['idperson'] = 1;
		$record['idteam'] = 1;
		$record['year'] = 1;

		$record['caught'] = 1;
		$record['putOut'] = 1;
		$record['attempts'] = 1;
		$record['errors'] = 1;
		$record['fieldingPercentage'] = 1;
		$record['doublePlays'] = 1;
		$record['stolenBaseAttempts'] = 1;
		$record['caughtStealing'] = 1;
		$record['stolenBaseAttemptPercentage'] = 1;
		$record['passedBalls'] = 1;
		$record['catcherInterference'] = 1;

		$this->_row['fielding'] = $record;
    }

    public function testClassFielderViewExists()
    {
        $this->assertTrue(class_exists("FielderView"));
    }

    public function testClassFielderViewCanBeInstatiated()
    {
  		$object = new FielderView($this->_row);
  		$this->assertInstanceOf(FielderView::class, $object);	
    }

    public function testEmptyFielderThrowsException()
    {
      $this->expectException(InvalidArgumentException::class);
      $object = new FielderView([]);
    }

	/** todo: show not implemented yet*/
	public function testFunctionShowReturnsString()
	{
		$this->expectException(Exception::class);
		$object = new FielderView($this->_row);
		$actual = $object->show();
		$this->assertIsString($actual);	
	}

	/** thumbnail */
	public function testFunctionShowThumbnailReturnsString()
	{
		$object = new FielderView($this->_row);
		$actual = $object->showThumbnail();
		$this->assertIsString($actual);	
	}
}
?>