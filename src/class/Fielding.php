<?php
require_once "MysqlDatabase.php";

class Fielding
{
    private $_headers = ["Team", "Jaar", "C", "PO", "A", "E", "FLD%", "DP", "SBA", "CSB", "SBA%", "PB", "CI"];
    private $_db;
    private $_rows =[];
    private $_totals =[];
    
    function __construct(MysqlDatabase $db)
    {
        $this->_db = $db;
    }

    function getClubStats()
    {

    }

    function getPersonStats(int $id)
    {
        /** init */
		$types = "i";
		$values = [$id];

		/************************
		 * calculate Fielding
		 * nrfldperc = s calculated by the sum of putouts and assists divided by the number of total chances (putouts + assists + errors).
		 * nrsbaperc = SB% – Stolen base percentage: the percentage of bases stolen successfully. (SB) divided by (SBA)(stolen bases attempted).
		 ***********************/
		/** table rows */
		$sql = "SELECT t.nmteam, s.nryear, s.nrc, s.nrpo, s.nra, s.nre, ";
		$sql .= "ROUND((s.nrpo+s.nra)/(s.nrpo+s.nra+s.nre), 3) AS nrfldperc, "; /* nrfldperc */
		$sql .= "s.nrdp, s.nrsba, s.nrcsb, ";
		$sql .= "ROUND(s.nrsbaperc, 3) AS nrsbaperc, "; /* nrsbaperc */
        $sql .= "s.nrpb, s.nrci FROM fielding s, teams t ";
        $sql .= "WHERE t.idteam = s.idteam AND idperson = ?";
		$this->_rows = $this->_db->select($sql, $types, $values);

		/** footer rows */
		$sql = "SELECT SUM(s.nrc) AS nrc, SUM(s.nrpo) AS nrpo, SUM(s.nra) AS nra, SUM(s.nre) AS nre, ";
		$sql .= "ROUND((SUM(s.nrpo)+SUM(s.nra))/(SUM(s.nrpo)+SUM(s.nra)+SUM(s.nre)), 3) AS nrfldperc, "; /* nrfldperc */
		$sql .= "SUM(s.nrdp) AS nrdp, SUM(s.nrsba) AS nrsba, SUM(s.nrcsb) AS nrcsb, ";
		$sql .= "ROUND(SUM(s.nrcsb)/SUM(s.nrsba), 3) AS nrsbaperc, "; /* nrsbaperc */
        $sql .= "SUM(s.nrpb) AS nrbp, SUM(s.nrci) AS nrci FROM fielding s, teams t ";
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

}
?>
