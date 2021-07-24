<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HitterViewTest extends TestCase
{
	protected $_row;

    protected function setUp() : void
    {
		$record['id'] = 1;
		$record['idperson'] = 1;
		$record['idteam'] = 1;
		$record['year'] = 1;
		$record['battingAverage'] = 1;
		$record['gamesPlayed'] = 1;
		$record['gamesStarted'] = 1;
		$record['atBats'] = 1;
		$record['runs'] = 1;
		$record['hits'] = 1;
		$record['doubles'] = 1;
		$record['triples'] = 1;
		$record['homeRuns'] = 1;
		$record['runsBattedIn'] = 1;
		$record['totalBases'] = 1;
		$record['sluggingPercentage'] = 1;
		$record['baseOnBalls'] = 1;
		$record['hitByPitch'] = 1;
		$record['strikeOuts'] = 1;
		$record['groundedIntoDoublePlay'] = 1;
		$record['onBasePercentage'] = 1;
		$record['sacrificeFlies'] = 1;
		$record['sacrificeHits'] = 1;
		$record['stolenBases'] = 1;
		$record['stealAttempts'] = 1;

//		$record['hitting'] = $record;

		$this->_row['hitting'] = $record;
    }

    public function testClassHitterViewExists()
    {
        $this->assertTrue(class_exists("HitterView"));
    }

    public function testClassHitterViewCanBeInstatiated()
    {
  		$object = new HitterView($this->_row);
  		$this->assertInstanceOf(HitterView::class, $object);	
    }

    public function testEmptyHitterThrowsException()
    {
      $this->expectException(InvalidArgumentException::class);
      $object = new HitterView([]);
    }

	/** show */
	public function testFunctionShowReturnsString()
	{
		$object = new HitterView($this->_row);
		$actual = $object->show();
		$this->assertIsString($actual);	
	}

	/** thumbnail */
	public function testFunctionShowThumbnailReturnsString()
	{
		$object = new HitterView($this->_row);
		$actual = $object->showThumbnail();
		$this->assertIsString($actual);	
	}
}
?>