<?php
class Hitting{


	/*** Hitting Stats ***/
	/* Batting Average */
	public static function calculateBattingAverage(int $totalHits = null, int $atBats = null): float{
		/* calculate the batting average 
		totalHits = The total number of hits produced 
		atBats = the number of at bats
		*/	
		if($totalHits > $atBats) {
			throw new Exception('Total hits is larger than the number of at bats.');
		}		
		
		if (empty($atBats)){
			/* there is no average when there were no at bats */
			return "---";
		}
		$average	= ($totalHits/$atBats);
		$average	= ltrim(number_format($average, 3), '0');;
		return $average;
	}
	
	/* Slugging Percentage */
	public static function calculateSluggingPercentage($nrAb, $nrH, $nr2h, $nr3h, $nrHr){
		/* calculate the slugging percentage 
		
		nrH		= The total number of basehits 
		nr2h	= The total number of doubles 
		nr3h	= The total number of triples 
		nrHr	= The total number of homeruns 
		nrHAb	= the number of at bats
		*/	
		if (!$nrAb){
			/* there is no average when there were no at bats */
			return "---";
		} else if ($nrAb < ($nrH + $nr2h + $nr3h + $nrHr)){
			return "???";
		} else {
			$nrAvg	= ($nrH + ($nr2h * 2) + ($nr3h * 3) + ($nrHr * 4)) / $nrAb;
			$nrAvg	= ltrim(number_format($nrAvg, 3), '0');
			return $nrAvg;
		}
	}
	
	/* On Base Percentage */
	function calculateOnBasePercentage($nrAb, $nrTh, $nrBb, $nrHbp, $nrSf){
		/**
		https://en.wikipedia.org/wiki/On-base_percentage
		nrTh	= Hits
		nrBb	= Bases on Balls (Walks)
		NrHbp	= Hit By Pitch
		nrAb	= At bats
		nrSf	= Sacrifice Flies
		*/
		if (!$nrAb && !$nrBb && !$nrHbp && !$nrSf){
			/* there is no average when there were no innings pitched */
			return "---";
		} else {
			$nrAvg	= ($nrTh + $nrBb + $nrHbp) / ($nrAb + $nrBb + $nrHbp + $nrSf);
			$nrAvg	= ltrim(number_format($nrAvg, 4), '0');
			return $nrAvg;
		}
	}
	
	/*** Pitching Stats ***/
	/* Earned Run Average */
	function calculateEarnedRunAverage($nrEr, $nrIp){
		/* 
		nrEr = The number of earned runs 
		nrIp = the number of innings pitched. Thirds of an inning are presented as .1, .2 or .3
		*/	
		if (!$nrIp){
			/* there is no average when there were no innings pitched */
			return "???";
		} else {
			/* if it has a fraction */
			$nrInteger 	= intval($nrIp);
			$nrDecimals	= $nrIp - $nrInteger;
			
			if ($nrDecimals > 0.3){
				return "???";
			} 
			
			$nrDecimals	= number_format($nrDecimals, 1) * (10/3);
			$nrIp		= $nrInteger + $nrDecimals;
	
			$nrEra	= ($nrEr/$nrIp) * 9;
			$nrEra	= number_format($nrEra, 2);

			return $nrEra;
		}
	}
	
	function calculateOpponentAverage($nrBf, $nrH, $nrBb, $nrHbp, $nrSh, $nrSf, $nrCint){
		/*
		https://en.wikipedia.org/wiki/Batting_average_against
		BF		= the number of batters faced by the pitcher
		BB		= the number of base on balls
		HBP		= the number of hit batsmen
		SH		= the number of sacrifice hits
		SF		= the number of sacrifice flies
		CINT	= the number of catcher's interference
		*/
		if (!$nrBf){
			return "---";
		} else if ($nrBf < ($nrH + $nrBb + $nrHbp + $nrSh + $nrSf + $nrCint)){
			return "???";
		} else {
			$nrAvg	= $nrH / ($nrBf - ($nrBb + $nrHbp + $nrSh + $nrSf + $nrCint));
			$nrAvg	= ltrim(number_format($nrAvg, 3),0);
			return $nrAvg;
		}
	}
	
	/*** Fielding Stats ***/
	/* Fielding Percentage */
	function calculateFieldingPercentage($nrA, $nrPo, $nrE){
		/*
		https://en.wikipedia.org/wiki/Fielding_percentage
		nrPo	= numbder of putouts
		nrA		= number of assists
		nrE		= number of errors
		*/
		if (!$nrPo){
			return "---";
		} else if ($nrA < ($nrPo + $nrE)){
			return "???";
		} else {
			$nrAvg = ($nrA + $nrPo)/($nrA + $nrPo + $nrE);
			$nrAvg	= ltrim(number_format($nrAvg, 3),0);
			return $nrAvg;
		}
	}
	
	
	/*** Baserunning Stats ***/
	/* Base Running Percentage */
	function calculateStolenBasePercentage($nrSb, $nrCs){
		/*
		https://en.wikipedia.org/wiki/Stolen_base_percentage
		nrSb	= number of stolen bases
		nrCs	= number of times the runner was caught stealing 
		*/
		if (!$nrSb && !$nrCs){
			return "---";
		} else {
			$nrAvg	= $nrSb / ($nrSb + $nrCs);
			$nrAvg	= ltrim(number_format($nrAvg, 3),0);
			return $nrAvg;
		}
	}
}	
