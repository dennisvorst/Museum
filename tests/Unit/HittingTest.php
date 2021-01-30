<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class HitttingTest extends TestCase
{


	/** Batting Average */
//	public function testBattingAverageCanBeEmpty()
//	{
//		$this->assertEquals(NULL, Hitting::calculateBattingAverage());
//	}
	

//	/**
//	* @expectedException MyException
//	* @expectedExceptionCode 10
//	*/	
//	public function testTotalHitsMayNotExceedAtBats(){
//		Hitting::calculateBattingAverage(1, 0);
//	}

	public function testSameNumberOfHitsAndAtBatsReturnsOne()
	{
		$this->assertEquals("1.000" , Hitting::calculateBattingAverage(1, 1));
	}

//	/**
//	* @expectedException Error
//	*/	
//	public function testFunctionAcceptsOnlyIntegers()
//	{
//		$this->assertEquals("1.000" , Hitting::calculateBattingAverage(.5, 1.5));
//	}
	
	public function testAveragesAreRoundedToThreeDeciumals()
	{
		$this->assertEquals("0.333" , Hitting::calculateBattingAverage(1, 3));
	}
	
	/** Slugging Percentage */
	public function testNoHitsWithAtBatsResultInZero()
	{
		$this->assertEquals("0.000" , Hitting::calculateBattingAverage(0, 10));
	}
}