<?php
require_once "iStatistics.php";
require_once "Statistics.php";

//require_once "MysqlDatabase.php";
//require_once "Log.php";

class Fielding extends Statistics implements iStatistics
{
    protected $_headers = ["Team", "Jaar", "C", "PO", "A", "E", "FLD%", "DP", "SBA", "CSB", "SBA%", "PB", "CI"];
    protected $_keys = ["nrc", "nrpo", "nra", "nre", "nrfldperc", "nrdp", "nrsba", "nrcsb", "nrsbaperc", "nrpb", "nrci"];
    protected $_title = "Fielding";

    function __construct(MysqlDatabase $db, Log $log)
    {
        parent::__construct($db, $log);
    }

    function getClubStatistics(int $id) : string
    {
       return "";
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
		$sql = "SELECT t.nmteam, s.nryear, s.nrc, s.nrpo, s.nra, s.nre, s.nrfldperc, s.nrdp, s.nrsba, s.nrcsb, s.nrsbaperc, s.nrpb, s.nrci
                FROM fielding s, teams t
                WHERE t.idteam = s.idteam
                AND idperson = ?
                ORDER BY s.nryear";
        $rows = $this->_db->select($sql, $types, $values);


        foreach ($rows as $row)
        {
            $row = $this->_calcStolenBaseAttemptPercentage($row);
            $row = $this->_calcfieldingPercentage($row);

            $this->_rows[] = $row;
        }

        $this->_totals = $this->_getTotals();
        $this->_totals = $this->_calcfieldingPercentage($this->_totals );
        $this->_totals = $this->_calcStolenBaseAttemptPercentage($this->_totals );

        return $this->show();
    }

    /** calculations */
    private function _calcfieldingPercentage(array $row) : array
    {
        if (!empty($row))
        {
            /** init  */
            $nrpo = 0;
            $nra = 0;
            $nre = 0;

            /** if there is no nrfldperc we add one. */
            if (!isset($row['nrfldperc'])) 
            {
                $row['nrfldperc'] = "???";
            }

            /** get the required values */
            $keys = ["nrpo", "nra", "nre"];
            foreach ($keys as $key)
            {
                if (array_key_exists($key, $row))
                {
                    ${$key} = $row[$key];
                }
            }

            /** topside of the fraction */
            $numerator = $nrpo + $nra;
            /** bottom of the fraction */  
            $denominator = $nrpo + $nra + $nre;

            
            /** prevent the divison by zero */
            if (!empty($denominator))
            {
                $result = round($numerator / $denominator, 3);
                $row['nrfldperc'] = $this->_format($result, 3);
            }            
        }
        return $row;
    }

    function _calcStolenBaseAttemptPercentage(array $row) : array
    {
        if (empty($row['nrcsb']))
        {
            /** divide zero over something results in zero */
            $result = 0;
        } else {
            $result = round(($row['nrcsb'] / $row['nrsba']), 3);
        }
        $row['nrsbaperc'] = $this->_format($result, 3);
        return $row;
    }

}
?>
