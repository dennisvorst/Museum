<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PitcherViewTest extends TestCase
{
	protected $_row;

    protected function setUp() : void
    {
		$record['id'] = 1;
		$record['idperson'] = 1;
		$record['idteam'] = 1;
		$record['year'] = 1;
		$record['wins'] = 1;
		$record['losses'] = 1;

		$record['appearences'] = 1;
		$record['gamesStarted'] = 1;
		$record['completeGames'] = 1;
		$record['shutOuts'] = 1;
		$record['saves'] = 1;
		$record['inningsPitched'] = 1;
		$record['hits'] = 1;
		$record['runs'] = 1;
		$record['earnedRuns'] = 1;
		$record['baseOnBalls'] = 1;
		$record['strikeOuts'] = 1;
		$record['doubles'] = 1;
		$record['triples'] = 1;
		$record['homeRuns'] = 1;
		$record['atBats'] = 1;
		$record['opponentAverage'] = 1;
		$record['wildPitches'] = 1;
		$record['hitByPitch'] = 1;
		$record['balks'] = 1;
		$record['earnedRunAverage'] = 1;

//		$record['pitching'] = $record;

		$this->_row['pitching'] = $record;
    }

    public function testClassPitcherViewExists()
    {
        $this->assertTrue(class_exists("PitcherView"));
    }

    public function testClassPitcherViewCanBeInstatiated()
    {
  		$object = new PitcherView($this->_row);
  		$this->assertInstanceOf(PitcherView::class, $object);	
    }

    public function testEmptyPitcherThrowsException()
    {
      $this->expectException(InvalidArgumentException::class);
      $object = new PitcherView([]);
    }

	/** todo: show not implemented yet*/
	public function testFunctionShowReturnsString()
	{
		$this->expectException(Exception::class);
		$object = new PitcherView($this->_row);
		$actual = $object->show();
		$this->assertIsString($actual);	
	}

	/** thumbnail */
	public function testFunctionShowThumbnailReturnsString()
	{
		$object = new PitcherView($this->_row);
		$actual = $object->showThumbnail();
		$this->assertIsString($actual);	
	}
}
?>