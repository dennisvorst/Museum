<?php
class Pitching
{
    private $_headers = ["Team", "Jaar", "AVG", "GP", "GS", "AB", "R", "H", "2B", "3B", "HR", "RBI", "TB", "SLG%", "BB", "HBP", "SO", "GDP", "OBP%", "SF", "SH", "SB", "ATT"];
    private $_db;
    private $_rows =[];
    private $_totals =[];

    function __construct(MysqlDatabase $db)
    {
        $this->_db = $db;
    }

    function getTeamStats()
    {

    }

    function getPersonstats(int $id)
    {
        /** init */
		$types = "i";
		$values = [$id];

		/************************
		 * calculate Pitching
		 ***********************/
		$sql = "SELECT t.nmteam, s.nryear, s.nrw, s.nrl, s.nrapp, s.nrgs, s.nrcg, s.nrsho, s.nrsv, s.nrip, s.nrh, s.nrr, s.nrer, s.nrbb, s.nrso, s.nr2b, s.nr3b, s.nrhr, s.nrab, ";
		$sql .= "ROUND((s.nrh/s.nrab), 3), "; /* opp avg */
		$sql .= "s.nrwp, s.nrhbp, s.nrbk, ";
		$sql .= "ROUND((s.nrer)/(FLOOR(s.nrip) + ROUND(MOD(s.nrip, FLOOR(s.nrip)),1)*(1/3)*10)*9, 2) "; /* era */
        $sql .= "FROM pitching s, teams t ";
        $sql .= "WHERE t.idteam = s.idteam AND idperson = ?";
		$this->_rows = $this->_db->select($sql, $types, $values);

		/************************
		 * calculate Pitching totals
		 ***********************/
		/* determine the number of innings pitched */
		$sql = "SELECT SUM(FLOOR(s.nrip)) + SUM(ROUND(MOD(s.nrip, FLOOR(s.nrip)),1))*(20/3) as nrtotinnings ";
        $sql .= "FROM pitching s, teams t ";
        $sql .= "WHERE t.idteam = s.idteam AND idperson = ?";

		$nrtotinnings = $this->_db->select($sql, $types, $values);
		$nrtotinnings = $nrtotinnings[0]['nrtotinnings'];
		if (empty($nrtotinnings)){
			$nrtotinnings = 0;
		}

		$sql = "SELECT SUM(s.nrw), SUM(s.nrl), SUM(s.nrapp), SUM(s.nrgs), SUM(s.nrcg), SUM(s.nrsho), SUM(s.nrsv), SUM(s.nrip), SUM(s.nrh), SUM(s.nrr), SUM(s.nrer), SUM(s.nrbb), SUM(s.nrso), SUM(s.nr2b), SUM(s.nr3b), SUM(s.nrhr), SUM(s.nrab), ";
		$sql .= "ROUND((SUM(s.nrh)/SUM(s.nrab)), 3), "; /* opp avg */
		$sql .= "SUM(s.nrwp), SUM(s.nrhbp), SUM(s.nrbk), ";
		$sql .= "ROUND((SUM(s.nrer)/$nrtotinnings)*9, 2) "; /* era */
        $sql .= "FROM pitching s, teams t ";
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
