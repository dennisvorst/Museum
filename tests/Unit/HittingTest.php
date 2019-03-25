<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require "src/class/Hitting.php";

final class HitttingTest extends TestCase
{


	/** Batting Average */
	public function testBattingAverageCanBeEmpty()
	{
		$this->assertEquals("---", Hitting::calculateBattingAverage());
	}
	

	/**
	* @expectedException Error
	*/	
	public function testTotalHitsMayNotExccedAtBats(){
		Hitting::calculateBattingAverage(1, 0);
	}

	public function testSameNumberOfHitsAndAtBatsReturnsOne()
	{
		$this->assertEquals("1.000" , Hitting::calculateBattingAverage(1, 1));
	}

	/**
	* @expectedException Error
	*/	
	public function testFunctionAcceptsOnlyIntegers()
	{
		$this->assertEquals("1.000" , Hitting::calculateBattingAverage(.5, 1.5));
	}
	
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