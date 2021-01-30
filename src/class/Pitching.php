<?php
require_once "iStatistics.php";
require_once "Statistics.php";

//require_once "MysqlDatabase.php";

class Pitching extends Statistics implements iStatistics
{
    protected $_headers = ["Team", "Jaar", "W", "L", "App.", "GS", "CG", "SHO", "SV", "IP", "H", "R", "ER", "BB", "SO", "2B", "3B", "HR", "AB", "Opp. Avg.", "WP", "HBP", "BK", "ERA"];
    protected $_keys = ["nrw", "nrl", "nrapp", "nrgs", "nrcg", "nrsho", "nrsv", "nrip", "nrh", "nrr", "nrer", "nrbb", "nrso", "nr2b", "nr3b", "nrhr", "nrab", "nroppavg", "nrwp", "nrhbp", "nrbk", "nrera"];

    protected $_title = "Pitching";

    function __construct(MysqlDatabase $db, Log $log)
    {
        parent::__construct($db, $log);
    }

    function getTeamStats(int $id) : string
    {

    }

    function getPersonStats(int $id) : string
    {
        /** init */
		$types = "i";
        $values = [$id];
        $sql = "SELECT t.nmteam, s.nryear, s.nrw, s.nrl, s.nrapp, s.nrgs, s.nrcg, s.nrsho, s.nrsv, s.nrip, s.nrh, s.nrr, s.nrer, s.nrbb, s.nrso, s.nr2b, s.nr3b, s.nrhr, s.nrab, s.nroppavg, s.nrwp, s.nrhbp, s.nrbk, s.nrera
                FROM pitching s, teams t 
                WHERE t.idteam = s.idteam AND idperson = ?";
        $rows = $this->_db->select($sql, $types, $values);

        foreach ($rows as $row)
        {
            $row['nrera'] = $this->_format($row['nrera'], 2);
            $row['nroppavg'] = (empty($row['nroppavg']) ? "---" : $this->_format($row['nroppavg'], 3));
            $this->_rows[] = $row;
        }
        
        $this->_totals = $this->_getTotals();
        $this->_totals = $this->calculateEarnedRunAverage($this->_totals);

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

	/* Earned Run Average */
    function calculateEarnedRunAverage(array $row) : array
    {
		/**
		 * nrEr = The number of earned runs 
		 * nrIp = the number of innings pitched. Thirds of an inning are presented as .1, .2 or .3
		 */	
        $nrera = "???";
        $nrer = $row['nrer'];
        $nrip = $row['nrip'];
        if ($nrip)
        {
			/* if it has a fraction */
			$nrinteger 	= intval($nrip);
			$nrdecimals	= $nrip - $nrinteger;

            /** can only be 1 or 2  */
			if ($nrdecimals >= 0.3){
                throw new exception("The number of innings pitched is off. {$nrip}");
			} 
			
			$nrdecimals	= number_format($nrdecimals, 1) * (10/3);
			$nrip		= $nrinteger + $nrdecimals;
	
			$nrera	= ($nrer/$nrip) * 9;
			$nrera	= number_format($nrera, 2);

        }
        $row['nrera'] = $nrera;
        return $row;
    }

    function calculateOpponentAverage(array $row){
		/**
		 * https://en.wikipedia.org/wiki/Batting_average_against
		 * BF		= the number of batters faced by the pitcher
		 * BB		= the number of base on balls
		 * HBP		= the number of hit batsmen
		 * SH		= the number of sacrifice hits
		 * SF		= the number of sacrifice flies
		 * CINT	= the number of catcher's interference
		 */
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
        }
                
        $keys = ["nrbf", "nrh", "nrbb", "nrhbp", "nrsh", "nrsf", "nrcint"];
        foreach ($keys as $key)
        {
            if (!array_key_exists($key, $row))
            {
                $nroppavg = "---";
                $this->_log->write(__METHOD__ . " : key {$key} not provided in array, unable to process OBA percnetage.");
            } else {
                ${$key} = $row[$key];
            }
        }

        if ($nrbf < ($nrh + $nrbb + $nrhbp + $nrsh + $nrsf + $nrcint)){
			$$nroppavg = "???";
		} else {
			$nravg	= $nrh / ($nrbf - ($nrbb + $nrhbp + $nrsh + $nrsf + $nrcint));
			$nravg	= ltrim(number_format($nravg, 3),0);
			return $nravg;
        }
        $row['nroppavg'] = $nroppavg;
	}
}
?>
