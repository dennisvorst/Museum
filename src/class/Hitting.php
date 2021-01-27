<?php
class Hitting{
    private $_headers = ["Team", "Jaar", "AVG", "GP", "GS", "AB", "R", "H", "2B", "3B", "HR", "RBI", "TB", "SLG%", "BB", "HBP", "SO", "GDP", "OBP%", "SF", "SH", "SB", "ATT"];
    private $_db;
    private $_rows =[];
	private $_totals =[];
	
	function __construct(MysqlDatabase $db)
    {
        $this->_db = $db;
    }

    function getClubStats(int $id)
    {

    }

	function getPersonStats(int $id)
	{
		/** init */
		$types = "i";
		$values = [$id];

		/************************
		 * calculate Hitting
		 ***********************/
		$sql = "SELECT t.nmteam, s.nryear, ";
		$sql .= "ROUND(s.nrh/s.nrab, 3), ";
		$sql .= "s.nrgp, s.nrgs, s.nrab, s.nrr, s.nrh, s.nr2b, s.nr3b, s.nrhr, s.nrrbi, s.nrtb, ";
		/* s.nrh contains the total of hits. So doubles and triples are counted in there. That is why we multiply doubles by 2-1, triples by 3-1 etc. */
		$sql .= "ROUND((s.nrh + s.nr2b + (s.nr3b*2) + (s.nrhr*3)) / s.nrab,3), ";
		$sql .= "s.nrbb, s.nrhbp, s.nrso, s.nrgdp, ";
		$sql .= "s.nrobperc, ";
		$sql .= "s.nrsf, s.nrsh, s.nrsb, s.nratt FROM hitting s, teams t ";
		$sql .= "WHERE t.idteam = s.idteam AND idperson = ?";
		$this->_rows = $this->_db->select($sql, $types, $values);

		/************************
		 * calculate Hitting totals
		 ***********************/
		$sql = "SELECT ROUND(SUM(s.nrh)/SUM(s.nrab), 3), ";
		$sql .= "SUM(s.nrgp), SUM(s.nrgs), SUM(s.nrab), SUM(s.nrr), SUM(s.nrh), SUM(s.nr2b), SUM(s.nr3b), SUM(s.nrhr), SUM(s.nrrbi), SUM(s.nrtb), ";
		$sql .= "ROUND((SUM(s.nrh) + SUM(s.nr2b) + (SUM(s.nr3b)*2) + (SUM(s.nrhr)*3)) / SUM(s.nrab),3), "; /* slgperc*/
		$sql .= "SUM(s.nrbb), SUM(s.nrhbp), SUM(s.nrso), SUM(s.nrgdp), ";
		$sql .= "0, "; /* nrobpperc */
		$sql .= "SUM(s.nrsf), SUM(s.nrsh), SUM(s.nrsb), SUM(s.nratt) FROM hitting s, teams t ";
		$sql .= "WHERE t.idteam = s.idteam AND idperson = ?";

		$this->_totals = $this->_db->select($sql, $types, $values);
	}

    function getRows() : array
    {
        return $this->_rows;
    }
    function getTotals() : array
    {
        return $this->_totals;
    }
    function getHeaders()
    {
        return $this->_headers;
    }

	/*** Hitting Stats ***/
	/* Batting Average */
	public static function calculateBattingAverage(int $totalHits = null, int $atBats = null): float {
		/* calculate the batting average 
		totalHits = The total number of hits produced 
		atBats = the number of at bats
		*/	
		if($totalHits > $atBats) {
			throw new MyException('Total hits is larger than the number of at bats.', 10);
		}		
		
		if (empty($atBats)){
			/* there is no average when there were no at bats */
			return null;
		}
		$average	= ($totalHits/$atBats);
		$average	= ltrim(number_format($average, 3), '0');;
		return "" . $average;
	}
	
	/* Slugging Percentage */
	public static function calculateSluggingPercentage($nrAb, $nrH, $nr2h, $nr3h, $nrHr){
		/** calculate the slugging percentage 
		 * nrH		= The total number of basehits 
		 * nr2h	= The total number of doubles 
		 * nr3h	= The total number of triples 
		 * nrHr	= The total number of homeruns 
		 * nrHAb	= the number of at bats
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
		 * https://en.wikipedia.org/wiki/On-base_percentage
		 * nrTh	= Hits
		 * nrBb	= Bases on Balls (Walks)
		 * NrHbp	= Hit By Pitch
		 * nrAb	= At bats
		 * nrSf	= Sacrifice Flies
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
		/**
		 * nrEr = The number of earned runs 
		 * nrIp = the number of innings pitched. Thirds of an inning are presented as .1, .2 or .3
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
		/**
		 * https://en.wikipedia.org/wiki/Batting_average_against
		 * BF		= the number of batters faced by the pitcher
		 * BB		= the number of base on balls
		 * HBP		= the number of hit batsmen
		 * SH		= the number of sacrifice hits
		 * SF		= the number of sacrifice flies
		 * CINT	= the number of catcher's interference
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
		/**
		 * https://en.wikipedia.org/wiki/Fielding_percentage
		 * nrPo	= numbder of putouts
		 * nrA		= number of assists
		 * nrE		= number of errors
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
		/**
		 * https://en.wikipedia.org/wiki/Stolen_base_percentage
		 * nrSb	= number of stolen bases
		 * nrCs	= number of times the runner was caught stealing 
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
