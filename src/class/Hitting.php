<?php
/** todo: http://localhost/museum/src/index.php?id=467&option=person has empty values for the 0's in the database
 * http://localhost/phpmyadmin/tbl_select.php?db=museum&table=hitting 
 * 	SELECT * FROM `hitting` WHERE `idperson` = 467 
 */


require_once "iStatistics.php";
require_once "Statistics.php";

//require_once "MysqlDatabase.php";
//require_once "Log.php";

class Hitting extends Statistics implements iStatistics
{
	protected $_headers = ["Team", "Jaar", "AVG", "GP", "GS", "AB", "R", "H", "2B", "3B", "HR", "RBI", "TB", "SLG%", "BB", "HBP", "SO", "GDP", "OBP%", "SF", "SH", "SB", "ATT"];
	protected $_keys = ["nravg", "nrgp", "nrgs", "nrab", "nrr", "nrh", "nr2b", "nr3b", "nrhr", "nrrbi", "nrtb", "nrslgperc", "nrbb", "nrhbp", "nrso", "nrgdp", "nrobperc", "nrsf", "nrsh", "nrsb", "nratt"];
	protected $_title = "Hitting";

    function __construct(MysqlDatabase $db, Log $log)
    {
        parent::__construct($db, $log);
    }

    function getTeamStatistics(int $id) : string
    {
		return "";
    }

	function getPersonStatistics(int $id) : string
	{
		/** init */
		$types = "i";
		$values = [$id];

		/************************
		 * calculate Hitting
		 ***********************/
		/* s.nrh contains the total of hits. So doubles and triples are counted in there. That is why we multiply doubles by 2-1, triples by 3-1 etc. */
		$sql = "SELECT t.nmteam, s.nryear, s.nravg, s.nrgp, s.nrgs, s.nrab, s.nrr, s.nrh, s.nr2b, s.nr3b, s.nrhr, s.nrrbi, s.nrtb, s.nrslgperc, s.nrbb, s.nrhbp, s.nrso, s.nrgdp, s.nrobperc, s.nrsf, s.nrsh, s.nrsb, s.nratt 
				FROM hitting s, teams t 
				WHERE t.idteam = s.idteam AND idperson = ?";
		$rows = $this->_db->select($sql, $types, $values);

		foreach ($rows as $row)
		{
			$this->_rows[] = $row;
		}

		$this->_totals = $this->_getTotals();

		return $this->show();
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
	
	
	/*** Fielding Stats ***/
	/* Fielding Percentage */
	function calculateFieldingPercentage($nrA, $nrPo, $nrE){
		/**
		 * https://en.wikipedia.org/wiki/Fielding_percentage
		 * nrPo	= numbder of putouts
		 * nrA		= number of assists
		 * nrE		= number of errors
		 */
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}
		
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


			// $sql = "SELECT t.nmteam, s.nryear, ";
		// $sql .= "ROUND(s.nrh/s.nrab, 3), ";
		// $sql .= "s.nrgp, s.nrgs, s.nrab, s.nrr, s.nrh, s.nr2b, s.nr3b, s.nrhr, s.nrrbi, s.nrtb, ";
		// /* s.nrh contains the total of hits. So doubles and triples are counted in there. That is why we multiply doubles by 2-1, triples by 3-1 etc. */
		// $sql .= "ROUND((s.nrh + s.nr2b + (s.nr3b*2) + (s.nrhr*3)) / s.nrab,3), "; /* nrtb ?? */
		// $sql .= "s.nrbb, s.nrhbp, s.nrso, s.nrgdp, ";
		// $sql .= "s.nrobperc, ";
		// $sql .= "s.nrsf, s.nrsh, s.nrsb, s.nratt FROM hitting s, teams t ";
		// $sql .= "WHERE t.idteam = s.idteam AND idperson = ?";

//$sql .= "ROUND((s.nrh + s.nr2b + (s.nr3b*2) + (s.nrhr*3)) / s.nrab,3), ";
//"ROUND(s.nrh/s.nrab, 3), ";


}	
